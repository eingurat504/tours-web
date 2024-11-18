<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Activity;
use App\Models\Package;
use App\DataTables\BookingsDataTable;
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
        $this->authorize('create', [Booking::class]);

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
        $this->authorize('create bookings');

        $this->validate($request, [
            'traveller_name' => 'required',
            'traveller_phone_no' => 'required',
            'traveller_flight_no' => 'required',
            'no_of_adults' => 'nullable',
            'no_of_children' => 'nullable',
            'no_of_people' => 'nullable',
            'activities' => 'nullable',
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
        $booking->status = 'reserved';
        $booking->no_of_adults = $request->no_of_adults;
        $booking->total_amount = $total_amount;
        $booking->no_of_children = $request->no_of_children;
        $booking->activity_ids = $request->activities_ids;
        $booking->no_of_people = $request->no_of_people;
        $booking->from_date = $request->from_date;
        $booking->to_date = $request->to_date;
        $booking->save();

        flash("{$booking->booking_no} created.")->success();

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
    public function showConfirm(Request $request, $booking)
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

        return view('bookings.confirm', [
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
     * Update .
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $booking)
    {

          $this->authorize('update bookings');

          $this->validate($request, [
            'traveller_name' => 'required',
            'traveller_phone_no' => 'required',
            'traveller_flight_no' => 'required',
            'no_of_adults' => 'nullable',
            'no_of_children' => 'nullable',
            'no_of_people' => 'nullable',
            'package' => 'nullable|exists:packages,id',
            'activities' => 'required|array',
            'activities.*' => "required|exists:activities,id",
            'from_date' => 'sometimes|date_format:Y-m-d',
            'to_date' => 'sometimes|date_format:Y-m-d|after:from_date'
        ]);

        $booking = Booking::find($booking);

        $booking->booking_no = $request->input('booking_no',  $booking->booking_no);
        $booking->traveller_name = $request->input('traveller_name' ,  $booking->traveller_name);
        $booking->traveller_phone_no = $request->input('traveller_phone_no ',  $booking->traveller_phone_no);
        $booking->traveller_flight_no = $request->input('traveller_flight_no' ,  $booking->traveller_flight_no);
        $booking->package_id = $request->input('package',  $booking->package);
        $booking->status = 'pending';
        $booking->no_of_adults = $request->input('no_of_adults', $booking->no_of_adults);
        $booking->no_of_children = $request->input('no_of_children', $booking->no_of_children);
        $booking->activity_ids = $request->input('activities', $booking->activities);
        $booking->no_of_people = $request->input('no_of_people', $booking->no_of_people);
        $booking->from_date = $request->input('from_date', $booking->from_date);
        $booking->to_date = $request->input('to_date', $booking->to_date);
        $booking->save();

    }

    /**
     * Cancel Booking .
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function cancel(Request $request, $bookingId)
    {

          $this->authorize('cancel bookings');
        
        $book = Booking::findorfail($bookingId);

        Booking::where('id', $bookingId)
                ->update([
                    'status' => 'cancelled'
                ]);

                      // flash("{$booking->traveller_name} created.")->success();
        return redirect()->route('bookings.index');
        
    }

    /**
     * Reserve booking .
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request, $bookingId)
    {

          $this->authorize('confirm bookings');

          $this->validate($request, [
            'amount' => 'required',
            'mode_of_payment' => 'required',
            'remarks' => 'required',
        ]);
        
          $booking = Booking::findorfail($bookingId);

          Booking::where('id', $bookingId)
                  ->where('status', 'reserved')
                  ->update([
                      'status' => 'confirmed'
                  ]);

            $payment = new Payment();
            $payment->payment_reference_no = 'PRN-'.$booking->traveller_name.'-'.$booking->booking_no;
            $payment->booking_id = $booking->id;
            $payment->amount = $request->amount;
            $payment->mode_of_payment = $request->mode_of_payment;
            $payment->status = 0; 
            $payment->remarks = $request->remarks;
            $payment->save();
  
            flash("{$booking->booking_no} confirmed.")->success();

          return redirect()->route('bookings.index');
        
    }


    /**
     * Remove booking.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }


        /**
     * Generate Booking Number.
     *
     * @param int $length Desired password length
     *
     * @return string Random password string
     */
    protected function generate_booking_number($length = 6)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
