
<h5 style="margin:15px">Search Results</h5>
<div class="col-md-8">

 <div class="table-responsive" id="propOverview">
          <table class="table">
            <tr>
              <th scope="row">Parcel No.: </th>
              <td>{{$property->plot_no}}</td>
            </tr>
            <tr>
              <th scope="row">Zoning: </th>
              <td>{{$property->purpose_of_account}}</td>
            </tr>
            <tr>
            <tr>
              <th scope="row">Owner’s Name: </th>
              <td>{{$property->grantee}}</td>
            </tr>
            
              <th scope="row">Date of Instrument:</th>
              <td>{{$property->date_of_inst}}</td>
            </tr>
            <tr>
              <th scope="row">Last Sale Date </th>
              <td>{{$property->plot_no}}</td>
            </tr>
          </table>
        </div>
  
  <div class="table-responsive" id="uploadedDocs" style="none">
          <table class="table table-bordered table-hover" id="paymentTable">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>Document Type</th>
                <th>Description</th>
                <th>Status</th>
                
            </tr>
        </thead>
		@foreach($property->documents as $count=>$document)
        <tbody>
            <tr>
                <td>{{++$count}}</td>
                <td>{{$document->doc_type}}</td>
                <td>{{$document->doc_description}}</td>
                <td>{{$document->doc_status}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
        </div>


</div>
<div class="col-md-4">

  <img src="{{url('../assets/img/sample.png')}}"  alt="" /> 

</div>

<div class="clear"></div>
<hr/>
<input type="hidden" id="property_id" name="property_id" value="{{$property->id}}">
<button class="btn btn-primary" id="appendDoc" data-toggle="modal" data-target="#uploadDoc"> Append Document </button>
