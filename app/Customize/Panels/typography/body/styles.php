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


use function Taproot\Customize\get_font_family;
use function Rootstrap\get_theme_mod;


// Body Font Family
$styles->add([
    'selector' => 'body',
    'styles' => [
        'font-family' => get_font_family( get_theme_mod( 'typography--body--font-family', 'default' ) )
    ],
]);
