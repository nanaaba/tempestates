
@extends('layouts.master')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Reports
        </h1>
        <ol class="breadcrumb">


            <li class="active">
                payments report            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">



        <div class="row">
            <div class="col-lg-12">

                <div class="card ">

                    <div class="card-header">
                        <h3>Payments
                            Report </h3>
                    </div>

                    <div class="card-body">
                        <form id="billsForm">
                            <div class="row">
                                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />


                                <div class="row col-lg-12">
                                    <div class="col-lg-6">
                                        <div class="form-group ">
                                            <label for="region" class="control-label">Tenant Name:</label>
                                            <select class="form-control select2" name="tenant" id="tenants"  required style="width: 100%">
                                                <option value="">Select --</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                       <div class="form-group ">
                                        <label>Date range:</label>

                                        <div class="input-group input-daterange" data-provide="datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
                                            <input class="form-control float-right datepick"  data-date-format="dd-mm-yyyy"  name="start_date"   data-language="en" id="start_date"  type="text">

                                            <span class="input-group-addon">to</span>
                                            <input class="form-control float-right datepick"  data-date-format="dd-mm-yyyy"  name="end_date"   data-language="en" id="end_date"  type="text">
                                        </div>
                                        <!-- /.input group -->
                                    </div>

                                    </div>


                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-lg-6 "></div>
                                <div class="col-lg-6 ">
                                    <button type="submit" class="btn btn-primary btn-block">Search</button>
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
                            <i class="ti-layout-grid3"></i> Payments 
                        </h3>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTable" id="reportTbl">
                                <thead>
                                    <tr>
                                        <th>
                                            Payment Date
                                        </th>

                                        <th>
                                            Mode
                                        </th>
                                        <th>
                                             Description
                                        </th>
                                        <th>Amount</th>


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




        

        <div class="background-overlay"></div>
    </section>
    <!-- /.content -->
</aside>


@endsection 

@section('userjs')

<script type="text/javascript">
  $('.datepick').datepicker({
        format: 'dd-mm-yyyy'
    });
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


        $('#billsForm').on('submit', function (e) {
            e.preventDefault();
            // var validator = $("#saveRegionForm").validate();
            var formData = $(this).serialize();
            $('#loaderModal').modal('show');

            $('input:submit').attr("disabled", true);
            $.ajax({
                url: "{{url('banking/paymentswithinperiod')}}",
                type: "POST",
                data: formData,
                success: function (data) {
                    console.log(data);
                    var total = 0;
                    if (data.length == 0) {
                        console.log("NO DATA!");
                        $('#loaderModal').modal('hide');
                        new PNotify({
                            title: 'No Data',
                            text: "No bills for tenant within date range",
                            type: 'info'
                        });

                        console.log(data);
                        datatable.clear().draw();

                    } else {
                        $('#loaderModal').modal('hide');

                        $.each(data, function (key, value) {

                            var j = -1;
                            var r = new Array();
                            // represent columns as array
                            r[++j] = '<td class="subject">' + value.payment_date + '</td>';
                            r[++j] = '<td class="subject">' + value.mode + '</td>';
                            r[++j] = '<td class="subject">' + value.description + '</td>';
                            r[++j] = '<td class="subject">' + value.amount + '</td>';


                            rowNode = datatable.row.add(r);
                        });

                        rowNode.draw().node();
                    }

                },
                error: function (jXHR, textStatus, errorThrown) {
                    $('input:submit').removeAttr("disabled");
                    swal("Error!", "Contact System Administrator ", "error");
                }
            });




        });

    }




    function getTenantInfo(id) {


        $.ajax({
            url: "../tenants/" + id,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                $('#tenant_name').html(data[0].name);
                $('#contact').html(data[0].contactno);
                $('#email').html(data[0].email_address);
                $('#apartment_name').html(data[0].apartment_name);
                $('#apartment_type').html(data[0].apartment_type);

            }
//up_facilities
        });
    }

</script>

@endsection