@extends('layouts.theme')

@section('custom_css')
<link href="{{url('../assets/js/leaflet/leaflet.css')}}" rel="stylesheet" type="text/css">
@stop

@section('content')
<div class="row">
  <div class="col-md-4 serachBox">
    <div class="searchTitle">{{$property->description}}</div>
    <ul class="nav nav-tabs" id="mapTabs">
      <li role="presentation" class="active"><a href="#overview">Overview</a></li>
      <li role="presentation"><a href="#photogallery">Photo Gallery</a></li>
      <li role="presentation"><a href="#details">Details</a></li>
    </ul>
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="overview">
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
            
              <th scope="row">Location</th>
              <td>{{$property->description}}</td>
            </tr>
            <tr>
              <th scope="row">Date of Instrument</th>
              <td>{{$property->date_of_inst}}</td>
            </tr>
          </table>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="photogallery">
        <div class="galleria"> <img src="{{url('../assets/img/sample.png')}}"> <img src="{{url('../assets/img/sample.png')}}"> <img src="{{url('../assets/img/sample.png')}}"> </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="details">
        <form>
          <div id="detailsPay">
            <h5>Please add information you are interested in.</h5>
            <div class="checkbox">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <td scope="row"><input type="checkbox">
                      Contact Details of Current Owner</td>
                    <th>GHS 10.00</th>
                  </tr>
                  <tr>
                    <td scope="row"><input type="checkbox">
                      Previous Owners </td>
                    <th>GHS 10.00</th>
                  </tr>
                  <tr>
                    <td scope="row"><input type="checkbox">
                      Instruments Registered &amp; Valuation </td>
                    <th>GHS 10.00</th>
                  </tr>
                </table>
              </div>
            </div>
            <button  id="detailItemsBtn" type="submit" class="btn btn-primary pull-right">Continue</button>
          </div>
          <div id="paymentInfo" style="display:none">
            <h5>Payment Information</h5>
            <div class="well" style=" height:300px">
              <div class="form-group"> Fees:
                <h5>GHS 10.00</h5>
                <label for="paymentOptions">Payment Options</label>
                <select class="form-control" id="paymentOptions" required>
                  <option>Select</option>
                  <option value="bankAcc" id="bankAcc">Barclays Savings Acc (*****3256)</option>
                  <option value="momo" id="momo">MTN Mobile Moany (*****6754)</option>
                </select>
              </div>
              <div class="form-group" id="pinBox" style="display:none">
                <label for="pin">PIN</label>
                <input type="password" id="pin" class="form-control" required>
                <p>One time verification PIN has been sent to your email / phone </p>
              </div>
              <div class="form-group pull-right" >
                <button  id="backdetailItemsBtn" type="button" class="btn btn-default">Back</button>
                <button  id="paymentInfoBtn" type="submit" class="btn btn-primary">Pay</button>
              </div>
            </div>
          </div>
          <div id="detailsInfo" style="display:none">
            <h5>Detail Information</h5>
            <div class="well">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th scope="row">Owner’s Name: </th>
                    <td>Seth Brown</td>
                  </tr>
                  <tr>
                    <th scope="row">Address </th>
                    <td>PMB 2345, East Legon</td>
                  </tr>
                  <tr>
                    <th scope="row">Email </th>
                    <td>sbrown@gmail.com</td>
                  </tr>
                  <tr>
                    <th scope="row">Phone</th>
                    <td>+233 205 6748497, 233 24 3456784</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-8 searchMap">
    <div id="mapHolder"> </div>
    
  </div>
</div>
@stop

@section('custom_js')
<script src="{{url('../assets/js/galleria/galleria-1.4.2.min.js')}}" type="text/javascript"></script> 
<script src="{{url('../assets/js/leaflet/leaflet.js')}}" type="text/javascript"></script> 
<script src="{{url('../assets/js/eastlegon.js')}}" type="text/javascript"></script>

