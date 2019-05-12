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


use Taproot\Customize\Controls\Font_Styles;
use function Taproot\Customize\get_font_choices;
use function Taproot\Customize\color;
use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;
use function Taproot\Customize\checkbox;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'branding--title', [
    'title' => esc_html__( 'Title', 'taproot' ),
    'panel' => $panel,
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Move the header image section to the header panel
// and change the transport method
if( $manager->get_control( 'blogname' ) ) {
    $manager->get_control( 'blogname' )->section = 'branding--title';
    $manager->get_setting( 'blogname' )->transport = 'postMessage';
}

// Setting: Enable Site Title
$manager->add_setting( 'branding--title--display-title', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'branding--title--display-title', [
    'type' => 'checkbox',
    'section' => 'branding--title',
    'label' => esc_html__( 'Enable Site Title', 'taproot' ),
]);


// Setting: Hide Site Title
checkbox( $manager, 'branding--title--hide', [
    'section' => 'branding--title',
    'label' => esc_html__( 'Hide Title', 'taproot' ),
    'devices' => ['mobile', 'tablet', 'desktop']
]);


// Title Color
color( $manager, 'branding--title--color', [
    'label'   => esc_html__( 'Title Color', 'taproot' ),
    'section' => 'branding--title',
]);


// Font Family
$manager->add_setting( 'branding--title--font-family', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'default'
]);

$manager->add_control( 'branding--title--font-family', [
    'type' => 'select',
    'section' => 'branding--title',
    'label' => esc_html__( 'Font Family', 'taproot' ),
    'choices' => get_font_choices(),
]);


// Font Styles
$manager->add_setting( 'branding--title--font-styles', [
    'transport' => 'postMessage'
]);

$manager->add_control( new Font_Styles( $manager, 'branding--title--font-styles', [
    'section' => 'branding--title',
    'label'   => esc_html__( 'Font Styles', 'taproot' ),
]));


// Font Size
range( $manager, 'branding--title--font-size', [
    'section' => 'branding--title',
    'label' => esc_html__('Font Size', 'taproot'),
    'atts'  => range_atts('heading'),
    'devices' => ['mobile', 'tablet', 'desktop']
]);


// Line Height
range( $manager, 'branding--title--line-height', [
    'section' => 'branding--title',
    'label' => esc_html__('Line Height', 'taproot'),
    'atts'  => range_atts('line-height'),
    'devices' => ['mobile', 'tablet', 'desktop']
]);


# =======================================================
# Selective Refresh
# =======================================================


// If the selective refresh component is available
if ( isset( $manager->selective_refresh ) ) {

    // Selectively refreshes the title in the header
    // when the core WP blogname setting is changed.
    $manager->selective_refresh->add_partial( 'blogname', [
        'selector' => '.app-header__title-link',
        'render_callback' => function() {
            return get_bloginfo( 'name', 'display' );
        }
    ]);
}
