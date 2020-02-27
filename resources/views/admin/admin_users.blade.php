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
                <a class="active text-center" href="{{ URL::route('users')}}"><img src="/images/icons/unselected/users4.png" alt="Italian Trulli" height="30px" width="30px"></a><p class="text_menu">Users</p>
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
            <div class="col-md-12">
                <!-- admin list card -->
                <div class="card">
                    <div class="card-header">
                        <b> UCOL Workhub Admin List</b>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <table style="width:100%">
                                <tr>
                                    <th>ID</th>
                                    <th>Names</th>
                                    <th>Emails</th>
                                    <th>Passwords</th>
                                </tr>
                                </div>
                                <!-- generates a list of admins -->
                                @foreach ($admin as $adm) 
                                <tr>
                                    <td>{{$adm->id}}</td>
                                    <td>{{$adm->name}}</td>
                                    <td>{{$adm->email}}</td>
                                    <td>{{$adm->password}}</td>
                                </tr>
                                @endforeach
                            </table> 
                        </div> 
                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-12">
                <!-- user list card -->
                <div class="card">
                    <div class="card-header">
                        <b> UCOL Workhub User List</b>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <table style="width:100%">
                                <tr>
                                    <th>ID</th>
                                    <th>Names</th>
                                    <th>Emails</th>
                                    <th>Passwords</th>
                                </tr>
                                <!-- generates a list of users -->
                                @foreach ($users as $userlist) 
                                <tr>
                                    <td>{{$userlist->id}}</td>
                                    <td>{{$userlist->name}}</td>
                                    <td>{{$userlist->email}}</td>
                                    <td>{{$userlist->password}}</td>
                                </tr>
                                @endforeach
                            </table> 
                        </div> 
                    </div>
                </div> 
                <!-- Code below will be for creating new users -->
                <div class="btnroute">
                    <a href="" class="btn btn-color"><i class="fas fa-plus"></i> New User</a>
                </div>
                <br> 
            </div>
        </div>
    </div>
</div>
@else
    <script>window.location = "/dashboard"</script>
@endif
@endsection


        