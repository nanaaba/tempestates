
@extends('layouts.master')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Rent/Services Payments 
        </h1>
        <ol class="breadcrumb">


            <li class="active">
                Rent/Services Payments 
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
                            <i class="ti-layout-grid3"></i>  Payments    </h3>

                    </div>
                    <div class="card-body">
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
        <div class="modal fade  " id="editModal"role="dialog" >
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title"> <span id="aprtname"></span> Payment  Information</h4>
                    </div>
                    <form id="" role="form">
                        <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                        <div class="modal-body">

                            <input type="hidden" id="code" name="code"/>

                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Tenant Name</label>

                                <input type="text" class="form-control" name="name" readonly id="uptenant_name" >

                            </div>

                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Payment Date</label>

                                <input type="text" class="form-control" name="name" readonly id="uppayment_date" >

                            </div>  
                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Total Amount Paid</label>

                                <input type="text" class="form-control" name="name" readonly id="upamount_paid" >

                            </div>       
                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Description</label>

                                <input type="text" class="form-control" name="name" readonly id="updescription" >

                            </div>       
                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Payment Mode</label>

                                <input type="text" class="form-control" name="name" readonly id="uppayment_mode" >

                            </div>    
                            <div id="updeposit" style="display: none">
                                <div class="form-group row col-md-12 ">
                                    <label  class=" control-label">Bank Name</label>

                                    <input type="text" class="form-control" name="name" readonly id="upbank" >

                                </div>
                                <div class="form-group row col-md-12 ">
                                    <label  class=" control-label">Bank Account</label>

                                    <input type="text" class="form-control" name="name" readonly id="upaccountno" >

                                </div>

                                <div class="form-group row col-md-12 ">
                                    <label  class=" control-label">Scanned Deposit Slip</label>

                                    <span id="updepositurl"></span>
                                </div>

                            </div>
                            <div id="upcheque" style="display: none">
                                <div class="form-group row col-md-12 ">
                                    <label  class=" control-label">Scanned Cheque SLip</label>

                                    <span id="upchequeurl"></span>
                                </div>   
                            </div>
                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Cleared Code</label>

                                <input type="text" class="form-control" name="name" readonly id="clearedcode" >

                            </div>                    
                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Created By</label>

                                <input type="text" class="form-control" name="name" readonly id="createdBy" >

                            </div>                       
                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Created At</label>

                                <input type="text" class="form-control" name="name" readonly id="createdAt" >

                            </div>



                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="paymentshistTbl">
                                    <thead>
                                        <tr>
                                            <th>
                                                Payment Type
                                            </th>
                                            <th>
                                                Amount
                                            </th>
                                            <th>
                                                Start Date
                                            </th>
                                            <th>
                                                End Date
                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                            </div>

                        </div>
                        <div class="modal-footer">





                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal " id="loaderModal" data-keyboard="false" data-backdrop="static" role="dialog" >
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

<script src="{{ asset('vendors/toastr/js/toastr.min.js')}}"></script>
<script type="text/javascript">

//paymentshistTbl
var paymentsTbl = $('#paymentshistTbl').DataTable();
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
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$('#savePaymentsForm').on('submit', function (e) {
    e.preventDefault();

    var formData = new FormData($("#savePaymentsForm")[0]);
    console.log('data' + formData);
    //  $('#loaderModal').modal('show');
    $('input:submit').attr("disabled", true);
    var totalamount = $('#totalamount').val();
    var expectingrent_amount = $('#expectingrent_amount').val();
    var rent_amount = $('#rent_amount').val();
    var bill_amount_tobe_paid = $('#bill_amount_tobe_paid').val();
    var bill_amount = $('#bill_amount').val();
    var amountpaid = 0;

    //check if bill or rent is checked

    var ifbillchecked = $('#bill').is(':checked');
    if (ifbillchecked == true) {
        if ((bill_amount < bill_amount_tobe_paid) || (bill_amount > bill_amount_tobe_paid)) {
            alert('Bill amount must be the same as accumulated bill over  period');
            return;

        }
        amountpaid = parseFloat(amountpaid) + parseFloat(bill_amount);
    }

    var ifrentchecked = $('#rent').is(':checked');
    if (ifrentchecked == true) {
        if ((rent_amount < expectingrent_amount) || (rent_amount > expectingrent_amount)) {
            alert('Rent amount must be the same as expected rent amount');
            return;

        }
        amountpaid = parseFloat(amountpaid) + parseFloat(rent_amount);

    }

    if (totalamount < amountpaid) {
        alert(' total amount paid must equal total amount inputted ');
        return;
    }

    var surplus = totalamount - amountpaid;
    $('#remaining_amount').val(surplus);
    swal({
        title: "Continue Payment?",
        text: "Total amount is " + totalamount + ". Rent amount paid is  " + rent_amount + ". Bill amount is  " + bill_amount + ". Your balance is " + surplus,
        icon: "warning",
        button: {
            text: "PAY",
            closeModal: false,
        },

    })
            .then((willDelete) => {
                if (willDelete) {


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
                            // document.getElementById("savePaymentsForm").reset();
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

                } else {
                    swal("!!! You cancelled payments!", {
                        icon: "info",
                    });
                }
            });

});




 getPayments();
