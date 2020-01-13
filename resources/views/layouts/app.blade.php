<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/light-bootstrap-dashboard790f.css?v=2.0.1') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/demo.css')}}" rel="stylesheet" />
</head>
<body>
    <div class="wrapper wrapper-full-page">
        <div style="position: absolute;top: 70%;left: 44%;z-index:100; display: none;" id="loader">
          <img src="{{asset('15.gif')}}" alt="loader">
        </div>
        @yield('content')
    </div>
    <script src="{{ asset('backend/assets/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('backend/assets/js/plugins/bootstrap-switch.js')}}"></script>
    <script src="{{ asset('backend/assets/js/plugins/bootstrap-notify.js')}}"></script>
    <script src="{{ asset('backend/assets/js/demo.js') }}"></script>
    <script>
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>
    <script>
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    </script>
    @stack('js')
</body>
</html>
