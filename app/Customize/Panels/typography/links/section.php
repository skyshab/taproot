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


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'typography--links', [
    'title' => esc_html__( 'Links', 'taproot' ),
    'panel' => 'typography',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Link Color
color( $manager, 'typography--color', [
    'label'   => esc_html__( 'Link Color', 'taproot' ),
    'section' => 'typography--links',
]);


// Link Color Visited
color( $manager, 'typography--color--visited', [
    'label'   => esc_html__( 'Link Color Visited', 'taproot' ),
    'section' => 'typography--links',
]);


// Link Color Hover
color( $manager, 'typography--color--hover', [
    'label'   => esc_html__( 'Link Color Hover', 'taproot' ),
    'section' => 'typography--links',
]);


// Link Color Active
color( $manager, 'typography--color--active', [
    'label'   => esc_html__( 'Link Color Active', 'taproot' ),
    'section' => 'typography--links',
]);


// Setting: Link Underline
$manager->add_setting( 'typography--underline', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'hover',
]);

$manager->add_control( 'typography--underline', [
    'type' => 'radio',
    'section' => 'typography--links',
    'label' => esc_html__( 'Link Underline', 'taproot' ),
    'choices' => array(
        'none' => esc_html__( 'None', 'taproot' ),
        'underline' => esc_html__( 'Underline', 'taproot' ),
        'hover' => esc_html__( 'On Hover', 'taproot' ),
    ),
]);
