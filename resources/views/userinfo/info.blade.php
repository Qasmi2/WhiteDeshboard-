<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  
  <!-- Favicon -->
  <link href="" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 
  <link href="{{ asset('vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/argon.css') }}" rel="stylesheet">
</head>

<body>
<div id="app">
<?php 
        //$logo = array ($logo);
        foreach($logo as $te){
            $image = $te->cover_image;
        }
        
?>
  <!-- Sidenav -->
  @guest
  @else
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
    
      <a class="navbar-brand pt-0" href="#">

      <img src="{{$image}}" />
      <img  />
      <img  />
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="">
               Logout
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
           
            <div class="dropdown-divider"></div>
            <a  class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="#">
                <img src="../assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
       
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('showform') }}">
              <i class="ni ni-single-02 text-primary"></i>Add New
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('views') }}">
              <i class="ni ni-single-02 text-primary"></i>View Record
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logo') }}">
              <i class="ni ni-single-02 text-primary"></i>Logo Upload
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              <i class="ni ni-bullet-list-67 text-red"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
         
        </ul>
        <!-- Divider -->
        <!-- <hr class="my-3"> -->
        <!-- Heading -->
     
        <!-- Navigation -->
       
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
   
    @endguest
  
    <!-- Page content -->
        <main >
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Registration Form</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('flash-message')

                    <form method="POST"  action="{{route('insert')}}" >
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="name" >{{ __('Name') }}</label>
                                <input id="name" type="name" placeholder="Enter Your Name " class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                               
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                              
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="address" >{{ __('Address') }}</label>
                                <input id="address" type="text" placeholder="Enter your Address " class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>
                               
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                              
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="mobileNo">{{ __('Mobile Number') }}</label>
                                <input id="mobileNo" type="text" placeholder="Enter Mobile No ( 03331234567 )" class="form-control{{ $errors->has('mobileNo') ? ' is-invalid' : '' }}" name="mobileNo" value="{{ old('mobileNo') }}" >
                                @if ($errors->has('mobileNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobileNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="ptclNo">{{ __('PTCL Number') }}</label>
                                <input id="ptclNo" type="text" placeholder="Enter PTCL Number ( 051331234567 ) " class="form-control{{ $errors->has('ptclNo') ? ' is-invalid' : '' }}" name="ptclNo" value="{{ old('ptclNo') }}"  >
                              
                                @if ($errors->has('ptclNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('ptclNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                    <label for="identity">{{ __('CNIC Number') }}</label>
                                    <input id="identity" type="tel" size="15" maxlength="15" placeholder="CNIC NO ( 6110112345678 )" class="form-control{{ $errors->has('identity') ? ' is-invalid' : '' }}" name="identity" value="{{ old('identity') }}"  pattern="[0-9]{13}" title=" Please match the CNIC No" >
                                
                                    @if ($errors->has('identity'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('identity') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        

                     
                       
                        <div class="col-md-12 col-lg-12 col-sm-12" style="margin-top:30px;">
                            <div class="form-group row mb-0">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-primary " style="float:right;" >
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </div>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
      </div>
  </div>
  <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}" defer></script>
  <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer></script>
  <script src="{{ asset('js/argon.js') }}" defer></script>
</body>

</html>