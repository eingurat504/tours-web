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
     * Show edit Payment Type
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Request $request, $paymentTypeId)
    {

        $this->authorize('update', [PaymentType::class, $paymentTypeId]);

        $payment_type = PaymentType::findOrfail($paymentTypeId);

        return view('payment_types.edit',[
            'payment_type' => $payment_type
        ]);

    }

    /**
     * Update Payment Type
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $paymentTypeId)
    {
        $this->authorize('update', [PaymentType::class, $paymentTypeId]);

        $this->validate($request, [
            'name' => 'sometimes',
            'description' => 'sometimes',
        ]);

        $payment_type = PaymentType::findOrfail($paymentTypeId);

        $payment_type->name = $request->input('name', $payment_type->name);
        $payment_type->description = $request->input('description', $payment_type->description);
        $payment_type->save();

        // flash("{$payment_type->name} updated.")->success();

        return redirect()->route('payment_types.index');

    }

               /**
     * Remove the specified role from storage.
     *
     * @param int $roleId
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($paymentTypeId)
    {
        // $this->authorize('delete', [PaymentType::class]);

        $payment_type = PaymentType::findOrFail($paymentTypeId);

        $payment_type->delete();

        flash('Payment Type has been deleted.')->error()->important();

        return redirect()->route('payment_types.index');
    }
    
}
