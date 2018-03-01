<div class="nav_profile">
    <div class="media profile-left">
        <a class="pull-left profile-thumb" href="javascript:void(0)">
            <img src="{{asset('img/authors/avatar1.jpg')}}" class="rounded-circle" alt="User Image">
        </a>
        <div class="content-profile">
            <h4 class="media-heading">
                Welcome, {{ Session::get('name')}}
            </h4>
            <ul class="icon-list">
                <li>
                    <a href="{{url('users')}}" title="user">
                        <i class="fa fa-fw ti-user"></i>
                    </a>
                </li>
                <li>
                    <a href="{{url('logout')}}" title="lock">
                        <i class="fa fa-fw ti-lock"></i>
                    </a>
                </li>
                <li>
                    <a href="{{url('changepassword')}}" title="settings">
                        <i class="fa fa-fw ti-settings"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<ul class="navigation slimmenu" id="navigation">
    <li  id="active" class="{{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="{{ url('dashboard') }}">
            <i class="menu-icon ti-desktop"></i>
            <span class="mm-text ">Dashboard </span>
        </a>
    </li>

    <li class="menu-dropdown {{ Request::is('configuration*') ? 'active' : '' }}">
        <a href="javascript:void(0)">
            <i class="menu-icon ti-widget"></i>
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
            <i class="menu-icon ti-bar-chart"></i>
            <span class="mm-text ">Estates/Courts </span>
        </a>
    </li>

    <li   class="{{ Request::is('apartments') ? 'active' : '' }}">
        <a href="{{ url('apartments') }}">
            <i class="menu-icon ti-layout-grid3"></i>
            <span class="mm-text ">Apartments </span>
        </a>
    </li>


    <li   class="{{ Request::is('facilities') ? 'active' : '' }}">
        <a href="{{ url('facilities') }}">
            <i class="menu-icon ti-truck"></i>
            <span class="mm-text ">Facilities </span>
        </a>
    </li>
    <li   class="{{ Request::is('services') ? 'active' : '' }}">
        <a href="{{ url('services') }}">
            <i class="menu-icon ti-shopping-cart-full"></i>
            <span class="mm-text ">Services </span>
        </a>
    </li>


    <li class="menu-dropdown {{ Request::is('tenants*') ? 'active' : '' }}">
        <a href="javascript:void(0)">
            <i class="menu-icon ti-user"></i>
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
            <i class="menu-icon ti-briefcase"></i>
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
                    <span class="mm-text ">Tenants  Payments</span>
                </a>
            </li>
            <li   class="{{ Request::is('banking/clearpayments') ? 'active' : '' }}">
                <a href="{{ url('banking/clearpayments') }}">
                    <i class="menu-icon ti-layout-list-large-image"></i>
                    <span class="mm-text "> Clear Cash/Cheque Payments </span>
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


    <li   class="{{ Request::is('account/users') ? 'active' : '' }}">
        <a href="{{ url('account/users') }}">
            <i class="menu-icon ti-face-smile"></i>
            <span class="mm-text ">Users </span>
        </a>
    </li>


    <li class="menu-dropdown {{ Request::is('reports*') ? 'active' : '' }}">
        <a href="javascript:void(0)">
            <i class="menu-icon ti-package"></i>
            <span>Reports</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li   class="{{ Request::is('reports/bills') ? 'active' : '' }}">
                <a href="{{ url('reports/bills') }}">
                    <i class="menu-icon ti-layout-list-large-image"></i>
                    <span class="mm-text "> Bills</span>
                </a>
            </li>
            <li   class="{{ Request::is('reports/payments') ? 'active' : '' }}">
                <a href="{{ url('reports/payments') }}">
                    <i class="menu-icon ti-layout-list-large-image"></i>
                    <span class="mm-text ">  Payments</span>
                </a>
            </li>
            <li   class="{{ Request::is('reports/rents') ? 'active' : '' }}">
                <a href="{{ url('reports/rents') }}">
                    <i class="menu-icon ti-layout-list-large-image"></i>
                    <span class="mm-text "> Rents </span>
                </a>
            </li>
            <li   class="{{ Request::is('reports/expiringrent') ? 'active' : '' }}">
                <a href="{{ url('reports/expiringrent') }}">
                    <i class="menu-icon ti-layout-list-large-image"></i>
                    <span class="mm-text ">Rent Expiring </span>
                </a>
            </li>

            <li   class="{{ Request::is('reports/tenantsowing') ? 'active' : '' }}">
                <a href="{{ url('reports/tenantsowing') }}">
                    <i class="menu-icon ti-layout-list-large-image"></i>
                    <span class="mm-text ">Owing Tenants  </span>
                </a>
            </li>
            
            
            <!--            <li   class="{{ Request::is('reports/availableapartments') ? 'active' : '' }}">
                            <a href="{{ url('reports/availableapartments') }}">
                                <i class="menu-icon ti-layout-list-large-image"></i>
                                <span class="mm-text ">Available Apartments</span>
                            </a>
                        </li>
                        <li   class="{{ Request::is('reports/clearedpayments') ? 'active' : '' }}">
                            <a href="{{ url('reports/clearedpayments') }}">
                                <i class="menu-icon ti-layout-list-large-image"></i>
                                <span class="mm-text ">Cleared Payments</span>
                            </a>
                        </li>-->
        </ul>
    </li>
    <li   class="{{ Request::is('account/users') ? 'active' : '' }}">
        <a href="{{ url('account/users') }}">
            <i class="menu-icon ti-pencil-alt"></i>
            <span class="mm-text ">Audit Logs </span>
        </a>
    </li>

</ul>
