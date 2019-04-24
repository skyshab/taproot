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
use function Taproot\Customize\get_font_choices;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'typography--h4', [
    'title' => esc_html__( 'H4', 'taproot' ),
    'panel' => 'typography',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Text Color
color( $manager, 'typography--h4--color', [
    'label'   => esc_html__( 'Text Color', 'taproot' ),
    'section' => 'typography--h4',
]);


// Font Family
$manager->add_setting( 'typography--h4--font-family', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'default'
]);

$manager->add_control( 'typography--h4--font-family', [
    'type' => 'select',
    'section' => 'typography--h4',
    'label' => esc_html__( 'Font Family', 'taproot' ),
    'choices' => get_font_choices(),
]);


// Font Styles
$manager->add_setting( 'typography--h4--font-styles', [
    'transport' => 'postMessage'
]);

$manager->add_control( new Font_Styles( $manager, 'typography--h4--font-styles', [
    'section'   => 'typography--h4',
    'label'     => esc_html__( 'Font Styles', 'taproot' ),
]));
