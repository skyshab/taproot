/**
 * Header Text Color
 *
 * This file handles the JavaScript for the header text color settings in the editor.
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

function HeaderTextColorsEdit( {
    colors,
    headerDefaultColor,
    updateDefaultColor,
} ) {

    return (
        <>
            <ColorPickerControl
                label={__('Header Text Color')}
                value={headerDefaultColor}
                onChange={ value => updateDefaultColor(value) }
                colors={ colors }
            />
        </>
    );
}

export const HeaderTextColors = compose( [

    withDispatch( ( dispatch, props ) => {
        return {
            updateDefaultColor: value => {
                if( ! value ) {
                    value = '';
                }
                dispatch('core/editor').editPost({ meta: { [props.fieldName]: value } });
            }
        }
    }),
    withSelect( ( select, props ) => {
        const { getEditedPostAttribute } = select('core/editor');
        const settings = select( 'core/block-editor' ).getSettings();
        return {
            colors: settings.colors,
            headerDefaultColor: getEditedPostAttribute('meta')[props.fieldName],
        };
    })

])( HeaderTextColorsEdit );
