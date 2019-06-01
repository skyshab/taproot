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


use function Taproot\Customize\theme_mod;


# =======================================================
# Headings - H5 - Color
# =======================================================


$styles->add([
    'selector' => 'h5',
    'styles' => [ 'color' => theme_mod( 'typography--h5--color' ) ],
]);


# =======================================================
# Headings - H5 - Font Size
# =======================================================


// Mobile default
$styles->custom_property([
    'name' => 'typography--h5--font-size',
    'value' => theme_mod('typography--h5--font-size'),
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// tablet size when settings panel closed, use mobile when open
$styles->custom_property([
    'name' => 'typography--h5--font-size',
    'value' => theme_mod('typography--h5--font-size--tablet'),
    'screen' => 'editor-tablet',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


// tablet size when settings panel open
$styles->custom_property([
    'name' => 'typography--h5--font-size',
    'value' => theme_mod('typography--h5--font-size--tablet'),
    'screen' => 'editor-desktop',
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// desktop size when settings panel closed
$styles->custom_property([
    'name' => 'typography--h5--font-size',
    'value' => theme_mod('typography--h5--font-size--desktop'),
    'screen' => 'editor-desktop',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


# =======================================================
# Headings - H5 - Line Height
# =======================================================


// mobile default
$styles->custom_property([
    'name' => 'typography--h5--line-height',
    'value' => theme_mod('typography--h5--line-height'),
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// tablet size when settings panel closed, use mobile when open
$styles->custom_property([
    'name' => 'typography--h5--line-height',
    'value' => theme_mod('typography--h5--line-height--tablet'),
    'screen' => 'editor-tablet',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


// tablet size when settings panel open
$styles->custom_property([
    'name' => 'typography--h5--line-height',
    'value' => theme_mod('typography--h5--line-height--tablet'),
    'screen' => 'editor-desktop',
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// desktop size when settings panel closed
$styles->custom_property([
    'name' => 'typography--h5--line-height',
    'value' => theme_mod('typography--h5--line-height--desktop'),
    'screen' => 'editor-desktop',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);
