<?php
/**
 * Section Partials
 *
 * This file registers partials in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


// // Selectively refreshes the title in the header when the core
// // WP `blogname` setting changes.
// $manager->selective_refresh->add_partial( 'blogname', [
//     'selector'        => '.app-header__title-link',
//     'render_callback' => function() {
//         return get_bloginfo( 'name', 'display' );
//     }
// ] );

// // Selectively refreshes the description in the header when the
// // core WP `blogdescription` setting changes.
// $manager->selective_refresh->add_partial( 'blogdescription', [
//     'selector'        => '.app-header__description',
//     'render_callback' => function() {
//         return get_bloginfo( 'description', 'display' );
//     }
// ] );

// // Selectively refreshes the custom header if it doesn't support
// // videos. Core WP won't properly refresh output from its own
// // `the_custom_header_markup()` function unless video is supported.
// if ( ! current_theme_supports( 'custom-header', 'video' ) ) {

//     $manager->selective_refresh->add_partial( 'header_image', [
//         'selector'            => '#wp-custom-header',
//         'render_callback'     => 'the_custom_header_markup',
//         'container_inclusive' => true,
//     ] );
// }
