
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

                <div class="panel ">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="ti-layout-grid3"></i> Request Service Form
                        </h3>

                    </div>
                    <div class="panel-body">
                        <form id="saveServiceForm">
                            <div class="row">
                                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />


                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="region" class="control-label">Tenant Name:</label>
                                        <select class="form-control select2" name="tenant" id="tenants"  required style="width: 100%">
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
                                        <select class="form-control select2" name="service_type" id="services"  required style="width: 100%">
                                            <option value="">Select --</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label">Service Description:</label>
                                        <textarea type="text" class="form-control" name="service_description" id="service_description"  >
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label">Service Amount:</label>
                                        <input type="text" class="form-control" name="service_amount" id="service_amount"/>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 pull-right">
                                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                                </div>
                            </div>
                        </form>
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

        <div class="background-overlay"></div>
    </section>
    <!-- /.content -->
</aside>


@endsection 

@section('userjs')
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/custom_js/datatables_custom.js')}}"></script>
<script src="{{ asset('vendors/toastr/js/toastr.min.js')}}"></script>

<script  type="text/javascript">

getServices();
getTenants();


$('#paymentdate').datepicker({
        format: 'dd-mm-yyyy'
    });


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
                getApartments();
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


$('#services').change(function () {
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
            $('#service_description').val(data[0].description);
            $('#service_amount').val(data[0].amount);

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

                $('#services').append($('<option>', {
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

                $('#tenants').append($('<option>', {
                    value: item.id,
                    text: item.name
                }));
            });
        }

    });
}
</script>

@endsection