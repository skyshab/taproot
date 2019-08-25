<?php
/**
 * Add customizer panel
 *
 * This file creates a panel in the customizer
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


// define sections
$panel->sections([
    'styles',
    'styles-fixed',
    'image',
    'hero'
]);


// Header Styles tabs
$panel->tabs([
    'title' => __('Header Styles', 'taproot'),
    'sections' => [
        'header--styles' => [ 'label' => __('default', 'taproot'), 'hide' => false ],
        'header--styles-fixed' => [ 'label' => __('fixed', 'taproot'), 'hide' => true ],
        'header--hero' => [ 'label' => __('hero', 'taproot'), 'hide' => true ],
    ],
]);
