<?php

namespace App\Http\Controllers\Main\Tickets;

use App\Core\Config\ListMessageCode;
use App\Core\Constants\ListTicketHistoryTypeConstants;
use App\Core\Constants\ListTicketStatusConstants;
use App\Http\Controllers\Controller;
use App\Models\Main\Tickets\EmployeeTicketModel;
use App\Models\Main\Tickets\TicketFileModel;
use App\Models\Main\Tickets\TicketHistoryModel;
use App\Models\Main\Tickets\TicketModel;
use App\Models\Service\Lists\ListTicketTypeModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TicketResourceController extends Controller
{
    private $ticketsPath;
    private const TICKET_PATH = 'tickets' . DIRECTORY_SEPARATOR;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getTicketFolder(int $id) {
        return self::TICKET_PATH . 'ticket_' . $id;
    }

    public function downloadFile(TicketFileModel $file) {
        return Storage::download($file->getPath());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $ticket = new TicketModel();
        $ticket->idAuthor = Auth::id();
        $ticket->idTicketType = $request->ticketType;
        $ticket->caption = $request->ticketCaption;
        $ticket->description = $request->ticketDescription;
        $ticket->startDate = date_format( date_create( $request->ticketStartDate . $request->ticketStartTime ), 'Y.m.d H:i:s');
        $ticket->endDate = date_format( date_create( $request->ticketEndDate . $request->ticketEndTime ), 'Y.m.d H:i:s');
        $ticket->idTicketStatus = ListTicketStatusConstants::CREATE;

        try
        {
            DB::beginTransaction();

            if (!$ticket->save()) {
                throw new \Exception();
            }

            if (!$ticket->addHistoryEvent(Auth::id(), ListTicketStatusConstants::CREATE)) {
                throw new \Exception();
            }

            if ($request->ticketEmployees and count($request->ticketEmployees) > 0) {
                foreach ($request->ticketEmployees as $employee) {
                    if (!$ticket->assignEmployee($employee)) {
                        throw new \Exception();
                    }
                }
            }

            if ($request->file('files') and count($request->file('files')) > 0) {

                foreach ($request->file('files') as $file) {
                    $path = Storage::putFileAs(
                        $this->ticketsPath . 'ticket_'.$ticket->idTicket,
                        $file,
                        $file->getClientOriginalName()
                    );

                    if (Storage::exists($path)) {
                        if (!$ticket->attachFile(Auth::id(), $path, $file->extension())) {
                            throw new \Exception();
                        }
                    } else {
                        throw new \Exception();
                    }
                }

                if (!$ticket->addHistoryEvent(Auth::id(), ListTicketHistoryTypeConstants::ATTACH_FILE)) {
                    throw new \Exception();
                }
            }

            DB::commit();
            Session::flash('message', ['type' => 'success', 'message' => 'Поручение успешно создано']);
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        Session::flash('message', ['type' => 'error', 'message' => 'Не удалось создать поручение']);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Main\Tickets\TicketModel  $ticketModel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(TicketModel $ticket)
    {
        try {
            $employeeTicket = $ticket->hasOne(EmployeeTicketModel::class, 'idTicket', 'idTicket')
                ->where('idEmployee', '=', Auth::user()->getEmployee()->idEmployee)
                ->first();

            if ($employeeTicket) {
                DB::beginTransaction();

                if (!$employeeTicket->isSeen()) {
                    Session::flash('message', ['type' => 'info', 'message' => 'Вы просмотрели поручение']);
                    if (!$employeeTicket->setSeen(true)) {
                        throw new \Exception();
                    }
                }

                DB::commit();
            }
        } catch (\Exception $e) {
            DB::rollBack();
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

    public function addComment(Request $request, TicketModel $ticket)
    {
        try {
            DB::beginTransaction();

            if (!$ticket->addComment(Auth::id(), $request->comment)) {
                throw new \Exception();
            }

            if (!$ticket->addHistoryEvent(Auth::id(), ListTicketHistoryTypeConstants::COMMENT)) {
                throw new \Exception();
            }

            DB::commit();

            Session::flash('message', ['type' => 'success', 'message' => 'Комментарий прикреплён']);
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        Session::flash('message', ['type' => 'error', 'message' => 'Не удалось прикрепить комментарий']);
        return back();
    }

    public function attachFile(Request $request, TicketModel $ticket)
    {
        try
        {
            if (!$request->file('attachedFile')) {
                throw new \Exception();
            }

            $file = $request->file('attachedFile');

            if ($ticket->getAttachedFiles()->contains('filename', '=', $file->getClientOriginalName())) {
                throw new \Exception('Такой файл уже прикреплён', ListMessageCode::WARNING);
            }

            $path = Storage::putFileAs(
                $this->getTicketFolder($ticket->idTicket),
                $file,
                $file->getClientOriginalName()
            );


            if (!Storage::exists($path)) {
                throw new \Exception('Не удалось прикрепить файл', ListMessageCode::ERROR);
            }

            DB::beginTransaction();

            if (!$ticket->attachFile(Auth::id(), $path, $file->extension())) {
                throw new \Exception();
            }

            if (!$ticket->addHistoryEvent(Auth::id(), ListTicketHistoryTypeConstants::ATTACH_FILE)) {
                throw new \Exception();
            }

            DB::commit();

            Session::flash('message', ['type' => 'success', 'message' => 'Новый файл прикреплён']);
            return back();
        } catch (\Exception $e) {
            DB::rollBack();

            Session::flash('message', ['type' => ListMessageCode::getType($e->getCode()), 'message' => $e->getMessage()]);
            return back();
        }
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(TicketModel $ticket)
    {
        $isFilesDelete = true;
        foreach ($ticket->getAttachedFiles() as $file) {
            if (Storage::exists($file->getPath())) {
                $isFilesDelete *= Storage::delete($file->getPath());
            }
        }

        if ($isFilesDelete) {
            if ($this->getTicketFolder($ticket->idTicket)) {
                Storage::deleteDirectory($this->getTicketFolder($ticket->idTicket));
            }
        }

        if ($ticket->delete()) {
            Session::flash('message', ['type' => 'success', 'message' => 'Поручение удалено']);
            return back();
        }

        Session::flash('message', ['type' => 'error', 'message' => 'Не удалось удалить поручение']);
        return back();
    }
}
