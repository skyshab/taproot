/**
 * Layout Picker Component
 *
 * This file handles the JavaScript for creating a layout picker
 * control in the block editor theme sidebar panel.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

const {
    withSelect,
    withDispatch
} = wp.data;
const { compose } = wp.compose;
const { SelectControl } = wp.components;
const { __ } = wp.i18n;

export const SidebarLayout = compose(
    withDispatch( function( dispatch, props ) {
        return {
            setMetaFieldValue: function( value ) {
                dispatch('core/editor').editPost( {meta: {[props.fieldName]: value}} )
            }
        }
    }),
    withSelect( function( select, props ) {
        return {
            metaFieldValue: select('core/editor').getEditedPostAttribute('meta')[props.fieldName]
        }
    })
)( props => {
    return (
        <SelectControl
            label={ __('Sidebar Layout') }
            value={ props.metaFieldValue }
            options={[
                { label: __('Default'), value: 'default' },
                { label: __('No Sidebar'), value: 'full' },
                { label: __('Sidebar on Right'), value: 'right' },
                { label: __('Sidebar on Left'), value: 'left' }
            ]}
            onChange={ content => {
                props.setMetaFieldValue( content );
            }} />
    )
})
