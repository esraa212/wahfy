<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
 
	<!-- Twitter -->
	<meta name="twitter:site" content="twitter link">
	<meta name="twitter:creator" content="twitter link">
	<meta name="twitter:title" content="WAHFY">
	<meta name="twitter:description" content="WAHFY - We Are Here For You">
	<meta name="twitter:image" content="{{url('img/general/logo.png')}}">
	<!-- Facebook -->
	<meta property="og:url" content="site link">
	<meta property="og:title" content="WAHFY">
	<meta property="og:description" content="WAHFY -We Are Here For You">
	<meta property="og:image" content="{{url('img/general/logo.png')}}">
	<meta property="og:image:secure_url" content="{{url('img/general/logo.png')}}">
	<meta property="og:image:type" content="image/png">
	<meta property="og:image:width" content="250">
	<meta property="og:image:height" content="265">
	<!-- Meta -->
	<meta charset="utf-8">
	<title>
		WAHFY 
	</title>
	<meta name="description" content="WAHFY - We Are Here For You">
	<meta name="keywords" content="">
	<meta name="author" content="WAHFY">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="{{url('img/general/logo.png')}}">
    @yield('meta')

    @stack('before-styles')
    <link rel="stylesheet" href="{{url('front/css/my1.css')}}">
    <link rel="stylesheet" href="{{url('front/css/my2.css')}}">
    <link rel="stylesheet" href="{{url('front/css/my3.css')}}">
    <link rel="stylesheet" href="{{url('front/css/my4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('front/slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('front/slick/slick-theme.css')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
	

    @stack('after-styles')

   
</head>

<body>

  

    @include('Front.layout.header')
      @yield('content')

    @include('Front.layout.footer')


    <!-- Scripts -->
    @stack('before-scripts')
	<script
	src="https://code.jquery.com/jquery-3.5.1.min.js"
	integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
	crossorigin="anonymous"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>


<script type="text/javascript" src="{{url('front/slick/slick.min.js')}}"></script>
<script src="{{url('front/js/jquery.backstretch.min.js')}}"></script>
<script src="{{url('front/js/bootstrap.min.js')}}"></script>
<script src="{{url('front/js/wow.min.js')}}"></script>

@yield('scripts')
<script>
	$(window).on('load', function(){
		"use strict";
		$(".spinner").fadeOut(500, function () {
			$("body").css("overflow", "auto");
			$(this).parent().fadeOut(500, function () {
				$(this).remove();
			});
		});
	});

</script>
<script>
$(document).ready(function(){
  $('.w97').slick({
    rows:1,
	  slidesToShow:4,
	  mobileFirst: true,
	  slidesToScroll:4,
	  infinite: false
  });
});
</script>
<script>
$(document).ready(function(){
  $('.hot-index').slick({
    rows:1,
	  slidesToShow:4,
	  mobileFirst: true,
	  slidesToScroll:2,
	  infinite: true,
	  autoplay: true
  });
});
</script>
<script>
$(document).ready(function(){
  $('.sim').slick({
    rows:1,
	  slidesToShow:6,
	  mobileFirst: true,
	  slidesToScroll:2,
	  infinite: true,
	  autoplay: true
  });
});
</script>
<script>
$(document).ready(function(){
  $('.img-show').slick({
    rows:1,
	  slidesToShow:1,
	  mobileFirst: true,
	  slidesToScroll:1,
	  infinite: true,
	  autoplay: true
  });
});
</script>
<script>
	new WOW().init();
</script>
<script>
	$('.main-slider').backstretch(["img/slider/1.png", "img/slider/2.png", "img/slider/3.png", "img/slider/4.png"], {
		fade: 800
		, duration: 5000
	});
</script>
<script>
$(document).ready(function(){
	
	
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	
	
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});
</script>
<script>
$(".helpme").click(function(){
    $(".your-fav").addClass(" tada animated");
	$('html, body').animate({scrollTop : 0},200);
});
</script>

	

</html>
</body>

</html>
