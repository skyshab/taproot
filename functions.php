<?php
/**
 * Theme functions file.
 *
 * This file is used to bootstrap the theme.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2021 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

# ------------------------------------------------------------------------------
# Compatibility check for WP and PHP.
# ------------------------------------------------------------------------------

if ( version_compare( $GLOBALS['wp_version'], '5.4.0', '<' ) || version_compare( PHP_VERSION, '7.0', '<' ) ) {
    require_once( get_parent_theme_file_path( 'compat.php' ) );
    return;
}

# ------------------------------------------------------------------------------
# Run the Composer autoloader.
# ------------------------------------------------------------------------------

if ( file_exists( get_parent_theme_file_path( 'vendor/autoload.php' ) ) ) {
    require_once( get_parent_theme_file_path( 'vendor/autoload.php' ) );
}

# ------------------------------------------------------------------------------
# Load theme tools.
# ------------------------------------------------------------------------------

require_once( get_parent_theme_file_path( 'app/Tools/functions-tools.php' ) );

# ------------------------------------------------------------------------------
# Run the theme.
# ------------------------------------------------------------------------------

require_once( get_parent_theme_file_path( 'app/app.php' ) );
