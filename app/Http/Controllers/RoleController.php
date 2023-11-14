<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * Display bookings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ActivitiesDataTable $dataTable)
    {
        return $dataTable->render('activities.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', [Booking::class]);

        return view('activities.create');
    }


}
