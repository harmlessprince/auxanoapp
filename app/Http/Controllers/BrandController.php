<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    public function index()
    {
        return view('brands.index');   
    }

    public function allBrands()
    {
        return response()->json([
            'data' => Brand::latest()->get(['id', 'name']),
        ]);
    }

    public function update(Request $request, Brand $brand)
    {
        $this->validate($request, [
            'name' => ['required', Rule::unique('brands', 'name')->ignore($brand->id)]
        ]);
        $brand->update([
            'name' => $request->name
        ]);
        return $this->successResponse('Brand has been successfully updated');
    }
    public function destroy(Brand $brand)
    {
        if ($brand->item()->exists()) {
            return $this->errorResponse('A ticket is associated with this brand, it can not be deleted');
        }
        $brand->delete();
        return $this->successResponse('Brand deleted successfully');
    }
}
