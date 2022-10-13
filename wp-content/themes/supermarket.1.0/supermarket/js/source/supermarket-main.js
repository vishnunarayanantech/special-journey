jQuery( function() {

		/* allow keyboard access for catalog sub menu items */
		var catalogMenuLink = jQuery('.menu-item').children('a');

		    catalogMenuLink.on( 'focus', function(){
		        jQuery(this).parents('ul').addClass('focus');
		    });
		    catalogMenuLink.on( 'focusout', function(){
		        jQuery(this).parents('ul').removeClass('focus');
		    });

		// Add class
		jQuery( function() {
			var jQuerymuse = jQuery("#page div");
			var jQuerysld = jQuery("body");

			if (jQuerymuse.hasClass("main-slider")) {
			       jQuerysld.addClass("sld-plus");
			}
		});

		// Main Menu toggle for below 981px screens.
		( function() {
			var togglenav = jQuery( '.main-navigation' ), button, menu;
			if ( ! togglenav ) {
				return;
			}

			button = togglenav.find( '.menu-toggle' );
			if ( ! button ) {
				return;
			}
			
			menu = togglenav.find( '.menu' );
			if ( ! menu || ! menu.children().length ) {
				button.hide();
				return;
			}

			jQuery( '.menu-toggle' ).on( 'click', function() {
				jQuery(this).toggleClass("on");
				togglenav.toggleClass( 'toggled-on' );
			} );
		} )();

		// Top Menu toggle for below 981px screens.
		( function() {
			var togglenav = jQuery( '.top-bar-menu' ), button, menu;
			if ( ! togglenav ) {
				return;
			}

			button = togglenav.find( '.top-menu-toggle' );
			if ( ! button ) {
				return;
			}
			
			menu = togglenav.find( '.top-menu' );
			if ( ! menu || ! menu.children().length ) {
				button.hide();
				return;
			}

			jQuery( '.top-menu-toggle' ).on( 'click', function() {
				jQuery(this).toggleClass("on");
				togglenav.toggleClass( 'toggled-on' );
			} );
		} )();

		// Menu toggle for catalog menu.
		jQuery(document).ready( function() {
		  //when the button is clicked
		  jQuery(".show-menu-toggle").click( function() {
		    //apply toggleable classes
		    jQuery(".catalog-menu-box").toggleClass("show");
		    jQuery(".page-overlay").toggleClass("catalog-menu-open"); 
		    jQuery("#page").addClass("catalog-content-open");  
		  });
		  
		  jQuery(".hide-menu-toggle, .page-overlay").click( function() {
		    jQuery(".catalog-menu-box").removeClass("show");
		    jQuery(".page-overlay").removeClass("catalog-menu-open");
		    jQuery("#page").removeClass("catalog-content-open");
		  });
		});

		// Catalog menu below 768px
		jQuery( function() {
			if(jQuery( window ).width() < 767){
				jQuery(".catalog-menu .menu-item-has-children ul, .catalog-menu .page_item_has_children ul").hide();
				jQuery(".catalog-menu .menu-item-has-children a, .catalog-menu .page_item_has_children a").click(function () {
					jQuery(this).parent(".catalog-menu .menu-item-has-children, .catalog-menu .page_item_has_children").children("ul").slideToggle("100");
				});
			}
		});

		jQuery( function() {
			if(jQuery( window ).width() < 767){
				//responsive sub menu toggle
                jQuery('#site-navigation .menu-item-has-children, #site-navigation .page_item_has_children').prepend('<button class="sub-menu-toggle"> <i class="fas fa-plus"></i> </button>');
				jQuery(".main-navigation .menu-item-has-children ul, .main-navigation .page_item_has_children ul").hide();
				jQuery(".main-navigation .menu-item-has-children > .sub-menu-toggle, .main-navigation .page_item_has_children > .sub-menu-toggle").on('click', function () {
					jQuery(this).parent(".main-navigation .menu-item-has-children, .main-navigation .page_item_has_children").children('ul').first().slideToggle();
					jQuery(this).children('.fa-plus').first().toggleClass('fa-minus');
					
				});
			}
		});

		/* allow keyboard access for header cart link */
		var superMarketLink = jQuery('.header-right .cart-box .sx-cart-views, .header-right .cart-box .widget_shopping_cart .widget_shopping_cart_content .cart_list .mini_cart_item, .header-right .cart-box .widget_shopping_cart .widget_shopping_cart_content p').children('a');

		    superMarketLink.on( 'focus', function(){
		        jQuery(this).parents('.header-right .cart-box').addClass('focus');
		    });
		    superMarketLink.on( 'focusout', function(){
		        jQuery(this).parents('.header-right .cart-box').removeClass('focus');
		    });

		    // Tab Content
		var jQuerywrapper = jQuery('.cat-tab-wrapper'),
		      jQueryallTabs = jQuerywrapper.find('.cat-tabs-container > .cat-tab-content'),
		      jQuerytabMenu = jQuerywrapper.find('.cat-tab-menu li')

		      jQueryallTabs.not(':first-of-type').hide();
		  
		  jQuerytabMenu.each(function(i) {
		    jQuery(this).attr('data-tab', 'tab'+i);
		  });
		  
		  jQueryallTabs.each(function(i) {
		    jQuery(this).attr('data-tab', 'tab'+i);
		  });
		  
		  jQuerytabMenu.on('click', function() {
		    
		    var dataTab = jQuery(this).data('tab'),
		        jQuerygetWrapper = jQuery(this).closest(jQuerywrapper);
		    
		    jQuerygetWrapper.find(jQuerytabMenu).removeClass('active');
		    jQuery(this).addClass('active');
		    
		    jQuerygetWrapper.find(jQueryallTabs).hide();
		    jQuerygetWrapper.find(jQueryallTabs).filter('[data-tab='+dataTab+']').show();
		  });//end Tab


		// Go to top button.
		jQuery(document).ready(function(){

		// Hide Go to top icon.
		jQuery(".go-to-top").hide();

		  jQuery(window).scroll(function(){

		    var windowScroll = jQuery(window).scrollTop();
		    if(windowScroll > 900)
		    {
		      jQuery('.go-to-top').fadeIn();
		    }
		    else
		    {
		      jQuery('.go-to-top').fadeOut();
		    }
		  });

		  // scroll to Top on click
		  jQuery('.go-to-top').click(function(){
		    jQuery('html,header,body').animate({
		    	scrollTop: 0
			}, 700);
			return false;
		  });

		});

		var product_widget_box = document.getElementsByClassName('product-widget-box, secondary');
		if (product_widget_box) {
		    jQuery('.widget-title').wrapInner('<span></span>');

		}

} );