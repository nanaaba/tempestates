
@extends('layouts.master')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tenants Request Service Form
        </h1>
        <ol class="breadcrumb">


            <li class="active">
                Tenants Request Service Form
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
                            <i class="ti-layout-grid3"></i> Request Service Form
                        </h3>

                    </div>
                    <div class="panel-body">
                        <form id="saveBankForm">
                            <div class="row">
                                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />


                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="region" class="control-label">Tenant Name:</label>
                                        <select class="form-control select2" name="account_type" id="account_type"  required style="width: 100%">
                                            <option value="">Select --</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label">Apartment Name:</label>
                                        <input type="text" class="form-control" name="branch"  readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label">Apartment Type:</label>
                                        <input type="text" class="form-control" name="branch"  readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label">Service Date:</label>
                                        <input type="date" class="form-control" name="branch"  
                                               />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="region" class="control-label">Service Type:</label>
                                        <select class="form-control select2" name="account_type" id="account_type"  required style="width: 100%">
                                            <option value="">Select --</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label">Service Description:</label>
                                        <textarea type="text" class="form-control" name="branch"  >
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="region" class="control-label">Service Amount:</label>
                                        <input type="text" class="form-control" name="branch"  
                                               />
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
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/custom_js/datatables_custom.js')}}"></script>
<script src="{{ asset('vendors/toastr/js/toastr.min.js')}}"></script>

<script src="{{ asset('js/banks.js')}}" type="text/javascript"></script>

@endsection