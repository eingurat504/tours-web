@extends('layouts.core.base')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection
@section('content')
  <h6 class="text-xl font-bold mb-4">LIST VIEW</h6>

  <div class="mt-12" class="flex items-center w-80 p-4 rounded-md shadow-md text-white">
      @include('flash::message')
   </div>
   <!-- <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Holy smokes!</strong>
    <span class="block sm:inline">Something seriously bad happened.</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
      <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
  </div> -->

  <div class="mt-6 bg-white p-4 rounded shadow-md">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-semibold">Roles</h2>
      <a href="{{ route('roles.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
        <i class="fas fa-plus"></i> Add Role
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
