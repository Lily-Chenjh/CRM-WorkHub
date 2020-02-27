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
                <a href="{{ URL::route('dashboard')}}"><img src="/images/icons/hover/jobs.png" alt="Italian Trulli" height="30px" width="30px"></a><p class="text_menu">Jobs</p>
                <a href="#"><img src="/images/icons/unselected/ProjectedJobs.png" alt="Italian Trulli" height="30px" width="30px"></a><p class="text_menu">Projected Jobs</p>
                <a href="{{ URL::route('upload')}}"><img src="/images/icons/unselected/Forms.png" alt="Italian Trulli" height="30px" width="30px"></a> <p class="text_menu">Forms</p>
                <a href="#"><img src="/images/icons/unselected/BookMeeting.png" alt="Italian Trulli" height="30px" width="30px"></a><p class="text_menu">Book a Meeting</p>
                {{-- <a href="#"><img src="/images/icons/unselected/FacilitatorChat.png" alt="Italian Trulli" height="30px" width="30px"></a><p class="text_menu">Facilitator Chat</p> --}}
                <a href="{{ URL::route('users')}}"><img src="/images/icons/unselected/users4.png" alt="Italian Trulli" height="30px" width="30px"></a><p class="text_menu">Users</p>
                <a class="active text-center" href="{{ URL::route('create')}}"><img src="/images/icons/unselected/newjob.png" alt="Italian Trulli" height="35px" width="35px"></a><p class="text_menu">Create Job</p><!-- active icon -->
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
            <!-- create job card -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>New Job</b>
                    </div>
                    
                    <div class="card-body">
                        <form action="" method="post">
                            {{csrf_field() }}
                            <!-- organisation information rows -->
                            <div class="form-group">
                                <label for="exampleTextarea">Organisation Name:</label>
                                <input type="text" class="form-control" name="organisation_name" id="exampleTextarea" aria-describedby="" placeholder="Enter Organisation Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea">Organisation Physical Address:</label>
                                <input type="text" class="form-control" name="physical_address" id="exampleTextarea3" aria-describedby="" placeholder="Enter Organisation Physical Address">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea">Organisation Postal Address:</label>
                                <input type="text" class="form-control" name="postal_address" id="exampleTextarea2" aria-describedby="" placeholder="Enter Organisation Postal Address:">
                            </div>
                        

                            <!-- description information row -->
                            <div class="form-group ">
                                <label for="exampleTextarea">Description</label>
                                <textarea class="form-control" name="description" id="exampleTextarea" rows="1"></textarea>
                            </div>

                            <!-- student assigned select row -->
                            <div class="row">
                            
                            <div class="form-group col-md-4">
                                    <label for="exampleSelect1">Client</label>
                                    <select class="form-control" name="client_id" id="exampleSelect1">
                                        @foreach ($clients as $client)
                                        <option value="{{$client->client_id}}">{{$client->client_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- job dates row -->
                            <div class="form-group row">
                                <label for="exampleTextarea">Start Date:</label>                                
                                <div class="col-4">
                                    <input class="form-control" name="start_date" type="date" placeholder="2011-08-19T13:45:00" id="example-datetime-local-input">
                                </div>
                                <label for="exampleTextarea">Due Date</label>
                                <div class="col-4">
                                    <input class="form-control" name="due_date" type="date" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                                </div>
                            </div>

                            <!-- submit form button -->
                            <input type="submit" name="submit" action="admin.admin_dashboard" class="btn btn-color col-12">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    <script>window.location = "/dashboard"</script>
@endif
@endsection

