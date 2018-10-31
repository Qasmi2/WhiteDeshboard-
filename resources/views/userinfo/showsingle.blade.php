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
@include('flash-message')
                      <!-- javaScript delete confirmation -->
                      <script>
                                $(document).ready(function() {
                                $('a[data-confirm]').click(function(ev) {
                                var href = $(this).attr('href');
                                if (!$('#dataConfirmModal').length) {
                                $('body').append('<div id="dataConfirmModal" class="modal fade modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog "><div class="modal-content"><div class=" modal-header" style="text-align:left;display:flow-root !important;color:#fff !important;background-color: #5e72e4;" ><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel" style="color:white;" >Please Confirm</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button><a class="btn btn-primary" id="dataConfirmOK">Delete</a></div></div></div></div>');
                                } 
                                $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
                                $('#dataConfirmOK').attr('href', href);
                                $('#dataConfirmModal').modal({show:true});
                                return false;
                                    });
                            });
                        </script>
                     <script>
                                    $(document).ready(function(){
                                    $("#myInput").on("keyup", function() {
                                        var value = $(this).val().toLowerCase();
                                        $("#myTable tr").filter(function() {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                        });
                                    });
                                    });
                            </script>    
                        <!-- End JavaScript code -->

                    <?php 
                      
                     $view = array($views);
                     foreach($view as $te){
                       $id= $te->id;
                       $name = $te->name;
                       $address = $te->address;
                       $mobileNo = $te->mobileNo;
                       $ptclNo = $te->ptclNO;
                       $cnicNO = $te->identity;
                     
                     }
                     
                    ?>
                     
 <div class="container-fluid mt-2">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
          
            <div class="card-header lab border-0">

              <h2 class="mb-0" style="color:#444;">{{$name }}'s   Record</h2>
        
              <div class="row mt-5">
                <div class="col-sm-3">
                  <h4 >  Name:</h4> 
                </div>
                <div class="col-sm-9">
                <h4>   {{$name}}</h4> 
                </div>
              </div>  
              <div class="row">
                <div class="col-sm-3">
                <h4>   Address:</h4> 
                </div>
                <div class="col-sm-9">
                <h4>  {{$address}}</h4> 
                </div>
              </div>  
              <div class="row">
                <div class="col-sm-3">
                <h4>   Mobile Number: </h4> 
                </div>
                <div class="col-sm-9">
                <h4>    {{$mobileNo}}</h4> 
                </div>
              </div>  
              <div class="row">
                <div class="col-sm-3">
                <h4>   PTCL Number:</h4> 
                </div>
                <div class="col-sm-9">
                <h4>   {{$ptclNo}}</h4> 
                </div>
              </div>  
              <div class="row">
                <div class="col-sm-3">
                <h4>  CNIC Number:</h4> 
                </div>
                <div class="col-sm-9">
                <h4>   {{$cnicNO}}</h4> 
                </div>
              </div>  
            </div>
            

          </div>
          <div class="float:left">
                <span class="badge badge-dot mr-4">
                        <span class="mb-0 text-sm">
                             <img onclick="window.history.go(-1)" src="{{ asset('images/backspace.png') }}" />
                            
                        </span>
                </span> 
          </div>
          <div style="float:right;">
            <span class="badge badge-dot mr-4">
                        <span class="mb-0 text-sm">
                        <a href="{{ url('edit/'.$id)}}"> <span><img src="{{ asset('images/icone.png') }}" /><span></a>
                        |
                        <a href="{{ url('delete/'.$id) }}" data-confirm="Are you sure you want to delete?" "><span><img src="{{ asset('images/icond2.png') }}" /><span></a></span>
            </span>  
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