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


use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'footer--widgets-tablet', [
    'title' => esc_html__( 'Widgets - Tablet', 'taproot' ),
    'panel' => 'footer',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Widgets layout
$manager->add_setting( 'footer--widgets-tablet--layout', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
]);

$manager->add_control( 'footer--widgets-tablet--layout', [
    'type' => 'select',
    'section' => 'footer--widgets-tablet',
    'label' => esc_html__( 'Widgets Layout', 'taproot' ),
    'choices' => [
        'quarters' => esc_html__( 'Quarters', 'taproot' ),
        'thirds' => esc_html__( 'Thirds', 'taproot' ),
        'halves' => esc_html__( 'Halves', 'taproot' ),
        'full' => esc_html__( 'Full', 'taproot' ),
        'one-third-two-thirds' => esc_html__( 'One Third / Two Thirds', 'taproot' ),
        'two-thirds-one-third' => esc_html__( 'Two Thirds / One Third', 'taproot' ),
        'quarter-quarter-half' => esc_html__( 'Quarter / Quarter / Half', 'taproot' ),
        'half-quarter-quarter' => esc_html__( 'Half / Quarter / Quarter', 'taproot' ),
    ],
]);


// Setting: Font Size
range( $manager, 'footer--widgets-tablet--font-size', [
    'section' => 'footer--widgets-tablet',
    'label' => esc_html__('Font Size', 'taproot'), 
    'atts' => range_atts('text')
]);


// Setting: Line Height
range( $manager, 'footer--widgets-tablet--line-height', [
    'section' => 'footer--widgets-tablet',
    'label' => esc_html__('Line Height', 'taproot'), 
    'atts' => range_atts('line-height')
]);


// Setting: Title Font Size
range( $manager, 'footer--widgets-tablet--title--font-size', [
    'section' => 'footer--widgets-tablet',
    'label' => esc_html__('Title Font Size', 'taproot'), 
    'atts' => range_atts('heading')
]);


// Setting: Title Line Height
range( $manager, 'footer--widgets-tablet--title--line-height', [
    'section' => 'footer--widgets-tablet',
    'label' => esc_html__('Title Line Height', 'taproot'), 
    'atts' => range_atts('line-height')
]);


// Setting: Widget Spacing
range( $manager, 'footer--widgets-tablet--gutter', [
    'section' => 'footer--widgets-tablet',
    'label' => esc_html__('Widgets Spacing', 'taproot'), 
    'atts' => range_atts('layout-padding')
]);
