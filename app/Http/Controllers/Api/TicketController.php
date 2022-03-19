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
        $tickets = app(Pipeline::class)->send(Ticket::query()->select('*'))->through([
            StatusFilter::class,
            PriorityFilter::class,
            CategoryFilter::class,
            TechnicianFilter::class,
            TicketNameFilter::class,
        ])->thenReturn()->latest()->paginate(20);

        return $tickets;
    }
    public function edit()
    {
    }
    public function update()
    {
    }
}
