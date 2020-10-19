/**
 * Multicheck
 *
 * This file handles the JavaScript for the multicheck customizer control.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

class Multicheck {

    constructor() {
        this.handlers();
    }

    handlers() {

        document.querySelectorAll( '.customize-control-checkbox-multiple input[type="checkbox"]' ).forEach( cb => {
            cb.addEventListener('change', (e) => {
                const $this = e.target;
                const control = $this.closest('.customize-control');
                const checked = control.querySelectorAll( 'input[type="checkbox"]:checked' );
                const input = control.querySelector( 'input[type="hidden"]' );
                var list = [];

                checked.forEach( check => {
                    list.push( check.value );
                });

                input.value = list.join();
                input.dispatchEvent( new Event('change') );
            });
        });
    }
}


/**
 * Run on document ready
 */
document.addEventListener('DOMContentLoaded', () => {
    const multicheck = new Multicheck();
});
