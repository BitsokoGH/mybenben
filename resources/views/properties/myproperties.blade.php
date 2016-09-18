@extends('layouts.theme')

@section('custom_css')
<link href="{{url('../assets/js/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('../assets/js/datatables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css">
@stop
@section('content')
  <div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Below are a list of your properties, Click in <span class="badge">View Doc</span> to see document associated with each property</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
    <table class="table table-bordered table-hover" id="paymentTable">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>Plot Number</th>
                <th>Adress</th>
                <th>Grantee</th>
                <th>Actions</th>
                
            </tr>
        </thead>
        <tbody>
		@foreach($properties As $p=>$property)
            <tr>
                <th scope="row">{{++$p}}</th>
                <td>{{$property->plot_no}}</td>
                <td>{{$property->description}}</td>
                <td>{{$property->grantee}}</td>
                <td><a href="{{url('')}}" class="btn btn-primary">View Docs</a></td>
             </tr>
		@endforeach
        </tbody>
    </table>
</div>    </div>
</div> 
 </div>  
@stop 
@section('custom_js')
<script src="{{url('../assets/js/datatables/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{url('../assets/js/datatables/media/js/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
<script>
$(document).ready(function() {
    $('#paymentTable').DataTable();
	
	$('.btn').click(function(e) {
		e.preventDefault();
		window.location.href = $(this).attr('href');
	});
} );
</script>
@stop