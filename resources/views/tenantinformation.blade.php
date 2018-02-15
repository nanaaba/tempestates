
@extends('layouts.forms')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tenant Information
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
                Tenant Information
            </li>
        </ol>
    </section>
    <?php
    $info = json_decode($information, true);
    $documents = json_decode($documents, true);
    $profilepic = $info[0]['profile_pic'];
    $scanned_id = $info[0]['scanned_id'];
    //print_r($info);
    //print_r($documents);
    ?>
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

                            <form id="tenantForm"  enctype="multipart/form-data" class="form-horizontal">

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

                                        <input type="hidden" value="{{$info[0]['id']}}" name="tenant_id"/>
                                        <input type="hidden" value="{{$profilepic}}" name="profilepic"/>
                                        <input type="hidden" value="{{$scanned_id}}" name="scannedid"/>

                                        <h2 class="hidden">&nbsp;</h2>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label  class="form-control-label float-sm-right">Apartment 
                                                </label>
                                            </div>


                                            <div class="col-sm-9">
                                                <select class="select2 form-control" name="apartment" id="apartments">
                                                    <option value="{{$info[0]['apartment_id']}}">{{$info[0]['apartment_name']}}</option>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label  class="form-control-label float-sm-right">Apartment Type 
                                                </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="apartment_type" value="{{$info[0]['apartment_type']}}" id="apartment_type" type="text" class="form-control required" readonly/>
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
                                                            value="{{$info[0]['currency']}}"
                                                            class="form-control " readonly />   
                                                </div>
                                                <div class="col-sm-6">
                                                    <input  name="amount" type="text" id="monthly_charge"
                                                            value="{{$info[0]['amount']}}"
                                                            class="form-control required"  />
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
                                                    <option value="{{$info[0]['period']}}">{{$info[0]['period']}} months</option>

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
                                                        <img src="<?php echo imgasset("storage/app/$profilepic") ?>" alt="profile pic holder">
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
                                                    <option value="{{$info[0]['title']}}">{{$info[0]['title']}}</option>
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
                                                <input  name="fullname"   value="{{$info[0]['name']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Date of Birth</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input id="dob"   value="{{$info[0]['dateofbirth']}}" name="dob" type="text" class="form-control"
                                                       placeholder="dd/mm/yyyy"/>
                                            </div>
                                        </div>

                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Gender</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control"    name="gender" style="width: 100%">
                                                    <option value="{{$info[0]['gender']}}">{{$info[0]['gender']}}</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label class="form-control-label">Nationality</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="nationality"   value="{{$info[0]['nationality']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>


                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">HomeTown & District</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="hometown"   value="{{$info[0]['hometown']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">E-mail Address </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="email"   value="{{$info[0]['email_address']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">Phone Number(s)</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="phone_number"   value="{{$info[0]['contactno']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Current or Present Residential address</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="current_resident"   value="{{$info[0]['current_resident']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>        
                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Previous Residential address
                                                </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="previous_resident"   value="{{$info[0]['previous_resident']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>

                                        <div class="row form-group required">
                                            <div class="col-sm-3 float-sm-right">
                                                <label for="dob" class="form-control-label">ID Number</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="select2 form-control" name="id_number" id="id_number" style="width: 100%">
                                                    <option value="{{$info[0]['id_number']}}">{{$info[0]['id_number']}}</option>

                                                </select>
                                            </div>
                                            <div class="col-sm-3">

                                                <?php
                                                echo '<a target="_blank" href ="' . imgasset("storage/app/" . $scanned_id . "") . '" type="button" class="btn btn-info ">
                    View Scanned ID
                </a>';
                                                ?>
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
                                                            <span class="fileinput-new">Change File</span>
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
                                                    <option value="{{$info[0]['employment_status']}}">{{$info[0]['employment_status']}}</option>
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
                                                <input  name="occupation"   value="{{$info[0]['occupation']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>                   <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Position/Title</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="position"   value="{{$info[0]['position']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>                   
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Company/Institution Name</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="company"   value="{{$info[0]['company']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>                   
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Postal Address</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="company_address"   value="{{$info[0]['company_address']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>

                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Office Numbers</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="office_numbers"   value="{{$info[0]['company_numbers']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Area</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="office-area"   value="{{$info[0]['company_area']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Street</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="office_street"   value="{{$info[0]['company_street']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Location Address</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="office_location"    value="{{$info[0]['company_location']}}" type="text" class="form-control"/>

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
                                                    <option value="{{$info[0]['marital_status']}}" >{{$info[0]['marital_status']}} </option>
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
                                                <input  name="children"   value="{{$info[0]['children']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Next of Kin</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="nextofkin"   value="{{$info[0]['nextkin']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Phone No.</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="phoneno"   value="{{$info[0]['nextkin_contact']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Postal Address</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="nextkin_address"   value="{{$info[0]['nextkin_address']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Location:House No.</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="nextkin_hse"   value="{{$info[0]['nextkin_location']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Occupation/Profession</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="nextkin_occupation"   value="{{$info[0]['nextkin_occupation']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Emergency Contact</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="emergency_contact"    value="{{$info[0]['emergency_contact']}}" type="text" class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-sm-3 float-sm-right">
                                                <label  class="form-control-label">Place Of Work</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input  name="nextkin_work"   value="{{$info[0]['nextkin_workplace']}}" type="text" class="form-control"/>

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
                                            <br><br>
                                            <?php
                                            $i = 1;
                                            foreach ($documents as $value) {

                                                echo '<a target="_blank" href ="' . imgasset("storage/app/" . $value['url'] . "") . '" type="button" class="btn btn-info ">
                    Download file' . $i . '
                </a>&nbsp;&nbsp;';

                                                $i++;
                                            }
                                            ?>
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
                                    <li class="finish"><a href="javascript:;">finish</a></li>
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
    //var formData = $("#tenantForm").serialize();
    var formData = new FormData($("#tenantForm")[0]);


    console.log('data :' + formData);
    $.ajax({
        url: "{{url('tenants/update')}}",
        type: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
      dataType: 'json',
        success: function (data) {
            console.log('server data :' + data);
            if (data.success == 0) {
                $('#tenantForm select').val('').trigger('change');

//                document.getElementById("tenantForm").reset();
                new PNotify({
                    title: 'Success',
                    text: "Tenant Information updated successfully.",
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
        url: "../../apartment/" + id,
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

</script>
@endsection