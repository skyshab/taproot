<?php
/**
 * Styles output on block editor admin pages.
 *
 * This file adds customizer setting styles to the block editor.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


use function Taproot\Customize\get_font_styles;
use function Taproot\Customize\theme_mod;


# =======================================================
# Page - title color
# =======================================================


$styles->add([
    'selector' => '.post-type-page .editor-styles-wrapper .wp-block .editor-post-title__input',
    'styles' => [
        'color' => theme_mod( 'pages--title--color' ),
    ],
]);


# =======================================================
# Page - title font styles
# =======================================================


$styles->add([
    'selector' => '.post-type-page .editor-styles-wrapper .wp-block .editor-post-title__input',
    'styles' => get_font_styles( 'pages--title--font-styles' )
]);


# =======================================================
# Page - title font size
# =======================================================


// mobile default
$styles->add_var([
    'name' => 'pages--title--font-size',
    'value' => theme_mod('pages--title--font-size'),
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// tablet size when settings panel closed, use mobile when open
$styles->add_var([
    'name' => 'pages--title--font-size',
    'value' => theme_mod('pages--title--font-size--tablet'),
    'screen' => 'editor-tablet',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


// tablet size when settings panel open
$styles->add_var([
    'name' => 'pages--title--font-size',
    'value' => theme_mod('pages--title--font-size--tablet'),
    'screen' => 'editor-desktop',
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// desktop size when settings panel closed
$styles->add_var([
    'name' => 'pages--title--font-size',
    'value' => theme_mod('pages--title--font-size--desktop'),
    'screen' => 'editor-desktop',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


# =======================================================
# Page - Title Line Height
# =======================================================


// mobile default
$styles->add_var([
    'name' => 'pages--title--line-height',
    'value' => theme_mod('pages--title--line-height'),
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// tablet size when settings panel closed, use mobile when open
$styles->add_var([
    'name' => 'pages--title--line-height',
    'value' => theme_mod('pages--title--line-height--tablet'),
    'screen' => 'editor-tablet',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


// tablet size when settings panel open
$styles->add_var([
    'name' => 'pages--title--line-height',
    'value' => theme_mod('pages--title--line-height--tablet'),
    'screen' => 'editor-desktop',
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// desktop size when settings panel closed
$styles->add_var([
    'name' => 'pages--title--line-height',
    'value' => theme_mod('pages--title--line-height--desktop'),
    'screen' => 'editor-desktop',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);
