<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/multikart/front-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Jun 2021 08:51:11 GMT -->

@include('testfrontend.layouts.head')

<body class="theme-color-1">


    <!-- loader start -->
    @include('testfrontend.layouts.loader')
    <!-- loader end -->


    <!-- header start -->
    @include('testfrontend.layouts.header')
    <!-- header end -->

    <!-- Main Content -->

    @yield('front-content')

    <!--  End main content-->


    <!-- footer -->
    @include('testfrontend.layouts.footer')     
    <!-- footer end -->

    <!-- Quick-view modal popup start-->
    @include('testfrontend.layouts.modal-view')   
    <!-- Quick-view modal popup end-->

    <!-- tap to top -->
    <div class="tap-top top-cls">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    <!-- tap to top end -->


    @include('testfrontend.layouts.scripts')

</body>


<!-- Mirrored from themes.pixelstrap.com/multikart/front-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Jun 2021 08:54:29 GMT -->

</html>