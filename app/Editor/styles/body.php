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


use function Taproot\Customize\get_font_family;
use function Taproot\Customize\theme_mod;


# =======================================================
# Body - max content width
# =======================================================


$styles->custom_property([
    'name' => 'layout--content--max-width',
    'value' => theme_mod('layout--content--max-width'),
]);


# =======================================================
# Body - text color
# =======================================================


$styles->custom_property([
    'name' => 'typography--body--text-color',
    'value' => theme_mod('typography--body--text-color'),
]);


# =======================================================
# Body - font family
# =======================================================


$styles->custom_property([
    'name' => 'typography--body--font-family',
    'value' => get_font_family( theme_mod( 'typography--body--font-family' ) ),
]);


# =======================================================
# Body - font size
# =======================================================


// mobile default
$styles->custom_property([
    'name' => 'typography--body--font-size',
    'value' => theme_mod('typography--body--font-size'),
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// tablet size when settings panel closed, use mobile when open
$styles->custom_property([
    'name' => 'typography--body--font-size',
    'value' => theme_mod('typography--body--font-size--tablet'),
    'screen' => 'editor-tablet',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


// tablet size when settings panel open
$styles->custom_property([
    'name' => 'typography--body--font-size',
    'value' => theme_mod('typography--body--font-size--tablet'),
    'screen' => 'editor-desktop',
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// desktop size when settings panel closed
$styles->custom_property([
    'name' => 'typography--body--font-size',
    'value' => theme_mod('typography--body--font-size--desktop'),
    'screen' => 'editor-desktop',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


# =======================================================
# Body - Line Height
# =======================================================


// Body line height default
$styles->custom_property([
    'name' => 'typography--body--line-height',
    'value' => theme_mod('typography--body--line-height'),
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// tablet size when settings panel closed, use mobile when open
$styles->custom_property([
    'name' => 'typography--body--line-height',
    'value' => theme_mod('typography--body--line-height--tablet'),
    'screen' => 'editor-tablet',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


// tablet size when settings panel open
$styles->custom_property([
    'name' => 'typography--body--line-height',
    'value' => theme_mod('typography--body--line-height--tablet'),
    'screen' => 'editor-desktop',
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// desktop size when settings panel closed
$styles->custom_property([
    'name' => 'typography--body--line-height',
    'value' => theme_mod('typography--body--line-height--desktop'),
    'screen' => 'editor-desktop',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);
