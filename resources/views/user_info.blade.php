@extends('layouts.app')

@section('content')
 <!-- colours background of dashboard -->
<div class="fill-py4">
    <!-- side menu with icons -->
    <div class="nav-side-menu">
        <div class="brand">
        </div>
        <br>
        <div class="menu1"> 
            <div class="icon-bar">
                <a class="active text-center" href="{{ URL::route('home')}}"><img src="/images/icons/hover/jobs.png" alt="Italian Trulli" height="30px" width="30px"></a><p class="text_menu">Jobs</p>
                <a href="#"><img src="/images/icons/unselected/ProjectedJobs.png" alt="Italian Trulli" height="30px" width="30px"></a><p class="text_menu">Projected Jobs</p>
                <a href="{{ URL::route('upload')}}"><img src="/images/icons/unselected/Forms.png" alt="Italian Trulli" height="30px" width="30px"></a> <p class="text_menu">Forms</p>
                <a href="#"><img src="/images/icons/unselected/BookMeeting.png" alt="Italian Trulli" height="30px" width="30px"></a><p class="text_menu">Book a Meeting</p>
                {{-- <a href="#"><img src="/images/icons/unselected/FacilitatorChat.png" alt="Italian Trulli" height="30px" width="30px"></a><p class="text_menu">Facilitator Chat</p> --}}
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
                <a href="{{ URL::route('home')}}" class="btn btn-color"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
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

                                    <!-- assign student -->
                                    <label>Assigned users:</label>
                                    <div class="form-group row">      
                                    @foreach ($ticket->users as $user)
                                        <div class="col-md-3" id="assigneduser">         
                                            <input class="form-control" type="text" placeholder="{{$user->name}}" readonly>  
                                        </div>
                                    @endforeach  
                                   
                            </div>
                                    <!-- <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="exampleTextarea">Assigned Student: </label>
                                            <input class="form-control" type="text" placeholder="{{$ticket->name}}" for="exampleSelect1" readonly>
                                        </div>
                                        
                                    </div> -->
                                    

                                    <!-- <div class="form-group row" id="row2">
                                        <label for="exampleTextarea">Hours: </label> 
                                        <div class="col-4">
                                            <input class="form-control" type="number" name="hours" placeholder="{{$ticket->hours_dedicated}}" readonly>
                                        </div>
                                    </div> -->
                                </div>
                            </div><!-- end collapse information -->
                        </form><!-- end form -->
                    </div>
                </div><!-- end card -->
                <br>

                <!-- email correspondence form -->
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

@endsection