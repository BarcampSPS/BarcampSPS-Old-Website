$(function() {
	$('#navigation ul li:last-child').addClass('last')
	$('#footer .footer-nav ul li:last-child').addClass('last')

	if( $.browser.msie ){
		$('body').addClass('iefix');
	}

});

$(window).load(function() {
	$('.big-slider').flexslider({
		animation: "slide",
		controlsContainer: ".slider-holder",
		slideshowSpeed: 5000,
		directionNav: true,
		controlNav: true,
		animationDuration: 900
	});

	$('.testimonials-slider').flexslider({
		animation: "fade",
		slideshowSpeed: 3000,
		directionNav: false,
		controlNav: false,
	});
});


    
    
    $(document).ready(function() {
      // Show or hide the sticky footer button
      $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
          $('.go-top').fadeIn(200);
        } else {
          $('.go-top').fadeOut(200);
        }
      });
      
      // Animate the scroll to top
      $('.go-top').click(function(event) {
        event.preventDefault();
        
        $('html, body').animate({scrollTop: 0}, 300);
      })
    });
  
