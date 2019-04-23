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


$manager->add_section( 'nav--top', [
    'title' => esc_html__( 'Top Nav', 'taproot' ),
    'panel' => 'nav',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Hide when not mobile
$manager->add_setting( 'nav--top--hide', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'nav--top--hide', [
    'label'     => esc_html__( 'Hide when not mobile', 'taproot' ),
    'section'   => 'nav--top',
    'type'      => 'checkbox'
]);


// Color Setting: Background Color
color( $manager, 'nav--top--background-color', [
    'label'   => esc_html__( 'Nav Background Color', 'taproot' ),
    'section' => 'nav--top',
]);


// Nav Align
$manager->add_setting( 'nav--top--align', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'flex-start'
]);

$manager->add_control( 'nav--top--align', [
    'type' => 'select',
    'section' => 'nav--top',
    'label' => esc_html__( 'Nav Align', 'taproot' ),
    'choices' => [
        'flex-start' => esc_html__( 'Left', 'taproot' ),
        'flex-end' => esc_html__( 'Right', 'taproot' ),
        'center' => esc_html__( 'Center', 'taproot' ),
        'space-between' => esc_html__( 'Fill', 'taproot' ),
    ]
]);


// Font Family
$manager->add_setting( 'nav--top--font-family', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'default'
]);

$manager->add_control( 'nav--top--font-family', [
    'type' => 'select',
    'section' => 'nav--top',
    'label' => esc_html__( 'Font Family', 'taproot' ),
    'choices' => get_font_choices(),
]);


// Font Styles
$manager->add_setting( 'nav--top--font-styles', [
    'transport' => 'postMessage'
]);

$manager->add_control( new Font_Styles( $manager, 'nav--top--font-styles', [
    'section'   => 'nav--top',
    'label'     => esc_html__( 'Font Styles', 'taproot' ),
]));


// Color Setting: Link Color
color( $manager, 'nav--top--link-color', [
    'label'   => esc_html__( 'Link Color', 'taproot' ),
    'section' => 'nav--top',
]);


// Color Setting: Link Color Hover
color( $manager, 'nav--top--link-color--hover', [
    'label'   => esc_html__( 'Link Color: Hover', 'taproot' ),
    'section' => 'nav--top',
]);


// Setting: Menu Item Font Size
range( $manager, 'nav--top--font-size', [
    'section' => 'nav--top',
    'label' => esc_html__('Font Size', 'taproot'),
    'atts' => range_atts('text')
]);


// Setting: Menu Item Line Height
range( $manager, 'nav--top--line-height', [
    'section' => 'nav--top',
    'label' => esc_html__('Line Height', 'taproot'),
    'atts' => range_atts('line-height')
]);


// menu item padding
range( $manager, 'nav--top--padding', [
    'section' => 'nav--top',
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

