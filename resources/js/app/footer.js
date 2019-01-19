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
        $header,
		$footer,
		windowHeight,
		hasFixedFooter;


	/**
	 * Fixed Footer
	 */
	var fixedFooter = function() {

		var	footerHeight = $footer.outerHeight(true),
			headerHeight = $header.outerHeight(),
 			maxFooterHeight;

		if( $body.outerWidth() < 1025 ) {
			$body.css('padding-bottom', '' );
			$footer.removeClass( 'app-footer--fixed' );
			return;
		}

		if( $body.outerWidth() > 1024 ) {
			maxFooterHeight = windowHeight - headerHeight;
		}

		if( footerHeight <= maxFooterHeight  && ( ( $wrapper.outerHeight() - footerHeight ) > windowHeight ) ) {
            $body.css('padding-bottom', Math.floor( footerHeight ) );
			$footer.addClass( 'app-footer--fixed' );
		}
		else {
			$body.css('padding-bottom', '' );
			$footer.removeClass( 'app-footer--fixed' );
		}
	}; 


	/**
	 * Run on document ready
	 */
	$(document).ready(function() {
		$body = $('body');
 		$wrapper = $body.find( '.app' );
 		$header = $body.find( '.app-header' );
 		$footer = $body.find( '.app-footer' );
 		hasFixedFooter = $footer.hasClass('app-footer--has-fixed');
        windowHeight = window.innerHeight;	
    });


	/**
	 * Run on window load
	 */
	$(window).load(function() {
		if( hasFixedFooter ) {
			fixedFooter();
		}
	});


	/**
	 * Run on window resize
	 */
	$(window).on( "resize", function() {

		windowHeight = window.innerHeight;

		if( hasFixedFooter ) {
			fixedFooter();
		}
	});

}( jQuery ));
