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
                <a class="active text-center" href="{{ URL::route('upload')}}"><img src="/images/icons/unselected/Forms.png" alt="Italian Trulli" height="30px" width="30px"></a> <p class="text_menu">Forms</p>
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
            <div class="btnroute2">
                <a href="{{ URL::route('dashboard')}}" class="btn btn-color"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
            <div class="dashhead">Forms</div>
            
                <!-- form card - to hold table of downloadable forms -->
                <div class="card">
                    <div class="card-header">
                        <b> Forms: </b>
                    </div>
                    <div class="card-body">
                     <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
                     {{csrf_field() }}
                     <input type="file" name="file"> 
                        <button type="submit" class="btn" name="submit">upload</button>
                     </form>
                        <div class="row">
                        @foreach($files as $file)
                        
                            <a href="{{route('download',$file->name)}}" download>{{$file->name}}</a>
                            <!-- <img src="{{route('download',$file->name)}}" height="100px" width="100px">  -->
                         
                        @endforeach
                        </div>
                    </div>  
                </div>
                
                <!-- close card -->
            </div>
        </div>
    </div>
</div>
@else
    <script>window.location = "/dashboard"</script>
@endif
@endsection

