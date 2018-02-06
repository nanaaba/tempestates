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
                         <li   class="{{ Request::is('tenants/all') ? 'active' : '' }}">
                            <a href="{{ url('tenants/all') }}">
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

                <li   class="{{ Request::is('banks') ? 'active' : '' }}">
                    <a href="{{ url('banks') }}">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span class="mm-text ">Banks </span>
                    </a>
                </li>

            </ul>
            <!-- / .navigation --> </div>
        <!-- menu --> </section>
    <!-- /.sidebar --> </aside>