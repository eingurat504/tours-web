<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use App\DataTables\PaymentsDataTable;

class PaymentController extends Controller
{

    
    /**
     * Display payments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PaymentsDataTable $dataTable)
    {
        $this->authorize('viewAny', [Payment::class]);

        return $dataTable->render('payments.index');
    }

    /**
     * Remove the specified role from storage.
     *
     * @param int $paymentId
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($paymentId)
    {
        $this->authorize('Delete Payments', [Payment::class, $paymentId]);

        $payment = Payment::findOrFail($paymentId);

        $payment->delete();

        flash('Payment has been deleted.')->error()->important();

        return redirect()->route('payments.index');
    }

}
