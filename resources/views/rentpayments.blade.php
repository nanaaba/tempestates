
@extends('layouts.master')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Rent Payments Form
        </h1>
        <ol class="breadcrumb">


            <li class="active">
                Rent Payments Form
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
                            <i class="ti-layout-grid3"></i> Payments Form
                        </h3>

                    </div>
                    <div class="panel-body">
                        <form id="savePaymentsForm" enctype="multipart/form-data" novalidate>
                            <div class="row">


                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

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
                                            Payment Date:
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-fw ti-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control float-right"  name="payment_date"   data-language="en" id="paymentdate">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>

                                <div class="col-md-6">


                                    <div class="form-group ">
                                        <label for="region" class="control-label">Mode:</label>
                                        <select class="form-control select2" name="mode" id='mode'   required style="width: 100%">
                                            <option value="">Select --</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="Bank Deposit">Bank Deposit </option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label">Amount:</label>
                                        <input type="text" class="form-control" name="amount" id="amount"  >
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label"> Description:</label>
                                        <textarea type="text" class="form-control" name="description" id="service_description"  >
                                        </textarea>
                                    </div>

                                    <div id='cheque' style="display: none;">
                                        <div class="form-group">
                                            <label for="region" class="control-label">Scanned Cheque:</label>
                                            <input type="file" class="form-control" name="chequeurl"   >
                                        </div> 



                                    </div>

                                    <div id='bankdepositdiv' style="display: none;">
                                        <div class="form-group">
                                            <label for="region" class="control-label">Scanned Deposit:</label>
                                            <input type="file" class="form-control" name="depositurl"   >
                                        </div>

                                        <div class="form-group ">
                                            <label for="region" class="control-label">Banks:</label>
                                            <select class="form-control select2" name="bank" id='banks'  required style="width: 100%">
                                                <option value="">Select --</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 pull-right">
                                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">

                    <div class="panel ">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="ti-layout-grid3"></i>Tenant Payments
                            </h3>

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="paymentsTbl">
                                    <thead>
                                        <tr>
                                            <th>
                                                Tenant Name
                                            </th>
                                            <th>
                                                Payment Description
                                            </th> <th>
                                                Amount
                                            </th>
                                            <th>
                                                Payment Mode
                                            </th>
                                            <th>
                                                Payment Date
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
                            <h4 class="modal-title" id="exampleModalLabel">Update </h4>
                        </div>
                        <div class="modal-body">
                            <form id="updateForm" novalidate>

                                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />
                                <input type="hidden" id="code" name="code"/>

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="region" class="control-label">Tenant Name:</label>
                                            <input type="text" class="form-control" name="tenant_name"  id="uptenant_name"  readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="my-element">
                                                Payment Date:
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw ti-calendar"></i>
                                                </div>
                                                <input type="date" class="form-control"  name="payment_date" id="uppayment_date"   data-language="en" >
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group ">
                                            <label for="region" class="control-label">Mode:</label>
                                            <select class="form-control select2" name="mode" id='upmode'   required style="width: 100%">
                                                <option value="">Select --</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Bank Deposit">Bank Deposit </option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="region" class="control-label">Amount:</label>
                                            <input type="text" class="form-control" name="amount" id="upamount"  >
                                        </div>
                                        <div class="form-group">
                                            <label for="region" class="control-label"> Description:</label>
                                            <textarea type="text" class="form-control" name="description" id="updescription"  >
                                            </textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="region" class="control-label"> Reason:</label>
                                            <textarea type="text" class="form-control" name="reason"   >
                                            </textarea>
                                        </div>

                                        <div id='upcheque' style="display: none;">
                                            <div class="form-group">
                                                <label for="region" class="control-label">Scanned Cheque:</label>
                                                <input type="file" class="form-control" name="chequeurl"   >

                                                <span id="chqurl">

                                                </span>
                                            </div>




                                        </div>

                                        <div id='upbankdepositdiv' style="display: none;">
                                            <div class="form-group">
                                                <label for="region" class="control-label">Scanned Deposit:</label>
                                                <input type="file" class="form-control" name="depositurl"   >
                                                <span id="depurl"></span>
                                            </div>

                                            <div class="form-group ">
                                                <label for="region" class="control-label">Banks:</label>
                                                <select class="form-control select2" name="bank" id='banks'  required style="width: 100%">
                                                    <option value="">Select --</option>

                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pull-right">
                                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                                        </div>
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
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/custom_js/datatables_custom.js')}}"></script>
<script src="{{ asset('vendors/toastr/js/toastr.min.js')}}"></script>

<script  type="text/javascript">

$('#paymentdate').datepicker({
    format: 'dd-mm-yyyy'
});

var datatable = $('#paymentsTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    order: [[0, "asc"]]
});



