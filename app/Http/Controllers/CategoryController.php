<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json($category);
    }
    
    public function show(Category $category)
    {
        $category->load('products');
        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        $category->loadCount('products');

        if ($category->products_count > 0) {
            return response()->json([
                'message' => 'Cannot delete category with products'
            ], 400);
        }

        $category->delete();
        return response()->json(['message' => 'Category deleted']);
    }
}
