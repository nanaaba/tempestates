
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
                    <form id="saveApartmentForm" role="form">
                        <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                        <div class="modal-body">




                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Apartment Name</label>

                                <input type="text" class="form-control" name="name" id="institution_name" >

                            </div>
                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Estate</label>

                                <select  name="estate" class="form-control select2 estates" style="width:100%">
                                    <option value="">Choose..</option>
                                </select>
                            </div>

                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Apartment Type</label>

                                <select  name="type" class="form-control select2 apartmenttypes" style="width:100%">
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

                            <input type="submit" name="submit" class="btn btn-info"  value="Save"/>




                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title"> <span id="aprtname"></span> Apartment Information</h4>
                    </div>
                    <form id="saveApartmentForm" role="form">
                        <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                        <div class="modal-body">




                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Apartment Name</label>

                                <input type="text" class="form-control" name="name" id="apartment_name" >

                            </div>
                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Estate</label>

                                <select id="up_estate" name="estate" class="form-control select2 estates" style="width:100%">
                                    <option value="">Choose..</option>
                                </select>
                            </div>

                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Apartment Type</label>

                                <select  name="type" id="up_apartmenttype" class="form-control select2 apartmenttypes" style="width:100%">
                                    <option value="">Choose..</option>

                                </select>
                            </div>

                            <div class="form-group row col-md-12 ">

                                <div class="form-group row col-md-3 ">
                                    <label  class=" control-label">Currency</label>

                                    <select  name="currency" id="up_currency" class="form-control select2" style="width:100%">
                                        <option value="">Choose..</option>
                                        <option value="USD">USD</option>
                                        <option value="GHS">GHS</option>
                                    </select>
                                </div>
                                <div class="form-group row col-md-1 "></div>

                                <div class="form-group row col-md-8 ">
                                    <label  class=" control-label">Monthly Charge</label>

                                    <input type="text" class="form-control" id="up_monthlycharge" name="monthly_charge"  >
                                </div>
                            </div>


                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Apartment Facilities</label>

                                <select id="up_facilities" name="facilities[]" class="facilities form-control multiselect select2" multiple style="width:100%">
                                    <option value="">Choose..</option>
                                </select>
                            </div>





                        </div>
                        <div class="modal-footer">

                            <input type="submit" name="submit" class="btn btn-info"  value="Save"/>




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
                    r[++j] = '<td class="subject">' + value.type + '</td>';
                    r[++j] = '<td class="subject">' + value.currency + ' ' + value.monthly_charge + '</td>';

                    r[++j] = '<td><button onclick="editType(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-info btn-sm editBtn" type="button">Edit</button>\n\
                              <button onclick="deleteType(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-danger btn-sm deleteBtn" type="button">Delete</button></td>';

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




function editType(code, name) {
    console.log('goood');
    $('#code').val(code);
    $('#apartmentname').val(name);
    getApartmentInfo(code);
        $('#editModal').modal('show');

}

function getApartmentInfo(id) {


    $.ajax({
        url: 'apartment/' + id,
        type: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data[0].name);
            $('#aprtname').hmtl(data[0].name);
            $('#apartment_name').val(data[0].name);
            $('#up_apartmenttype').val(data[0].type).change();
            $('#up_currency').val(data[0].currency);
            $('#up_monthlycharge').val(data[0].monthly_charge);
            $('#up_estate').val(data[0].estate_id);

        },
        error: function (jXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });

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

                $('.estates').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });
        }

    });
}




function deleteType(code, title) {
    console.log(code + title);
    $('#code').val(code);
    $('#holdername').html(title);
    $('#confirmModal').modal('show');
}

$('#deleteForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var code = $('#code').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'apartment/' + code,
        type: "DELETE",
        data: {_token: token},
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');

            document.getElementById("deleteForm").reset();
            if (data == 0) {
                swal("Success!", "Deleted Successfully", "success");
                getApartments();
            } else {
                swal("Error!", "Couldnt delete", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            $('#loaderModal').modal('hide');

            alert(errorThrown);
        }
    });

});



</script>

@endsection