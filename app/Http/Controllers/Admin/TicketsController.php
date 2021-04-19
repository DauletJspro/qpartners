<?php

namespace App\Http\Controllers\Admin;

use App\Models\CategoryTicket;
use App\Models\Ticket;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $tickets = Ticket::latest()->paginate(10);
        $categories = CategoryTicket::all();
        return view('admin.tickets.index', compact('categories', 'tickets'));
    }

    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->user_id)->paginate(10);
        $adminTickets = Ticket::where('user_id', '=', 1)->where('recipient_id', '=', Auth::user()->user_id)->get();
        $categories = CategoryTicket::all();

        return view('admin.tickets.user_tickets', compact('tickets', 'categories', 'adminTickets'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $categories = CategoryTicket::all();
        $users = Users::where('role_id', '!=', 1)->whereNull('deleted_at')->select('user_id', 'login')->get(); ;
        return view('admin.tickets.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
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
            'recipient_id' => $request->input('recipient'),
            'ticket_id' => strtoupper(str_random(10)),
            'category_id'  => $request->input('category'),
            'priority'  => $request->input('priority'),
            'message'   => $request->input('message'),
            'status'    => 'Open',
        ]);
        $ticket->save();
        return redirect()
            ->back()
            ->with("status", "Билет с ID: #$ticket->ticket_id был открыт.");
    }

    /**
     * Display the specified resource.
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


    public function close($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $ticket->status = 'Closed';

        $ticket->save();

        $ticketOwner = $ticket->user;


        return redirect()
            ->back()
            ->with("status", "Билет закрыт.");
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
