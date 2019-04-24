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


$manager->add_section( 'nav--navbar-mobile', [
    'title' => esc_html__( 'Navbar Mobile', 'taproot' ),
    'panel' => 'nav',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Navbar Mobile Breakpoint
$manager->add_setting( 'nav--navbar-mobile--breakpoint', array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh',
));

$manager->add_control( 'nav--navbar-mobile--breakpoint', array(
    'type' => 'select',
    'section' => 'nav--navbar-mobile',
    'label' => esc_html__( 'Mobile Menu Breakpoint', 'taproot' ),
    'choices' => array(
        'never' => esc_html__( 'Never Mobile', 'taproot' ),
        'mobile' => esc_html__( 'Mobile Only', 'taproot' ),
        'tablet-and-under' => esc_html__( 'Tablet and under', 'taproot' ),
        'default' => esc_html__( 'Always Mobile', 'taproot' ),
    ),
));


// Setting: Hide when mobile
$manager->add_setting( 'nav--navbar-mobile--hide', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'nav--navbar-mobile--hide', [
    'label'     => esc_html__( 'Hide when mobile', 'taproot' ),
    'section'   => 'nav--navbar-mobile',
    'type'      => 'checkbox'
]);


// Setting: Mobile Menu Type
$manager->add_setting( 'nav--navbar-mobile--type', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh',
]);

$manager->add_control( 'nav--navbar-mobile--type', [
    'type' => 'select',
    'section' => 'nav--navbar-mobile',
    'label' => esc_html__( 'Mobile Menu Type', 'taproot' ),
    'choices' => [
        'dropdown-slide' => esc_html__( 'Dropdown - Slide', 'taproot' ),
        'dropdown-fade' => esc_html__( 'Dropdown - Fade', 'taproot' ),
        'slide' => esc_html__( 'Slide In', 'taproot' ),
        'fullscreen' => esc_html__( 'Fullscreen', 'taproot' ),
    ],
]);


// Color Setting: Navbar Background Color
color( $manager, 'nav--navbar-mobile--background-color', [
    'label'   => esc_html__( 'Navbar Background Color', 'taproot' ),
    'section' => 'nav--navbar-mobile',
]);


// Setting: Navbar Height
range( $manager, 'nav--navbar-mobile--height', [
    'section' => 'nav--navbar-mobile',
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


// Setting: Toggle Side
$manager->add_setting( 'nav--navbar-mobile--side', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh',
    'default' => 'left'
]);

$manager->add_control( 'nav--navbar-mobile--side', [
    'type' => 'select',
    'section' => 'nav--navbar-mobile',
    'label' => esc_html__( 'Mobile Toggle Side', 'taproot' ),
    'choices' => [
        'left' => esc_html__( 'Left', 'taproot' ),
        'right' => esc_html__( 'Right', 'taproot' ),
    ],
]);


// Color Setting: Icon Color
color( $manager, 'nav--navbar-mobile--icon-color', [
    'label'   => esc_html__( 'Icon Color', 'taproot' ),
    'section' => 'nav--navbar-mobile',
]);


// Setting: Mobile Menu Icon Size
range( $manager, 'nav--navbar-mobile--icon-size', [
    'section' => 'nav--navbar-mobile',
    'label' => esc_html__('Icon Size', 'taproot'),
    'atts' => [
        'px' => [
            'max' => 48,
        ],
        'em' => [
            'max' => 3,
        ],
    ]
]);


// Font Styles
$manager->add_setting( 'nav--navbar-mobile--font-styles', [
    'transport' => 'postMessage'
]);

$manager->add_control( new Font_Styles( $manager, 'nav--navbar-mobile--font-styles', [
    'section' => 'nav--navbar-mobile',
    'label'   => esc_html__( 'Font Styles', 'taproot' ),
]));


// Color Setting: Menu Background Color
color( $manager, 'nav--navbar-mobile--menu-background-color', [
    'label'   => esc_html__( 'Menu Background Color', 'taproot' ),
    'section' => 'nav--navbar-mobile',
]);


// Color Setting: Separator Color
color( $manager, 'nav--navbar-mobile--separator-color', [
    'label'   => esc_html__( 'Menu Separator Color', 'taproot' ),
    'section' => 'nav--navbar-mobile',
]);


// Color Setting: Link Color
color( $manager, 'nav--navbar-mobile--link-color', [
    'label'   => esc_html__( 'Link Color', 'taproot' ),
    'section' => 'nav--navbar-mobile',
]);


// Color Setting: Link Color Hover
color( $manager, 'nav--navbar-mobile--link-color--hover', [
    'label'   => esc_html__( 'Link Color: Hover', 'taproot' ),
    'section' => 'nav--navbar-mobile',
]);


// Setting: Menu Item Font Size
range( $manager, 'nav--navbar-mobile--font-size', [
    'section' => 'nav--navbar-mobile',
    'label' => esc_html__('Link Font Size', 'taproot'),
    'atts' => range_atts('text')
]);


// Setting: Menu Item Line Height
range( $manager, 'nav--navbar-mobile--line-height', [
    'section' => 'nav--navbar-mobile',
    'label' => esc_html__('Link Line Height', 'taproot'),
    'atts'  => [
        'px' => [
            'max' => 64,
        ],
        'em' => [
            'max' => 5,
        ],
        'rem' => [
            'max' => 5,
        ],
    ]
]);


// menu item padding
range( $manager, 'nav--navbar-mobile--padding', [
    'section' => 'nav--navbar-mobile',
    'label' => esc_html__('Link Padding', 'taproot'),
    'atts'  => [
        'px' => [
            'max' => 32,
        ],
        'em' => [
            'max' => 2,
        ],
    ]
]);
