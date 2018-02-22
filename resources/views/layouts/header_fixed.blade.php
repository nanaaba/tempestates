<nav class="navbar navbar-static-top navbar-fixed-top" role="navigation">
    <a href="index" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the marginin -->
        <img src="img/logo_white.png" alt="logo"/>
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
            <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-fw ti-email black"></i>
                    <span class="badge badge-pill badge-success">2</span>
                </a>
                <ul class="dropdown-menu dropdown-messages table-striped">
                    <li class="dropdown-title">New Messages</li>
                    <li>
                        <a href="" class="message striped-col dropdown-item">
                            <img class="message-image rounded-circle" src="{{asset('img/authors/avatar7.jpg')}}" alt="avatar-image">

                            <div class="message-body"><strong>Ernest Kerry</strong>
                                <br>
                                Can we Meet?
                                <br>
                                <small>Just Now</small>
                                <span class="badge badge-success label-mini msg-lable text-white">New</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" class="message dropdown-item">
                            <img class="message-image rounded-circle" src="img/authors/avatar6.jpg" alt="avatar-image">

                            <div class="message-body"><strong>John</strong>
                                <br>
                                Dont forgot to call...
                                <br>
                                <small>5 minutes ago</small>
                                <span class="badge badge-success label-mini msg-lable text-white">New</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" class="message striped-col dropdown-item">
                            <img class="message-image rounded-circle" src="img/authors/avatar5.jpg" alt="avatar-image">

                            <div class="message-body">
                                <strong>Wilton Zeph</strong>
                                <br>
                                If there is anything else &hellip;
                                <br>
                                <small>14/10/2014 1:31 pm</small>
                            </div>

                        </a>
                    </li>
                    <li>
                        <a href="" class="message dropdown-item">
                            <img class="message-image rounded-circle" src="img/authors/avatar1.jpg" alt="avatar-image">
                            <div class="message-body">
                                <strong>Jenny Kerry</strong>
                                <br>
                                Let me know when you free
                                <br>
                                <small>5 days ago</small>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" class="message striped-col dropdown-item">
                            <img class="message-image rounded-circle" src="img/authors/avatar.jpg" alt="avatar-image">
                            <div class="message-body">
                                <strong>Tony</strong>
                                <br>
                                Let me know when you free
                                <br>
                                <small>5 days ago</small>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-footer"><a href="#"> View All messages</a></li>
                </ul>



            </li>
            <!--rightside toggle-->
            <li>
                <a href="#" class="dropdown-toggle toggle-right" data-toggle="dropdown">
                    <i class="fa fa-fw ti-view-list black"></i>
                    <span class="badge badge-pill badge-danger">9</span>
                </a>
            </li>
            <!-- User Account: style can be found in dropdown-->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle padding-user d-block" data-toggle="dropdown">
                    <img src="img/authors/avatar1.jpg" width="35" class="rounded-circle img-fluid float-left"
                         height="35" alt="User Image">
                    <div class="riot">
                        <div>
                            Addison
                            <span><i class="fa fa-sort-down"></i></span>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="img/authors/avatar1.jpg" class="rounded-circle" alt="User Image">
                        <p> Addison</p>
                    </li>
                    <!-- Menu Body -->
                    <li class="p-t-3"><a href="user_profile" class="dropdown-item"> <i class="fa fa-fw ti-user"></i> My Profile </a>
                    </li>
                    <li role="presentation"></li>
                    <li><a href="edit_user" class="dropdown-item"><i class="fa fa-fw ti-settings"></i> Account Settings </a></li>
                    <li role="presentation" class="dropdown-divider"></li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="float-left">
                            <a href="lockscreen">
                                <i class="fa fa-fw ti-lock"></i>
                                Lock
                            </a>
                        </div>
                        <div class="float-right">
                            <a href="login">
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
