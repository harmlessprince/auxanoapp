<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index()
    {
        $ticketsCount = Ticket::count();
        $customersCount = Customer::count();
        $openTicketsCount = Ticket::whereNull('completed_at')->count();
        $closedTicketsCount = $ticketsCount - $openTicketsCount;
        // Total tickets counter per category for google pie chart
        $ticketsPerCategory = Category::withCount('tickets')->orderBy('name')->get();
        $ticketsPerAgent = User::select(['first_name', 'last_name'])->withCount('agentTickets')->get();
        
        $agentPertTicketCompleted =  User::query()->select(['first_name', 'last_name'])->withCount('agentOpenTickets', 'agentCompleteTickets', 'agentTickets')->get();
       
        return view('dashboard', compact(
            'ticketsCount',
            'openTicketsCount',
            'closedTicketsCount',
            'customersCount',
            'ticketsPerCategory',
            'ticketsPerAgent'
        ));
    }


}
