<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\DataTables\ActivitiesDataTable;

class ActivityController extends Controller
{

    /**
     * Display activities.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ActivitiesDataTable $dataTable)
    {

        $this->authorize('viewAny', [Activity::class]);

        return $dataTable->render('activities.index');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', [Activity::class]);

        return view('activities.create');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function activities()
    {
        $this->authorize('create', [Activity::class]);

        $events = [];
 
        $activities = Booking::where('status', 'pending')->get();

        foreach ($activities as $activity) {
            $events[] = [
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

        $this->authorize('create', [Activity::class]);
    
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

        flash("{$activity->activity_name} created.")->success();

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

        $this->authorize('view', [Activity::class,$activityId]);

        $activity = Activity::find($activityId);

        return view('activities.show', [
            'activity' => $activity
        ]);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  $activityid
     * @return \Illuminate\Http\Response
     */
    public function edit($activityId)
    {

        $this->authorize('update', [Activity::class, $activityId]);

        $activity = Activity::find($activityId);

        return view('activities.edit', [
            'activity' =>  $activity
        ]);
    }

    /**
     * Update activity.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $activityId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $activityId)
    {
        $this->authorize('update', [Activity::class, $activityId]);

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

        flash("{$activity->activity_name} updated.")->success();

        return redirect()->route('activities.index');
    }

    /**
     * Remove activity.
     *
     * @param  $activityId
     * @return \Illuminate\Http\Response
     */
    public function destroy($activityId)
    {
        //
    }
}
