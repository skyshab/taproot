<?php
/**
 * Styles output on block editor admin pages. 
 * 
 * This file adds customizer setting styles to the block editor. 
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


use function Rootstrap\get_theme_mod;


# =======================================================
# Headings - H5 - Color
# =======================================================


$styles->add([
    'selector' => 'h5',
    'styles' => [ 'color' => get_theme_mod( 'typography--h5--color' ) ],
]);


# =======================================================
# Headings - H5 - Font Size
# =======================================================


// Mobile default
$styles->add_var([
    'name' => 'typography--h5--font-size',
    'value' => get_theme_mod('typography--h5-mobile--font-size'),
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// tablet size when settings panel closed, use mobile when open
$styles->add_var([
    'name' => 'typography--h5--font-size',
    'value' => get_theme_mod('typography--h5-tablet--font-size'),
    'screen' => 'editor-tablet',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


// tablet size when settings panel open
$styles->add_var([
    'name' => 'typography--h5--font-size',
    'value' => get_theme_mod('typography--h5-tablet--font-size'),
    'screen' => 'editor-desktop',
    'selector' => '.editor-styles-wrapper .wp-block',
]);        


// desktop size when settings panel closed
$styles->add_var([
    'name' => 'typography--h5--font-size',
    'value' => get_theme_mod('typography--h5-desktop--font-size'),
    'screen' => 'editor-desktop',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);        


# =======================================================
# Headings - H5 - Line Height
# =======================================================


// mobile default
$styles->add_var([
    'name' => 'typography--h5--line-height',
    'value' => get_theme_mod('typography--h5-mobile--line-height'),
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// tablet size when settings panel closed, use mobile when open
$styles->add_var([
    'name' => 'typography--h5--line-height',
    'value' => get_theme_mod('typography--h5-tablet--line-height'),
    'screen' => 'editor-tablet',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


// tablet size when settings panel open
$styles->add_var([
    'name' => 'typography--h5--line-height',
    'value' => get_theme_mod('typography--h5-tablet--line-height'),
    'screen' => 'editor-desktop',
    'selector' => '.editor-styles-wrapper .wp-block',
]);        


// desktop size when settings panel closed
$styles->add_var([
    'name' => 'typography--h5--line-height',
    'value' => get_theme_mod('typography--h5-desktop--line-height'),
    'screen' => 'editor-desktop',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);        
