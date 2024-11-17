@extends('layouts.core.base')
@section('title')
@lang('Products')
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection
@section('content')
  <h6 class="text-xl font-bold mb-4">LIST VIEW</h6>

  <div class="mt-6 bg-white p-4 rounded shadow-md">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-semibold">Activities</h2>
      <a href="{{ route('activities.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
        <i class="fas fa-plus"></i> Add Activity
        </a>
    </div>

    {!! $dataTable->table(['class' => 'w-full text-sm text-left rtl:text-right bg-white rounded']) !!}
    
  </div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

   <!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>

</script>
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endsection
