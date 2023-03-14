<?php

namespace app\Http\Controllers\Administrator;


use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payment::query()->with(['Payments'])->get();
        return view('payments.index',compact('payment'));
    }
    public function create()
    {
        return view('payments.create');
    }
    public function store(Request $request)
    {
        $payment = Payment::create($request->all());
        return redirect()->route('payments.show',$payment);
    }
    public function edit(Payment $payment)
    {
        return view('payments.edit',compact('payment'));
    }
    public function update(Request $request, Payment $payment)
    {
        $payment->update($request->all());
        return redirect()->route('payments.show',$payment);
    }
    public function destroy(Payment $payment)
    {
        $payment ->delete();
        return redirect()->route('payments.index');
    }

    public function show(Payment $payment){

        return view('payments.show',['payment'=>$payment]);
    }


}
