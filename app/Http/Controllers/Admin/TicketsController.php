<?php

namespace App\Http\Controllers\Admin;


use App\Mailers\AppMailer;
use App\Models\Category2;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TicketsController extends Controller
{
    public function index()
    {

        $tickets = Ticket::latest()->paginate(10);
        $categories = Category2::all();
        return view('admin.tickets.index', compact('categories', 'tickets'));
    }

    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->user_id)->paginate(10);
        $categories = Category2::all();

        return view('admin.tickets.user_tickets', compact('tickets', 'categories'));
    }

    /**
     * Show the form for opening a new ticket.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category2::all();

        return view('admin.tickets.create', compact('categories'));
    }

    /**
     * Store a newly created ticket in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required',
            'category'  => 'required',
            'priority'  => 'required',
            'message'   => 'required'
        ]);

        $ticket = new Ticket([
            'title'     => $request->input('title'),
            'user_id'   => Auth::user()->user_id,
            'ticket_id' => strtoupper(str_random(10)),
            'category_id'  => $request->input('category'),
            'priority'  => $request->input('priority'),
            'message'   => $request->input('message'),
            'status'    => "Open",
        ]);

        $ticket->save();

        return redirect()
            ->back()
            ->with("status", "A ticket with ID: #$ticket->ticket_id has been opened.");
    }

    /**
     * Display a specified ticket.
     *
     * @param  int  $ticket_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $comments = $ticket->comments;

        $category = $ticket->category;

        return view('admin.tickets.show', compact('ticket', 'category', 'comments'));
    }

    /**
     * Close the specified ticket.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function close($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $ticket->status = 'Closed';

        $ticket->save();

        $ticketOwner = $ticket->user;


        return redirect()
            ->back()
            ->with("status", "The ticket has been closed.");
    }

}
