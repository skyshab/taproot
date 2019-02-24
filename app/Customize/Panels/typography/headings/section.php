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


use Taproot\Customize\Controls\Font_Styles;
use function Taproot\Customize\get_font_choices;
use function Taproot\Customize\color;



# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'typography--headings', [
    'title' => esc_html__( 'Headings', 'taproot' ),
    'panel' => 'typography',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Text Color
color( $manager, 'typography--text-color', [
    'label'   => esc_html__( 'Text Color', 'taproot' ),
    'section' => 'typography--headings', 
]); 


// Font Family
$manager->add_setting( 'typography--font-family', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'default'
]);

$manager->add_control( 'typography--font-family', [
    'type' => 'select',
    'section' => 'typography--headings',
    'label' => esc_html__( 'Font Family', 'taproot' ),
    'choices' => get_font_choices(),       
]);


// Font Styles
$manager->add_setting( 'typography--font-styles', [
    'transport' => 'postMessage'
]);

$manager->add_control( new Font_Styles( $manager, 'typography--font-styles', [
    'section'   => 'typography--headings',
    'label'     => esc_html__( 'Heading Font Styles', 'taproot' ),
]));
