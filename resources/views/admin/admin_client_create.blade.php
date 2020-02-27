@extends('layouts.app')

@section('content')
@if (Auth::user()->admin==1)


<div class="container3" style="margin-left:120px;margin-right: 0px;">
    <div class="containerDash">
        <div class="btnroute2">
            <a href="{{ URL::route('dashboard')}}" class="btn btn-color"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        </div>
        <br>
        <!-- client create form -->
        <div class="col-md-12">
        
            <div class="card">
                <div class="card-header">
                    <b>New Client</b>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                    {{csrf_field() }}
                                                  
                        <div class="form-group">
                            <label for="exampleTextarea">Client name</label>                             
                            <input class="form-control"type="text"  name="client_name"  id="example-number-input">                                    
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Client position</label>                             
                            <input class="form-control" type="text" name="client_position"  id="example-number-input">                                    
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Client email</label>                             
                            <input class="form-control" type="text" name="client_email"  id="example-number-input">                                    
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Client phone</label>                             
                            <input class="form-control" type="text" name="client_phone"  id="example-number-input">                                    
                        </div>
                        <input type="submit" name="submit" action="admin.admin_dashboard" class="btn btn-color col-12">

                    </form>
                </div>
            </div>       
        </div>
    </div>
</div>
@else
    <script>window.location = "/dashboard"</script>
@endif
@endsection