
@extends('layouts.datepickerform')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Change Password 

        </h1>
        <ol class="breadcrumb">



        </ol>
    </section>
    <!-- Main content -->
    <section class="content">



        <div class="row">
            <div class="col-lg-12">

                <div class="card ">

                    <div class="card-body">
                        <form id="updatePasswordForm">
                            <div class="row">
                                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />



                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="region" class="control-label">Password:</label>
                                        <input class="form-control" type="password" name="password" id="password"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="region" class="control-label"> Confirm Password:</label>
                                        <input class="form-control" type="password" name="cpassword" id="cpassword"/>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-lg-6 "></div>
                                <div class="col-lg-6 ">
                                    <button type="submit" class="btn btn-primary btn-block">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>





        <div class="background-overlay"></div>
    </section>
    <!-- /.content -->
</aside>


@endsection 

@section('userjs')

<script type="text/javascript">
    PNotify.prototype.options.styling = "bootstrap3";
    PNotify.prototype.options.styling = "jqueryui";
    PNotify.prototype.options.styling = "fontawesome";

    $('#updatePasswordForm').on('submit', function (e) {
        e.preventDefault();
        // var validator = $("#saveRegionForm").validate();
        var formData = $(this).serialize();
        $('#loaderModal').modal('show');

        var password = $('#password').val();
        var cpassword = $('#cpassword').val();
        if (password == cpassword) {

            $('input:submit').attr("disabled", true);
            $.ajax({
                url: "{{url('updatepassword')}}",
                type: "POST",
                data: formData,
                success: function (data) {
                    $('#loaderModal').modal('hide');

                    console.log(data);
                    var total = 0;
                    if (data == 0) {
                        new PNotify({
                            title: 'Success',
                            text: "Password updated successfully",
                            type: 'info'
                        });


                    } else {

                        new PNotify({
                            title: 'Error',
                            text: "Password wasnt updated ",
                            type: 'error'
                        });
                    }

                },
                error: function (jXHR, textStatus, errorThrown) {
                    $('input:submit').removeAttr("disabled");
                    swal("Error!", "Contact System Administrator ", "error");
                }
            });



        } else {
            
                                $('#loaderModal').modal('hide');

            new PNotify({
                title: 'Error',
                text: "Password do not match ",
                type: 'error'
            });
        }
    });

</script>

@endsection