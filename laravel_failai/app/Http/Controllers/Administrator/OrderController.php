<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(){
        $this->authorizeResource(Order::class,'orders');
    }

    public function index(){
        $order = Order::query()->with(['order'])->get();
        return view('orders.index',compact('order'));
    }
    public function create(){

        return view('orders.create');
    }
    public function store(Request $request){

        $order = Order::create($request->all())+ ['status_id'=>Status::query()->where(['type'=>'order','name'=>Status::STATE_NEW])->first()->id];

        return redirect()->route('orders.show',$order);
    }
    public function edit(Order $order){
        return view('orders.edit',compact('order'));
    }
    public function update(Request $request,Order $order){
        $order->update($request->all());
        return redirect()->route('orders.show',$order);
    }
    public function destroy(Order $order){
        $order->delete();
        return redirect()->route('orders.index');
    }
    public function show(Order $order){
        return view('orders.show',['orders'=>$order]);
    }



}

