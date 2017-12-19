<?php
/**
 * This file returns an array of default rootstrap settings.
 *
 * @package taproot/customizer
 * @since 0.8.2
 */

// define rootstrap settings array
$rootstrap_settings = array();

    /* Define devices */
    $rootstrap_devices = array();

        $rootstrap_devices['mobile'] = array(
            'min' => '',
            'max' => '480.001px',
            'preview-button' => array(
                'content' => "\\f470"
            )
        );

        $rootstrap_devices['mobile-landscape'] = array(
            'min' => '481px',
            'max' => '767.001px',
            'preview-button' => array(
                'content' => "\\f470",
                'style' => 'transform: rotate(270deg) scaleX(-1);'
            )
        );

        $rootstrap_devices['tablet'] = array(
            'min' => '768px',
            'max' => '980.001px',
            'preview-button' => array(
                'content' => "\\f471"
            )
        );

        $rootstrap_devices['laptop'] = array(
            'min' => '981px',
            'max' => '1199.001px',
            'preview-button' => array(
                'content' => "\\f547"
            )
        );

        $rootstrap_devices['desktop'] = array(
            'min' => '1200px',
            'max' => '',
            'preview-button' => array(
                'content' => "\\f472"
            )
        );

    $rootstrap_settings['devices'] = $rootstrap_devices;


    /* Define image sizes */
    $rootstrap_image_sizes = array();

        $rootstrap_image_sizes['tiny'] = array(
            'width' => 100,
            'height' => 100,
            'crop' => true,
            'display' => true,
            'label' => ''
        );

        $rootstrap_image_sizes['thumbnail'] = array(
            'width' => 200,
            'height' => 200,
            'crop' => true,
            'display' => true,
            'label' => ''
        );

        $rootstrap_image_sizes['small'] = array(
            'width' => 320,
            'height' => 0,
            'crop' => 0,
            'display' => true,
            'label' => ''
        );

        $rootstrap_image_sizes['medium'] = array(
            'width' => 480,
            'height' => 0,
            'crop' => 0,
            'display' => true,
            'label' => ''
        );

        $rootstrap_image_sizes['large'] = array(
            'width' => 1024,
            'height' => 0,
            'crop' => 0,
            'display' => true,
            'label' => ''
        );

    $rootstrap_settings['image_sizes'] = $rootstrap_image_sizes;


    /* Define default sidebars */
    $rootstrap_sidebars = array();

        $rootstrap_sidebars['sidebar-1'] = 'Sidebar';
        $rootstrap_sidebars['footer-1'] = 'Footer Widgets 1';
        $rootstrap_sidebars['footer-2'] = 'Footer Widgets 2';
        $rootstrap_sidebars['footer-3'] = 'Footer Widgets 3';
        $rootstrap_sidebars['footer-4'] = 'Footer Widgets 4';

    $rootstrap_settings['sidebars'] = $rootstrap_sidebars;


    /* Define customizer defaults */
    $rootstrap_defaults = array();

        $rootstrap_defaults['taproot_boxed_layout'] = '';
        $rootstrap_defaults['taproot_boxed_layout_padding'] = '2';
        $rootstrap_defaults['taproot_max_content_width'] = '1200';
        $rootstrap_defaults['taproot_sidebar_width'] = '31';
        $rootstrap_defaults['taproot_sidebar_gutter'] = '6';
        $rootstrap_defaults['taproot_background_color'] = '';
        $rootstrap_defaults['taproot_background_image'] = '';
        $rootstrap_defaults['taproot_background_repeat'] = 'no-repeat';
        $rootstrap_defaults['taproot_background_size'] = 'cover';
        $rootstrap_defaults['taproot_background_position'] = 'center';
        $rootstrap_defaults['taproot_background_scroll'] = 'fixed';
        $rootstrap_defaults['taproot_google_fonts'] = 'Lato|Oswald';
        $rootstrap_defaults['taproot_logo_color'] = '';
        $rootstrap_defaults['taproot_display_title'] = '1';
        $rootstrap_defaults['taproot_site_title_font'] = 'Lato';
        $rootstrap_defaults['taproot_title_font_color'] = '';
        $rootstrap_defaults['taproot_title_font_color_fixed'] = '';
        $rootstrap_defaults['taproot_site_title_font_style'] = '';
        $rootstrap_defaults['taproot_display_tagline'] = '';
        $rootstrap_defaults['taproot_site_tagline_font'] = 'default';
        $rootstrap_defaults['taproot_tagline_font_color'] = '';
        $rootstrap_defaults['taproot_tagline_font_color_fixed'] = '';
        $rootstrap_defaults['taproot_tagline_font_style'] = '';
        $rootstrap_defaults['taproot_branding_layout_mobile'] = 'stacked';
        $rootstrap_defaults['taproot_gutter_spacing_mobile'] = '1';
        $rootstrap_defaults['taproot_logo_height_mobile'] = '50';
        $rootstrap_defaults['taproot_logo_gutter_mobile'] = '0.4';
        $rootstrap_defaults['taproot_title_font_size_mobile'] = '32';
        $rootstrap_defaults['taproot_title_spacing_mobile'] = '1';
        $rootstrap_defaults['taproot_title_line_height_mobile'] = '1.2';
        $rootstrap_defaults['taproot_tagline_font_size_mobile'] = '24';
        $rootstrap_defaults['taproot_tagline_spacing_mobile'] = '1';
        $rootstrap_defaults['taproot_tagline_line_height_mobile'] = '1.2';
        $rootstrap_defaults['taproot_tagline_top_margin_mobile'] = '0.4';
        $rootstrap_defaults['taproot_branding_layout_mobile_landscape'] = 'spread';
        $rootstrap_defaults['taproot_gutter_spacing_mobile_landscape'] = '1';
        $rootstrap_defaults['taproot_logo_height_mobile_landscape'] = '50';
        $rootstrap_defaults['taproot_logo_gutter_mobile_landscape'] = '1';
        $rootstrap_defaults['taproot_title_font_size_mobile_landscape'] = '32';
        $rootstrap_defaults['taproot_title_spacing_mobile_landscape'] = '1';
        $rootstrap_defaults['taproot_title_line_height_mobile_landscape'] = '1.2';
        $rootstrap_defaults['taproot_tagline_font_size_mobile_landscape'] = '24';
        $rootstrap_defaults['taproot_tagline_spacing_mobile_landscape'] = '1';
        $rootstrap_defaults['taproot_tagline_line_height_mobile_landscape'] = '1.2';
        $rootstrap_defaults['taproot_tagline_top_margin_mobile_landscape'] = '0.4';
        $rootstrap_defaults['taproot_branding_layout_tablet'] = 'spread';
        $rootstrap_defaults['taproot_gutter_spacing_tablet'] = '1';
        $rootstrap_defaults['taproot_logo_height_tablet'] = '50';
        $rootstrap_defaults['taproot_logo_gutter_tablet'] = '1';
        $rootstrap_defaults['taproot_title_font_size_tablet'] = '32';
        $rootstrap_defaults['taproot_title_spacing_tablet'] = '1';
        $rootstrap_defaults['taproot_title_line_height_tablet'] = '1.2';
        $rootstrap_defaults['taproot_tagline_font_size_tablet'] = '24';
        $rootstrap_defaults['taproot_tagline_spacing_tablet'] = '1';
        $rootstrap_defaults['taproot_tagline_line_height_tablet'] = '1.2';
        $rootstrap_defaults['taproot_tagline_top_margin_tablet'] = '0.4';
        $rootstrap_defaults['taproot_gutter_spacing_laptop_fixed'] = '1';
        $rootstrap_defaults['taproot_hide_logo_laptop_fixed'] = '';
        $rootstrap_defaults['taproot_logo_height_laptop_fixed'] = '50';
        $rootstrap_defaults['taproot_logo_gutter_laptop_fixed'] = '1';
        $rootstrap_defaults['taproot_hide_site_title_laptop_fixed'] = '';
        $rootstrap_defaults['taproot_title_font_size_laptop_fixed'] = '';
        $rootstrap_defaults['taproot_title_spacing_laptop_fixed'] = '';
        $rootstrap_defaults['taproot_title_line_height_laptop_fixed'] = '';
        $rootstrap_defaults['taproot_hide_site_tagline_laptop_fixed'] = '';
        $rootstrap_defaults['taproot_tagline_font_size_laptop_fixed'] = '';
        $rootstrap_defaults['taproot_tagline_spacing_laptop_fixed'] = '';
        $rootstrap_defaults['taproot_tagline_line_height_laptop_fixed'] = '';
        $rootstrap_defaults['taproot_tagline_top_margin_laptop_fixed'] = '';
        $rootstrap_defaults['taproot_gutter_spacing_laptop'] = '1';
        $rootstrap_defaults['taproot_logo_height_laptop'] = '50';
        $rootstrap_defaults['taproot_logo_gutter_laptop'] = '1';
        $rootstrap_defaults['taproot_title_font_size_laptop'] = '32';
        $rootstrap_defaults['taproot_title_spacing_laptop'] = '1';
        $rootstrap_defaults['taproot_title_line_height_laptop'] = '1.2';
        $rootstrap_defaults['taproot_tagline_font_size_laptop'] = '24';
        $rootstrap_defaults['taproot_tagline_spacing_laptop'] = '1';
        $rootstrap_defaults['taproot_tagline_line_height_laptop'] = '1.2';
        $rootstrap_defaults['taproot_tagline_top_margin_laptop'] = '0.4';
        $rootstrap_defaults['taproot_gutter_spacing_desktop_fixed'] = '1';
        $rootstrap_defaults['taproot_hide_logo_desktop_fixed'] = '';
        $rootstrap_defaults['taproot_logo_height_desktop_fixed'] = '50';
        $rootstrap_defaults['taproot_logo_gutter_desktop_fixed'] = '1';
        $rootstrap_defaults['taproot_hide_site_title_desktop_fixed'] = '';
        $rootstrap_defaults['taproot_title_font_size_desktop_fixed'] = '';
        $rootstrap_defaults['taproot_title_spacing_desktop_fixed'] = '';
        $rootstrap_defaults['taproot_title_line_height_desktop_fixed'] = '';
        $rootstrap_defaults['taproot_hide_site_tagline_desktop_fixed'] = '';
        $rootstrap_defaults['taproot_tagline_font_size_desktop_fixed'] = '';
        $rootstrap_defaults['taproot_tagline_spacing_desktop_fixed'] = '';
        $rootstrap_defaults['taproot_tagline_line_height_desktop_fixed'] = '';
        $rootstrap_defaults['taproot_tagline_top_margin_desktop_fixed'] = '';
        $rootstrap_defaults['taproot_gutter_spacing_desktop'] = '1';
        $rootstrap_defaults['taproot_logo_height_desktop'] = '50';
        $rootstrap_defaults['taproot_logo_gutter_desktop'] = '1';
        $rootstrap_defaults['taproot_title_font_size_desktop'] = '32';
        $rootstrap_defaults['taproot_title_spacing_desktop'] = '1';
        $rootstrap_defaults['taproot_title_line_height_desktop'] = '1.2';
        $rootstrap_defaults['taproot_tagline_font_size_desktop'] = '24';
        $rootstrap_defaults['taproot_tagline_spacing_desktop'] = '1';
        $rootstrap_defaults['taproot_tagline_line_height_desktop'] = '1.2';
        $rootstrap_defaults['taproot_tagline_top_margin_desktop'] = '0.4';
        $rootstrap_defaults['taproot_main_header_fullwidth'] = '';
        $rootstrap_defaults['taproot_header_background_color'] = 'rgb(255,255,255)';
        $rootstrap_defaults['taproot_header_default_color'] = '';
        $rootstrap_defaults['taproot_header_default_color_hover'] = '';
        $rootstrap_defaults['taproot_main_header_display_when_fixed'] = '1';
        $rootstrap_defaults['taproot_fixed_header_type'] = 'slide';
        $rootstrap_defaults['taproot_header_background_color_fixed'] = 'rgb(253,128,33)';
        $rootstrap_defaults['taproot_fixed_header_default_color'] = 'rgb(255,255,255)';
        $rootstrap_defaults['taproot_fixed_header_default_color_hover'] = '';
        $rootstrap_defaults['taproot_enable_header_search'] = '1';
        $rootstrap_defaults['taproot_header_search_color'] = '';
        $rootstrap_defaults['taproot_taproot_header_search_size'] = '24';
        $rootstrap_defaults['taproot_enable_fixed_header_search'] = '1';
        $rootstrap_defaults['taproot_search_color_fixed'] = '';
        $rootstrap_defaults['taproot_search_size_fixed'] = '26';
        $rootstrap_defaults['taproot_footer_layout'] = 'two-thirds-one-third';
        $rootstrap_defaults['taproot_footer_style'] = 'default';
        $rootstrap_defaults['taproot_taproot_footer_fullwidth'] = '';
        $rootstrap_defaults['taproot_footer_container_padding'] = '1.6';
        $rootstrap_defaults['taproot_footer_gutter_spacing'] = '1.6';
        $rootstrap_defaults['taproot_footer_background_color'] = 'rgb(105,105,105)';
        $rootstrap_defaults['taproot_footer_widget_heading_color'] = 'rgb(255,255,255)';
        $rootstrap_defaults['taproot_footer_widget_title_font_size'] = '1.6';
        $rootstrap_defaults['taproot_footer_widget_text_color'] = 'rgba(255,255,255,0.75)';
        $rootstrap_defaults['taproot_footer_widget_font_size'] = '16';
        $rootstrap_defaults['taproot_footer_link_color'] = 'rgba(255,255,255,0.75)';
        $rootstrap_defaults['taproot_footer_link_color_hover'] = 'rgb(255,255,255)';
        $rootstrap_defaults['taproot_bottom_bar_background_color'] = 'rgba(13,13,13,0.4)';
        $rootstrap_defaults['taproot_bottom_bar_text_color'] = 'rgba(255,255,255,0.75)';
        $rootstrap_defaults['taproot_bottom_bar_text_color_hover'] = 'rgb(255,255,255)';
        $rootstrap_defaults['taproot_bottom_bar_font_size'] = '16';
        $rootstrap_defaults['taproot_bottom_bar_height'] = '1';
        $rootstrap_defaults['taproot_footer_nav_background'] = '';
        $rootstrap_defaults['taproot_footer_nav_menu_item_color'] = '';
        $rootstrap_defaults['taproot_footer_nav_menu_item_hover_color'] = '';
        $rootstrap_defaults['taproot_footer_nav_font'] = 'default';
        $rootstrap_defaults['taproot_footer_nav_font_style'] = '';
        $rootstrap_defaults['taproot_footer_nav_font_size'] = '16';
        $rootstrap_defaults['taproot_footer_nav_item_spacing'] = '0.5';
        $rootstrap_defaults['taproot_footer_nav_height'] = '1';
        $rootstrap_defaults['taproot_footer_nav_align'] = 'center';
        $rootstrap_defaults['taproot_footer_nav_position'] = 'before';
        $rootstrap_defaults['taproot_footer_nav_mobile_breakpoint'] = '';
        $rootstrap_defaults['taproot_topnav_background'] = '#696969';
        $rootstrap_defaults['taproot_topnav_default_color'] = 'rgba(255,255,255,0.75)';
        $rootstrap_defaults['taproot_topnav_default_color_hover'] = 'rgb(255,255,255)';
        $rootstrap_defaults['taproot_topnav_font'] = 'default';
        $rootstrap_defaults['taproot_topnav_font_style'] = '';
        $rootstrap_defaults['taproot_topnav_font_size'] = '13';
        $rootstrap_defaults['taproot_topnav_height'] = '0.8';
        $rootstrap_defaults['taproot_topnav_item_spacing'] = '0.6';
        $rootstrap_defaults['taproot_topnav_hide_when_not_mobile'] = '';
        $rootstrap_defaults['taproot_topnav_mobile_breakpoint'] = 'bp-ml';
        $rootstrap_defaults['taproot_topnav_hide_when_mobile'] = '1';
        $rootstrap_defaults['taproot_topnav_display_when_fixed'] = '';
        $rootstrap_defaults['taproot_fixed_topnav_background'] = '';
        $rootstrap_defaults['taproot_fixed_topnav_default_color'] = '';
        $rootstrap_defaults['taproot_fixed_topnav_default_color_hover'] = '';
        $rootstrap_defaults['taproot_header_nav_menu_item_color'] = '';
        $rootstrap_defaults['taproot_header_nav_menu_item_color_hover'] = '';
        $rootstrap_defaults['taproot_header_nav_submenu_bkg_color'] = '#696969';
        $rootstrap_defaults['taproot_header_nav_submenu_item_color'] = 'rgba(255,255,255,0.75)';
        $rootstrap_defaults['taproot_header_nav_submenu_item_color_hover'] = 'rgb(255,255,255)';
        $rootstrap_defaults['taproot_header_nav_enable_dropdown_pointers'] = '1';
        $rootstrap_defaults['taproot_header_nav_font'] = 'default';
        $rootstrap_defaults['taproot_header_nav_font_style'] = 'capitalize';
        $rootstrap_defaults['taproot_header_nav_font_size'] = '15';
        $rootstrap_defaults['taproot_header_nav_height'] = '1';
        $rootstrap_defaults['taproot_header_nav_item_spacing'] = '0.4';
        $rootstrap_defaults['taproot_header_nav_align'] = 'right';
        $rootstrap_defaults['taproot_header_nav_hide_when_not_mobile'] = '';
        $rootstrap_defaults['taproot_header_nav_mobile_breakpoint'] = 'bp-t';
        $rootstrap_defaults['taproot_header_nav_hide_when_mobile'] = '';
        $rootstrap_defaults['taproot_header_nav_type'] = 'dropdown-slide';
        $rootstrap_defaults['taproot_header_nav_mobile_icon_size'] = '1';
        $rootstrap_defaults['taproot_header_nav_mobile_icon_color'] = '';
        $rootstrap_defaults['taproot_header_nav_mobile_background'] = '';
        $rootstrap_defaults['taproot_header_nav_mobile_separator_color'] = '';
        $rootstrap_defaults['taproot_header_nav_mobile_item_color'] = '';
        $rootstrap_defaults['taproot_header_nav_mobile_dropdown_item_height'] = '1';
        $rootstrap_defaults['taproot_header_nav_mobile_dropdown_item_padding'] = '1';
        $rootstrap_defaults['taproot_header_nav_mobile_bkg_color_hover'] = '';
        $rootstrap_defaults['taproot_header_nav_mobile_item_color_hover'] = '';
        $rootstrap_defaults['taproot_header_nav_mobile_menubar_background'] = '';
        $rootstrap_defaults['taproot_header_nav_display_when_fixed'] = '1';
        $rootstrap_defaults['taproot_header_nav_menu_item_color_fixed'] = '';
        $rootstrap_defaults['taproot_header_nav_menu_item_color_hover_fixed'] = '';
        $rootstrap_defaults['taproot_header_nav_font_size_fixed'] = '15';
        $rootstrap_defaults['taproot_header_nav_height_fixed'] = '1';
        $rootstrap_defaults['taproot_header_nav_item_spacing_fixed'] = '0.4';
        $rootstrap_defaults['taproot_header_nav_fixed_submenu_bkg_color'] = '';
        $rootstrap_defaults['taproot_header_nav_fixed_submenu_item_color'] = '';
        $rootstrap_defaults['taproot_header_nav_fixed_submenu_item_color_hover'] = '';
        $rootstrap_defaults['taproot_header_nav_align_fixed'] = 'right';
        $rootstrap_defaults['taproot_navbar_background'] = 'rgb(120,120,120)';
        $rootstrap_defaults['taproot_navbar_menu_item_color'] = 'rgba(255,255,255,0.75)';
        $rootstrap_defaults['taproot_navbar_menu_item_color_hover'] = 'rgb(255,255,255)';
        $rootstrap_defaults['taproot_navbar_font'] = 'default';
        $rootstrap_defaults['taproot_navbar_font_style'] = '';
        $rootstrap_defaults['taproot_navbar_font_size'] = '15';
        $rootstrap_defaults['taproot_navbar_submenu_bkg_color'] = '';
        $rootstrap_defaults['taproot_navbar_submenu_item_color'] = '';
        $rootstrap_defaults['taproot_navbar_submenu_item_color_hover'] = '';
        $rootstrap_defaults['taproot_navbar_enable_dropdown_pointers'] = '1';
        $rootstrap_defaults['taproot_navbar_height'] = '1.1';
        $rootstrap_defaults['taproot_navbar_item_spacing'] = '1.1';
        $rootstrap_defaults['taproot_navbar_align'] = 'center';
        $rootstrap_defaults['taproot_navbar_hide_when_not_mobile'] = '';
        $rootstrap_defaults['taproot_navbar_mobile_breakpoint'] = 'bp-t';
        $rootstrap_defaults['taproot_navbar_hide_when_mobile'] = '';
        $rootstrap_defaults['taproot_navbar_nav_type'] = 'dropdown-slide';
        $rootstrap_defaults['taproot_navbar_height_mobile'] = '1.2';
        $rootstrap_defaults['taproot_navbar_mobile_icon_color'] = '';
        $rootstrap_defaults['taproot_navbar_mobile_icon_size'] = '1';
        $rootstrap_defaults['taproot_navbar_mobile_dropdown_bkg'] = '';
        $rootstrap_defaults['taproot_navbar_mobile_separator_color'] = '';
        $rootstrap_defaults['taproot_navbar_mobile_item_color'] = '';
        $rootstrap_defaults['taproot_navbar_mobile_dropdown_item_height'] = '';
        $rootstrap_defaults['taproot_navbar_mobile_dropdown_item_padding'] = '';
        $rootstrap_defaults['taproot_navbar_mobile_bkg_color_hover'] = '';
        $rootstrap_defaults['taproot_navbar_mobile_item_color_hover'] = '';
        $rootstrap_defaults['taproot_navbar_display_when_fixed'] = '';
        $rootstrap_defaults['taproot_fixed_navbar_background_color'] = '';
        $rootstrap_defaults['taproot_fixed_navbar_item_color'] = '';
        $rootstrap_defaults['taproot_fixed_navbar_item_color_hover'] = '';
        $rootstrap_defaults['taproot_navbar_fixed_submenu_bkg_color'] = '';
        $rootstrap_defaults['taproot_navbar_fixed_submenu_item_color'] = '';
        $rootstrap_defaults['taproot_navbar_fixed_submenu_item_color_hover'] = '';
        $rootstrap_defaults['taproot_body_font'] = 'Lato';
        $rootstrap_defaults['taproot_text_color'] = 'rgb(127,127,127)';
        $rootstrap_defaults['taproot_line_height'] = '1.7';
        $rootstrap_defaults['taproot_heading_font'] = 'Oswald';
        $rootstrap_defaults['taproot_heading_color'] = '';
        $rootstrap_defaults['taproot_heading_line_height'] = '1.3';
        $rootstrap_defaults['taproot_heading_font_style'] = '';
        $rootstrap_defaults['taproot_post_title_font'] = 'Lato';
        $rootstrap_defaults['taproot_post_title_color'] = '';
        $rootstrap_defaults['taproot_title_line_height'] = '1.3';
        $rootstrap_defaults['taproot_title_font_style'] = '';
        $rootstrap_defaults['taproot_font_size_mobile'] = '16';
        $rootstrap_defaults['taproot_heading_font_size_mobile'] = '2';
        $rootstrap_defaults['taproot_post_title_font_size_mobile'] = '2.4';
        $rootstrap_defaults['taproot_font_size_mobile_landscape'] = '16';
        $rootstrap_defaults['taproot_heading_font_size_mobile_landscape'] = '2';
        $rootstrap_defaults['taproot_post_title_font_size_mobile_landscape'] = '2.3';
        $rootstrap_defaults['taproot_font_size_tablet'] = '16';
        $rootstrap_defaults['taproot_heading_font_size_tablet'] = '2';
        $rootstrap_defaults['taproot_post_title_font_size_tablet'] = '2.4';
        $rootstrap_defaults['taproot_sidebar_layout_font_size_laptop'] = '16';
        $rootstrap_defaults['taproot_sidebar_layout_heading_font_size_laptop'] = '2';
        $rootstrap_defaults['taproot_sidebar_layout_post_title_font_size_laptop'] = '2.4';
        $rootstrap_defaults['taproot_sidebar_layout_sidebar_font_size_laptop'] = '0.9';
        $rootstrap_defaults['taproot_font_size_laptop'] = '18';
        $rootstrap_defaults['taproot_heading_font_size_laptop'] = '2';
        $rootstrap_defaults['taproot_post_title_font_size_laptop'] = '2.4';
        $rootstrap_defaults['taproot_sidebar_layout_font_size_desktop'] = '16';
        $rootstrap_defaults['taproot_sidebar_layout_heading_font_size_desktop'] = '2';
        $rootstrap_defaults['taproot_sidebar_layout_post_title_font_size_desktop'] = '2.5';
        $rootstrap_defaults['taproot_sidebar_layout_sidebar_font_size_desktop'] = '1';
        $rootstrap_defaults['taproot_font_size_desktop'] = '18';
        $rootstrap_defaults['taproot_heading_font_size_desktop'] = '2';
        $rootstrap_defaults['taproot_post_title_font_size_desktop'] = '2.4';
        $rootstrap_defaults['taproot_blog_layout'] = 'right';
        $rootstrap_defaults['taproot_post_show_all'] = '';
        $rootstrap_defaults['taproot_blog_title'] = 'Recent Posts';
        $rootstrap_defaults['taproot_blog_page_title_color'] = '';
        $rootstrap_defaults['taproot_blog_page_pagination_size'] = '1';
        $rootstrap_defaults['taproot_blog_page_pagination_radius'] = '50';
        $rootstrap_defaults['taproot_blog_page_pagination_color'] = 'rgb(255,110,0)';
        $rootstrap_defaults['taproot_post_box_featured_image_size'] = 'thumbnail';
        $rootstrap_defaults['taproot_post_box_title_color'] = '';
        $rootstrap_defaults['taproot_post_box_title_color_hover'] = 'rgb(255,110,0)';
        $rootstrap_defaults['taproot_post_box_text_color'] = '';
        $rootstrap_defaults['taproot_post_box_meta_icons'] = '1';
        $rootstrap_defaults['taproot_post_box_meta_size'] = '0.8';
        $rootstrap_defaults['taproot_post_box_meta_color'] = '';
        $rootstrap_defaults['taproot_post_box_meta_icon_color'] = '';
        $rootstrap_defaults['taproot_post_box_link_style'] = 'link';
        $rootstrap_defaults['taproot_post_box_link_position'] = 'left';
        $rootstrap_defaults['taproot_post_box_link_color'] = '';
        $rootstrap_defaults['taproot_post_box_excerpt_length'] = 0;
        $rootstrap_defaults['taproot_top_bar_background_color'] = 'rgb(255,110,0)';
        $rootstrap_defaults['taproot_top_bar_default_color'] = '';
        $rootstrap_defaults['taproot_top_bar_title_color'] = '';
        $rootstrap_defaults['taproot_top_bar_meta_color'] = '';
        $rootstrap_defaults['taproot_top_bar_post_navi_color'] = '';
        $rootstrap_defaults['taproot_top_bar_post_navi_color_hover'] = '';
        $rootstrap_defaults['taproot_top_bar_padding'] = '0.5';
        $rootstrap_defaults['taproot_top_bar_vertical_align'] = 'center';
        $rootstrap_defaults['taproot_top_bar_horizontal_align'] = 'left';
        $rootstrap_defaults['taproot_post_nav_location'] = 'inside';
        $rootstrap_defaults['taproot_enable_top_post_nav'] = 'default';
        $rootstrap_defaults['taproot_top_post_navigation_link_size'] = '1';
        $rootstrap_defaults['taproot_top_post_navigation_link_color'] = '';
        $rootstrap_defaults['taproot_top_post_navigation_link_color_hover'] = '';
        $rootstrap_defaults['taproot_enable_top_post_nav_separators'] = 1;
        $rootstrap_defaults['taproot_enable_bottom_post_nav'] = 'default';
        $rootstrap_defaults['taproot_bottom_post_navigation_link_size'] = '1';
        $rootstrap_defaults['taproot_bottom_post_navigation_link_color'] = '';
        $rootstrap_defaults['taproot_bottom_post_navigation_link_color_hover'] = '';
        $rootstrap_defaults['taproot_enable_bottom_post_nav_separators'] = 1;
        $rootstrap_defaults['taproot_post_nav_prev_label_text'] = 'prev';
        $rootstrap_defaults['taproot_post_nav_next_label_text'] = 'next';
        $rootstrap_defaults['taproot_breadcrumbs_location'] = 'content';
        $rootstrap_defaults['taproot_breadcrumbs_align'] = 'center';
        $rootstrap_defaults['taproot_breadcrumbs_size'] = '0.9';
        $rootstrap_defaults['taproot_post_navigation_breadcrumb_color'] = '';
        $rootstrap_defaults['taproot_post_navigation_breadcrumb_color_hover'] = '';
        $rootstrap_defaults['taproot_button_background_color'] = 'rgb(255,110,0)';
        $rootstrap_defaults['taproot_button_border_color'] = 'rgb(252,111,3)';
        $rootstrap_defaults['taproot_button_text_color'] = 'rgba(255,255,255,0.75)';
        $rootstrap_defaults['taproot_button_background_color_hover'] = 'rgb(255,255,255)';
        $rootstrap_defaults['taproot_button_border_color_hover'] = 'rgb(252,111,3)';
        $rootstrap_defaults['taproot_button_text_color_hover'] = 'rgb(255,110,0)';
        $rootstrap_defaults['taproot_button_border_width'] = '2';
        $rootstrap_defaults['taproot_button_border_radius'] = '0';
        $rootstrap_defaults['taproot_button_font'] = 'default';
        $rootstrap_defaults['taproot_button_font_style'] = 'uppercase';
        $rootstrap_defaults['taproot_secondary_button_background_color'] = '';
        $rootstrap_defaults['taproot_secondary_button_border_color'] = '';
        $rootstrap_defaults['taproot_secondary_button_text_color'] = '';
        $rootstrap_defaults['taproot_secondary_button_background_color_hover'] = '';
        $rootstrap_defaults['taproot_secondary_button_border_color_hover'] = '';
        $rootstrap_defaults['taproot_secondary_button_text_color_hover'] = '';
        $rootstrap_defaults['taproot_secondary_button_border_width'] = '0';
        $rootstrap_defaults['taproot_secondary_button_border_radius'] = '0';
        $rootstrap_defaults['taproot_secondary_button_font'] = 'default';
        $rootstrap_defaults['taproot_secondary_button_font_style'] = '';
        $rootstrap_defaults['taproot_link_color'] = 'rgb(255,110,0)';
        $rootstrap_defaults['taproot_link_color_hover'] = '';
        $rootstrap_defaults['taproot_link_color_active'] = '';
        $rootstrap_defaults['taproot_accent_color'] = 'rgb(255,110,0)';
        $rootstrap_defaults['taproot_accent_text_color'] = 'rgb(255,255,255)';
        $rootstrap_defaults['taproot_accent_background_color'] = '#f9f9f9';
        $rootstrap_defaults['taproot_header_search_size'] = '24';
        $rootstrap_defaults['taproot_topnav_info_phone'] = '';
        $rootstrap_defaults['taproot_topnav_info_email'] = '';
        $rootstrap_defaults['taproot_blog_page_sidebar'] = 'sidebar-1';
        $rootstrap_defaults['taproot_single_layout'] = 'right';
        $rootstrap_defaults['taproot_single_sidebar'] = 'sidebar-1';
        $rootstrap_defaults['taproot_featured_image_location'] = 'before-title';
        $rootstrap_defaults['taproot_featured_image_size'] = 'large';
        $rootstrap_defaults['taproot_featured_image_position'] = 'none';
        $rootstrap_defaults['taproot_separator_color'] = 'rgb(229,229,229)';
        $rootstrap_defaults['taproot_sidebar-1_width'] = '30';
        $rootstrap_defaults['taproot_sidebar-1_bkg'] = '#f9f9f9';
        $rootstrap_defaults['taproot_sidebar-1_text'] = '';
        $rootstrap_defaults['taproot_sidebar-1_heading'] = '';
        $rootstrap_defaults['taproot_sidebar-1_action'] = '';
        $rootstrap_defaults['taproot_sidebar-1_action_hover'] = '';
        $rootstrap_defaults['taproot_sidebar-1_accent_color'] = 'rgb(255,111,2)';
        $rootstrap_defaults['taproot_sidebar-1_accent_text_color'] = 'rgba(255,255,255,0.9)';
        $rootstrap_defaults['taproot_sidebar-1_separator_color'] = 'rgb(204,204,204)';
        $rootstrap_defaults['taproot_sidebar-1_gutter_width'] = '0';
        $rootstrap_defaults['taproot_fixed_header_logo_color'] = '';
        $rootstrap_defaults['taproot_post_title'] = 'content';
        $rootstrap_defaults['taproot_comments_text_color'] = '';
        $rootstrap_defaults['taproot_comments_link_color'] = '';
        $rootstrap_defaults['taproot_comments_link_color_hover'] = '';
        $rootstrap_defaults['taproot_comments_border_color'] = '';
        $rootstrap_defaults['taproot_comments_form_background_color'] = '#f9f9f9';
        $rootstrap_defaults['rootstrap_disable_customizer_styles'] = '';

    $rootstrap_settings['defaults'] = $rootstrap_defaults;

return $rootstrap_settings;