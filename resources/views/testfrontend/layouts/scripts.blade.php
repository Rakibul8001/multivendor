<!-- latest jquery-->
<script src="{{asset('frontend/assets/js/jquery-3.3.1.min.js')}}"></script>

<!-- fly cart ui jquery-->
<script src="{{asset('frontend/assets/js/jquery-ui.min.js')}}"></script>

<!-- exitintent jquery-->
<script src="{{asset('frontend/assets/js/jquery.exitintent.js')}}"></script>
<script src="{{asset('frontend/assets/js/exit.js')}}"></script>

<!-- slick js-->
<script src="{{asset('frontend/assets/js/slick.js')}}"></script>

<!-- menu js-->
<script src="{{asset('frontend/assets/js/menu.js')}}"></script>

<!-- lazyload js-->
<script src="{{asset('frontend/assets/js/lazysizes.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>

<!-- Bootstrap Notification js-->
<script src="{{asset('frontend/assets/js/bootstrap-notify.min.js')}}"></script>

<!-- product zoom effect js-->
<script src="{{asset('frontend/assets/js/jquery.elevatezoom.js')}}"></script>
<!-- timer js-->
<script src="{{asset('frontend//assets/js/timer.js')}}"></script>

<!-- Fly cart js-->
<script src="{{asset('frontend/assets/js/fly-cart.js')}}"></script>

<!-- Theme js-->
<script src="{{asset('frontend/assets/js/theme-setting.js')}}"></script>
<script src="{{asset('frontend/assets/js/script.js')}}"></script>

<!-- File manager -->
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
@stack('front-script')

<script>
    $(window).on('load', function () {
            setTimeout(function () {
                $('#exampleModal').modal('show');
            }, 2500);
        });

        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
</script>