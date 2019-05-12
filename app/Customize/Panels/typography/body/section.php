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


use function Taproot\Customize\get_font_choices;
use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;
use function Taproot\Customize\color;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'typography--body', [
    'title' => esc_html__( 'Body', 'taproot' ),
    'panel' => 'typography',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Color Setting: Text Color
color( $manager, 'typography--body--text-color', [
    'label'   => esc_html__( 'Text Color', 'taproot' ),
    'section' => 'typography--body',
]);


// Setting:  Body Font
$manager->add_setting( 'typography--body--font-family', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'default'
]);

$manager->add_control( 'typography--body--font-family', [
    'type' => 'select',
    'section' => 'typography--body',
    'label' => esc_html__( 'Font Family', 'taproot' ),
    'choices' => get_font_choices(),
]);


// Font Size
range( $manager, 'typography--body--font-size', [
    'section' => 'typography--body',
    'label' => esc_html__('Font Size', 'taproot'),
    'atts' => range_atts( 'text' ),
    'devices' => ['mobile', 'tablet', 'desktop']
]);


// Line Height
range( $manager, 'typography--body--line-height', [
    'section' => 'typography--body',
    'label' => esc_html__('Line Height', 'taproot'),
    'atts' => range_atts( 'line-height' ),
    'devices' => ['mobile', 'tablet', 'desktop']
]);
