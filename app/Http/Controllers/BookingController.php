<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
     /**
     * Display bookings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookingsDataTable $dataTable)
    {
        return $dataTable->render('bookings.index');
    }

    /**
     * Show create page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $this->authorize('create', [Booking::class]);
        $packages = Package::get();
        $activities = Activity::get();
    
        return view('bookings.create',[
            'packages' => $packages,
            'activities' => $activities
        ]);
    }
   /**
     * Store booking.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->authorize('create bookings');

        $this->validate($request, [
            'traveller_name' => 'required',
            'traveller_phone_no' => 'required',
            'traveller_flight_no' => 'required',
            'no_of_adults' => 'nullable',
            'no_of_children' => 'nullable',
            'no_of_people' => 'nullable',
            'package' => 'nullable|exists:packages,id',
            'activities_ids' => 'required|array',
            'activities_ids.*' => "required|exists:activities,id",
            'from_date' => 'sometimes|date_format:Y-m-d',
            'to_date' => 'sometimes|date_format:Y-m-d|after:from_date'
        ]);

        $activity_amount =  array_sum($request->activities); 

        $total_amount = bcmul($request->no_of_people, $activity_amount);

        $booking = new Booking();
        $booking->booking_no = 'BN-'.$this->generate_booking_number();
        $booking->traveller_name = $request->traveller_name;
        $booking->traveller_phone_no = $request->traveller_phone_no;
        $booking->traveller_flight_no = $request->traveller_flight_no;
        $booking->package_id = $request->package;
        $booking->status = 'pending';
        $booking->no_of_adults = $request->no_of_adults;
        $booking->total_amount = $total_amount;
        $booking->no_of_children = $request->no_of_children;
        $booking->activity_ids = $request->activities_ids;
        $booking->no_of_people = $request->no_of_people;
        $booking->from_date = $request->from_date;
        $booking->to_date = $request->to_date;
        $booking->save();

        // flash("{$booking->traveller_name} created.")->success();
        return redirect()->route('bookings.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($booking)
    {

        $booking = Booking::find($booking);
        $activities = Activity::get();
        $booking_activities = Activity::whereIn('id', $booking->activity_ids);
        $booked = '';

        foreach ($booking->activity_ids as $activity) {
            foreach ($activities as $booked_activity) {
                if ($booked_activity['id'] == $activity) {
                    $booked .= $booked_activity->activity_name . ', ';
                    break;
                }
            }
        }

        $booking['booked_activities'] = rtrim($booked, ', ');

        return view('bookings.show', [
            'booking' => $booking,
            'activities'  => $booking_activities
        ]);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function showCancel(Request $request, $booking)
    {

        $booking = Booking::find($booking);
        $activities = Activity::get();
        $booking_activities = Activity::whereIn('id', $booking->activity_ids);
        $booked = '';

        foreach ($booking->activity_ids as $activity) {
            foreach ($activities as $booked_activity) {
                if ($booked_activity['id'] == $activity) {
                    $booked .= $booked_activity->activity_name . ', ';
                    break;
                }
            }
        }

        $booking['booked_activities'] = rtrim($booked, ', ');

        return view('bookings.cancel', [
            'booking' => $booking,
            'activities'  => $booking_activities
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function showApprove(Request $request, $booking)
    {

        $booking = Booking::find($booking);
        $activities = Activity::get();
        $booking_activities = Activity::whereIn('id', $booking->activity_ids);
        $booked = '';

        foreach ($booking->activity_ids as $activity) {
            foreach ($activities as $booked_activity) {
                if ($booked_activity['id'] == $activity) {
                    $booked .= $booked_activity->activity_name . ', ';
                    break;
                }
            }
        }

        $booking['booked_activities'] = rtrim($booked, ', ');

        return view('bookings.approve', [
            'booking' => $booking,
            'activities'  => $booking_activities
        ]);
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function showReserve(Request $request, $booking)
    {

        $booking = Booking::find($booking);
        $activities = Activity::get();
        $booking_activities = Activity::whereIn('id', $booking->activity_ids);
        $booked = '';

        foreach ($booking->activity_ids as $activity) {
            foreach ($activities as $booked_activity) {
                if ($booked_activity['id'] == $activity) {
                    $booked .= $booked_activity->activity_name . ', ';
                    break;
                }
            }
        }

        $booking['booked_activities'] = rtrim($booked, ', ');

        return view('bookings.reserve', [
            'booking' => $booking,
            'activities'  => $booking_activities
        ]);
    }

    /**
     * Show edit page
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($booking)
    {
        
        $booking = Booking::find($booking);

        $activities = Activity::get();

        return view('bookings.edit', [
            'booking' => $booking,
            'activities' =>  $activities
        ]);

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
