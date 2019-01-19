/**
 * Primary front-end script.
 *
 * Primary JavaScript file. Any includes or anything imported should
 * be filtered through this file and eventually saved back into the
 * `/dist/js/app.js` file.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


/**
 * Taproot Front End Functionality
 */
( function($) {

	/**
	 * Variables available to our methods
	 */
	var $body,
		$wrapper,
		$header;


	/**
	 * Initialize search and menu toggles
	 */
	var toggles = function() {

		// Navbar menu toggle actions
		$header.on('click', '.menu--navbar .menu--toggle', function() {

			var navbarNav = $('.menu--navbar'),
				navbarMenu = navbarNav.find('.menu__items');

			// dropdown slide
			if( navbarNav.hasClass('mobile-type-dropdown-slide') ) {

				if( $(this).hasClass('open') ) {
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
			else if( navbarNav.hasClass('mobile-type-slide') ) {

				$wrapper.toggleClass('navbar-slide-nav');

				if( $wrapper.hasClass('navbar-slide-nav') ) {
                    $body.addClass('noscroll');
                    navbarMenu.css( {
                        'display' : 'flex',
                        'top' : $wrapper.offset().top, 
                        'left' : $wrapper.offset().left 
                    } );

					$wrapper.velocity( { right: "-300px" }, { duration: 500 } );
					// navbarMenu.css( {'left' : '-300px', 'top' : $wrapper.offset().top }).velocity( { left: "0" }, { duration: 500 } );

				} else {

					navbarMenu.velocity('reverse');
					$wrapper.velocity('reverse', {
						complete: function() {
                            $wrapper.css('right', '');
                            navbarMenu.css( {
                                'display' : 'none'
                            } );                            
							$body.removeClass('noscroll');
						}
					});
				}
			}

            // dropdown fade or fullscreen fade
			else if( navbarNav.hasClass('mobile-type-dropdown-fade') || navbarNav.hasClass('mobile-type-fullscreen') ) {

				if( $(this).hasClass('open') ) {
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
			if( navbarNav.hasClass('mobile-type-fullscreen') ) {
				if( $(this).hasClass('open') ) {
					$body.addClass('noscroll');
				} else {
					$body.removeClass('noscroll');
				}
			}
		}); 

	}; 


	/**
	 * Define variables
	 */
	var vars = function() {
		$body = $('body');
 		$wrapper = $body.find( '.app' );
 		$header = $body.find( '.app-header' );
	}; 


	/**
	 * Run on document ready
	 */
	$(document).ready(function() {
		vars();
		toggles();
	});


	/**
	 * Run on window resize
	 */
	$(window).on( "resize", function() {
		if( $wrapper.hasClass('navbar-slide-nav') ) {
			// $('#navbar-menu-toggle').trigger('change');
		}
	});

}( jQuery ));
