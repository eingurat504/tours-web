@extends('layouts.core.base')

@section('title', 'Payments')

@section('breadcrumb')
    <h1 class="page-title">Payments</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('payments.index') }}">Payments</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('content')

<form method="POST" action="{{ route('payments.approve', $payment->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-12">
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

                        <!-- <div class="form-group">
                            <label for="package">Package:</label>
                            <select name="package"
                                    class="form-control form-control-lg @error('package') is-invalid @enderror">
                            </select>
                            @error('package')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div> -->

                        <div class="form-group">
                            <label for="no_of_people">No of People:</label>
                            <input type="integer" name="no_of_people" id="no_of_people" required
                                   class="form-control form-control-lg @error('no_of_people') is-invalid @enderror"
                                   value="{{ old('no_of_people') }}"/>
                            @error('no_of_people')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- <div class="form-group">
                            <label for="no_of_adults">No of Adults:</label>
                            <input type="integer" name="no_of_adults" id="no_of_adults" required
                                   class="form-control form-control-lg @error('no_of_adults') is-invalid @enderror"
                                   value="{{ old('no_of_adults') }}"/>
                            @error('no_of_adults')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="panel">
                    <div class="panel-body">

                        <div class="form-group">
                            <label for="activities">Activities:</label>
                            <select name="activities[]" required="true"
                                    class="form-multiselect block w-full mt-1 @error('activities') is-invalid @enderror"
                                    multiple>
                                @foreach($activities as $activity)
                                    <option
                                        value="{{ $activity->id }}" {{ old('activities') == $activity->id ? 'selected' : ''}}> {{ $activity->activity_name }} - {{ $activity->amount }}</option>
                                @endforeach
                            </select>
                            @error('activities')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                    <!-- <div class="form-group">
                        <label for="no_of_children">No of Children:</label>
                        <input type="text" name="no_of_children" id="no_of_children" required
                                class="form-control form-control-lg @error('no_of_children') is-invalid @enderror"
                                value="{{ old('no_of_children') }}"/>
                        @error('no_of_children')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div> -->

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
                            @error('end_date')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
<!-- 
                        <div class="form-group">
                            <label for="total_amount">Total Amount:</label>
                            <input type="integer" name="total_amount" id="total_amount" required
                                   class="form-control form-control-lg @error('total_amount') is-invalid @enderror"
                                   value="{{ old('total_amount') }}" readonly/>
                            @error('total_amount')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div> -->

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('bookings.index') }}"
                                       class="btn btn-lg btn-block btn-default">
                                        {{ __('CANCEL') }}
                                    </a>
                                </div>
                                <div class="col-md-6">
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

@push('extra-js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script type="text/javascript">

    var start_date = $('form#project_form').find('input[name=start_date]').data('value');
    if (start_date) {
        $("input[name='start_date']").val(start_date);
    } else {
        $("input[name='start_date']").val(moment().subtract(1, 'month').format('YYYY-MM-DD'));
    }

    var end_date = $('form#training_report').find('input[name=end_date]').data('value');
    if (end_date) {
        $("input[name='end_date']").val(end_date);
    } else {
        $("input[name='end_date']").val(moment().format('YYYY-MM-DD'));
    }

</script>

@endpush
