<?php

namespace App\Http\Controllers\Main\Tickets;

use App\Http\Controllers\Controller;
use App\Models\Main\Tickets\TicketEmployeeModel;
use App\Models\Main\Tickets\TicketModel;
use App\Models\Service\Lists\ListTicketTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        //#fixme Разграничить передаваемые данные в зависимости от типа пользователя
        return view('systems.main.tickets.ticket_index', [
            'ticketTypes' => ListTicketTypeModel::all(),
            'employees' => Auth::user()->getEmployee()->getSubordinateEmployees(),
            'assignedTickets' => Auth::user()->getEmployee()->getAssignedTickets(),
            'createdTickets' => Auth::user()->getEmployee()->getCreatedTickets()
        ]);
    }

    public function inbox()
    {
        return view('systems.main.tickets.ticket_inbox ', [
            'inboxTicketList' => Auth::user()->getEmployee()->getUnseenTickets()
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
        $ticket = new TicketModel();
        $ticket->idAuthor = Auth::user()->idEmployee;
        $ticket->idTicketType = $request->ticketType;
        $ticket->caption = $request->ticketCaption;
        $ticket->description = $request->ticketDescription;
        $ticket->startDate = $request->ticketStartDate;
        $ticket->endDate = $request->ticketEndDate;

        $result = true;//#fixme add exception handler
        if ($ticket->save()) {

            foreach ($request->ticketEmployees as $employee) {
                $ticketEmployee = new TicketEmployeeModel();
                $ticketEmployee->idEmployee = $employee;
                $ticketEmployee->idTicket = $ticket->idTicket;
                $result *= $ticketEmployee->save();
            }

            if ($result) {
                Session::flash('successMessage', 'Поручение успешно создано');
                return back();
            }

        }

        Session::flash('successMessage', 'Не удалось создать поручение');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Main\Tickets\TicketModel  $ticketModel
     * @return \Illuminate\Http\Response
     */
    public function show(TicketModel $ticket)
    {
        $employeeTicket = $ticket->hasOne(TicketEmployeeModel::class, 'idTicket', 'idTicket')
            ->where('idEmployee', '=', Auth::user()->getEmployee()->idEmployee)
            ->get()->first();


        if ($employeeTicket) {
            if (!$employeeTicket->isSeen) {
                Session::flash('successMessage', 'Вы просмотрели поручение');
                $employeeTicket->isSeen = true;
                $employeeTicket->save();
            }
        }


        return view('systems.main.tickets.ticket_show', [
            'ticket' => $ticket
        ]);
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
