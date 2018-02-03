/**
 * Taproot Front End Functionality
 */
( function($) {

	/**
	 * Variables available to our methods
	 */
	var $body,
		$wrapper,
		$header,
		$footer,
		windowHeight,
		hasStaticHeader,
		scrollRate,
		hasFixedHeader,
		hasFixedFooter,
		fixedHeaderType,
		headerScroll,
		parallaxScroll,
		hasParallax,
		parallaxImages = [];


	/**
	 * Parallax
	 */
	var parallax = function() {

		$('.parallax').each(function() {

			var $this = $(this);
			var $img = $this.children("img").first();
	  		if( $img.length ) {
	  			$img.css('display', 'block');
	  		}

			var parallax = {};
			parallax.el = $this;
			parallax.container = $this.parent();
			parallax.height = parallax.container.height();
			parallaxImages.push(parallax);

			var top = ( parallax.container.offset().top - $wrapper.offset().top ),
				parallaxOffset;

	  		if( top < 1 ) {
	  		   	parallaxOffset = '0px';
	  		}
	  		else if(top > windowHeight) {
	  		   	parallaxOffset = '-' + ( 100 * scrollRate ) + 'vh';
				parallax.belowFold = true;
	  		}

			if( $img.length && top > windowHeight ) {
	  			var imageHeight = 'calc(' + parallaxOffset.replace('-', '') + ' + ' + parallax.height + 'px)';
				$img.css( 'height', imageHeight);
				$this.css( 'margin-top', parallaxOffset );
	  		}
		});
	}; 


	/**
	 * Update Parallax
	 */
	var parallaxUpdate = function() {

		$.each(parallaxImages, function(index, parallax) {
			var top = ( parallax.container.offset().top ),
				scrollTop = $(window).scrollTop(),
				windowBottom = scrollTop + windowHeight,
				bottom = top + parallax.height,
				lax = ( parallax.belowFold  )
					? Math.round(((windowBottom - top ) * scrollRate))
					: Math.round(( (scrollTop - top) * scrollRate));

			lax = (lax >= 1 ) ? lax : 0;

			if( ( bottom > scrollTop ) && ( top < windowBottom ) ) {
				parallax.el.css('transform', "translate3D(0," + lax + "px, 0)");
			}
		});
	}; 


	/**
	 * Fixed Header Functionality
	 */
	 var fixedHeader = function() {

 		if( $body.outerWidth() < 981 ) { return; }

 		var scrolled = $(window).scrollTop();

 		if( scrolled >= windowHeight ) {
 			if( $header.hasClass('static') ) {
 				fixTheHeader();
 			}
 		}
 		else {
			if( $header.hasClass('fixed') ) {
				unFixTheHeader();
			}
 		}
 	}; 


	var fixTheHeader = function() {

		if( fixedHeaderType === 'sticky' ) {
			$header.addClass( "fixed" ).removeClass( "static" );
		}
		else if( fixedHeaderType === 'slide' ) {
			if( !$header.hasClass('header--hero--fullscreen') ) $wrapper.css( 'padding-top', $header.outerHeight() );
			$header.css( { top: '-150px' } )
			.addClass( "fixed" ).removeClass( "static" )
			.velocity( { top: $body.offset().top }, { duration: 700 });
		}
		else if( fixedHeaderType === 'fade' ) {
			if( !$header.hasClass('header--hero--fullscreen') ) $wrapper.css( 'padding-top', $header.outerHeight() );
			$header.css( 'opacity', '0' )
			.addClass( "fixed" ).removeClass( "static" )
			.velocity( "fadeIn", { duration: 600 } );
		}
 	};


 	var unFixTheHeader = function() {

		if( fixedHeaderType != 'sticky' ) {
			$wrapper.css( 'padding-top', '0' );
		}

		if( fixedHeaderType === 'slide' ) {
			$header.velocity("stop").css( { top: '0' } );
		}

		if( fixedHeaderType === 'fade' ) {
			$header.velocity("stop").css( { opacity: '1' } );
		}

		$header.removeClass( "fixed" ).addClass( "static" );
 	};


	/**
	 * Sticky Header Init
	 */
	 var stickyHeaderInit = function() {

		 if( hasFixedHeader && fixedHeaderType === 'sticky' ) {

	 		if( $body.outerWidth() < 981 ) {
				$wrapper.css( 'padding-top', '');
				return;
			}

			if( !$body.hasClass('taproot-fullscreen-hero') ) $wrapper.css( 'padding-top', $header.outerHeight() );
			$header.css( 'position', 'fixed' );
			$header.css( 'top', $wrapper.offset().top );
		}
 	}; 


	/**
	 * Fixed Footer
	 */
	var fixedFooter = function() {

		var	footerHeight = $footer.outerHeight(true),
			headerHeight = $header.outerHeight(),
 			maxFooterHeight;

		if( $body.outerWidth() < 768 ) {
			$body.css('padding-bottom', '0' );
			$footer.removeClass('footer--style-fixed').addClass( 'footer--style-sticky' );
			return;
		}

		if( $body.outerWidth() > 981 ) {
			maxFooterHeight = windowHeight - headerHeight;
		}
		else {
			maxFooterHeight = windowHeight - 50;
		}

		if( footerHeight <= maxFooterHeight  && ( ( $wrapper.outerHeight() - footerHeight ) > windowHeight ) ) {
			$body.css('padding-bottom', footerHeight );
			$footer.removeClass('footer--style-sticky').addClass( 'footer--style-fixed' );
		}
		else {
			$body.css('padding-bottom', '0' );
			$footer.removeClass('footer--style-fixed').addClass( 'footer--style-sticky' );
		}
	}; 


	/**
	 * Initialize search and menu toggles
	 */
	var toggles = function() {

		// header nav menu toggle actions
		$header.on('change', '#header-menu-toggle', function() {

			var headerNav = $('#taproot-header-nav'),
				headerMenu = headerNav.find( '.menu' );

			// dropdown slide
			if( headerNav.hasClass('header-nav--dropdown-slide') ) {

				if( $(this).is(':checked') ) {
					headerMenu.velocity( "slideDown", { duration: 500 } );
				} else {
					headerMenu.velocity( "slideUp", {
						duration: 500,
						complete: function() {
							headerMenu.css({ height: '', display: '' });
						}
					});
				}
			}

			// slide nav
			else if( headerNav.hasClass('header-nav--slide') ) {

				$wrapper.toggleClass('header-slide-nav');

				if( $wrapper.hasClass('header-slide-nav') ) {
					$body.addClass('noscroll');
					$wrapper.velocity( { left: "-300px" }, { duration: 500 } );
					headerMenu.css( {'right' : '-300px', 'top' : $wrapper.offset().top }).velocity( { right: "0px" }, { duration: 500 } );

					if( $header.hasClass('fixed') ) {
						$header.velocity( { right: "300px" }, { duration: 500 } );
					}

					if( $footer.hasClass('footer--style-fixed') ) {
						$footer.velocity( { right: "300px" }, { duration: 500 } );
					}

				} else {
					headerMenu.velocity('reverse');
					$wrapper.velocity('reverse', {
						complete: function() {
							$wrapper.css('left', '');
							$body.removeClass('noscroll');
						}
					});

					if( $header.hasClass('fixed') ) {
						$header.velocity('reverse', {
							complete: function() {
								$header.css('right', '');
							}
						});
					}

					if( $footer.hasClass('footer--style-fixed') ) {
						$footer.velocity('reverse', {
							complete: function() {
								$footer.css('right', '');
							}
						});
					}
				}
			}

			// dropdown fade or fullscreen fade
			else if( headerNav.hasClass('header-nav--dropdown-fade') || headerNav.hasClass('header-nav--fullscreen') ) {

				if( $(this).is(':checked') ) {
					headerMenu.velocity( "fadeIn", { duration: 500 } );
				} else {
					headerMenu.velocity( "fadeOut", {
						duration: 500,
						complete: function() {
							headerMenu.css({ opacity: '', display: '' });
						}
					});
				}
			}

			// prevent scrolling when fullscreen nav is active
			if( headerNav.hasClass('header-nav--fullscreen') ) {
				if( $(this).is(':checked') ) {
					$body.addClass('noscroll');
				} else {
					$body.removeClass('noscroll');
				}
			}
		}); 


		// Navbar menu toggle actions
		$header.on('change', '#navbar-menu-toggle', function() {

			var navbarNav = $('#taproot-navbar'),
				navbarMenu = navbarNav.find('.menu');

			// dropdown slide
			if( navbarNav.hasClass('navbar--dropdown-slide') ) {

				if( $(this).is(':checked') ) {
					navbarMenu.velocity( "slideDown", { duration: 500 } );
				} else {
					navbarMenu.velocity( "slideUp", {
						duration: 500,
						complete: function() {
							navbarMenu.css({ height: '', display: '' });
						}
					});
				}
			}

			// slide nav
			else if( navbarNav.hasClass('navbar--slide') ) {

				$wrapper.toggleClass('navbar-slide-nav');

				if( $wrapper.hasClass('navbar-slide-nav') ) {
					$body.addClass('noscroll');
					$wrapper.velocity( { right: "-300px" }, { duration: 500 } );
					navbarMenu.css( {'left' : '-300px', 'top' : $wrapper.offset().top })
					.velocity( { left: "0" }, { duration: 500 } );

				} else {

					navbarMenu.velocity('reverse');
					$wrapper.velocity('reverse', {
						complete: function() {
							$wrapper.css('right', '');
							$body.removeClass('noscroll');
						}
					});
				}
			}

			// dropdown fade or fullscreen fade
			else if( navbarNav.hasClass('navbar--dropdown-fade') || navbarNav.hasClass('navbar--fullscreen') ) {

				if( $(this).is(':checked') ) {
					navbarMenu.velocity( "fadeIn", { duration: 500 } );
				} else {
					navbarMenu.velocity( "fadeOut", {
						duration: 500,
						complete: function() {
							navbarMenu.css({ opacity: '', display: '' });
						}
					});
				}
			}

			// prevent scrolling when fullscreen nav is active
			if( navbarNav.hasClass('navbar--fullscreen') ) {
				if( $(this).is(':checked') ) {
					$body.addClass('noscroll');
				} else {
					$body.removeClass('noscroll');
				}
			}
		}); 


		// menu toggle animation actions
		$('.menu-toggle').on('change', function(){

			$(this).toggleClass('toggle');

			var labelToggle = $(this).next('.label-toggle'),
				middleBar = labelToggle.find('.taproot-hamburger-middle'),
				topBar = labelToggle.find('.taproot-hamburger-top'),
				bottomBar = labelToggle.find('.taproot-hamburger-bottom');

			if( $(this).hasClass('toggle') ) {

				middleBar.velocity({
					opacity: "0"
				}, { duration: 600 } );

				topBar.velocity({
					y: "40%",
			        rotateZ: "45deg",
				}, { duration: 600 } );

				bottomBar.velocity({
					y: "40%",
			        rotateZ: "-45deg",
				}, { duration: 600 } );

			} else {
				middleBar.velocity("reverse");
				topBar.velocity("reverse");
				bottomBar.velocity("reverse");
			}
		});


		// header search toggle action
		$header.on('click', '.search-toggle', function() {

			if( $wrapper.hasClass('header-slide-nav') ) return;

			var $headerContent = $('#header-content'),
				$searchContainer = $header.find('.search-container');

			if( $searchContainer.hasClass('search-not-active') ) {
				$(this).velocity({rotateZ: '360deg', opacity: '0' }, {
					duration: 500,
				});

				$('.header-content-container').velocity( { opacity: '0' }, {
					delay: 250,
					duration: 400,
					complete: function(el) {
						$searchContainer.toggleClass('search-active search-not-active')
							.velocity( { opacity: '1' }, { duration: 500 } );
						$('.header-content-container .search-toggle').css('opacity', '1').velocity({ rotateZ : '0deg' }, {duration: 0});
					}
				});

			} else {
				$(this).velocity({rotateZ: '360deg', opacity: '0' }, {
					duration: 500,
				});

				$searchContainer.velocity( { opacity: '0'}, {
					delay: 250,
					duration: 400,
					complete: function(el) {
						$searchContainer.toggleClass('search-active search-not-active');
						$('.header-content-container').velocity( { opacity: '1'}, { duration: 500 } );
						$header.find('.search-toggle').css('opacity', '1').velocity({ rotateZ : '0deg' }, {duration: 0});
					}
				});
			}
		});


		// nav dropdown toggle action
		$('.dropdown-target').on('click', function(e) {
			var parentNav = $(this).closest('nav'),
				bp = parentNav.data('mobile-bp').replace(/[^0-9]/g,'');

			e.preventDefault();

			if( $body.outerWidth() >= bp ) return false;

			var parentItem = $(this).closest('li.menu-item-has-children'),
				parentLink = $(this).closest('a'),
				subMenu = parentItem.find('.sub-menu').first();

			if( parentItem.hasClass('submenu-open') ) {
				parentItem.removeClass('submenu-open').addClass('submenu-closed');

				$(this).velocity({
			        rotateZ: "0deg",
				}, { duration: 500 } );

				subMenu.velocity( "slideUp", {
					duration: 500,
					complete: function() {
						subMenu.css({ height: '', display: '' });
					}
				});

			}
			else {
				parentItem.removeClass('submenu-closed').addClass('submenu-open');
				parentItem.find('.sub-menu').first().velocity("slideDown", { duration: 500 });
				$(this).velocity({
			        rotateZ: "180deg",
				}, { duration: 500 } );
			}
		});


		// mobile bar search toggle
		$('#taproot-mobile-bar').on('click', '.search-toggle', function() {

			var $initialContent = $('.mobile-bar__menu'),
			$searchContainer = $('#taproot-mobile-bar .search-container');

			if( $searchContainer.hasClass('search-not-active') ) {
				$(this).find('.icon').velocity({rotateZ: '360deg', opacity: '0' }, {
					duration: 500,
				});

				$initialContent.velocity( { opacity: '0' }, {
					delay: 250,
					duration: 400,
					complete: function(el) {
						$searchContainer.toggleClass('search-active search-not-active')
							.velocity( { opacity: '1' }, { duration: 500 } );
						$initialContent.find('.search-toggle .icon').css('opacity', '1').velocity({ rotateZ : '0deg' }, {duration: 0});
					}
				});

			} else {
				$(this).find('.icon').velocity({rotateZ: '360deg', opacity: '0' }, {
					duration: 500,
				});

				$searchContainer.velocity( { opacity: '0'}, {
					delay: 250,
					duration: 400,
					complete: function(el) {
						$searchContainer.toggleClass('search-active search-not-active');
						$initialContent.velocity( { opacity: '1'}, { duration: 500 } );
						$searchContainer.find('.search-toggle .icon').css('opacity', '1').velocity({ rotateZ : '0deg' }, {duration: 0});
					}
				});
			}
		});
	}; 


	/**
	 * Scroll actions
	 */
	var intervals = function() {

		if( hasFixedHeader ) {
			setInterval(function() {
				if(headerScroll) {
					fixedHeader();
					headerScroll = false;
				}
			}, 250);
		}

		if( hasParallax ) {
			setInterval(function() {
				if(parallaxScroll) {
					window.requestAnimationFrame( parallaxUpdate );
					parallaxScroll = false;
				}
			}, 20);
		}
	}; 


	/**
	 * Define header type
	 */	
	var setFixedHeaderType = function() {

		if( $header.hasClass( 'header--has-fixed--sticky' ) ) {
			fixedHeaderType = 'sticky';
		}
		else if( $header.hasClass( 'header--has-fixed--slide' ) ) {
			fixedHeaderType = 'slide';
		}
		else {
			fixedHeaderType = 'fade';
		}
	};


	/**
	 * Initiate light box modal galleries
	 */	
	var modalInit = function() {

 		$('.gallery--modal').lightGallery({
 			selector: '.gallery__item a', 
 			download: false, 
 			showThumbByDefault: false, 
 			thumbMargin: 10 
 		}); 
	};


	/**
	 * Initiate flexslider galleries
	 */		
	var sliders = function() {

		$(".flexslider--arrows, .flexslider--dots").each(function(){
			$(this).flexslider({
				animation: "slide",
			    controlNav: $(this).data('controlnav'),
			    slideshow: $(this).data('slideshow'),
			    slideshowspeed: $(this).data('duration'),
			    directionNav: $(this).data('directionnav'),
			    customDirectionNav: $(this).find(".taproot-slider-navigation a"),
			    useCSS: false			    
			});
		});

		$('.flexslider--thumbs').each(function(){
		  	var sliderId = "#" + $(this).attr('id');
		  	var carId = sliderId.replace(/slider/, 'carousel');

		  	// The slider being synced must be initialized first
			$(carId).flexslider({
				animation: "slide",
				controlNav: false,
				directionNav: true,
			    customDirectionNav: $( carId + " .taproot-slider-navigation a" ),			
				animationLoop: false,
				slideshow: false,
				itemWidth: 210,
				itemMargin: 5,
				minItems: $(this).data('minitems'),
				maxItems: $(this).data('maxitems'),
				asNavFor: sliderId,
			});

			$(sliderId).flexslider({
				animation: "slide",
				controlNav: false,
				directionNav: false,
				animationLoop: false,
			    slideshow: $(this).data('slideshow'),
			    slideshowspeed: $(this).data('duration'),
			    sync: carId
			});
		});
	};


	/**
	 * Define variables
	 */
	var vars = function() {

		$body = $('body');
 		$wrapper = $body.find( '#wrapper' );
 		$header = $body.find( '#header' );
 		$footer = $body.find( '#footer' );
		hasParallax = ( $body.find( '.parallax' ).length > 0 ) ? true : false;
 		hasStaticHeader = $body.hasClass('taproot-header-default');
 		hasFixedHeader = $header.hasClass('header--has-fixed');
 		hasFixedFooter = $footer.hasClass('footer--style-fixed');
		windowHeight = window.innerHeight;
 		scrollRate = 0.25;
		headerScroll = false;
		parallaxScroll = false;

		setFixedHeaderType();
	}; 


	/**
	 * Smooth scrolling when clicking anchor links
	 */
	var smoothscroll = function() {

		var $root = $('html, body');

		$('a[href*=\\#]').click( function() { 

			var href = $.attr(this, 'href'); 
			var targetID = href.substr(href.indexOf("#") + 1); 

			$root.animate({ 
				scrollTop: $("#" + targetID).offset().top 
			}, 850, function() { 
				window.location.hash = targetID; }); 
				return false; 
			});	
		};
	};


	/**
	 * Run on document ready
	 */
	$(document).ready(function() {
		vars();
		toggles();
		intervals();
		stickyHeaderInit();
		modalInit();
		smoothscroll();
	});


	/**
	 * Run on window load
	 */
	$(window).load(function() {

		if( hasFixedHeader ) {
			fixedHeader();
		}

		if( hasParallax ) {
			parallax();
			parallaxUpdate();
		}

		if( hasFixedFooter ) {
			fixedFooter();
		}

		sliders();	

		svg4everybody();
	});


	/**
	 * Run on window resize
	 */
	$(window).on( "resize", function() {

		windowHeight = window.innerHeight;

		if( hasFixedHeader ) {
			stickyHeaderInit();
			unFixTheHeader();
			fixedHeader();
		}

		if( $wrapper.hasClass('header-slide-nav') ) {
			$('#header-menu-toggle').trigger('change');
			//el.dispatchEvent(new Event('change'));
		}
		if( $wrapper.hasClass('navbar-slide-nav') ) {
			$('#navbar-menu-toggle').trigger('change');
			//el.dispatchEvent(new Event('change'));
		}

		// close mobile menus
		$('.menu').css( 'display', '' );


		if( hasFixedFooter ) {
			fixedFooter();
		}

		if( hasParallax ) {
			parallax();
			parallaxUpdate();
		}
	});


	/**
	 * Run on window scroll
	 */	
	$(window).on( "scroll", function() {
		headerScroll = true;
		parallaxScroll = true;
	});

}( jQuery ));