getPayments();
function getPayments()
{

    $.ajax({
        url: 'payments/all',
        type: "GET",
        dataType: "json",
        success: function (data) {

            console.log(data);
            datatable.clear().draw();


            if (data.length == 0) {
                console.log("NO DATA!");
            } else {
                $.each(data, function (key, value) {

                    var url;
                    if (value.mode == "Cheque") {
                        url = value.cheque_url;
                    } else if (value.mode == "Deposit") {
                        url = value.deposit_url;

                    }

                    var j = -1;
                    var r = new Array();
                    // represent columns as array
                    r[++j] = '<td class="subject">' + value.title + ' ' + value.name + '</td>';
                    r[++j] = '<td class="subject">' + value.description + '</td>';
                    r[++j] = '<td class="subject">' + value.amount + '</td>';
                    r[++j] = '<td class="subject">' + value.mode + '</td>';
                    r[++j] = '<td class="subject">' + value.payment_date + '</td>';

                    r[++j] = '<td><button onclick="editType(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-info btn-sm editBtn" type="button">Edit</button>\n\
                              <button onclick="deleteType(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-danger btn-sm deleteBtn" type="button">Delete</button></td>';

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

getServices();
getTenants();




$('#savePaymentsForm').on('submit', function (e) {
    e.preventDefault();
    // var validator = $("#saveRegionForm").validate();
//    var formData = $(this).serialize();
    var formData = new FormData($("#savePaymentsForm")[0]);
    console.log('data' + formData);
    $('#loaderModal').modal('show');

    $('input:submit').attr("disabled", true);
    $.ajax({
        url: "{{url('banking/saverentpayments')}}",
        type: "POST",
        data: formData,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data);
            $('#newModal').modal('hide');
            $('input:submit').removeAttr("disabled");
            $('#loaderModal').modal('hide');

            document.getElementById("savePaymentsForm").reset();
            if (data.success == 0) {
                swal("Success!", data.message, "success");
                getPayments();
            } else if (data.success == 1) {
                swal("Error!", data.message, "error");
            } else {
                swal("Error!", data.message, "error");

            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            $('input:submit').removeAttr("disabled");
            swal("Error!", "Contact System Administrator ", "error");
        }
    });




});


$('#mode').change(function () {
    var mode = $(this).val();

    if (mode == "Cheque") {
        console.log(mode);
        $('#cheque').show();
        $('#bankdepositdiv').hide();
    } else if (mode == "Cash") {
        console.log(mode);
        $('#cheque').hide();
        $('#bankdepositdiv').hide();
    } else {
        console.log('jhjhjj:' + mode);
        $('#bankdepositdiv').show();
        $('#cheque').hide();
    }
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
getBanks();
function getBanks() {


    $.ajax({
        url: "{{url('banks/all')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {

            $.each(data, function (i, item) {

                $('#banks').append($('<option>', {
                    value: item.id + '-' + item.bank_name + '-' + item.account_no,
                    text: item.bank_name + '-' + item.account_no
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






function editType(code) {
    console.log('goood');
    $('#code').val(code);
    $('#loaderModal').modal('show');

    getPaymentInfo(code);
    $('#loaderModal').modal('hide');

    $('#editModal').modal('show');

}

function getPaymentInfo(id) {


    $.ajax({
        url: '../banking/payments/' + id,
        type: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data[0].name);
            $('#uptenant_name').val(data[0].name);
            $('#upamount').val(data[0].amount);
            $('#updescription').val(data[0].description);
            $('#upmode').val(data[0].mode).change();
            $('#uppayment_date').val(data[0].payment_date);
            $('#chqurl').html('<a target="_blank" href ="http://localhost/tempestates/storage/app/'+data[0].cheque_url+'" type="button" class="btn btn-info ">View Cheque </a>');
            $('#code').val(id);
            $('#depurl').html('<a target="_blank" href ="http://localhost/tempestates/storage/app/'+data[0].deposit_url+'" type="button" class="btn btn-info ">View Deposit </a>');

        },
        error: function (jXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });

}



$('#updateForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var formData = new FormData($("#updateForm")[0]);
    console.log('data' + formData);
    $('#loaderModal').modal('show');

    $('input:submit').attr("disabled", true);
    $.ajax({
        url: "{{url('banking/updaterentpayments')}}",
        type: "POST",
        data: formData,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data);
            $('#editModal').modal('hide');
            $('input:submit').removeAttr("disabled");
            $('#loaderModal').modal('hide');

            document.getElementById("updateForm").reset();
            if (data.success == 0) {
                swal("Success!", data.message, "success");
                getPayments();
            } else if (data.success == 1) {
                swal("Error!", data.message, "error");
            } else {
                swal("Error!", data.message, "error");

            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            $('input:submit').removeAttr("disabled");
            swal("Error!", "Contact System Administrator ", "error");
        }
    });

});

function deleteType(code) {
    console.log(code);
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
        url: '../deletepayment/' + code,
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
                getPayments();
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


$('#upmode').change(function () {
    var mode = $(this).val();

    if (mode == "Cheque") {
        console.log(mode);
        $('#upcheque').show();
        $('#upbankdepositdiv').hide();
    } else if (mode == "Cash") {
        console.log(mode);
        $('#upcheque').hide();
        $('#upbankdepositdiv').hide();
    } else {
        console.log('jhjhjj:' + mode);
        $('#upbankdepositdiv').show();
        $('#upcheque').hide();
    }
});

</script>

@endsection