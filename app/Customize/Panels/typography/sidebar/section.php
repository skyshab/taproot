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


use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'typography--sidebar', [
    'title' => esc_html__( 'Sidebar', 'taproot' ),
    'panel' => 'typography',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Font Size
range( $manager, 'typography--sidebar--font-size', [
    'section' => 'typography--sidebar',
    'label' => esc_html__('Font Size', 'taproot'),
    'atts' => range_atts( 'heading' ),
    'devices' => ['mobile', 'tablet', 'desktop']
]);


// Line Height
range( $manager, 'typography--sidebar--line-height', [
    'section' => 'typography--sidebar',
    'label' => esc_html__('Line Height', 'taproot'),
    'atts' => range_atts( 'line-height' ),
    'devices' => ['mobile', 'tablet', 'desktop']
]);
