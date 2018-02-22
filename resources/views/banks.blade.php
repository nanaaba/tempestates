
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

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ti-layout-grid3"></i> Banks 
                        </h3>

                    </div>
                    <div class="card-body">
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
                                        <select class="form-control select2" name="account_type"   required style="width: 100%">
                                            <option value="">Select --</option>
                                            <option value="Savings">Savings</option>
                                            <option value="Current">Current</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="region" class="control-label"> Currency:</label>
                                        <select class="form-control select2" name="currency" required style="width: 100%">
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
                    <div class="modal-body">
                        <form id="updateForm">
                            <div class="row">
                                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />
                                <input type="hidden" id="code" name="code"/>
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label for="region" class="control-label">Bank  Name:</label>
                                        <input type="text" class="form-control" name="bank_name" id="bank_name"  required>
                                    </div>
                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="region" class="control-label"> Account Number:</label>
                                        <input type="text" class="form-control" name="account_number" id="account_number"  required>
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
                                        <input type="text" class="form-control" name="branch" id="branch"  required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="region" class="control-label">Location:</label>
                                        <input type="text" class="form-control" name="location" id="location"  required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="region" class="control-label">Relationship Officer:</label>
                                        <input type="text" class="form-control" name="relationship_officer" id="relationship_officer" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="region" class="control-label">Relationship Contact:</label>
                                        <input type="text" class="form-control" name="relationship_contact" id="relationship_contact"  required>
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

      
        <div class="background-overlay"></div>
    </section>
    <!-- /.content -->
</aside>


@endsection 

@section('userjs')

<script src="{{ asset('vendors/toastr/js/toastr.min.js')}}"></script>
<script src="{{ asset('js/banks.js')}}" type="text/javascript"></script>

@endsection