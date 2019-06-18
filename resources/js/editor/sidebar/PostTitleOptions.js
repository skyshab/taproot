/**
 * Post Title Component
 *
 * This file handles the JavaScript for creating a select control
 * for post title options in the block editor theme sidebar panel. 
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


const { compose } = wp.compose;
const { 
    withSelect,
    withDispatch
} = wp.data;
const { SelectControl } = wp.components;
const { __ } = wp.i18n;


export const PostTitleOptions = compose(
    withDispatch( function( dispatch, props ) {
        return {
            setMetaFieldValue: function( value ) {
                dispatch('core/editor').editPost( {meta: {[props.fieldName]: value}} );
            }
        }
    }),
    withSelect( function( select, props ) {
        return {
            metaFieldValue: select('core/editor').getEditedPostAttribute('meta')[props.fieldName],
        }
    })
)( props => {
    return (
        <SelectControl
            label={ __('Post Title') }
            value={ props.metaFieldValue }
            options={[
                { label: __('Show in Content'), value: 'content' },
                { label: __('Show in Custom Header'), value: 'header' },
                { label: __('Hide'), value: 'hide' }
            ]}         
            onChange={ content => {
                props.setMetaFieldValue(content)
            }} />
    )
})
