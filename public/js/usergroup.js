

//save regio
$('.select2').select2();


//retreive regions

var datatable = $('#usergroupTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    order: [[0, "asc"]]
});

getUserGroups();

function getUserGroups()
{

    $.ajax({
        url: 'getusergroups',
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
                    r[++j] = '<td>' + value.name + '</td>';
                    r[++j] = '<td><button onclick="editUserGroup(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-info btn-sm editBtn" type="button">Edit</button></td>';
                    r[++j] = '<td><button onclick="deleteUserGroup(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-danger btn-sm deleteBtn" type="button">Delete</button></td>';

                    rowNode = datatable.row.add(r);
                });

                rowNode.draw().node();
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
                swal("Error!", "Error in retreiving data:Contact Administrator", "error");
     
        }
    });


}








$('#saveUserGroupForm').on('submit', function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    console.log(formData);

    $("#loaderModal").modal('show');
    $('input:submit').attr("disabled", true);

    $.ajax({
        url: 'usergroup',
        type: "POST",
        data: formData,
        success: function (data) {
            $('input:submit').attr("disabled", false);
            console.log('rerereer' + data);
            $("#loaderModal").modal('hide');
            $('#userModal').modal('hide');
            document.getElementById("saveUserGroupForm").reset();

            if (data == 0) {
                swal("Success!", "Saved Successfully", "success");
                getUserGroups();
            } else {
                swal("Error!", "Couldnt SAve", "error");
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
        swal("Error!", "Couldnt save:Duplicate entry,usergroup already exist", "error");

        }
    });




});


function editUserGroup(id, name) {
    //alert('goood');
    $('#usergroupid').val(id);
    $('#name').val(name);
    $('#editModal').modal('show');
}


function deleteUserGroup(code, title) {
    console.log(code + title);
    $('#code').val(code);

    $('#nameholder').html(title);
    $('#confirmModal').modal('show');
}


$('#deleteUserGroupForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var code = $('#code').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'usergroup/' + code,
        type: "DELETE",
        data: {_token: token},
        success: function (data) {
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');

            document.getElementById("deleteUserGroupForm").reset();

            if (data == 0) {
                swal("Success!", "Deleted Successfully", "success");
                getUserGroups();
            } else {
                swal("Error!", "Couldnt Delete", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
           swal("Error!", "Couldnt Delete", "error");
        }
    });

});


$('#updateUserGroupForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var formData = $(this).serialize();
    console.log(formData);
    $('#editModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'usergroup',
        type: "PUT",
        data: formData,
        success: function (data) {
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');
           
            if (data == 0) {
                swal("Success!", "Updated Successfully", "success");
                getUserGroups();
            } else {
                swal("Error!", "Couldnt Update", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
              swal("Error!", "Couldnt Update", "error");
        }
    });

});
