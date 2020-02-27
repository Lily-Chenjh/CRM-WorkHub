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
            <a href="{{ URL::route('home')}}"><img src="/images/icons/unselected/jobs.png" alt="Italian Trulli" height="30px" width="30px"></a><p class="text_menu">Jobs</p>
            <a href="#"><img src="/images/icons/unselected/ProjectedJobs.png" alt="Italian Trulli" height="30px" width="30px"></a><p class="text_menu">Projected Jobs</p>
            <a class="active text-center" href="#"><img src="/images/icons/hover/Forms.png" alt="Italian Trulli" height="30px" width="30px"></a> <p class="text_menu">Forms</p>
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
            
            <div class="dashhead">Forms
            </div>
            @foreach ($users as $user)
            <div class="dashhead2">Here are your Forms
            </div>
            <br>
            @endforeach
            <!-- form card - to hold table of downloadable forms -->
            <div class="card">
                <div class="card-header">
                    <b> Forms: </b>
                </div>
                <div class="card-body">
                </div>
            </div>
            <!-- close card -->
        </div>
    </div>
</div>
@endsection

