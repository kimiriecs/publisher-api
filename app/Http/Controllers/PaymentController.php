<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentCreateRequest;
use App\Http\Requests\PaymentUpdateRequest;
use App\Models\Payment;
use App\Models\PaymentStatus;
use App\Models\Subscription;
use App\Models\User;
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
     * Display a listing of the CONCRETE user' payments
     * 
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function userPayments(User $user)
    {
        $payments = Payment::where('user_id', $user->id)
                            ->orderByDesc('created_at')
                            ->paginate(10);

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
        
        $payments = Payment::where('user_id', $user->id)
                            ->orderByDesc('created_at')
                            ->paginate(10);

        return $payments;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Models\Subscription $subscription
     * @param  \App\Http\Requests\PaymentCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Subscription $subscription, PaymentCreateRequest $request)
    {
        $data = $request->validated();

        $payment = Payment::create([
            'encryption'        => rand(1000000000, 9999999999),
            'amount'            => $data['amount'],
            'user_id'           => Auth::user()->id,
            'subscription_id'   => $subscription->id,
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
        $payment = Payment::find($payment->id);

        return $payment;
    }


    /**
     * Display payment of CONCRETE user
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function userPaymentsShow(User $user)
    {
        $payments = Payment::where('user_id', $user->id)->get();

        return $payments;
    }


    /**
     * Display payment of currently authenticated user
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function currentUserPaymentsShow()
    {
        $user = Auth::user();

        $payments = Payment::where('user_id', $user->id)->get();

        return $payments;
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

        $payment = Payment::find($payment->id);

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
        
        $payment = Payment::find($payment->id);

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
        $payment = Payment::find($payment->id);

        $payment->delete();

        return response('resource deleted successfully', 200);
    }
}
