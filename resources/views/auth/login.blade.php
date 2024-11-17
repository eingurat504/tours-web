@extends('layouts.app')

@section('main-content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="fixed inset-0 bg-gray-800 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-8 w-96">
        <h2 class="text-2xl font-semibold mb-4 text-center">Login</h2>
        <form action="/signin" method="POST">
            <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') is-invalid @enderror">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" id="password" name="password" required class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') is-invalid @enderror">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4 text-center">
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Login</button>
            </div>
        </form>
        </div>
    </div>
</form>
@endsection
