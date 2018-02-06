/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



//save region


$('#saveProfessionalBodyForm').on('submit', function (e) {
    e.preventDefault();
    // var validator = $("#saveRegionForm").validate();
    var formData = $(this).serialize();

    $('input:submit').attr("disabled", true);
    $.ajax({
        url: 'saveprofessionalbody',
        type: "POST",
        data: formData,
        success: function (data) {
            console.log(data);
            $('#districtModal').modal('hide');

            document.getElementById("saveProfessionalBodyForm").reset();
            if (data == 0) {
                swal("Success!", "Professional Body Added", "success");
                getProfessionalBodies();
            } else {
                swal("Error!", "Couldnt add professional body", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
         swal("Error!", "Couldnt save district:Duplicate entry,name already exist ", "error");
        }
    });




});

//retreive regions

var datatable = $('#professionalbodyTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    order: [[0, "asc"]]
});

getProfessionalBodies();

function getProfessionalBodies()
{

    $.ajax({
        url: 'getprofessionalbodies',
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
                    r[++j] = '<td><button onclick="editProfessionalBody(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-info btn-sm editBtn" type="button">Edit</button>\n\
                              <button onclick="deleteProfessionalBody(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-danger btn-sm deleteBtn" type="button">Delete</button></td>';

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



function deleteProfessionalBody(code, title) {
    console.log(code + title);
    $('#districtcode').val(code);
    $('#districtholder').html(title);
    $('#confirmModal').modal('show');
}

$('#deleteProfessionalBodyForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var code = $('#code').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');
    console.log('delete');

    $.ajax({
        url: 'deleteprofessionalbody/'+ code,
        type: "DELETE",
        data: {_token: token},
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');

            document.getElementById("deleteProfessionalBodyForm").reset();
            if (data == 0) {
                swal("Success!", "Deleted Successfully", "success");
                getProfessionalBodies();
            } else {
                swal("Error!", "Couldnt Update", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });

});


function editProfessionalBody(code, name) {
    console.log('goood');
    $('#code').val(code);
    $('#professionalBody').val(name);
    $('#editModal').modal('show');
}

$('#updateProfessionalBodyForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var formData = $(this).serialize();
    console.log(formData);
    $('#editModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'professionalbody',
        type: "PUT",
        data: formData,
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');


            if (data == 0) {
                swal("Success!", "Information Updated Successfully", "success");
                getProfessionalBodies();
            } else {
                swal("Error!", "Couldnt Update", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });

});
