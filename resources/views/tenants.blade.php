
@extends('layouts.forms')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add New Tenant
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="fa fa-fw ti-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#"> Tenants</a>
            </li>
            <li class="active">
                Add New Tenant
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff"
                               data-loop="true"></i> Add New Tenant
                        </h3>
                        <span class="float-right">
                            <i class="fa fa-fw ti-angle-up clickable"></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <!-- errors -->
                        <!--main content-->
                        <form id="adduser_form" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token"/>
                            <div id="pager_wizard">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a href="#tab1" class="nav-link active" data-toggle="tab">Apartment</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tab2" class="nav-link" data-toggle="tab">Tenant Information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tab3" class="nav-link" data-toggle="tab">Income Information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tab4" class="nav-link" data-toggle="tab">Relationship Information</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        <h2 class="hidden">&nbsp;</h2>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label for="first_name" class="form-control-label float-sm-right">Apartment *
                                                </label>
                                            </div>


                                            <div class="col-sm-9">
                                                <select class="select2 form-control">
                                                    <option>Choose</option>
                                                    <option>Beauty</option>
                                                    <option>Faith</option>
                                                    <option>Wisdom</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label for="last_name" class="form-control-label float-sm-right">Apartment Type *
                                                </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="last_name" type="text"
                                                       value="Two Bedroom Apartment" class="form-control required" readonly/>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label for="last_name" class="form-control-label float-sm-right">Monthly Amount *
                                                </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="last_name" type="text"
                                                       class="form-control required" />
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label for="first_name" class="form-control-label float-sm-right">Rent Period *
                                                </label>
                                            </div>


                                            <div class="col-sm-9">
                                                <select class="select2 form-control">
                                                    <option>Choose</option>
                                                    <option>3 months</option>
                                                    <option>6 months</option>
                                                    <option>1 Year</option>
                                                </select>

                                            </div>
                                        </div>



                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <h2 class="hidden">&nbsp;</h2>



                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Title</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control">
                                                    <option>Mr.</option>
                                                    <option>Miss</option>
                                                    <option>Mrs</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Name</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Date of Birth</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input id="dob" name="dob" type="text" class="form-control"
                                                       placeholder="dd/mm/yyyy"/>
                                            </div>
                                        </div>

                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Gender</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control">
                                                    <option>Choose ..</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="pic" class="form-control-label">Profile
                                                    picture</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail"
                                                         style="width: 200px; height: 200px;">
                                                        <img src="img/original.jpg" alt="profile pic holder">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                                         style="max-width: 200px; max-height: 200px;"></div>
                                                    <div>
                                                        <span class="btn btn-default btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input id="pic" name="pic_file" type="file"
                                                                   class="form-control"/>
                                                        </span>
                                                        <a href="#" class="btn btn-danger fileinput-exists"
                                                           data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="bio" class="control-label">Bio
                                                    <small>(brief intro) *</small>
                                                </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <textarea name="bio" id="bio" class="form-control resize_vertical"
                                                          rows="4"></textarea>
                                            </div>
                                        </div>

                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Nationality</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>


                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">HomeTown & District</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">E-mail </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Phone Number</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Current or Present Residential address</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>        
                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Previous Residential address
                                                </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>

                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">ID Number</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control">
                                                    <option>Choose ..</option>
                                                    <option>Driver License</option>
                                                    <option>Passport</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <div class="row form-group">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="gender" class="form-control-label">Occupation *</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control select21" 
                                                        title="Select Gender..." name="">
                                                    <option disabled selected>Choose</option>

                                                </select>
                                            </div>
                                        </div>


                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Occupation/Profession</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>                   <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Position/Title</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>                   
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Company/Institution Name</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>                   
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Postal Address</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>

                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Office Numbers</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Area</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Street</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Location Address</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="tab4">

                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="group" class="form-control-label">Marital Status *</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control required select21"
                                                        title="Select ..." name="" >
                                                    <option disabled selected>Select </option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">No. Children</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Next of Kin</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Phone No.</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Postal Address</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Location:House No.</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Occupation/Profession<</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Emergency Contact</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Place Of Work</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="text" class="form-control"/>

                                            </div>
                                        </div>


                                    </div>
                                    <ul class="pager wizard">
                                        <li class="previous">
                                            <a href="#">Previous</a>
                                        </li>
                                        <li class="next">
                                            <a href="#">Next</a>
                                        </li>
                                        <li class="next finish" style="display:none;">
                                            <a href="javascript:;">Finish</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <button type="button" class="close"
                                                    data-dismiss="modal">&times;
                                            </button>
                                            <h4 class="modal-title">Tenant Register</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Tenant Registered Successfully.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Ok
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--row end-->
        <!--rightside bar -->
        <div id="right">
            <div id="right-slim">
                <div class="rightsidebar-right">
                    <div class="rightsidebar-right-content">
                        <div class="panel-tabs">
                            <ul class="nav nav-tabs nav-float" role="tablist">
                                <li class="nav-item text-center">
                                    <a href="#r_tab1" role="tab" data-toggle="tab" class="nav-link active "><i
                                            class="fa fa-fw ti-comments"></i></a>
                                </li>
                                <li class="text-center nav-item">
                                    <a href="#r_tab2" role="tab" data-toggle="tab" class="nav-link"><i class="fa fa-fw ti-bell"></i></a>
                                </li>
                                <li class="text-center nav-item">
                                    <a href="#r_tab3" role="tab" data-toggle="tab" class="nav-link"><i
                                            class="fa fa-fw ti-settings"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="r_tab1">
                                <div id="slim_t1">
                                    <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                        <i class="menu-icon  fa fa-fw ti-user"></i>
                                        Contacts
                                    </h5>
                                    <ul class="list-unstyled margin-none">
                                        <li class="rightsidebar-contact-wrapper">
                                            <a class="rightsidebar-contact" href="#">
                                                <img src="img/authors/avatar6.jpg"
                                                     class="rounded-circle float-right" alt="avatar-image">
                                                <i class="fa fa-circle text-xs text-primary"></i>
                                                Annette
                                            </a>
                                        </li>
                                        <li class="rightsidebar-contact-wrapper">
                                            <a class="rightsidebar-contact" href="#">
                                                <img src="img/authors/avatar.jpg"
                                                     class="rounded-circle float-right" alt="avatar-image">
                                                <i class="fa fa-circle text-xs text-primary"></i>
                                                Jordan
                                            </a>
                                        </li>
                                        <li class="rightsidebar-contact-wrapper">
                                            <a class="rightsidebar-contact" href="#">
                                                <img src="img/authors/avatar2.jpg"
                                                     class="rounded-circle float-right" alt="avatar-image">
                                                <i class="fa fa-circle text-xs text-primary"></i>
                                                Stewart
                                            </a>
                                        </li>
                                        <li class="rightsidebar-contact-wrapper">
                                            <a class="rightsidebar-contact" href="#">
                                                <img src="img/authors/avatar3.jpg"
                                                     class="rounded-circle float-right" alt="avatar-image">
                                                <i class="fa fa-circle text-xs text-warning"></i>
                                                Alfred
                                            </a>
                                        </li>
                                        <li class="rightsidebar-contact-wrapper">
                                            <a class="rightsidebar-contact" href="#">
                                                <img src="img/authors/avatar4.jpg"
                                                     class="rounded-circle float-right" alt="avatar-image">
                                                <i class="fa fa-circle text-xs text-danger"></i>
                                                Eileen
                                            </a>
                                        </li>
                                        <li class="rightsidebar-contact-wrapper">
                                            <a class="rightsidebar-contact" href="#">
                                                <img src="img/authors/avatar5.jpg"
                                                     class="rounded-circle float-right" alt="avatar-image">
                                                <i class="fa fa-circle text-xs text-muted"></i>
                                                Robert
                                            </a>
                                        </li>
                                        <li class="rightsidebar-contact-wrapper">
                                            <a class="rightsidebar-contact" href="#">
                                                <img src="img/authors/avatar7.jpg"
                                                     class="rounded-circle float-right" alt="avatar-image">
                                                <i class="fa fa-circle text-xs text-muted"></i>
                                                Cassandra
                                            </a>
                                        </li>
                                    </ul>

                                    <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                        <i class="fa fa-fw ti-export"></i>
                                        Recent Updates
                                    </h5>
                                    <div>
                                        <ul class="list-unstyled">
                                            <li class="rightsidebar-notification">
                                                <a href="#">
                                                    <i class="fa ti-comments-smiley fa-fw text-primary"></i>
                                                    New Comment
                                                </a>
                                            </li>
                                            <li class="rightsidebar-notification">
                                                <a href="#">
                                                    <i class="fa ti-twitter-alt fa-fw text-success"></i>
                                                    3 New Followers
                                                </a>
                                            </li>
                                            <li class="rightsidebar-notification">
                                                <a href="#">
                                                    <i class="fa ti-email fa-fw text-info"></i>
                                                    Message Sent
                                                </a>
                                            </li>
                                            <li class="rightsidebar-notification">
                                                <a href="#">
                                                    <i class="fa ti-write fa-fw text-warning"></i>
                                                    New Task
                                                </a>
                                            </li>
                                            <li class="rightsidebar-notification">
                                                <a href="#">
                                                    <i class="fa ti-export fa-fw text-danger"></i>
                                                    Server Rebooted
                                                </a>
                                            </li>
                                            <li class="rightsidebar-notification">
                                                <a href="#">
                                                    <i class="fa ti-info-alt fa-fw text-primary"></i>
                                                    Server Not Responding
                                                </a>
                                            </li>
                                            <li class="rightsidebar-notification">
                                                <a href="#">
                                                    <i class="fa ti-shopping-cart fa-fw text-success"></i>
                                                    New Order Placed
                                                </a>
                                            </li>
                                            <li class="rightsidebar-notification">
                                                <a href="#">
                                                    <i class="fa ti-money fa-fw text-info"></i>
                                                    Payment Received
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="r_tab2">
                                <div id="slim_t2">
                                    <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                        <i class="fa fa-fw ti-bell"></i>
                                        Notifications
                                    </h5>
                                    <ul class="list-unstyled m-t-15 notifications">
                                        <li>
                                            <a href="" class="message icon-not striped-col">
                                                <img class="message-image rounded-circle"
                                                     src="img/authors/avatar3.jpg" alt="avatar-image">

                                                <div class="message-body">
                                                    <strong>John Doe</strong>
                                                    <br>
                                                    5 members joined today
                                                    <br>
                                                    <small class="noti-date">Just now</small>
                                                </div>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="message icon-not">
                                                <img class="message-image rounded-circle"
                                                     src="img/authors/avatar.jpg" alt="avatar-image">
                                                <div class="message-body">
                                                    <strong>Tony</strong>
                                                    <br>
                                                    likes a photo of you
                                                    <br>
                                                    <small class="noti-date">5 min</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="message icon-not striped-col">
                                                <img class="message-image rounded-circle"
                                                     src="img/authors/avatar6.jpg" alt="avatar-image">

                                                <div class="message-body">
                                                    <strong>John</strong>
                                                    <br>
                                                    Dont forgot to call...
                                                    <br>
                                                    <small class="noti-date">11 min</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="message icon-not">
                                                <img class="message-image rounded-circle"
                                                     src="img/authors/avatar1.jpg" alt="avatar-image">
                                                <div class="message-body">
                                                    <strong>Jenny Kerry</strong>
                                                    <br>
                                                    Done with it...
                                                    <br>
                                                    <small class="noti-date">1 Hour</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="message icon-not striped-col">
                                                <img class="message-image rounded-circle"
                                                     src="img/authors/avatar7.jpg" alt="avatar-image">

                                                <div class="message-body">
                                                    <strong>Ernest Kerry</strong>
                                                    <br>
                                                    2 members joined today
                                                    <br>
                                                    <small class="noti-date">3 Days</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="text-right noti-footer"><a href="#">View All Notifications <i
                                                    class="ti-arrow-right"></i></a></li>
                                    </ul>
                                    <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                        <i class="fa fa-fw ti-check-box"></i>
                                        Tasks
                                    </h5>
                                    <ul class="list-unstyled m-t-15">
                                        <li>
                                            <div>
                                                <p>
                                                    <span>Button Design</span>
                                                    <small class="float-right text-muted">40%</small>
                                                </p>
                                                <div class="progress progress-xs  active">
                                                    <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 40%">
                                                        <span class="sr-only">40% Complete (success)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>
                                                    <span>Theme Creation</span>
                                                    <small class="float-right text-muted">20%</small>
                                                </p>
                                                <div class="progress progress-xs  active">
                                                    <div class="progress-bar bg-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 20%">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>
                                                    <span>XYZ Task To Do</span>
                                                    <small class="float-right text-muted">60%</small>
                                                </p>
                                                <div class="progress progress-xs  active">
                                                    <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 60%">
                                                        <span class="sr-only">60% Complete (warning)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>
                                                    <span>Transitions Creation</span>
                                                    <small class="float-right text-muted">80%</small>
                                                </p>
                                                <div class="progress progress-xs active">
                                                    <div class="progress-bar bg-danger progress-bar-striped" role="progressbar"
                                                         aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 80%">
                                                        <span class="sr-only">80% Complete (danger)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="text-right"><a href="#">View All Tasks <i
                                                    class="ti-arrow-right"></i></a>
                                        </li>
                                    </ul>



                                </div>
                            </div>
                            <div class="tab-pane fade" id="r_tab3">
                                <div id="slim_t3">

                                    <h5 class="rightsidebar-right-heading text-uppercase gen-sett-m-t text-xs">
                                        <i class="fa fa-fw ti-settings"></i>
                                        General
                                    </h5>
                                    <ul class="list-unstyled settings-list m-t-10">
                                        <li>
                                            <label for="status">Available</label>
                                            <span class="float-right">
                                                <input type="checkbox" id="status" name="my-checkbox" checked>
                                            </span>
                                        </li>
                                        <li>
                                            <label for="email-auth">Login with Email</label>
                                            <span class="float-right">
                                                <input type="checkbox" id="email-auth" name="my-checkbox">
                                            </span>
                                        </li>
                                        <li>
                                            <label for="update">Auto Update</label>
                                            <span class="float-right">
                                                <input type="checkbox" id="update" name="my-checkbox">
                                            </span>
                                        </li>

                                    </ul>
                                    <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                        <i class="fa fa-fw ti-volume"></i>
                                        Sound & Notification
                                    </h5>
                                    <ul class="list-unstyled settings-list m-t-10">
                                        <li>
                                            <label for="chat-sound">Chat Sound</label>
                                            <span class="float-right">
                                                <input type="checkbox" id="chat-sound" name="my-checkbox" checked>
                                            </span>
                                        </li>
                                        <li>
                                            <label for="noti-sound">Notification Sound</label>
                                            <span class="float-right">
                                                <input type="checkbox" id="noti-sound" name="my-checkbox">
                                            </span>
                                        </li>
                                        <li>
                                            <label for="remain">Remainder </label>
                                            <span class="float-right">
                                                <input type="checkbox" id="remain" name="my-checkbox" checked>
                                            </span>

                                        </li>
                                        <li>
                                            <label for="vol">Volume</label>
                                            <input type="range" id="vol" min="0" max="100" value="15">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="background-overlay"></div>
    </section>
</aside>
@endsection 

@section('userjs')
<script type="text/javascript">
    $('.select2').select2();
</script>
@endsection