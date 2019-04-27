/**
 * Custom header preview.
 *
 * This file handles the JavaScript for the live preview of the `custom-header`
 * feature in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

// Site title.
wp.customize( 'blogname', value => {
	value.bind( to => {
		document.querySelector( '.app-header__title-link' ).textContent = to;
	} );
} );

// Site description.
wp.customize( 'blogdescription', value => {
	value.bind( to => {
		document.querySelector( '.app-header__description' ).textContent = to;
	} );
} );

// Header text color.
wp.customize( 'header_textcolor', value => {
	value.bind( to => {
		var headerItems = document.querySelectorAll(
			'.app-header__title-link, .app-header__description'
		);

		headerItems.forEach( function( text ) {

			if ( 'blank' === to ) {
				text.style.clip     = 'rect(0 0 0 0)';
				text.style.position = 'absolute';
			} else {
				text.style.clip     = null;
				text.style.position = null;
				text.style.color    = to;
			}
		} );
	} );
} );
