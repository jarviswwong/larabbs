<script>
    toastr.options = {
        "positionClass": "toast-top-right",
        "progressBar": true,
        "timeOut": "3000",
    }

    @if(Session::has('success'))
    toastr.success('{{Session::get('success')}}', '');
    @endif

    @if(Session::has('danger'))
    toastr.error('{{Session::get('success')}}', '');
    @endif
</script>
