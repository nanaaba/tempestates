
@extends('layouts.master')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tenants Request Service Form
        </h1>
        <ol class="breadcrumb">


            <li class="active">
                Tenants Request Service Form
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">



        <div class="row">
            <div class="col-lg-12">

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ti-layout-grid3"></i> Request Service Form
                        </h3>

                    </div>
                    <div class="card-body">
                        <form id="saveServiceForm">
                            <div class="row">
                                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />


                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="region" class="control-label">Tenant Name:</label>
                                        <select class="form-control select2 tenants" name="tenant" id="tenants"  required style="width: 100%">
                                            <option value="">Select --</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label">Apartment Name:</label>
                                        <input type="text" class="form-control" name="apartment_name" id="apartment_name"  readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label">Apartment Type:</label>
                                        <input type="text" class="form-control" name="apartment_type" id="apartment_type"  readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="my-element">
                                            Service Date:
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-fw ti-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control float-right"  name="date_serviced"   data-language="en" id="paymentdate">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="region" class="control-label">Service Type:</label>
                                        <select class="form-control select2  services" name="service_type"   required style="width: 100%">
                                            <option value="">Select --</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label">Service Description:</label>
                                        <textarea type="text" class="form-control service_description" name="service_description"   >
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label">Service Amount:</label>
                                        <input type="text" class="form-control service_amount" name="service_amount" />
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
        
        <div class="row">
            <div class="col-lg-12">

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ti-layout-grid3"></i> Tenants Bill 
                        </h3>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                              <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="servicesTbl">
                                <thead>
                                    <tr>
                                        <th>
                                            Tenant Name
                                        </th>
                                        <th>
                                            Service Type
                                        </th> 
                                        <th>
                                            Amount
                                        </th>
                                        <th>
                                            Service Date
                                        </th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
          
                        </div>


                    </div>
                </div>
            </div>
        </div>





        <div class="modal fade" id="loaderModal" data-keyboard="false" data-backdrop="static" role="dialog" >
            <div class="modal-dialog" role="document">


                <div  id="loader" style="margin-top:30% ">
                    <i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
                    <span class="loader-text">Wait...</span>
                </div>


            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" > <span id="holdername"></span> Information </h4>
                    </div>
                    <div class="modal-body">
                        <form id="updateForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />


                                    <input type="hidden" id="code" name="code"/>

                                    <div class="form-group">
                                        <label for="region" class="control-label">Tenant Name:</label>
                                        <input type="text" class="form-control" name="tenant_name" id="uptenant_name"  readonly>
                                    </div>

<!--                                    <div class="form-group">
                                        <label for="region" class="control-label">Apartment Name:</label>
                                        <input type="text" class="form-control" name="apartment_name" id="upapartment_name"  readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label">Apartment Type:</label>
                                        <input type="text" class="form-control" name="apartment_type" id="upapartment_type"  readonly>
                                    </div>-->

                                    <div class="form-group">
                                        <label for="my-element">
                                            Service Date:
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-fw ti-calendar"></i>
                                            </div>
                                            <input type="date" class="form-control "  name="date_serviced"   data-language="en" id="upservicedate">
                                        </div>
                                        <!-- /.input group -->
                                    </div>

                                    <div class="form-group ">
                                        <label for="region" class="control-label">Service Type:</label>
                                        <select class="form-control select2 services" id="up_services" name="service_type"   required style="width: 100%">
                                            <option value="">Select --</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label">Service Description:</label>
                                        <textarea type="text" class="form-control service_description" name="service_description" id="upservice_description"  >
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label">Service Amount:</label>
                                        <input type="text" class="form-control service_amount" name="service_amount" id="upservice_amount"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label">Reason for updating:</label>
                                        <textarea type="text" class="form-control " name="reason" required  >
                                        </textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pull-right">
                                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>






        <div class="background-overlay"></div>
    </section>
    <!-- /.content -->




</aside>


@endsection 

@section('userjs')
<script src="{{ asset('vendors/toastr/js/toastr.min.js')}}"></script>

<script  type="text/javascript">

getServices();
getTenants();


$('#paymentdate').datepicker({
    format: 'dd-mm-yyyy'
});
var datatable = $('#servicesTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    order: [[0, "asc"]]
});


