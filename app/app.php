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
# Register core service providers.
# ------------------------------------------------------------------------------

// App
$taproot->provider( 'Taproot\Providers\App' );

// Rootstrap
$taproot->provider( 'Taproot\Providers\Rootstrap' );

// Customizer
$taproot->provider( 'Taproot\Customize\Provider' );

// Editor
$taproot->provider( 'Taproot\Editor\Provider' );

# ------------------------------------------------------------------------------
# Register component service providers.
# ------------------------------------------------------------------------------

array_map( function( $component ) use ( $taproot ) {
    $taproot->provider( "Taproot\Components\\${component}\Component" );
}, [
    'Header',
    'Layout',
    'Navigation',
    'Navigation_Header',
    'Navigation_Navbar',
    'Navigation_Top',
    'Navigation_Footer',
    'Postnav',
    'Pagination',
    'Breadcrumbs',
    'Footer',
    'Fonts',
    'Typography',
    'Icons',
    'Colors',
    'Buttons',
    'Search',
    'Sidebar',
    'Images',
    'Comments',
    'Page',
    'Post',
    'Post_Title',
    'Woocommerce'
]);

# ------------------------------------------------------------------------------
# Perform bootstrap actions.
# ------------------------------------------------------------------------------

do_action( 'taproot/bootstrap', $taproot );

# ------------------------------------------------------------------------------
# Boot the application.
# ------------------------------------------------------------------------------

$taproot->boot();
