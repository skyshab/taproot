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
use function Taproot\Customize\color;
use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;
use function Taproot\Customize\get_font_choices;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'nav--footer', [
    'title' => esc_html__( 'Footer Nav', 'taproot' ),
    'panel' => 'nav',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Hide when not mobile
$manager->add_setting( 'nav--footer--hide', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'nav--footer--hide', [
    'label'     => esc_html__( 'Hide when not mobile', 'taproot' ),
    'section'   => 'nav--footer',
    'type'      => 'checkbox'
]);


// Color Setting: Background Color
color( $manager, 'nav--footer--background-color', [
    'label'   => esc_html__( 'Background Color', 'taproot' ),
    'section' => 'nav--footer',
]);


// Color Setting: Link Color
color( $manager, 'nav--footer--link-color', [
    'label'   => esc_html__( 'Link Color', 'taproot' ),
    'section' => 'nav--footer',
]);


// Color Setting: Link Color Hover
color( $manager, 'nav--footer--link-color--hover', [
    'label'   => esc_html__( 'Link Color: Hover', 'taproot' ),
    'section' => 'nav--footer',
]);


// Font Family
$manager->add_setting( 'nav--footer--font-family', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'default'
]);

$manager->add_control( 'nav--footer--font-family', [
    'type' => 'select',
    'section' => 'nav--footer',
    'label' => esc_html__( 'Font Family', 'taproot' ),
    'choices' => get_font_choices(),
]);


// Font Styles
$manager->add_setting( 'nav--footer--font-styles', [
    'transport' => 'postMessage'
]);

$manager->add_control( new Font_Styles( $manager, 'nav--footer--font-styles', [
    'section'   => 'nav--footer',
    'label'     => esc_html__( 'Font Styles', 'taproot' ),
]));


// Setting: Menu Item Font Size
range( $manager, 'nav--footer--font-size', [
    'section' => 'nav--footer',
    'label' => esc_html__('Font Size', 'taproot'),
    'atts' => range_atts('text')
]);


// Setting: Menu Item Line Height
range( $manager, 'nav--footer--line-height', [
    'section' => 'nav--footer',
    'label' => esc_html__('Line Height', 'taproot'),
    'atts' => range_atts('line-height')
]);


// menu item padding
range( $manager, 'nav--footer--padding', [
    'section' => 'nav--footer',
    'label' => esc_html__('Menu Item Padding', 'taproot'),
    'atts'  => [
        'px' => [
            'max' => 32,
        ],
        'em' => [
            'max' => 2,
        ],
    ]
]);


// Nav Align
$manager->add_setting( 'nav--footer--align', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'center'
]);

$manager->add_control( 'nav--footer--align', [
    'type' => 'select',
    'section' => 'nav--footer',
    'label' => esc_html__( 'Nav Align', 'taproot' ),
    'choices' => [
        'flex-start' => esc_html__( 'Left', 'taproot' ),
        'flex-end' => esc_html__( 'Right', 'taproot' ),
        'center' => esc_html__( 'Center', 'taproot' ),
        'space-between' => esc_html__( 'Fill', 'taproot' ),
    ]
]);


// Menu Position
$manager->add_setting( 'nav--footer--position', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'before'
]);

$manager->add_control( 'nav--footer--position', [
    'type' => 'select',
    'section' => 'nav--footer',
    'label' => esc_html__( 'Nav Position', 'taproot' ),
    'choices' => [
        'before' => esc_html__( 'Before Widget Area', 'taproot' ),
        'after' => esc_html__( 'After Widget Area', 'taproot' ),
    ]
]);
