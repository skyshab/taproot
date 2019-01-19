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
		windowHeight,
		hasFixedHeader,
		fixedHeaderType;

	/**
	 * Fixed Header Functionality
	 */
	 var fixedHeader = function() {

        window.addEventListener('wheel', function(e) {
            headerCheck(e);
        });   
     }; 
     

    var headerCheck = function(e) {

        // if screen is not wide enough for fixed header,
        // make sure it's unfixed and bail
        if( $body.outerWidth() < 1025 ) { 
            unFixTheHeader();
            return; 
        }

        // store the distance scrolled from top
        var scrolled = $(window).scrollTop();

        // store delta for determining scroll direction
        var delta = (e.wheelDelta) ? e.wheelDelta : -1 * e.deltaY;


        // if scrolled past window height and are scrolling down,
        // fix the header
        if( scrolled >= windowHeight && delta < 0 ) {
            if( $header.hasClass('app-header--static') ) {
                fixTheHeader();
            }              
        }
        // otherwise, unfix the header
        else if( $header.hasClass('app-header--fixed') ) {
            unFixTheHeader();
        }
    };


	var fixTheHeader = function() {

        if( $body.outerWidth() < 1025 ) { return false; }

		if( fixedHeaderType === 'sticky' ) {
			$header.addClass( "app-header--fixed" ).removeClass( "app-header--static" );
		}
		else if( fixedHeaderType === 'slide' ) {
			if( !$header.hasClass('header--hero--fullscreen') ) $wrapper.css( 'padding-top', $header.outerHeight() );
			$header.css( { top: '-150px' } )
			.addClass( "app-header--fixed" ).removeClass( "app-header--static" )
			.velocity( { top: $body.offset().top }, { duration: 700 });
		}
		else if( fixedHeaderType === 'fade' ) {
			if( !$header.hasClass('header--hero--fullscreen') ) $wrapper.css( 'padding-top', $header.outerHeight() );
			$header.css( 'opacity', '0' )
			.addClass( "app-header--fixed" ).removeClass( "app-header--static" )
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

		$header.removeClass( "app-header--fixed" ).addClass( "app-header--static" );
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
	 * Define header type
	 */	
	var setFixedHeaderType = function() {

		if( $header.hasClass( 'fixed-type--sticky' ) ) {
			fixedHeaderType = 'sticky';
		}
		else if( $header.hasClass( 'fixed-type--slide' ) ) {
			fixedHeaderType = 'slide';
		}
		else {
			fixedHeaderType = 'fade';
		}
	};


	/**
	 * Define variables
	 */
	var vars = function() {

		$body = $('body');
 		$wrapper = $body.find( '.app' );
 		$header = $body.find( '.app-header' );
 		hasFixedHeader = $header.hasClass('app-header--has-fixed');
		windowHeight = window.innerHeight;

		setFixedHeaderType();
	}; 



	/**
	 * Run on document ready
	 */
	$(document).ready(function() {
		vars();
        stickyHeaderInit();
        fixedHeader();
	});


	/**
	 * Run on window load
	 */
	$(window).load(function() {
		if( hasFixedHeader && $(window).scrollTop() >= windowHeight ) {
            fixTheHeader();
		}
	});


	/**
	 * Run on window resize
	 */
	$(window).on( "resize", function(e) {

		windowHeight = window.innerHeight;

		if( hasFixedHeader ) {
			stickyHeaderInit();
			headerCheck(e);
		}
	});

}( jQuery ));
