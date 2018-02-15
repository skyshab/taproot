<?php
/**
 * The main theme file. 
 * 
 * Defines theme constants and initiates all theme functionality.
 *
 * @package taproot
 * @since 0.8.0 
 */

/* If this file is called directly, take off eh. */
if( !defined( 'WPINC' ) ) die;


/* Define the theme constants */


	/**
	 * Stores the theme name
	 *
	 * @since 0.8.0
	 * @var string
	 */
	define( 'TAPROOT_THEME_NAME', 'taproot' );

	/**
	 * Stores the theme version
	 *
	 * @since 0.8.0
	 * @var string
	 */
	define( 'TAPROOT_CURRENT_VERSION', '0.9.2' );

	/**
	 * Stores the theme author name
	 *
	 * @since 0.8.0
	 * @var string
	 */
	define( 'TAPROOT_AUTHOR', 'Sky Shabatura' );

	/**
	 * Stores the path of the main app directory
	 *
	 * @since 0.8.0
	 * @var string
	 */	
	define( 'TAPROOT_APP', get_template_directory() . '/app/' );

	/**
	 * Stores the uri to the main theme app directory
	 *
	 * @since 0.8.0
	 * @var string
	 */	
	define( 'TAPROOT_APP_URI', get_template_directory_uri() . '/app/' );

	/**
	 * Stores the path of the theme includes directory
	 *
	 * @since 0.8.0
	 * @var string
	 */	
	define( 'TAPROOT_INCLUDES', TAPROOT_APP. 'includes' );

	/**
	 * Stores the path of the theme admin directory
	 *
	 * @since 0.8.0
	 * @var string
	 */		
	define( 'TAPROOT_ADMIN', TAPROOT_APP. 'admin' );

	/**
	 * Stores the uri to the admin directory
	 *
	 * @since 0.8.0
	 * @var string
	 */		
	define( 'TAPROOT_ADMIN_URI', TAPROOT_APP_URI . 'admin' );

	/**
	 * Stores the path of the theme public directory
	 *
	 * @since 0.8.0
	 * @var string
	 */		
	define( 'TAPROOT_PUBLIC', TAPROOT_APP. 'public' );

	/**
	 * Stores the uri to the public directory
	 *
	 * @since 0.8.0
	 * @var string
	 */		
	define( 'TAPROOT_PUBLIC_URI', TAPROOT_APP_URI . 'public' );

	/**
	 * Stores the path of the theme customizer directory
	 *
	 * @since 0.8.0
	 * @var string
	 */		
	define( 'TAPROOT_CUSTOMIZER', TAPROOT_APP. 'includes/customizer' );

	/**
	 * Stores the uri to the customizer directory
	 *
	 * @since 0.8.0
	 * @var string
	 */		
	define( 'TAPROOT_CUSTOMIZER_URI', TAPROOT_APP_URI . 'includes/customizer' );

	/**
	 * Stores the path of the theme library directory
	 *
	 * @since 0.8.0
	 * @var string
	 */		
	define( 'TAPROOT_LIBRARY', TAPROOT_APP. 'library' );

	/**
	 * Stores the uri to the library directory
	 *
	 * @since 0.8.0
	 * @var string
	 */	
	define( 'TAPROOT_LIBRARY_URI', TAPROOT_APP_URI . 'library' );


	/**
	 * The code that runs during theme activation.
	 * This action is documented in includes/class-taproot-activator.php
	 * 
	 * @since 0.9.3
	 */
	function activate_taproot() {
		require_once TAPROOT_INCLUDES . '/class-taproot-activator.php';
		Taproot_Activator::activate();
	}

	register_activation_hook( __FILE__, 'activate_taproot' );


	/**
	 * The code that runs during theme deactivation.
	 * This action is documented in includes/class-taproot-deactivator.php
	 * 
	 * @since 0.9.3
	 */
	function deactivate_taproot() {
		require_once TAPROOT_INCLUDES . '/class-taproot-deactivator.php';
		Taproot_Deactivator::deactivate();
	}
	
	register_deactivation_hook( __FILE__, 'deactivate_taproot' );


/**
 * The core theme class
 */
 require TAPROOT_INCLUDES . '/class-taproot.php';


/**
 * Begins execution of the theme functionality
 */
 function run_taproot()
 {
	$taproot_theme = new Taproot();
	$taproot_theme->run();
 }


/**
 * Initiates execution of the theme
 */
 run_taproot();
