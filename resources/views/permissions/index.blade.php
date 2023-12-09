@extends('layouts.core.base')

@section('title', 'Permissions')

@section('breadcrumb')
    <h1 class="page-title">Permissions</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
        <li class="breadcrumb-item active">Permissions</li>
    </ol>
    <div class="page-header-actions">
        <a class="btn btn-sm btn-primary btn-round" href="{{route('permissions.create')}}" >
            <i class="icon md-plus-square" aria-hidden="true"></i>
            <span class="hidden-sm-down">Add Permissions</span>
        </a>
    </div>
@endsection

@section('content')
<!-- Panel -->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Permissions</h3>
        <div class="panel-actions panel-actions-keep">
            <div class="dropdown show">
                <a class="panel-action" id="examplePanelDropdown" data-toggle="dropdown" href="#" aria-expanded="true" role="button"><i class="icon md-more-vert" aria-hidden="true"></i></a>
                <div class="dropdown-menu dropdown-menu-bullet dropdown-menu-right" aria-labelledby="examplePanelDropdown" role="menu" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-153px, 38px, 0px);">
                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-delete" aria-hidden="true"></i> Enable selected</a>
                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-plus-square" aria-hidden="true"></i> Disable selected</a>

                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
        {{ $dataTable->table() }}
        </div>
    </div>
</div>
<!-- End Panel -->
@endsection

@push('extra-js')
    {{ $dataTable->scripts() }}
    <script>
        $(document).ready(function () {
            $('#destroy-entity-modal').on('show.bs.modal', function (event) {
                var relatedTarget = $(event.relatedTarget);

                var id = relatedTarget.data('id');
                var title = relatedTarget.data('title');
                var route = relatedTarget.data('route');

                var form = $(this).find('form#destroy-entity');

                form.attr('action', route);

                form.find('span#title').text(title);
            });
        });

    </script>
@endpush
