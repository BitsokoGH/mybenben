@extends('layouts.theme')

@section('content')
<div class="col-md-12">
  
  <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">State Lands Documents &amp; Discharge</h3>
      </div>
      <div class="panel-body">
          <div class="col-md-6 center-block">

        <form id="adminsearch" name="adminsearch" action="{{url('/adminsearch')}}" method="post">
    <div class="form-group ">
    <div class="input-group">
      <input type="search" name="search_param" id="search_param" class="form-control " placeholder="Parcel No.">
	  <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit" id="searchBtn">Search</button>
      </span>
    </div>
     </div>
		
	</form>
</div>
<div id="searchResults" class="clear"> </div>

      </div>
 
</div>

      <!-- Modal -->
<div class="modal fade" id="uploadDoc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Append Document</h4>
      </div>
      <div class="modal-body">
       <form id="uploadDocForm" name="uploadDocForm" action="{{url('addDoc')}}" method="post" enctype="multipart/form-data">
		<div class="form-group">
        <label for="filefield">Upload Load</label>
        <input type="file" class="form-control" id="filefield" name="filefield">            
		</div>
		<div class="form-group">
        <label for="doc_type">Document Type</label>
        <select name="doc_type" id="doc_type" class="form-control">
			<option>Contract</option>
			<option>Mortgage Documents</option>
		</select>          
		</div>
		<div class="form-group">
        <label for="doc_description">Document Description</label>
        <textarea id="doc_description" name="doc_description" class="form-control"></textarea>            
		</div>		
		<button type="submit"  id="addDoc" name="addDoc" class="btn btn-primary">Submit</button>
		<input type="hidden" id="properties_id" name="properties_id" value="">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
	  </form>
      </div>
      
    </div>
  </div>
</div>
@stop
@section('custom_js')

<script>
$(document).ready(function(){
  $('#searchBtn').click(function(){
	event.preventDefault();
	var formData = $('#adminsearch').serialize();
	var actionUrl = $( '#adminsearch' ).attr( 'action' );
	
    $.ajax({
      url: actionUrl,
      type: "post",
      data: formData,
      success: function(data){
 
        $("#searchResults").html(data);
		document.getElementById("properties_id").value = $( '#property_id' ).val();	 		
      }
    });      
  }); 
/*  
    $('#addDoc').click(function(){
	event.preventDefault();
	
	var formData = $('#uploadDocForm').serialize();
	var actionUrl = $( '#uploadDocForm' ).attr( 'action' );
	
	jQuery.each(jQuery('#file')[0].files, function(i, file) {
		formData.append('file-'+i, file);
	});
	
    $.ajax({
      url: actionUrl,
      type: "post",
      data: formData,
      success: function(data){
        $("#uploadDoc").html(data);
      }
    });      
  }); 
 */
 
 $("form#uploadDocForm").submit(function (e) {

		e.preventDefault();
		var actionUrl = $( '#uploadDocForm' ).attr( 'action' );
        var formData = new FormData($(this)[0]);
		//formData.append($('#uploadDocForm').serialize());
		alert(formData);

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: formData,
            async: false,
            success:function(msg) {
				$("#uploadDocForm").html(msg);
            },
            cache: false,
            contentType: false,
            processData: false
        });

            return false;

    });
});
</script>
@stop