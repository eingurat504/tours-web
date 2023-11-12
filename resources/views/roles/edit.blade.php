@extends('layouts.core.base')

@section('title', 'Roles')

@section('breadcrumb')
    <h1 class="page-title">Roles</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Role</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.show' , $role->id) }}">{{ $role->name }}</a></li>
        <li class="breadcrumb-item active">Update</li>
    </ol>
@endsection

@section('content')

<form method="POST" action="{{ route('roles.update', $role->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="panel">
                    <div class="panel-body">

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" required
                                class="form-control form-control-lg @error('name') is-invalid @enderror"
                                value="{{ old('name', $role->name) }}"/>
                        @error('name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('roles.index') }}"
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
                                        Update
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

@push('extra-js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script type="text/javascript">

    var start_date = $('form#project_form').find('input[name=start_date]').data('value');
    if (start_date) {
        $("input[name='start_date']").val(start_date);
    } else {
        $("input[name='start_date']").val(moment().subtract(1, 'month').format('YYYY-MM-DD'));
    }

    var end_date = $('form#training_report').find('input[name=end_date]').data('value');
    if (end_date) {
        $("input[name='end_date']").val(end_date);
    } else {
        $("input[name='end_date']").val(moment().format('YYYY-MM-DD'));
    }

</script>

@endpush