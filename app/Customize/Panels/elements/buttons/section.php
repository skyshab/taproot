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
use function Taproot\Customize\get_font_choices;
use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'elements--buttons', [
    'title' => esc_html__( 'Buttons', 'taproot' ),
    'panel' => 'elements',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Color Setting: Background Color
color( $manager, 'elements--buttons--background-color', [
    'label'   => esc_html__( 'Background Color', 'taproot' ),
    'section' => 'elements--buttons',
    'default' => get_theme_mod( 'elements--accents--color' )
]);


// Color Setting: Border Color
color( $manager, 'elements--buttons--border-color', [
    'label'   => esc_html__( 'Border Color', 'taproot' ),
    'section' => 'elements--buttons',
]);


// Color Setting: Text Color
color( $manager, 'elements--buttons--color', [
    'label'   => esc_html__( 'Text Color', 'taproot' ),
    'section' => 'elements--buttons',
]);


// Setting: Enable Rounded Buttons
$manager->add_setting( 'elements--buttons--is-rounded', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'postMessage',
]);

$manager->add_control( 'elements--buttons--is-rounded', [
    'label'     => esc_html__( 'Use Rounded Corners', 'taproot' ),
    'section'   => 'elements--buttons',
    'type'      => 'checkbox'
]);


// Setting: Font size
range( $manager, 'elements--buttons--font-size', [
    'section' => 'elements--buttons',
    'label' => esc_html__('Font Size', 'taproot'),
    'atts' => range_atts()
]);


// Setting: Height
range( $manager, 'elements--buttons--height', [
    'section' => 'elements--buttons',
    'label' => esc_html__('Height', 'taproot'),
    'atts' => range_atts('line-height')
]);


// Setting: Padding
range( $manager, 'elements--buttons--padding', [
    'section' => 'elements--buttons',
    'label' => esc_html__('Padding', 'taproot'),
    'atts'  => [
        'px' => [
            'max' => 50,
        ],
        'em' => [
            'max' => 4,
        ],
        'rem' => [
            'max' => 4,
        ]
    ]
]);


// Setting: Border Width
range( $manager, 'elements--buttons--border-width', [
    'section' => 'elements--buttons',
    'label' => esc_html__('Border Width', 'taproot'),
    'atts'  => [
        'px' => [
            'max' => 10,
            'default' => 0
        ]
    ]
]);


// Font Family
$manager->add_setting( 'elements--buttons--font-family', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'default'
]);

$manager->add_control( 'elements--buttons--font-family', [
    'type' => 'select',
    'section' => 'elements--buttons',
    'label' => esc_html__( 'Font Family', 'taproot' ),
    'choices' => get_font_choices(),
]);


// Font Styles
$manager->add_setting( 'elements--buttons--font-styles', [
    'transport' => 'postMessage'
]);

$manager->add_control( new Font_Styles( $manager, 'elements--buttons--font-styles', [
    'section' => 'elements--buttons',
    'label'   => esc_html__( 'Font Styles', 'taproot' ),
]));
