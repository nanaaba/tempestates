/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$('#savePaymentsForm').on('submit', function (e) {
    e.preventDefault();

    var formData = new FormData($("#savePaymentsForm")[0]);
    console.log('data' + formData);
    $('#loaderModal').modal('show');
    $('input:submit').attr("disabled", true);
    var totalamount = $('#totalamount').val();
    var expectingrent_amount = $('#expectingrent_amount').val();
    var rent_amount = $('#rent_amount').val();
    var bill_amount_tobe_paid = $('#bill_amount_tobe_paid').val();
    var bill_amount = $('#bill_amount').val();


    //check if rent is checked

    var ifbillchecked = $('#bill').is(':checked');
    if (ifbillchecked == true) {
       if((bill_amount < bill_amount_tobe_paid)||(bill_amount > bill_amount_tobe_paid)){
           alert('Bill amount must be the same as accumulated bill over  period');
       }
    }

//    $.ajax({
//        url: "{{url('banking/saverentpayments')}}",
//        type: "POST",
//        data: formData,
//        dataType: "json",
//        cache: false,
//        contentType: false,
//        processData: false,
//        success: function (data) {
//            console.log(data);
//            $('#newModal').modal('hide');
//            $('input:submit').removeAttr("disabled");
//            $('#loaderModal').modal('hide');
//            document.getElementById("savePaymentsForm").reset();
//            if (data.success == 0) {
//                swal("Success!", data.message, "success");
//                getPayments();
//            } else if (data.success == 1) {
//                swal("Error!", data.message, "error");
//            } else {
//                swal("Error!", data.message, "error");
//            }
//        },
//        error: function (jXHR, textStatus, errorThrown) {
//            $('input:submit').removeAttr("disabled");
//            swal("Error!", "Contact System Administrator ", "error");
//        }
//    });
});


