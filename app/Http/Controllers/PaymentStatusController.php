<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusCreateRequest;
use App\Http\Requests\StatusUpdateRequest;
use App\Models\PaymentStatus;

class PaymentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentStatuses = PaymentStatus::all();

        return $paymentStatuses;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StatusCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusCreateRequest $request)
    {
        $data = $request->validated();

        $paymentStatuses = PaymentStatus::create([
          'name'        => $data['name'],
          'description' => $data['description'],
        ]);

        $paymentStatuses->save();

        return $paymentStatuses;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentStatus  $paymentStatus
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentStatus $paymentStatus)
    {
        $paymentStatus = PaymentStatus::find($paymentStatus->id);

        return $paymentStatus;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StatusUpdateRequest  $request
     * @param  \App\Models\PaymentStatus  $paymentStatus
     * @return \Illuminate\Http\Response
     */
    public function update(StatusUpdateRequest $request, PaymentStatus $paymentStatus)
    {
        $data = $request->validated();

        $paymentStatus = PaymentStatus::find($paymentStatus->id);

        $paymentStatus->name = $data['name'];
        $paymentStatus->description = $data['description'];

        $paymentStatus->save();

        return $paymentStatus;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentStatus  $paymentStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentStatus $paymentStatus)
    {
        $paymentStatus = PaymentStatus::find($paymentStatus->id);

        $paymentStatus->delete();

        return response('resource updated successfully', 200);
    }
}
