
@extends('layouts.master')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Apartments
        </h1>
        <ol class="breadcrumb">


            <li class="active">
                Apartments
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="">
            <div class="right_aligned" style="margin-bottom: 15px;">
                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#newModal">
                    Add Apartment
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="panel ">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="ti-layout-grid3"></i> Apartment
                        </h3>

                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="districtTbl">
                                <thead>
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Type
                                        </th>
                                        <th>
                                            Monthly Charge
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

        <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">New Apartment</h4>
                    </div>
                    <form id="saveApartmentForm" class="form-horizontal" role="form">
                        <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                        <div class="modal-body">


                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Apartment Name</label>

                                <input type="text" class="form-control" name="name" id="institution_name" >

                            </div>

                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Apartment Type</label>

                                <select id="type" name="type" class="form-control select2" style="width:100%">
                                    <option value="">Choose..</option>
                                    <option value="Single Bedroom">Single Bedroom </option>
                                    <option value="Two Bedroom ">Two Bedroom </option>
                                    <option value="Three Bedroom">Three Bedroom </option>
                                    <option value="Four Bedroom">Four Bedroom </option>

                                </select>
                            </div>
                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Estate</label>

                                <select id="estates" name="estate" class="form-control select2" style="width:100%">
                                    <option value="">Choose..</option>
                                </select>
                            </div>

                            <div class="form-group row col-md-12 ">

                                <div class="form-group row col-md-3 ">
                                    <label  class=" control-label">Currency</label>

                                    <select  name="currency" class="form-control select2" style="width:100%">
                                        <option value="">Choose..</option>
                                        <option value="USD">USD</option>
                                        <option value="GHS">GHS</option>
                                    </select>
                                </div>
                                <div class="form-group row col-md-1 "></div>

                                <div class="form-group row col-md-8 ">
                                    <label  class=" control-label">Monthly Charge</label>

                                    <input type="text" class="form-control" name="monthly_charge"  >
                                </div>
                            </div>


                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Apartment Facilities</label>

                                <select id="facilities" name="facilities[]" class="form-control multiselect select2" multiple style="width:100%">
                                    <option value="">Choose..</option>
                                </select>
                            </div>






                        </div>
                        <div class="modal-footer">
                            <div class="pull-right">
                                <input type="submit" name="submit" class="btn btn-info"  value="Save"/>


                            </div>

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
                    <form id="updateApartmentForm" >
                         <div class="modal-body">


                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Apartment Name</label>

                                <input type="text" class="form-control" name="name" id="institution_name" >

                            </div>

                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Apartment Type</label>

                                <select id="type" name="type" class="form-control select2" style="width:100%">
                                    <option value="">Choose..</option>
                                    <option value="Single Bedroom">Single Bedroom </option>
                                    <option value="Two Bedroom ">Two Bedroom </option>
                                    <option value="Three Bedroom">Three Bedroom </option>
                                    <option value="Four Bedroom">Four Bedroom </option>

                                </select>
                            </div>
                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Estate</label>

                                <select id="estates" name="estate" class="form-control select2" style="width:100%">
                                    <option value="">Choose..</option>
                                </select>
                            </div>

                            <div class="form-group row col-md-12 ">

                                <div class="form-group row col-md-3 ">
                                    <label  class=" control-label">Currency</label>

                                    <select  name="currency" class="form-control select2" style="width:100%">
                                        <option value="">Choose..</option>
                                        <option value="USD">USD</option>
                                        <option value="GHS">GHS</option>
                                    </select>
                                </div>
                                <div class="form-group row col-md-1 "></div>

                                <div class="form-group row col-md-8 ">
                                    <label  class=" control-label">Monthly Charge</label>

                                    <input type="text" class="form-control" name="monthly_charge"  >
                                </div>
                            </div>


                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Apartment Facilities</label>

                                <select id="facilities" name="facilities[]" class="form-control multiselect select2" multiple style="width:100%">
                                    <option value="">Choose..</option>
                                </select>
                            </div>






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
                    <form method="post" id="deleteApartmentForm">
                        <div class="modal-body">
                            <div>
                                <p>
                                    Are you sure you want to delete this apartment?.<span class="holder" id="districtholder"></span> 
                                </p>
                            </div>
                            <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                            <input type="hidden" id="apartmentcode" name="apartmentcode"/>


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

<script type="text/javascript">
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

getFacilities();
getEstates();

//save region


$('#saveApartmentForm').on('submit', function (e) {
    e.preventDefault();
    // var validator = $("#saveRegionForm").validate();
    var formData = $(this).serialize();

    $('input:submit').attr("disabled", true);
    $.ajax({
        url: "{{url('apartment')}}",
        type: "POST",
        data: formData,
        success: function (data) {
            console.log(data);
            $('#newModal').modal('hide');
            $('input:submit').removeAttr("disabled");

            document.getElementById("saveApartmentForm").reset();
            if (data == 0) {
                swal("Success!", "Apartment Added", "success");
                getApartments();
            } else if (data == 1) {
                swal("Error!", "Couldnt add apartments", "error");
            } else {
                swal("Error!", data, "error");

            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            $('input:submit').removeAttr("disabled");
            swal("Error!", "Contact System Administrator ", "error");
        }
    });




});

//retreive regions

var datatable = $('#districtTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    order: [[0, "asc"]]
});

getApartments();

function getApartments()
{

    $.ajax({
        url: "{{url('apartment/all')}}",
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
                    r[++j] = '<td class="subject">' + value.name + '</td>';
                    r[++j] = '<td class="subject">' + value.type  + '</td>';
                    r[++j] = '<td class="subject">' + value.currency +' ' +value.monthly_charge + '</td>';

                    r[++j] = '<td><button onclick="editDistrict(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-info btn-sm editBtn" type="button">Edit</button>\n\
                              <button onclick="deleteDistrict(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-danger btn-sm deleteBtn" type="button">Delete</button></td>';

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



function deleteDistrict(code, title) {
    console.log(code + title);
    $('#districtcode').val(code);
    $('#districtholder').html(title);
    $('#confirmModal').modal('show');
}

$('#deleteApartmentForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var apartment_code = $('#apartmentcode').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: '../apartment/' + apartment_code,
        type: "DELETE",
        data: {_token: token},
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');

            document.getElementById("deleteApartmentForm").reset();
            if (data == 0) {
                swal("Success!", "Deleted Successfully", "success");
                getApartments();
            } else {
                swal("Error!", "Couldnt Update", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            $('#loaderModal').modal('hide');

            alert(errorThrown);
        }
    });

});


function editDistrict(code, name) {
    console.log('goood');
    $('#code').val(code);
    $('#apartmentname').val(name);
    $('#editModal').modal('show');
}

$('#updateApartmentForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var formData = $(this).serialize();
    console.log(formData);
    $('#editModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'apartment',
        type: "PUT",
        data: formData,
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');


            if (data == 0) {
                swal("Success!", "Information Updated Successfully", "success");
                getApartments();
            } else {
                swal("Error!", "Couldnt Update", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });

});

function getFacilities() {


    $.ajax({
        url: "{{url('facility/all')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {

            $.each(data, function (i, item) {

                $('#facilities').append($('<option>', {
                    value: item.id,
                    text: item.name
                }));
            });
        }

    });
}


function getEstates() {


    $.ajax({
        url: "{{url('estates/all')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {

            $.each(data, function (i, item) {

                $('#estates').append($('<option>', {
                    value: item.id,
                    text: item.name
                }));
            });
        }

    });
}

</script>

@endsection