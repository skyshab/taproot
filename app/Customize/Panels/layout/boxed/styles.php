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


use function Taproot\Customize\is_boxed_layout;
use function Taproot\Customize\theme_mod;


$styles->add_var([
    'name' => 'layout--boxed--outer-padding',
    'value' => theme_mod( 'layout--boxed--outer-padding', true ),
    'callback' => is_boxed_layout(),
]);
