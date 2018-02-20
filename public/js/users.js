var datatable = $('#usersTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    "order": [[4, "desc"]]


});
$('.select2').select2();

$('#saveUserForm').on('submit', function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    console.log(formData);
    $('input:submit').attr("disabled", true);

    $("#loaderModal").modal('show');
    $.ajax({
        url: 'saveuser',
        type: "POST",
        data: formData,
        dataType: "json",
        success: function (data) {
            $("#loaderModal").modal('hide');
            $("#userModal").modal('hide');
            $('input:submit').attr("disabled", false);
            console.log('server details:' + data);
            // $('.userdetails').html(data.userdetails);
            if (data.success == 0) {
                swal("Success!", "User Information Saved Successfully", "success");
                getUsers();
            } else {
                swal("Error!", data.message, "error");
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            $("#loaderModal").modal('hide')
            swal("Error!", "Contact Systen Administrator", "error");
        }
    });




});






getUsers();

function getUsers()
{

    $.ajax({
        url: 'getusers',
        type: "GET",
        dataType: "json",
        success: function (data) {
            // alert(data);
            console.log('new code here 2');
            console.log(data);
            datatable.clear().draw();

            if (data.length == 0) {
                console.log("NO DATA!");
            } else {
                $.each(data, function (key, value) {

                    var j = -1;
                    var r = new Array();
                    // represent columns as array
                    r[++j] = '<td >' + value.name + '</td>';
                    r[++j] = '<td>' + value.email + '</td>';
                    r[++j] = '<td>' + value.role + '</td>';
                    r[++j] = '<td>' + value.contactno + '</td>';

                    r[++j] = '<td>' + value.datecreated + '</td>';
                    r[++j] = '<td>\n\
<button onclick="editUser(\'' + value.id + '\')" class="btn btn-outline-info btn-sm editBtn"  type="button">Edit</button>\n\
\n\<button onclick="deleteUser(\'' + value.id + '\',\'' + value.name + '\')" class="btn btn-outline-danger btn-sm editBtn"  type="button">Delete</button>\n\
</td>';

                    rowNode = datatable.row.add(r);
                });

                rowNode.draw().node();
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            swal("Error!", "Contact Systen Administrator", "error");
        }
    });


}



function editUser(id) {


    $.ajax({
        url: 'user/' + id,
        type: "GET",
        //dataType: 'json',
        success: function (data) {
            $("#role  option[value='']").prop("selected", true);


            var name = data[0].name;
            var email = data[0].email;
            var role = data[0].role;
            var contactno = data[0].contactno;
            var id = data[0].id;
            $('#username').val(name);
            $('#upuserid').val(id);
            $('#upemail').val(email);
             $('#upcontactno').val(contactno);
            $("#role  option[value=" + role + "]").prop("selected", true);

            $('#edituserModal').modal('show');


        }
    });

}



$('#updateUserForm').on('submit', function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    console.log(formData);
    $('input:submit').attr("disabled", true);

    $.ajax({
        url: 'user',
        type: "PUT",
        data: formData,
        success: function (data) {
            $('input:submit').attr("disabled", false);
            console.log('server details:' + data);
            $('#edituserModal').modal('hide');

            if (data == 0) {
                swal("Success!", "Information Updated Successfully", "success");
                getUsers();
            } else {
                swal("Error!", "Couldnt Update", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            swal("Error!", "Contact Systen Administrator", "error");
        }
    });




});



function deleteUser(code, title) {



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
        url: 'deleteuser/' + code,
        type: "DELETE",
        data: {_token: token},
        success: function (data) {
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');
            if (data == 0) {
                swal("Success!", "User Deleted Successfully", "success");
                getUsers();
            } else {
                swal("Error!", "Couldnt Delete", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            swal("Error!", "Contact Systen Administrator", "error");
        }
    });

});

