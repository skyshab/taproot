<?php
/**
 * The dashboard-specific functionality of the plugin.
 *
 * @package taproot/admin
 * @since 0.8.0
 */

if( !class_exists( 'Taproot_Admin' ) )
{
	/**
	 * Class responsible for actions on admin pages. 
	 *
	 * @since 0.8.0
	 */
	class Taproot_Admin
	{
		/** 
		 * Stores the loader object
		 *
		 * @since 0.8.0
		 * @var object
		 */			
		public $loader;


		/**
		 * Initialize the class define actions.
		 *
	 	 * @since 0.8.0
	 	 * @param object $loader
		 */
		public function __construct( $loader )
		{ 
			$this->loader = $loader;
			$this->actions();
		}


		/**
		 * Register Actions for the Admin portion of theme.
		 *
	 	 * @since 0.8.0
		 */
		public function actions()
		{
			// load styles
			$this->loader->add_action( 'admin_enqueue_scripts', $this, 'enqueue_styles' );

			// load scripts
			$this->loader->add_action( 'admin_enqueue_scripts', $this, 'enqueue_scripts' );

			// register nav menus
			$this->loader->add_action( 'init', $this, 'register_nav_menus' );

			// add theme support for featured images
			$this->loader->add_action( 'after_setup_theme', $this, 'theme_support', 100 );

			// register post meta
			$this->loader->add_action( 'init', $this, 'post_meta' );	

			// Register setting to disable comments on pages
			$this->loader->add_filter( 'admin_init', $this , 'comments_register_fields_filter' );
		}


		/**
		 * Register the stylesheets for the dashboard.
		 *
	 	 * @since 0.8.0
		 */
		public function enqueue_styles()
		{
			wp_enqueue_style( TAPROOT_THEME_NAME, TAPROOT_ADMIN_URI . '/css/taproot-admin.min.css', array(), TAPROOT_CURRENT_VERSION, 'all' );
		}


		/**
		 * Register the JavaScript for the dashboard.
		 *
	 	 * @since 0.8.0
		 */
		public function enqueue_scripts()
		{
			wp_enqueue_script( TAPROOT_THEME_NAME, TAPROOT_ADMIN_URI . '/js/taproot-admin.js', array( 'jquery' ), TAPROOT_CURRENT_VERSION, true );
		}


		/**
		 * Register Navigation Menus
		 *
	 	 * @since 0.8.0
		 */
		public function register_nav_menus()
		{
			register_nav_menu('top-nav', esc_html__( 'Top Nav', 'taproot' ));
			register_nav_menu('header-nav', esc_html__( 'Header Nav', 'taproot' ));
			register_nav_menu('navbar', esc_html__( 'Navbar', 'taproot' ));
			register_nav_menu('footer-nav', esc_html__( 'Footer Nav', 'taproot' ));
		}


		/**
		 * Register Theme Support
		 *
	 	 * @since 0.8.0
		 */
		public function theme_support()
		{
			/*
			 * Enable support for featured images
			 */			
			add_theme_support( 'post-thumbnails' );

			/*
			 * Enable support for HTML5 elements
			 */			
			add_theme_support( 'html5', array( 'gallery', 'caption' ) );

			/*
			 * Enable support for automated title tag
			 */			
			add_theme_support( 'title-tag' );

			/*
			 * Enable support for custom logo
			 */			
			add_theme_support( 'custom-logo', array(
				'flex-width' => true,
				'flex-height' => true,
			));	

			/*
			 * Enable support for feed links
			 */			
			add_theme_support( 'automatic-feed-links' );	

			/*
			 * Enable support for post formats
			 */
			add_theme_support( 'post-formats', array( 'image', 'gallery', 'video', 'link', 'quote' ) );	

			/*
			 * Enable support for custom background
			 */
			add_theme_support( 'custom-background' );


			/*
			 * Define editor stylesheet
			 */
			add_editor_style( TAPROOT_ADMIN_URI . '/css/editor-styles.css' );

		    /**
		     * Filter content width of the theme.
		     *
		     * @since 0.8.2
		     *
		     * @param int $content_width Content width in pixels.
		     */
		    $GLOBALS['content_width'] = apply_filters( 'taproot_content_width', get_theme_mod( 'taproot_max_content_width', 1200 ) );		
		}


		/**
		 * Create Taproot Settings Metabox.
		 *
	 	 * @since 0.8.0
		 */
		public function post_meta()
		{
			/**
			 * The Class responsible for creating post metaboxes
			 */
			require_once TAPROOT_ADMIN . '/meta/class-taproot-post-meta.php';		

			// instantiate the class		
			$taproot_post_meta = new Taproot_Post_Meta();
		}


	    /**
	     * Register comments post types.
		 *
	 	 * @since 0.8.0
		 */	    
	    public function comments_register_fields_filter() 
	    {
	        register_setting( 'discussion', 'taproot_disable_comments_pages', 'esc_attr' );
	        add_settings_field('disable_comments_pages', esc_html__( 'Comments Post Types', 'taproot' ), array( $this, 'comments_fields_fields_html' ) , 'discussion' );
	    }


	    /**
	     * Print the comments post types field markup.
		 *
	 	 * @since 0.8.0
		 */	 	    
	    public function comments_fields_html() 
	    {
	        $disable_comments_pages = get_option( 'taproot_disable_comments_pages' );

	        printf( "<label for='taproot_disable_comments_pages'><input name='taproot_disable_comments_pages' type='checkbox' id='taproot_disable_comments_pages' value='1' %s> Disable comments on pages </label>", esc_attr( checked( $disable_comments_pages, 1, false ) ) );
	    }

	} // end class Taproot_Admin()

} // end if class exists
