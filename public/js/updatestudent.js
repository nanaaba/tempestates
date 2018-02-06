/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
    url: '../../configurations/getinstitutions',
    type: "GET",
    dataType: 'json',
    success: function (data) {


        $.each(data, function (i, item) {

            $('#instituitions').append($('<option>', {
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

            $('#grade').append($('<option>', {
                value: item.code,
                text: item.name
            }));
        });

    }
});



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

$(".select2").select2({
    theme: "bootstrap"
});



function getDistrictsBasedOnRegion(region_code) {


    console.log(region_code);


    $.ajax({
        url: '../../configurations/getdistrictsonregioncode/' + region_code,
        type: "GET",
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $('#district').select2("destroy");
            $('#district').empty();

            $('#district').select2();
            $('#district').append('<option value = ""> Choose... </option>');


            $.each(data, function (i, item) {

                $('#district').append($('<option>', {
                    value: item.district_code,
                    text: item.district_name
                }));
            });


        }
    });
}



$("#region").change(function () {

    var region_code = this.value;
    console.log(region_code);

    getDistrictsBasedOnRegion(region_code);
});



$("#studentForm").bootstrapValidator({
    fields: {
//            firstname: {
//                validators: {
//                    notEmpty: {
//                        message: 'firstname is required'
//                    }
//                },
//                required: true,
//                minlength: 3
//            },
//            email: {
//                validators: {
//                    notEmpty: {
//                        message: 'The email address is required'
//                    },
//                    regexp: {
//                        regexp: /^\S+@\S{1,}\.\S{1,}$/,
//                        message: 'Please enter valid email format'
//                    }
//                }
//            },
//            lastname: {
//                validators: {
//                    notEmpty: {
//                        message: 'lastname is required '
//                    }
//                }
//            },
//            nationality: {
//                validators: {
//                    notEmpty: {
//                        message: 'nationality is required '
//                    }
//                }
//            }, staffno: {
//                validators: {
//                    notEmpty: {
//                        message: 'staffno is required '
//                    }
//                }
//            }, highest_qualification: {
//                validators: {
//                    notEmpty: {
//                        message: 'highest_qualification is required '
//                    }
//                }
//            }, qualification: {
//                validators: {
//                    notEmpty: {
//                        message: 'qualification is required '
//                    }
//               }
//            },
//            department: {
//                validators: {
//                    notEmpty: {
//                        message: 'Please select your department.'
//                    }
//                }
//            },
//            gender: {
//                validators: {
//                    notEmpty: {
//                        message: 'Please select your gender.'
//                    }
//                }
//            },
//            grade: {
//                validators: {
//                    notEmpty: {
//                        message: 'Please select your grade.'
//                    }
//                }
//            },
        acceptTerms: {
            validators: {
                notEmpty: {
                    message: 'The checkbox must be checked'
                }
            }
        }
    }
});




$('#acceptTerms').on('ifChanged', function (event) {
    $('#studentForm').bootstrapValidator('revalidateField', $('#acceptTerms'));
});
$('#rootwizard').bootstrapWizard({
    'tabClass': 'nav nav-pills',
    'onNext': function (tab, navigation, index) {
        var $validator = $('#studentForm').data('bootstrapValidator').validate();
        return $validator.isValid();
    },
    onTabClick: function (tab, navigation, index) {
        return false;
    },
    onTabShow: function (tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;
        var $percent = ($current / $total) * 100;

        // If it's the last tab then hide the last button and show the finish instead
        var root_wizard = $('#rootwizard');
        if ($current >= $total) {
            root_wizard.find('.pager .next').hide();
            root_wizard.find('.pager .finish').show();
            root_wizard.find('.pager .finish').removeClass('disabled');
        } else {
            root_wizard.find('.pager .next').show();
            root_wizard.find('.pager .finish').hide();
        }
//            root_wizard.find('.finish').click(function () {
//                var $validator = $('#studentForm').data('bootstrapValidator').validate();
//                return $validator.isValid();
//
//            });



    }


});

$('.finish').click(function () {

    var $validator = $('#studentForm').data('bootstrapValidator').validate();
    if ($validator.isValid()) {

        swal({
            title: "Confirm",
            text: "Are you sure you want to submit student information?",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }).then(function () {
            var formData = $("#studentForm").serialize();

            console.log('data: ' + formData);
            console.log('send data to server');

            //   $('#loaderModal').modal('show');

            $.ajax({
                url: 'savestudentinfo',
                type: "POST",
                data: formData,
                // dataType: "json",
                success: function (data) {
                    console.log(data);
                    $('#loaderModal').modal('hide');

                    if (data.success == 0) {
                        swal("Error", data.message, "danger");


                    } else {
                        console.log('here');
                        swal({
                            title: "Success",
                            text: "Student Information Saved Successfully",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonText: "OK",
                            closeOnConfirm: false
                        },
                        function () {
                            window.location = "students.php";
                        });
//                   
                    }
                },
                error: function (jXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });


        });





//                    $('#myModal').modal('show');
//                   
//                    root_wizard.find("a[href='#tab1']").tab('show');
    }

});

$('#myModal').on('hide.bs.modal', function (e) {
    location.reload();
});



$('#updateStudentInfo').on('submit', function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    console.log(formData);
    $('input:submit').attr("disabled", true);
    $("#loaderModal").modal('show');

    $.ajax({
        url: '../updatestudentinfo',
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
                    text: "Student Information Updated",
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
            $("#loaderModal").modal('hide');

            swal("Error!", "Contact System Administrator", "error");
            console.log(textStatus);
        }
    });


});

