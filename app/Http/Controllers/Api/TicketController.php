<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\QueryFilters\CategoryFilter;
use App\QueryFilters\PriorityFilter;
use App\QueryFilters\StatusFilter;
use App\QueryFilters\TechnicianFilter;
use App\QueryFilters\TicketNameFilter;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;


class TicketController extends Controller
{
    public function index(Request $request)
    {
        // array:5 [
        //     "status" => "1"
        //     "category" => "1"
        //     "priority" => "1"
        //     "technician" => "1"
        //     "ticket_name" => null
        //   ]
        $tickets = app(Pipeline::class)->send(Ticket::query()->select('*'))->through([
            StatusFilter::class,
            PriorityFilter::class,
            CategoryFilter::class,
            TechnicianFilter::class,
            TicketNameFilter::class,
        ])->thenReturn()->latest()->paginate();
        return response()->json([
            'data' => $tickets,
        ]);
    }
}
