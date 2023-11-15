<?php

namespace App\Http\Controllers;

use App\Models\PaymentLog;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;

class UserController extends Controller
{
  
          /**
     * Display users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentLog  $paymentLog
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentLog $paymentLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentLog  $paymentLog
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentLog $paymentLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentLog  $paymentLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentLog $paymentLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentLog  $paymentLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentLog $paymentLog)
    {
        //
    }
}
