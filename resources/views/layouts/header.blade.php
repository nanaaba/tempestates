<header class="header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="dashboard.php" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
<!--            <img src="" alt="logo"/>-->
            ROTAMAC
        </a>
        <!-- Header Navbar: style can be found in header-->
        <!-- Sidebar toggle button-->
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                    class="fa fa-fw ti-menu"></i>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">


                <!-- User Account: style can be found in dropdown-->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle padding-user" data-toggle="dropdown">

                        <div class="riot">
                            <div>
                                Welcome, {{ Session::get('name')}}

                                <span>
                                    <i class="caret"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">

                        <!-- Menu Body -->
                        <li class="p-t-3">
                            <a href="">
                                <i class="fa fa-fw ti-lock"></i> Change Password
                            </a>
                        </li>
                        <li role="presentation"></li>
                        
                        <li role="presentation" class="divider"></li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            
                            <div class="pull-right">
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
</header>