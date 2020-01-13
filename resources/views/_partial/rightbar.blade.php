 <div class="fixed-plugin">
     <form action="{{ route('admin.setting') }}" class="ajax_form">
            <div class="dropdown show-dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="fa fa-cog fa-2x"> </i>
                </a>
                <ul class="dropdown-menu">
                    <li class="header-title"> Sidebar Style</li>
                    <li class="adjustments-line">
                        <a href="javascript:void(0)" class="switch-trigger">
                            <p>Sidebar Mini</p>
                            <label class="switch-mini">
                                <input type="checkbox" data-toggle="switch" data-on-color="info" data-off-color="info" name="sd_mini" value="{{ setting('sd_mini')?0:1 }}" {{ setting('sd_mini') == 1 ? 'checked' : '' }}>
                                <span class="toggle"></span>
                            </label>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li class="adjustments-line">
                        <a href="javascript:void(0)" class="switch-trigger">
                            <p>Fixed Navbar</p>
                            <label class="switch-nav">
                                <input type="checkbox" data-toggle="switch" data-on-color="info" data-off-color="info" name="fxd_nav" value="{{ setting('fxd_nav')?0:1}}" {{ setting('fxd_nav') == 1 ? 'checked' : '' }}>
                                <span class="toggle"></span>
                            </label>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li class="adjustments-line">
                        <a href="javascript:void(0)" class="switch-trigger background-color">
                            <p>Filters</p>
                            <div class="pull-right">
                                <span class="badge filter badge-black {{ setting('siderbar_color')=='black'?'active':'' }}" data-color="black"></span>
                                <span class="badge filter badge-azure {{ setting('siderbar_color')=='azure'?'active':'' }}" data-color="azure"></span>
                                <span class="badge filter badge-green {{ setting('siderbar_color')=='green'?'active':'' }}" data-color="green"></span>
                                <span class="badge filter badge-orange {{ setting('siderbar_color')=='orange'?'active':'' }}" data-color="orange"></span>
                                <span class="badge filter badge-red {{ setting('siderbar_color')=='red'?'active':'' }}" data-color="red"></span>
                                <span class="badge filter badge-purple {{ setting('siderbar_color')=='purple'?'active':'' }}" data-color="purple"></span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <input type="hidden" name="siderbar_color" id="siderbar_color" value="{{ setting('siderbar_color') }}">
                      <li class="button-container">
                        <div>
                            <button class="btn btn-info btn-block">{{ _lang('Set') }}
                            </button>
                        </div>
                     </li>

                    <li class="header-title" id="sharrreTitle">Thank you for sharing!
                    </li>
                </ul>
            </div>
        </form>
        </div>