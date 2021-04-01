<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>WAHFY</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{url('front/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('front/fonts/Linearicons/Linearicons/Font/demo-files/demo.css')}}">
    <link rel="stylesheet" href="{{url('front/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('front/plugins/owl-carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('front/plugins/owl-carousel/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('front/plugins/slick/slick/slick.css')}}">
    <link rel="stylesheet" href="{{url('front/plugins/nouislider/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{url('front/plugins/lightGallery-master/dist/css/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{url('front/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{url('front/plugins/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('front/css/style.css')}}">
    <link rel="stylesheet" href="{{url('front/css/market-place-1.css')}}">
    <link rel="stylesheet" href="{{url('front/css/toastr.css')}}">



    @stack('after-styles')


</head>

<body>



    @include('Front.layout.header')
    <div class="container">
      
        @yield('content')
   </div>

    @include('Front.layout.footer')
   
 

    <!-- Scripts -->
    @stack('before-scripts')
  <script data-cfasync="false" src="http://nouthemes.net/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{url('front/plugins/jquery.min.js')}}"></script>
    <script src="{{url('front/plugins/nouislider/nouislider.min.js')}}"></script>
    <script src="{{url('front/plugins/popper.min.js')}}"></script>
    <script src="{{url('front/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{url('front/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('front/plugins/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{url('front/plugins/masonry.pkgd.min.js')}}"></script>
    <script src="{{url('front/plugins/isotope.pkgd.min.js')}}"></script>
    <script src="{{url('front/plugins/jquery.matchHeight-min.js')}}"></script>
    <script src="{{url('front/plugins/slick/slick/slick.min.js')}}"></script>
    <script src="{{url('front/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
    <script src="{{url('front/plugins/slick-animation.min.js')}}"></script>
    <script src="{{url('front/plugins/lightGallery-master/dist/js/lightgallery-all.min.js')}}"></script>
    <script src="{{url('front/plugins/sticky-sidebar/dist/sticky-sidebar.min.js')}}"></script>
    <script src="{{url('front/plugins/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{url('front/plugins/gmap3.min.js')}}"></script>
    <!-- custom scripts-->
    <script src="{{url('front/js/main.js')}}"></script>

<script>
    var config ={
        url:"{{url('/')}}",
       
    }
    var subscribe={
     subscribe_route:"{{route('front.subscribe')}}"
    }
</script>
<script src="{{ asset('front/pages/subscription.js') }}"></script>
<script src="{{ asset('front/pages/toastr.js') }}"></script>

    

	@yield('scripts')
</body>

</html>
