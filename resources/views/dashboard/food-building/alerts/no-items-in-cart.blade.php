@if (session()->has("warning"))
    <script>
        $(document).ready(function() {
            $.toast({
                    heading: 'Shopping List',
                    text: "{{session()->get('warning')}}",
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'warning',
                    hideAfter: 3500,
                    stack: 6
                });
        });
    </script>
@endif