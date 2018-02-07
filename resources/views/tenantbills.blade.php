
@extends('layouts.datepickerform')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tenants Bill 

        </h1>
        <ol class="breadcrumb">


            <li class="active">
                Tenants Bill 
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
                            <i class="ti-layout-grid3"></i> Tenants Bill 
                        </h3>

                    </div>
                    <div class="panel-body">
                        <form id="billsForm">
                            <div class="row">
                                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />


                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="region" class="control-label">Tenant Name:</label>
                                            <select class="form-control select2" name="tenant" id="tenants"  required style="width: 100%">
                                                <option value="">Select --</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">

                                        <div class="form-group">
                                            <label for="region" class="control-label">Service Date:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw ti-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control float-right" id="date-range0" name="daterange" placeholder="YYYY-MM-DD to YYYY-MM-DD">
                                            </div>
                                        </div>
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



        <div class="row">
            <div class="col-lg-12">

                <div class="panel " id="invoicediv" style="display: none;">

                    <div class="panel-body">
                        <section class="content p-l-r-15" id="invoice-stmt">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fa fa-fw ti-credit-card"></i> Invoice
                                    </h3>

                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-6 col-sm-12 col-12 col-lg-6 col-xl-6 invoice_bg">
                                            <h4><strong>Billing Details:</strong></h4>
                                            <address>
                                                Lewis Doe
                                                <br/> 6889 Lunette Street
                                                <br/> Melbourne,Austria
                                                <br/> <strong>Phone:</strong>12-345-678
                                                <br/> <strong>Mail Id:</strong> Adelle_Champlin@yahoo.com
                                            </address>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-12 col-lg-6 col-xl-6 invoice_bg text-right">
                                            <div class="float-right">
                                                <h4><strong>#678956 / 25 Sep 2016</strong></h4>
                                                <h4><strong>Invoice Info:</strong></h4>
                                                <address>
                                                    Tom Percy
                                                    <br/> 3946 Penn Street
                                                    <br/> Ohio,USA
                                                    <br/> <strong>Phone:</strong> 32-666-756
                                                    <br/> <strong>Mail Id:</strong> Lucy_Maggio16@yahoo.com
                                                </address>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-condensed" id="customtable">
                                                <thead>
                                                    <tr class="bg-primary">
                                                        <th>
                                                            <strong>Description</strong>
                                                        </th>

                                                        <th></th>
                                                        <th class="text-right">
                                                            <strong>Amount</strong>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="invoiceTbl">


                                                </tbody>
                                                <tfoot>

                                                    <tr>
                                                        <td class="emptyrow">
                                                            <i class="livicon" data-name="barcode" data-size="60" data-loop="true"></i>
                                                        </td>

                                                        <td class="emptyrow text-right">
                                                            <strong>
                                                                Total: &nbsp;
                                                            </strong>
                                                        </td>
                                                        <td class="highrow text-right">
                                                            <strong contenteditable ><span id="totalbill"></span></strong>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h4><Strong>Terms and conditions:</Strong></h4>
                                        <ul class="terms_conditions">
                                            <li>An invoice must accompany products returned for warantty</li>
                                            <li>Balance due within 10 days of invoice date,1.5% interest/month thereafter.</li>
                                            <li>All goods returned for replacement/credit must be saleable condition with original
                                                packaging.
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-section">
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <span class="float-right">
                                                <!--                                        <button type="button"
                                                                                                class="btn btn-responsive button-alignment btn-success mb-3"
                                                                                                data-toggle="button">
                                                                                            <i class="fa fa-fw ti-money"></i> Pay Now
                                                                                        </button>-->
                                                <button type="button"
                                                        class="btn btn-responsive button-alignment btn-primary mb-3"
                                                        data-toggle="button">
                                                    <span style="color:#fff;" onclick='printDiv();'>
                                                        <i class="fa fa-fw ti-printer"></i>
                                                        Print
                                                    </span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="background-overlay"></div>
                        </section>
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

<script type="text/javascript">

    getTenants();
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


        $('#billsForm').on('submit', function (e) {
            e.preventDefault();
            // var validator = $("#saveRegionForm").validate();
            var formData = $(this).serialize();
            $('#loaderModal').modal('show');

            $('input:submit').attr("disabled", true);
            $.ajax({
                url: "{{url('retreivetenantbills')}}",
                type: "POST",
                data: formData,
                success: function (data) {
                    console.log(data);
                    var total = 0;
                    if (data.length == 0) {
                        console.log("NO DATA!");
                        $('#loaderModal').modal('hide');

                        swal("Success!", "No data", "info");

                    } else {
                        $.each(data, function (key, value) {
                            total = total + parseFloat(value.amount);
                            var row = ' <tr>' +
                                    '<td contenteditable>' +
                                    value.service_id +
                                    '</td>' +
                                    '<td></td>' +
                                    '<td class="text-right" contenteditable>GHS ' + value.amount + '</td>' +
                                    '</tr>';

                            $('#invoiceTbl').append(row);
                            $('#totalbill').html('GHS ' + total);
                            $('#loaderModal').modal('hide');
                            $('#invoicediv').show();
                        });
                    }
                },
                error: function (jXHR, textStatus, errorThrown) {
                    $('input:submit').removeAttr("disabled");
                    swal("Error!", "Contact System Administrator ", "error");
                }
            });




        });

    }

    function printDiv()
    {

        var divToPrint = document.getElementById('invoicediv');

        var newWin = window.open('', 'Print-Window');

        newWin.document.open();

        newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');

        newWin.document.close();

        setTimeout(function () {
            newWin.close();
        }, 10);

    }
</script>

@endsection