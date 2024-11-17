@extends('layouts.core.base')

@section('title', 'Bookings')

@section('content')
<h6 class="text-xl font-bold mb-4">RESERVE</h6>
<form method="POST" action="{{ route('bookings.reserve', $booking->id) }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
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
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">

                <div>
                    <label for="Description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="Description" name="description" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror   
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