@extends('layouts.theme')

@section('custom_css')
<link href="{{url('../assets/js/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('../assets/js/datatables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css">
@stop

@section('content')
 
  <div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{$doc->doc_description}}</h3>
    </div>
    <div class="panel-body">
    <!-- 16:9 aspect ratio -->
<div class="embed-responsive embed-responsive-16by9">
<object  class="embed-responsive-item" width="100%" height="400" data="{{url('../assets/docs/Customer_Details_Update_Form.pdf')}}"></object>
  
</div>
    
    
    </div>
     <div class="panel-footer text-right">
     <button  id="downloadBtn" type="button" class="btn btn-primary"><i class="fa fa-download"></i> Download Doc</button>
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
        <h4 class="modal-title">Upload Document</h4><div id="confirmation"></div>
      </div>
      <div class="modal-body">
 <form id="uploadDocsForm" action="{{ url('docs')}}" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="file_up">*Upload DOc (Max Doc size 2mb)</label>
		<input type="file" class="form-control" id="file_up" name="file_up">
    </div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	<input type="hidden" name="users_id" value="{{ Auth::user()->id }}" />	
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
		<form action="{{ url('docs')}}" method="POST">
			<div class="form-group">
				<label for="commentsQuestions">Comments / Questions</label>
				<textarea id="message" name="message" class="form-control"></textarea>
			</div>
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<input type="hidden" name="users_id" value="{{ Auth::user()->id }}" />
			<input type="hidden" name="documents_id" value="{{ $doc->id }}" />
			<button type="submit" class="btn btn-primary ">Submit</button>
		</form>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  
 </div>   
</div>

<!-- Core  --> 
@stop
@section('custom_js')
<script src="{{url('../assets/js/datatables/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{url('../assets/js/datatables/media/js/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
<script>
$(document).ready(function() {
    $('#paymentTable').DataTable();
	$("#downloadBtn").click(function(){
		$("#uploadBtn").show();		
	});	
});
/*
       $(function () {

            $("form#uploadDocsForm").submit(function (e) {
			
				e.preventDefault();
                var formData = $('#uploadDocsForm').serialize();
                $("#confirmation").html("<img src='../img/uploading.gif' /> Uploading document. Please wait ...");
                $.ajax({
                    type: "POST",
                    url: "document/create",
                    data: formData,
                    async: false,
                    success:function(msg) {


                        if(msg=="fail") {

                            $('#dname').val("");
                            $('#file_up').val("");

                            $('#confirmation').html("<p class='alert alert-danger' style='text-align: center'><i class='icon-remove-sign'></i> Complete fields before submitting</p>");
                            $("#confirmation").hide().fadeIn(2000);

                        }else if(msg=="Extension not allowed"){

                            $('#confirmation').html("<p class='alert alert-warning' style='text-align: center'><i class='icon-warning-sign'></i> Extension not allowed</p>");
                            $("#confirmation").hide().fadeIn(2000);

                        }else{
                            $('#file_up').val("");
                            $('#confirmation').html("<p class='alert alert-success' style='text-align: center'><i class='icon-ok-sign'></i> Document was added successfully</p>");
                            $("#confirmation").hide().fadeIn(2000);
                        }

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });

                return false;

            });

        });
		*/
</script>

@stop