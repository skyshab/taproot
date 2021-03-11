/**
 * Extend Color object
 *
 * This file handles the JavaScript to extend the Color object to support RGBA
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2021 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

Color.prototype.toString = function(flag) {
    // If no-alpha flag is passed in, output with full opacity
    if ('no-alpha' === flag) {
        return this.toCSS('rgba', '1').replace(/\s+/g, '');
    }

    // If opacity value is set, output RGBa
    if (1 > this._alpha) {
        return this.toCSS('rgba', this._alpha).replace(/\s+/g, '');
    }

    // Bail if there's an error
    if (this.error) {
        return '';
    }

    // Proceed with stock color.js hex output
    let hex = parseInt(this._color, 10).toString(16);
    if (6 > hex.length) {
        for (let i = 6 - hex.length - 1; i >= 0; i--) {
            hex = '0' + hex;
        }
    }

    // Return hex value
    return '#' + hex;
};
