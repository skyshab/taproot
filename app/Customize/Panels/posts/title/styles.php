<?php
/**
 * Styles for our section.
 *
 * This file creates the front end styles for our customizer controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


use function Taproot\Customize\get_font_styles;
use function Rootstrap\get_theme_mod;


// Blog Title Color
$styles->add([
    'selector' => '.entry__title--single',
    'styles' => [
        'color' => get_theme_mod( 'posts--title--color' ),
    ],
]);


// Font Style
$styles->add([
    'selector' => '.entry__title--single',
    'styles' => get_font_styles( 'posts--title--font-styles' )
]);
