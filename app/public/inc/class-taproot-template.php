<?php
/**
 * The Base class for template functionality
 *
 * @package taproot/public
 * @since 0.8.0
 */

if( !class_exists( 'Taproot_Template' ) )
{
	/**
	 * Base class that handling theme front end output. 
	 *
	 * @since 0.8.0
	 */
	class Taproot_Template
	{
		/** 
		 * Stores the Rootstrap object.
		 *
		 * @since 0.8.0
		 * @var object
		 */		
		public $rootstrap;

		/** 
		 * Stores the loader object.
		 *
		 * @since 0.8.0
		 * @var object
		 */	
		public $loader;

		/**
		 * Stores taproot post/page settings.
		 *
		 * @since 0.8.0
		 * @var array
		 */	
		private $post_meta;


		/**
		 * Initialize the class and define actions. 
		 *
		 * @since 0.8.0
		 * @param object $rootstrap
		 * @param object $loader
		 */	
		final public function __construct( $rootstrap, $loader )
		{
			$this->rootstrap = $rootstrap;
			$this->loader = $loader;	
			$this->post_meta_actions();		
			$this->actions();

			if( is_taproot_pro() )
				$this->pro_actions();		
		}


		/**
		 * Load post meta
		 *
		 * @since 0.8.0
		 */	
		final public function post_meta_actions()
		{
			// store post meta
			$this->loader->add_action( 'wp', $this, 'set_post_meta' );
		}


		/**
		 * Store Post Meta Array
		 *
		 * @since 0.8.0
		 * @param string $template
		 */	
		final public function set_post_meta( $template )
		{
			$this->post_meta = get_post_meta( get_the_ID() );
		}	


		/**
		 * Get Post Meta Value
		 *
		 * @since 0.8.0
		 * @param string $key
		 * @param string $default
		 * @return string - returns post meta or default value
		 */	
		final public function get_post_meta( $key, $default = false )
		{
			$this->post_meta = ( get_post_meta( get_the_ID() ) ) ? get_post_meta( get_the_ID() ) : false;

			if( !$this->post_meta && $default === false ) return false;

			if( isset( $this->post_meta[$key] ) and $this->post_meta[$key][0] )
			{
				return $this->post_meta[$key][0];
			}
			elseif( $default )
			{
				return $default;
			}

			return false;
		}


		/**
		 * Actions that get added to the loader
		 * 
		 * @since 0.8.0	
		 */
		public function actions(){} 


		/**
		 * Actions that get added to the loader in Pro plugin
		 * 
		 * @since 0.8.0
		 */
		public function pro_actions(){} 
			
			
	} // end class Taproot_Public

} // end if class doesn't exist
