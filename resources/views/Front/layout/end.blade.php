<script src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script src="js/jquery.backstretch.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
</div>
</body>
<script>
	$(window).load(function () {
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