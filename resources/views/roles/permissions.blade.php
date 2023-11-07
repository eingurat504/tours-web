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
<form method="POST" action="{{ route('roles.permissions.sync', $role->id)  }}">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-12">
            <!-- Panel -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Permissions</h3>
                </div>
                <div class="panel-body">
                        <div class="row">
                            @foreach($role->permissions as $permission) 
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                    <label class="form-check-label" for="{{ $permission['id'] }}">
                                                <input type="checkbox" class="form-check-input"
                                                        id="{{ $permission['id'] }}"
                                                        name="permissions[]"
                                                        value="{{ $permission['id'] }}" {{ ($permission['granted'] === true) ? 'checked' : '' }} />
                                                {{ $permission['name'] }}
                                            </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    <div class="row">
                        <div class="col-sm-6 col-xs-6 col-md-3 col-lg-3">
                            <a href="{{ route('roles.index') }}"
                                class="btn btn-block btn-light btn-lg font-weight-medium auth-form-btn">
                                {{ __('CANCEL') }}
                            </a>

                        </div>
                        <div class="col-sm-6 col-xs-6 col-md-3 col-lg-3">
                            <button type="submit" class="btn btn-block btn-success btn-lg">
                                <i class="icon md-minus-square" aria-hidden="true"></i>
                                <span class="hidden-sm-down">sync</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>  
@endsection
