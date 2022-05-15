<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\Repository\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
       
        return view('categories.index');
    }
}
