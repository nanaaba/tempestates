
@extends('layouts.master')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Estates
        </h1>
        <ol class="breadcrumb">


            <li class="active">
                Estates
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="">
            <div class="right_aligned" style="margin-bottom: 15px;">
                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#districtModal">
                    Add Estate
                </button>
            </div>
        </div>

        
             <div class="row">
            <div class="col-lg-12">

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ti-layout-grid3"></i> Estates 
                        </h3>

                    </div>
                    <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="districtTbl">
                                <thead>
                                    <tr>
                                        <th>
                                            Name
                                        </th>

                                          <th>
                                            Location
                                        </th>

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
                        <h4 class="modal-title">New Estate</h4>
                    </div>
                    <form role="form" id="saveEstateForm">
                        <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />


                        <div class="modal-body">

                            <div class="row form-group ">
                                <div class="col-sm-3 float-sm-right">
                                    <label  class="form-control-label">Estate Name</label>
                                </div>
                                <div class="col-sm-9">
                                    <input  name="name" type="text" class="form-control" required/>

                                </div>
                            </div>

                            <div class="row form-group ">
                                <div class="col-sm-3 float-sm-right">
                                    <label  class="form-control-label">Location</label>
                                </div>
                                <div class="col-sm-9">
                                    <input  name="location" type="text" class="form-control" required/>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Submit</button>


                        </div>
                    </form>
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
                    <form id="updateEstateForm" >
                        <div class="modal-body">
                            <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                            <div class="form-group">
                                <label for="region" class="control-label">Name:</label>
                                <input type="text" class="form-control" name="name" id="estatename" required>
                            </div>
                            
                             <div class="form-group">
                                <label for="region" class="control-label">Location:</label>
                                <input type="text" class="form-control" name="location" id="location" required>
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

     
        <div class="background-overlay"></div>
    </section>
    <!-- /.content -->
</aside>


@endsection 

@section('userjs')
<script src="{{ asset('vendors/toastr/js/toastr.min.js')}}"></script>

<script src="{{ asset('js/estate.js')}}" type="text/javascript"></script>

@endsection