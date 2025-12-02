<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return $this->success([
            'products' => Product::query()->get()
        ]); 
    }

    public function show(Product $product){
        return $this->success([
            'product' => $product
        ]);
    }

    public function store(CreateProductRequest $request){
        $product = Product::query()->create($request->validated());

        return $this->success([
            'product' => $product
        ] , '' , 201);
    }

    public function update(UpdateProductRequest $request , Product $product){
        $product->update($request->validated());

        return $this->success([
            'product' => $product
        ]);
    }



    public function destroy(Product $product){
        $product->delete();

        $this->success([]);
    }
}
