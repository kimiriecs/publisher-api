<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentMethodCreateRequest;
use App\Http\Requests\PaymentMethodUpdateRequest;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::all();

        return $paymentMethods;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \AppHttp\Requests\PaymentMethodCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentMethodCreateRequest $request)
    {
        $data = $request->validated();

        $paymentMethod = PaymentMethod::create([
            'name'                      => $data['name'],
            'payment_method_status_id'  => $data['payment_method_status_id'],
        ]);

        $paymentMethod->save();

        return $paymentMethod;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod)
    {
        $paymentMethod = PaymentMethod::find($paymentMethod->id);

        return $paymentMethod;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PaymentMethodUpdateRequest  $request
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentMethodUpdateRequest $request, PaymentMethod $paymentMethod)
    {
        $data = $request->validated();

        $paymentMethod = PaymentMethod::find($paymentMethod->id);

        $paymentMethod->name = $data['name'];
        $paymentMethod->payment_method_status_id = $data['payment_method_status_id'];

        $paymentMethod->save();

        return $paymentMethod;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod = PaymentMethod::find($paymentMethod->id);

        $paymentMethod->delete();

        return response('resource updated successfully', 200);
    }
}