function getPayments()
{

    $.ajax({
        url: "{{url('banking/payments/all')}}",
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
                    r[++j] = '<td><button onclick="editType(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-info btn-sm editBtn" type="button">View</button>\n\
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






function editType(code) {
    console.log('goood');
    $('#code').val(code);
    $('#loaderModal').modal('show');
    getPaymentInfo(code);
    $('#loaderModal').modal('hide');
    $('#editModal').modal('show');
}

function getPaymentInfo(id) {

    $('#updeposit').hide();
    $('#upcheque').hide();

    $.ajax({
        url: '../banking/payments/' + id,
        type: "GET",
        dataType: "json",
        success: function (data) {
            var payments = data['details'];
            var mode = data['info'][0].mode;
            console.log(data['info'][0].name);
            $('#uptenant_name').val(data['info'][0].name);
            $('#upamount_paid').val(data['info'][0].currency + ' ' + data['info'][0].amount);
            $('#updescription').val(data['info'][0].description);
            $('#uppayment_mode').val(data['info'][0].mode);
            $('#uppayment_date').val(data['info'][0].payment_date);
            if (mode == "deposit") {
                $('#updeposit').show();

                $('#upbank').val(data['info'][0].bank_name);
                $('#upaccountno').val(data['info'][0].accountno);
                $('#clearedcode').val(data['info'][0].cleared_code);
                $('#updepositurl').html('<a target="_blank" href ="http://localhost/tempestates/storage/app/' + data['info'][0].deposit_url + '" type="button" class="btn btn-info ">View Deposit </a>');
            }
            if (mode == "cheque") {
                $('#upcheque').show();
                $('#upchequeurl').html('<a target="_blank" href ="http://localhost/tempestates/storage/app/' + data['info'][0].cheque_url + '" type="button" class="btn btn-info ">View Cheque </a>');
            }
            $('#createdBy').val(data['info'][0].created_by);
            $('#createdAt').val(data['info'][0].created_at);

            $('#code').val(id);

            console.log(data);
            paymentsTbl.clear().draw();
            if (payments.length == 0) {
                console.log("NO DATA!");
            } else {
                $.each(payments, function (key, value) {

                    var url;
                    if (value.payment_type == "rent") {
                        end_date = value.rent_end_date;
                        start_date = value.rent_start_date;
                        amount = value.rent_amount;
                    } else if (value.payment_type == "bill") {
                        end_date = value.bill_end_date;
                        start_date = value.bill_start_date;
                        amount = value.bill_amount;

                    }

                    var j = -1;
                    var r = new Array();
                    // represent columns as array
                    r[++j] = '<td class="subject">' + value.payment_type + '</td>';
                    r[++j] = '<td class="subject">' + amount + '</td>';

                    r[++j] = '<td class="subject">' + end_date + '</td>';
                    r[++j] = '<td class="subject">' + start_date + '</td>';
                    rowNode = paymentsTbl.row.add(r);

                });
                rowNode.draw().node();
            }
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


function getBill() {

    var token = $('#token').val();
    var tenant = $('#tenants').val();
    var daterange = $('#reportrange').val();
    var arr = daterange.split('to');
    $.when(validateBill(arr[0], tenant)).done(function (response) {

        if (response == 1) {
            swal("Info!", "Bill payments has already been paid for this period", "info");
        } else {
            $.ajax({
                url: '{{url("tenantaccumulatedbill")}}',
                type: "POST",
                data: {_token: token, daterange: daterange, tenant: tenant},
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    var amount = 0;
                    if (data[0].total_amount == null) {
                        amount = 0;
                    } else {
                        amount = data[0].total_amount;
                    }
                    $('#bill_amount_tobe_paid').val(amount);
                },
                error: function (jXHR, textStatus, errorThrown) {
                    $('#loaderModal').modal('hide');
                    alert(errorThrown);
                }
            });
        }

    });
}
//

$('#rent').click(function () {
    var ifchecked = $('#rent').is(':checked');
    if (ifchecked == true) {
        $('#rendiv').show();
    } else {
        $('#rendiv').hide();
    }
});
$('#bill').click(function () {
    var ifchecked = $('#bill').is(':checked');
    if (ifchecked == true) {
        $('#billdiv').show();
    } else {
        $('#billdiv').hide();
    }
});
$('#rent_periods').change(function () {
    $('#end_date').val('');
    $('#expectingrent_amount').val('');
});
function validateRent(date, tenant_id) {

    return $.ajax({
        url: "../validaterent/" + tenant_id + "/" + date,
        type: "GET"

    });
}


function validateBill(date, tenant_id) {
    return $.ajax({
        url: "../validatebill/" + tenant_id + "/" + date,
        type: "GET"

    });
}

</script>
@endsection