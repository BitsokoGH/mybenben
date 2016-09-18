@extends('layouts.theme')
@section('custom_css')
<link href="{{url('../assets/js/leaflet/leaflet.css')}}" rel="stylesheet" type="text/css">
@stop
 @section('content')
 <div class="row">
              <div class="col-md-5 serachBox">
                <div class="searchTitle"><form style="margin: 0px; padding: 0px;">


                        <!-- Select Basic -->
                        <select id="selectbasic" name="selectbasic" class="form-control">
                            <option value="">All Properties</option>
                            <option value="1">East Legon</option>
                            <option value="2">Ofankor</option>
                        </select>

                    </form></div>

               <div class="text-center" style="display: block;">
<h4 style="margin-bottom: 0;">Try these citywide layers:</h4><br/><br/>
<a class="btn btn-info btn-sm" data-preset="1" href="{{url('/structured')}}">Structural Status</a>
<a class="btn btn-info btn-sm" data-preset="2" href="{{url('/occupancy')}}">Occupancy Status</a><br/><br/>
<a class="btn btn-info btn-sm" data-preset="3" href="{{url('/blank')}}">Mortgage Status</a>
<a class="btn btn-info btn-sm active" data-preset="4" href="{{url('/parcels')}}">Parcel Usage</a>

</div>
</div>

  <div class="col-md-7 searchMap">
    <div id="mapHolder">
    
    
    </div>
    
  </div>
</div>
@stop


@section('custom_js')
<script src="{{url('../assets/js/leaflet/leaflet.js')}}" type="text/javascript"></script> 
<script src="{{url('../assets/js/eastlegon-blank.js')}}" type="text/javascript"></script>

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