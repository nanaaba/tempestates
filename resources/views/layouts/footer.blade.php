<!--<footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
</footer>-->

<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
<!-- end of global js -->


<script src="{{asset('vendors/moment/js/moment.min.js')}}" type="text/javascript"></script>
<!--<script src="{{ asset('vendors/datetime/js/jquery.datetimepicker.full.min.js')}}" type="text/javascript"></script>-->
<!-- bootstrap time picker -->
<script src="{{ asset('vendors/airdatepicker/js/datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('vendors/airdatepicker/js/datepicker.en.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/custom_js/advanceddate_pickers.js')}}" type="text/javascript"></script>

<!-- InputMask -->
<script src="{{asset('vendors/inputmask/inputmask/inputmask.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/inputmask/inputmask/jquery.inputmask.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/inputmask/inputmask/inputmask.date.extensions.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/inputmask/inputmask/inputmask.extensions.js')}}" type="text/javascript"></script>
<!-- date-range-picker -->
<script src="{{asset('vendors/daterangepicker/js/daterangepicker.js')}}" type="text/javascript"></script>
<!-- bootstrap time picker -->
<script src="{{asset('vendors/datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/clockpicker/js/bootstrap-clockpicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/jquerydaterangepicker/js/jquery.daterangepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/datedropper/datedropper.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/timedropper/js/timedropper.js')}}" type="text/javascript"></script>

<script src="{{asset('vendors/bootstrap-multiselect/js/bootstrap-multiselect.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/select2/js/select2.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.animate.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.buttons.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.confirm.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.nonblock.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.mobile.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.desktop.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.history.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.callbacks.js')}}"></script>
<script src="{{asset('js/custom_js/notifications.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendors/sweetalert2/js/sweetalert2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendors/bootstrapwizard/js/jquery.bootstrap.wizard.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>



<!-- end o<!-- bootstrap time picker -->
<script type="text/javascript" src="{{asset('js/custom_js/invoice.js')}}"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js" type="text/javascript"></script>


<!--<script src="{{asset('js/custom_js/datepickers.js')}}" type="text/javascript"></script>-->

<!--<script src="{{ asset('vendors/inputmask/inputmask/inputmask.js')}}" type="text/javascript"></script>
<script src="{{ asset('vendors/inputmask/inputmask/jquery.inputmask.js')}}" type="text/javascript"></script>
<script src="{{ asset('vendors/inputmask/inputmask/inputmask.date.extensions.js')}}" type="text/javascript"></script>
<script src="{{ asset('vendors/inputmask/inputmask/inputmask.extensions.js')}}" type="text/javascript"></script>-->
<!-- date-range-picker -->

<script type="text/javascript">

$(function () {
$('input[type="number"]').on('keydown', function (e) {
- 1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || (/65|67|86|88/.test(e.keyCode) && (e.ctrlKey === true || e.metaKey === true)) && (!0 === e.ctrlKey || !0 === e.metaKey) || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
});
});
$("input[type='number'").keyup(function () {
var maxChars = 12;
if ($(this).val().length > maxChars) {
$(this).val($(this).val().substr(0, maxChars));
//Take action, alert or whatever suits
alert("This field can take a maximum of 12 characters");
}


if ($(this).val().length < maxChars) {

alert("This field can take a minimum of 12 characters");
}
});
//$("input[type='number'").focusout(function () {
//    var maxChars = 12;
//
//    if ($(this).val().length < maxChars) {
//
//        alert("This field must have minimum of 12 characters");
//    }
//});


$('.select2').select2();
getApartmentTypes();
function getApartmentTypes() {


$.ajax({
url: "{{url('configuration/getapartmentypes')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {

        $.each(data, function (i, item) {

        $('.apartmenttypes').append($('<option>', {
        value: item.name,
                text: item.name
        }));
        });
        }

});
}



</script>