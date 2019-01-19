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
	 * Smooth scrolling when clicking anchor links
	 */
	var smoothscroll = function() {

		var $root = $('html, body');

		$('a[href*=\\#]').click( function() { 

			var href = $.attr(this, 'href'); 
			var targetID = href.substr(href.indexOf("#") + 1); 

			$root.animate(
				{ scrollTop: $("#" + targetID).offset().top }, 
				850, 
				function() { window.location.hash = targetID; }
			); 

			return false; 
		});
	};


	/**
	 * Run on document ready
	 */
	$(document).ready(function() {
        smoothscroll();
	});


}( jQuery ));

