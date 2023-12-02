@extends('layouts.core.base')

@section('title', 'activities')

@section('breadcrumb')
    <h1 class="page-title">activities</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('activities.index') }}">activities</a></li>
        <li class="breadcrumb-item active">{{ $activity->name }}</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <!-- Panel -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $activity->name }}</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table no-wrap">
                            <tbody>
                            <tr>
                                <td class="text-gray">Activity:</td>
                                <td>{{ $activity->activity_name }}</td>
                            </tr>

                            <tr>
                                <td class="text-gray">Duration: </td>
                                <td>{{ $activity->duration }}</td>
                            </tr>
                           
                            <tr>
                                <td class="text-gray">Amount: </td>
                                <td>{{ $activity->amount }}</td>
                            </tr>

                            <tr>
                                <td class="text-gray">Description: </td>
                                <td>{{ $activity->description }}</td>
                            </tr>
                         
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <!-- Panel -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Details</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table no-wrap">
                            <tbody>
                            <tr>
                                <td class="text-gray">Created At</td>
                                <td>{{ $activity->created_at }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Updated At</td>
                                <td>{{ $activity->updated_at }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-6 col-md-6 col-lg-6">
                            <a href="{{ route('activities.index') }}"
                               class="btn btn-block btn-light btn-lg font-weight-medium auth-form-btn">
                                {{ __('CANCEL') }}
                            </a>

                        </div>
                        <div class="col-sm-6 col-xs-6 col-md-6 col-lg-6">
                            <a class="btn btn-block btn-success btn-lg"
                               href="{{ route('activities.edit' ,$activity->id) }}">
                                <i class="icon md-minus-square" aria-hidden="true"></i>
                                <span class="hidden-sm-down">Edit</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
