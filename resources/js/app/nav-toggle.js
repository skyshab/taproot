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
	 * Initialize search and menu toggles
	 */
	var toggleInit = function() {

		// menu toggle animation actions
		$('.menu--toggle').on('click', function(){

			$(this).toggleClass('open');

			var middleBar = $(this).find('.taproot-hamburger-middle'),
				topBar = $(this).find('.taproot-hamburger-top'),
				bottomBar = $(this).find('.taproot-hamburger-bottom');

			if( $(this).hasClass('open') ) {

				middleBar.velocity({
					opacity: "0"
				}, { duration: 600 } );

				topBar.velocity({
					y: "40%",
			        rotateZ: "45deg"
				}, { duration: 600 } );

				bottomBar.velocity({
					y: "40%",
			        rotateZ: "-45deg"
				}, { duration: 600 } );

			} else {
				middleBar.velocity("reverse");
				topBar.velocity("reverse");
				bottomBar.velocity("reverse");
			}
		});
    }; 
    

	/**
	 * Run on document ready
	 */
	$(document).ready(function() {
		toggleInit();
	});

}( jQuery ));
