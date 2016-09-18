 @extends('layouts.theme')

@section('custom_css')
<link href="{{url('../assets/js/leaflet/leaflet.css')}}" rel="stylesheet" type="text/css">
@stop
@section('content')
<!--
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
-->
  
  <div class="row confirmInfo">
  @if(Auth::user()->role=="admin")
    <div class="col-md-6">
      <h5>Payment History</h5>
      <div class="table-responsive">
        <table class="table">
        <thead>
          <tr>
            <th>Date</th><th>Destination</th><th>Amount</th><th>Location Searched</th>
          </tr>
          </thead>        
          <tr> 
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
          </tr>
        </table>
      </div>
      
    </div>
            <div class="col-md-6">
                <div class="searchTitle"><form style="margin: 0px; padding: 0px;">


                        <!-- Select Basic -->
                        <select id="selectbasic" name="selectbasic" class="form-control">
                            <option value="">All Properties</option>
                            <option value="1">East Legon</option>
                            <option value="2">Ofankor</option>
                        </select>

                    </form></div>
                <h3 class="text-center">1,063 properties surveyed</h3>
                <div class="row">
                <div class="col-md-4">
                <div id="mortgaged" style="min-width: 150px; height: 400px; max-width: 600px; margin: 0 auto">
                    
                </div> 
                    
                </div>
                <div class="col-md-4">
                
                <div id="vacancy" style="min-width: 150px; height: 400px; max-width: 600px; margin: 0 auto">
                    
                </div> 
                </div>
                <div class="col-md-4">
                    
                <div id="valuation" style="min-width: 150px; height: 400px; max-width: 600px; margin: 0 auto">
                    
                </div> 

                </div>                           

                </div>  
            </div>
        <!--
    <div class="col-md-4 ">
      <h5>Customers Feedback </h5>
  </div>
  -->
  @elseif(Auth::user()->role=="bank")

    <div class="col-md-6">
                <div class="searchTitle"><form style="margin: 0px; padding: 0px;">


                        <!-- Select Basic -->
                        <div class="input-group">
                        <select id="lineReportSelect" name="lineReportSelect" class="form-control">
                            <option value="">Select Perspective</option>
                            <option value="1" selected="selected">Annual Report</option>
                            <option value="2">Monthly Report</option>
                            <option value="3">Weekly Report</option>
                        </select>
                         <span class="input-group-btn">
                            <button class="btn btn-default btn-primary" type="button" id="generate-report">Generate Report</button>
                        </span>
                        </div>

                    </form></div>
        <div id="container" style=" min-width: 450px; height: 400px; margin: 0 auto"></div>
        <div id="container2" style=" min-width: 450px; height: 400px; margin: 0 auto"></div>
        <div id="container3" style=" min-width: 450px; height: 400px; margin: 0 auto"></div>
      
    </div>
            <div class="col-md-6">
                <div class="searchTitle"><form style="margin: 0px; padding: 0px;">


                        <!-- Select Basic -->
                        <div class="input-group">
                        <select id="selectbasic" name="selectbasic" class="form-control">
                            <option value="">All properties</option>
                            <option value="1">East Legon</option>
                            <option value="2">Ofankor</option>
                        </select>
                         <span class="input-group-btn">
                            <button class="btn btn-default btn-primary" type="button" id="generate-report">Generate Report</button>
                        </span>
                        </div>                        

                    </form></div>
                <h3 class="text-center">1,063 Properties Mortgaged</h3>
                <div class="row">
                <div class="col-md-4">
                <div id="mortgaged" style="min-width: 150px; height: 400px; max-width: 600px; margin: 0 auto">
                    
                </div> 
                    
                </div>
                <div class="col-md-4">
                
                <div id="vacancy" style="min-width: 150px; height: 400px; max-width: 600px; margin: 0 auto">
                    
                </div> 
                </div>
                <div class="col-md-4">
                    
                <div id="valuation" style="min-width: 150px; height: 400px; max-width: 600px; margin: 0 auto">
                    
                </div> 

                </div>                           

                </div>  
            </div>

  @elseif(Auth::user()->role=="LC")
      <div class="col-md-6">
                <div class="searchTitle"><form style="margin: 0px; padding: 0px;">


                        <!-- Select Basic -->
                        <div class="input-group">
                        <select id="lineReportSelect" name="lineReportSelect" class="form-control">
                            <option value="">Select Perspective</option>
                            <option value="1" selected="selected">Annual Report</option>
                            <option value="2">Monthly Report</option>
                            <option value="3">Weekly Report</option>
                        </select>
                         <span class="input-group-btn">
                            <button class="btn btn-default btn-primary" type="button" id="generate-report">Generate Report</button>
                        </span>
                        </div>                          

                    </form></div>
        <div id="container" style=" min-width: 450px; height: 400px; margin: 0 auto"></div>
        <div id="container2" style=" min-width: 450px; height: 400px; margin: 0 auto"></div>
        <div id="container3" style=" min-width: 450px; height: 400px; margin: 0 auto"></div>
      
    </div>
            <div class="col-md-6">
                <div class="searchTitle"><form style="margin: 0px; padding: 0px;">


                        <!-- Select Basic -->
                        <div class="input-group">
                        <select id="selectbasic" name="selectbasic" class="form-control">
                            <option value="">All Properties</option>
                            <option value="1">East Legon</option>
                            <option value="2">Ofankor</option>
                        </select>
                         <span class="input-group-btn">
                            <button class="btn btn-default btn-primary" type="button" id="generate-report">Generate Report</button>
                        </span>
                        </div>                         

                    </form></div>
                <h3 class="text-center">1,063 properties Surveyed</h3>
                <div class="row">
                <div class="col-md-4">
                <div id="mortgaged" style="min-width: 150px; height: 400px; max-width: 600px; margin: 0 auto">
                    
                </div> 
                    
                </div>
                <div class="col-md-4">
                
                <div id="vacancy" style="min-width: 150px; height: 400px; max-width: 600px; margin: 0 auto">
                    
                </div> 
                </div>
                <div class="col-md-4">
                    
                <div id="valuation" style="min-width: 150px; height: 400px; max-width: 600px; margin: 0 auto">
                    
                </div> 

                </div>                           

                </div>  
            </div>
            
  @else
    <div class="col-md-4">
      <h5>My Properties</h5>
      <div class="table-responsive">
        <table class="table">
          <tr>
           
            <td><a href="#"> <i class="fa fa-map-marker" aria-hidden="true"></i> 34 Lagon St. East Legon </a></td>
          </tr>
          <tr>
          <td><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> F345/2 Maroon Street, East Legon</a></td>
          </tr>
          
          
        </table>
      </div>
      
    </div>
    <div class="col-md-4  lrborder">
      <h5>Location Map</h5>
      <iframe src="../map/East Legon - Site Control.htm" frameborder="0" width="380" height="400"></iframe>
      
    </div>
    <div class="col-md-4 ">
      <h5>News Feeds </h5>
  </div>
  @endif
