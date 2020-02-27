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
            <div class="dashhead">Dashboard
            </div>
            
            <div class="dashhead2">Here are your Current Jobs
            </div>
            
            <div class="row">
                <!-- card is created for every ticket assigned -->
                @foreach ($tickets as $ticket) 
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            JOB NUMBER: <font weight="10px">{{$ticket->ticket_id}}</font><br>
                            <h2><b>{{$ticket->organisation_name}}</b></h2>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            
                             
                            <b>Client:</b> {{$ticket->client->client_name}}<br>
                            <b>Start Date:</b> {{$ticket->commencement_date}}<br>
                            <b>Due Date:</b> {{$ticket->due_date}}<br>
                            <b>Email:</b> {{$ticket->client->client_email}}<br>
                        </div>
                        <!-- button open information page for job -->
                        <a href="dashboard/info/{{$ticket->ticket_id}}" class="btn btn-color">More Information...</a>      
                    </div>
                </div>
                <br>
                @endforeach
            </div>
            <br>
            <!-- create new job button -->
            <div class="btnroute">
                <a href="{{ URL::route('create')}}" class="btn btn-color"><i class="fas fa-plus"></i> New Job</a>
            </div>
        </div>
    </div>
</div>
@else 
    <script>window.location = "/dashboard"</script>
@endif
@endsection

