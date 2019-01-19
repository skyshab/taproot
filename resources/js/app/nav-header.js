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

		// header nav menu toggle actions
		$header.on('click', '.menu--header .menu--toggle', function() {

			var headerNav = $('.menu--header'),
				headerMenu = headerNav.find( '.menu__items' );

			// dropdown slide
			if( headerNav.hasClass('mobile-type-dropdown-slide') ) {

				if( $(this).hasClass('open') ) {
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
			else if( headerNav.hasClass('mobile-type-slide') ) {

				$wrapper.toggleClass('header-slide-nav');

				if( $wrapper.hasClass('header-slide-nav') ) {
                    $body.addClass('noscroll');
                    headerMenu.css( {
                        'display' : 'flex',
                        'top' : $wrapper.offset().top, 
                        'right' : $wrapper.offset().left
                    } );

					$wrapper.velocity( { left: "-300px" }, { duration: 500 } );


					if( $header.hasClass('fixed') ) {
						$header.velocity( { right: "300px" }, { duration: 500 } );
					}

					if( $footer.hasClass('footer--style-fixed') ) {
                        $footer.velocity( { right: "300px" }, { duration: 500 } );
                    }

                }
				else {
					headerMenu.velocity('reverse');
					$wrapper.velocity('reverse', {
						complete: function() {
                            $wrapper.css('left', '');
                            headerMenu.css( {
                                'display' : 'none'
                            });                             
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
			else if( headerNav.hasClass('mobile-type-dropdown-fade') || headerNav.hasClass('mobile-type-fullscreen') ) {

				if( $(this).hasClass('open') ) {
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
			if( headerNav.hasClass('mobile-type-fullscreen') ) {
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

		if( $wrapper.hasClass('header-slide-nav') ) {
			// $('#header-menu-toggle').trigger('change');
		}

	});

}( jQuery ));