</div>
@endsection
@section('custom_js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<!--<script src="https://code.highcharts.com/modules/exporting.js"></script>-->
<script>
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Properties Mortgaged per Year',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: Lands Commission',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: '# of Properties mortgaged'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Properties'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'bottom',
            borderWidth: 0
        },
        series: [{
            name: 'Registered',
            data: [7, 6, 9, 14, 18, 21, 25, 26, 23, 18, 13, 9]
        }, {
            name: 'Unregistered',
            data: [9, 7, 3, 8, 13, 17, 18, 17, 14, 9, 3, 1]
        }]
    });
});

$(function () {
    $('#container2').highcharts({
        title: {
            text: 'Properties Mortgaged per Month',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: Lands Commission',
            x: -20
        },
        xAxis: {
            categories: ['WK 1', 'WK 2', 'WK 3', 'WK 4']
        },
        yAxis: {
            title: {
                text: '# of Properties Mortgaged'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Properties'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'bottom',
            borderWidth: 0
        },
        series: [{
            name: 'Registered',
            data: [18, 21, 25, 26]
        }, {
            name: 'Unregistered',
            data: [13, 17, 18, 17]
        }]
    });
});

$(function () {
    $('#container3').highcharts({
        title: {
            text: 'Properties Mortgaged per Week',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: Lands Commission',
            x: -20
        },
        xAxis: {
            categories: ['Mon', 'Tue', 'Wed', 'Thur', 'Fri']
        },
        yAxis: {
            title: {
                text: '# of Properties Mortgaged'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Properties'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'bottom',
            borderWidth: 0
        },
        series: [{
            name: 'Registered',
            data: [18, 21, 25, 26,30]
        }, {
            name: 'Unregistered',
            data: [13, 17, 18, 17,6]
        }]
    });
});


$(function () {

    $(document).ready(function () {

                $("#container2").css("display","none");
                $("#container3").css("display","none");

        $( "#lineReportSelect" ).change(function() {

            var selectValue = $("#lineReportSelect").val();
            if(selectValue==1){
                $("#container").css("display","block");
                $("#container2").css("display","none");
                $("#container3").css("display","none");
            }

            if(selectValue == 2){
                $("#container").css("display","none"); 
                $("#container2").css("display","block");
                $("#container3").css("display","none");
            }

            if(selectValue == 3){
                $("#container").css("display","none"); 
                $("#container2").css("display","none");
                $("#container3").css("display","block");
            }           

        });

        // Build the chart
        $('#mortgaged').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Mortgaged Parcels'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Registered',
                    y: 56.33
                }, {
                    name: 'Unregistered',
                    y: 24.03,
                    selected: true
                }, {
                    name: 'Not Mortgaged',
                    y: 10.38
                }]
            }]
        });

        $('#vacancy').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Structural Status'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Completed',
                    y: 56.33
                }, {
                    name: 'Incomplete',
                    y: 24.03,
                    selected: true
                }, {
                    name: 'No Structure',
                    y: 10.38
                }]
            }]
        });

        $('#valuation').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Property Valuation'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: '  0 - 49K',
                    y: 56.33
                }, {
                    name: '  50  -  149K  ',
                    y: 99.03,
                    selected: true
                }, {
                    name: '>150',
                    y: 10.38
                }]
            }]
        });

    });
});
</script>
@stop