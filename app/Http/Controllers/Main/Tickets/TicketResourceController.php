<?php

namespace App\Http\Controllers\Main\Tickets;

use App\Core\Constants\ListTicketHistoryTypeConstants;
use App\Core\Constants\ListTicketStatusConstants;
use App\Http\Controllers\Controller;
use App\Models\Main\Tickets\EmployeeTicketModel;
use App\Models\Main\Tickets\TicketFileModel;
use App\Models\Main\Tickets\TicketHistoryModel;
use App\Models\Main\Tickets\TicketModel;
use App\Models\Service\Lists\ListTicketTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TicketResourceController extends Controller
{
    private $ticketsPath;

    public function __construct()
    {
        $this->middleware('auth');
        $this->ticketsPath = 'tickets/';
    }

    public function downloadFile(TicketFileModel $file) {
        return Storage::download($file->getPath());
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

    public function expired()
    {
        return view('systems.main.tickets.ticket_inbox ', [
            'inboxTicketList' => Auth::user()->getEmployee()->getExpiredTickets()
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
        try
        {
            $ticket = new TicketModel();
            $ticket->idAuthor = Auth::user()->idEmployee;
            $ticket->idTicketType = $request->ticketType;
            $ticket->caption = $request->ticketCaption;
            $ticket->description = $request->ticketDescription;
            $ticket->startDate = $request->ticketStartDate . ' ' . $request->ticketStartTime;
            $ticket->endDate = $request->ticketEndDate . ' ' . $request->ticketEndTime;
            $ticket->idTicketStatus = ListTicketStatusConstants::CREATE;

            DB::beginTransaction();

            $isTicketCreated = true;
            $isTicketEventCreated = true;
            $isTicketEmployeeAssigned = true;
            $isTicketFilesUploaded = true;
            $isTicketAttachFilesEvent = true;

            if ($ticket->save()) {
                $ticketHistory = new TicketHistoryModel();
                $ticketHistory->idTicket = $ticket->idTicket;
                $ticketHistory->idTicketHistoryType = ListTicketHistoryTypeConstants::CREATE;
                $ticketHistory->idEmployee = Auth::user()->idEmployee;

                $isTicketEventCreated = $ticketHistory->save();

                foreach ($request->ticketEmployees as $employee) {
                    $ticketEmployee = new EmployeeTicketModel();
                    $ticketEmployee->idEmployee = $employee;
                    $ticketEmployee->idTicket = $ticket->idTicket;
                    $isTicketEmployeeAssigned *= $ticketEmployee->save();
                }

                if ($request->file('files')) {
                    foreach ($request->file('files') as $file) {

                        $path = Storage::putFileAs(
                            $this->ticketsPath . 'ticket_'.$ticket->idTicket,
                            $file,
                            $file->getClientOriginalName()
                        );

                        $ticketFile = new TicketFileModel();
                        $ticketFile->idTicket = $ticket->idTicket;
                        $ticketFile->path = $path;
                        $ticketFile->filename = basename($path);
                        $ticketFile->extension = $file->extension();

                        $isTicketFilesUploaded *= $ticketFile->save();
                    }

                }

                if (count($request->file('files')) > 0) {
                    $ticketHistory = new TicketHistoryModel();
                    $ticketHistory->idTicket = $ticket->idTicket;
                    $ticketHistory->idTicketHistoryType = ListTicketHistoryTypeConstants::ATTACH_FILE;
                    $ticketHistory->idEmployee = Auth::user()->idEmployee;

                    $isTicketAttachFilesEvent = $ticketHistory->save();
                }

            } else {
                $isTicketCreated = false;
            }

            if ($isTicketCreated and
                $isTicketEventCreated and
                $isTicketEmployeeAssigned and
                $isTicketFilesUploaded and
                $isTicketAttachFilesEvent
            ) {
                DB::commit();
                Session::flash('successMessage', 'Поручение успешно создано');
                return back();
            } else {
                DB::rollBack();
                Session::flash('successMessage', 'Не удалось создать поручение');
                return back();
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('successMessage', 'Произошла ошибка при создании поручения');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Main\Tickets\TicketModel  $ticketModel
     * @return \Illuminate\Http\Response
     */
    public function show(TicketModel $ticket)
    {
        $employeeTicket = $ticket->hasOne(EmployeeTicketModel::class, 'idTicket', 'idTicket')
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
