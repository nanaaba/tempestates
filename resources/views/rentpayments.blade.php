
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

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">
                            Payments Form
                        </h3>

                    </div>
                    <div class="card-body">
                        <form id="savePaymentsForm" enctype="multipart/form-data" novalidate>
                            <div class="row">


                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <input type="hidden" class="form-control form-control-lg input-lg" id="token"  name="_token" value="<?php echo csrf_token() ?>" />

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
                                    <div class="row form-group">

                                        <div class="col-lg-4">
                                            <label for="region" class="control-label">Currency :</label>
                                            <input type="text" class="form-control" name="currency" id="currency"  readonly>

                                        </div>
                                        <div class="col-lg-8">
                                            <label for="region" class="control-label">Monthly Amount:</label>
                                            <input type="text" class="form-control" name="apartment_amount" id="apartment_amount" required >

                                        </div>

                                    </div>



                                    <div class="form-group">
                                        <label for="my-element">
                                            Payment Date:
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-fw ti-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control float-right datepick" data-date-format="dd-mm-yyyy"  name="payment_date"   data-language="en" id="paymentdate">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
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
                                        <label for="region" class="control-label">Total Amount:</label>
                                        <input type="text" class="form-control" name="totalamount" id="totalamount"  >
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label"> Description:</label>
                                        <textarea type="text" class="form-control" name="description" required  >
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

                                <div class="col-md-6">

                                    <div class="row form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label float-right txt_media1">
                                                Payment Type :
                                            </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label class="checkbox-inline icheckbox">
                                                <input type="checkbox"  name="paymenttype[]" value="rent" id="rent"> Rent&nbsp;&nbsp;&nbsp;

                                            </label>
                                            <label class="checkbox-inline icheckbox">
                                                <input type="checkbox"  name="paymenttype[]" value="bill" id="bill"> Bill

                                            </label>

                                        </div>
                                    </div>

                                    <div id="rendiv"  style="display: none">

                                        <div class="form-group">
                                            <label for="region" class="control-label">Payment Period:</label>

                                            <select class="select2 form-control" id="rent_periods" name="rent_period">
                                                <option value=" ">Choose</option>

                                            </select>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-sm-9">
                                                <label for="my-element">
                                                    Start Date:
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-fw ti-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control float-right datepick"  name="start_date" data-date-format="yyyy-mm-dd"  data-language="en" id="start_date">
                                                </div>
                                            </div>
                                            <!-- /.input group -->

                                            <div class="col-sm-3">
                                                <div class=" form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-info " onclick="computeEndDate()">
                                                        Compute End Date
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class=" form-group">
                                            <label for="my-element">
                                                End Date:
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw ti-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control float-right"  name="end_date"   data-language="en" id="end_date" readonly>
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group">
                                            <label for="region" class="control-label">Expecting Rent Amount:</label>
                                            <input type="text" class="form-control" name="expectingrent_amount" id="expectingrent_amount" disabled >
                                        </div>

                                        <div class="form-group">
                                            <label for="region" class="control-label">Rent Amount:</label>
                                            <input type="text" class="form-control" name="rent_amount" id="rent_amount"  >
                                        </div>
                                    </div>
                                    <div id="billdiv" style="display: none">


                                        <div class="form-group">
                                            <label for="region" class="control-label">Bill Covered Date:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw ti-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control" name="bill_date" id="reportrange" placeholder="DD/MM/YYYY-DD/MM/YYYY">
                                            </div>


                                            <div class=" form-group">
                                                <button type="button" class="btn btn-info " onclick="getBill()">
                                                    Get Bill 
                                                </button>
                                            </div>
                                            <div class="form-group">
                                                <label for="region" class="control-label">Bill Accumulated over chosen period:</label>
                                                <input type="text" class="form-control" name="bill_amount_tobe_paid" id="bill_amount_tobe_paid"  readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="region" class="control-label">Bill Amount:</label>
                                                <input type="text" class="form-control" name="bill_amount" id="bill_amount"  >
                                            </div>
                                        </div>
                                    </div>


                                    <div id="surplusdiv"  style="display: none">
                                        <div class="form-group">
                                            <label for="region" class="control-label">Remaining(Surplus) Amount:</label>
                                            <input type="text" class="form-control" name="remaining_amount" id="remaining_amount"  >
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-lg-6 "></div>
                                    <div class="col-lg-6 ">
                                        <button type="submit" class="btn btn-primary btn-lg">Save</button>
                                    </div>
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
        <div class="modal fade " id="editModal"role="dialog" >
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


                                                    function computeEndDate() {

                                                        var startdate = $('#start_date').val();
                                                        var periods = $('#rent_periods').val();
                                                        var apartment_amount = $('#apartment_amount').val();
                                                        var expected_rent = periods * apartment_amount;
                                                        var tenant = $('#tenants').val();


                                                        if (startdate == "" && periods == "") {
                                                            alert('startdate and rent periods should be empty');
                                                        } else {

                                                            $.when(validateRent(startdate, tenant)).done(function (response) {

                                                                if (response == 1) {
                                                                    swal("Info!", "Rent payments has already been paid for the selected date", "info");

                                                                } else {
                                                                    $.ajax({
                                                                        url: "../computedate/" + periods + "/" + startdate,
                                                                        type: "GET",
                                                                        success: function (data) {
                                                                            console.log('dj' + data);
                                                                            $('#end_date').val(data);
                                                                            $('#expectingrent_amount').val(expected_rent);
                                                                        }
                                                                    });
                                                                }
                                                            });
//        console.log('here');
//
                                                        }

                                                    }
                                                    $('.datepick').datepicker({
                                                        format: 'dd-mm-yyyy'
                                                    });
//Date range as a button
                                                    $('#reportrange').daterangepicker({
                                                        autoUpdateInput: false,
                                                        locale: {
                                                            cancelLabel: 'Clear'
                                                        },
                                                        ranges: {
                                                            'Today': [moment(), moment()],
                                                            'Yesterday': [moment().subtract('days', 1), moment()],
                                                            'Last 7 Days': [moment().subtract('days', 6), moment()],
                                                            'Last 30 Days': [moment().subtract('days', 29), moment()],
                                                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                                                            'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                                                        },
                                                        drops: "up"
                                                    },
                                                            function (start, end) {
                                                                $('#reportrange').find('span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                                                            });
                                                    $('#reportrange').on('show.daterangepicker', function (ev, picker) {
                                                        $(this).val("");
                                                    }).on('apply.daterangepicker', function (ev, picker) {
                                                        $(this).val(picker.startDate.format('DD-MM-YYYY') + ' to ' + picker.endDate.format('DD-MM-YYYY'));
                                                    }).on('cancel.daterangepicker', function (ev, picker) {
                                                        $(this).val('');
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

                                                    getServices();
                                                    getTenants();
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
                                                            url: "../tenant/rent/" + id,
                                                            type: "GET",
                                                            dataType: 'json',
                                                            success: function (data) {
                                                                $('#apartment_name').val(data[0].apartment_name);
                                                                $('#apartment_type').val(data[0].apartment_type);
                                                                $('#currency').val(data[0].currency);
                                                                $('#apartment_amount').val(data[0].amount);
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
                                                                $('#upamount_paid').val(data['info'][0].currency+' '+data['info'][0].amount);
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