@extends('layouts.app')

@section('content')
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
@endsection