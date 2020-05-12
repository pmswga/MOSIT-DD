<?php

namespace App\Http\Controllers\Main\IP;

use App\Http\Controllers\Controller;
use App\Models\Main\IP\IP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('systems.main.ips.ip_index', [
            'ips' => IP::all()
        ]);
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

        $ip = new IP();
        $ip->file = $data['file']->get();
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ip = IP::all()->where('idIP', '=', $id)->first();

        $fp = tmpfile();
        $tmpFile = stream_get_meta_data($fp)['uri'];
        fputs($fp, $ip->file);

		$ip->file = IOFactory::load($tmpFile);

        fclose($fp);

        $data = [
            0 => [],
            1 => []
        ];

        $ip_config = [
            0 => [
                'institute' => 'A26',
                'faculty' => 'CJ26',
                'post' => 'Q27',
                'degree' => 'AH28',
                'initials' => 'A29'
            ],
            1 => [
                'subjects_a' => '6'
            ],
            2 => [
                'subjects_b' => '5'
            ]
        ];

        foreach ($ip_config as $sheet => $cells) {
            foreach ($cells as $cell) {
                switch ($sheet) {
                    case 0: {
                        foreach ($ip_config[0] as $key => $value) {
                            $data[0][$key] = $ip->file->getSheet(0)->getCell($value)->getValue();
                        }
                    } break;
                    case 1: {
                        $value = ' ';
                        $_cell = $ip_config[1]['subjects_a'];

                        while ($value) {
                            $value = $ip->file->getSheet(1)->getCellByColumnAndRow(1, $_cell)->getValue();
                            if ($value && $value != 'ИТОГО ЗА ВЕСЕННИЙ СЕМЕСТР') {
                                $data[1]['subjects_a'][] = $value;
                            }


                            $_cell += 2;
                        }
                    } break;
                    case 2: {
                        $value = ' ';
                        $_cell = $ip_config[2]['subjects_b'];

                        while ($value) {
                            $value = $ip->file->getSheet(2)->getCellByColumnAndRow(1, $_cell)->getValue();
                            if ($value && $value != 'ИТОГО ЗА ВЕСЕННИЙ СЕМЕСТР') {
                                $data[2]['subjects_b'][] = $value;
                            }


                            $_cell += 2;
                        }
                    } break;
                }
            }
        }

        $basePost = $data[0]['post'];
        $rateValue = 0;
        $rateType = '';

        $matches = [];
        preg_match('/Старший преподаватель|Ассистент|Преподаватель|Доцент|Профессор/i', $data[0]['post'], $matches);
        if ($matches) {
            $post = $matches[0];
        }

        $matches = [];
        preg_match('/[0|1],[0-9][0|5]/', $data[0]['post'], $matches);
        if ($matches) {
            $rateValue = $matches[0];
        }

        preg_match('/штатный|внешний/', $data[0]['post'], $matches);
        if ($matches) {
            $rateType = $matches[0];
        }

        $data[0]['post'] = $post;
        $data[0]['rateValue'] = $rateValue;
        $data[0]['rateType'] = $rateType;

        if (!empty($ip)) {
            return view('systems.main.ips.ip_update', [
                'ip' => $ip,
                'file' => $data
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
    public function update(Request $request, IP $iP)
    {
        //
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
