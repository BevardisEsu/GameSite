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
        return view('categories.index',compact('categories')); //Querry all the items and pointing them towards categories/index view
    }
    public function store(Request $request){
        $category = Categories::create($request->all());
        return redirect()->route('categories.show',$category);          //Creating a new category, sending all parameters to database and redirecting towards categories.show view
    }
    public function edit(CategoryRequest $categories){
        return view('categories.edit',compact('categories'));   //Requesting all parameters for edit, after edit redirecting to categories/edit blade
    }
    public function update(Request $request,CategoryRequest $categories){
        $categories->update($request->all());
        return redirect()->route('categores.show',$categories);         //Requesting all parameters for update function, overwriting old data and redirecting towards categories/show blade
    }
    public function destroy(CategoryRequest $categories){                     // Deleting entire category and then redirecting towards categories/index
        $categories->delete();
        return redirect('categories.index');
    }
    public function show(CategoryRequest $categories){                          // Taking all categories and sending them in blade and then redirecting towards categories/show blade
        return view('categories.show',['category'=>$categories]);
    }



}
