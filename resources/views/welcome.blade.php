<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet"
        href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
               
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 60px;
            }

           

           

        

            .m-b-md {
                margin-bottom: 0px;
            }

            h3{
                margin: 0px 20px;
                max-width: 700px;
                margin-bottom: 20px;

            }

           
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
         

            <div class="content">
                <div class="title m-b-md">
                        <i class='bx bxs-book-open'></i> E-Library
                </div>
                <h3>A portal where you can see all the available books in the library and
                     which will keep you reminded to read books.</h3>
                @if (Route::has('login'))
                <div class="links">
                    @auth
                       <a href="{{ route('login') }}" class="btn btn-primary">Home</a>
                    @else
                       <a href="{{ route('login') }}" class="btn btn-primary mr-2">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

             
            </div>
        </div>
    </body>
</html>
