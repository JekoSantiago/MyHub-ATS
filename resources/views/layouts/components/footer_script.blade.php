<!-- Global Javascript -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>
<script type="text/javascript">
    var WebURL = {!! json_encode(url('/')) !!}
</script>


<!-- Plugins Javascript -->
<script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-mask-plugin/jquery-mask-plugin.min.js')}}"></script>
<script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
@yield('js_plugins')

<!-- Custom Javascript -->
<script src="{{asset('assets/js/custom/main.js')}}"></script>
@yield('js')
