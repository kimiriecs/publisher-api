<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusCreateRequest;
use App\Http\Requests\StatusUpdateRequest;
use App\Models\PaymentMethodStatus;

class PaymentMethodStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentMethodStatuses = PaymentMethodStatus::all();

        return $paymentMethodStatuses;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StatusCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusCreateRequest $request)
    {
        $data = $request->validatedd();

        $paymentMethodStatus = PaymentMethodStatus::create([
          'name'        => $data['name'],
          'description' => $data['description'],
        ]);

        $paymentMethodStatus->save();

        return $paymentMethodStatus;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentMethodStatus  $paymentMethodStatus
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethodStatus $paymentMethodStatus)
    {
        $paymentMethodStatus = PaymentMethodStatus::find($paymentMethodStatus->id);

        return $paymentMethodStatus;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StatusUpdateRequest  $request
     * @param  \App\Models\PaymentMethodStatus  $paymentMethodStatus
     * @return \Illuminate\Http\Response
     */
    public function update(StatusUpdateRequest $request, PaymentMethodStatus $paymentMethodStatus)
    {
        $data = $request->validatedd();

        $paymentMethodStatus = PaymentMethodStatus::find($paymentMethodStatus->id);

        $paymentMethodStatus->name = $data['name'];
        $paymentMethodStatus->description = $data['description'];

        $paymentMethodStatus->save();

        return $paymentMethodStatus;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentMethodStatus  $paymentMethodStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethodStatus $paymentMethodStatus)
    {
        $paymentMethodStatus = PaymentMethodStatus::find($paymentMethodStatus->id);

        $paymentMethodStatus->delete();

        return response('resource updated successfully', 200);
    }
}
