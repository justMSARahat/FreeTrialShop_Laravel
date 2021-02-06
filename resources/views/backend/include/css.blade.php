    <link rel="icon" type="image/x-icon" href="{{ asset('Backend/assets/img/favicon.ico') }}"/>
    <link href="{{ asset('Backend/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('Backend/assets/js/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('Backend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Backend/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('Backend/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Backend/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />

    <!-- Developer Custom Css -->
    <link href="{{ asset('Backend/style.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <script>
        var quill = new Quill('#editor-container', {
          modules: {
            toolbar: [
              [{ header: [1, 2, false] }],
              ['bold', 'italic', 'underline'],
              ['image', 'code-block']
            ]
          },
          placeholder: 'Compose an epic...',
          theme: 'snow'  // or 'bubble'
        });
    </script>

{{--Toastr Css--}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
