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


use function Taproot\Customize\get_padding_from_width;
use function Taproot\Customize\theme_mod;


$site_width = theme_mod('layout--container-mobile--width', true);
$layout_padding = get_padding_from_width( $site_width, 'vw' );

$styles->add_var([
    'name' => 'layout--container--width',
    'value' => $site_width
]);

$styles->add_var([
    'name' => 'layout--container--padding',
    'value' => $layout_padding
]);
