@extends('layouts.core.base')

@section('title', 'Dashboard')

@section('breadcrumb')
<h1 class="page-title">Dashboard</h1>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
  <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
  <li class="breadcrumb-item active">view</li>
</ol>
<div class="page-header-actions">
    <button id="edit-widgets" class="btn btn-sm btn-info btn-round widget_edit_btn"  type="button">
      <i class="icon md-plus-square" aria-hidden="true"></i>
      <span class="hidden-sm-down">Edit Widgets</span>
    </button>
    </div>
@endsection

@section('content')
<div class="row">

</div>
@endsection

@push('extra-js')

<script>
    $(document).ready(function(){
        
        $('#edit-widgets').click(function(){

        var userid = $(this).data('id');

        // AJAX request
        $.ajax({
        url: '',
        type: 'get',

        success: function(response){
            var widgets = response;
            var select_options = "<option>None</option>";
            widgets.forEach(function(value,index){
                console.log(value)
                const found = user_widgets.find(element => element == value)
                if(found != undefined)
                {
                    select_options = select_options + "<option value='"+value+"' selected>"+value+"</option>"
                }
                else if(found == undefined)
                {
                    select_options = select_options + "<option value='"+value+"'>"+value+"</option>"
                }

            })
            $('#select_user_widgets').html(select_options)
            //console.log(user_widgets);
            // Add response in Modal body
          //  $('.modal-body').html(response);

            // Display Modal
            $('#editWidgetModal').modal('show');
        }
        });
        });
});
</script>
@endpush
