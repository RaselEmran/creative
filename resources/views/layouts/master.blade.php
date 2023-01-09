<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset(setting('favicon')?'storage/logo/'.setting('favicon'):'favicon.ico')}}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>{{ isset($title) ? $title .' | '. setting('site_title') :  setting('site_title')}}</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="//fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('backend/font-awesome/latest/css/font-awesome.min.css') }}" />
        <!-- CSS Files -->
        <link href="{{asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{asset('backend/assets/css/dropify.min.css') }}" rel="stylesheet" />
        <link href="{{asset('backend/assets/css/parsley.css') }}" rel="stylesheet" />
        <link href="{{asset('backend/assets/css/select2.css') }}" rel="stylesheet" />
        <link href="{{asset('backend/assets/css/dashboard.css') }}" rel="stylesheet" />
        <link href="{{asset('backend/assets/css/demo.css') }}" rel="stylesheet" />
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
        </style>
        @stack('css')
    </head>
    <body class="{{ setting('sd_mini')==1 || Request::is('admin/sells/parts/create')?'sidebar-mini':'' }}">
        @if (setting('loader')=='Show')
        <div class="pageloader"></div>
        @endif
        <div class="wrapper">
            <div class="sidebar" data-color="{{ setting('siderbar_color')?setting('siderbar_color'):'orange' }}">
                @include('_partial.sidebar')
            </div>
            <div class="main-panel">
                <!-- Navbar -->
                @include('_partial.navbar')
                <!-- End Navbar -->
                @if (setting('loader')=='Hide')
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <span type="button" class="btn btn-danger btn-sm close" data-dismiss="alert" aria-label="Close"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
                    <strong>{{ _lang('Active Account Permission PageLoader and Many More') }}</strong> <a href="{{ route('admin.setting') }}"> <i class="fa fa-arrow-right" aria-hidden="true"></i>{{ _lang('Click Here') }}</a>
                </div>
                   @else
                <div class="alert alert-info alert-dismissible" role="alert">
                    <span type="button" class="btn btn-danger btn-sm close" data-dismiss="alert" aria-label="Close"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
                    <strong>{{ _lang('Inactive Account Permission PageLoader and Many More') }}</strong> <a href="{{ route('admin.setting') }}"> <i class="fa fa-arrow-right" aria-hidden="true"></i>{{ _lang('Click Here') }}</a>
                </div>
                @endif
                <div class="content">
                    
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="ti-home"></i> {{ _lang('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">
                                @section('breadcrumb')
                                
                                @show
                            </li>
                            
                            
                        </ol>
                    </nav>
                    <div class="container-fluid">
                        @section('content')
                        @show
                        
                    </div>
                    @if(isset($modal))
                    <!-- Remote source -->
                    <div id="modal_remote" class="modal fade border-top-success rounded-top-0"  role="dialog" data-backdrop="static">
                        <div class="modal-dialog modal-{{ $modal }}">
                            <div class="modal-content">
                                <div class="modal-header border-grey-300 bg-info">
                                    <h5 class="modal-title"></h5>
                                    <button type="button" class="modal-btn btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> {{ _lang('Exit') }}</button>
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
                                    <a href="{{ setting('wb_site') }}">
                                        {{ _lang('Home') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ setting('company_link') }}">
                                        {{ _lang('Company') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ setting('profolio_lik') }}">
                                        {{ _lang('Portfolio') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ setting('blog_link') }}">
                                        {{ _lang('Blog') }}
                                    </a>
                                </li>
                            </ul>
                            <p class="copyright text-center">
                                ©
                                <script>
                                document.write(new Date().getFullYear())
                                </script>
                                <a href="{{ setting('wb_site') }}">Team {{  setting('company_name') }}</a>
                            </p>
                        </nav>
                    </div>
                </footer>
            </div>
        </div>
        @include('_partial.rightbar')
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
    
    </body>
    <!--   Core JS Files   -->
    <script src="{{asset('backend/assets/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
    <script src="{{asset('backend/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
    
    <!--  Notifications Plugin    -->
    <script src="{{asset('backend/assets/js/plugins/bootstrap-notify.js')}}"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{ asset('backend/assets/js/plugins/moment.min.js') }}"></script>
    <!--  DatetimePicker   -->
    <script src="{{ asset('backend/assets/js/plugins/bootstrap-datetimepicker.js') }}"></script>
    <!--  Sweet Alert  -->
    <script src="{{ asset('backend/assets/js/plugins/sweetalert2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/assets/js/plugins/select2.min.js') }}" type="text/javascript"></script>
    <!--  Tags Input  -->
    <script src="{{ asset('backend/assets/js/plugins/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
    <!--  jQueryValidate  -->
    <script src="{{ asset('backend/assets/js/plugins/parsley.min.js') }}" type="text/javascript"></script>
    <!--  Bootstrap Table Plugin -->
    <script src="{{ asset('backend/assets/js/plugins/bootstrap-table.js') }}"></script>
    <!--  DataTable Plugin -->
    <script src="{{ asset('backend/assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/dropify.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/ckeditor/ckeditor.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('backend/assets/js/dashboard.js') }}" type="text/javascript"></script>
    <script src="{{  asset('backend/assets/js/demo.js')}}"></script>
    <script type="text/javascript">
     $(window).on('load',function() {
        $(".pageloader").fadeOut("slow");
        setTimeout(function() {
        $(".alert").alert('close');
        }, 10000);
        });

     $(document).ready(function() {
        clockUpdate();
        setInterval(clockUpdate, 1000);
     })
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });
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
        
    </script>
    <script src="{{asset('js/function.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    @stack('js')
    </html>