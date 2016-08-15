@extends('layouts.theme')

@section('custom_css')
<link href="{{url('../js/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('../js/datatables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css">
@stop

@section('content')
 <div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">You have <span class="badge">{{sizeof($todos)}} New Documents</span>   you need to review and take action</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
    <table class="table table-bordered table-hover" id="paymentTable">
        <thead>
            <tr>
                <th>Date</th>
                <th>Document Type</th>
                <th>Document Status</th>              
                <th>Actions</th>
                
            </tr>
        </thead>
        <tbody>
		@foreach($todos as $todo)
            <tr>
                <th scope="row">{{date('D M d, Y',strtotime($todo->created_at))}}</th>
                <td>{{$todo->doc_description}}</td>
                <td>{{$todo->doc_status}}</td>
                <td><a href="{{url('/docreview/'.$todo->id)}}" class="btn btn-default"><i class="fa fa-file"></i> Review</a></td>
            </tr>
		@endforeach
        </tbody>
    </table>
</div>    </div>
</div>
  
  
    
 </div>   
</div>

<!-- Core  --> 


<script  src="{{url('../assets/js/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{url('../assets/js/datatables/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{url('../assets/js/datatables/media/js/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
<script>
$(document).ready(function() {
    $('#paymentTable').DataTable();
} );

</script>
@stop