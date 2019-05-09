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
use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;
use function Taproot\Customize\color;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'blog--title', [
    'title' => esc_html__( 'Title', 'taproot' ),
    'panel' => 'blog',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Blog Page Title
$manager->add_setting( 'blog--title--title', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh',
]);

$manager->add_control( 'blog--title--title', [
    'type' => 'text',
    'section' => 'blog--title',
    'label' => esc_html__( 'Blog Page Title', 'taproot' ),
]);


// Color Setting: Title Color
color( $manager, 'blog--title--color', [
    'label'   => esc_html__( 'Title Color', 'taproot' ),
    'section' => 'blog--title',
]);


// Font Styles
$manager->add_setting( 'blog--title--font-styles', [
    'transport' => 'postMessage'
]);

$manager->add_control( new Font_Styles( $manager,
    'blog--title--font-styles', [
        'section'   => 'blog--title',
        'label'     => esc_html__( 'Title Font Styles', 'taproot' ),
    ]
));


// Setting: Title Font Size
range( $manager, 'blog--title--font-size', [
    'section' => 'blog--title',
    'label' => esc_html__('Title Font Size', 'taproot'),
    'atts' => range_atts('heading'),
    'devices' => ['mobile', 'tablet', 'desktop']
]);


// Setting: Title Line Height
range( $manager, 'blog--title--line-height', [
    'section' => 'blog--title',
    'label' => esc_html__('Title Line Height', 'taproot'),
    'atts' => range_atts('line-height'),
    'devices' => ['mobile', 'tablet', 'desktop']
]);
