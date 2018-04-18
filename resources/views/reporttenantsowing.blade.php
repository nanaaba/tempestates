
@extends('layouts.datepickerform')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Reports
        </h1>
        <ol class="breadcrumb">


            <li class="active">
                owing tenants report            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">



        <div class="row">
            <div class="col-lg-12">

                <div class="card ">

                    <div class="card-header">
                        <h3>Owing
                            Tenants </h3>
                    </div>

                    <div class="card-body">
                        <form id="billsForm">
                            <div class="row">
                                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />


                                <div class="row col-lg-12">
                                    <div class="col-lg-6">
                                        <div class="form-group ">
                                            <label for="region" class="control-label">Payments Type:</label>
                                            <select class="form-control select2" name="payment_type" id="payment_type"  required style="width: 100%">
                                                <option value="">Select --</option>
                                                <option value="rent">Rent</option>
                                                <option value="bill">Bill</option>

                                            </select>
                                        </div>
                                    </div>





                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-lg-6 "></div>
                                <div class="col-lg-6 ">
                                    <button type="button" id="searchbtn" class="btn btn-primary btn-block">Search</button>
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
                            <i class="ti-layout-grid3"></i> Owing Tenants 
                        </h3>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTable" id="reportTbl">
                                <thead>
                                    <tr>
                                        <th>
                                            Tenant Name
                                        </th>

                                        <th>
                                            Apartment
                                        </th>
                                        <th>
                                            Contact No
                                        </th>
                                        <th>Total Amount</th>
                                        <th>Amount Paid</th>
                                        <th>Amount Owing</th>


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

        <div class="background-overlay"></div>
    </section>
    <!-- /.content -->
</aside>


@endsection 

@section('userjs')

<script type="text/javascript">

    var datatable = $('#reportTbl').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'print']
    });

    datatable.buttons().container()
            .appendTo('#reportTbl_wrapper .col-md-6:eq(0)');


    PNotify.prototype.options.styling = "bootstrap3";
    PNotify.prototype.options.styling = "jqueryui";
    PNotify.prototype.options.styling = "fontawesome";

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



    }



    $('#searchbtn').click(function () {
        var payment_type = $('#payment_type').val();

        if (payment_type == "bill") {
            getBills();
        } else {
            getRents();
        }
    });

    function getBills()
    {

        $.ajax({
            url: "{{url('reports/billowingtenant')}}",
            type: "GET",
            dataType: "json",
            success: function (data) {

                console.log(data);
                datatable.clear().draw();


                if (data.length == 0) {
                    console.log("NO DATA!");
                } else {
                    $.each(data, function (key, value) {
                    
                    var amount_owing =  value.total_amount - value.amount_paid ;

                        var j = -1;
                        var r = new Array();
                        // represent columns as array
                        r[++j] = '<td class="subject">' + value.tenant_name + '</td>';
                        r[++j] = '<td class="subject">' + value.apartment_name + '</td>';
                        r[++j] = '<td class="subject">' + value.contactno + '</td>';
                        r[++j] = '<td class="subject">' + value.total_amount + '</td>';
                        r[++j] = '<td class="subject">' + value.amount_paid + '</td>';
                        r[++j] = '<td class="subject">' +amount_owing+ '</td>';

                        
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

    function getRents()
    {

        $.ajax({
            url: "{{url('reports/rentowingtenant')}}",
            type: "GET",
            dataType: "json",
            success: function (data) {

                console.log(data);
                datatable.clear().draw();


                if (data.length == 0) {
                    console.log("NO DATA!");
                } else {
                    $.each(data, function (key, value) {
                    var amount_owing =  value.total_amount - value.amount_paid ;
var currency = value.currency;

                        var j = -1;
                        var r = new Array();
                        // represent columns as array
                         r[++j] = '<td class="subject">' + value.tenant_name + '</td>';
                        r[++j] = '<td class="subject">' + value.apartment_name + '</td>';
                        r[++j] = '<td class="subject">' + value.contactno + '</td>';
                        r[++j] = '<td class="subject">' + value.total_amount + '('+currency+')</td>';
                        r[++j] = '<td class="subject">' + value.amount_paid + '('+currency+')</td>';
                        r[++j] = '<td class="subject">' + amount_owing + '('+currency+')</td>';

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



</script>

@endsection