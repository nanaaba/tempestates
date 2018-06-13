
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
                rents report            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">



   <div class="row">
            <div class="col-lg-12">

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ti-layout-grid3"></i> Expired Rents 
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
                                                        <th>Expired Date</th>


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

    var datatable = $('#reportTbl').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'print']
    });

    datatable.buttons().container()
            .appendTo('#reportTbl_wrapper .col-md-6:eq(0)');


    PNotify.prototype.options.styling = "bootstrap3";
    PNotify.prototype.options.styling = "jqueryui";
    PNotify.prototype.options.styling = "fontawesome";



    getRents();

    function getRents()
    {

        $.ajax({
            url: "{{url('getexpiredrents')}}",
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

</script>

@endsection