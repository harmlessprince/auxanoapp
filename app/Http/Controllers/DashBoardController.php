<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Ticket;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index()
    {
        $ticketsCount = Ticket::count();
        $customersCount = Customer::count();
        $openTicketsCount = Ticket::whereNull('completed_at')->count();
        $closedTicketsCount = $ticketsCount - $openTicketsCount;
        return view('dashboard', compact('ticketsCount', 'openTicketsCount', 'closedTicketsCount', 'customersCount'));
    }
}
