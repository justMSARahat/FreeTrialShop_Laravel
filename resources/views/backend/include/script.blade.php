<script src="{{ asset('Backend/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('Backend/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('Backend/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Backend/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('Backend/assets/js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{ asset('Backend/') }}assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{ asset('Backend/plugins/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('Backend/assets/js/dashboard/dash_1.js') }}"></script>

{{--Toastr Script--}}
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" ></script>
<script type="text/javascript">
    @if( Session::has('message') )
        var type = "{{ Session::get('alert-type','info') }}";

        switch (type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
            break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
            break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
            break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
            break;
        }
    @endif
</script>
<script type="text/javascript">
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": true,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
