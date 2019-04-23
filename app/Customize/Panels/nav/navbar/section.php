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


$manager->add_section( 'nav--navbar', [
    'title' => esc_html__( 'Navbar', 'taproot' ),
    'panel' => 'nav',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Hide when not mobile
$manager->add_setting( 'nav--navbar--hide', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'nav--navbar--hide', [
    'label'     => esc_html__( 'Hide when not mobile', 'taproot' ),
    'section'   => 'nav--navbar',
    'type'      => 'checkbox'
]);


// Color Setting: Background Color
color( $manager, 'nav--navbar--background-color', [
    'label'   => esc_html__( 'Background Color', 'taproot' ),
    'section' => 'nav--navbar',
]);

// Setting: Navbar Height
range( $manager, 'nav--navbar--height', [
    'section' => 'nav--navbar',
    'label' => esc_html__('Navbar Height', 'taproot'),
    'atts'  => [
        'px' => [
            'max' => 100,
            'default' => 50,
        ],
        'em' => [
            'max' => 6,
        ],
    ]
]);


// Nav Align
$manager->add_setting( 'nav--navbar--align', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
]);

$manager->add_control( 'nav--navbar--align', [
    'type' => 'select',
    'section' => 'nav--navbar',
    'label' => esc_html__( 'Nav Align', 'taproot' ),
    'choices' => [
        'flex-start' => esc_html__( 'Left', 'taproot' ),
        'flex-end' => esc_html__( 'Right', 'taproot' ),
        'center' => esc_html__( 'Center', 'taproot' ),
        'space-between' => esc_html__( 'Fill', 'taproot' ),
    ]
]);


// Font Family
$manager->add_setting( 'nav--navbar--font-family', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'default'
]);

$manager->add_control( 'nav--navbar--font-family', [
    'type' => 'select',
    'section' => 'nav--navbar',
    'label' => esc_html__( 'Font Family', 'taproot' ),
    'choices' => get_font_choices(),
]);


// Font Styles
$manager->add_setting( 'nav--navbar--font-styles', [
    'transport' => 'postMessage'
]);

$manager->add_control( new Font_Styles( $manager, 'nav--navbar--font-styles', [
    'section'   => 'nav--navbar',
    'label'     => esc_html__( 'Font Styles', 'taproot' ),
]));


// Color Setting: Link Color
color( $manager, 'nav--navbar--link-color', [
    'label'   => esc_html__( 'Link Color', 'taproot' ),
    'section' => 'nav--navbar',
]);


// Color Setting: Link Color Hover
color( $manager, 'nav--navbar--link-color--hover', [
    'label'   => esc_html__( 'Link Color: Hover', 'taproot' ),
    'section' => 'nav--navbar',
]);


// Setting: Menu Item Font Size
range( $manager, 'nav--navbar--font-size', [
    'section' => 'nav--navbar',
    'label' => esc_html__('Font Size', 'taproot'),
    'atts' => range_atts('text')
]);


// menu item padding
range( $manager, 'nav--navbar--padding', [
    'section' => 'nav--navbar',
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


// Color Setting: Dropdown Background Color
color( $manager, 'nav--navbar--dropdown--background-color', [
    'label'   => esc_html__( 'Dropdown Background Color', 'taproot' ),
    'section' => 'nav--navbar',
]);


// Color Setting: Dropdown Link Color
color( $manager, 'nav--navbar--dropdown--link--color', [
    'label'   => esc_html__( 'Dropdown Link Color', 'taproot' ),
    'section' => 'nav--navbar',
]);


// Color Setting: Dropdown Link Color Hover
color( $manager, 'nav--navbar--dropdown--link--color--hover', [
    'label'   => esc_html__( 'Dropdown Link Color: Hover', 'taproot' ),
    'section' => 'nav--navbar',
]);
