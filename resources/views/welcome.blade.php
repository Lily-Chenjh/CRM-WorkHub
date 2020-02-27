<!doctype html>
    <html lang="{{ app()->getLocale() }}">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>UCOL WORKHUB</title>
            <!-- scripts -->
            <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
            <link href="css/styles.css" rel="stylesheet" type="text/css">
        </head>
        <body>
            <div class="flex-center">
            <!-- if the person is logged in, set home link to dashboard, if not, set login and register buttons -->
                @if (Route::has('login'))
                    <div class="top-right links">
                        @if (Auth::check())
                            @if(Auth::user()->admin == 1)
                                <a href="{{ URL::route('dashboard') }}">Home</a>
                            @else
                                <a href="{{ URL::route('home')}}">Home</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    </div>
                @endif
            </div>
            
        <!-- set background image -->
        <body background="images/background_1.png">
            <div class="img-header">
                <img src="images/white_logo.png" class="img_hom" style="width: 70%;" alt="Italian Trulli">
            </div>
            <!-- text under image -->
            <p style="text-align:center; color:white;">Customer Relations Management System</p>
        </div>
    </body>
</html>
