<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::query()->with(['products'])->get();
        return view('products.index',compact('products'));
    }
    public function create(){

        return view('products.create');
    }
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        if ($request->hasFile('picture')) {
            $imagePath = $request->file('picture')->store('public_html/img/products'); // store the file in the storage/app/public/images directory
            $product->image = $imagePath;
        }
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('products.index');
    }
    public function edit(ProductsRequest $product){
        return view('products.edit',compact('product'));
    }
    public function update(Request $request,ProductsRequest $product){

        $product->update($request->all());
        //TODO Reikia įdėti failo įdėjimo funkcionalumą
        $product->save();
        return redirect()->route('product.show',$product);
    }
    public function destroy(ProductsRequest $product){
        $product ->delete();
        return redirect()->route('products.index');
    }
    public function show(ProductsRequest $product){
        return view('products.show',['product'=>$product]);
    }
}
