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


$manager->add_section( 'nav--header', [
    'title' => esc_html__( 'Header Nav', 'taproot' ),
    'panel' => 'nav',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Hide when not mobile 
$manager->add_setting( 'nav--header--hide', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'nav--header--hide', [
    'label'     => esc_html__( 'Hide when not mobile', 'taproot' ),
    'section'   => 'nav--header',
    'type'      => 'checkbox'
]);


// Color Setting: Link Color
color( $manager, 'nav--header--link-color', [
    'label'   => esc_html__( 'Link Color', 'taproot' ),
    'section' => 'nav--header',  
]); 


// Color Setting: Link Color Hover
color( $manager, 'nav--header--link-color--hover', [
    'label'   => esc_html__( 'Link Color: Hover', 'taproot' ),
    'section' => 'nav--header',  
]); 



// Font Family
$manager->add_setting( 'nav--header--font-family', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'default'
]);

$manager->add_control( 'nav--header--font-family', [
    'type' => 'select',
    'section' => 'nav--header',
    'label' => esc_html__( 'Font Family', 'taproot' ),
    'choices' => get_font_choices(),       
]);


// Font Styles
$manager->add_setting( 'nav--header--font-styles', [
    'transport' => 'postMessage'
]);

$manager->add_control( new Font_Styles( $manager, 'nav--header--font-styles', [
    'section' => 'nav--header',
    'label'   => esc_html__( 'Font Styles', 'taproot' ),
]));


// Setting: Menu Item Font Size
range( $manager, 'nav--header--font-size', [
    'section' => 'nav--header',
    'label' => esc_html__('Font Size', 'taproot'), 
    'atts' => range_atts('text')
]);


// Setting: Menu Height
range( $manager, 'nav--header--height', [
    'section' => 'nav--header',
    'label' => esc_html__('Menu Height', 'taproot'), 
    'atts' => [
        'px' => [
            'max' => 100,
            'default' => 50,
        ],        
        'em' => [
            'max' => 6,
        ],                        
    ]
]);


// menu item padding
range( $manager, 'nav--header--padding', [
    'section' => 'nav--header',
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
$manager->add_setting( 'nav--header--align', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'center'
]);

$manager->add_control( 'nav--header--align', [
    'type' => 'select',
    'section' => 'nav--header',
    'label' => esc_html__( 'Nav Align', 'taproot' ),
    'choices' => [
        'flex-start' => esc_html__( 'Left', 'taproot' ),
        'flex-end' => esc_html__( 'Right', 'taproot' ),
        'center' => esc_html__( 'Center', 'taproot' ),
        'space-between' => esc_html__( 'Fill', 'taproot' ),
    ]       
]);


// Color Setting: Link Color
color( $manager, 'nav--header--dropdown--background-color', [
    'label'   => esc_html__( 'Dropdown Background Color', 'taproot' ),
    'section' => 'nav--header',  
]); 


// Color Setting: Link Color
color( $manager, 'nav--header--dropdown--link--color', [
    'label'   => esc_html__( 'Dropdown Link Color', 'taproot' ),
    'section' => 'nav--header',  
]); 


// Color Setting: Link Color Hover
color( $manager, 'nav--header--dropdown--link--color--hover', [
    'label'   => esc_html__( 'Dropdown Link Color: Hover', 'taproot' ),
    'section' => 'nav--header',  
]); 
