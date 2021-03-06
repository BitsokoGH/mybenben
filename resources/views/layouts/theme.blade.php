<!doctype html>
<html>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Benben is a digital land database providing fast easy access to trusted land content">
    <meta name="author" content="nii.nortey@gmail.com">
    <link rel="apple-touch-icon" href="{{url('../assets/img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{url('../assets/img/favicon.ico')}}">
    <title>BenBen</title>

    <!-- Fonts -->

    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href="{{url('../assets/css/font-awesome.css')}}" rel='stylesheet' type='text/css'>

    <!-- Styling -->
    <link href="{{url('../assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('../assets/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('../assets/css/benben-theme.css')}}" rel="stylesheet"  type="text/css">
    <link href="{{url('../assets/js/leaflet/leaflet.css')}}" rel="stylesheet" type="text/css">
@yield('custom_css')
    <!--[if lt IE 9]>
              <script src="../assets/js/html5shiv/html5shiv.js"></script>
    <![endif]-->

    <!-- JQuery  -->

    <script src="{{url('../assets/js/jquery/jquery-1.12.3.min.js')}}" type="text/javascript"></script>
</head><body>
@if (Auth::guest())
<script type="text/javascript">
    window.location = "{ url('/login') }";//here double curly bracket
</script>
@endif

<!--[if lt IE 8]>
              <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->

<div class="appMain">
  <nav class="navbar navbar-default">
    <div class="container-fluid"> 
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <img class="navbar-brand-logo" src="{{url('../assets/img/benben-logo.png')}}" title="BenBen"> <span class="navbar-brand-text"> BenBen</span> </div>
      
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><i class="glyphicon glyphicon-cog"></i></a> </li>
          <li><a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="glyphicon glyphicon-user">
            {{ Auth::user()->name }}
          </i> <span class="caret"></span></a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a href="#">Profile</a></li>
              <li><a href="#"> Set Up Payment</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{ url('/logout') }}">Log-Out</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </div>
    <!-- /.container-fluid --> 
  </nav>
  <div id="benbenNav">
    <nav class="navbar">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
        @if (Auth::user()->role=="public")           
                <li><a href="{{url('/home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a>
                </li>
                <li><a href="{{url('/search')}}"><i class="fa fa-search" aria-hidden="true"></i> Search</a>
                </li>
                <li><a href="{{url('/payment')}}"><i class="fa fa-credit-card" aria-hidden="true"></i> Payments History</a>
                </li>
                <li><a href="{{url('mydocs')}}"><i class="fa fa-file-text-o" aria-hidden="true"></i> My Docs</a>
                </li>   
        @elseif(Auth::user()->role=="demo")
                <li><a href="{{url('/home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a>

                <li><a href="{{url('overview')}}"><i class="fa fa-pie-chart" aria-hidden="true"></i>Overview</a>
                </li>        
                <li><a href="{{url('/search')}}"><i class="fa fa-search" aria-hidden="true"></i> Search</a>
                </li>
                <li><a href="{{url('blank')}}"><i class="fa fa-tasks" aria-hidden="true"></i> Explore</a>
                </li>                
                <li><a href="{{url('payment')}}"><i class="fa fa-credit-card" aria-hidden="true"></i> Payments History</a>
                </li>
                <li><a href="{{url('mydocs')}}"><i class="fa fa-file-text-o" aria-hidden="true"></i> To Do</a>
                </li>                
                <li><a href="{{url('mydocs')}}"><i class="fa fa-file-text-o" aria-hidden="true"></i> My Docs</a>
                </li>                     
        @elseif(Auth::user()->role=="bank")
                <li><a href="{{url('/home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a>

                <li><a href="{{url('overview')}}"><i class="fa fa-pie-chart" aria-hidden="true"></i>Overview</a>
                </li>        
                <li><a href="{{url('/search')}}"><i class="fa fa-search" aria-hidden="true"></i> Search</a>
                </li>
                <li><a href="{{url('blank')}}"><i class="fa fa-tasks" aria-hidden="true"></i> Explore</a>
                </li>                
                <li><a href="{{url('payment')}}"><i class="fa fa-credit-card" aria-hidden="true"></i> Payments History</a>
                </li>
                <li><a href="{{url('mydocs')}}"><i class="fa fa-file-text-o" aria-hidden="true"></i> Docs Management</a>
                </li> 
        @elseif(Auth::user()->role=="LC")
                <li><a href="{{url('home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a>
                
                <li><a href="{{url('overview')}}"><i class="fa fa-pie-chart" aria-hidden="true"></i>Overview</a>
                </li>        
                <li><a href="{{url('adminsearch')}}"><i class="fa fa-search" aria-hidden="true"></i> Search</a>
                </li>
                <li><a href="{{url('blank')}}"><i class="fa fa-tasks" aria-hidden="true"></i> Explore</a>
                </li>                
                <li><a href="{{url('payment')}}"><i class="fa fa-credit-card" aria-hidden="true"></i> Payments History</a>
                </li>
                <li><a href="{{url('mydocs')}}"><i class="fa fa-file-text-o" aria-hidden="true"></i> Docs Management</a>
                </li>                 
        @elseif(Auth::user()->role=="admin")
                <li><a href="{{url('home')}}"><i class="fa fa-home" aria-hidden="true"></i>Dashboard</a>
                </li>  
                <li><a href="{{url('parcels')}}"><i class="fa fa-pie-chart" aria-hidden="true"></i>Explore</a>
                </li> 
                <li><a href="{{url('search')}}"><i class="fa fa-search" aria-hidden="true"></i> Search</a>
                </li>
                <li><a href="{{url('blank')}}"><i class="fa fa-tasks" aria-hidden="true"></i> User Management</a>
                </li>                
                <li><a href="{{url('payment')}}"><i class="fa fa-credit-card" aria-hidden="true"></i> Payments History</a>
                </li>
                <li><a href="{{url('mydocs')}}"><i class="fa fa-file-text-o" aria-hidden="true"></i> Docs Management</a>
                </li> 
        @endif
                
            </ul>
            
            
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
  </div>

@yield('content')

<!-- Core  --> 
<script  src="{{url('../assets/js/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script>
@yield('custom_js') 
</body>
</html>