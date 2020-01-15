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
const { RangeControl, SelectControl } = wp.components;
const { __ } = wp.i18n;

/**
 * Internal dependencies
 */
import { ColorPickerControl } from '../controls/colorPicker';


function HeroOverlayEdit( {
    imageType,
    colors,
    overlayType,
    overlayColor,
    overlayOpacity,
    updateOverlayType,
    updateOverlayColor,
    updateOverlayOpacity
} ) {

    return 'none' !== imageType && (
        <>
        <SelectControl
            label={ __('Hero Overlay') }
            value={ overlayType }
            options={[
                { label: __('Default'), value: 'default' },
                { label: __('Custom'), value: 'custom' },
                { label: __('None'), value: 'none' },
            ]}
            onChange={ value => updateOverlayType(value) }
        />

        { 'custom' === overlayType &&
            <ColorPickerControl
                label={__('Hero Overlay Color')}
                value={overlayColor}
                onChange={ value => updateOverlayColor(value) }
                colors={ colors }
            />
        }

        { 'custom' === overlayType &&
            <RangeControl
                label={ __( 'Hero Overlay Opacity' ) }
                value={ overlayOpacity }
                onChange={ value => updateOverlayOpacity(value) }
                min={ 0 }
                max={ 100 }
                step={ 10 }
                required
            />
        }
        </>
    );
}

export const HeroOverlay = compose( [
    withSelect( ( select ) => {

        const { getEditedPostAttribute } = select('core/editor');
        const settings = select( 'core/block-editor' ).getSettings();

        return {
            imageType: getEditedPostAttribute('meta')['taproot_custom_header_image_type'],
            colors: settings.colors,
            overlayType: getEditedPostAttribute('meta')['taprooot_hero_overlay_type'],
            overlayColor: getEditedPostAttribute('meta')['taprooot_hero_overlay_color'],
            overlayColorName: getEditedPostAttribute('meta')['taprooot_hero_overlay_color_name'],
            overlayOpacity: getEditedPostAttribute('meta')['taprooot_hero_overlay_opacity']
        };
    }),
    withDispatch( function( dispatch, {colors} ) {

        return {

            updateOverlayType: value => {
                dispatch('core/editor').editPost({ meta: { taprooot_hero_overlay_type: value } });
            },
            updateOverlayColor: value => {
                if(!value) {
                    value = '';
                }
                dispatch('core/editor').editPost({ meta: { taprooot_hero_overlay_color: value } });

                const colorObj = wp.blockEditor.getColorObjectByColorValue(colors, value);
                const colorSlug = (colorObj && colorObj.slug) ? colorObj.slug : ''

                dispatch('core/editor').editPost({ meta: { taprooot_hero_overlay_color_name: colorSlug } });
            },
            updateOverlayOpacity: value => {
                dispatch('core/editor').editPost({ meta: { taprooot_hero_overlay_opacity: value } });
            }
        }
    })
])( HeroOverlayEdit );
