<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
     /**
     * Display bookings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PaymentTypesDataTable $dataTable)
    {
        return $dataTable->render('payment_types.index');
    }

        /**
     * Get Payment Type
     */
    public function show($paymentTypeId){

        $this->authorize('view', [PaymentType::class, $paymentTypeId]);

        $payment_type = PaymentType::findOrfail($paymentTypeId);
        
        return view('payment_types.show',[
            'payment_type' => $payment_type
        ]);
    }

      /**
     * Show create Payment Type
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {

        // $this->authorize('create', [PaymentType::class]);
        // $roles = Role::all();

        return view('payment_types.create',[
        ]);

    }

      /**
     * Create Payment Type
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        // $this->authorize('create', [PaymentType::class]);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'sometimes',
        ]);

        $payment_type = new PaymentType();
        $payment_type->name = $request->name;
        $payment_type->description = $request->description;
        $payment_type->save();

        // flash("{$payment_role->name} created.")->success();

        return redirect()->route('payment_types.index');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentType $paymentType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentType $paymentType)
    {
        //
    }
}
