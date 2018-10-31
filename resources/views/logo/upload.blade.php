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

                    

 <div class="container-fluid mt-2">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Logo Upload</h3>
            </div>
            <div class="card-body">
                <div class="p-3 bg-secondary mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;"></label>
                    <img src="{{$image}}" height="100" width="100">
                </div>
                <form method="POST" action="{{route('insertlogo')}}" enctype="multipart/form-data" value="PATCH" >
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                            <label>Please choose your Logo</label>
                                <br>
                                <input type="file" name="cover_image" id="cover_image" class="btn btn-primary" style="color:white;" required/>
                                    @if ($errors->has('cover_image'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('cover_image') }}</strong>
                                        </span>
                                    @endif
                                <br>
                              
                            </div>
                        </div>
                    
                        <div class="col-md-12 col-lg-12 col-sm-12" style="margin-top:30px;">
                            <div class="form-group row mb-0">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-primary "  >
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
    </main>
      </div>
  </div>
  <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}" defer></script>
  <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer></script>
  <script src="{{ asset('js/argon.js') }}" defer></script>
</body>

</html>