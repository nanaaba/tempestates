
@extends('layouts.datepickerform')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Audit Trail
        </h1>
        <ol class="breadcrumb">


            <li class="active">
                audit  logs            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">



        <div class="row">
            <div class="col-lg-12">

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ti-layout-grid3"></i>Audit Logs
                        </h3>

                    </div>
                    <div class="card-body">
                        <?php
                        $logs = json_decode($logs, true);
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTable" id="reportTbl">
                                <thead>
                                    <tr>
                                        <th>
                                            User
                                        </th>

                                        <th>
                                            Activity
                                        </th>
                                        <th>
                                            Date
                                        </th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($logs as $value) {
                                        echo '<tr>'
                                        . '<td>'.$value['name'].'</td>'
                                        . '<td>'.$value['activity'].'</td>'
                                        . '<td>'.$value['activity_date'].'</td>'
                                        . '</tr>';
                                    }
                                    ?>

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




</script>

@endsection