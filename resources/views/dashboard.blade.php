
@extends('layouts.master')

@section('content')



<aside class="right-side">

    <section class="content-header">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-5 col-xs-8">
                <div class="header-element">
                    <h3>
                        <small>Dashboard</small>
                    </h3>
                </div>
            </div>

        </div>
    </section>
    <section class="content">


        <div class="row">
            <div class="col-sm-6 col-md-6 col-xl-3">
                <div class="flip">
                    <div class="widget-bg-color-icon card-box front">
                        <div class="bg-icon float-left">
                            <i class="ti-user text-warning"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b>{{$totaltenants}}</b></h3>
                            <p>Tenants</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-xl-3">
                <div class="flip">
                    <div class="widget-bg-color-icon card-box front">
                        <div class="bg-icon float-left">
                            <i class="ti-home text-success"></i>
                        </div>
                        <div class="text-right">
                            <h3><b id="widget_count3">{{$totalapartments}}</b></h3>
                            <p>Available Apartments</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-xl-3">
                <div class="flip">
                    <div class="widget-bg-color-icon card-box front">
                        <div class="bg-icon float-left">
                            <i class="ti-alarm-clock text-danger"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b>0</b></h3>
                            <p>Today Birthdays</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-xl-3">
                <div class="flip">
                    <div class="widget-bg-color-icon card-box front">
                        <div class="bg-icon float-left">
                            <i class="ti-receipt text-info"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b>{{$totalexpiringrent}}</b></h3>
                            <p>Expiring Rent</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ti-layout-grid3"></i> Rent Expiring 3 months from now 
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
                                            Apartment Name
                                        </th>
                                        <th>
                                            Apartment Type
                                        </th>
                                        <th>
                                            Monthly Amount
                                        </th>
                                        <th>Rent Period</th>
                                        <th>Start Date</th>
                                        <th>Expiring Date</th>


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
        
        
         <div class="row">
            <div class="col-lg-12">

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ti-layout-grid3"></i> Bill Owing Tenants 
                        </h3>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTable" id="billTbl">
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


        <div class="background-overlay"></div>
    </section>
    <!-- /.content --> </aside>
@endsection
@section('userjs')
<script src="{{asset('vendors/chartjs/js/Chart.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom_js/chartjs-charts.js')}}"></script>


<script type="text/javascript">

var datatable = $('#reportTbl').DataTable({
    lengthChange: false,
    buttons: ['copy', 'excel', 'pdf', 'print']
});

var billdatatable = $('#billTbl').DataTable({
    lengthChange: false,
    buttons: ['copy', 'excel', 'pdf', 'print']
});

datatable.buttons().container()
        .appendTo('#reportTbl_wrapper .col-md-6:eq(0)');



billdatatable.buttons().container()
        .appendTo('#billTbl_wrapper .col-md-6:eq(0)');


getRents();

function getRents()
{

    $.ajax({
        url: "{{url('getexpiringrents')}}",
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
                    r[++j] = '<td class="subject">' + value.apartment_name + '</td>';
                    r[++j] = '<td class="subject">' + value.apartment_type + '</td>';
                    r[++j] = '<td class="subject">' + value.currency + ' ' + value.amount + '</td>';
                    r[++j] = '<td class="subject">' + value.period + ' months </td>';
                    r[++j] = '<td class="subject">' + value.start_date + ' </td>';
                    r[++j] = '<td class="subject"><span class="badge badge-danger">' + value.end_date + '</span> </td>';


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
getBills();

    function getBills()
    {

        $.ajax({
            url: "{{url('reports/billowingtenant')}}",
            type: "GET",
            dataType: "json",
            success: function (data) {

                console.log(data);
                billdatatable.clear().draw();


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

                        
                        rowNode = billdatatable.row.add(r);
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

