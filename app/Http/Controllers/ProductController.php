<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search(Request $request){
        $products = Product::query()->where('name' , 'LIKE' , "%$request->search%")->paginate(10);
        return view('products.index' , compact('products'));
    }
    public function index(){
        $products = Product::query()->paginate(5);
        return view('products.index' , compact('products'));
    }

    public function create(){
        return view('products.create');
    }
    
    public function store(CreateProductRequest $request){
        Product::query()->create($request->validated());
        return redirect('products');

    }
}