getTenantsBills();
function getTenantsBills()
{

    $.ajax({
        url: '../tenantbills/all',
        type: "GET",
        dataType: "json",
        success: function (data) {

            console.log(data);
            datatable.clear().draw();


            if (data.length == 0) {
                console.log("NO DATA!");
            } else {
                $.each(data, function (key, value) {


                    var j = -1;
                    var r = new Array();
                    // represent columns as array
                    r[++j] = '<td class="subject">' + value.tenant_name + '</td>';
                    r[++j] = '<td class="subject">' + value.service_name + '</td>';
                    r[++j] = '<td class="subject">' + value.amount + '</td>';
                    r[++j] = '<td class="subject">' + value.serviced_date + '</td>';

                    r[++j] = '<td><button onclick="editType(\'' + value.id + '\')"  class="btn btn-outline-info btn-sm editBtn" type="button">Edit</button>\n\
                              <button onclick="deleteType(\'' + value.id + '\')"  class="btn btn-outline-danger btn-sm deleteBtn" type="button">Delete</button></td>';

                    rowNode = datatable.row.add(r);
                });

                rowNode.draw().node();
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
}


$('#saveServiceForm').on('submit', function (e) {
    e.preventDefault();
    // var validator = $("#saveRegionForm").validate();
    var formData = $(this).serialize();
    $('#loaderModal').modal('show');

    $('input:submit').attr("disabled", true);
    $.ajax({
        url: "{{url('tenants/service')}}",
        type: "POST",
        data: formData,
        success: function (data) {
            console.log(data);
            $('#newModal').modal('hide');
            $('input:submit').removeAttr("disabled");
            $('#loaderModal').modal('hide');

            //  document.getElementById("saveServiceForm").reset();
            if (data == 0) {
                swal("Success!", "Service Added", "success");
                getTenantsBills();
            } else if (data == 1) {
                swal("Error!", "Couldnt add service", "error");
            } else {
                swal("Error!", data, "error");

            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            $('input:submit').removeAttr("disabled");
            $('#loaderModal').modal('hide');

            swal("Error!", "Contact System Administrator ", "error");
        }
    });




});


$('.services').change(function () {
    var service = $(this).val();
    getServiceInfo(service);
});

$('#tenants').change(function () {
    var tenant_id = $(this).val();
    getTenantInfo(tenant_id);
});

function getServiceInfo(id) {


    $.ajax({
        url: "../services/" + id,
        type: "GET",
        dataType: 'json',
        success: function (data) {
            $('.service_description').val(data[0].description);
            $('.service_amount').val(data[0].amount);

        }
//up_facilities
    });
}

function getTenantInfo(id) {


    $.ajax({
        url: "../tenants/" + id,
        type: "GET",
        dataType: 'json',
        success: function (data) {
            $('#apartment_name').val(data[0].apartment_name);
            $('#apartment_type').val(data[0].apartment_type);

        }
//up_facilities
    });
}



function getServices() {


    $.ajax({
        url: "{{url('services/all')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {

            $.each(data, function (i, item) {

                $('.services').append($('<option>', {
                    value: item.id,
                    text: item.name
                }));
            });
        }

    });
}

function getTenants() {


    $.ajax({
        url: "{{url('tenants/all')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {

            $.each(data, function (i, item) {

                $('.tenants').append($('<option>', {
                    value: item.id,
                    text: item.name
                }));
            });
        }

    });
}




function editType(code) {
    console.log('goood');
    $('#code').val(code);
    $('#loaderModal').modal('show');

    getBillInfo(code);
    $('#loaderModal').modal('hide');

    $('#editModal').modal('show');

}

function getBillInfo(id) {


    $.ajax({
        url: '../bills/' + id,
        type: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data[0].name);
            $('#uptenant_name').val(data[0].tenant_name);
//            $('#upapartment_name').val(data[0].type);
//            $('#upapartment_type').val(data[0].currency);
            $('#upservicedate').val(data[0].serviced_date);
            $('#upservice_description').val(data[0].description);
            $('#upservice_amount').val(data[0].amount);
            $('#up_services').val(data[0].service_id).change();

            $('#code').val(id);

        },
        error: function (jXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });

}



$('#updateForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var formData = $(this).serialize();
    console.log(formData);
    $('#editModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'updatebill',
        type: "PUT",
        data: formData,
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');


            if (data == 0) {
                swal("Success!", "Information Updated Successfully", "success");
                getApartments();
            } else {
                swal("Error!", "Couldnt Update", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });

});

function deleteType(code) {
    console.log(code );
    $('#code').val(code);
   // $('#holdername').html(title);
    $('#confirmModal').modal('show');
}

$('#deleteForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var code = $('#code').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'deletebill/' + code,
        type: "DELETE",
        data: {_token: token},
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');

            document.getElementById("deleteForm").reset();
            if (data == 0) {
                swal("Success!", "Deleted Successfully", "success");
                getTenantsBills();
            } else {
                swal("Error!", "Couldnt delete", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            $('#loaderModal').modal('hide');

            alert(errorThrown);
        }
    });

});

</script>

@endsection