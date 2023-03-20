<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentTypesRequest;
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
    public function edit(PaymentTypesRequest $paymentsTypes){
        return view('paymenttypes.edit',compact('paymentsTypes'));
    }
    public function update(Request $request, PaymentTypesRequest $paymentsType){
        $paymentsType->update($request->all());
        return redirect()->route('paymenttypes.show',$paymentsType);
    }
    public function destroy(PaymentTypesRequest $paymentsType){
        $paymentsType->delete();
        return redirect()->route('paymenttypes.index');
    }
    public function show(PaymentTypesRequest $paymentsType){
        return view('paymenttypes.show',['paymentsType'=>$paymentsType]);
    }
}
