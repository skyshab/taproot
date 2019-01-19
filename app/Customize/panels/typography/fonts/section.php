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


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'typography--fonts', [
    'title' => esc_html__( 'Google Fonts', 'taproot' ),
    'panel' => 'typography',
    'description' => sprintf( '%s <a href="%s" target="_blank">%s</a>%s', 
        esc_html__( 'Visit', 'taproot' ), 
        esc_url( 'https://fonts.google.com' ),
        esc_html__( 'Google Fonts', 'taproot' ),
        esc_html__(' to create your font profile. Paste in the font list from the end of the embed URL, or add desired fonts using the following formula: Each font name should be separated by a "|" and use a "+" for spaces.', 'taproot')
    )
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Google Fonts
$manager->add_setting( 'taproot-google-fonts', [
    'sanitize_callback' => 'sanitize_google_fonts',
]);

$manager->add_control( 'taproot-google-fonts', [
    'type' => 'text',
    'section' => 'typography--fonts',
    'label' => esc_html__( 'Google Fonts Code', 'taproot' ),
]);   
