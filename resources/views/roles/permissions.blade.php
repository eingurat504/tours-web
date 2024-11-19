@extends('layouts.core.base')

@section('title', 'Roles')

@section('breadcrumb')
    <h1 class="page-title">Roles</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
        <li class="breadcrumb-item">{{ $role->name }}</li>
        <li class="breadcrumb-item active">Permissions</li>
    </ol>
@endsection

@section('content')
<h6 class="text-xl font-bold mb-4">PERMISSIONS</h6>
<form method="POST" action="{{ route('roles.permissions.sync', $role->id)  }}">
    @csrf
    @method('PUT')
    <div class="mt-6 bg-white p-4 rounded shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Pemissions Granted</h2>
        </div>

        <div class="flex flex-wrap gap-5 mb-4">
            @foreach($role->permissions as $permission) 
            <div class="flex items-center">
                <input id="{{ $permission['id'] }}" type="checkbox" name="permissions[]"
                value="{{ $permission['id'] }}" {{ ($permission['granted'] === true) ? 'checked' : '' }} class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                <label for="{{ $permission['id'] }}" class="ml-2 text-gray-700">{{ $permission['name'] }}</label>
            </div>
            @endforeach
        </div>

        <hr/>
        <div class="mt-4">
            <a href="{{ route('roles.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded"> <i class="fas fa-plus"></i>Cancel</a>
            <button type="submit" class="bg-green-500 hover:bg-blue-600 text-white px-4 py-2 rounded"><i class="fas fa-plus"></i>Sync</button>
        </div>
    </div>
</form>  



@endsection
