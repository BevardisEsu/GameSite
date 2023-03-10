<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\PaymentType;
use Faker\Provider\Payment;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    public function index(){
        $paymentTypes = PaymentType::query()->with(['paymentType'])->get();
        return view('paymentType.index',compact('paymentTypes'));
    }
    public function create(){
        return view('paymentType.create');
    }
    public function store(Request $request){
        $paymentTypes = PaymentType::create($request->all());
        return redirect()->route('paymentType.show',$paymentTypes);
    }
    public function edit(PaymentType $paymentType){
        return view('paymentType.edit',compact('paymentType'));
    }
    public function update(Request $request, PaymentType $paymentType){
        $paymentType->update($request->all());
        return redirect()->route('paymentType.show',$paymentType);
    }
    public function destroy(PaymentType $paymentType){
        $paymentType->delete();
        return redirect()->route('paymentType.index');
    }
    public function show(PaymentType $paymentType){
        return view('paymentType.show',['paymentType'=>$paymentType]);
    }
}
