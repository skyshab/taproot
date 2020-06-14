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

array_map( function( $component ) use ( $taproot ) {
    $taproot->provider( "Taproot\Providers\\${component}" );
}, [
    'App',
    'Rootstrap',
    'Customize',
    'Editor'
]);

# ------------------------------------------------------------------------------
# Register component service providers.
# ------------------------------------------------------------------------------

array_map( function( $component ) use ( $taproot ) {
    $taproot->provider( "Taproot\Components\\${component}\Provider" );
}, [
    'Header',
    'Layout',
    'Navigation',
    'Navigation_Header',
    'Navigation_Navbar',
    'Navigation_Top',
    'Navigation_Footer',
    'Navigation_Postnav',
    'Navigation_Pagination',
    'Navigation_Breadcrumbs',
    'Footer',
    'Fonts',
    'Typography',
    'Icons',
    'Colors',
    'Buttons',
    'Search',
    'Sidebar',
    'Background',
    'Entry',
    'Images',
    'General',
    'Comments'
]);

# ------------------------------------------------------------------------------
# Perform bootstrap actions.
# ------------------------------------------------------------------------------

do_action( 'taproot/bootstrap', $taproot );

# ------------------------------------------------------------------------------
# Boot the application.
# ------------------------------------------------------------------------------

$taproot->boot();
