<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Priority;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use App\Repositories\Eloquent\Repository\TicketRepository;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public $ticketRepository;
    public  function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }
    public function index()
    {
        // $tickets = Ticket::with(['status', 'priority', 'category', 'user', 'agent', 'customer'])->paginate();
        return view('tickets.index');
    }

    public function create()
    {
        $statuses = Status::all(['id', 'name']);
        $priorities = Priority::all(['id', 'name']);
        $users = User::all(['id', 'first_name', 'last_name']);
        $customers = Customer::all(['id', 'name', 'email']);
        $categories = Category::all(['id', 'name']);
        return view('tickets.create', compact('statuses', 'priorities', 'customers', 'categories', 'users'));
    }
    public function store(StoreTicketRequest $request)
    {
        $data = $request->validated();
        $ticket = $this->ticketRepository->create($data);
        $ticket->audits()->create([
            'operation' => 'Created by ' . auth()->user()->full_name,
            'user_id' => auth()->id(),
            'agent_id' => $request->input('assign_to')
        ]);
        return  redirect(route('tickets.index'))->with(['success' => 'Tickets has been successfully created']);
    }
}
