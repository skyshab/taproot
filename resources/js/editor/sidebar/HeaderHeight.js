/**
 * Header Image Overlay
 *
 * This file handles the JavaScript for the header overlay settings in the editor.
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
const { RangeControl } = wp.components;
const { __ } = wp.i18n;


function HeaderHeightEdit( {
    headerHeight,
    updateHeaderHeight
} ) {

    return (
        <>
        <RangeControl
            label={ __( 'Header Height' ) }
            value={ headerHeight }
            onChange={ value => updateHeaderHeight(value) }
            min={ 0 }
            max={ 100 }
            step={ 1 }
            required
        />
        </>
    );
}

export const HeaderHeight = compose( [
    withSelect( ( select ) => {

        const { getEditedPostAttribute } = select('core/editor');

        return {
            headerHeight: getEditedPostAttribute('meta')['_taproot_header_height']
        };
    }),
    withDispatch( function( dispatch ) {
        return {
            updateHeaderHeight: value => {
                dispatch('core/editor').editPost({ meta: { _taproot_header_height: value } });
            }
        }
    })
])( HeaderHeightEdit );
