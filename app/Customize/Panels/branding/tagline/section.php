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
use Taproot\Customize\Controls\Responsive_Control;
use function Taproot\Customize\get_font_choices;
use function Taproot\Customize\color;
use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;

# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'branding--tagline', [
    'title' => esc_html__( 'Tagline', 'taproot' ),
    'panel' => 'branding',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Move the header image section to the header panel
// and change the transport method
if( $manager->get_control( 'blogdescription' ) ) {
    $manager->get_control( 'blogdescription' )->section = 'branding--tagline';
    $manager->get_setting( 'blogdescription' )->transport = 'postMessage';
}


// Setting: Enable Site Tagline
$manager->add_setting( 'branding--tagline--display-tagline', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'branding--tagline--display-tagline', [
    'type' => 'checkbox',
    'section' => 'branding--tagline',
    'label' => esc_html__( 'Enable Site Tagline', 'taproot' ),
]);


// Setting: Hide Site Tagline
$manager->add_setting( 'branding--tagline--hide-tagline', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'postMessage',
]);

// Control: Hide Site Tagline
$manager->add_control( new Responsive_Control( $manager, 'branding--tagline--hide-tagline', [
    'type' => 'checkbox',
    'section' => 'branding--tagline',
    'label' => esc_html__( 'Hide Tagline', 'taproot' ),
    'devices' => ['mobile', 'tablet', 'desktop']
]));


// Text Color
color( $manager, 'branding--tagline--color', [
    'label'   => esc_html__( 'Tagline Color', 'taproot' ),
    'section' => 'branding--tagline',
]);


// Font Family
$manager->add_setting( 'branding--tagline--font-family', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'default'
]);

$manager->add_control( 'branding--tagline--font-family', [
    'type' => 'select',
    'section' => 'branding--tagline',
    'label' => esc_html__( 'Font Family', 'taproot' ),
    'choices' => get_font_choices(),
]);


// Font Styles
$manager->add_setting( 'branding--tagline--font-styles', [
    'transport' => 'postMessage'
]);

$manager->add_control( new Font_Styles( $manager, 'branding--tagline--font-styles', [
    'section' => 'branding--tagline',
    'label'   => esc_html__( 'Font Styles', 'taproot' ),
]));


// Font Size
range( $manager, 'branding--tagline--font-size', [
    'section' => 'branding--tagline',
    'label' => esc_html__('Font Size', 'taproot'),
    'atts'  => range_atts('heading'),
    'devices' => ['mobile', 'tablet', 'desktop']
]);


// Line Height
range( $manager, 'branding--tagline--line-height', [
    'section' => 'branding--tagline',
    'label' => esc_html__('Line Height', 'taproot'),
    'atts'  => range_atts('line-height'),
    'devices' => ['mobile', 'tablet', 'desktop']
]);


// Tagline Gutter
range( $manager, 'branding--tagline--gutter', [
    'section' => 'branding--tagline',
    'label' => esc_html__('Tagline Gutter', 'taproot'),
    'atts'  => [
        'px' => [
            'max'   => 100,
            'default' => 4
        ]
    ],
    'devices' => ['mobile', 'tablet', 'desktop']
]);



# =======================================================
# Selective Refresh
# =======================================================


// If the selective refresh component is available
if ( isset( $manager->selective_refresh ) ) {

    // Selectively refreshes the title in the header
    // when the core WP blogdescription setting is changed.
    $manager->selective_refresh->add_partial( 'blogdescription', [
        'selector'        => '.app-header__description',
        'render_callback' => function() {
            return get_bloginfo( 'description', 'display' );
        }
    ]);
}
