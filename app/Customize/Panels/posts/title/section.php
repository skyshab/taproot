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
use Taproot\Customize\Controls\Font_Styles;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'posts--title', [
    'title' => esc_html__( 'Title', 'taproot' ),
    'panel' => 'posts',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Color Setting: Title Color
color( $manager, 'posts--title--color', [
    'label'   => esc_html__( 'Title Color', 'taproot' ),
    'section' => 'posts--title',
]);


// Title Font Styles
$manager->add_setting( 'posts--title--font-styles', [
    'transport' => 'postMessage'
]);

$manager->add_control( new Font_Styles( $manager, 'posts--title--font-styles', [
    'section'   => 'posts--title',
    'label'     => esc_html__( 'Title Font Styles', 'taproot' ),
]));
