<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    //
       /**
     * Display payments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PaymentsDataTable $dataTable)
    {
        return $dataTable->render('payments.index');
    }

    /**
     *Show Approve Payment
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function showApprove(Request $request, $paymentId)
    {
        // $this->authorize('access', [Patient::class]);

        $payment = Payment::findorfail($paymentId);

        $types = PaymentType::get();

        return view('payments.approve',[
            'payment' => $payment,
            'types' => $types
        ]);

    }

       /**
     * Approve payment
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function approve(Request $request, $paymentId)
    {
        // $this->authorize('create', [User::class]);

        $this->validate($request, [
            'payment_type' => 'sometimes|integer',
            'amount' => 'sometimes|integer',
            'mode_of_payment' => 'sometimes',
            'remarks' => 'sometimes',
        ]);

        $payment = Payment::with('case_note')->findOrfail($paymentId);

        $payment->payment_type_id = $request->input('payment_type', $payment->payment_type_id);
        $payment->status = 1;
        $payment->mode_of_payment = $request->input('mode_of_payment', $payment->mode_of_payment);
        $payment->amount = $request->input('amount', $payment->amount);
        $payment->remarks = $request->input('remarks', $payment->remarks);
        $payment->save();

        // flash("{$payment->payment_reference_no} approved.")->success();

        return redirect()->route('payments.index');

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
    public function destroy($paymentId)
    {
        // $this->authorize('delete', [Payment::class, $paymentId]);

        $payment = Payment::findOrFail($paymentId);

        $payment->delete();

        flash('Payment has been deleted.')->error()->important();

        return redirect()->route('payments.index');
    }

}
