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
const { CheckboxControl } = wp.components;
const { MediaUpload } = wp.editor;
const { __ } = wp.i18n;


export const HeaderImagePicker = compose(
    withDispatch( function( dispatch, props ) {
        return {
            setMetaFieldValue: function( value ) {
                dispatch('core/editor').editPost({meta:{[props.fieldName]: value}})
            },
            setCheckboxValue: function( value ) {
                dispatch('core/editor').editPost({ meta: { taprooot_use_featured_image_for_header: value } })
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
            checkboxValue: select('core/editor').getEditedPostAttribute('meta')['taprooot_use_featured_image_for_header'],  
            featuredImage: featuredImageSrc            
        }
    })
)( props => { 

    // create component title
    const title = ( <span>{ __('Custom Header Image') }</span> );   

    // create the image preview element        
    const preview = () => {
        let imageSource = false;
        if ( props.checkboxValue === 1 ) {
            if ( props.featuredImage ) imageSource = props.featuredImage.source_url
        }
        else if ( props.metaFieldValue ) {
            imageSource = props.metaFieldValue
        }
        if ( imageSource ) return (
            <img 
                src={imageSource} 
                style={{ marginTop: '6px' }} 
                class="media-preview" />
        )          
    }
    
    // create checkbox control for using featured image
    const checkbox = (
        <CheckboxControl
            label={ __('Use Featured Image') }
            checked={ props.checkboxValue }
            onChange={ ( isChecked ) => {
                isChecked = (isChecked) ? 1 : 0;
                props.setCheckboxValue( isChecked );
            }} />
    )

    // create the button to add an image
    const addImage = (open) => {
        if ( props.checkboxValue !== 1 ) return (
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
        props.setMetaFieldValue('')
    }

    // button to clear the saved image value
    const imageReset = ( props.checkboxValue !== 1 && props.metaFieldValue ) ? (
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
                if (imageObject.sizes) props.setMetaFieldValue(imageObject.sizes.full.url)
            }}                
            render={ ({open}) => [
                title,
                preview(),                    
                checkbox,
                addImage(open),
                imageReset                 
            ]}
        />
    )
})
