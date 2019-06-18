/**
 * Header Image Picker Component
 *
 * This file handles the JavaScript for creating an image
 * picker control in the block editor theme sidebar panel.
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
const { MediaUpload, PostTypeSupportCheck } = wp.editor;
const { __ } = wp.i18n;
const {doAction} = wp.hooks;

export const HeaderImagePicker = compose(
    withDispatch( function( dispatch, props ) {
        return {
            setMetaFieldValue: function( value ) {
                dispatch('core/editor').editPost({meta:{[props.fieldName]: value}})
            },
            setSelectValue: function( value ) {
                dispatch('core/editor').editPost( {meta: { taproot_custom_header_image_type: value}} );

                if ('custom' !== value) {
                    dispatch('core/editor').editPost({meta:{[props.fieldName]: ''}})
                }
            }
        }
    }),
    withSelect( function( select, props ) {
        const { getMedia } = select('core');
        const { getEditedPostAttribute } = select('core/editor');
        let featuredImageSrc = 0;

        if ( getEditedPostAttribute('featured_media') ) {
            featuredImageSrc = getMedia( getEditedPostAttribute('featured_media') )
        }
        return {
            metaFieldValue: select('core/editor').getEditedPostAttribute('meta')[props.fieldName],
            featuredImage: featuredImageSrc,
            selectValue: select('core/editor').getEditedPostAttribute('meta')['taproot_custom_header_image_type'],
        }
    })
)( props => {

    // create image select
    const imageSelect =  (
        <PostTypeSupportCheck supportKeys="thumbnail">
            <SelectControl
                label={ __('Custom Header Image') }
                value={ props.selectValue }
                options={[
                    { label: __('None'), value: 'none' },
                    { label: __('Default'), value: 'default' },
                    { label: __('Use Featured Image'), value: 'featured' },
                    { label: __('Custom'), value: 'custom' }
                ]}
                onChange={ content => {
                    props.setSelectValue(content);
                }} />
        </PostTypeSupportCheck>
    )

    // create the image preview element
    const preview = () => {
        let imageSource = false;
        if ( 'featured' === props.selectValue ) {
            if ( props.featuredImage ) imageSource = props.featuredImage.source_url
        }
        else if ( 'default' === props.selectValue ) {
            if (typeof taprootDefaultHeaderImage !== 'undefined') {
                imageSource = taprootDefaultHeaderImage
            }
        }
        else if ( 'custom' === props.selectValue && props.metaFieldValue) {
            imageSource = props.metaFieldValue
        }

        // action that fires whenever changing the preview.
        // passes in image url.
        // Used to change hero content background image in our plugin.
        doAction('taproot.plugin.headerImageChange', imageSource);

        if ( imageSource ) return (
            <div className="media-preview-wrapper">
                <img
                    src={imageSource}
                    class="media-preview" />
            </div>
        )
    }

    // create the button to add an image
    const addImage = (open) => {
        if ( 'custom' === props.selectValue ) return (
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
        props.setMetaFieldValue('');
    }

    // button to clear the saved image value
    const imageReset = ( 'custom' === props.selectValue && props.metaFieldValue ) ? (
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
            value={ props.metaFieldValue }
            onSelect={ imageObject => {
                if (imageObject.sizes) props.setMetaFieldValue(imageObject.sizes.full.url);
            }}
            render={ ({open}) => [
                imageSelect,
                preview(),
                addImage(open),
                imageReset
            ]}
        />
    )
})
