<!-- BEGIN: Vendor JS-->
<script src="{{asset('admin/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('admin/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js')}}"></script>
<script src="{{asset('admin/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js')}}"></script>
<script src="{{asset('admin/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('admin/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('admin/vendors/js/extensions/swiper.min.js')}}"></script>
<script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('admin/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('admin/js/scripts/configs/vertical-menu-light.min.js')}}"></script>
<script src="{{asset('admin/js/core/app-menu.min.js')}}"></script>
<script src="{{asset('admin/js/core/app.min.js')}}"></script>
<script src="{{asset('admin/js/scripts/components.min.js')}}"></script>
<script src="{{asset('admin/js/scripts/footer.min.js')}}"></script>
<script src="{{asset('admin/js/scripts/customizer.min.js')}}"></script>
<!-- END: Theme JS-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	 toastr.options = {
	  "closeButton": true,
	  "newestOnTop": true,
	  "positionClass": "toast-top-right"
	};
</script>

<script src="{{asset('admin/js/scripts/common.js')}}"></script>