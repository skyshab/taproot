/**
 * Block Editor Custom Settings Panel.
 *
 * This file handles the JavaScript for creating a custom panel
 * in the block editor for post level settings.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

import {LayoutPicker} from './LayoutPicker.js';
import {PostTitleOptions} from './PostTitleOptions.js';
import {HeaderImagePicker} from './HeaderImagePicker.js';


( wp => {

    const {
        PluginSidebar,
        PluginSidebarMoreMenuItem
    } = wp.editPost;
    const { registerPlugin } = wp.plugins;
    const { Fragment } = wp.element;
    const { PanelBody } = wp.components;
    const { __ } = wp.i18n;

    // register our sidebar panel
    registerPlugin( 'tr-theme-sidebar', {
        render: () => {
            return (
                <Fragment>
                    <PluginSidebarMoreMenuItem
                        target="taproot-theme-sidebar"
                        icon="carrot">
                        { __('Taproot Theme Settings') }
                    </PluginSidebarMoreMenuItem>
                    <PluginSidebar
                        name="taproot-theme-sidebar"
                        icon="carrot"
                        title={ __( 'Taproot Page Settings' ) } >
                        <PanelBody>
                            <LayoutPicker fieldName='taproot_page_layout' />
                            <PostTitleOptions fieldName='taproot_post_title_display' />
                            <HeaderImagePicker fieldName='taproot_custom_header_image' />
                        </PanelBody>
                    </PluginSidebar>
                </Fragment>
            )
        }
    })

})( window.wp );