function computeEndDate() {

    var startdate = $('#start_date').val();
    var periods = $('#rent_periods').val();
    var apartment_amount = $('#apartment_amount').val();
    var expected_rent = periods * apartment_amount;
//                                                        /apartment_amount
    if (startdate == "" && periods == "") {
        alert('startdate and rent periods should be empty');
    } else {
        console.log('here');
        $.ajax({
            url: "../computedate/" + periods + "/" + startdate,
            type: "GET",
            success: function (data) {
                console.log('dj' + data);
                $('#end_date').val(data);
                $('#expectingrent_amount').val(expected_rent);
            }
        });
    }

}
$('.datepick').datepicker({
    format: 'dd-mm-yyyy'
});
//Date range as a button
$('#reportrange').daterangepicker({
    autoUpdateInput: false,
    locale: {
        cancelLabel: 'Clear'
    },
    ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract('days', 1), moment()],
        'Last 7 Days': [moment().subtract('days', 6), moment()],
        'Last 30 Days': [moment().subtract('days', 29), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
    },
    drops: "up"
},
        function (start, end) {
            $('#reportrange').find('span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        });
$('#reportrange').on('show.daterangepicker', function (ev, picker) {
    $(this).val("");
}).on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('DD-MM-YYYY') + ' to ' + picker.endDate.format('DD-MM-YYYY'));
}).on('cancel.daterangepicker', function (ev, picker) {
    $(this).val('');
});
var datatable = $('#paymentsTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    order: [[0, "asc"]]
});
getPayments();
function getPayments()
{

    $.ajax({
        url: 'payments/all',
        type: "GET",
        dataType: "json",
        success: function (data) {

            console.log(data);
            datatable.clear().draw();
            if (data.length == 0) {
                console.log("NO DATA!");
            } else {
                $.each(data, function (key, value) {

                    var url;
                    if (value.mode == "Cheque") {
                        url = value.cheque_url;
                    } else if (value.mode == "Deposit") {
                        url = value.deposit_url;
                    }

                    var j = -1;
                    var r = new Array();
                    // represent columns as array
                    r[++j] = '<td class="subject">' + value.title + ' ' + value.name + '</td>';
                    r[++j] = '<td class="subject">' + value.description + '</td>';
                    r[++j] = '<td class="subject">' + value.amount + '</td>';
                    r[++j] = '<td class="subject">' + value.mode + '</td>';
                    r[++j] = '<td class="subject">' + value.payment_date + '</td>';
                    r[++j] = '<td><button onclick="editType(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-info btn-sm editBtn" type="button">Edit</button>\n\
                              <button onclick="deleteType(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-danger btn-sm deleteBtn" type="button">Delete</button></td>';
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

getServices();
getTenants();
$('#mode').change(function () {
    var mode = $(this).val();
    if (mode == "Cheque") {
        console.log(mode);
        $('#cheque').show();
        $('#bankdepositdiv').hide();
    } else if (mode == "Cash") {
        console.log(mode);
        $('#cheque').hide();
        $('#bankdepositdiv').hide();
    } else {
        console.log('jhjhjj:' + mode);
        $('#bankdepositdiv').show();
        $('#cheque').hide();
    }
});
$('#tenants').change(function () {
    var tenant_id = $(this).val();
    getTenantInfo(tenant_id);
});
function getServiceInfo(id) {


    $.ajax({
        url: "../services/" + id,
        type: "GET",
        dataType: 'json',
        success: function (data) {
            $('#service_description').val(data[0].description);
            $('#service_amount').val(data[0].amount);
        }
//up_facilities
    });
}

function getTenantInfo(id) {


    $.ajax({
        url: "../tenant/rent/" + id,
        type: "GET",
        dataType: 'json',
        success: function (data) {
            $('#apartment_name').val(data[0].apartment_name);
            $('#apartment_type').val(data[0].apartment_type);
            $('#currency').val(data[0].currency);
            $('#apartment_amount').val(data[0].amount);
        }
//up_facilities
    });
}



function getServices() {


    $.ajax({
        url: "{{url('services/all')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {

            $.each(data, function (i, item) {

                $('#services').append($('<option>', {
                    value: item.id,
                    text: item.name
                }));
            });
        }

    });
}
getBanks();
function getBanks() {


    $.ajax({
        url: "{{url('banks/all')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {

            $.each(data, function (i, item) {

                $('#banks').append($('<option>', {
                    value: item.id + '-' + item.bank_name + '-' + item.account_no,
                    text: item.bank_name + '-' + item.account_no
                }));
            });
        }

    });
}

function getTenants() {


    $.ajax({
        url: "{{url('tenants/all')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {

            $.each(data, function (i, item) {

                $('#tenants').append($('<option>', {
                    value: item.id,
                    text: item.name
                }));
            });
        }

    });
}






function editType(code) {
    console.log('goood');
    $('#code').val(code);
    $('#loaderModal').modal('show');
    getPaymentInfo(code);
    $('#loaderModal').modal('hide');
    $('#editModal').modal('show');
}

function getPaymentInfo(id) {


    $.ajax({
        url: '../banking/payments/' + id,
        type: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data[0].name);
            $('#uptenant_name').val(data[0].name);
            $('#upamount').val(data[0].amount);
            $('#updescription').val(data[0].description);
            $('#upmode').val(data[0].mode).change();
            $('#uppayment_date').val(data[0].payment_date);
            $('#chqurl').html('<a target="_blank" href ="http://localhost/tempestates/storage/app/' + data[0].cheque_url + '" type="button" class="btn btn-info ">View Cheque </a>');
            $('#code').val(id);
            $('#depurl').html('<a target="_blank" href ="http://localhost/tempestates/storage/app/' + data[0].deposit_url + '" type="button" class="btn btn-info ">View Deposit </a>');
        },
        error: function (jXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}



$('#updateForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var formData = new FormData($("#updateForm")[0]);
    console.log('data' + formData);
    $('#loaderModal').modal('show');
    $('input:submit').attr("disabled", true);
    $.ajax({
        url: "{{url('banking/updaterentpayments')}}",
        type: "POST",
        data: formData,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data);
            $('#editModal').modal('hide');
            $('input:submit').removeAttr("disabled");
            $('#loaderModal').modal('hide');
            document.getElementById("updateForm").reset();
            if (data.success == 0) {
                swal("Success!", data.message, "success");
                getPayments();
            } else if (data.success == 1) {
                swal("Error!", data.message, "error");
            } else {
                swal("Error!", data.message, "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            $('input:submit').removeAttr("disabled");
            swal("Error!", "Contact System Administrator ", "error");
        }
    });
});
function deleteType(code) {
    console.log(code);
    $('#code').val(code);
    // $('#holdername').html(title);
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
        url: '../deletepayment/' + code,
        type: "DELETE",
        data: {_token: token},
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');
            document.getElementById("deleteForm").reset();
            if (data == 0) {
                swal("Success!", "Deleted Successfully", "success");
                getPayments();
            } else {
                swal("Error!", "Couldnt delete", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            $('#loaderModal').modal('hide');
            alert(errorThrown);
        }
    });
});
$('#upmode').change(function () {
    var mode = $(this).val();
    if (mode == "Cheque") {
        console.log(mode);
        $('#upcheque').show();
        $('#upbankdepositdiv').hide();
    } else if (mode == "Cash") {
        console.log(mode);
        $('#upcheque').hide();
        $('#upbankdepositdiv').hide();
    } else {
        console.log('jhjhjj:' + mode);
        $('#upbankdepositdiv').show();
        $('#upcheque').hide();
    }
});
getRentPeriods();
function getRentPeriods() {


    $.ajax({
        url: "{{url('configuration/getrentperiods')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {

            $.each(data, function (i, item) {

                $('#rent_periods').append($('<option>', {
                    value: item.name,
                    text: item.name + " months"
                }));
            });
        }

    });
}


function getBill() {

    var token = $('#token').val();
    var tenant = $('#tenants').val();
    var daterange = $('#reportrange').val();
    $.ajax({
        url: '{{url("tenantaccumulatedbill")}}',
        type: "POST",
        data: {_token: token, daterange: daterange, tenant: tenant},
        dataType: "json",
        success: function (data) {
            console.log(data);
            $('#bill_amount_tobe_paid').val(data[0].total_amount);
        },
        error: function (jXHR, textStatus, errorThrown) {
            $('#loaderModal').modal('hide');
            alert(errorThrown);
        }
    });

}
//

$('#rent').click(function () {
    var ifchecked = $('#rent').is(':checked');
    if (ifchecked == true) {
        $('#rendiv').show();
    } else {
        $('#rendiv').hide();
    }
});

$('#bill').click(function () {
    var ifchecked = $('#bill').is(':checked');
    if (ifchecked == true) {
        $('#billdiv').show();
    } else {
        $('#billdiv').hide();
    }
});

$('#rent_periods').change(function () {
    $('#end_date').val('');
    $('#expectingrent_amount').val('');
});

