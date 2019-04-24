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
use function Taproot\Customize\color;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'branding--title-fixed', [
    'title' => esc_html__( 'Title - Fixed', 'taproot' ),
    'panel' => 'branding',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Hide When Fixed
$manager->add_setting( 'branding--title-fixed--hide', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'branding--title-fixed--hide', [
    'label'     => esc_html__( 'Hide When Fixed', 'taproot' ),
    'section'   => 'branding--title-fixed',
    'type'      => 'checkbox'
]);


// Font Size
range( $manager, 'branding--title-fixed--font-size', [
    'section' => 'branding--title-fixed',
    'label' => esc_html__('Font Size', 'taproot'),
    'atts'  => range_atts('heading')
]);


// Line Height
range( $manager, 'branding--title-fixed--line-height', [
    'section' => 'branding--title-fixed',
    'label' => esc_html__('Line Height', 'taproot'),
    'atts'  => range_atts('line-height')
]);
