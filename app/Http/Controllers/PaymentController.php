<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentCreateRequest;
use App\Http\Requests\PaymentUpdateRequest;
use App\Models\Payment;
use App\Models\PaymentStatus;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the payments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::paginate(10);

        return $payments;
    }


    /**
     * Display a listing of the CONCRETE user' payments .
     *
     * @return \Illuminate\Http\Response
     */
    public function userPayments($user)
    {
        $payments = Payment::where('user_id', $user)->paginate(10);

        return $payments;
    }


    /**
     * Display a listing of the currently authenticated user payments
     *
     * @return \Illuminate\Http\Response
     */
    public function currentUserPayments()
    {
        $user = Auth::user();
        
        $payments = Payment::where('user_id', $user)->paginate(10);

        return $payments;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PaymentCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($subscription_id, PaymentCreateRequest $request)
    {
        $data = $request->validated();

        $payment = Payment::create([
            'encryption'        => rand(1000000000, 9999999999),
            'amount'            => $data['amount'],
            'user_id'           => Auth::user()->id,
            'subscription_id'   => $subscription_id,
            'payment_status_id' => PaymentStatus::where('name', 'pending')->first('id')->id,
        ]);
        
        $payment->save();

        return $payment;
    }

    /**
     * Display the specified payment.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        $payment = Payment::find($payment);

        return $payment;
    }


    /**
     * Display the specified payment of CONCRETE user
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function userPaymentShow($user, Payment $payment)
    {
        $payment = Payment::where('user_id', $user)->find($payment);

        return $payment;
    }


    /**
     * Display the specified payment of currently authenticated user
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function currentUserPaymentShow(Payment $payment)
    {
        $user = Auth::user();

        $payment = Payment::where('user_id', $user)->find($payment);

        return $payment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PaymentUpdateRequest  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentUpdateRequest $request, Payment $payment)
    {
        $data = $request->validate();

        $payment = Payment::find($payment);

        $payment->encryption = $data['encryption'];
        $payment->amount = $data['amount'];
        $payment->user_id = $data['user_id'];
        $payment->subscription_id = $data['subscription_id'];
        $payment->payment_status_id = $data['payment_status_id'];

        $payment->save();

        return $payment;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PaymentUpdateRequest  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function updatePaymentStatus(PaymentUpdateRequest $request, Payment $payment)
    {
        $data = $request->validate();

        $payment->payment_status_id = $data['payment_status_id'];

        $payment->save();

        return $payment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment = Payment::find($payment);

        return $payment->delete();
    }
}
