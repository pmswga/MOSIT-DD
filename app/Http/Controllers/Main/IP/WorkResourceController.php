<?php

namespace App\Http\Controllers\Main\IP;

use App\Core\Constants\ListWorkTypeConstants;
use App\Http\Controllers\Controller;
use App\Models\Main\IP\ListWorksModel;
use Illuminate\Http\Request;

class WorkResourceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ajaxGetListOrgWorks() {
        return \App\Models\Main\IP\ListWorksModel::all()
            ->where('idWorkType', '=', ListWorkTypeConstants::ORG_WORK)
            ->sortBy('workCaption')
            ->groupBy('workCaption')
            ->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Main\IP\ListWorksModel  $listWorksModel
     * @return \Illuminate\Http\Response
     */
    public function show(ListWorksModel $listWorksModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Main\IP\ListWorksModel  $listWorksModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ListWorksModel $listWorksModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Main\IP\ListWorksModel  $listWorksModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListWorksModel $listWorksModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Main\IP\ListWorksModel  $listWorksModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListWorksModel $listWorksModel)
    {
        //
    }
}
