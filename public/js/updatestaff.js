/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$('#dateofbirth').datepicker({
    dateFormat: 'dd-mm-yyyy'

});

$('#appointment_date').datepicker({
    dateFormat: 'dd-mm-yyyy'
});
$('#startdate').datepicker({
    dateFormat: 'dd-mm-yyyy'
});

$('#enddate').datepicker({
    dateFormat: 'dd-mm-yyyy'
});

$('.select2').select2();
$.ajax({
    url: '../../configurations/getregions',
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
$.ajax({
    url: '../../configurations/getdepartments',
    type: "GET",
    dataType: 'json',
    success: function (data) {


        $.each(data, function (i, item) {

            $('#department').append($('<option>', {
                value: item.code,
                text: item.name
            }));
        });

    }
});

$.ajax({
    url: '../../configurations/getgradetypes',
    type: "GET",
    dataType: 'json',
    success: function (data) {


        $.each(data, function (i, item) {

            $('.grade').append($('<option>', {
                value: item.code,
                text: item.name
            }));
        });

    }
});

$.ajax({
    url: '../../configurations/getprofessionalbodies',
    type: "GET",
    dataType: 'json',
    success: function (data) {


        $.each(data, function (i, item) {

            $('#professional_body').append($('<option>', {
                value: item.code,
                text: item.name
            }));
        });

    }
});
//$('#region').val('REGsit2WNi1').attr("selected", "selected").trigger('change');



var region_selected = $('#regioncode').val();
console.log('region:' + region_selected);

$('#updateStaffInfo').on('submit', function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    console.log(formData);
    $('input:submit').attr("disabled", true);
    $("#loaderModal").modal('show');

    $.ajax({
        url: '../updatestaffinformation',
        type: "PUT",
        data: formData,
        success: function (data) {
            $('input:submit').attr("disabled", false);
            console.log('server response: ' + data);
            $("#loaderModal").modal('hide');

            var successStatus = data.success;
            console.log(successStatus);

            if (data == "1") {
                swal("Error!", "Couldnt Update", "error");
            } else {
                swal({
                    title: "Success",
                    text: "Staff Information Updated",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonText: "OK",
                }).then(
                        function () {
                            window.location = '../all';

                        });
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            //   swal("Error!", "Couldnt save:Instituition code already exist", "error");
            console.log(textStatus);
        }
    });


});

