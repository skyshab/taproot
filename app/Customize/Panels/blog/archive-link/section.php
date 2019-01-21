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
use function Taproot\Customize\color;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'blog--archive-link', [
    'title' => esc_html__( 'Archive Link', 'taproot' ),
    'panel' => 'blog',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Link Style
$manager->add_setting( 'blog--archive-link--style', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh',
]);

$manager->add_control( 'blog--archive-link--style', [
    'type' => 'select',
    'section' => 'blog--archive-link',
    'label' => esc_html__( 'Post Link Style', 'taproot' ),
    'choices' => [
        'none' => esc_html__('None', 'taproot'),
        'inline' => esc_html__('Inline', 'taproot'), 
        'link' => esc_html__('Link', 'taproot'),
        'button' => esc_html__('Button', 'taproot'),
    ],       
]);


// Link Position
$manager->add_setting( 'blog--archive-link--position', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh',
]);

$manager->add_control( 'blog--archive-link--position', [
    'type' => 'select',
    'section' => 'blog--archive-link',
    'label' => esc_html__( 'Post Link Position', 'taproot' ),
    'choices' => [
        'right' => esc_html__('Right', 'taproot'),
        'left' => esc_html__('Left', 'taproot'),
    ],      
]);


// Setting: Post Box read more text
$manager->add_setting( 'blog--archive-link--text', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh',
]);

$manager->add_control( 'blog--archive-link--text', [
    'type' => 'text',
    'section' => 'blog--archive-link',
    'label' => esc_html__( 'Read More Text', 'taproot' ),      
]);


// Setting: Link Font Size
range( $manager, 'blog--archive-link--font-size', [
    'section' => 'blog--archive-link',
    'label' => esc_html__('Button Link Font Size', 'taproot'),    
    'atts' => range_atts()
]);
