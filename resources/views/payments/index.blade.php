@extends('layouts.theme')

@section('custom_css')
<link href="{{url('../assets/js/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('../assets/js/datatables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css">
@stop
@section('content')
  <div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Payment History</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
    <table class="table table-bordered table-hover" id="paymentTable">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th><div style="text-align:center;">Payment Type</div></th>
                <th><div style="text-align:center;">Card / Phone Number</div></th>
                <th><div style="text-align:center;">Description</div></th>
                <th><div style="text-align:center;">Amount</div></th>
                
            </tr>
        </thead>
		@foreach($payment_transactions As $p=>$payment_transaction)
        <tbody>
            <tr>
                <th scope="row"><div style="text-align:center;">{{++$p}}</div></th>
                <td><div style="text-align:center;">{{$payment_transaction->type}}</div></td>
                <td><div style="text-align:center;">{{$payment_transaction->number}}</div></td>
                <td><div style="text-align:center;">{{$payment_transaction->description}}</div></td>
                <td><div style="text-align:center;">{{$payment_transaction->amount}}</div></td>
                
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
} );

</script>
@stop