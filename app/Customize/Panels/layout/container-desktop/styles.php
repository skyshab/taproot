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
use function Taproot\Customize\is_boxed_layout;
use function Taproot\Customize\get_layout_width;
use function Taproot\Customize\theme_mod;


$site_width = get_layout_width('desktop', 'vw');
$layout_padding = get_padding_from_width($site_width, 'vw');

if( is_boxed_layout() ) {
    $site_width = get_layout_width('desktop', '%');
}

$styles->add_var([
    'screen' => 'desktop',
    'name' => 'layout--container--width',
    'value' => $site_width
]);

$styles->add_var([
    'screen' => 'desktop',
    'name' => 'layout--container--padding',
    'value' => $layout_padding
]);


$styles->add_var([
    'screen' => 'desktop',
    'name' => 'layout--container--width-as-decimal',
    'value' => get_layout_width('desktop')
]);

$styles->add_var([
    'screen' => 'desktop',
    'name' => 'layout--container--width-as-vw',
    'value' => get_layout_width('desktop', 'vw')
]);

$styles->add_var([
    'screen' => 'desktop',
    'name' => 'layout--container--width-as-percentage',
    'value' => get_layout_width('desktop', '%')
]);