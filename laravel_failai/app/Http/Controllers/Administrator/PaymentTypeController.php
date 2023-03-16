<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\PaymentType;
use Faker\Provider\Payment;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    public function index(){
        $paymentsTypes = PaymentType::query()->with(['paymentsTypes'])->get();
        return view('paymenttypes.index',compact('paymentsTypes'));
    }
    public function create(){
        return view('paymenttypes.create');
    }
    public function store(Request $request){
        $paymentsType = PaymentType::create($request->all());
        return redirect()->route('paymenttypes.show',$paymentsType);
    }
    public function edit(PaymentType $paymentsType){
        return view('paymenttypes.edit',compact('paymentsType'));
    }
    public function update(Request $request, PaymentType $paymentsType){
        $paymentsType->update($request->all());
        return redirect()->route('paymenttypes.show',$paymentsType);
    }
    public function destroy(PaymentType $paymentsType){
        $paymentsType->delete();
        return redirect()->route('paymenttypes.index');
    }
    public function show(PaymentType $paymentsTypes){
        return view('paymenttypes.show',['paymentsTypes'=>$paymentsTypes]);
    }
}
