/**
 * Hero Overlay
 *
 * This file handles the JavaScript for the hero overlay settings in the editor.
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
const { withSelect, withDispatch } = wp.data;
const { compose } = wp.compose;
const { RangeControl } = wp.components;
const { __ } = wp.i18n;


function HeroHeightEdit( {
    heroHeight,
    updateHeroHeight
} ) {

    return (
        <>
        <RangeControl
            label={ __( 'Hero Header Height' ) }
            value={ heroHeight }
            onChange={ value => updateHeroHeight(value) }
            min={ 0 }
            max={ 100 }
            step={ 1 }
            required
        />
        </>
    );
}

export const HeroHeight = compose( [
    withSelect( ( select ) => {

        const { getEditedPostAttribute } = select('core/editor');

        return {
            heroHeight: getEditedPostAttribute('meta')['taprooot_hero_height']
        };
    }),
    withDispatch( function( dispatch ) {
        return {
            updateHeroHeight: value => {
                dispatch('core/editor').editPost({ meta: { taprooot_hero_height: value } });
            }
        }
    })
])( HeroHeightEdit );
