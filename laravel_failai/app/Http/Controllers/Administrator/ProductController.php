<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $product = Product::query()->with(['product'])->get();
        return view('product.index',compact('product'));
    }
    public function create(){

        return view('product.create');
    }
    public function store(Request $request){
        $product = Product::create($request->all);
        return redirect()->route('product.show',$product);
    }
    public function edit(Product $product){
        return view('product.edit',compact('product'));
    }
    public function update(Request $request,Product $product){

        $product->update($request->all());
        //TODO Reikia įdėti failo įdėjimo funkcionalumą
        $product->save();
        return redirect()->route('product.show',$product);
    }
    public function destroy(Product $product){
        $product ->delete();
        return redirect()->route('product.show');
    }
    public function show(Product $product){
        return view('product.show',['product'=>$product]);
    }
}
