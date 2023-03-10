<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(){
        $status = Status::query()->with(['status'])->get();
        return view('status.index',compact('status'));
    }
    public function create(){
        return view('status.create');
    }
    public function store(Request $request)
    {
        $status = new Status();
        $status->name = $request->name;
        $status->type = $request->type;
    }
    public function edit(Status $status){

        return view('status.edit',compact('status'));
    }
    public function update(Request $request, Status $status){
        $status->update($request->all());
        return redirect()->route('status.show',$status);
    }
    public function destroy(Status $status){
        $status->delete();
        return redirect()->route('status.show');
    }
    public function show(Status $status){
        return view('status.show',['status'=>$status]);
    }
}
