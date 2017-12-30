<?php
/**
 * The main rootstrap file. 
 * 
 * Defines theme constants and initiates functionality.
 *
 * @package rootstrap
 * @since 0.8.0 
 */

/**
 * Defines the current version of rootstrap
 *
 * @since 0.8.0
 * @var string
 */
define( 'ROOTSTRAP_CURRENT_VERSION', '0.9.1' );

/**
 * Defines the path to the base plugin directory
 *
 * @since 0.8.0
 * @var string
 */	
define( 'ROOTSTRAP', plugin_dir_path( __FILE__ ) );

/**
 * Defines the path to the base plugin directory
 *
 * @since 0.8.0
 * @var string
 */	
define( 'ROOTSTRAP_INCLUDES', ROOTSTRAP . 'includes/' );


/**
 * The core plugin class
 * 
 * @since 0.8.0
 */	
require ROOTSTRAP_INCLUDES . 'class-wp-rootstrap.php';


/**
 * Get an instance of Rootstrap and store in a global variable
 * 
 * @since 0.8.0
 */	
global $rootstrap;
$rootstrap = WP_Rootstrap::get_instance();
