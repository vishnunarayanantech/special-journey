jQuery( document ).ready(function($) {
	var $window = $(window),
		flexslider = { vars:{} };
 
	// tiny helper function to add breakpoints
	function getGridSize() {
	return (window.innerWidth < 360) ? 1 :
			(window.innerWidth < 480) ? 2 :
			(window.innerWidth < 768) ? 3 :
	       (window.innerWidth < 1024) ? 4 : 6;
	}

	function getGridslideSize() {
	return (window.innerWidth < 480) ? 1 :
			(window.innerWidth < 768) ? 2 :
			(window.innerWidth < 769) ? 3 :
	       (window.innerWidth < 1024) ? 4 : 5;
	}

	function getGridslideSize4() {
	return (window.innerWidth < 480) ? 1 :
			(window.innerWidth < 768) ? 2 :
	       (window.innerWidth < 1024) ? 3 : 4;
	}

	function getGridslideSize6() {
	return (window.innerWidth < 480) ? 1 :
			(window.innerWidth < 768) ? 2 :
			(window.innerWidth < 769) ? 3 :
	       (window.innerWidth < 1024) ? 4 :
	       (window.innerWidth < 1300) ? 5 : 6;
	}

	function getGridslideSize9() {
	return (window.innerWidth < 480) ? 4 :
			(window.innerWidth < 768) ? 5 :
			(window.innerWidth < 769) ? 6 :
	       (window.innerWidth < 1024) ? 7 :
	       (window.innerWidth < 1300) ? 8 : 9;
	}

	$('.layer-slider').flexslider({
	    animation: "slide",
	    animationLoop: true,
	    slideshow: true,
	    slideshowSpeed: 5000,
	    animationSpeed: 700,
	    smoothHeight: true
	});

	$('#secondary .product-slider, #secondary .product-slider-four, #secondary .product-slider-six, #colophon .product-slider, #colophon .product-slider-four,  #colophon .product-slider-six,  .supermarket-template-footer-column .product-slider, .supermarket-template-footer-column .product-slider-four, .supermarket-template-footer-column .product-slider-six').flexslider({
		animation: "slide",
		animationLoop: true,
		slideshow: true,
		controlNav: false,
		smoothHeight: false,
		slideshowSpeed: 3000,
		animationSpeed: 700
	});

	$('.product-slider').flexslider({
		animation: "slide",
		animationLoop: true,
		slideshow: false,
		controlNav: false,
		smoothHeight: false,
		slideshowSpeed: 3000,
		animationSpeed: 700,
		itemWidth: 200,
		itemMargin: 20,
		move: 1,
		minItems: getGridslideSize(), // use function to pull in initial value
		maxItems: getGridslideSize() // use function to pull in initial value
	});

	$('.product-slider-four').flexslider({
		animation: "slide",
		animationLoop: true,
		slideshow: false,
		controlNav: false,
		smoothHeight: false,
		slideshowSpeed: 3000,
		animationSpeed: 700,
		itemWidth: 200,
		itemMargin: 20,
		move: 1,
		minItems: getGridslideSize4(), // use function to pull in initial value
		maxItems: getGridslideSize4() // use function to pull in initial value
	});

	$('.product-slider-six').flexslider({
		animation: "slide",
		animationLoop: true,
		slideshow: false,
		controlNav: false,
		smoothHeight: false,
		slideshowSpeed: 3000,
		animationSpeed: 700,
		itemWidth: 200,
		itemMargin: 20,
		move: 1,
		minItems: getGridslideSize6(), // use function to pull in initial value
		maxItems: getGridslideSize6() // use function to pull in initial value
	});

	$('.brand-slider').flexslider({
		animation: "slide",
		animationLoop: true,
		slideshow: true,
		controlNav: false,
		smoothHeight: false,
		slideshowSpeed: 3000,
		animationSpeed: 700,
		itemWidth: 200,
		itemMargin: 15,
		move: 1,
		minItems: getGridSize(), // use function to pull in initial value
		maxItems: getGridSize() // use function to pull in initial value
	});

	$('.category-icon-slider').flexslider({
		animation: "slide",
		animationLoop: true,
		slideshow: false,
		controlNav: false,
		smoothHeight: false,
		slideshowSpeed: 3000,
		animationSpeed: 700,
		itemWidth: 200,
		itemMargin: 15,
		move: 1,
		minItems: getGridslideSize9(), // use function to pull in initial value
		maxItems: getGridslideSize9() // use function to pull in initial value
	});

	$window.resize(function() {
	    var gridSize = getGridSize();
	    var gridSize = getGridslideSize();
	 
	    flexslider.vars.minItems = gridSize;
	    flexslider.vars.maxItems = gridSize;
	});
});

		