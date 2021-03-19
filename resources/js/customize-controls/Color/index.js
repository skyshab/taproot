/**
 * Customize control - Color
 *
 * This file handles the JavaScript for the color control in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2021 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

import './ColorToString.js';
import AlphaColor from './AlphaColor.js';

wp.customize.controlConstructor['alpha-color'] = wp.customize.Control.extend({
    ready: function() {
        let alphaControl = new AlphaColor(this);
    },
});
