@extends('layouts.core.base')

@section('title', 'Activities')

@section('content')
<h6 class="text-xl font-bold mb-4">UPDATE</h6>
<form method="POST" action="{{ route('activities.update', $activity->id ) }}">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                <div>
                    <label for="activity_name" class="block text-sm font-medium text-gray-700">Activity Name:</label>
                    <input type="text" id="activity_name" name="activity_name" value="{{ old('activity_name', $activity->activity_name) }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('activity_name') is-invalid @enderror">
                    @error('activity_name')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror  
                </div>
                <div>
                    <label for="duration" class="block text-sm font-medium text-gray-700">Duration (In Hours):</label>
                    <input type="integer" id="duration" name="duration" value="{{ old('duration', $activity->duration) }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('duration') is-invalid @enderror">
                    @error('duration')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror   
                </div>

                <div>
                    <label for="Description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="Description" name="description" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $activity->description) }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror   
                </div>

                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount:</label>
                    <input type="integer" id="amount" name="amount" value="{{ old('amount', $activity->amount) }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('amount') is-invalid @enderror">
                    @error('amount')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror  
                </div>
            </div>
            <hr/>
            <div class="mt-4">
                <a href="{{ route('activities.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded"> <i class="fas fa-plus"></i>Cancel</a>
                <button type="submit" class="bg-green-500 hover:bg-blue-600 text-white px-4 py-2 rounded"><i class="fas fa-plus"></i>Update</button>
            </div>
        </div>
    </div>
</form>

@endsection

