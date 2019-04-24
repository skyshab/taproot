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


$manager->add_section( 'blog--archive-meta', [
    'title' => esc_html__( 'Archive Meta', 'taproot' ),
    'panel' => 'blog',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Color Setting: Meta Color
color( $manager, 'blog--archive-meta--color', [
    'label'   => esc_html__( 'Meta Color', 'taproot' ),
    'section' => 'blog--archive-meta',
]);


// Color Setting: Meta Icon Color
color( $manager, 'blog--archive-meta--icon--color', [
    'label'   => esc_html__( 'Meta Icon Color', 'taproot' ),
    'section' => 'blog--archive-meta',
]);


// Setting: Meta Size
range( $manager, 'blog--archive-meta--font-size', [
    'section'   => 'blog--archive-meta',
    'label'     => esc_html__('Meta Size', 'taproot'),
    'atts' => range_atts()
]);
