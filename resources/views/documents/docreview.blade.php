 @extends('layouts.theme')

@section('custom_css')
<link href="{{url('../assets/js/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('../assets/js/datatables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css">
@stop
@section('content')
  <div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Customer Details Update Form</h3>
    </div>
    <div class="panel-body">
    <!-- 16:9 aspect ratio -->
<div class="embed-responsive embed-responsive-16by9">
<object  class="embed-responsive-item" width="100%" height="400" data="../assets/docs/Customer_Details_Update_Form.pdf"></object>
  
</div>
    
    
    </div>
     <div class="panel-footer text-right">
     <button  id="downloadBtn" type="button" class="btn btn-primary" ><i class="fa fa-download"></i> Download Doc</button>
     <button  id="uploadBtn" type="button" class="btn btn-primary" style="display:none" data-toggle="modal" data-target="#uploadDoc"><i class="fa fa-upload"></i> Upload Doc</button>
     <button  id="contestBtn" type="button" class="btn btn-default" data-toggle="modal" data-target="#contestDoc">Contest Doc</button>
     
     </div>
</div>
  
  <!-- Upload Modal --> 
  
  <div class="modal fade" tabindex="-1" role="dialog" id="uploadDoc">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Upload Document</h4>
      </div>
      <div class="modal-body">
            <form>
    <div class="form-group">
        <label for="commentsQuestions">*Upload DOc (Max Doc size 15mb)</label>
        <input type="file" class="form-control" id="upload">
        
                    </div>
        
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  
 </div>   
</div>

<!-- Contest Modal --> 
  
  <div class="modal fade" tabindex="-1" role="dialog" id="contestDoc">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Contest Document</h4>
      </div>
      <div class="modal-body">
             <form>
    <div class="form-group">
        <label for="commentsQuestions">Comments / Questions</label>
        <textarea id="commentsInput" class="form-control"></textarea>
            </div>
        
    
    <button type="submit" class="btn btn-primary ">Submit</button>
</form>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 
@stop 
@section('custom_js')
<script src="{{url('../assets/js/datatables/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{url('../assets/js/datatables/media/js/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
<script>
$(document).ready(function() {
    $('#paymentTable').DataTable();
} );

$("#downloadBtn").click(function(){
   
	$("#uploadBtn").show();
	e.preventDefault();
	window.location.href = 'http://bitsoko.com.gh/mybenben/assets/docs/Customer_Details_Update_Form.pdf'
	
	
	 });

</script>
@stop