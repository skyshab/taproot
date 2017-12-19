<?php
/**
 * The main plugin file. 
 * 
 * Defines theme constants and initiates functionality.
 *
 * @package wp-rootstrap-tabs
 * @since 0.8.0 
 */

/**
 * Defines the current version of rootstrap
 *
 * @since 0.8.0
 * @var string
 */
define( 'ROOTSTRAP_TABS_VERSION', '0.8.0' );

/**
 * Defines the path to the base plugin directory
 *
 * @since 0.8.0
 * @var string
 */	
define( 'ROOTSTRAP_TABS', plugin_dir_path( __FILE__ ) );

/**
 * Defines the path to the base plugin directory
 *
 * @since 0.8.0
 * @var string
 */	
define( 'ROOTSTRAP_TABS_INC', ROOTSTRAP_TABS . 'inc/' );


/**
 * The core plugin class
 * 
 * @since 0.8.0
 */	
require ROOTSTRAP_TABS_INC . 'class-wp-rootstrap-tabs.php';


/**
 * Get an instance of Rootstrap and store in a global variable
 * 
 * @since 0.8.0
 */	
$wp_rootstrap_tabs = new WP_Rootstrap_Tabs();
