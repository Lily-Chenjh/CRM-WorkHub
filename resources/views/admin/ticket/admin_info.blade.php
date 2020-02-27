@extends('layouts.app')

@section('content')

@if (Auth::user()->admin==1)
 <!-- colours background of dashboard -->
<div class="fill-py4">
    <!-- side menu with icons -->
    <div class="nav-side-menu">
        <div class="brand">
        </div>
        <br>
        <div class="menu1"> 
            <div class="icon-bar">
                <a class="active text-center" href="{{ URL::route('dashboard')}}"><img src="/images/icons/hover/jobs.png" alt="Italian Trulli" height="30px" width="30px"></a><p class="text_menu">Jobs</p><!-- active icon -->
                <a href="#"><img src="/images/icons/unselected/ProjectedJobs.png" alt="Italian Trulli" height="30px" width="30px"></a><p class="text_menu">Projected Jobs</p>
                <a href="{{ URL::route('upload')}}"><img src="/images/icons/unselected/Forms.png" alt="Italian Trulli" height="30px" width="30px"></a> <p class="text_menu">Forms</p>
                <a href="#"><img src="/images/icons/unselected/BookMeeting.png" alt="Italian Trulli" height="30px" width="30px"></a><p class="text_menu">Book a Meeting</p>
                {{-- <a href="#"><img src="/images/icons/unselected/FacilitatorChat.png" alt="Italian Trulli" height="30px" width="30px"></a><p class="text_menu">Facilitator Chat</p> --}}
                <a href="{{ URL::route('users')}}"><img src="/images/icons/unselected/users4.png" alt="Italian Trulli" height="30px" width="30px"></a><p class="text_menu">Users</p>
                <a href="{{ URL::route('create')}}"><img src="/images/icons/unselected/newjob.png" alt="Italian Trulli" height="35px" width="35px"></a><p class="text_menu">Create Job</p>
                <a href="{{ URL::route('createC')}}"><img src="/images/icons/unselected/users4.png" alt="Italian Trulli" height="35px" width="35px"></a><p class="text_menu">Create Client</p>
            </div>
        </div>
    </div>
    <!-- side menu end -->

    <!-- dashboard container -->
    <div class="container3" style="margin-left:120px;margin-right: 0px;">
        <!-- container that surrounds all dashboard info -->
        <div class="containerDash">
            <!-- button back to dashboard -->
            <div class="btnroute2">
                <a href="{{ URL::route('dashboard')}}" class="btn btn-color"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
            <br>
            @foreach ($tickets as $ticket)
            <div class="col-md-12">
                <!-- job information card form -->
                <div class="card">
                    <div class="card-header">
                        <b> Job Information - Job No {{$ticket->ticket_id}}</b>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            {{csrf_field() }}
                            <!-- client information row -->
                            

                            <!-- date information row with dropdown toggle -->
                            <div class="form-group row">
                                <label for="exampleTextarea">Start Date:</label>                                
                                <div class="col-4">
                                    <input class="form-control" type="text" placeholder="{{$ticket->commencement_date}}" readonly>
                                </div>
                                <label for="exampleTextarea">Due Date: </label>
                                <div class="col-4">
                                    <input class="form-control" type="text" placeholder="{{$ticket->due_date}}" readonly>
                                </div>
                                <!-- dropdown toggle -->
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseExample+{{$ticket->ticket_id}}" aria-expanded="false" aria-controls="collapseExample"></button>
                            </div>
                        

                            <!-- dropdown box collapse information -->
                            <div class="collapse" id="collapseExample+{{$ticket->ticket_id}}">
                                <div class="info">
                                    <!-- organisation information rows -->
                                    <div class="form-group"> 
                                        <label for="exampleTextarea">Organisation Name:</label>
                                        <input class="form-control" type="text" placeholder="{{$ticket->organisation_name}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea">Organisation Postal Address:</label>
                                        <input class="form-control" type="text" placeholder="{{$ticket->postal_address}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea">Organisation Physical Address:</label>
                                        <input class="form-control" type="text" placeholder="{{$ticket->physical_address}}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleTextarea">Description: </label>
                                        <textarea class="form-control" type="text" id="exampleTextarea" rows="2" placeholder="{{$ticket->description_brief}}" readonly></textarea>
                                    </div>

                                    
                       
                       
                                    <!-- add user modal button (if no users left to add button is hidden)  -->
                                    <div class="form-group row">                            
                                        @if (count($users) > 0)                
                                            <button  type="button" class="btn btn-color" data-toggle="modal" id="detailsmodal" data-target="#myModal" >Add users</button>
                                        @else
                                            <!-- display nothing -->
                                        
                                        @endif   
                                        <!-- remove user modal button (if no users assigned to ticket hid button)  -->
                                        @if (count($ticket->users) == 0)
                                            <!-- display nothing -->
                                        @else
                                        <button  type="button" class="btn btn-color" id="deletemodal"data-toggle="modal" data-target="#deleteuser" >Remove users</button>                                          
                                        @endif                    
                                    </div>                           
                    
                        
                                
                                <label>Assigned users:</label>
                                    <!-- assigned users row -->               
                                    <div class="form-group row">      
                                    @foreach ($ticket->users as $user)
                                       <div class="col-md-3" id="assigneduser">         
                                           <input class="form-control" type="text" placeholder="{{$user->name}}" readonly>  
                                       </div>
                                    @endforeach  
                                   
                                    </div>  
                                </div>

                                <!-- add users modal -->
                                <div id="myModal" class="modal fade" role="dialog" method="POST" action="AdminController@store">                             
                                {{csrf_field() }}
                                    <div class="modal-dialog modal-sm">  
                                    
                                    <div class="modal-content">
                                        <div class="modal-header">
                                           <h4 class="modal-title">Assign users</h4>
                                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        
                                       </div>
                                    <div class="modal-body"> 
                                
                                    @foreach($users as $user)                                  
                                        <input type="checkbox" id="chk" name="id[]" value="{{$user->id}}">{{$user->name}}<br/>
                                    @endforeach
                                    </div>
                                
                                    <div class="modal-footer">
                                       <input type="submit" id="btn" class="btn btn-color" value="add" name="submit">                                   
                                    </div>                               
                                    </div>
                                    </div>
                                </div>
                             
                            </div><!-- end collapse information -->                                 
                        </form>
                            <!-- remove users modal -->
                            <form action="" method="post">
                            <div id ="deleteuser" class="modal" role="dialog" method="POST" action="AdminController@destroy">                      
                             
                             <div class="modal-dialog modal-sm" >
                              {{csrf_field() }}  
                                    <input type="hidden" name="_method" value="delete">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                      <h4 class="modal-title">Remove user</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                                     </div>
                                     <div class="modal-body">
                                  
                                      @foreach($ticket->users as $user)                                  
                                          <input type="checkbox"  name="checked[]" value="{{$user->id}}">{{$user->name}}<br/>
                                      @endforeach
                                     </div>
                                     <div class="modal-footer">
                                        <input type="submit" class="btn btn-color"  value="Delete">                                      
                                     </div>
                                     </div>
                                </div>                           
                            </div>
                        </form>
                       
                    </div>                                                          
                </div>
            </div>               
            
                    
             
            
              <br>

                <!-- Client info -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <b> Client Correspondence - Job No {{$ticket->ticket_id}}</b>
                        </div>
                        <div class="card-body">
                        <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="exampleTextarea">Client Name:</label>
                                    <input class="form-control" type="text" placeholder="{{$ticket->client->client_name}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleTextarea">Client Position:</label>
                                    <input class="form-control" type="text" placeholder="{{$ticket->client->client_position}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleTextarea">Client Email:</label>
                                    <input class="form-control" type="text" placeholder="{{$ticket->client->client_email}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleTextarea">Client Phone:</label>
                                    <input class="form-control" type="text" placeholder="{{$ticket->client->client_phone}}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>

<!-- toggle collapse function -->
<script>
    $(document).ready(function(){

        $('.col-md-4').hover(
            // trigger when mouse hover
            function(){
                $(this).animate({
                    marginTop: "-=1%",
                },200);
            },

            // trigger when mouse out
            function(){
                $(this).animate({
                    marginTop: "0%"
                },200);
            }
        );
    });
</script>

@else
<script>window.location = "/dashboard";</script>
@endif

@endsection
