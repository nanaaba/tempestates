
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

                        <!-- CSRF Token -->


                        <div id="rootwizard">

                            <form id="tenantForm" method="POST" enctype="multipart/form-data" class="form-horizontal">

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
                                        <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

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
                                                <div class="col-sm-3">
                                                    <input  name="currency" type="text" id="currency"
                                                            class="form-control " readonly />   
                                                </div>
                                                <div class="col-sm-6">
                                                    <input  name="amount" type="text" id="monthly_charge"
                                                            class="form-control required" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="form-control-label float-sm-right">Rent Period 
                                                </label>
                                            </div>


                                            <div class="col-sm-9">
                                                <select class="select2 form-control" id="rent_periods" name="rent_period">
                                                    <option value="">Choose</option>

                                                </select>

                                            </div>
                                        </div>


                                        <div class="row form-group">   
                                            <div class="col-sm-3">

                                                <label for="my-element">
                                                    Start Date:
                                                </label>
                                            </div>
                                            <div class="col-sm-9">

                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-fw ti-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control float-right datepick"  name="start_date"   data-language="en" id="start_date">
                                                </div>
                                            </div>
                                            <!--                                            <div class="col-sm-3">
                                                                                            <button type="button" class="btn btn-info " onclick="computeEndDate()">
                                                                                                Compute End Date
                                                                                            </button>
                                                                                        </div>-->
                                            <!-- /.input group -->
                                        </div>

                                        <div class="row form-group">   
                                            <div class="col-sm-3">

                                                <label for="my-element">
                                                    End Date:
                                                </label>
                                            </div>
                                            <div class="col-sm-9">

                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-fw ti-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control float-right datepick"  name="end_date"   data-language="en" id="end_date">
                                                </div>
                                            </div>
                                            <!-- /.input group -->
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
                                                            <input  name="pic_file" type="file"
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
                                                
                                                <input type="text" class="form-control float-right datepick"  name="dob"   data-language="en" id="dob">

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
                                                <input  name="nationality" type="text" class="form-control"/>

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
                                                <input  name="phone_number" type="number" class="form-control"/>

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
                                                <select class="select2 form-control" name="id_number" id="id_number" style="width: 100%">
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
                                                    <option value="">Choose</option>
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
                                                <select class="form-control select2" name="marital_status" id="marital_status" style="width: 100%;" >
                                                    <option value="" >Select </option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Widow">Widow</option>
                                                    <option value="Widower">Widower</option>
                                                    <option value="Divorced">Divorced</option>
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
                                                <label  class="form-control-label">Occupation/Profession</label>
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
                                                <input  name="emergency_contact" type="text" class="form-control"/>

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

                                <!--                                <ul class="pager wizard">
                                                                    <li class="previous">
                                                                        <a href="#">Previous</a>
                                                                    </li>
                                                                    <li class="next">
                                                                        <a href="#">Next</a>
                                                                    </li>
                                                                    <li class="next finish" style="display:none;">
                                                                        <a href="javascript:;">Finish</a>
                                                                    </li>
                                                                </ul>-->
                                <ul class="pager wizard">
                                    <li class="previous first"><a href="javascript:;">First</a></li>
                                    <li class="previous"><a href="javascript:;">Previous</a></li>
                                    <li class="next last"><a href="javascript:;">Last</a></li>
                                    <li class="next"><a href="javascript:;">Next</a></li>
                                    <li class="finish"><a href="javascript:;">Finish</a></li>
                                </ul>

                            </form>
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
                    </div>
                </div>
            </div>
        </div>



        <div class="background-overlay"></div>
    </section>
</aside>
@endsection 

@section('userjs')
<script type="text/javascript" src="{{ asset('vendors/sweetalert2/js/sweetalert2.min.js')}}"></script>

<script type="text/javascript">
$('.datepick').datepicker({
    format: 'dd-mm-yyyy'
});
PNotify.prototype.options.styling = "bootstrap3";
PNotify.prototype.options.styling = "jqueryui";
PNotify.prototype.options.styling = "fontawesome";

$('#rootwizard').bootstrapWizard({onTabShow: function (tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;
        var $percent = ($current / $total) * 100;
        $('#rootwizard').find('.bar').css({width: $percent + '%'});
    }});
$('#rootwizard .finish').click(function () {
    // var formData = $("#tenantForm").serialize();
    var formData = new FormData($("#tenantForm")[0]);

    $('#loaderModal').modal('show');

    console.log('data :' + formData);
    $.ajax({
        url: "savetenant",
        type: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (data) {
                $('#loaderModal').modal('hide');

            console.log('server data :' + data);
            if (data.success == 0) {
                $('#tenantForm select').val('').trigger('change');

                document.getElementById("tenantForm").reset();
                new PNotify({
                    title: 'Success',
                    text: "Information saved successfully.Tenant Code is" + data.tenat_id,
                    type: 'success'
                });
                // swal("Success", "Information saved successfully.Tenant Code is"+data.tenat_id, 'success');
            } else if (data.success == 1) {
                new PNotify({
                    title: 'Error',
                    text: "Error in Saving Tenant Information",
                    type: 'error'
                });
                //swal("Error", "Error in Saving Tenant Information", 'error');

            } else {
                // swal("Error", data.message, 'error');
                new PNotify({
                    title: 'Error',
                    text: data.message,
                    type: 'error'
                });

            }


        }

    });
    // alert('Finished!, Starting over!');

    //$('#rootwizard').find("a[href*='tab1']").trigger('click');
});
$('.select2').select2();

getApartments();


function getApartments() {


    $.ajax({
        url: "{{url('apartment/all')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {

            $.each(data, function (i, item) {

                $('#apartments').append($('<option>', {
                    value: item.id,
                    text: item.name
                }));
            });
        }

    });
}

$('#apartments').change(function () {
    var id = $(this).val();
    getApartmentInfo(id);
});

function getApartmentInfo(id) {


    $.ajax({
        url: "../apartment/" + id,
        type: "GET",
        dataType: 'json',
        success: function (data) {
            $('#apartment_type').val(data[0].type);
            $('#monthly_charge').val(data[0].monthly_charge);
            $('#currency').val(data[0].currency);

            //currency
        }
//up_facilities
    });
}
getRentPeriods();
function getRentPeriods() {


    $.ajax({
        url: "{{url('configuration/getrentperiods')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {

            $.each(data, function (i, item) {

                $('#rent_periods').append($('<option>', {
                    value: item.name,
                    text: item.name + " months"
                }));
            });
        }

    });
}

getIds();
function getIds() {


    $.ajax({
        url: "{{url('configuration/getidentificationcards')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {

            $.each(data, function (i, item) {

                $('#id_number').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });
        }

    });
}

function computeEndDate() {
    var rent = $('#rent_periods').val();
    var startdate = $('#start_date').val();
    var endDateMoment = moment(startdate); // moment(...) can also be used to parse dates in string format
    var endate = endDateMoment.add(rent, 'months');
    console.log('end date' + endate);
    $('#end_date').val(endate);

}

</script>
@endsection