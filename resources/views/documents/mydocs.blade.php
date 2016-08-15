@extends('layouts.theme')

@section('custom_css')
<link href="{{url('../assets/js/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('../assets/js/datatables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css">
@stop
@section('content')
  <div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">You have <span class="badge">2 New Documents</span>   you need to review and take action</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
    <table class="table table-bordered table-hover" id="paymentTable">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>Document Type</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
                
            </tr>
        </thead>
        <tbody>
		@foreach($docs As $d=>$doc)
            <tr>
                <th scope="row">{{++$d}}</th>
                <td>{{$doc->doc_type}}</td>
                <td>{{$doc->doc_description}}</td>
                <td>{{$doc->doc_status}}</td>
                <td><a href="{{url('/docreview/'.$doc->id)}}" class="btn btn-primary">Download</a></td>
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
		alert('hello');
		e.preventDefault();
		window.location.href = $(this).attr('href');
	});
} );
</script>
@stop