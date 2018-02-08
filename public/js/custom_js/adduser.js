"use strict";

$(document).ready(function () {

    // bootstrap wizard//
    $(".select21").select2({
        theme: "bootstrap",
        placeholder: "",
        width: '100%'
    });
    $('input[type="checkbox"].custom-checkbox, input[type="radio"].custom-radio').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue',
        increaseArea: '20%'
    });
    $("#dob").datetimepicker({
        widgetPositioning: {
            vertical: 'bottom'
        },
        format: 'DD/MM/YYYY',
        useCurrent: false,
        maxDate: 'now'
    });

    $("#tenantForm").bootstrapValidator({
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'The first name is required'
                    }
                },
                required: true,
                minlength: 3
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'The last name is required'
                    }
                },
                required: true,
                minlength: 3
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password is required'
                    },
                    different: {
                        field: 'first_name,last_name',
                        message: 'Password should not match first or last name'
                    }
                }
            },
            password_confirm: {
                validators: {
                    notEmpty: {
                        message: 'Confirm Password is required'
                    },
                    identical: {
                        field: 'password'
                    },
                    different: {
                        field: 'first_name,last_name',
                        message: 'Confirm Password should match with password'
                    }
                }
            },
//            email: {
//                validators: {
//                    notEmpty: {
//                        message: 'The email address is required'
//                    },
//                    regexp: {
//                        regexp: /^\S+@\S{1,}\.\S{1,}$/,
//                        message: 'The input is not a valid email address'
//                    }
//                }
//            },
            bio: {
                validators: {
                    notEmpty: {
                        message: 'Bio is required and cannot be empty'
                    }
                },
                minlength: 20
            },

            gender: {
                validators: {
                    notEmpty: {
                        message: 'Please select a gender'
                    }
                }
            },
            activate: {
                validators: {
                    notEmpty: {
                        message: 'Please check the checkbox to activate'
                    }
                }
            },
            group: {
                validators: {
                    notEmpty: {
                        message: 'You must select a group'
                    }
                }
            }
        }
    });
//            .on('success.form.bv', function (e) {
//        // Prevent form submission
//        e.preventDefault();
//        // Get the form instance
//        var $form = $(e.target);
//        // Get the BootstrapValidator instance
//        var bv = $form.data('bootstrapValidator');
//        // Use Ajax to submit form data
//        var formData = new FormData($('tenantForm')[0]);
//        console.log('data :' + formData);
//
//
//        $.ajax({
//            url: "savetenant",
//            type: "POST",
//            data: formData,
//            cache: false,
//            contentType: false,
//            processData: false,
//            success: function (data) {
//                console.log('server data :' + data);
//                if (data == 0) {
//                    $('#tenantForm select').val('').trigger('change');
//
//                    document.getElementById("tenantForm").reset();
//
//                    swal("Success", "Information saved successfully", 'success');
//                   $('#pager_wizard').find("a[href='#tab1']").tab('show');
//                }
//                
//            }
//
//        });
//
//    });

    $('#activate').on('ifChanged', function (event) {
        $('#tenantForm').bootstrapValidator('revalidateField', $('#activate'));
    });

    $('#pager_wizard').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'onNext': function (tab, navigation, index) {
            var $validator = $('#tenantForm').data('bootstrapValidator').validate();
           

            
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
            var wizard = $('#pager_wizard');
            if ($current >= $total) {
                wizard.find('.pager .next').hide();
                wizard.find('.pager .finish').show();
                wizard.find('.pager .finish').removeClass('disabled');
            } else {
                wizard.find('.pager .next').show();
                wizard.find('.pager .finish').hide();
            }
            wizard.find('.finish').on('click', function () {
                var $validator = $('#tenantForm').data('bootstrapValidator').validate();
              
                    var formData = new FormData($('tenantForm')[0]);
                    console.log('data :' + formData);
                    console.log($("#tenantForm").serialize());

//                    $.ajax({
//                        url: "savetenant",
//                        type: "POST",
//                        data: formData,
//                        cache: false,
//                        contentType: false,
//                        processData: false,
//                        success: function (data) {
//                            console.log('server data :' + data);
////                            if (data == 0) {
////                                $('#tenantForm select').val('').trigger('change');
////
////                                document.getElementById("tenantForm").reset();
////
////                                swal("Success", "Information saved successfully", 'success');
////                              //  $('#pager_wizard').find("a[href='#tab1']").tab('show');
////                            }
//
//                        }
//
//                    });

                    $('#myModal').modal('show');
                    return $validator.isValid();
                    wizard.find("a[href='#tab1']").tab('show');
                
            });
////            
//            
            $('#myModal').on('hide.bs.modal', function (e) {
                location.reload();
            });

        }
    });

});