<?php

namespace App\Http\Controllers\Main\IP;

use App\Core\ips\IPExcelFile;
use App\Http\Controllers\Controller;
use App\Models\Main\IP\IP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class IPResourceController extends Controller
{
    public function __construct()
    {
        //$this->authorizeResource(IP::class, 'ip');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch (Auth::user()->getIdAccountType())
        {
            case 1:
            {
                $ips = IP::all()->where('idTeacher', '=', Auth::user()->getEmployee()->getTeacher()->idTeacher);

                return view('systems.main.ips.ip_index', [
                    'ips' => $ips
                ]);
            } break;
            case 2:
            {
                $ips = IP::all();

                return view('systems.main.ips.ip_index', [
                    'ips' => $ips
                ]);
            } break;
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('systems.main.ips.ip_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->only(['file', 'lastEmployee', 'lastUpdate']);

        $ipFile = new IPExcelFile($data['file']->get());


        #echo "<pre>";
        #print_r($ipFile->getData());
        #echo "</pre>";

        $idTeacher = DB::table('employees as e')
            ->select('t.idTeacher')
            ->join('Teachers as t', 't.idEmployee', '=','e.idEmployee')
            ->where('e.secondName', '=', $ipFile->getSheet(0)['secondName'])
            ->where('e.firstName', '=', $ipFile->getSheet(0)['firstName'])
            ->where('e.patronymic', '=', $ipFile->getSheet(0)['patronymic'])
            ->get()->first()->idTeacher;



        $ip = new IP();
        $ip->file = $data['file']->get();
        $ip->idTeacher = $idTeacher;
        $ip->educationYear = $ipFile->getSheet(0)['educationYear'];
        $ip->lastEmployee = Auth::user()->getEmployee()->idEmployee;
        $ip->lastUpdate = date('Y-m-d');
        $ip->save();

        Session::flash('message', 'ИП успешно добавлен');
        return Redirect::route('ips.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Main\IP\IP  $iP
     * @return \Illuminate\Http\Response
     */
    public function show(IP $iP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Main\IP\IP  $iP
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $ip = IP::all()->where('idIP', '=', $id)->first();

        $ipFile = new IPExcelFile($ip->file);

        #echo "<pre>";
        #print_r($ipFile->getData());
        #echo "</pre>";

        $idTeacher = DB::table('employees as e')
            ->select('t.idTeacher')
            ->join('Teachers as t', 't.idEmployee', '=','e.idEmployee')
            ->where('e.secondName', '=', $ipFile->getSheet(0)['secondName'])
            ->where('e.firstName', '=', $ipFile->getSheet(0)['firstName'])
            ->where('e.patronymic', '=', $ipFile->getSheet(0)['patronymic'])
            ->get()->first()->idTeacher;



        if (!empty($ip)) {
            return view('systems.main.ips.ip_update', [
                'ip' => $ip,
                'idTeacher' => $idTeacher,
                'file' => $ipFile->getData()
            ]);
        }

        Session::flash('message', 'Произошла ошибка ');
        return Redirect::route('ips.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Main\IP\IP  $iP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ip = IP::all()->where('idIP', '=', $id)->first();

        $data = $request->only(['idTeacher']);

        $ip->idTeacher = $data['idTeacher'];
        $ip->update();

        Session::flash('message', 'ИП обновлён');
        return Redirect::route('ips.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Main\IP\IP  $iP
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ip = IP::all()->where('idIP', '=', $id)->first();

        if (!empty($ip)) {
            if ($ip->delete()) {
                Session::flash('message', 'ИП успешно удалён');
                return Redirect::route('ips.index');
            }
        }

        Session::flash('message', 'Ошибка удаления');
        return Redirect::route('ips.index');
    }
}
