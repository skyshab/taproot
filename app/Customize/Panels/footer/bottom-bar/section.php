<?php
/**
 * Section setup.
 *
 * This file adds the section, settings and controls to the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


use function Taproot\Customize\color;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'footer--bottom-bar', [
    'title' => esc_html__( 'Bottom Bar', 'taproot' ),
    'panel' => 'footer',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Color Setting: Background Color
color( $manager, 'footer--bottom-bar--background-color', [
    'label'   => esc_html__( 'Bottom Bar Background Color', 'taproot' ),
    'section' => 'footer--bottom-bar',
]);


// Color Setting: Bottom Bar Default Color
color( $manager, 'footer--bottom-bar--default-color', [
    'label'   => esc_html__( 'Bottom Bar Text Color', 'taproot' ),
    'section' => 'footer--bottom-bar',
]);


// Color Setting: Bottom Bar Default Color
color( $manager, 'footer--bottom-bar--default-color--hover', [
    'label'   => esc_html__( 'Bottom Bar Hover Color', 'taproot' ),
    'section' => 'footer--bottom-bar',
]);


// Setting: Bottom Bar Content
$manager->add_setting( 'footer--bottom-bar--content', [
    'sanitize_callback' => 'wp_kses_post',
    'transport' => 'postMessage',
    'default' => esc_html__( 'Made with the Taproot theme for Wordpress', 'taproot' )
]);

$manager->add_control( 'footer--bottom-bar--content', [
    'label' => esc_html__( 'Bottom Bar Content', 'taproot' ),
    'section' => 'footer--bottom-bar',
    'type' => 'textarea',
]);


//selective refresh for bottom bar content
if( isset( $manager->selective_refresh ) ) {
    $manager->selective_refresh->add_partial( 'footer--bottom-bar--content', array(
        'selector' => '.bottom-bar__container',
        'container_inclusive' => false,
        'render_callback' => 'taproot_customize_partial_bottom_bar_content',
    ));
}
