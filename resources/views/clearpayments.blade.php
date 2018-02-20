
@extends('layouts.master')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            UnCleared Cash/Cheque Payments Form
        </h1>
        <ol class="breadcrumb">


            <li class="active">
                UnCleared Cash/Cheque Payments Form
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
                            <i class="ti-layout-grid3"></i>UnCleared Payments
                        </h3>

                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="paymentsTbl">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="select_all" value="1" id="payment-select-all"></th>

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

        <div class="row" style="margin-bottom: 5px;">
            <div class="col-xs-12">
                <div class="col-md-10 ">

                </div>
                <div class="col-md-2 ">
                    <button type="button" class="btn btn-primary" id="proceedpaymentsbtn">Proceed</button>
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

        <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Update </h4>
                    </div>
                    <form id="paymentsForm" >
                        <div class="modal-body">
                            <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                            <div class="form-group">
                                <label for="region" class="control-label">Bank Name:</label>
                                <select class="select2 form-control" id="banks" name="bank" style="width: 100%" required>
                                    <option value="">Select --</option>

                                </select>

                            </div>

                            <div class="form-group">
                                <label for="region" class="control-label">Deposited By:</label>
                                <input type="text" class="form-control" name="depositedby" required >
                            </div>
                            <div class="form-group">
                                <label for="region" class="control-label"> Amount To be Cleared:</label>
                                <input type="text" class="form-control" name="clearedamount" id="clearedamount" readonly >
                            </div>
                            <div class="form-group">
                                <label for="region" class="control-label">Total Amount:</label>
                                <input type="text" class="form-control" name="totalmount" id="totalmount"  required>
                            </div>
                            <input type="hidden" class="form-control" name="inflows"  id="inflows"  >

                            <div class="form-group">
                                <label for="region" class="control-label">Payment Date:</label>
                                <input type="date" class="form-control" name="paymentdate"   required>
                            </div>




                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
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


$('#paymentsForm').on('submit', function (e) {
    e.preventDefault();

    var paymentform = $(this).serialize();
//        var ids = $("[name='ids[]']:checked").map(function () {
//            return $(this).val();
//        }).get();
    console.log('paymentsdata' + paymentform);

    var amount_entered = $('#totalmount').val();
    var amount_tobecleared = $('#clearedamount').val();
    if (amount_entered != amount_tobecleared) {
        swal("Error!", "Amount should be the same", "error");

    } else {
        $('#loaderModal').modal('show');

        $.ajax({
            url: "{{url('clearpayments')}}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#loaderModal').modal('hide');

                console.log('banks' + data);
                swal("Success", data, "success");

            }

        });
    }



});

var datatable = $('#paymentsTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    'columnDefs': [{
            'targets': 0,
            'searchable': false,
            'orderable': false,
            'className': 'dt-body-center'

        }],
    order: [[0, "asc"]]
});



$('#payment-select-all').on('click', function () {
    // Get all rows with search applied
    var rows = datatable.rows({'search': 'applied'}).nodes();
    // Check/uncheck checkboxes for all rows in the table
    $('input[type="checkbox"]', rows).prop('checked', this.checked);
});

// Handle click on checkbox to set state of "Select all" control
$('#paymentsTbl tbody').on('change', 'input[type="checkbox"]', function () {
    // If checkbox is not checked
    if (!this.checked) {
        var el = $('#payment-select-alll').get(0);
        // If "Select all" control is checked and has 'indeterminate' property
        if (el && el.checked && ('indeterminate' in el)) {
            // Set visual state of "Select all" control
            // as 'indeterminate'
            el.indeterminate = true;
        }
    }
});

$('#proceedpaymentsbtn').click(function () {

    var amounttobecleared = 0;
    $("[name='ids[]']:checked").each(function () {
        // do stuff
        amounttobecleared = amounttobecleared + $(this).data("amount");
    });

    var ids = $("[name='ids[]']:checked").map(function () {
        return $(this).val();
    }).get();

    var amountobepaid = $("[name='ids[]']:checked").map(function () {
        return $(this).data("amount");
    }).get();

    if (ids.length == 0) {
        //  alert('Select at least one paymnets to be cleared');
        swal('Error', "Select at least one paymnets to be cleared", 'error');

    } else {
        console.log('total amount: ' + amounttobecleared);
        console.log(ids);
        $('#clearedamount').val(amounttobecleared);
        $('#inflows').val(ids);
        $('#newModal').modal('show');
    }


});



getPayments();
function getPayments()
{

    $.ajax({
        url: 'getunclearedpayments',
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
                    r[++j] = '<td><input type="checkbox" name="ids[]" value="' + value.id + '" data-amount="' + value.amount + '"/></td>';
                    r[++j] = '<td class="subject">' + value.title + ' ' + value.name + '</td>';
                    r[++j] = '<td class="subject">' + value.description + '</td>';
                    r[++j] = '<td class="subject">' + value.amount + '</td>';
                    r[++j] = '<td class="subject">' + value.mode + '</td>';
                    r[++j] = '<td class="subject">' + value.payment_date + '</td>';


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

getBanks();
function getBanks() {


    $.ajax({
        url: "{{url('banks/all')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {
            console.log('banks' + data);
            $.each(data, function (i, item) {

                $('#banks').append($('<option>', {
                    value: item.id + '-' + item.bank_name + '-' + item.account_no,
                    text: item.bank_name + '-' + item.account_no
                }));
            });
        }

    });
}



</script>

@endsection