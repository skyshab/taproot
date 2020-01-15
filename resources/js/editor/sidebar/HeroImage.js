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
import { HeroPreview } from './HeroPreview';


function HeroImageEdit({
    heroImage,
    heroImageType,
    setHeroImage,
    setHeroImageType
}) {

    // create image select
    const imageSelect =  (
        <PostTypeSupportCheck supportKeys="thumbnail">
            <SelectControl
                label={ __('Hero Header Image') }
                value={ heroImageType }
                options={[
                    { label: __('None'), value: 'none' },
                    { label: __('Default'), value: 'default' },
                    { label: __('Use Featured Image'), value: 'featured' },
                    { label: __('Custom'), value: 'custom' }
                ]}
                onChange={ content => {
                    setHeroImageType(content);
                }} />
        </PostTypeSupportCheck>
    )

    // create the button to add an image
    const addImage = (open) => {
        if ( 'custom' === heroImageType ) return (
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
        setHeroImage('');
    }

    // button to clear the saved image value
    const imageReset = ( 'custom' === heroImageType && heroImage ) ? (
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
            value={ heroImage }
            onSelect={ imageObject => {
                if(imageObject.sizes) {
                    setHeroImage(imageObject.sizes.full.url);
                }
            }}
            render={ ({open}) => [
                <HeroPreview/>,
                imageSelect,
                addImage(open),
                imageReset
            ]}
        />
    )
}


export const HeroImage = compose([
    withSelect( function( select ) {
        return {
            heroImage: select('core/editor').getEditedPostAttribute('meta')['taproot_custom_header_image'],
            heroImageType: select('core/editor').getEditedPostAttribute('meta')['taproot_custom_header_image_type'],
        }
    }),
    withDispatch( function( dispatch ) {
        return {
            setHeroImage: function( value ) {
                dispatch('core/editor').editPost({meta:{taproot_custom_header_image: value}})
            },
            setHeroImageType: function( value ) {
                dispatch('core/editor').editPost( {meta: { taproot_custom_header_image_type: value}} );

                if ('custom' !== value) {
                    dispatch('core/editor').editPost({meta:{taproot_custom_header_image: ''}})
                }
                if('none' === value) {
                    dispatch('core/editor').editPost({
                        meta: {
                            taprooot_hero_overlay_type: 'default',
                            taprooot_hero_overlay_color: '',
                            taprooot_hero_overlay_color_name: '',
                            taprooot_hero_overlay_opacity: 50,
                            taprooot_hero_default_color: '',
                            taprooot_hero_default_hover_color: ''
                        }
                    })
                }
            }

        }
    })
])(HeroImageEdit)
