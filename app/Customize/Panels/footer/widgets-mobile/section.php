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


$manager->add_section( 'footer--widgets-mobile', [
    'title' => esc_html__( 'Widgets - Mobile', 'taproot' ),
    'panel' => 'footer',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Widgets layout
$manager->add_setting( 'footer--widgets-mobile--layout', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
]);

$manager->add_control( 'footer--widgets-mobile--layout', [
    'type' => 'select',
    'section' => 'footer--widgets-mobile',
    'label' => esc_html__( 'Widgets Layout', 'taproot' ),
    'choices' => [
        'halves' => esc_html__( 'Halves', 'taproot' ),
        'full' => esc_html__( 'Full', 'taproot' ),
    ],
]);


// Setting: Font Size
range( $manager, 'footer--widgets-mobile--font-size', [
    'section' => 'footer--widgets-mobile',
    'label' => esc_html__('Font Size', 'taproot'), 
    'atts' => range_atts('text')
]);


// Setting: Line Height
range( $manager, 'footer--widgets-mobile--line-height', [
    'section' => 'footer--widgets-mobile',
    'label' => esc_html__('Line Height', 'taproot'), 
    'atts' => range_atts('line-height')
]);


// Setting: Title Font Size
range( $manager, 'footer--widgets-mobile--title--font-size', [
    'section' => 'footer--widgets-mobile',
    'label' => esc_html__('Title Font Size', 'taproot'), 
    'atts' => range_atts('heading')
]);


// Setting: Title Line Height
range( $manager, 'footer--widgets-mobile--title--line-height', [
    'section' => 'footer--widgets-mobile',
    'label' => esc_html__('Title Line Height', 'taproot'), 
    'atts' => range_atts('line-height')
]);


// Setting: Widget Spacing
range( $manager, 'footer--widgets-mobile--gutter', [
    'section' => 'footer--widgets-mobile',
    'label' => esc_html__('Widgets Spacing', 'taproot'), 
    'atts' => range_atts('layout-padding')
]);
