<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatusesRequest;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(){
        $status = Status::query()->with(['status'])->get();
        return view('statuses.index',compact('status'));
    }
    public function create(){
        return view('statuses.create');
    }
    public function store(Request $request)
    {
        $status = Status::create($request->all());
        return redirect()->route('statuses.show',$status);
    }
    public function edit(StatusesRequest $status){

        return view('statuses.edit',compact('status'));
    }
    public function update(Request $request, StatusesRequest $status){
        $status->update($request->all());
        return redirect()->route('statuses.show',$status);
    }
    public function destroy(StatusesRequest $status){
        $status->delete();
        return redirect()->route('statuses.show');
    }
    public function show(StatusesRequest $status){
        return view('statuses.show',['status'=>$status]);
    }
}
