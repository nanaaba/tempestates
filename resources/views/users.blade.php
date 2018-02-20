@extends('layouts.master')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="fa fa-fw ti-home"></i> Account
                </a>
            </li>

            <li class="active">
                Users
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!--        <div class="">
                    <div class="right_aligned" style="margin-bottom: 15px;">
                        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#districtModal">
                            Add Users
                        </button>
                    </div>
                </div>-->


        <div class="right_aligned" style="margin-bottom: 15px;">
            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#userModal">
                Add User
            </button>
        </div>


        <div class="row">
            <div class="col-lg-12">

                <div class="panel ">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="ti-layout-grid3"></i> Users
                        </h3>

                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="usersTbl">
                                <thead>
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>


                                        <th>
                                            Role
                                        </th>

                                        <th>
                                            Contactno
                                        </th>

                                        <th>
                                            Date Created
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
        <div id="userModal" class="modal fade animated" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">New User</h4>
                    </div>
                    <form id="saveUserForm" >
                        <div class="modal-body">
                            <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />


                            <div class="form-group">
                                <label for="region" class="control-label">Name:</label>
                                <input type="text" class="form-control" name="name"   required>
                            </div>

                            <div class="form-group">
                                <label for="region" class="control-label">Email:</label>
                                <input type="email" class="form-control" name="email"   required>
                            </div>
                            <div class="form-group">
                                <label for="region" class="control-label">Contactno:</label>
                                <input type="number" class="form-control"  name="contactno" maxlength="10"  minlength="10">
                            </div>


                            <div class="form-group">
                                <label  class="form-label">Role</label>
                                <select name="role"  class="form-control select2 " required style="width:100%">

                                    <option value="">Choose</option>
                                    <option value="Admin">Admin</option> 
                                    <option value="Normal User">Normal User</option>
                                </select>
                                <span class="help-block"></span>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edituserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel"> User Information</h4>
                    </div>
                    <form id="updateUserForm" >
                        <div class="modal-body">
                            <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />


                            <div class="form-group">
                                <label for="region" class="control-label">Name:</label>
                                <input type="text" class="form-control" name="name" id="username"  required>
                            </div>

                            <div class="form-group">
                                <label for="region" class="control-label">Email:</label>
                                <input type="email" class="form-control" name="email" id="upemail"  required>
                            </div>
                            <div class="form-group">
                                <label for="region" class="control-label">Contactno:</label>
                                <input type="number" class="form-control numbersOnly" id="upcontactno"  name="contactno" >
                            </div>

                            <div class="form-group">
                                <label  class="form-label">Role</label>
                                <select name="role" id="role"  class="form-control usergroups" required>

                                    <option value="">Choose</option>
                                    <option value="Admin">Admin</option> 
                                    <option value="Normal User">Normal User</option>
                                </select>
                                <span class="help-block"></span>
                            </div>

                            <input type="hidden" class="form-control" name="userid" id="upuserid" >

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
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/custom_js/datatables_custom.js')}}"></script>

<script src="{{ asset('js/users.js')}}" type="text/javascript"></script>

@endsection