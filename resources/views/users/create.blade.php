@extends('layouts.core.base')

@section('title', 'Users')

@section('breadcrumb')
    <h1 class="page-title">Users</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('content')

@section('content')
<h6 class="text-xl font-bold mb-4">CREATE</h6>
<form method="POST" action="{{ route('users.store') }}">
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
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('email') is-invalid @enderror">
                    @error('email')
                        <span class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</span>
                    @enderror   
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                    <input type="password" id="password" name="password" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('password') is-invalid @enderror">
                    @error('password')
                        <span class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</span>
                    @enderror   
                </div>

                <div>
                    <label for="roles" class="block text-sm font-medium text-gray-700">Roles:</label>
                    <select name="roles[]" required="true"
                            class="form-multiselect block w-full mt-1 @error('roles') is-invalid @enderror"
                            multiple>
                        @foreach($roles as $role)
                            <option
                                value="{{ $role->id }}" {{ old('roles') == $role->id ? 'selected' : ''}}> {{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                    <span class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <hr/>
            <div class="mt-4">
                <a href="{{ route('activities.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded"> <i class="fas fa-plus"></i>Cancel</a>
                <button type="submit" class="bg-green-500 hover:bg-blue-600 text-white px-4 py-2 rounded"><i class="fas fa-plus"></i>Create</button>
            </div>
        </div>
    </div>
</form>

@endsection

@push('extra-js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

@endpush
