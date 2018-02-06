
@extends('layouts.forms')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            New Tenant
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-fw ti-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#"> Tenants</a>
            </li>
            <li class="active">
                New Tenant
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">


        <div class="row">
            <div class="col-lg-12">

                <div class="panel ">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="ti-layout-tab"></i> 
                            New Tenant Form
                        </h3>

                    </div>
                    <div class="panel-body">
                        <form id="tenantForm" method="POST" enctype="multipart/form-data" class="form-horizontal">

                            <!-- CSRF Token -->
                        <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />


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

                                    <li class="nav-item">
                                        <a href="#tab5" class="nav-link" data-toggle="tab">Related Documents</a>
                                    </li>
                                </ul>



                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        <h2 class="hidden">&nbsp;</h2>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label  class="form-control-label float-sm-right">Apartment 
                                                </label>
                                            </div>


                                            <div class="col-sm-9">
                                                <select class="select2 form-control" name="apartment" id="apartments">
                                                    <option value="">Choose</option>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label  class="form-control-label float-sm-right">Apartment Type 
                                                </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="apartment_type" id="apartment_type" type="text" class="form-control required" readonly/>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label  class="form-control-label float-sm-right">Monthly Amount 
                                                </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="amount" type="text"
                                                        class="form-control required" />
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="form-control-label float-sm-right">Rent Period 
                                                </label>
                                            </div>


                                            <div class="col-sm-9">
                                                <select class="select2 form-control" name="rent_period">
                                                    <option value="">Choose</option>

                                                </select>

                                            </div>
                                        </div>



                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <h2 class="hidden">&nbsp;</h2>
                                        <div class="row form-group">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="pic" class="form-control-label">Profile
                                                    picture</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail"
                                                         style="width: 200px; height: 200px;">
                                                        <img src="{{ asset('img/original.jpg')}}" alt="profile pic holder">
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
                                                <label for="dob" class="form-control-label">Title</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control" name="title" style="width: 100%">
                                                    <option value="">Choose ...</option>
                                                    <option value="Mr.">Mr.</option>
                                                    <option value="Miss">Miss</option>
                                                    <option value="Mrs">Mrs</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Name</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="fullname" type="text" class="form-control"/>

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
                                                <label  class="form-control-label">Gender</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control" name="gender" style="width: 100%">
                                                    <option>Choose ..</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label class="form-control-label">Nationality</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="text" type="nationality" class="form-control"/>

                                            </div>
                                        </div>


                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">HomeTown & District</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="hometown" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">E-mail Address </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="email" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Phone Number(s)</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="phone_number" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Current or Present Residential address</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="current_resident" type="text" class="form-control"/>

                                            </div>
                                        </div>        
                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Previous Residential address
                                                </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="previous_resident" type="text" class="form-control"/>

                                            </div>
                                        </div>

                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">ID Number</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control" name="id_number" style="width: 100%">
                                                    <option value="">Choose ..</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="pic" class="form-control-label">Scanned ID Card
                                                </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">

                                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                                         style="max-width: 200px; max-height: 200px;"></div>
                                                    <div>
                                                        <span class="btn btn-default btn-file">
                                                            <span class="fileinput-new">Select File</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input  name="scanned_id" type="file"
                                                                    class="form-control"/>
                                                        </span>
                                                        <a href="#" class="btn btn-danger fileinput-exists"
                                                           data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <div class="row form-group">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Employment Status</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control select2"  name="employment_status" style="width: 100%">
                                                    <option disabled selected>Choose</option>
                                                    <option value="Employee">Employee</option>
                                                    <option value="Self Employed">Self Employed</option>
                                                    <option value="UnEmployed">UnEmployed</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label class="form-control-label">Occupation/Profession</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="occupation" type="text" class="form-control"/>

                                            </div>
                                        </div>                   <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Position/Title</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="position" type="text" class="form-control"/>

                                            </div>
                                        </div>                   
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Company/Institution Name</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="company" type="text" class="form-control"/>

                                            </div>
                                        </div>                   
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Postal Address</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="company_address" type="text" class="form-control"/>

                                            </div>
                                        </div>

                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Office Numbers</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="office_numbers" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Area</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="office-area" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Street</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="office_street" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Location Address</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="office_location" type="text" class="form-control"/>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane" id="tab4">

                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label class="form-control-label">Marital Status </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="marital_status" id="marital_status" >
                                                    <option disabled selected>Select </option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">No. Children</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="children" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Next of Kin</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="nextofkin" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Phone No.</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="phoneno" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Postal Address</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="nextkin_address" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Location:House No.</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="nextkin_hse" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Occupation/Profession<</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="nextkin_occupation" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Emergency Contact</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="nextkin_contact" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Place Of Work</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="nextkin_work" type="text" class="form-control"/>

                                            </div>
                                        </div>


                                    </div>
                                    <div class="tab-pane" id="tab5">
                                        <div class="row form-group">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">
                                                    You can select multiple documents
                                                </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="documents[]" type="file" multiple
                                                        class="form-control"/>
                                                </span>

                                            </div>

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




                        </form>          

                        
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