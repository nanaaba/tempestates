
@extends('layouts.master')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Banks
        </h1>
        <ol class="breadcrumb">


            <li class="active">
                Banks
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="">
            <div class="right_aligned" style="margin-bottom: 15px;">
                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#districtModal">
                    Add Bank
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="panel ">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="ti-layout-grid3"></i> Bank
                        </h3>

                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="bankTbl">
                                <thead>
                                    <tr>
                                        <th>Bank  </th>
                                        <th>Currency  </th>
                                        <th>Account Number</th>
                                        <th>Account Type</th>
                                        <th>Branch</th>
                                        <th>Relationship Officer </th>
                                        <th>Date Created </th>

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
        <div id="districtModal" class="modal fade animated" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">New Bank</h4>
                    </div>
                    <div class="modal-body">
                        <form id="saveBankForm">
                            <div class="row">
                                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label for="region" class="control-label">Bank  Name:</label>
                                        <input type="text" class="form-control" name="bank_name"  required>
                                    </div>
                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="region" class="control-label"> Account Number:</label>
                                        <input type="text" class="form-control" name="account_number"  required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label for="region" class="control-label">Account Type:</label>
                                        <select class="form-control select2" name="account_type" id="account_type"  required style="width: 100%">
                                            <option value="">Select --</option>
                                            <option value="Savings">Savings</option>
                                            <option value="Current">Current</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="region" class="control-label"> Currency:</label>
                                        <select class="form-control select2" name="currency" id="currency"  required style="width: 100%">
                                            <option value="">Select --</option>
                                            <option value="GHS">GHS</option>
                                            <option value="USD">USD</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="region" class="control-label">Branch:</label>
                                        <input type="text" class="form-control" name="branch"  required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="region" class="control-label">Location:</label>
                                        <input type="text" class="form-control" name="location"  required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="region" class="control-label">Relationship Officer:</label>
                                        <input type="text" class="form-control" name="relationship_officer"  required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="region" class="control-label">Relationship Contact:</label>
                                        <input type="text" class="form-control" name="relationship_contact"  required>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="row">
                                <div class="col-md-12 pull-right">
                                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Update </h4>
                    </div>
                    <form id="updateBankForm" >
                        <div class="modal-body">
                            <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                            <div class="form-group">
                                <label for="region" class="control-label">Name:</label>
                                <input type="text" class="form-control" name="name" id="estatename" required>
                            </div>

                            <input type="hidden" class="form-control" name="code" id="code">


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" id="deleteBankForm">
                        <div class="modal-body">
                            <div>
                                <p>
                                    Are you sure you want to delete this estate?.<span class="holder" id="districtholder"></span> 
                                </p>
                            </div>
                            <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                            <input type="hidden" id="estatecode" name="estatecode"/>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            <button type="submit"  class="btn btn-primary">YES</button>
                        </div>
                    </form>
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