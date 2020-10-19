/**
 * Header Image Preview
 *
 * This file handles the JavaScript for the header image preview.
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
const { withSelect } = wp.data;
const { compose } = wp.compose;
const { __ } = wp.i18n;

function HeaderPreviewEdit({
    imageSource,
    overlayType,
    overlayColor,
    overlayOpacity,
    defaultColor
}) {

    return imageSource && (
        <>
        <div className="taproot-header-image-preview">
            <img
                src={imageSource}
                class="taproot-header-image" />

            { 'none' !== overlayType &&
                <div className='taproot-overlay' style={{backgroundColor: overlayColor, opacity: overlayOpacity}}></div>
            }

            <p class="taproot-overlay-preview-text" style={{color: defaultColor}} >
                { __('Header Preview') }
            </p>
        </div>
        </>
    );
}

export const HeaderPreview = compose( [
    withSelect( function( select ) {

        const { getMedia } = select('core');
        const { getEditedPostAttribute } = select('core/editor');
        const imageType = getEditedPostAttribute('meta')['_taproot_header_image_type'];
        const customImage = getEditedPostAttribute('meta')['_taproot_header_image'];
        let imageSource = false;
        let featuredImage = 0;

        if( getEditedPostAttribute('featured_media') ) {
            featuredImage = getMedia( getEditedPostAttribute('featured_media') )
        }

        if( 'featured' === imageType ) {
            if ( featuredImage ) {
                imageSource = featuredImage.source_url;
            }
        }
        else if ( 'default' === imageType ) {
            if( typeof taprootEditorData !== 'undefined' ) {
                imageSource = taprootEditorData.headerImage;
            }
        }
        else if( 'custom' === imageType && customImage ) {
            imageSource = customImage
        }

        const overlayType   = getEditedPostAttribute('meta')['_taproot_header_overlay_type'];
        let overlayColor    = getEditedPostAttribute('meta')['_taproot_header_overlay_color'];
        let overlayOpacity  = getEditedPostAttribute('meta')['_taproot_header_overlay_opacity'];
        let defaultColor    = getEditedPostAttribute('meta')['_taproot_header_text_color'];

        if( typeof taprootEditorData !== 'undefined' ) {

            if( ! overlayType || 'default' === overlayType ) {
                overlayColor    = taprootEditorData.headerOverlayColor;
                overlayOpacity  = taprootEditorData.headerOverlayOpacity;
            }

            if( ! defaultColor ) {
                defaultColor    = taprootEditorData.headerHeaderDefaultColor;
            }
        }

        return {
            imageSource: imageSource,
            overlayType: overlayType,
            overlayColor: overlayColor,
            overlayOpacity: parseInt( overlayOpacity, 10 ) / 100,
            defaultColor: defaultColor
        }
    })
])( HeaderPreviewEdit );
