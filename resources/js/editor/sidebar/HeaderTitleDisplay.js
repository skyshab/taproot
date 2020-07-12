/**
 * Enable Header Title
 *
 * This file handles the JavaScript for the setting that adds the title to the header content.
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
const { __ } = wp.i18n;
const { compose } = wp.compose;
const { ToggleControl } = wp.components;
const { withSelect, withDispatch } = wp.data;

export const HeaderTitleDisplay = compose(
    withDispatch( (dispatch, props) => {
        return {
            setCheckboxValue: value => {
                dispatch('core/editor').editPost({ meta: { [props.fieldName]: value } })
            }
        }
    }),
    withSelect( (select, props) => {
        return {
            checkboxValue: select('core/editor').getEditedPostAttribute('meta')[props.fieldName],
        }
    })
)( props => {

    // return the component
    return (
        <ToggleControl
            label={ __('Display title in header') }
            checked={ props.checkboxValue }
            onChange={ isChecked => {
                isChecked = (isChecked) ? 1 : 0;
                props.setCheckboxValue( isChecked );
            }} />
    )
})
