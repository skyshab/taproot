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


use function Taproot\Customize\get_font_family;
use function Rootstrap\get_theme_mod;


# =======================================================
# Body - max content width
# =======================================================


$styles->add_var([
    'name' => 'layout--content--max-width',
    'value' => get_theme_mod('layout--content--max-width'),
]);


# =======================================================
# Body - text color
# =======================================================


$styles->add_var([
    'name' => 'typography--body--text-color',
    'value' => get_theme_mod('typography--body--text-color'),
]);        
        

# =======================================================
# Body - font family
# =======================================================


$styles->add_var([
    'name' => 'typography--body--font-family',
    'value' => get_font_family( get_theme_mod( 'typography--body--font-family' ) ),
]);        


# =======================================================
# Body - font size
# =======================================================


// mobile default
$styles->add_var([
    'name' => 'typography--body--font-size',
    'value' => get_theme_mod('typography--body-mobile--font-size'),
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// tablet size when settings panel closed, use mobile when open
$styles->add_var([
    'name' => 'typography--body--font-size',
    'value' => get_theme_mod('typography--body-tablet--font-size'),
    'screen' => 'editor-tablet',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


// tablet size when settings panel open
$styles->add_var([
    'name' => 'typography--body--font-size',
    'value' => get_theme_mod('typography--body-tablet--font-size'),
    'screen' => 'editor-desktop',
    'selector' => '.editor-styles-wrapper .wp-block',
]);        


// desktop size when settings panel closed
$styles->add_var([
    'name' => 'typography--body--font-size',
    'value' => get_theme_mod('typography--body-desktop--font-size'),
    'screen' => 'editor-desktop',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);        


# =======================================================
# Body - Line Height
# =======================================================


// Body line height default
$styles->add_var([
    'name' => 'typography--body--line-height',
    'value' => get_theme_mod('typography--body-mobile--line-height'),
    'selector' => '.editor-styles-wrapper .wp-block',
]);


// tablet size when settings panel closed, use mobile when open
$styles->add_var([
    'name' => 'typography--body--line-height',
    'value' => get_theme_mod('typography--body-tablet--line-height'),
    'screen' => 'editor-tablet',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);


// tablet size when settings panel open
$styles->add_var([
    'name' => 'typography--body--line-height',
    'value' => get_theme_mod('typography--body-tablet--line-height'),
    'screen' => 'editor-desktop',
    'selector' => '.editor-styles-wrapper .wp-block',
]);        


// desktop size when settings panel closed
$styles->add_var([
    'name' => 'typography--body--line-height',
    'value' => get_theme_mod('typography--body-desktop--line-height'),
    'screen' => 'editor-desktop',
    'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
]);        
