<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="../assets/img/favicon.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>{{ isset($title) ? $title .'|'  :  "Satt"}}</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!-- Canonical SEO -->
        <link rel="canonical" href="https://www.creative-tim.com/product/light-bootstrap-dashboard-pro" />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css') }}" />
        <!-- CSS Files -->
        <link href="{{asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{asset('backend/assets/css/dropify.min.css') }}" rel="stylesheet" />
        <link href="{{asset('backend/assets/css/parsley.css') }}" rel="stylesheet" />
        <link href="{{asset('backend/assets/css/select2.css') }}" rel="stylesheet" />
        <link href="{{asset('backend/assets/css/light-bootstrap-dashboard790f.css?v=2.0.1') }}" rel="stylesheet" />
        <link href="{{asset('backend/assets/css/demo.css') }}" rel="stylesheet" />
    </head>
    <body class="{{ setting('sd_mini')==1?'sidebar-mini':'' }}">
        <div class="wrapper">
            <div class="sidebar" data-color="{{ setting('siderbar_color')?setting('siderbar_color'):'orange' }}" data-image="{{ asset('backend/assets/img/sidebar-5.jpg') }}">
                @include('_partial.sidebar')
            </div>
            <div class="main-panel">
                <!-- Navbar -->
                @include('_partial.navbar')
                <!-- End Navbar -->
                <div class="content">
                    
                    <nav aria-label="breadcrumb">
                        @php
                        $name = \Route::currentRouteName();
                        $arr =explode('.',$name);
                        $count =count($arr);
                        $count =$count-1;
                        $prev =$count-1;
                        @endphp
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="ti-home"></i> {{ __('Dashboard') }}</a></li>
                            
                            <li class="breadcrumb-item">
                                <a href="">{{$prev>=0? ucfirst(str_replace("_"," ",$arr[$prev])):'' }}-{{ ucfirst(str_replace("_"," ",$arr[$count])) }}</a>
                            </li>
                            
                        </ol>
                    </nav>
                    <div class="container-fluid">
                        @section('content')
                        @show
                        
                    </div>
                    @if(isset($modal))
                    <!-- Remote source -->
                    <div id="modal_remote" class="modal fade border-top-success rounded-top-0" tabindex="-1"  data-backdrop="static">
                        <div class="modal-dialog modal-{{ $modal }}">
                            <div class="modal-content">
                                <div class="modal-header bg-light border-grey-300">
                                    <h5 class="modal-title">{{$title}}</h5>
                                   <button type="button" class="modal-btn btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="glyphicon glyphicon-remove-circle"></i> {{ _lang('Exit') }}</button>
                                </div>
                                <div id="modal-loader" style="display: none; text-align: center;"> <img src="{{ asset('loading.gif') }}"> </div>
                                <div class="modal-body">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /remote source -->
                    @endif
                </div>
                <footer class="footer">
                    <div class="container">
                        <nav>
                            <ul class="footer-menu">
                                <li>
                                    <a href="https://sattit.com/">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="https://sattit.com/">
                                        Company
                                    </a>
                                </li>
                                <li>
                                    <a href="https://sattit.com/">
                                        Portfolio
                                    </a>
                                </li>
                                <li>
                                    <a href="https://sattit.com/">
                                        Blog
                                    </a>
                                </li>
                            </ul>
                            <p class="copyright text-center">
                                ©
                                <script>
                                document.write(new Date().getFullYear())
                                </script>
                                <a href="hhttps://sattit.com/">Team Satt It</a>, The Mission Of Change
                            </p>
                        </nav>
                    </div>
                </footer>
            </div>
        </div>
        @include('_partial.rightbar')
    </body>
    <!--   Core JS Files   -->
    <script src="{{asset('backend/assets/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: https://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{asset('backend/assets/js/plugins/bootstrap-switch.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('backend/assets/js/plugins/bootstrap-notify.js')}}"></script>
    <!--  Share Plugin -->
    <script src="{{asset('backend/assets/js/plugins/jquery.sharrre.js')}}"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{ asset('backend/assets/js/plugins/moment.min.js') }}"></script>
    <!--  DatetimePicker   -->
    <script src="{{ asset('backend/assets/js/plugins/bootstrap-datetimepicker.js') }}"></script>
    <!--  Sweet Alert  -->
    <script src="{{ asset('backend/assets/js/plugins/sweetalert2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/assets/js/plugins/select2.min.js') }}" type="text/javascript"></script>
    <!--  Tags Input  -->
    <script src="{{ asset('backend/assets/js/plugins/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
    <!--  Sliders  -->
    <script src="{{ asset('backend/assets/js/plugins/nouislider.js') }}" type="text/javascript"></script>
    <!--  Bootstrap Select  -->
    <script src="{{ asset('backend/assets/js/plugins/bootstrap-selectpicker.js') }}" type="text/javascript"></script>
    <!--  jQueryValidate  -->
    <script src="{{ asset('backend/assets/js/plugins/parsley.min.js') }}" type="text/javascript"></script>
    <!--  Bootstrap Table Plugin -->
    <script src="{{ asset('backend/assets/js/plugins/bootstrap-table.js') }}"></script>
    <!--  DataTable Plugin -->
    <script src="{{ asset('backend/assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/dropify.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/ckeditor/ckeditor.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('backend/assets/js/light-bootstrap-dashboard790f.js?v=2.0.1') }}" type="text/javascript"></script>
    <!-- Light Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{  asset('backend/assets/js/demo.js')}}"></script>
    <script>
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    </script>
    <script>
    $('#datatables').DataTable({
    "pagingType": "full_numbers",
    "lengthMenu": [
    [10, 25, 50, -1],
    [10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
    search: "{{ _lang('_INPUT_') }}",
    searchPlaceholder: "{{ _lang('Search records') }}",
    infoEmpty:      "{{ _lang('Showing 0 To 0 Of 0 Entries') }}",
    zeroRecords:    "{{ _lang('No matching records found') }}",
    },
    
    });
    //Show Success Message
    @if(Session::has('success'))
    $.notify({
    icon: "nc-icon nc-app",
    message: {{session('success')}}
    }, {
    type: type[2],
    timer: 8000,
    placement: {
    from: 'top',
    align: 'right'
    }
    })
    @endif
    
    //Show Single Error Message
    @if(Session::has('error'))
    $.notify({
    icon: "nc-icon nc-app",
    message: {{session('error')}}
    }, {
    type: type[4],
    timer: 8000,
    placement: {
    from: 'top',
    align: 'right'
    }
    })
    @endif
    //show single Warning messege
    @if(Session::has('warning'))
    $.notify({
    icon: "nc-icon nc-app",
    message: {{session('warning')}}
    }, {
    type: type[2],
    timer: 8000,
    placement: {
    from: 'top',
    align: 'right'
    }
    })
    @endif
    @foreach ($errors->all() as $key=> $error)
    $.notify({
    icon: "nc-icon nc-app",
    message: {{$error}}
    }, {
    type: type[4],
    timer: 8000,
    placement: {
    from: 'top',
    align: 'right'
    }
    })
    
    
    @endforeach
    </script>
    <script src="{{asset('js/main.js')}}"></script>
    @stack('js')
</html>