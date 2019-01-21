<?php
/**
 * Default values for our section.
 *
 * This file creates defines the defaults to use for our customizer controls
 * and the output of get_theme_mod when no value is set in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


// Archive link font size
$defaults->add( 'blog--archive-link--font-size', '0.8em' );


// Archive link type
$defaults->add( 'blog--archive-link--style', 'link' );


// Archive link position
$defaults->add( 'blog--archive-link--position', 'right' );


// Archive read more text
$defaults->add( 'blog--archive-link--text', esc_html__('read more', 'taproot') );
