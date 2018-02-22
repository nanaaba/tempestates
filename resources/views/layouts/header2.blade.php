<nav class="navbar navbar-static-top" role="navigation">
    <a href="index" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the marginin -->
<!--        <img src="img/logo_white.png" alt="logo"/>-->
    </a>
    <!-- Header Navbar: style can be found in header-->
    <!-- Sidebar toggle button-->
    <div class="mr-auto">
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                    class="fa fa-fw ti-menu"></i>
        </a>
    </div>
    <div class="navbar-right">
        <ul class="nav navbar-nav">
           
           
            <!-- User Account: style can be found in dropdown-->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle padding-user d-block" data-toggle="dropdown">
                    <img src="{{asset('img/authors/avatar1.jpg')}}" width="35" class="rounded-circle img-fluid float-left"
                         height="35" alt="User Image">
                    <div class="riot">
                        <div>
                             Welcome, {{ Session::get('name')}}
                            <span><i class="fa fa-sort-down"></i></span>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{asset('img/authors/avatar1.jpg')}}" class="rounded-circle" alt="User Image">
                        <p>  Welcome, {{ Session::get('name')}}</p>
                    </li>
                    <!-- Menu Body -->
                    <li class="p-t-3"><a href="user_profile" class="dropdown-item"> <i class="fa fa-fw ti-user"></i> My Profile </a>
                    </li>
                    <li role="presentation"></li>
                    <li><a href="edit_user" class="dropdown-item"><i class="fa fa-fw ti-settings"></i> Account Settings </a></li>
                    <li role="presentation" class="dropdown-divider"></li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                       
                        <div class="float-right">
                            <a href="{{url('logout')}}">
                                <i class="fa fa-fw ti-shift-right"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
