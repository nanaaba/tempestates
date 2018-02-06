
$('.select2').select2();
//regionDistrictTbl

var datatable = $('#regionDistrictTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    order: [[0, "asc"]]
});

//retreive regions
$.ajax({
    url: 'getregions',
    type: "GET",
    dataType: 'json',
    success: function (data) {


        $.each(data, function (i, item) {

            $('#region').append($('<option>', {
                value: item.code,
                text: item.name
            }));
        });

    }
});

//retreive unassigned districts
getUnAssignedDistricts();

function getUnAssignedDistricts() {

    $.ajax({
        url: 'getunassigneddistricts',
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#districts').append($('<option>', {
                    value: item.code,
                    text: item.name
                }));
            });

        }
    });
}

$('#saveRegionDistrictsForm').on('submit', function (e) {
    e.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
        url: 'regiondistrict',
        type: "POST",
        data: formData,
        success: function (data) {
            console.log('response from server :' + data);


            $('#regionDistrictsModal').modal('hide');

            document.getElementById("saveRegionDistrictsForm").reset();


            if (data == 0) {
                swal("Success!", "Information Saved Successfully", "success");
                $('#districts').select2("val", "");
                $('#districts').select2();

                $('#districts').html("");

                $('#region').select2("destroy");
                $('#region').select2("");
                getRegionDistricts();
                getUnAssignedDistricts();
            } else {
                swal("Error!", "Error in Saving Data", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });




});


getRegionDistricts();

function getRegionDistricts()
{



    $.ajax({
        url: 'regiondistrict',
        type: "GET",
        datType: "json",
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
                    r[++j] = '<td>' + value.region_name + '</td>';
                    r[++j] = '<td>' + value.district_name + '</td>';
                    r[++j] = '<td><button onclick="deleteRegionDistrict(\'' + value.id + '\')" class="btn btn-outline-danger btn-sm" type="button">Delete</button></td>';

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


function deleteRegionDistrict(code) {
    console.log(code);
    $('#code').val(code);

    $('#confirmModal').modal('show');
}

$('#deleteRegionDistrictForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var code = $('#code').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'regiondistrict/' + code,
        type: "DELETE",
        data: {_token: token},
        success: function (data) {
            $('#loaderModal').modal('hide');

            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');

            document.getElementById("deleteRegionDistrictForm").reset();

            if (data == 0) {

                swal("Success!", "Deleted Successfully", "success");

                getUnAssignedDistricts();

                getRegionDistricts();
            } else {
                swal("Error!", "Couldnt Delete", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });

});

