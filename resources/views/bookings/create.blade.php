@extends('layouts.core.base')

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

<!-- <form method="POST" action="{{ route('bookings.store') }}">
        @csrf
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
</form> -->
<h6 class="text-xl font-bold mb-4">CREATE</h6>
<form method="POST" action="{{ route('bookings.store') }}">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
              <div>
                <label for="traveller_name" class="block text-sm font-medium text-gray-700">Traveller_name:</label>
                <input type="text" id="traveller_name" name="traveller_name" value="{{ old('traveller_name') }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('traveller_name') is-invalid @enderror">
                @error('traveller_name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror  
            </div>
              <div>
                <label for="traveller_phone_no" class="block text-sm font-medium text-gray-700">Traveller Phone No:</label>
                <input type="text" id="traveller_phone_no" name="traveller_phone_no" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('traveller_name') is-invalid @enderror">
                @error('traveller_name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror   
            </div>

            <div>
                <label for="no_of_people" class="block text-sm font-medium text-gray-700">No of People:</label>
                <input type="text" id="no_of_people" name="no_of_people" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('no_of_people') is-invalid @enderror">
                @error('no_of_people')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror     
            </div>

            <div>
                <label for="from_date" class="block text-sm font-medium text-gray-700">Start Date:</label>
                <input type="date" id="from_date" name="from_date" value="{{ old('from_date') }}" data-date-format="YYYY-MM-DD" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('from_date') is-invalid @enderror">
                @error('from_date')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror     
            </div>

            <div>
                <label for="to_date" class="block text-sm font-medium text-gray-700">End Date:</label>
                <input type="date" id="to_date" name="to_date" value="{{ old('to_date') }}" data-date-format="YYYY-MM-DD" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('to_date') is-invalid @enderror">
                @error('to_date')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror     
            </div>

            
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">

              <div>
                <label for="activities" class="block text-sm font-medium text-gray-700">Activities: </label>
                <div class="flex flex-wrap gap-4 mb-4">
                    @foreach($activities as $activity)
                        <div class="flex items-center">
                            <input id="textures" type="checkbox" name="activities[]"
                            value="{{ $activity['amount'] }}" {{ ($activity['id'] === true) ? 'checked' : '' }}  class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                            <label for="textures" class="ml-2 text-gray-700">{{ $activity->activity_name }} - ${{ $activity->amount }}</label>
                        </div>
                    @endforeach
                </div>
              </div>


              <div>
              <label for="activities" class="block text-sm font-medium text-gray-700">CART: </label>
              <h4>TOTAL AMOUNT:</h4>
                    <div id="booking_amount" class="col-lg-6 col-md-6 col-xs-12" style="font-style:bold; font-size:20px;">
                        0
                    </div>
              </div>


            </div>
            <hr/>
            <div class="mt-4">
                <a href="{{ route('bookings.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded"> <i class="fas fa-plus"></i>Cancel</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded"><i class="fas fa-plus"></i>Create</button>
            </div>
        </div>
    </div>
    </form>
@endsection