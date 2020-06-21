<?php

namespace App\Http\Controllers\Main\IP;

use App\Core\Config\ListDatabaseTable;
use App\Core\Config\ListMessageCode;
use App\Core\Constants\ListAccountTypeConstants;
use App\Core\systems\main\ips\IPExcelFileReader;
use App\Core\Systems\Main\IPS\IPExcelFileWriter;
use App\Http\Controllers\Controller;
use App\Models\Main\IP\IPModel;
use App\Models\Main\IP\ListWorkTimesModel;
use App\Models\Main\Staff\EmployeeModel;
use App\Models\Main\Storage\EmployeeFileModel;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Exception;


class IPResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(IPModel::class, 'ip');
    }

    static public function assignFile($file) {
        try {
            $ipFile = new IPExcelFileReader($file->getNormalizePath());

            $ipFile = $ipFile->getResult();

            $teacher = EmployeeModel::all()
                ->where('secondName', '=', $ipFile[0]['secondName'])
                ->where('firstName', '=', $ipFile[0]['firstName'])
                ->where('patronymic', '=', $ipFile[0]['patronymic'])
                ->first();

            if (empty($teacher->getTeacher()->getOriginal())) {
                throw new \Exception();
            }

            DB::beginTransaction();

            $ip = new IPModel();
            $ip->idEmployeeFile = $file->idEmployeeFile;
            $ip->idTeacher = $teacher->idEmployee;
            $ip->educationYear = $ipFile[0]['educationYear'];
            $ip->lastEmployee = Auth::id();
            $ip->lastUpdate = date('Y-m-d H:i:s');

            if (!$ip->save()) {
                throw new \Exception();
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function downloadIP($ip)
    {
        $file = IPModel::query()->where('idIP', '=', $ip)->first();

        if ($file) {
            $file = $file->getFile();
            if (Storage::exists($file->getPath())) {
                return Storage::download($file->getPath(), $file->getFilename(true));
            }
        }

        Session::flash('message', ['type' => 'error', 'message' => 'Не удалось скачать ИП']);
        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        switch (Auth::user()->idAccountType)
        {
            case ListAccountTypeConstants::TEACHER:
            {
                $ips = IPModel::all()->where('idTeacher', '=', Auth::id());

                return view('systems.main.ips.index', [
                    'ips' => $ips
                ]);
            } break;
            case ListAccountTypeConstants::METHODIST:
            {
                $ips = IPModel::all();

                $ips = $ips->reject(function ($value) {
                    return $value->getFile()->inTrash() === 1;
                })->map(function ($value){
                    return $value;
                });

                return view('systems.main.ips.index', [
                    'ips' => $ips
                ]);
            } break;
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('systems.main.ips.ip_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function store(Request $request)
    {
        $data = $request->only(['files', 'lastEmployee', 'lastUpdate']);

        $result = true;
        foreach ($data['files'] as $file) {
            $ipFile = new IPExcelFileReader(
                EmployeeFileModel::all()->where('idEmployeeFile', '=', $file)->first()->getPath()
            );

            try
            {
                $ipFile = $ipFile->getResult();
            } catch (Exception $e) {
                Session::flash('message', ['type' => 'error', 'message' => 'Произошла ошибка при добавлении']);
                return back();
            }

            $idTeacher = DB::table('employees as e')
                ->select('t.idTeacher')
                ->join('teachers as t', 't.idEmployee', '=','e.idEmployee')
                ->where('e.secondName', '=', $ipFile[0]['secondName'])
                ->where('e.firstName', '=', $ipFile[0]['firstName'])
                ->where('e.patronymic', '=', $ipFile[0]['patronymic'])
                ->get()->first()->idTeacher;

            $ip = new IPModel();
            $ip->idEmployeeFile = $file;
            $ip->idTeacher = $idTeacher;
            $ip->educationYear = $ipFile[0]['educationYear'];
            $ip->lastEmployee = Auth::user()->getEmployee()->idEmployee;
            $ip->lastUpdate = date('Y-m-d H:i:s');
            $result *= $ip->save();
        }

        if ($result) {
            Session::flash('message', ['type' => 'success', 'message' => 'ИП успешно добавлен']);
            return back();
        }

        Session::flash('message', ['type' => 'error', 'message' => 'Произошла ошибка при добавлении']);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Main\IP\IPModel  $iP
     * @return \Illuminate\Http\Response
     */
    public function show(IPModel $ip)
    {
        try
        {
            $ipExcelFileStreamer = new IPExcelFileReader($ip->getFile()->getNormalizePath());
            $ipFile = $ipExcelFileStreamer->getResult();

            if (empty($ip)) {
                throw new \Exception();
            }

            return view('systems.main.ips.show', [
                'ip' => $ip,
                'file' => $ipFile
            ]);
        } catch (\Exception $e) {

            Session::flash('message', ['type' => 'error', 'message' => $e->getMessage()]);
            return Redirect::route('ips.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Main\IP\IPModel $iP
     * @return \Illuminate\Http\RedirectResponse
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     * @throws Exception
     */
    public function edit(IPModel $ip)
    {
        try
        {
            $ipExcelFileStreamer = new IPExcelFileReader($ip->getFile()->getNormalizePath());
            $ipFile = $ipExcelFileStreamer->getResult();

            if (empty($ip)) {
                throw new \Exception();
            }

            return view('systems.main.ips.update', [
                'ip' => $ip,
                'idTeacher' => 0,
                'file' => $ipFile,
                'workTimeLimits' => ListWorkTimesModel::all()
            ]);
        } catch (\Exception $e) {

            Session::flash('message', ['type' => 'error', 'message' => $e->getMessage()]);
            return Redirect::route('ips.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Main\IP\IPModel $iP
     * @return \Illuminate\Http\RedirectResponse
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function update(Request $request, IPModel $ip)
    {
        $metWorks = [];
        $sciWorks = [];
        $orgWorks = [];

        foreach ($request->request->keys() as $key) {
            if (preg_match('/metWork_/', $key)) {
                $metWorks[] = $request[$key];
            }
            if (preg_match('/sciWork_/', $key)) {
                $sciWorks[] = $request[$key];
            }
            if (preg_match('/orgWork_/', $key)) {
                $orgWorks[] = $request[$key];
            }
        }

        $data = [];
        $data['3'] = $metWorks;
        $data['4'] = $sciWorks;
        $data['5'] = $orgWorks;

        try
        {
            $writer = new IPExcelFileWriter($ip->getFile()->getNormalizePath(), $data);
            $writer->getResult();

            DB::beginTransaction();

            $ip->lastEmployee = Auth::user()->getEmployee()->idEmployee;
            $ip->lastUpdate = date('Y-m-d H:i:s');
            if (!$ip->update()) {
                throw new \Exception('Не удалось сохранить ИП', ListMessageCode::ERROR);
            }

            DB::commit();

            Session::flash('message', ['type' => 'success', 'message' => 'ИП сохранён']);
            return Redirect::route('ips.edit', $ip);
        } catch (\Exception $e) {
            DB::rollBack();

            Session::flash('message', ['type' => ListMessageCode::getType($e->getCode()), 'message' => $e->getMessage()]);
            return Redirect::route('ips.edit', $ip);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Main\IP\IPModel  $iP
     * @return \Illuminate\Http\Response
     */
    public function destroy(IPModel $ip)
    {
        try
        {
            DB::beginTransaction();

            if (!$ip->delete()) {
                throw new \Exception();
            }

            DB::commit();

            #Session::flash('successMessage', 'ИП больше не отслеживается');
            return back();
        } catch (\Exception $e) {
            DB::rollBack();

            #Session::flash('errorMessage', 'Ошибка удаления');
            return Redirect::route('ips.index');
        }
    }
}
