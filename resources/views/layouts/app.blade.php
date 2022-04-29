<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <title>Title</title>
    @yield('head')
</head>

<body>

    <!-- 
        ******************************
        *     P R E L O A D E R      *
        ******************************
    -->
    <div id="preloader" class="bg-light">
        <div class="progress">
            <div class="progress-bar bg-primary" style="width: 0%;"></div>
        </div>
    </div>


    <!-- 
        **************************
        *     W R A P P E R      *
        **************************
    -->
    <section id="wrapper">
        @include('partials.nav.side')
        <section class="mainbody">
           @include('partials.nav.top')

            @yield('content')
        </section>
    </section>




    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/fontawesome.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>