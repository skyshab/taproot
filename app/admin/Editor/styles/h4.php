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
# Headings - H4 - Color
# =======================================================


$styles->add([
    'selector' => 'h4',
    'styles' => [ 'color' => get_theme_mod( 'typography--h4--color' ) ],
]);


# =======================================================
# Headings - H4 - Font Size
# =======================================================


// Mobile default
$styles->var([
    'name' => 'typography--h4--font-size',
    'value' => get_theme_mod('typography--h4-mobile--font-size'),
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// tablet size when settings panel closed, use mobile when open
$styles->var([
    'name' => 'typography--h4--font-size',
    'value' => get_theme_mod('typography--h4-tablet--font-size'),
    'screen' => 'editor-tablet',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


// tablet size when settings panel open
$styles->var([
    'name' => 'typography--h4--font-size',
    'value' => get_theme_mod('typography--h4-tablet--font-size'),
    'screen' => 'editor-desktop',
    'selector' => '.editor-styles-wrapper .wp-block',
]);        


// desktop size when settings panel closed
$styles->var([
    'name' => 'typography--h4--font-size',
    'value' => get_theme_mod('typography--h4-desktop--font-size'),
    'screen' => 'editor-desktop',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);        


# =======================================================
# Headings - H4 - Line Height
# =======================================================


// mobile default
$styles->var([
    'name' => 'typography--h4--line-height',
    'value' => get_theme_mod('typography--h4-mobile--line-height'),
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// tablet size when settings panel closed, use mobile when open
$styles->var([
    'name' => 'typography--h4--line-height',
    'value' => get_theme_mod('typography--h4-tablet--line-height'),
    'screen' => 'editor-tablet',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


// tablet size when settings panel open
$styles->var([
    'name' => 'typography--h4--line-height',
    'value' => get_theme_mod('typography--h4-tablet--line-height'),
    'screen' => 'editor-desktop',
    'selector' => '.editor-styles-wrapper .wp-block',
]);        


// desktop size when settings panel closed
$styles->var([
    'name' => 'typography--h4--line-height',
    'value' => get_theme_mod('typography--h4-desktop--line-height'),
    'screen' => 'editor-desktop',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);        
