/**
 * Primary front-end script.
 *
 * Primary JavaScript file. Any includes or anything imported should
 * be filtered through this file and eventually saved back into the
 * `/dist/js/app.js` file.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


/**
 * Navigation Menu Interactions
 */
class TaprootFooter {

    /**
     * Initiate class
     */
    constructor() {
        this.body = document.querySelector('body');
        this.app = document.querySelector('.app');
        this.header = document.querySelector('.app-header');
        this.footer = document.querySelector('.app-footer');
        this.hasFixedFooter = this.footer.classList.contains('app-footer--has-fixed');
        this.windowHeight = window.innerHeight;

        if ( this.hasFixedFooter ) {
            this.listeners();
        }
    }


    /**
     * Add event listeners
     */
    listeners() {
        window.addEventListener('load', () => {
            this.fixedFooter();
        });
        window.addEventListener('resize', () => {
            this.windowHeight = window.innerHeight;
            this.fixedFooter();
        });
    }


    /**
     * Fixed footer toggle
     */
    fixedFooter() {
		const footerHeight = this.footer.offsetHeight;

		if ( 1025 > this.body.offsetWidth ) {
			this.app.style.marginBottom = '';
			this.footer.classList.remove( 'app-footer--fixed' );
        } else {
            if ( footerHeight + 250 < this.windowHeight ) {
                this.app.style.marginBottom = Math.floor( footerHeight ) + 'px';
                this.footer.classList.add( 'app-footer--fixed' );
            } else {
                this.app.style.marginBottom = '';
                this.footer.classList.remove( 'app-footer--fixed' );
            }
        }
	}
}


/**
 * Run on document ready
 */
document.addEventListener('DOMContentLoaded', () => {
    const taprootFooter = new TaprootFooter();
});
