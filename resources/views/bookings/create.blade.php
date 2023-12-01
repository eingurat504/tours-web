@extends('layouts.core.base')

@section('title', 'Bookings')

@section('breadcrumb')
    <h1 class="page-title">Bookings</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('bookings.index') }}">Bookings</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@push('extra-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script type="text/javascript">

        var from_date = $('form#project_form').find('input[name=from_date]').data('value');
        if (from_date) {
            $("input[name='from_date']").val(from_date);
        } else {
            $("input[name='from_date']").val(moment().subtract(1, 'month').format('YYYY-MM-DD H:i:s'));
        }

        var to_date = $('form#training_report').find('input[name=to_date]').data('value');
        if (to_date) {
            $("input[name='to_date']").val(to_date);
        } else {
            $("input[name='to_date']").val(moment().format('YYYY-MM-DD H:i:s'));
        }

    </script>
     <script type="text/javascript">
      $(document).ready( function () {
            $("input[type=checkbox]").on( "click", function (){
                var booking_price = 0;
                $("input:checked").each(function(){ // iterate through each checked element.
                    booking_price += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
                });     

                $("#booking_amount").text(booking_price);
                
            });
      });

    </script>
@endpush

@section('content')

<form method="POST" action="{{ route('bookings.store') }}">
        @csrf

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <!-- Panel -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Create Booking</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="traveller_name">Traveller Name:</label>
                            <input type="text" name="traveller_name" id="traveller_name" required
                                   class="form-control form-control-lg @error('traveller_name') is-invalid @enderror"
                                   value="{{ old('traveller_name') }}"/>
                            @error('traveller_name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="traveller_phone_no">Traveller Phone Number:</label>
                            <input type="text" name="traveller_phone_no" id="traveller_phone_no" required
                                   class="form-control form-control-lg @error('traveller_phone_no') is-invalid @enderror"
                                   value="{{ old('traveller_phone_no') }}"/>
                            @error('traveller_flight_no')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="traveller_flight_no">Traveller Flight Number:</label>
                            <input type="text" name="traveller_flight_no" id="traveller_flight_no" required
                                   class="form-control form-control-lg @error('traveller_flight_no') is-invalid @enderror"
                                   value="{{ old('traveller_flight_no') }}"/>
                            @error('traveller_flight_no')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_of_people">No of People:</label>
                            <input type="integer" name="no_of_people" id="no_of_people" required
                                   class="form-control form-control-lg @error('no_of_people') is-invalid @enderror"
                                   value="{{ old('no_of_people') }}"/>
                            @error('no_of_people')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="from_date">Start Date:</label>
                            <input type="date" name="from_date" id="from_date" required
                                   class="form-control form-control-lg @error('from_date') is-invalid @enderror"
                                   value="{{ old('from_date') }}" data-date-format="YYYY-MM-DD"/>
                            @error('from_date')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="to_date">End Date:</label>
                            <input type="date" name="to_date" id="to_date" required
                                   class="form-control form-control-lg @error('to_date') is-invalid @enderror"
                                   value="{{ old('to_date') }}" data-date-format="YYYY-MM-DD"/>
                            @error('to_date')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Activities:</h3>
                    </div>
                    <div class="panel-body">
                        @foreach($activities as $activity)
                                <div class="col-lg-9 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"
                                                    name="activities[]"
                                                    value="{{ $activity['amount'] }}" {{ ($activity['id'] === true) ? 'checked' : '' }} />
                                            {{ $activity->activity_name }} - ${{ $activity->amount }}
                                        </label>
                                        
                                        <input type="hidden" name="activities_ids[]" value="{{ $activity['id'] }}">
                                    </div>
                                </div>
                        @endforeach
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                        <h4>TOTAL AMOUNT:</h4>
                                </div>
                                <div id="booking_amount" class="col-lg-6 col-md-6 col-xs-12" style="font-style:bold; font-size:20px;">
                                    0
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <a href="{{ route('bookings.index') }}"
                                       class="btn btn-lg btn-block btn-default">
                                        {{ __('CANCEL') }}
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <button type="submit" class="btn btn-lg btn-block btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-save">
                                            <path
                                                d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                            <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                            <polyline points="7 3 7 8 15 8"></polyline>
                                        </svg>
                                        Store
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection