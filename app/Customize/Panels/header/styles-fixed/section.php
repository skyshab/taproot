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
use function Taproot\Customize\range;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'header--styles-fixed', [
    'title' => esc_html__( 'Header Styles Fixed', 'taproot' ),
    'panel' => 'header',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Enable Fixed Header
$manager->add_setting( 'header--styles-fixed--fixed', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'postMessage',
]);

$manager->add_control( 'header--styles-fixed--fixed', [
    'type' => 'checkbox',
    'section' => 'header--styles-fixed',
    'label' => esc_html__( 'Enable Fixed Header', 'taproot' ),
]);


// Setting: Fixed Header Type
$manager->add_setting( 'header--styles-fixed--type', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh',
]);

$manager->add_control( 'header--styles-fixed--type', [
    'type' => 'select',
    'section' => 'header--styles-fixed',
    'label' => esc_html__( 'Fixed Header Type', 'taproot' ),
    'choices' => array(
        'fade' => esc_html__( 'Fade In', 'taproot' ),
        'slide' => esc_html__( 'Slide In', 'taproot' ),
        'sticky' => esc_html__( 'Sticky', 'taproot' ),
    ),
]);


// Color Setting: Background Color
color( $manager, 'header--styles-fixed--background-color', [
    'label'   => esc_html__( 'Header Background Color', 'taproot' ),
    'section' => 'header--styles-fixed',
]);


// Color Setting: Default Color
color( $manager, 'header--styles-fixed--default-color', [
    'label'   => esc_html__( 'Header Default Color', 'taproot' ),
    'section' => 'header--styles-fixed',
]);


// Color Setting: Default Color: Hover
color( $manager, 'header--styles-fixed--default-color-hover', [
    'label'   => esc_html__( 'Header Default Color: Hover', 'taproot' ),
    'section' => 'header--styles-fixed',
]);