<script>

            //Map
            var grayscale = L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/light-v9/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1Ijoibi1xdWJlIiwiYSI6ImNpbzJya2p3czAwem53ZGx5YmZxZjkxcXMifQ.7U8BvCm75GU1Q4orDPTYwA', {id: 'mapbox.light', attribution: 'Map &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> , ' +
                        'Imagery © <a href="http://mapbox.com">Mapbox</a>'}),
                satellite = L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/satellite-v9/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1Ijoibi1xdWJlIiwiYSI6ImNpbzJya2p3czAwem53ZGx5YmZxZjkxcXMifQ.7U8BvCm75GU1Q4orDPTYwA', {id: 'mapbox.satellite', attribution: 'Map &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> , ' +
                        'Imagery © <a href="http://mapbox.com">Mapbox</a>'}),
                streets = L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/streets-v9/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1Ijoibi1xdWJlIiwiYSI6ImNpbzJya2p3czAwem53ZGx5YmZxZjkxcXMifQ.7U8BvCm75GU1Q4orDPTYwA', {id: 'mapbox.streets', attribution: 'Map &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> , ' +
                        'Imagery © <a href="http://mapbox.com">Mapbox</a>'});

            var map = L.map('mapHolder', {
                center: [5.629265210427313, -0.165195452969745],
                zoom: 15,
                layers: [streets]
            });

            var baseMaps = {
                "Grayscale": grayscale,
                "Streets": streets,
                "Satellite": satellite
            };
            
            L.control.layers(baseMaps).addTo(map);


            // control that shows Parcel info on hover
            var info = L.control();

            info.onAdd = function (map) {
                this._div = L.DomUtil.create('div', 'info');
                this.update();
                return this._div;
            };

            info.update = function (props) {
                this._div.innerHTML = '<h5>BenBen Land Parcel Data</h5>' + (props ?
                        '<b>' + props.address + '</b><br />' + 'Usage: ' + props.use + '<br />' + 'Occupancy: ' + props.occupancy + '<br />' + 'Structure: ' + props.structure :
                        'Hover over a parcel');
            };

            info.addTo(map);





            // get color depending on population density value
            function getColor(d) {

                if (d === "null") {
                    return "#b30059";
                    exit;
                }
                if (d === "unoccupied") {
                    return "#5073e6";
                    exit;
                }
                if (d === "maybe") {
                    return "#e6e620";
                    exit;
                }
                if (d === "partial") {
                    return "#5c00b3";
                    exit;
                }


            }

            function style(feature) {
                return {
                    fillColor: getColor(feature.properties.original),
                    weight: 2,
                    opacity: 1,
                    color: '#666',
                    dashArray: '',
                    fillOpacity: 0
                };
            }

            L.geoJson(parcelData, {style: style}).addTo(map);







            function highlightFeature(e) {
                var layer = e.target;

                layer.setStyle({
                    weight: 1,
                    color: '#666666',
                    dashArray: '',
                    fillOpacity: 0.7
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }

                info.update(layer.feature.properties);
            }

            var geojson;

            function resetHighlight(e) {
                geojson.resetStyle(e.target);

                info.update();
            }

            function zoomToFeature(e) {
                map.fitBounds(e.target.getBounds());
            }

            function onEachFeature(feature, layer) {
                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight,
                    click: zoomToFeature
                });
            }

            geojson = L.geoJson(parcelData, {
                style: style,
                onEachFeature: onEachFeature
            }).addTo(map);

            map.attributionControl.addAttribution('Map Data &copy; <a href="http://www.ghanalap.gov.gh/index.php/">Ghana Lands Commission</a>');


            var legend = L.control({position: 'bottomright'});
            legend.onAdd = function (map) {

                var div = L.DomUtil.create('div', 'info legend'),
                        grades = ["occupied", "unoccupied", "maybe", "partial"],
                        mycolors = ["#b30059", "#5073e6", "#e6e620", "#5c00b3"],
                        labels = ['<strong> Legend </strong>'],
                        from, to;


                for (var i = 0; i < grades.length; i++) {
                    from = grades [i];
                    //to = grades[i+1]-1;

                    labels.push(
                            '<i style="background:' + mycolors [i] + '"></i> ' +
                            from);
                }
                div.innerHTML = labels.join('<br>');
                return div;


            };






            //Tabs Settings

            $('#mapTabs a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');

            });

            // Photo Gallery 
            Galleria.loadTheme('../assets/js/galleria/themes/classic/galleria.classic.min.js');
            Galleria.run('.galleria');
            Galleria.configure('slide', 'height');

            //Details

            $("#detailItemsBtn").click(function () {
                $("#detailsPay").hide();
                $("#paymentInfo").show();

                event.preventDefault();
            });

            $("#paymentInfoBtn").click(function () {
                $("#paymentInfo").hide();
                $("#detailsInfo").show();

                event.preventDefault();
            });

            $("#backdetailItemsBtn").click(function () {
                $("#paymentInfo").hide();
                $("#detailsPay").show();

                event.preventDefault();
            });


            //Payment Options

            var paymentOptions = jQuery('#paymentOptions');
            var select = this.value;
            paymentOptions.change(function () {
                if ($(this).val() === 'bankAcc') {
                    $('#pinBox').show();
                } else
                    $('#pinBox').hide(); // hide div if value is not "bank account"
            });


        </script>
@stop