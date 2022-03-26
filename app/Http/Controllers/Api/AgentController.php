<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => User::agents(['id', 'first_name', 'last_name'])->get(),
        ]);
    }
}
