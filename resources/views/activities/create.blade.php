@extends('layouts.core.base')

@section('title', 'Activities')

@section('breadcrumb')
    <h1 class="page-title">Activities</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('activities.index') }}">Activities</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('content')

<form method="POST" action="{{ route('activities.store') }}">
        @csrf

        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <!-- Panel -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Create Activity</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="activity_name">Name:</label>
                            <input type="text" name="activity_name" id="activity_name" required
                                   class="form-control form-control-lg @error('activity_name') is-invalid @enderror"
                                   value="{{ old('activity_name') }}"/>
                            @error('activity_name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="duration">Duration (In Hours):</label>
                            <input type="integer" name="duration" id="duration" required
                                   class="form-control form-control-lg @error('duration') is-invalid @enderror"
                                   value="{{ old('duration') }}"/>
                            @error('duration')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Brief description:</label>
                            <textarea title="Description"
                                      class="form-control form-control-lg @error('description') is-invalid @enderror"
                                      rows="6"
                                      name="description"
                                      data-error-container="#editor1_error">{{ old('description' ) }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount:</label>
                            <input type="integer" name="amount" id="amount" required
                                   class="form-control form-control-lg @error('amount') is-invalid @enderror"
                                   value="{{ old('amount') }}" />
                            @error('amount')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('activities.index') }}"
                                       class="btn btn-lg btn-block btn-default">
                                        {{ __('CANCEL') }}
                                    </a>
                                </div>
                                <div class="col-md-6">
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
    </form>
@endsection

