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
    'top', 'top-mobile', 'top-fixed',
    'header', 'header-mobile', 'header-fixed',
    'navbar', 'navbar-mobile', 'navbar-fixed',
    'footer', 'footer-mobile'
]);


// Top Nav Tabs
$panel->tabs([
    'title' => __('Top Nav', 'taproot'),
    'sections' => [
        'nav--top' => [ 'label' => 'default', 'hide' => false ],
        'nav--top-mobile' => [ 'label' => 'mobile', 'hide' => true ],
        'nav--top-fixed' => [ 'label' => 'fixed', 'hide' => true ],
    ],
]);


// Header Nav Tabs
$panel->tabs([
    'title' => __('Header Nav', 'taproot'),
    'sections' => [
        'nav--header' => [ 'label' => 'default', 'hide' => false ],
        'nav--header-mobile' => [ 'label' => 'mobile', 'hide' => true ],
        'nav--header-fixed' => [ 'label' => 'fixed', 'hide' => true ],
    ],
]);


// Navbar Tabs
$panel->tabs([
    'title' => __('Navbar', 'taproot'),
    'sections' => [
        'nav--navbar' => [ 'label' => 'default', 'hide' => false ],
        'nav--navbar-mobile' => [ 'label' => 'mobile', 'hide' => true ],
        'nav--navbar-fixed' => [ 'label' => 'fixed', 'hide' => true ],
    ],
]);


// Footer Nav Tabs
$panel->tabs([
    'title' => __('Footer Nav', 'taproot'),
    'sections' => [
        'nav--footer' => [ 'label' => 'default', 'hide' => false ],
        'nav--footer-mobile' => [ 'label' => 'mobile', 'hide' => true ],
    ],
]);