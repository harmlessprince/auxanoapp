<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Category::latest()->get(['id', 'name']),
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => ['required', Rule::unique('categories', 'name')->ignore($category->id)]
        ]);
        $category->update([
            'name' => $request->name
        ]);
        return $this->successResponse('Category has been successfully updated');
    }
    public function destroy(Category $category)
    {
        if ($category->tickets()->exists()) {
            return $this->errorResponse('A ticket is associated with this category, it can not be deleted');
        }
        $category->delete();
        return $this->successResponse('Category deleted successfully');
    }
}
