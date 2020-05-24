<?php

namespace App\Http\Controllers\Main\Tickets;

use App\Http\Controllers\Controller;
use App\Models\Main\Tickets\TicketModel;
use Illuminate\Http\Request;

class TicketResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('systems.main.tickets.tickets_index', [
            'tickets' => []
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Main\Tickets\TicketModel  $ticketModel
     * @return \Illuminate\Http\Response
     */
    public function show(TicketModel $ticketModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Main\Tickets\TicketModel  $ticketModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketModel $ticketModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Main\Tickets\TicketModel  $ticketModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketModel $ticketModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Main\Tickets\TicketModel  $ticketModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketModel $ticketModel)
    {
        //
    }
}
