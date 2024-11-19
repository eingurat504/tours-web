@extends('layouts.core.base')

@section('title', 'Bookings')

@section('content')
<h6 class="text-xl font-bold mb-4">CONFIRM</h6>
<form method="POST" action="{{ route('bookings.confirm', $booking->id) }}">
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
                                <td>
                                @if ($booking->status == 'reserved')
                                    <span class="inline-block bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded">{{ $booking->status }}</span>
                                @else
                                    <span class="inline-block bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded">{{ $booking->status }}</span>
                                @endif
                                </td>
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
                    <label for="mode_of_payment" class="block text-sm font-medium text-gray-700">Mode of Payment:</label>
                    <select id="mode_of_payment" name="mode_of_payment" class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700">
                        <option value="">Choose Mode of Payment...</option>
                        <option value="mobile_money">Mobile Money</option>
                        <option value="visa_card">Visa Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="cash">Cash</option>
                    </select>
                </div>

                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount:</label>
                    <input type="text" id="amount" name="amount" value="{{ old('amount') }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('amount') is-invalid @enderror">
                    @error('activity_name')
                        <span class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</span>
                    @enderror  
                </div>

                <div>
                    <label for="remarks" class="block text-sm font-medium text-gray-700">remarks</label>
                    <textarea id="remarks" name="remarks" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('remarks') }}</textarea>
                    @error('remarks')
                        <span class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</span>
                    @enderror   
                </div>

            </div>
            <hr/>
            <div class="mt-4">
                <a href="{{ route('bookings.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded"> <i class="fas fa-plus"></i>Cancel</a>
                @if ($booking->status == 'reserved') 
                <button type="submit" class="bg-green-500 hover:bg-blue-600 text-white px-4 py-2 rounded"><i class="fas fa-plus"></i>Confirm</button>
                @endif
            </div>
        </div>
    </div>
        
</form>
@endsection