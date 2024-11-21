@extends('layouts.core.base')

@section('content')
<h6 class="text-xl font-bold mb-4">CREATE</h6>
<form method="POST" action="{{ route('permissions.store') }}">
    @csrf
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('name') is-invalid @enderror">
                    @error('name')
                        <span class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</span>
                    @enderror  
                </div>
                
            </div>
            <hr/>
            <div class="mt-4">
                <a href="{{ route('roles.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded"> <i class="fas fa-plus"></i>Cancel</a>
                <button type="submit" class="bg-green-500 hover:bg-blue-600 text-white px-4 py-2 rounded"><i class="fas fa-plus"></i>Create</button>
            </div>
        </div>
    </div>
</form>

@endsection

