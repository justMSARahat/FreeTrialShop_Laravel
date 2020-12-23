
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo5/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Dec 2020 15:19:21 GMT -->
<head>
    
    @include('backend.include.header')
    
    @include('backend.include.css')

</head>
<body>
    <!-- BEGIN LOADER -->
    @include('backend.include.preloader')
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @include('backend.include.topbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
    	@include('backend.include.sidebar')
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            
            @yield('content')


    		@include('backend.include.footer')
        </div>
        <!--  END CONTENT AREA  -->


    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    @include('backend.include.script')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>

<!-- Mirrored from designreset.com/cork/ltr/demo5/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Dec 2020 15:20:01 GMT -->
</html>