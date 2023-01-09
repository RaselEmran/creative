<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset(setting('favicon')?'storage/logo/'.setting('favicon'):'favicon.png')}}">
    <title>{{ isset($title) ? $title .' | '. setting('site_title') :  setting('site_title')}}</title>


    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/dashboard.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend/font-awesome/latest/css/font-awesome.min.css') }}" />
        <style>
          .pageloader {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url('{{asset('pageloader.gif')}}') 50% 50% no-repeat rgb(249,249,249);
                background-size: 8%;;
                opacity: .7;
            }
            .border.rounded-circle.d-inline-block {
                    width: 150px;
                    height: 150px;
                }

                .no-gutters>.col, .no-gutters>[class*=col-] {
                    padding-bottom: 0;
                }

                .form-group.row {
                    border: solid 1px #fff;
                    border-radius: 4px;
                }

                .form-control {
                    border: 2px solid #fff;
                    border-radius: 0px;
                }

                .bg-color {
                    background: rgb(14, 58, 158);
                    background: linear-gradient(0deg, rgba(14, 58, 158, 1) 0%, rgba(237, 111, 99, 1) 100%);
                }

                body{
                    /* background-image: url(notebook-1280538_1920.jpg); */
                    background-size: cover;
                    background-position: center;
                }
                @media only screen and (max-width: 575px) {
                    .d-inline-block.float-right {
                        float: left !important;
                    }
                }
        </style>
</head>
<body class="vh-100"  style="background-image: url('{{ asset('backend/assets/img/image-asset.jpg') }}')">
    <div class="pageloader"></div>
    <div class="wrapper wrapper-full-page">

        @yield('content')
    </div>
         <audio id="success-audio">
            <source src="{{ asset('/audio/success.ogg') }}" type="audio/ogg">
            <source src="{{ asset('/audio/success.mp3') }}" type="audio/mpeg">
        </audio>
        <audio id="error-audio">
            <source src="{{ asset('/audio/error.ogg') }}" type="audio/ogg">
            <source src="{{ asset('/audio/error.mp3') }}" type="audio/mpeg">
        </audio>
        <audio id="warning-audio">
            <source src="{{ asset('/audio/warning.ogg') }}" type="audio/ogg">
            <source src="{{ asset('/audio/warning.mp3') }}" type="audio/mpeg">
        </audio>
        <audio id="append-audio">
            <source src="{{ asset('/audio/append.ogg') }}" type="audio/ogg">
            <source src="{{ asset('/audio/append.mp3') }}" type="audio/mpeg">
        </audio>
    <script src="{{ asset('backend/assets/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('backend/assets/js/plugins/bootstrap-switch.js')}}"></script>
    <script src="{{ asset('backend/assets/js/plugins/bootstrap-notify.js')}}"></script>
    <script src="{{ asset('backend/assets/js/demo.js') }}"></script>
    <script type="text/javascript">
    $(window).on('load',function() {
        $(".pageloader").fadeOut("slow");
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
