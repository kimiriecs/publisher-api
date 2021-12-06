<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurrencyCreateRequest;
use App\Http\Requests\CurrencyUpdateRequest;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currency = Currency::all();

        return $currency;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CurrencyCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyCreateRequest $request)
    {
        $data = $request->validatedd();

        $currency = Currency::create([
          'name'    => $data['name'],
          'symbol'  => $data['symbol'],
        ]);

        $currency->save();

        return $currency;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        $currency = Currency::find($currency->id);

        return $currency;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CurrencyUpdateRequest  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyUpdateRequest $request, Currency $currency)
    {
        $data = $request->validatedd();

        $currency = Currency::find($currency->id);

        $currency->name = $data['name'];
        $currency->symbol = $data['symbol'];

        $currency->save();

        return $currency;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $currency = Currency::find($currency->id);

        $currency->delete();

        return response('resource deleted successfully', 200);
    }
}
