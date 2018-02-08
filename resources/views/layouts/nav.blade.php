<!-- Left side column. contains the logo and sidebar -->



<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar-->
    <section class="sidebar">
        <div id="menu" role="navigation">
            <ul class="navigation">

                <li  id="active" class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ url('dashboard') }}">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span class="mm-text ">Dashboard </span>
                    </a>
                </li>
                
                   <li class="menu-dropdown {{ Request::is('configuration*') ? 'active' : '' }}">
                    <a href="javascript:void(0)">
                        <i class="menu-icon ti-check-box"></i>
                            <span>Configuration</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li   class="{{ Request::is('configuration/apartmenttypes') ? 'active' : '' }}">
                            <a href="{{ url('configuration/apartmenttypes') }}">
                                <i class="menu-icon ti-layout-list-large-image"></i>
                                <span class="mm-text ">Apartment Types</span>
                            </a>
                        </li>
                        <li   class="{{ Request::is('configuration/rentperiods') ? 'active' : '' }}">
                            <a href="{{ url('configuration/rentperiods') }}">
                                <i class="menu-icon ti-layout-list-large-image"></i>
                                <span class="mm-text ">Rent Periods</span>
                            </a>
                        </li>
                         <li   class="{{ Request::is('configuration/identification') ? 'active' : '' }}">
                            <a href="{{ url('configuration/identification') }}">
                                <i class="menu-icon ti-layout-list-large-image"></i>
                                <span class="mm-text ">Identification Types </span>
                            </a>
                        </li>
                        
                    </ul>
                </li>


                <li  id="active" class="{{ Request::is('estates') ? 'active' : '' }}">
                    <a href="{{ url('estates') }}">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span class="mm-text ">Estates/Courts </span>
                    </a>
                </li>

                <li   class="{{ Request::is('apartments') ? 'active' : '' }}">
                    <a href="{{ url('apartments') }}">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span class="mm-text ">Apartments </span>
                    </a>
                </li>


                <li   class="{{ Request::is('facilities') ? 'active' : '' }}">
                    <a href="{{ url('facilities') }}">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span class="mm-text ">Facilities </span>
                    </a>
                </li>
                <li   class="{{ Request::is('services') ? 'active' : '' }}">
                    <a href="{{ url('services') }}">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span class="mm-text ">Services </span>
                    </a>
                </li>


                <li class="menu-dropdown {{ Request::is('tenants*') ? 'active' : '' }}">
                    <a href="javascript:void(0)">
                        <i class="menu-icon ti-check-box"></i>
                        <span>Tenants</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li   class="{{ Request::is('tenants/new') ? 'active' : '' }}">
                            <a href="{{ url('tenants/new') }}">
                                <i class="menu-icon ti-layout-list-large-image"></i>
                                <span class="mm-text "> New Tenant</span>
                            </a>
                        </li>
                         <li   class="{{ Request::is('tenants/showall') ? 'active' : '' }}">
                            <a href="{{ url('tenants/showall') }}">
                                <i class="menu-icon ti-layout-list-large-image"></i>
                                <span class="mm-text "> All Tenants</span>
                            </a>
                        </li>
                         <li   class="{{ Request::is('tenants/services') ? 'active' : '' }}">
                            <a href="{{ url('tenants/services') }}">
                                <i class="menu-icon ti-layout-list-large-image"></i>
                                <span class="mm-text "> Requested Services </span>
                            </a>
                        </li>
                         <li   class="{{ Request::is('tenants/bill') ? 'active' : '' }}">
                            <a href="{{ url('tenants/bill') }}">
                                <i class="menu-icon ti-layout-list-large-image"></i>
                                <span class="mm-text ">Tenants  Bill </span>
                            </a>
                        </li>
                    </ul>
                </li>

                
                  <li class="menu-dropdown {{ Request::is('banking*') ? 'active' : '' }}">
                    <a href="javascript:void(0)">
                        <i class="menu-icon ti-check-box"></i>
                        <span>Banking</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li   class="{{ Request::is('banking/banks') ? 'active' : '' }}">
                            <a href="{{ url('banking/banks') }}">
                                <i class="menu-icon ti-layout-list-large-image"></i>
                                <span class="mm-text "> Banks</span>
                            </a>
                        </li>
                         <li   class="{{ Request::is('banking/rentpayments') ? 'active' : '' }}">
                            <a href="{{ url('banking/rentpayments') }}">
                                <i class="menu-icon ti-layout-list-large-image"></i>
                                <span class="mm-text ">Tenants Rent Payments</span>
                            </a>
                        </li>
                         <li   class="{{ Request::is('banking/clearpayments') ? 'active' : '' }}">
                            <a href="{{ url('banking/clearpayments') }}">
                                <i class="menu-icon ti-layout-list-large-image"></i>
                                <span class="mm-text "> Clear Cash Payments </span>
                            </a>
                        </li>
                         <li   class="{{ Request::is('banking/clearedpayments') ? 'active' : '' }}">
                            <a href="{{ url('banking/clearedpayments') }}">
                                <i class="menu-icon ti-layout-list-large-image"></i>
                                <span class="mm-text ">View Cleared Payments </span>
                            </a>
                        </li>
                    </ul>
                </li>

                
                

            </ul>
            <!-- / .navigation --> </div>
        <!-- menu --> </section>
    <!-- /.sidebar --> </aside>
