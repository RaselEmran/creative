 <nav class="navbar navbar-expand-lg {{ setting('fxd_nav')==1?'navbar-fixed':'' }}">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <div class="navbar-minimize">
                                <button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon d-none d-lg-block">
                                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                                </button>
                            </div>
                            <a class="navbar-brand" href="#pablo"> {{ setting('company_name') }} </a>
                        </div>
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end">
     
                            <ul class="navbar-nav">


                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="https://example.com/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="nc-icon nc-bullet-list-67"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                   
                                        <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                            <i class="nc-icon nc-umbrella-13"></i> {{ _lang('My Profile') }}
                                        </a>
                                       <a class="dropdown-item" href="{{ route('admin.user_log') }}">
                                            <i class="nc-icon nc-settings-90"></i> {{ _lang('Logs') }}
                                        </a>
                                        <div class="divider"></div>
                                        <a class="dropdown-item" href="{{ route('admin.password') }}">
                                            <i class="nc-icon nc-lock-circle-open"></i>{{ _lang('Password') }}
                                        </a>
                                        <a href="" id="logout" data-url='{{ route('logout') }}' class="dropdown-item text-danger">
                                            <i class="nc-icon nc-button-power"></i> {{ _lang('Log out') }}
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>