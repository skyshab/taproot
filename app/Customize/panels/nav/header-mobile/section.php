<?php
/**
 * Section setup.
 *
 * This file adds the section, settings and controls to the customizer. 
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


use Taproot\Customize\Font_styles;
use function Taproot\Customize\get_font_choices;
use function Taproot\Customize\color;
use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;



# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'nav--header-mobile', [
    'title' => esc_html__( 'Header Nav Mobile', 'taproot' ),
    'panel' => 'nav',
]);


# =======================================================
# Add Settings & Controls
# =======================================================

   
// Setting: Navbar Mobile Breakpoint       
$manager->add_setting( 'nav--header-mobile--breakpoint', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh',
    'default' => 'mobile'
]);

$manager->add_control( 'nav--header-mobile--breakpoint', [
    'type' => 'select',
    'section' => 'nav--header-mobile',
    'label' => esc_html__( 'Mobile Menu Breakpoint', 'taproot' ),
    'choices' => [
        'never' => esc_html__( 'Never Mobile', 'taproot' ),
        'mobile' => esc_html__( 'Mobile Only', 'taproot' ),
        'tablet-and-under' => esc_html__( 'Tablet and under', 'taproot' ),
        'default' => esc_html__( 'Always Mobile', 'taproot' ),
    ],       
]);


// Setting: Hide when mobile 
$manager->add_setting( 'nav--header-mobile--hide', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'nav--header-mobile--hide', [
    'label'     => esc_html__( 'Hide when mobile', 'taproot' ),
    'section'   => 'nav--header-mobile',
    'type'      => 'checkbox'
]);


// Setting: Mobile Menu Type
$manager->add_setting( 'nav--header-mobile--type', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'dropdown-slide'
]);

$manager->add_control( 'nav--header-mobile--type', [
    'type' => 'select',
    'section' => 'nav--header-mobile',
    'label' => esc_html__( 'Mobile Menu Type', 'taproot' ),
    'choices' => [
        'dropdown-slide' => esc_html__( 'Dropdown - Slide', 'taproot' ),
        'dropdown-fade' => esc_html__( 'Dropdown - Fade', 'taproot' ),
        'slide' => esc_html__( 'Slide In', 'taproot' ),
        'fullscreen' => esc_html__( 'Fullscreen', 'taproot' ),
    ],       
]);

// Setting: Mobile Menu Icon Size
range( $manager, 'nav--header-mobile--icon-size', [
    'section' => 'nav--header-mobile',
    'label' => esc_html__('Icon Size', 'taproot'), 
    'atts'  => [
        'px' => [
            'max' => 48,
        ],        
        'em' => [
            'max' => 3,
        ],                 
    ]
]);


// Color Setting: Icon Color
color( $manager, 'nav--header-mobile--icon-color', [
    'label'   => esc_html__( 'Icon Color', 'taproot' ),
    'section' => 'nav--header-mobile',  
]); 


// Color Setting: Menu Background Color
color( $manager, 'nav--header-mobile--background-color', [
    'label'   => esc_html__( 'Menu Background Color', 'taproot' ),
    'section' => 'nav--header-mobile',  
]); 

// Color Setting: Separator Color
color( $manager, 'nav--header-mobile--separator-color', [
    'label'   => esc_html__( 'Separator Color', 'taproot' ),
    'section' => 'nav--header-mobile',  
]); 


// Color Setting: Link Color
color( $manager, 'nav--header-mobile--link-color', [
    'label'   => esc_html__( 'Link Color', 'taproot' ),
    'section' => 'nav--header-mobile',  
]); 


// Color Setting: Link Color Hover
color( $manager, 'nav--header-mobile--link-color--hover', [
    'label'   => esc_html__( 'Link Color: Hover', 'taproot' ),
    'section' => 'nav--header-mobile',  
]); 


// Font Styles
$manager->add_setting( 'nav--header-mobile--font-styles', [
    'transport' => 'postMessage'
]);

$manager->add_control( new Font_Styles( $manager, 'nav--header-mobile--font-styles', [
    'section' => 'nav--header-mobile',
    'label'   => esc_html__( 'Font Styles', 'taproot' ),
]));


// Setting: Menu Item Font Size
range( $manager, 'nav--header-mobile--font-size', [
    'section' => 'nav--header-mobile',
    'label' => esc_html__('Font Size', 'taproot'), 
    'atts'  => [
        'px' => [
            'max' => 32,
        ],        
        'em' => [
            'max' => 2,
        ],                 
    ]
]);


// Setting: Menu Item Line Height
range( $manager, 'nav--header-mobile--line-height', [
    'section' => 'nav--header-mobile',
    'label' => esc_html__('Line Height', 'taproot'), 
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
range( $manager, 'nav--header-mobile--padding', [
    'section' => 'nav--header-mobile',
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

