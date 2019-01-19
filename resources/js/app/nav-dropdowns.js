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
	var $targets;


	/**
	 * Initialize dropdown event handlers
	 */
	var handlers = function() {

		// nav dropdown toggle action
		$targets.on('click', function(e) {
			// var parentNav = $(this).closest('nav'),
			// 	bp = parentNav.data('mobile-bp').replace(/[^0-9]/g,'');

			e.preventDefault();

			// if( $body.outerWidth() >= bp ) return false;

			var parentItem = $(this).closest('.menu__item.has-children'),
				subMenu = parentItem.find('.menu__sub-menu').first();

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
				parentItem.find('.menu__sub-menu').first().velocity("slideDown", { duration: 500 });
				$(this).velocity({
			        rotateZ: "180deg",
				}, { duration: 500 } );
			}
		});

	}; 


	/**
	 * Define variables
	 */
	var vars = function() {
        $targets = $('.dropdown-target');
	}; 


	/**
	 * Run on document ready
	 */
	$(document).ready(function() {
		vars();
		handlers();
	});


	/**
	 * Run on window resize
	 */
	$(window).on( "resize", function() {

		// close mobile menus
		$('.menu__items').css( 'display', '' );

	});

}( jQuery ));
