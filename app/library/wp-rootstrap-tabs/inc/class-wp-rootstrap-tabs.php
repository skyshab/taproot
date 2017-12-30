<?php
/**
 * Main class for creating customizer tabs.
 *
 * @package wp-rootstrap-tabs
 * @since 0.8.0
 */

if( !class_exists( 'WP_Rootstrap_Tabs' ) )
{
	/**
	 * Class responsible for actions on admin pages. 
	 *
	 * @since 0.8.0
	 */
	class WP_Rootstrap_Tabs
	{
		/**
		 * Initialize the class define actions.
		 *
	 	 * @since 0.8.0
	 	 * @param object $loader
		 */
		public function __construct()
		{ 
			$this->actions();
		}


		/**
		 * Register Actions for the Admin portion of theme.
		 *
	 	 * @since 0.8.0
		 */
		public function actions()
		{
	        // load control
            add_action( 'customize_register', array( $this, 'load_control' ) );
		}


        /**
         * Load classes and functions in customizer
         *
         * @since 0.8.0
         * 
         * @param object $wp_customize - the WordPress customizer object
         */
        public function load_control( $wp_customize )
        {
            /**
             * The file that contains our customizer control. 
             */             
            require_once ROOTSTRAP_TABS . 'inc/class-wp-rootstrap-tabs-control.php';


            /**
             * The file that contains helper function for creating tabs. 
             */               
            require_once ROOTSTRAP_TABS . 'inc/wp-rootstrap-tabs-functions.php';
        }


	} // end class Taproot_Admin()

} // end if class exists
