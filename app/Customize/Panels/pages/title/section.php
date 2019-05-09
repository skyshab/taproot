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
use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'pages--title', [
    'title' => esc_html__( 'Title', 'taproot' ),
    'panel' => 'pages',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Color Setting: Title Color
color( $manager, 'pages--title--color', [
    'label'   => esc_html__( 'Title Color', 'taproot' ),
    'section' => 'pages--title',
]);


// Title Font Styles
$manager->add_setting( 'pages--title--font-styles', [
    'transport' => 'postMessage'
]);

$manager->add_control( new Font_Styles( $manager, 'pages--title--font-styles', [
    'section'   => 'pages--title',
    'label'     => esc_html__( 'Title Font Styles', 'taproot' ),
]));


// Setting: Title Font Size
range( $manager, 'pages--title--font-size', [
    'section' => 'pages--title',
    'label' => esc_html__('Title Font Size', 'taproot'),
    'atts' => range_atts( 'heading' ),
    'devices' => ['mobile', 'tablet', 'desktop']
]);


// Setting: Title Line Height
range( $manager, 'pages--title--line-height', [
    'section' => 'pages--title',
    'label' => esc_html__('Title Line Height', 'taproot'),
    'atts' => range_atts( 'line-height' ),
    'devices' => ['mobile', 'tablet', 'desktop']
]);
