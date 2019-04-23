<?php
/**
 * Callback functions for customizer partials.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


/**
 * Render the site logo for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function taproot_customize_partial_logo() {
    $taproot_logo  = get_theme_mod( 'taproot_custom_logo', false );
    if( ! $taproot_logo ) return;
    printf( '<img id="logo" src="%s" alt="%s"/>', esc_url( $logo_option ), esc_attr( bloginfo( 'name' ) ) );
}


/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function taproot_customize_partial_blogname() {
    bloginfo( 'name' );
}


/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function taproot_customize_partial_blogdescription() {
    bloginfo( 'description' );
}


/**
 * Render the phone info for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function taproot_customize_partial_phone_info() {
    $phone  = get_theme_mod( 'taproot_topnav_info_phone', false );
    if( ! $phone ) return;
    printf( '<span class="info-phone topnav-info">%s</span>', esc_html( $phone ) );
}


/**
 * Render the phone info for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function taproot_customize_partial_email_info() {
    $email  = get_theme_mod( 'taproot_topnav_info_email', false );
    if( ! $email ) return;
    printf( '<a href="mailto:%1$s" class="info-email topnav-info">%1$s</a>', esc_html( $email ) );
}


/**
 * Render the bottom bar content for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function taproot_customize_partial_bottom_bar_content() {
    $bb_content  = get_option( 'taproot_bottom_bar_content', false );
    if( ! $bb_content ) return;
    echo wp_kses_post( $bb_content );
}
