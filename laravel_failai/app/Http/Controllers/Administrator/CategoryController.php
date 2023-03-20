<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Categories::class,'categories');
    }

    public function index(){
        $categories = Categories::query()->with(['categories'])->get();
        return view('categories.index',compact('categories'));
    }
    public function store(Request $request){
        $category = Categories::create($request->all());
        return redirect()->route('categories.show',$category);
    }
    public function edit(CategoryRequest $categories){
        return view('categories.edit',compact('categories'));
    }
    public function update(Request $request,CategoryRequest $categories){
        $categories->update($request->all());
        return redirect()->route('categores.show',$categories);
    }
    public function destroy(CategoryRequest $categories){
        $categories->delete();
        return redirect('categories.index');
    }
    public function show(CategoryRequest $categories){
        return view('categories.show',['category'=>$categories]);
    }



}
