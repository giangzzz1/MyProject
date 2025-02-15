<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('login/images/icons/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/css/main.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEJ6HhX6g3Xr5vvVd9QTO69X6mnY0AGFhVXYl4NmdfHObFq4e19xgFGRu4wsM" crossorigin="anonymous">

    <!-- Bootstrap JS (optional, for components like dropdowns, modals, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-0EV3lX5r7LAXbzoY6vY3a6gkzXX8drl92k7C9ekVeD5I0YzQT0nI+MOG3swCl56z" crossorigin="anonymous">
    </script>

</head>

<body>

    <div class="justify-center text-center">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('login/images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                @yield('content')

                <div class="text-center mt-5">
                    <a href="/" class="badge badge-success">Back to home</a>
                </div>

            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>
    <script src="{{ asset('login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('login/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('login/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('login/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('login/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('login/vendor/countdowntime/countdowntime.js') }}"></script>
    <script src="{{ asset('login/js/main.js') }}"></script>
</body>

</html>
