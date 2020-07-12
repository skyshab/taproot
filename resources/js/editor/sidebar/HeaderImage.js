/**
 * Header Image Picker Component
 *
 * This file handles the JavaScript for creating an image
 * picker control in the block editor theme sidebar panel.
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
const { compose } = wp.compose;
const {
    withSelect,
    withDispatch
} = wp.data;
const { SelectControl } = wp.components;
const { PostTypeSupportCheck } = wp.editor;
const { MediaUpload } = wp.blockEditor;
const { __ } = wp.i18n;

/**
 * Internal dependencies
 */
import { HeaderPreview } from './HeaderPreview';

function HeaderImageEdit({
    headerImage,
    headerImageType,
    setHeaderImage,
    setHeaderImageType
}) {

    // create image select
    const imageSelect =  (
        <PostTypeSupportCheck supportKeys="thumbnail">
            <SelectControl
                label={ __('Header Image') }
                value={ headerImageType }
                options={[
                    { label: __('None'), value: 'none' },
                    { label: __('Default'), value: 'default' },
                    { label: __('Use Featured Image'), value: 'featured' },
                    { label: __('Custom'), value: 'custom' }
                ]}
                onChange={ content => {
                    setHeaderImageType(content);
                }} />
        </PostTypeSupportCheck>
    )

    // create the button to add an image
    const addImage = open => {
        if ( 'custom' === headerImageType ) return (
            <button
                class="components-button is-button is-default"
                style={{marginRight: '10px' }}
                onClick={open} >
                { __('Select Image') }
            </button>
        )
    }

    // clear the saved image value
    const reset = () => {
        setHeaderImage('');
    }

    // button to clear the saved image value
    const imageReset = ( 'custom' === headerImageType && headerImage ) ? (
        <button
            class="components-button is-button is-default"
            onClick={reset} >
            { __('Clear') }
        </button>
    ) : null;

    // return the custom header image picker component
    return (
        <MediaUpload
            type="image"
            label={ __('Custom Header Image') }
            value={ headerImage }
            onSelect={ imageObject => {
                if( imageObject.sizes ) {
                    setHeaderImage( imageObject.sizes.full.url );
                }
            }}
            render={ ({open}) => [
                <HeaderPreview/>,
                imageSelect,
                addImage(open),
                imageReset
            ]}
        />
    )
}

export const HeaderImage = compose([
    withSelect( function( select ) {
        return {
            headerImage: select('core/editor').getEditedPostAttribute('meta')['_taproot_header_image'],
            headerImageType: select('core/editor').getEditedPostAttribute('meta')['_taproot_header_image_type'],
        }
    }),
    withDispatch( function( dispatch ) {
        return {
            setHeaderImage: function( value ) {
                dispatch('core/editor').editPost( { meta: { _taproot_header_image: value } } );
            },
            setHeaderImageType: function( value ) {

                dispatch('core/editor').editPost( { meta: { _taproot_header_image_type: value } } );

                if( 'custom' !== value ) {
                    dispatch('core/editor').editPost( { meta: { _taproot_header_image: '' } } );
                }

                if( 'none' === value ) {
                    dispatch('core/editor').editPost({
                        meta: {
                            _taproot_header_overlay_type: 'default',
                            _taproot_header_overlay_color: '',
                            _taproot_header_overlay_color_name: '',
                            _taproot_header_overlay_opacity: 50,
                            _taproot_header_text_color: ''
                        }
                    })
                }
            }
        }
    })
])(HeaderImageEdit)
