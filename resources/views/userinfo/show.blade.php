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
                         $view = sizeof($views);
                    ?>
                     
 <div class="container-fluid mt-2">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">View Record</h3>
              <div class="row">
                <div class="col-sm-6 offset-sm-6">
                      <input id="myInput" type="text" class="form-control" placeholder="Search..." style="border-radius: 20px;">
                </div>
              </div>  
            </div>
            <div class="table-responsive" style="overflow-y: auto;">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">NAME</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">MOBILE NUMBER</th>
                    <!-- <th scope="col">PTCL NUMBER</th>
                    <th scope="col">CNIC NUMBER</th> -->
                    <th scope="col">ACTIONS</th>
                   
                  </tr>
                </thead>
                <tbody id="myTable">
                @for($i=0; $i < $view ; $i++)
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                       
                        <div class="media-body">
                          <span class="mb-0 text-sm">{{$views[$i]['name']}}</span>
                        </div>
                      </div>
                    </th>
                    <td>
                    <span class="mb-0 text-sm">{{$views[$i]['address']}}</span>
                    </td>
                    <td>
                        <span class="badge badge-dot mr-4">
                        <span class="mb-0 text-sm">{{$views[$i]['mobileNo']}}</span>
                        </span>
                    </td>
                   
                    <!-- <td>
                    <span class="mb-0 text-sm">{{$views[$i]['identity']}}</span>
                    </td>-->
                    <td> 
                        <span class="badge badge-dot mr-4">
                        <span class="mb-0 text-sm">
                        <a href="{{ url('view/'.$views[$i]['id'])}}"> <span><img src="{{ asset('images/iconsuser.png') }}" /><span></a>
                        |
                        <a href="{{ url('edit/'.$views[$i]['id'])}}"> <span><img src="{{ asset('images/icone.png') }}" /><span></a>
                        |
                        <a href="{{ url('delete/'.$views[$i]['id']) }}" data-confirm="Are you sure you want to delete?" "><span><img src="{{ asset('images/icond2.png') }}" /><span></a></span>
                        </span>            
                       

                    </td>
                   
                  </tr>
                  @endfor
                </tbody>
              </table>
              {{$views->links()}}
            </div>
            
          </div>
        </div>
      </div>
@endsection