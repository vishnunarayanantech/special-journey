jQuery(document).ready(function(i){var e=i(window),n={vars:{}};function o(){return window.innerWidth<360?1:window.innerWidth<480?2:window.innerWidth<768?3:window.innerWidth<1024?4:6}function t(){return window.innerWidth<480?1:window.innerWidth<768?2:window.innerWidth<769?3:window.innerWidth<1024?4:5}function d(){return window.innerWidth<480?1:window.innerWidth<768?2:window.innerWidth<1024?3:4}function r(){return window.innerWidth<480?1:window.innerWidth<768?2:window.innerWidth<769?3:window.innerWidth<1024?4:window.innerWidth<1300?5:6}function s(){return window.innerWidth<480?4:window.innerWidth<768?5:window.innerWidth<769?6:window.innerWidth<1024?7:window.innerWidth<1300?8:9}i(".layer-slider").flexslider({animation:"slide",animationLoop:!0,slideshow:!0,slideshowSpeed:5e3,animationSpeed:700,smoothHeight:!0}),i("#secondary .product-slider, #secondary .product-slider-four, #secondary .product-slider-six, #colophon .product-slider, #colophon .product-slider-four,  #colophon .product-slider-six,  .supermarket-template-footer-column .product-slider, .supermarket-template-footer-column .product-slider-four, .supermarket-template-footer-column .product-slider-six").flexslider({animation:"slide",animationLoop:!0,slideshow:!0,controlNav:!1,smoothHeight:!1,slideshowSpeed:3e3,animationSpeed:700}),i(".product-slider").flexslider({animation:"slide",animationLoop:!0,slideshow:!1,controlNav:!1,smoothHeight:!1,slideshowSpeed:3e3,animationSpeed:700,itemWidth:200,itemMargin:20,move:1,minItems:t(),maxItems:t()}),i(".product-slider-four").flexslider({animation:"slide",animationLoop:!0,slideshow:!1,controlNav:!1,smoothHeight:!1,slideshowSpeed:3e3,animationSpeed:700,itemWidth:200,itemMargin:20,move:1,minItems:d(),maxItems:d()}),i(".product-slider-six").flexslider({animation:"slide",animationLoop:!0,slideshow:!1,controlNav:!1,smoothHeight:!1,slideshowSpeed:3e3,animationSpeed:700,itemWidth:200,itemMargin:20,move:1,minItems:r(),maxItems:r()}),i(".brand-slider").flexslider({animation:"slide",animationLoop:!0,slideshow:!0,controlNav:!1,smoothHeight:!1,slideshowSpeed:3e3,animationSpeed:700,itemWidth:200,itemMargin:15,move:1,minItems:o(),maxItems:o()}),i(".category-icon-slider").flexslider({animation:"slide",animationLoop:!0,slideshow:!1,controlNav:!1,smoothHeight:!1,slideshowSpeed:3e3,animationSpeed:700,itemWidth:200,itemMargin:15,move:1,minItems:s(),maxItems:s()}),e.resize(function(){var i=o(),i=t();n.vars.minItems=i,n.vars.maxItems=i})});