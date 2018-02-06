/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$('.select2').select2();

$.ajax({
    url: 'getusergroups',
    type: "GET",
    dataType: 'json',
    success: function (data) {


        $.each(data, function (i, item) {

            $('#usergroups').append($('<option>', {
                value: item.id,
                text: item.name
            }));
        });

    }
});

getPermissions();
function getPermissions()
{

    $.ajax({
        url: 'permissions',
        type: "GET",
        dataType: "json",
        success: function (data) {

            console.log(data);


            if (data.length == 0) {
                console.log("NO DATA!");
            } else {
                var trHTML;
                $.each(data, function (key, value) {


                    var j = -1;
                    var r = new Array();
                    // represent columns as array
                    trHTML += '<tr><td>' + value.id + '</td>' +
                            '<td>' + value.description + '</td>' +
                            '<td><input type="checkbox" name="permissions[]" value="' + value.perm_keyword + '"/></td></tr>';

                });
                $('tbody').append(trHTML);

            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown + " " + textStatus + " New Error: " + jXHR);
        }
    });
}

$('#assign_all').click(function () {

    $('tbody tr td input[type="checkbox"]').each(function () {
        $(this).prop('checked', true);
    });

});


$("#usergroups").change(function () {

    $('input:checkbox').prop('checked', false);
    var userGroup = this.value;
    getGroupPermissions(userGroup);
});

function getGroupPermissions(usegroup) {

    $.ajax({
        url: 'retreivepermissions/' + usegroup,
        type: "GET",
        dataType: "json",
        success: function (data) {

            console.log('responseis ' + data);


            if (data.length != 0) {
                $('#saveBtn').attr('Update');


                $.each(data, function (counter, val) {
                    console.log('perm code is:' + val.perm_keyword);
                    $("input[value='" + val.perm_keyword + "']").prop('checked', true);
                });

            } else {

//                    $("#assignuserbtn").prop('value', 'Update');

            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });

}



$('#assignPermissionsForm').on('submit', function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    console.log(formData);

    $('#loaderModal').modal('show');

    $.ajax({
        url: 'assigngrouproles',
        type: "POST",
        data: formData,
        success: function (data) {

            console.log('server data :' + data);
            $('#loaderModal').modal('hide');
            if (data == 0) {
                swal("Success!", "Permissions Assigned Successfully", "success");
               
            } else {
                swal("Error!", "Couldnt Assign Permissions", "error");
            }


        }
    });


////function refreshPage() { location.reload(); }
////    // console.log(JSON.stringify(jsonObj));


});

//assign permissions to usergroup



