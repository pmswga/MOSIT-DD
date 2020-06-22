<?php

namespace App\Http\Controllers\Main\Storage;

use App\Core\Config\ListMessageCode;
use App\Core\Constants\ListFileTagConstants;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Main\IP\IPResourceController;
use App\Models\Main\IP\IPModel;
use App\Models\Main\Storage\EmployeeFileModel;
use App\Models\Main\Storage\ListFileTagModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class EmployeeFileResourceController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(EmployeeFileModel::class, 'storage');
    }

    private function getAccountPath() {
        return 'storage' . '/' . Auth::user()->getEmail();
    }

    public function downloadFile(EmployeeFileModel $storage) {
        if (Storage::exists($storage->getPath())) {
            return Storage::download($storage->getPath(), $storage->getFilename(true));
        }

        Session::flash('message', ['type' => 'error', 'message' => 'Не удалось скачать файл']);
        return back();
    }

    public function createDirectory(Request $request) {
        $data = $request->only(['currentDirectory', 'directoryName']);

        $fullPath = storage_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $data['currentDirectory'];


        if (is_dir($fullPath)) {
            $path = $fullPath. DIRECTORY_SEPARATOR . ltrim(str_replace(' ', '_', $data['directoryName']));

            if (!is_dir($path)) {
                if (mkdir($path)) {
                    Session::flash('message', ['type' => 'success', 'message' => 'Папка создана']);
                    return back();
                }
            }

            Session::flash('message', ['type' => 'warning', 'message' => 'Папка уже существует']);
            return back();
        }

        Session::flash('message', ['type' => 'error', 'message' => 'Не удалось создать папку']);
        return back();
    }

    public function destroyDirectory(Request $request) {
        $data = $request->only(['currentDirectory', 'directoryName']);
        $fullPath = storage_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $data['currentDirectory'];

        try
        {
            if (Storage::exists($data['currentDirectory'])) {
                $path = $fullPath . DIRECTORY_SEPARATOR . ltrim(str_replace(' ', '_', $data['directoryName']));

                if (EmployeeFileModel::all()->where('directory', '=', $path)->count() == 0) {
                    if (is_dir($path)) {
                        if (rmdir($path)) {
                            Session::flash('message', ['type' => 'success', 'message' => 'Папка удалена']);
                            return back();
                        }
                    }

                    Session::flash('message', ['type' => 'error', 'message' => 'Невозможно удалить папку, так как в ней содержатся файлы']);
                    return back();
                }

                Session::flash('message', ['type' => 'warning', 'message' => 'Невозможно удалить папку, так как в ней содержатся файлы']);
                return back();
            }

            Session::flash('message', ['type' => 'error', 'message' => 'Не удалось удалить папку']);
            return back();
        } catch (\ErrorException $errorException) {
            Session::flash('message', ['type' => 'warning', 'message' => 'Папка содержит подпапки']);
            return back();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if (!Storage::exists($this->getAccountPath())) {
            Storage::makeDirectory($this->getAccountPath());
        }

        $parentPath = '';
        if ($request->path) {
            if (pathinfo($request->path)['dirname'] !== 'storage') {
                $parentPath = str_replace('..', '', pathinfo($request->path)['dirname']);
            }

            $path = str_replace('..', '', $request->path);
        } else {
            $parentPath = '';
            $path = $this->getAccountPath();
        }

        $allDirectories = Storage::directories($path);

        $files = EmployeeFileModel::all()
            ->where('directory', '=', $path)
            ->where('inTrash', '=', false)
            ->sortBy('filename');

        return view('systems.main.storage.index', [
            'currentDirectory' => $path,
            'parentDirectory'  => $parentPath,
            'fileTags' => Auth::user()->getAvailableFileTags(),
            'folders' => $allDirectories ?? [],
            'files' => $files ?? []
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $files = $request->file;
        $currentDirectory = $request->currentDirectory;

        try
        {
            if (!Storage::exists($currentDirectory)) {
                throw new \Exception();
            }

            DB::beginTransaction();

            foreach ($files as $file) {
                $path = Storage::putFileAs($currentDirectory, $file, $file->getClientOriginalName());

                if (!Storage::exists($path)) {
                    throw new \Exception();
                }

                $isExist = EmployeeFileModel::query()
                    ->where('filename', '=', $file->getClientOriginalName())
                    ->where('idEmployee', '=', Auth::id())
                    ->where('directory', '=', $currentDirectory)
                    ->get();

                if (!$isExist->isEmpty()) {
                    throw new \Exception('Такой файл уже существует', ListMessageCode::WARNING);
                }


                $fileModel = new EmployeeFileModel([
                    'idEmployee' => Auth::id(),
                    'idFileTag' => $request->fileTag,
                    'directory' => $currentDirectory,
                    'path' => $path,
                    'filename' => $file->getClientOriginalName(),
                    'extension' => $file->getClientOriginalExtension()
                ]);

                if (!$fileModel->save()) {
                    throw new \Exception('Не удалось загрузить файл', ListMessageCode::ERROR);
                }

                if ($request->fileTag) {
                    switch ($request->fileTag)
                    {
                        case ListFileTagConstants::IP:
                        {
                            if (!IPResourceController::assignFile($fileModel)) {
                                throw new \Exception('Не удалось связать файл с подсистемой индивидуальных планов', ListMessageCode::ERROR);
                            }
                        } break;
                    }
                }
            }

            DB::commit();

            Session::flash('message', ['type' => 'success', 'message' => 'Файл загружен']);
            return back();
        } catch (\Exception $e) {
            DB::rollBack();

            if (Storage::exists($path)) {
                Storage::delete($path);
            }

            Session::flash('message', ['type' => ListMessageCode::getType($e->getCode()), 'message' => $e->getMessage()]);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Main\Storage\EmployeeFileModel  $employeeFileModel
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeFileModel $storage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Main\Storage\EmployeeFileModel  $employeeFileModel
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeFileModel $storage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Main\Storage\EmployeeFileModel  $employeeFileModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeFileModel $storage)
    {
        //
    }


    public function trashIndex() {
        $files = EmployeeFileModel::all()
            ->where('idEmployee', '=', Auth::id())
            ->where('inTrash', '=', true);

        return view('systems.main.storage.trash', [
            'files' => $files
        ]);
    }


    public function moveToTrash(EmployeeFileModel $storage)
    {
        try
        {
            DB::beginTransaction();

            if (!$storage->moveToTrash()) {
                throw new \Exception('Не удалось перемистить файл в корзину', ListMessageCode::ERROR);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Session::flash('message', ['type' => ListMessageCode::getType($e->getCode()), 'message' => $e->getMessage()]);
            return back();
        }

        Session::flash('message', ['type' => 'success', 'message' => 'Файл перемещён в корзину']);
        return back();
    }

    public function restoreAllFromTrash()
    {
        try
        {
            $files = EmployeeFileModel::all()
                ->where('idEmployee', '=', Auth::id())
                ->where('inTrash', '=', true);

            DB::beginTransaction();

            foreach ($files as $file) {
                if (!$file->restoreFromTrash()) {
                    throw new \Exception('Не удалось восстановить файлы из корзины', ListMessageCode::ERROR);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Session::flash('message', ['type' => ListMessageCode::getType($e->getCode()), 'message' => $e->getMessage()]);
            return back();
        }

        Session::flash('message', ['type' => 'success', 'message' => 'Файлы восстановлены из корзины']);
        return back();
    }

    public function restoreFromTrash(EmployeeFileModel $storage)
    {
        try
        {
            DB::beginTransaction();

            if (!$storage->restoreFromTrash()) {
                throw new \Exception('Не удалось восстановить файл из корзины', ListMessageCode::ERROR);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Session::flash('message', ['type' => ListMessageCode::getType($e->getCode()), 'message' => $e->getMessage()]);
            return back();
        }

        Session::flash('message', ['type' => 'success', 'message' => 'Файл восстановлен из корзины']);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Main\Storage\EmployeeFileModel  $employeeFileModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeFileModel $storage)
    {
        try
        {
            if (!Storage::exists($storage->getPath())) {
                throw new \Exception();
            }

            switch ($storage->idFileTag)
            {
                case ListFileTagConstants::IP:
                {
                    $ipFile = IPModel::all()->where('idEmployeeFile', '=', $storage->idEmployeeFile)->first();
                    if ($ipFile) {
                        if (!$ipFile->delete()) {
                            throw new \Exception();
                        }
                    }
                } break;
            }

            if (!Storage::delete($storage->getPath())) {
                throw new \Exception();
            }

            DB::beginTransaction();

            if (!$storage->delete()) {
                throw new \Exception('Не удалось удалить файл', ListMessageCode::ERROR);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Session::flash('message', ['type' => ListMessageCode::getType($e->getCode()), 'message' => $e->getMessage()]);
            return back();
        }

        Session::flash('message', ['type' => 'success', 'message' => 'Файл удалён']);
        return back();
    }
}
