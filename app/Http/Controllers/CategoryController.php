<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\Repository\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private  $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = $this->categoryRepository->paginate();
        return view('categories.index', compact('categories'));
    }
}
