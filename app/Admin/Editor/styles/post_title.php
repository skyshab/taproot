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
use function Rootstrap\get_theme_mod;


# =======================================================
# Post - title color
# =======================================================


$styles->add([
    'selector' => 'body:not( .post-type-page ) .editor-styles-wrapper .wp-block .editor-post-title__input',
    'styles' => [
        'color' => get_theme_mod( 'posts--title--color' ),
    ],
]);


# =======================================================
# Post - title font styles
# =======================================================


$styles->add([
    'selector' => 'body:not( .post-type-page ) .editor-styles-wrapper .wp-block .editor-post-title__input',
    'styles' => get_font_styles( 'posts--title--font-styles' )
]);


# =======================================================
# Post - title font size
# =======================================================


// mobile default
$styles->add_var([
    'name' => 'posts--title--font-size',
    'value' => get_theme_mod('posts--title-mobile--font-size'),
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// tablet size when settings panel closed, use mobile when open
$styles->add_var([
    'name' => 'posts--title--font-size',
    'value' => get_theme_mod('posts--title-tablet--font-size'),
    'screen' => 'editor-tablet',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


// tablet size when settings panel open
$styles->add_var([
    'name' => 'posts--title--font-size',
    'value' => get_theme_mod('posts--title-tablet--font-size'),
    'screen' => 'editor-desktop',
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// desktop size when settings panel closed
$styles->add_var([
    'name' => 'posts--title--font-size',
    'value' => get_theme_mod('posts--title-desktop--font-size'),
    'screen' => 'editor-desktop',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


# =======================================================
# Post - Title Line Height
# =======================================================


// mobile default
$styles->add_var([
    'name' => 'posts--title--line-height',
    'value' => get_theme_mod('posts--title-mobile--line-height'),
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// tablet size when settings panel closed, use mobile when open
$styles->add_var([
    'name' => 'posts--title--line-height',
    'value' => get_theme_mod('posts--title-tablet--line-height'),
    'screen' => 'editor-tablet',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


// tablet size when settings panel open
$styles->add_var([
    'name' => 'posts--title--line-height',
    'value' => get_theme_mod('posts--title-tablet--line-height'),
    'screen' => 'editor-desktop',
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// desktop size when settings panel closed
$styles->add_var([
    'name' => 'posts--title--line-height',
    'value' => get_theme_mod('posts--title-desktop--line-height'),
    'screen' => 'editor-desktop',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);
