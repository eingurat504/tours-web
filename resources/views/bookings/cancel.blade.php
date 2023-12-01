@extends('layouts.core.base')

@section('title', 'Bookings')

@section('breadcrumb')
    <h1 class="page-title">Bookings</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('bookings.index') }}">Bookings</a></li>
        <li class="breadcrumb-item"><a href="{{ route('bookings.show' , $booking->id) }}">{{ $booking->booking_no }}</a></li>
        <li class="breadcrumb-item active">Cancel</li>
    </ol>
@endsection

@section('content')

<form method="POST" action="{{ route('bookings.cancel', $booking->id) }}">
        @csrf
        @method('PUT')
    <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-12">
            <!-- Panel -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $booking->booking_no }}</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table no-wrap">
                            <tbody>

                            <tr>
                                <td class="text-gray">Booking No: </td>
                                <td>
                                    {{ $booking->booking_no }}
                                </td>
                            </tr>

                            <tr>
                                <td class="text-gray">Traveller Name:</td>
                                <td>{{ $booking->traveller_name }}</td>
                            </tr>
                           
                            <tr>
                                <td class="text-gray">Traveller Phone Number:</td>
                                <td>{{ $booking->traveller_phone_no }}</td>
                            </tr>

                            <tr>
                                <td class="text-gray">Traveller Flight Number:</td>
                                <td>{{ $booking->traveller_flight_no }}</td>
                            </tr>

                                 
                            <tr>
                                <td class="text-gray">Status: </td>
                                <td>{{ $booking->status }}</td>
                            </tr>
                            
                            <tr>
                                <td class="text-gray">No Of People: </td>
                                <td>{{ $booking->no_of_people }}</td>
                            </tr>
                           
                            <tr>
                                <td class="text-gray">No of Activities: </td>
                                <td>
                                    {{ $activities->count() }}
                                </td>
                            </tr>
                              
                            <tr>
                                <td class="text-gray">Activities: </td>
                                <td>
                                    {{ $booking->booked_activities }}
                                </td>
                            </tr>

                            <tr>
                                <td class="text-gray">Total Amount: </td>
                                <td>
                                     {{ $booking->total_amount }}
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <!-- Panel -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Details</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table no-wrap">
                            <tbody>
                            <tr>
                                <td class="text-gray">Start date</td>
                                <td>{{ $booking->from_date }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">End date:</td>
                                <td>{{ $booking->to_date }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Created At</td>
                                <td>{{ $booking->created_at }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Updated At</td>
                                <td>{{ $booking->updated_at }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <label for="description">Brief description:</label>
                        <textarea title="Description"
                                    class="form-control form-control-lg @error('description') is-invalid @enderror"
                                    rows="6"
                                    name="description"
                                    data-error-container="#editor1_error">{{ old('description' ) }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-xs-6 col-md-6 col-lg-6">
                            <a href="{{ route('bookings.index') }}"
                               class="btn btn-block btn-light btn-lg font-weight-medium auth-form-btn">
                                {{ __('CANCEL') }}
                            </a>

                        </div>
                        <div class="col-sm-6 col-xs-6 col-md-6 col-lg-6">
                            <button type="submit" class="btn btn-block btn-success btn-lg">
                                <i class="icon md-minus-square" aria-hidden="true"></i>
                                <span class="hidden-sm-down">Cancel</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection