/**
 * Hero Overlay
 *
 * This file handles the JavaScript for the hero overlay settings in the editor.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


/**
 * WordPress dependencies
 */
const { withSelect, withDispatch } = wp.data;
const { compose } = wp.compose;
const { __ } = wp.i18n;

/*
 * Internal Dependencies
 */
import { ColorPickerControl } from '../controls/colorPicker';

function HeroTextColorsEdit( {
    imageType,
    colors,
    heroDefaultColor,
    heroDefaultHoverColor,
    updateDefaultColor,
    updateDefaultHoverColor
} ) {

    return 'none' !== imageType && (
        <>
            <ColorPickerControl
                label={__('Hero Text Color')}
                value={heroDefaultColor}
                onChange={ value => updateDefaultColor(value) }
                colors={ colors }
            />

            <ColorPickerControl
                label={__('Hero Link Hover Color')}
                value={heroDefaultHoverColor}
                onChange={ value => updateDefaultHoverColor(value) }
                colors={ colors }
            />
        </>
    );
}

export const HeroTextColors = compose( [

    withSelect( ( select ) => {

        const { getEditedPostAttribute } = select('core/editor');
        const settings = select( 'core/block-editor' ).getSettings();

        return {
            imageType: getEditedPostAttribute('meta')['taproot_custom_header_image_type'],
            colors: settings.colors,
            heroDefaultColor: getEditedPostAttribute('meta')['taprooot_hero_default_color'],
            heroDefaultHoverColor: getEditedPostAttribute('meta')['taprooot_hero_default_hover_color'],
        };
    }),
    withDispatch( function( dispatch ) {

        return {
            updateDefaultColor: value => {
                if(!value) {
                    value = '';
                }
                dispatch('core/editor').editPost({ meta: { taprooot_hero_default_color: value } });
            },
            updateDefaultHoverColor: value => {
                if(!value) {
                    value = '';
                }
                dispatch('core/editor').editPost({ meta: { taprooot_hero_default_hover_color: value } });
            }
        }
    })

])( HeroTextColorsEdit );
