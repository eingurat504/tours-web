@extends('layouts.core.base')

@section('content')
<h6 class="text-xl font-bold mb-4">CREATE</h6>
<form id="booking_form" method="POST" action="{{ route('bookings.store') }}">
    @csrf
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
            <div>
                <label for="traveller_name" class="block text-sm font-medium text-gray-700">Traveller_name:</label>
                <input type="text" id="traveller_name" name="traveller_name" value="{{ old('traveller_name') }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('traveller_name') is-invalid @enderror">
                @error('traveller_name')
                    <span class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</span>
                @enderror  
            </div>
            <div>
                <label for="traveller_phone_no" class="block text-sm font-medium text-gray-700">Traveller Phone No:</label>
                <input type="text" id="traveller_phone_no" name="traveller_phone_no" value="{{ old('traveller_phone_no') }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('traveller_phone_no') is-invalid @enderror">
                @error('traveller_phone_no')
                    <span class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</span>
                @enderror   
            </div>

            <div>
                <label for="traveller_flight_no" class="block text-sm font-medium text-gray-700">Traveller Flight No:</label>
                <input type="text" id="traveller_flight_no" name="traveller_flight_no" value="{{ old('traveller_flight_no') }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('traveller_flight_no') is-invalid @enderror">
                @error('traveller_flight_no')
                    <span class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</span>
                @enderror   
            </div>

            <div>
                <label for="no_of_people" class="block text-sm font-medium text-gray-700">No of People:</label>
                <input type="text" id="no_of_people" name="no_of_people" value="{{ old('no_of_people') }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('no_of_people') is-invalid @enderror">
                @error('no_of_people')
                    <span class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</span>
                @enderror     
            </div>

            <div>
                <label for="no_of_adults" class="block text-sm font-medium text-gray-700">No of Adults:</label>
                <input type="text" id="no_of_adults" name="no_of_adults" value="{{ old('no_of_adults') }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('no_of_adults') is-invalid @enderror">
                @error('no_of_adults')
                    <span class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</span>
                @enderror     
            </div>

            <div>
                <label for="no_of_children" class="block text-sm font-medium text-gray-700">No of Children:</label>
                <input type="text" id="no_of_children" name="no_of_children" value="{{ old('no_of_children') }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('no_of_children') is-invalid @enderror">
                @error('no_of_children')
                    <span class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</span>
                @enderror     
            </div>

            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">

                <div>
                    <label for="from_date" class="block text-sm font-medium text-gray-700">Start Date:</label>
                    <input type="text" id="from_date" name="from_date" data-date-format="YYYY-MM-DD" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('from_date') is-invalid @enderror">
                    @error('from_date')
                        <span class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</span>
                    @enderror     
                </div>

                <div>
                    <label for="to_date" class="block text-sm font-medium text-gray-700">End Date:</label>
                    <input type="text" id="to_date" name="to_date" data-date-format="YYYY-MM-DD" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('to_date') is-invalid @enderror">
                    @error('to_date')
                        <span class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</span>
                    @enderror     
                </div>

                <div>
                <label for="activities" class="block text-sm font-medium text-gray-700">Activities: </label>
                <div class="flex flex-wrap gap-4 mb-4">
                    @foreach($activities as $activity)
                        <div class="flex items-center">
                            <input id="textures" type="checkbox" name="activities[]"
                            value="{{ $activity['amount'] }}" {{ ($activity['id'] === true) ? 'checked' : '' }}  class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500" required>
                            <label for="textures" class="ml-2 text-gray-700">{{ $activity->activity_name }} - ${{ $activity->amount }}</label>

                            <input type="hidden" name="activities_ids[]" value="{{ $activity['id'] }}">
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

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script type="text/javascript">

        var from_date = $('form#booking_form').find('input[name=from_date]').data('value');
        if (from_date) {
            $("input[name='from_date']").val(from_date);
        } else {
            $("input[name='from_date']").val(moment().subtract(1, 'month').format('YYYY-MM-DD'));
        }

        var to_date = $('form#booking_form').find('input[name=to_date]').data('value');
        if (to_date) {
            $("input[name='to_date']").val(to_date);
        } else {
            $("input[name='to_date']").val(moment().format('YYYY-MM-DD'));
        }

    </script>
     <script type="text/javascript">
      $(document).ready( function () {
            $("input[type=checkbox]").on( "click", function (){
                var booking_price = 0;
                $("input:checked").each(function(){ // iterate through each checked element.
                    booking_price += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
                });     

                console.log(booking_price);
                $("#booking_amount").text(booking_price);
                
            });
      });

    </script>
@endsection
