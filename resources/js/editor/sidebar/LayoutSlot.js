/**
 * Layout Slot
 *
 * This file handles the JavaScript for creating a slot for adding
 * additional controls to the layout section.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

/**
 * WordPress dependencies
 */
const { createSlotFill } = wp.components;

const { Fill, Slot } = createSlotFill( 'LayoutSlot' );
const LayoutSlot = ( { children } ) => (
    <Fill>{ children }</Fill>
);

LayoutSlot.Slot = Slot;

export {LayoutSlot};
