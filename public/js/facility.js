/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



//save region


$('#saveFacilityForm').on('submit', function (e) {
    e.preventDefault();
    // var validator = $("#saveRegionForm").validate();
    var formData = $(this).serialize();

    $('input:submit').attr("disabled", true);
    $.ajax({
        url: 'facility',
        type: "POST",
        data: formData,
        success: function (data) {
            console.log(data);
            $('#districtModal').modal('hide');

            document.getElementById("saveFacilityForm").reset();
            if (data == 0) {
                swal("Success!", "Facility Added", "success");
                getFacilitys();
            } else if (data == 1) {
                swal("Error!", "Couldnt add facility", "error");
            } else {
                swal("Error!", data, "error");

            }
        },
        error: function (jXHR, textStatus, errorThrown) {
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

getFacilitys();

function getFacilitys()
{

    $.ajax({
        url: 'facility/all',
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

$('#deleteFacilityForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var facility_code = $('#facilitycode').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: '../facility/'+facility_code,
        type: "DELETE",
        data: {_token: token},
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');

            document.getElementById("deleteFacilityForm").reset();
            if (data == 0) {
                swal("Success!", "Deleted Successfully", "success");
                getFacilitys();
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
    $('#facilityname').val(name);
    $('#editModal').modal('show');
}

$('#updateFacilityForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var formData = $(this).serialize();
    console.log(formData);
    $('#editModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'facility',
        type: "PUT",
        data: formData,
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');


            if (data == 0) {
                swal("Success!", "Information Updated Successfully", "success");
                getFacilitys();
            } else {
                swal("Error!", "Couldnt Update", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });

});
