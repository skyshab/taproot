<?php
/**
 * Styles for our section.
 *
 * This file creates the front end styles for our customizer controls. 
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

 
use function Rootstrap\get_theme_mod;


// Meta Color
$styles->add([
    'selector' => '.entry__byline--archive',
    'styles' => [ 'color' => get_theme_mod( 'blog--archive-meta--color' ) ],
]);


// Meta Icon Color
$styles->add([
    'selector' => '.entry__byline--archive .taproot-icon',
    'styles' => [ 'color' => get_theme_mod( 'blog--archive-meta--icon--color' ) ],
]);


// Meta Font Size
$styles->add([
    'selector' => '.entry__byline--archive',
    'styles' => [ 'font-size' => get_theme_mod( 'blog--archive-meta--font-size' ) ],
]);