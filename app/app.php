<?php
/**
 * Theme bootstrap file.
 *
 * This file is used to create a new application instance
 * and to bind core classes and components to the container.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

 namespace Taproot;

 use Hybrid\Core\Application;

# ------------------------------------------------------------------------------
# Create a new application.
# ------------------------------------------------------------------------------

$taproot = new Application();

# ------------------------------------------------------------------------------
# Register theme service providers.
# ------------------------------------------------------------------------------

array_map( function( $component ) use ( $taproot ) {
    $taproot->provider( "Taproot\\${component}\Provider" );
}, [
    'Theme',
    'Rootstrap',
    'Customize',
    'Editor',
    'General',
    'Header',
    'Footer',
    'Sidebar',
    'Layout',
    'Colors',
    'Typography',
    'Fonts',
    'Navigation',
    'Navigation\Top',
    'Navigation\Header',
    'Navigation\Navbar',
    'Navigation\Footer',
    'Post_Types',
    'Post_Types\Page',
    'Post_Types\Post',
    'Post_Title',
    'Postnav',
    'Pagination',
    'Breadcrumbs',
    'Comments',
    'Search',
    'Buttons',
    'Images',
    'Icons',
]);

# ------------------------------------------------------------------------------
# Register provider for post type "product" only if Woocommerce is installed.
# ------------------------------------------------------------------------------

if( class_exists( 'woocommerce' ) ) {
    $taproot->provider( 'Taproot\Post_Types\Product\Provider' );
}

# ------------------------------------------------------------------------------
# Perform bootstrap actions.
# ------------------------------------------------------------------------------

do_action( 'taproot/bootstrap', $taproot );

# ------------------------------------------------------------------------------
# Boot the application.
# ------------------------------------------------------------------------------

$taproot->boot();
