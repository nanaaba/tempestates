/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var datatable = $('#bankTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    order: [[0, "asc"]]
});


$('#saveBankForm').on('submit', function (e) {
    e.preventDefault();
    // var validator = $("#saveRegionForm").validate();
    var formData = $(this).serialize();
    $('#loaderModal').modal('show');

    $('input:submit').attr("disabled", true);
    $.ajax({
        url: 'savebank',
        type: "POST",
        data: formData,
        success: function (data) {
            console.log(data);
            $('#districtModal').modal('hide');
            $('#loaderModal').modal('hide');

            document.getElementById("saveBankForm").reset();
            if (data == 0) {
                swal("Success!", "Bank Added", "success");
                getBanks();
            } else if (data == 1) {
                swal("Error!", "Couldnt add bank", "error");
            } else {
                swal("Error!", data, "error");

            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            swal("Error!", "Contact System Administrator ", "error");
        }
    });




});

getBanks();
function getBanks()
{

    $.ajax({
        url: '../banks/all',
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
                    r[++j] = '<td class="subject">' + value.bank_name + '</td>';
                    r[++j] = '<td class="subject">' + value.currency + '</td>';
                    r[++j] = '<td class="subject">' + value.account_no + '</td>';
                    r[++j] = '<td class="subject">' + value.account_type + '</td>';
                    r[++j] = '<td class="subject">' + value.branch + '</td>';
                    r[++j] = '<td class="subject">' + value.relationship_officer + '</td>';
                    r[++j] = '<td class="subject">' + value.datecreated + '</td>';

                    r[++j] = '<td><button onclick="editType(\'' + value.id + '\')"  class="btn btn-outline-info btn-sm editBtn" type="button">Edit</button>\n\
                              <button onclick="deleteType(\'' + value.id + '\',\'' + value.bank_name + '\')"  class="btn btn-outline-danger btn-sm deleteBtn" type="button">Delete</button></td>';

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




function editType(code) {
    console.log('goood');
    $('#code').val(code);
    getInfo(code);
    $('#editModal').modal('show');

}

function getInfo(id) {


    $.ajax({
        url: id,
        type: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data[0].name);
            $('#bank_name').val(data[0].bank_name);
            $('#account_number').val(data[0].account_no);
            $('#account_type').val(data[0].account_type).change();
            $('#currency').val(data[0].currency).change();
            $('#branch').val(data[0].branch);
            $('#location').val(data[0].location);
            $('#relationship_officer').val(data[0].relationship_officer);
            $('#relationship_contact').val(data[0].relationship_contact);

            $('#code').val(id);

        },
        error: function (jXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });

}



$('#updateForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var formData = $(this).serialize();
    console.log(formData);
    $('#editModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'updatebank',
        type: "PUT",
        data: formData,
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');


            if (data == 0) {
                swal("Success!", "Information Updated Successfully", "success");
                getBanks();
            } else {
                swal("Error!", "Couldnt Update", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });

});





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
        url: code,
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
                getBanks();
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
