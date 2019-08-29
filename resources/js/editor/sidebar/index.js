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
import {HeroImage} from './HeroImage.js';
import {HeroOverlay} from './HeroOverlay.js';
import {HeroTextColors} from './HeroTextColors.js';


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
                                <PanelBody title={ __( 'Layout' ) } initialOpen={ false } >
                                    <LayoutPicker fieldName='taproot_page_layout' />
                                </PanelBody>

                                <PanelBody title={ __( 'Post Title' ) } initialOpen={ false } >
                                    <PostTitleOptions fieldName='taproot_post_title_display' />
                                </PanelBody>

                                <PanelBody title={ __( 'Hero Area' ) } initialOpen={ false } >
                                    <HeroImage/>
                                    <HeroOverlay/>
                                    <HeroTextColors/>
                                </PanelBody>
                            </Panel>

                        </PluginSidebar>
                    </Fragment>
                </PostTypeSupportCheck>
            )
        }
    })

})( window.wp );