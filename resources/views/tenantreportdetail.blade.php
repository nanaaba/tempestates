
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
        <?php
        $info = json_decode($information, true);
        $profilepic = $info[0]['profile_pic'];
        $rent = json_decode($rent, true);
        $payment = json_decode($payment, true);
        $current_rent = json_decode($current_rent, true);
        ?>

        <button type="button"
                class="btn btn-responsive button-alignment btn-primary mb-3"
                data-toggle="button">
            <span style="color:#fff;" onclick='printContent("invoicediv");'>
                <i class="fa fa-fw ti-printer"></i>
                Print Page
            </span>
        </button>
        <div id="invoicediv">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ti-layout-grid3"></i> Tenant Details 
                            </h3>

                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-9 col-sm-9 col-9 col-lg-9 col-xl-9 invoice_bg ">

<!--                                <h4><strong>Billing Details:</strong></h4>-->

                                    <address>
                                        <strong>Name:</strong>  <?php echo $info[0]['name'] ?>
                                        <br/>  <br/> <strong>Current Resident:</strong> <?php echo $info[0]['current_resident'] ?>
                                        <br/>   <br/> <strong>Nationality:</strong>  <?php echo $info[0]['nationality'] ?>
                                        <br/>   <br/> <strong>Phone:</strong><?php echo $info[0]['contactno'] ?>
                                        <br/>    <br/> <strong>Mail Id:</strong><?php echo $info[0]['email_address'] ?>
                                    </address>

                                    <span></span>
                                </div>
                                <div class="col-md-3 col-sm-3 col-3 col-lg-3 col-xl-3 invoice_bg text-right">
                                    <div class="float-right">

                                        <img src="<?php echo imgasset("storage/app/$profilepic") ?>" width="150" height="150" alt="profile pic holder">

                                    </div>
                                </div>
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
                                <i class="ti-layout-grid3"></i> Rent History 
                            </h3>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTable" id="rentTbl">
                                    <thead>
                                        <tr>


                                            <th>
                                                Apartment Name
                                            </th>
                                            <th>
                                                Apartment Type
                                            </th>
                                            <th>Rent Period</th>
                                            <th>
                                                Monthly Amount
                                            </th>
                                            <th>
                                                Total Amount
                                            </th>

                                            <th>Start Date</th>
                                            <th>End Date</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        foreach ($rent as $value) {

                                            echo'<tr>'
                                            . '<td>' . $value['apartment_name'] . '</td>'
                                            . '<td>' . $value['apartment_type'] . '</td>'
                                            . '<td>' . $value['period'] . '</td>'
                                            . '<td>' . $value['amount'] . '</td>'
                                            . '<td>' . $value['total_amount'] . '</td>'
                                            . '<td>' . $value['start_date'] . '</td>'
                                            . '<td>' . $value['end_date'] . '</td>'
                                            . '</tr>';
                                            $total += $value['total_amount'];
                                        }
                                        echo '<tr>'
                                        . '<td>' . $current_rent[0]['apartment_name'] . '</td>'
                                        . '<td>' . $current_rent[0]['apartment_type'] . '</td>'
                                        . '<td>' . $current_rent[0]['period'] . '</td>'
                                        . '<td>' . $current_rent[0]['amount'] . '</td>'
                                        . '<td>' . $current_rent[0]['amount'] * $current_rent[0]['period'] . '</td>'
                                        . '<td>' . $current_rent[0]['start_date'] . '</td>'
                                        . '<td>' . $current_rent[0]['end_date'] . '</td>'
                                        . '</tr>';
                                        $total = $total + ($current_rent[0]['amount'] * $current_rent[0]['period']);
                                        ?>

                                    </tbody>
                                </table>

                                <h4 class="text-center">   <strong>Total Rent Cost is GHS {{$total}}</strong></h4>
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
                                <i class="ti-layout-grid3"></i> Payment History 
                            </h3>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTable" id="paymentTbl">
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
                                            <th>
                                                Amount
                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $ptotal = 0;
                                        foreach ($payment as $value) {

                                            echo'<tr>'
                                            . '<td>' . $value['payment_date'] . '</td>'
                                            . '<td>' . $value['mode'] . '</td>'
                                            . '<td>' . $value['description'] . '</td>'
                                            . '<td>' . $value['amount'] . '</td>'
                                            . '</tr>';
                                            $ptotal += $value['amount'];
                                        }
                                        ?>

                                    </tbody>
                                </table>
                                <h4 class="text-center">   <strong>Total Payments Made is GHS {{$ptotal}}</strong></h4>

                            </div>



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

    var datatable = $('#rentTbl').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'print']
    });

    datatable.buttons().container()
            .appendTo('#rentTbl_wrapper .col-md-6:eq(0)');



    var pdatatable = $('#paymentTbl').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'print']
    });

    pdatatable.buttons().container()
            .appendTo('#paymentTbl_wrapper .col-md-6:eq(0)');

    function printContent(el) {
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
    }
    function printDiv()
    {
        $("invoicediv").printElement();

    }
</script>

@endsection