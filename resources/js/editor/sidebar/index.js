/**
 * Block Editor Custom Settings Panel.
 *
 * This file handles the JavaScript for creating a custom panel
 * in the block editor for post level settings.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

import {SidebarLayout} from './SidebarLayout.js';
import {HeaderImage} from './HeaderImage.js';
import {HeaderOverlay} from './HeaderOverlay.js';
import {HeaderTextColors} from './HeaderTextColors.js';
import {DisableTopPadding} from './DisableTopPadding.js';
import {DisableBottomPadding} from './DisableBottomPadding.js';
import {SidebarSlot} from './SidebarSlot.js';
import {ContentLayout} from './ContentLayout.js';
import {HeaderTitleDisplay} from './HeaderTitleDisplay.js';
import {HideFeaturedImage} from './HideFeaturedImage.js';
import {HidePostTitle} from './HidePostTitle.js';

// Action for adding items to the sidebar section slot
wp.hooks.doAction( 'taproot-editor-sidebar-slot', SidebarSlot );

( wp => {

    const {
        PluginSidebar,
        PluginSidebarMoreMenuItem
    } = wp.editPost;
    const { registerPlugin } = wp.plugins;
    const { Fragment } = wp.element;
    const { Panel, PanelBody } = wp.components;
    const { __ } = wp.i18n;
    const {PostTypeSupportCheck } = wp.editor;

    // register our sidebar panel
    registerPlugin( 'tr-theme-sidebar', {
        render: () => {
            return (
                <PostTypeSupportCheck supportKeys="custom-fields">
                    <Fragment>
                        <PluginSidebarMoreMenuItem
                            target="taproot-theme-sidebar"
                            icon="carrot">
                            { __('Taproot Theme Settings') }
                        </PluginSidebarMoreMenuItem>
                        <PluginSidebar
                            name="taproot-theme-sidebar"
                            className="taproot-theme-sidebar"
                            icon="carrot"
                            title={ __( 'Taproot Page Settings' ) }
                        >
                            <Panel>

                                <PanelBody                  title={ __( 'Custom Header' ) } initialOpen={ false } >
                                    <HeaderImage/>
                                    <HeaderOverlay/>
                                    <HeaderTextColors       fieldName='_taproot_header_text_color'/>
                                    <HeaderTitleDisplay     fieldName='_taproot_header_display_title'/>
                                </PanelBody>

                                <PanelBody                  title={ __( 'Sidebar' ) } initialOpen={ false } >
                                    <SidebarLayout          fieldName='_taproot_page_layout' />
                                    <SidebarSlot.Slot>
                                        {(fills) => (<>{ fills }</>)}
                                    </SidebarSlot.Slot>
                                </PanelBody>

                                <PanelBody                  title={ __( 'Content' ) } initialOpen={ false } >
                                    <ContentLayout          fieldName='_taproot_post_content_layout' />
                                    <HidePostTitle          fieldName='_taproot_post_title_hide' />
                                    <HideFeaturedImage      fieldName='_taproot_post_featured_image_hide' />
                                    <DisableTopPadding      fieldName='_taproot_disable_main_top_padding'/>
                                    <DisableBottomPadding   fieldName='_taproot_disable_main_bottom_padding'/>
                                </PanelBody>

                            </Panel>

                        </PluginSidebar>
                    </Fragment>
                </PostTypeSupportCheck>
            )
        }
    })

})( window.wp );