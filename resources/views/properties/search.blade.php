@extends('layouts.theme')
@section('custom_css')
<link href="{{url('../assets/js/leaflet/leaflet.css')}}" rel="stylesheet" type="text/css">
@stop
 @section('content')
  <div class="row">
    <div class="col-md-4 serachBox">
    <div class="searchTitle">Search for a property </div>

                <div class="btn-toolbar nomobile"  style="margin-bottom: 0.5em; margin-top: 0.5em;">
                    <div class="btn-grooop"  style="margin-left: 0; margin: 0 auto;">
                        <a class="btn btn-primary btn-lg active"   href="{{url('/overview')}}">
                            <i class="glyphicon glyphicon-eye-open"></i>
                            &nbsp;
                            Overview
                        </a>&nbsp;&nbsp;
                        <a class="btn btn-primary btn-lg"   href="{{url('/parcels')}}">
                            <i class="glyphicon glyphicon-filter"></i>
                            &nbsp;&nbsp;
                            Explore
                        </a>
                        &nbsp;
                        <a class="btn btn-primary btn-lg"   href="{{url('/search')}}">
                            <i class="glyphicon glyphicon-search"></i>
                            &nbsp;
                            Search
                        </a>
                    </div>
                </div>
                   
    <div class="col-md-10">
    <form action="{{url('/search')}}" method="post">
    <div class="form-group">
        <label for="mapTypes">&nbsp;</label>
        <input type="search" class="form-control " name="search_param" id="searchMap" placeholder="Parcel No.">
    </div>      
    <button type="submit" class="btn btn-primary pull-right">Search</button>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
    </div>              
    </div>
    <div class="col-md-8 searchMap">
    <div id="mapHolder"></div> 
    </div>
    
</div>
@stop


@section('custom_js')
<script src="{{url('../assets/js/leaflet/leaflet.js')}}" type="text/javascript"></script> 
<script src="{{url('../assets/js/eastlegon.js')}}" type="text/javascript"></script>

<script>

//Map


var map = L.map('mapHolder').setView([5.629265210427313, -0.165195452969745,], 15);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpandmbXliNDBjZWd2M2x6bDk3c2ZtOTkifQ._QA7i5Mpkd_m30IGElHziw', {
  
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
        '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="http://mapbox.com">Mapbox</a>',
    id: 'mapbox.light'
}).addTo(map);




// control that shows Parcel info on hover
var info = L.control();

info.onAdd = function(map) {
    this._div = L.DomUtil.create('div', 'info');
    this.update();
    return this._div;
};

info.update = function(props) {
    this._div.innerHTML = '<h5>BenBen Land Parcel Data</h5>' + (props ?
        '<b>' + props.address + '</b><br />' + 'Usage: ' + props.use + '<br />' + 'Occupancy: ' + props.occupancy + '<br />' + 'Structure: ' + props.structure:
        'Hover over a parcel');
};

info.addTo(map);





// get color depending on population density value
function getColor(d) {
	
	if(d == "residential" ){
		return "#b30059";exit;	
	}
		if(d == "commercial" ){
		return "#5073e6";exit;	
	}
		if(d == "mixed" ){
		return "#e6e620";exit;	
	}
		if(d == "industrial" ){
		return "#5c00b3";exit;	
	}
		if(d == "institutional" ){
		return "#2db802";exit;	
	}
	if(d == "other" ){
		return "#0074b3";exit;	
	}
	if(d == "unknown" ){
		return "gold";exit;	
	}
	if(d == "vacant" ){
		return "#e66c15'";exit;	
	}
	if(d == "parking" ){
		return "#e3e6e1";exit;	
	}
	if(d == "park" ){
		return "red";exit;	
	}
		   
		   
	   
}

function style(feature) {
    return {
        fillColor: getColor(feature.properties.use),
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '',
        fillOpacity: 0.7
    };
}

L.geoJson(parcelData, {style: style}).addTo(map);







function highlightFeature(e) {
    var layer = e.target;

    layer.setStyle({
        weight: 1,
        color: '#666',
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


var legend = L.control({
    position: 'bottomright'
});

legend.onAdd = function(map) {
	

    var div = L.DomUtil.create('div', 'info legend'),
	grades = ["#b30059", "#5073e6", "0074b3", "#2db802", "#5c00b3", "gold", "#e3e6e1", "red"]


    for (var i = 0; i < grades.length; i++) {
        from = grades[i];

        labels.push('<i style="background:' + getColor(from + 1) + '"></i>');
    }

    div.innerHTML = labels.join('<br>');
    return div;
};

//legend.addTo(map);
</script>
@stop
