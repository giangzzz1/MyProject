<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mixtape</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mixtape template project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="client/styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href="client/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="client/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="client/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="client/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="client/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="client/styles/responsive.css">

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

    <div class="super_container">

        <!-- Header -->
        @include('client.layout.header')

        <!-- slide -->
        @include('client.layout.slide')

          <!-- content -->
          @include('client.layout.content')

        <!-- new -->
        @include('client.layout.new')

        <!-- Footer -->
        @include('client.layout.footer')

    </div>

    <script src="client/js/jquery-3.2.1.min.js"></script>
    <script src="client/styles/bootstrap-4.1.2/popper.js"></script>
    <script src="client/styles/bootstrap-4.1.2/bootstrap.min.js"></script>
    <script src="client/plugins/greensock/TweenMax.min.js"></script>
    <script src="client/plugins/greensock/TimelineMax.min.js"></script>
    <script src="client/plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="client/plugins/greensock/animation.gsap.min.js"></script>
    <script src="client/plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="client/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="client/plugins/easing/easing.js"></script>
    <script src="client/plugins/progressbar/progressbar.min.js"></script>
    <script src="client/plugins/parallax-js-master/parallax.min.js"></script>
    <script src="client/plugins/jPlayer/jquery.jplayer.min.js"></script>
    <script src="client/plugins/jPlayer/jplayer.playlist.min.js"></script>
    <script src="client/js/custom.js"></script>
</body>

</html>
