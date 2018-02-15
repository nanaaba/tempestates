<!--<footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
</footer>-->

<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
<!-- end of global js -->


<script src="{{asset('vendors/moment/js/moment.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('vendors/datetime/js/jquery.datetimepicker.full.min.js')}}" type="text/javascript"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('vendors/airdatepicker/js/datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('vendors/airdatepicker/js/datepicker.en.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/custom_js/advanceddate_pickers.js')}}" type="text/javascript"></script>

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

<!--<script type="text/javascript" src="{{asset('js/custom_js/sparkline/jquery.flot.spline.js')}}"></script>

<script type="text/javascript" src="{{asset('vendors//flip/js/jquery.flip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors//lcswitch/js/lc_switch.min.js')}}"></script>

<script type="text/javascript" src="{{asset('vendors//flotchart/js/jquery.flot.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors//flotchart/js/jquery.flot.resize.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors//flotchart/js/jquery.flot.stack.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors//flotspline/js/jquery.flot.spline.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors//flot.tooltip/js/jquery.flot.tooltip.js')}}"></script>

<script type="text/javascript" src="{{asset('vendors//swiper/js/swiper.min.js')}}"></script>

<script src="{{asset('vendors//chartjs/js/Chart.js')}}"></script>

<script type="text/javascript" src="{{asset('js/nvd3/d3.v3.min.js')}}"></script>-->
<!--<script type="text/javascript" src="{{asset('vendors//nvd3/js/nv.d3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors//moment/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors//advanced_newsTicker/js/newsTicker.js')}}"></script>
<script type="text/javascript" src="{{asset('js/dashboard1.js')}}"></script>-->

<!-- The File Upload user interface plugin -->
<!--<script src="{{asset('js/custom_js/custom_elements.js')}}" type="text/javascript"></script>-->
<!--<script type="text/javascript" src="{{ asset('js/custom_js/form_wizards.js')}}"></script>-->


<!-- end o<!-- bootstrap time picker -->
<script type="text/javascript" src="{{asset('js/custom_js/invoice.js')}}"></script>



<!--<script src="{{ asset('vendors/inputmask/inputmask/inputmask.js')}}" type="text/javascript"></script>
<script src="{{ asset('vendors/inputmask/inputmask/jquery.inputmask.js')}}" type="text/javascript"></script>
<script src="{{ asset('vendors/inputmask/inputmask/inputmask.date.extensions.js')}}" type="text/javascript"></script>
<script src="{{ asset('vendors/inputmask/inputmask/inputmask.extensions.js')}}" type="text/javascript"></script>-->
<!-- date-range-picker -->

<script type="text/javascript">
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