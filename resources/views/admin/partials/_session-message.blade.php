<script>
    var toptions = toastr.options = {
        "closeButton": true,
        "newestOnTop": true,
        "positionClass": "toast-top-right"
    };
    @if( Session::has( 'success' ))
    toastr.success("{{ Session::get( 'success' ) }}", toptions);
    @elseif( Session::has( 'error' ))
    toastr.error("{{ Session::get( 'error' ) }}", toptions);
    @endif
</script>

