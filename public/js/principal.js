/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {



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

//professional_body

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

    $.ajax({
        url: '../../configurations/getdepartments',
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#department').append($('<option>', {
                    value: item.code + '-' + item.name,
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


        $('#dateofbirth').datepicker({
        dateFormat: 'yyyy-mm-dd'

    });

    $('#appointment_date').datepicker({
        dateFormat: 'yyyy-mm-dd'
    });
    $('#startdate').datepicker({
         dateFormat: 'yyyy-mm-dd'
    });

    $('#enddate').datepicker({
        dateFormat: 'yyyy-mm-dd'
    });

    $(".select2").select2({
        theme: "bootstrap"
    });



   $("#staffForm").bootstrapValidator({
        fields: {
            firstname: {
                validators: {
                    notEmpty: {
                        message: 'firstname is required'
                    }
                },
                required: true,
                minlength: 3
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    regexp: {
                        regexp: /^\S+@\S{1,}\.\S{1,}$/,
                        message: 'Please enter valid email format'
                    }
                }
            },
            lastname: {
                validators: {
                    notEmpty: {
                        message: 'lastname is required '
                    }
                }
            },
            nationality: {
                validators: {
                    notEmpty: {
                        message: 'nationality is required '
                    }
                }
            }, highest_qualification: {
                validators: {
                    notEmpty: {
                        message: 'highest_qualification is required '
                    }
                }
            }, qualification: {
                validators: {
                    notEmpty: {
                        message: 'qualification is required '
                    }
                }
            },
            department: {
                validators: {
                    notEmpty: {
                        message: 'Please select your department.'
                    }
                }
            },
            institute_code: {
                validators: {
                    notEmpty: {
                        message: 'Please select your institution.'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'Please select your gender.'
                    }
                }
            },
            grade: {
                validators: {
                    notEmpty: {
                        message: 'Please select your grade.'
                    }
                }
            },
            current_grade: {
                validators: {
                    notEmpty: {
                        message: 'Please select your current grade.'
                    }
                }
            }
        }
    });




    $('#acceptTerms').on('ifChanged', function (event) {
        $('#staffForm').bootstrapValidator('revalidateField', $('#acceptTerms'));
    });
    $('#rootwizard').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'onNext': function (tab, navigation, index) {
            var $validator = $('#staffForm').data('bootstrapValidator').validate();
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
//                var $validator = $('#staffForm').data('bootstrapValidator').validate();
//                return $validator.isValid();
//
//            });



        }


    });

    $('.finish').click(function () {

        var $validator = $('#staffForm').data('bootstrapValidator').validate();
        if ($validator.isValid()) {

            swal({
                title: "Confirm",
                text: "Are you sure you want to submit staff information?",
                type: "info",
                showCancelButton: true
            }).then(
                    function (result) {
                        console.log('send');
                        var formData = $("#staffForm").serialize();

                        console.log('data: ' + formData);
                        console.log('send data to server');
                        $.ajax({
                            url: '../savestaffinfo',
                            type: "POST",
                            data: formData,
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                                if (data.success == 1) {
                                    swal("Error", data.message, "danger");


                                } else if (data.success == 0) {
                                    swal({
                                        title: "Success",
                                        text: "Principal Information Saved Successfully",
                                        type: "success",
                                        showCancelButton: false,
                                        confirmButtonText: "OK",
                                        closeOnConfirm: false
                                    }).then(
                                    function () {
                                        window.location = "../../configurations/institutions";
                                    });

                                }
                            },
                            error: function (jXHR, textStatus, errorThrown) {
                                  swal("Error!", "Couldnt save:Contact System Administrator", "error");

                            }
                        });

                    }, function (dismiss) {
                console.log('cancel');
                // dismiss can be 'cancel', 'overlay', 'esc' or 'timer'
            }
            );
//            swal({
//                title: "Confirm",
//                text: "Are you sure you want to submit staff information?",
//                type: "info",
//                showCancelButton: true,
//                showLoaderOnConfirm: true
//            }.then(function () {
//                var formData = $("#staffForm").serialize();
//
//                console.log('data: ' + formData);
//                console.log('send data to server');
//
//
//            }));

        }
    });



//                    $('#myModal').modal('show');
//                   
//                    root_wizard.find("a[href='#tab1']").tab('show');
    // }



    $('#myModal').on('hide.bs.modal', function (e) {
        location.reload();
    });

});
