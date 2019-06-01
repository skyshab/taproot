<?php
/**
 * Add customizer panel
 *
 * This file creates a panel in the customizer
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


$panels->add( 'general', [
    'title' => __('General', 'taproot'),
    'priority' => 10,
]);

$panels->add( 'layout', [
    'title' => esc_html__( 'Layout', 'taproot' ),
    'priority' => 10,
]);

$panels->add( 'header', [
    'title' => esc_html__( 'Header', 'taproot' ),
    'priority' => 10,
]);

$panels->add( 'branding', [
    'title' => esc_html__( 'Branding', 'taproot' ),
    'priority' => 10,
]);

$panels->add( 'typography', [
    'title' => esc_html__( 'Typography', 'taproot' ),
    'priority' => 10,
]);

$panels->add( 'colors', [
    'title' => esc_html__( 'Colors', 'taproot' ),
    'priority' => 10,
]);

$panels->add( 'elements', [
    'title' => esc_html__( 'Elements', 'taproot' ),
    'priority' => 10,
]);

$panels->add( 'blog', [
    'title' => esc_html__( 'Blog', 'taproot' ),
    'priority' => 10,
]);

$panels->add( 'posts', [
    'title' => esc_html__( 'Posts', 'taproot' ),
    'priority' => 10,
]);

$panels->add( 'pages', [
    'title' => esc_html__( 'Pages', 'taproot' ),
    'priority' => 10,
]);

$panels->add( 'footer', [
    'title' => esc_html__( 'Footer', 'taproot' ),
    'priority' => 10,
]);

$panels->add( 'nav', [
    'title' => esc_html__( 'Navigation', 'taproot' ),
    'priority' => 10,
]);
