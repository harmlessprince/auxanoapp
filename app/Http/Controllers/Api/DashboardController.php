<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $agentPertTicketCompleted =  User::query()->select(['first_name', 'last_name'])->withCount('agentOpenTickets', 'agentCompleteTickets', 'agentTickets')->get();
        $userPertTicketCompleted =  User::query()->select(['first_name', 'last_name'])->withCount('userOpenTickets', 'userCompleteTickets', 'userTickets')->get();
        $categoryPertTicketCompleted = Category::query()->select(['name'])->get();
        return response()->json([
            'data' => [
                'agents_pert_tickets_completed' => $agentPertTicketCompleted,
                'categories_pert_tickets_completed' => $categoryPertTicketCompleted,
                'users_pert_tickets_completed' => $userPertTicketCompleted
            ],
        ]);
    }
}
