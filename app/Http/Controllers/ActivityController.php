<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\DataTables\ActivitiesDataTable;

class ActivityController extends Controller
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function activities()
    {
        // $this->authorize('create', [Booking::class]);
        $events = [];
 
        $activities = Booking::where('status', 'pending')->get();

        foreach ($activities as $activity) {
            $events[] = [
                // 'title' => $activity->client->name . ' ('.$activity->employee->name.')',
                'title' => $activity->traveller_name,
                'activities' => $activity->booking_no,
                'start' => $activity->from_date,
                'end' => $activity->to_date,
            ];
        }

        return view('activities.calender', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $this->validate($request, [
            'activity_name' => 'required',
            'duration' => 'required|integer',
            'description' => 'required',
            'amount' => 'required|integer',
        ]);

        $activity = new Activity();
        $activity->activity_name = $request->activity_name;
        $activity->duration = $request->duration;
        $activity->description = $request->description;
        $activity->amount = $request->amount;
        $activity->save();

        // flash("{$activity->activity_name} created.")->success();

        return redirect()->route('activities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show($activityId)
    {

        $activity = Activity::find($activityId);

        return view('activities.show', [
            'activity' => $activity
        ]);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit($activityId)
    {

        $activity = Activity::find($activityId);

        return view('activities.edit', [
            'activity' =>  $activity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $activityId)
    {
        //
        $this->validate($request, [
            'activity_name' => 'required',
            'duration' => 'required',
            'description' => 'required',
            'amount' => 'nullable',
        ]);

        $activity = Activity::find($activityId);

        $activity->activity_name = $request->input('activity_name' ,  $activity->activity_name);
        $activity->duration = $request->input('duration', $activity->duration);
        $activity->description = $request->input('description', $activity->description);
        $activity->amount = $request->input('amount', $activity->amount);
        $activity->save();

        // flash("{$booking->traveller_name} created.")->success();

        return redirect()->route('activities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
