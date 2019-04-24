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


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'nav--top-fixed', [
    'title' => esc_html__( 'Top Nav - Fixed', 'taproot' ),
    'panel' => 'nav',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Show When Fixed
$manager->add_setting( 'nav--top-fixed--fixed', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'nav--top-fixed--fixed', [
    'label'     => esc_html__( 'Show When Fixed', 'taproot' ),
    'section'   => 'nav--top-fixed',
    'type'      => 'checkbox'
]);


// Color Setting: Background Color
color( $manager, 'nav--top-fixed--background-color', [
    'label'   => esc_html__( 'Background Color', 'taproot' ),
    'section' => 'nav--top-fixed',
]);


// Color Setting: Link Color
color( $manager, 'nav--top-fixed--link-color', [
    'label'   => esc_html__( 'Link Color', 'taproot' ),
    'section' => 'nav--top-fixed',
]);


// Color Setting: Link Color Hover
color( $manager, 'nav--top-fixed--link-color--hover', [
    'label'   => esc_html__( 'Link Color: Hover', 'taproot' ),
    'section' => 'nav--top-fixed',
]);



// Font Family
$manager->add_setting( 'nav--top-fixed--font-family', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'default'
]);

$manager->add_control( 'nav--top-fixed--font-family', [
    'type' => 'select',
    'section' => 'nav--top-fixed',
    'label' => esc_html__( 'Font Family', 'taproot' ),
    'choices' => get_font_choices(),
]);


// Font Styles
$manager->add_setting( 'nav--top-fixed--font-styles', [
    'transport' => 'postMessage'
]);

$manager->add_control( new Font_Styles( $manager, 'nav--top-fixed--font-styles', [
    'section' => 'nav--top-fixed',
    'label'   => esc_html__( 'Font Styles', 'taproot' ),
]));


// Setting: Menu Item Font Size
range( $manager, 'nav--top-fixed--font-size', [
    'section' => 'nav--top-fixed',
    'label' => esc_html__('Font Size', 'taproot'),
    'atts' => range_atts('text')
]);


// Setting: Menu Item Line Height
range( $manager, 'nav--top-fixed--line-height', [
    'section' => 'nav--top-fixed',
    'label' => esc_html__('Line Height', 'taproot'),
    'atts' => range_atts('line-height')
]);


// menu item padding
range( $manager, 'nav--top-fixed--padding', [
    'section' => 'nav--top-fixed',
    'label' => esc_html__('Menu Item Padding', 'taproot'),
    'atts'  => [
        'px' => [
            'max' => 64,
        ],
        'em' => [
            'max' => 4,
        ],
    ]
]);


// Nav Align
$manager->add_setting( 'nav--top-fixed--align', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
]);

$manager->add_control( 'nav--top-fixed--align', [
    'type' => 'select',
    'section' => 'nav--top-fixed',
    'label' => esc_html__( 'Nav Align', 'taproot' ),
    'choices' => [
        'flex-start' => esc_html__( 'Left', 'taproot' ),
        'flex-end' => esc_html__( 'Right', 'taproot' ),
        'center' => esc_html__( 'Center', 'taproot' ),
        'space-between' => esc_html__( 'Fill', 'taproot' ),
    ]
]);
