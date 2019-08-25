/**
 * Hero Preview
 *
 * This file handles the JavaScript for the hero image preview.
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
const { withSelect } = wp.data;
const { compose } = wp.compose;
const { __ } = wp.i18n;


function HeroPreviewEdit({
    imageSource,
    overlayType,
    overlayColor,
    overlayOpacity,
    defaultColor,
    defaultHoverColor,
}) {

    return imageSource && (
        <>
        <style>
            {`.taproot-overlay-preview-text:hover {color: ${defaultHoverColor}!important;}`}
        </style>
        <div className="media-preview-wrapper">
            <img
                src={imageSource}
                class="media-preview" />

            { 'none' !== overlayType &&
                <div className='taproot-overlay' style={{backgroundColor: overlayColor, opacity: overlayOpacity}}></div>
            }

            <a href="#" class="taproot-overlay-preview-text" style={{color: defaultColor}} >
                { __('Hero Preview') }
            </a>
        </div>
        </>
    );
}

export const HeroPreview = compose( [
    withSelect( function( select ) {
        const { getMedia } = select('core');
        const { getEditedPostAttribute } = select('core/editor');

        let imageSource = false;
        const imageType = getEditedPostAttribute('meta')['taproot_custom_header_image_type'];
        const customImage = getEditedPostAttribute('meta')['taproot_custom_header_image'];
        let featuredImage = 0;

        if ( getEditedPostAttribute('featured_media') ) {
            featuredImage = getMedia( getEditedPostAttribute('featured_media') )
        }

        if ( 'featured' === imageType ) {
            if ( featuredImage ) {
                imageSource = featuredImage.source_url;
            }
        }
        else if ( 'default' === imageType ) {
            if (typeof taprootEditorData !== 'undefined') {
                imageSource = taprootEditorData.headerImage;
            }
        }
        else if ( 'custom' === imageType && customImage) {
            imageSource = customImage
        }

        const overlayType = getEditedPostAttribute('meta')['taprooot_hero_overlay_type'];
        let overlayColor = getEditedPostAttribute('meta')['taprooot_hero_overlay_color'];
        let overlayOpacity = getEditedPostAttribute('meta')['taprooot_hero_overlay_opacity'];
        let defaultColor = getEditedPostAttribute('meta')['taprooot_hero_default_color'];
        let defaultHoverColor = getEditedPostAttribute('meta')['taprooot_hero_default_hover_color'];

        if (typeof taprootEditorData !== 'undefined') {

            if( !overlayType || 'default' === overlayType) {
                overlayColor = taprootEditorData.headerOverlayColor;
                overlayOpacity = taprootEditorData.headerOverlayOpacity;
            }

            if( !defaultColor ) {
                defaultColor = taprootEditorData.headerHeroDefaultColor;
            }

            if( !defaultHoverColor ) {
                defaultHoverColor = taprootEditorData.headerHeroHoverColor;
            }
        }

        return {
            imageSource: imageSource,
            overlayType: overlayType,
            overlayColor: overlayColor,
            overlayOpacity: parseInt(overlayOpacity, 10) / 100,
            defaultColor: defaultColor,
            defaultHoverColor: defaultHoverColor,
        }
    })
])( HeroPreviewEdit );
