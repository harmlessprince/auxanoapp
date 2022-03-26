<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Models\Brand;
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
        $data = $this->editCreateData();
        $statuses = $data['statuses'];
        $priorities =  $data['priorities'];
        $agents = $data['agents'];
        $technicians = $data['technicians'];
        $customers = $data['customers'];
        $categories = $data['categories'];
        $brands = $data['brands'];
        return view('tickets.create', compact('statuses', 'priorities', 'customers', 'categories', 'agents', 'technicians', 'brands'));
    }
    public function store(StoreTicketRequest $request)
    {
        $data = $request->validated();
        $ticket = $this->ticketRepository->create($data);
        $ticket->audits()->create([
            'action' => 'Created by ' . auth()->user()->full_name,
            'user_id' => auth()->id(),
            'operation' => 'create'
        ]);
        return  redirect(route('tickets.index'))->with(['success' => 'Tickets has been successfully created']);
    }
    public function edit(Ticket $ticket)
    {
        $data = $this->editCreateData();
        $statuses = $data['statuses'];
        $priorities =  $data['priorities'];
        $users = $data['users'];
        $customers = $data['customers'];
        $categories = $data['categories'];

        return view('tickets.edit', compact('statuses', 'priorities', 'customers', 'categories', 'users', 'ticket'));
    }

    private function editCreateData()
    {
        return [
            'statuses' => Status::all(['id', 'name']),
            'priorities' => Priority::all(['id', 'name']),
            'agents' => User::agents()->get(['id', 'first_name', 'last_name']),
            'technicians' => User::technicians()->get(['id', 'first_name', 'last_name']),
            'customers' => Customer::all(['id', 'name', 'email']),
            'categories' => Category::all(['id', 'name']),
            'brands' => Brand::all(['id', 'name']),
        ];
    }
    public function update(StoreTicketRequest $request, Ticket $ticket)
    {
        $data = $request->validated();
        $ticket = $this->ticketRepository->updateTicket($ticket->id, $data);
        return  redirect(route('tickets.index'))->with(['success' => 'Tickets has been successfully updated']);
    }
}
