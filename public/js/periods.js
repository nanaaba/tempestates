/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



//save region


$('#saveRentPeriodForm').on('submit', function (e) {
    e.preventDefault();
    // var validator = $("#saveRegionForm").validate();
    var formData = $(this).serialize();

    $('input:submit').attr("disabled", true);
    $.ajax({
        url: 'saveperiod',
        type: "POST",
        data: formData,
        success: function (data) {
            console.log(data);
            $('#districtModal').modal('hide');

            document.getElementById("saveRentPeriodForm").reset();
            if (data == 0) {
                swal("Success!", " Saved", "success");
                getRentPeriods();
            } else if (data == 1) {
                swal("Error!", "Couldnt save", "error");
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

var datatable = $('#periodsTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    order: [[0, "asc"]]
});

getRentPeriods();

function getRentPeriods()
{

    $.ajax({
        url: 'getrentperiods',
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


                    r[++j] = '<td> <button onclick="deleteDistrict(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-danger btn-sm deleteBtn" type="button">Delete</button></td>';

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



function deleteApartmentType(code, title) {
    console.log(code + title);
    $('#districtcode').val(code);
    $('#districtholder').html(title);
    $('#confirmModal').modal('show');
}

$('#deleteApartmentTypeForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var estate_code = $('#estatecode').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: '../estate/'+estate_code,
        type: "DELETE",
        data: {_token: token},
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');

            document.getElementById("deleteEstateForm").reset();
            if (data == 0) {
                swal("Success!", "Deleted Successfully", "success");
                getEstates();
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


