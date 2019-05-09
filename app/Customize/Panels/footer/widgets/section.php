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


use function Taproot\Customize\color;
use function Taproot\Customize\select;
use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'footer--widgets', [
    'title' => esc_html__( 'Widgets', 'taproot' ),
    'panel' => 'footer',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Widgets layout
select( $manager, 'footer--widgets--layout', [
    'section' => 'footer--widgets',
    'label' => esc_html__( 'Widgets Layout', 'taproot' ),
    'choices' => [
        'mobile' => [
            'halves' => esc_html__( 'Halves', 'taproot' ),
            'full' => esc_html__( 'Full', 'taproot' ),
        ],
        'tablet' => [
            'quarters' => esc_html__( 'Quarters', 'taproot' ),
            'thirds' => esc_html__( 'Thirds', 'taproot' ),
            'halves' => esc_html__( 'Halves', 'taproot' ),
            'full' => esc_html__( 'Full', 'taproot' ),
            'one-third-two-thirds' => esc_html__( 'One Third / Two Thirds', 'taproot' ),
            'two-thirds-one-third' => esc_html__( 'Two Thirds / One Third', 'taproot' ),
            'quarter-quarter-half' => esc_html__( 'Quarter / Quarter / Half', 'taproot' ),
            'half-quarter-quarter' => esc_html__( 'Half / Quarter / Quarter', 'taproot' ),
        ],
        'desktop' => [
            'quarters' => esc_html__( 'Quarters', 'taproot' ),
            'thirds' => esc_html__( 'Thirds', 'taproot' ),
            'halves' => esc_html__( 'Halves', 'taproot' ),
            'full' => esc_html__( 'Full', 'taproot' ),
            'one-third-two-thirds' => esc_html__( 'One Third / Two Thirds', 'taproot' ),
            'two-thirds-one-third' => esc_html__( 'Two Thirds / One Third', 'taproot' ),
            'quarter-quarter-half' => esc_html__( 'Quarter / Quarter / Half', 'taproot' ),
            'half-quarter-quarter' => esc_html__( 'Half / Quarter / Quarter', 'taproot' ),
        ]
    ],
    'devices' => ['mobile', 'tablet', 'desktop']
]);


// Color Setting: Widget Headings Color
color( $manager, 'footer--widgets--headings-color', [
    'label'   => esc_html__( 'Headings Color', 'taproot' ),
    'section' => 'footer--widgets',
]);


// Color Setting: Widget Default Color
color( $manager, 'footer--widgets--default-color', [
    'label'   => esc_html__( 'Text Color', 'taproot' ),
    'section' => 'footer--widgets',
]);


// Color Setting: Widget Link Color
color( $manager, 'footer--widgets--link-color', [
    'label'   => esc_html__( 'Link Color', 'taproot' ),
    'section' => 'footer--widgets',
]);


// Color Setting: Widget Link Hover Color
color( $manager, 'footer--widgets--link-color--hover', [
    'label'   => esc_html__( 'Link Hover Color', 'taproot' ),
    'section' => 'footer--widgets',
]);


// Setting: Font Size
range( $manager, 'footer--widgets--font-size', [
    'section' => 'footer--widgets',
    'label' => esc_html__('Font Size', 'taproot'),
    'atts' => range_atts('text'),
    'devices' => ['mobile', 'tablet', 'desktop']
]);


// Setting: Line Height
range( $manager, 'footer--widgets--line-height', [
    'section' => 'footer--widgets',
    'label' => esc_html__('Line Height', 'taproot'),
    'atts' => range_atts('line-height'),
    'devices' => ['mobile', 'tablet', 'desktop']
]);


// Setting: Title Font Size
range( $manager, 'footer--widgets--title--font-size', [
    'section' => 'footer--widgets',
    'label' => esc_html__('Title Font Size', 'taproot'),
    'atts' => range_atts('heading'),
    'devices' => ['mobile', 'tablet', 'desktop']
]);


// Setting: Title Line Height
range( $manager, 'footer--widgets--title--line-height', [
    'section' => 'footer--widgets',
    'label' => esc_html__('Title Line Height', 'taproot'),
    'atts' => range_atts('line-height'),
    'devices' => ['mobile', 'tablet', 'desktop']
]);


// Setting: Widget Spacing
range( $manager, 'footer--widgets--gutter', [
    'section' => 'footer--widgets',
    'label' => esc_html__('Widgets Spacing', 'taproot'),
    'atts' => range_atts('layout-padding'),
    'devices' => ['mobile', 'tablet', 'desktop']
]);
