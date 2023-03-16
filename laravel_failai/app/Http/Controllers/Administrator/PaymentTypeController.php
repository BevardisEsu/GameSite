<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\PaymentsTypes;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    public function index(){
        $paymentsTypes = PaymentsTypes::query()->with(['paymentsTypes'])->get();
        return view('paymenttypes.index',compact('paymentsTypes'));
    }
    public function create(){
        return view('paymenttypes.create');
    }
    public function store(Request $request){
        $paymentsType = PaymentsTypes::create($request->all());
        return redirect()->route('paymenttypes.show',$paymentsType);
    }
    public function edit(PaymentsTypes $paymentsTypes){
        return view('paymenttypes.edit',compact('paymentsTypes'));
    }
    public function update(Request $request, PaymentsTypes $paymentsType){
        $paymentsType->update($request->all());
        return redirect()->route('paymenttypes.show',$paymentsType);
    }
    public function destroy(PaymentsTypes $paymentsType){
        $paymentsType->delete();
        return redirect()->route('paymenttypes.index');
    }
    public function show(PaymentsTypes $paymentsType){
        return view('paymenttypes.show',['paymentsType'=>$paymentsType]);
    }
}
