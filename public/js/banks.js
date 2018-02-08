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

    $('input:submit').attr("disabled", true);
    $.ajax({
        url: 'savebank',
        type: "POST",
        data: formData,
        success: function (data) {
            console.log(data);
            $('#districtModal').modal('hide');

            document.getElementById("saveBankForm").reset();
            if (data == 0) {
                swal("Success!", "Estate Added", "success");
                getEstates();
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

                    r[++j] = '<td><button onclick="editDistrict(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-info btn-sm editBtn" type="button">Edit</button>\n\
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

