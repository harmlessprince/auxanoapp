<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function successResponse(string $message)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }
    public function successWithDataResponse(string $message, $data)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'result' => $data
        ]);
    }
    public function errorResponse(string $message)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ]);
    }
}
