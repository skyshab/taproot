<?php
/**
 * The public-facing functionality of the plugin
 *
 * @package taproot/public
 * @since 0.8.0 
 */

if( !class_exists( 'Taproot_Public' ) )
{
	/**
	 * Class that handles theme icons.
	 *
	 * @since 0.8.0
	 */
	class Taproot_Public
	{
		/** 
		 * Stores the loader object.
		 *
		 * @since 0.8.0
		 * @var object
		 */		
		public $loader;

		/** 
		 * Stores the rootstrap object.
		 *
		 * @since 0.8.0
		 * @var object
		 */			
		public $rootstrap;

		/** 
		 * Stores the full path to the main template file.
		 *
		 * @since 0.8.0
		 * @var string
		 */		
		public $template;


		/**
		 * Initialize the class and define actions. 
		 *
		 * @since 0.8.0
		 * @param object $rootstrap
		 * @param object $loader
		 */	
		public function __construct( $rootstrap, $loader )
		{
			$this->rootstrap = $rootstrap;
			$this->loader = $loader;
			$this->load_dependencies();
			$this->actions();
			$this->template_parts();
			$this->template_classes();
			$this->icons();
		}


		/**
		 * Load any public dependencies
		 *
		 * @since 0.8.0
		 */	
		private function load_dependencies()
		{
            /**
             * The class containing our custom nav walker. 
             */   			
			require_once TAPROOT_PUBLIC . '/inc/class-taproot-nav-walker.php';	

            /**
             * The base class used for template classes and parts. 
             */  
			require_once TAPROOT_PUBLIC . '/inc/class-taproot-template.php';			
		}


		/**
		 * Register the actions and filters for the public-facing side of the site.
		 *
		 * @since 0.8.0
		 */	
		public function actions()
		{
			// Get Theme Template Wrapper
			$this->loader->add_filter( 'template_include', $this, 'get_wrapper', 100 );

			// Load Original Template
			$this->loader->add_action( 'taproot_template', $this, 'load_template', 20 );

			// Get Post Template
			$this->loader->add_filter( 'template_include', $this, 'get_post_template', 99 );	

			// Wrap embeds for styling
			$this->loader->add_filter( 'embed_oembed_html', $this, 'maybe_wrap_embed', 10, 2 );

			// Load styles
			$this->loader->add_action( 'wp_enqueue_scripts', $this, 'enqueue_styles', 100 );

			// Load scripts
			$this->loader->add_action( 'wp_enqueue_scripts', $this, 'enqueue_scripts', 101 );

			// Comments filter
	        $this->loader->add_filter( 'comments_open',  $this, 'comments_open_filter', 10, 2 );
		}


		/**
		 * Set base template
		 *
		 * @since 0.8.0
		 * @param string $template
		 * @return string - Returns template location.
		 */	
		public function get_wrapper( $template )
		{
			$this->template = $template;
			$base = substr( basename( $template ), 0, -4 );
			$wrappers = array( 'wrapper.php' );

			if( $base && 'index' !== $base )
			{
				array_unshift( $wrappers, sprintf( 'wrapper-%s.php', $base ) );
			}

			return locate_template( $wrappers );
		}


		/**
		 * Load original template
		 *
		 * @since 0.8.0
		 */	
		public function load_template()
		{
			include $this->template;
		}


		/**
		 * Load Post Template
		 *
		 * @since 0.8.0
		 * @param string $template
		 * @return string - Returns template location.		 
		 */	
		public function get_post_template( $template ) 
		{
		    $taproot_post_template = rootstrap_post_meta( 'taproot_post_template' );

		    if( 'builder' === $taproot_post_template  ) 
		    {
		        $new_template = locate_template( array( 'builder.php' ) );

		        if( '' != $new_template ) 
		        {
		            return $new_template;
		        }
		    }
		    elseif( 'blank' === $taproot_post_template  ) 
		    {
		        $new_template = locate_template( array( 'blank.php' ) );

		        if( '' != $new_template ) 
		        {
		            return $new_template;
		        }
		    }

		    return $template;
		}


		/**
		 * Register the actions and filters for our theme's template parts
		 *
		 * @since 0.8.0
		 */	
		public function template_parts()
		{
			/**
             * The class that filters and outputs template parts markup. 
             */  
			require_once TAPROOT_PUBLIC . '/inc/class-taproot-template-parts.php';

			$template_class = 'Taproot_Template_Parts';

			if( is_taproot_pro() )
			{
				$pro_template = TAPROOT_PRO_PUBLIC . '/inc/class-taproot-pro-template.php';

				if( file_exists( $pro_template ) ) 
				{
					require_once $pro_template;				
					$template_class = 'Taproot_Pro_Template';
				}

			} // end if pro

			global $taproot_template;
			$taproot_template = new $template_class( $this->rootstrap, $this->loader );	
		}	


		/**
		 * Add filters for CSS classes that are applied to the theme's template parts
		 *
		 * @since 0.8.0
		 */	
		public function template_classes()
		{
			/**
             * The class that outputs CSS classes in our templates. 
             */  			
			require_once TAPROOT_PUBLIC . '/inc/class-taproot-template-classes.php';
			$taproot_template_classes = new Taproot_Template_Classes( $this->rootstrap, $this->loader );	
		}


		/**
		 * Register the actions and filters for our theme's template parts.
		 *
		 * @since 0.8.0
		 */	
		public function icons()
		{
			/**
             * The class containing our custom nav walker. 
             */  				
			require_once TAPROOT_PUBLIC . '/inc/class-taproot-icons.php';	
		}	


		/**
		 * Wraps embeds with `.embed-wrap` class.
		 *
		 * @since  0.8.2
		 * @param  string  $html
		 * @return string - Returns embed object wrapped in custom html. 
		 */
		public function wrap_embed_html( $html ) 
		{
		    return ( $html && is_string( $html ) ) ? sprintf( '<div class="embed-wrap">%s</div>', $html ) : $html;
		}


		/**
		 * Checks embed URL patterns to see if they should be wrapped in some special HTML, particularly
		 * for responsive videos.
		 *
		 * @author     Automattic
		 * @link       http://jetpack.me
		 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
		 *
		 * @since  0.8.2
		 * @param  string  $html
		 * @param  string  $url
		 * @return string
		 */
		public function maybe_wrap_embed( $html, $url ) 
		{ 
		    if( ! $html || ! is_string( $html ) || ! $url )
		        return $html;

		    $do_wrap = false;
		    $patterns = array(
		        '#http://((m|www)\.)?youtube\.com/watch.*#i',
		        '#https://((m|www)\.)?youtube\.com/watch.*#i',
		        '#http://((m|www)\.)?youtube\.com/playlist.*#i',
		        '#https://((m|www)\.)?youtube\.com/playlist.*#i',
		        '#http://youtu\.be/.*#i',
		        '#https://youtu\.be/.*#i',
		        '#https?://(.+\.)?vimeo\.com/.*#i',
		        '#https?://(www\.)?dailymotion\.com/.*#i',
		        '#https?://dai.ly/*#i',
		        '#https?://(www\.)?hulu\.com/watch/.*#i',
		        '#https?://wordpress.tv/.*#i',
		        '#https?://(www\.)?funnyordie\.com/videos/.*#i',
		        '#https?://vine.co/v/.*#i',
		        '#https?://(www\.)?collegehumor\.com/video/.*#i',
		        '#https?://(www\.|embed\.)?ted\.com/talks/.*#i'
		    );

		    $patterns = apply_filters( 'taproot_maybe_wrap_embed_patterns', $patterns );

		    foreach ( $patterns as $pattern ) 
		    {
		        $do_wrap = preg_match( $pattern, $url );

		        if( $do_wrap )
		            return $this->wrap_embed_html( $html );
		    }

		    return $html;
		}


		/**
		 * Register the stylesheets for the public-facing side of the site.
		 *
		 * @since 0.8.0
		 */	
		public function enqueue_styles()
		{
			// Google Fonts
			if( $taproot_google_fonts = get_theme_mod( 'taproot_google_fonts' ) )
			{
				$google_link = sprintf( '//fonts.googleapis.com/css?family=%s', esc_attr( $taproot_google_fonts ) );
				wp_enqueue_style('taproot-google-fonts', esc_url( $google_link ) );
			}

			// load base stylesheets
	    	wp_enqueue_style( 'public-styles', get_template_directory_uri() . '/app/public/css/taproot-public.min.css', array(), TAPROOT_CURRENT_VERSION, 'all' );

			if( is_child_theme() )
			{
				wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/style.css', array(), TAPROOT_CURRENT_VERSION, 'all' );
			}			
		}


		/**
		 * Register the scripts for the public-facing side of the site.
		 *
		 * @since 0.8.0
		 */	
		public function enqueue_scripts()
		{
			// dequeue jquery scripts
			wp_dequeue_script('jquery');
		    wp_dequeue_script('jquery-core');
		    wp_dequeue_script('jquery-migrate');

		    // re-enqueue jquery scripts in the footer
		    wp_enqueue_script('jquery', false, array(), false, true);
		    wp_enqueue_script('jquery-core', false, array(), false, true);
		    wp_enqueue_script('jquery-migrate', false, array(), false, true);

			// enqueue combined scripts
			wp_enqueue_script( 'taproot-public', TAPROOT_PUBLIC_URI . '/js/taproot-public.min.js', array( 'jquery' ), TAPROOT_CURRENT_VERSION, true );	

			// enqueue comment reply script? required by theme checker
			if( is_singular() ) wp_enqueue_script( "comment-reply" );		
		}


		/**
		 * If comments are disabled on pages, don't print the template.
		 *
		 * @since 0.8.0
		 * @param string $open
		 * @param int $post_id
		 * @return string / false
		 */	  
	    public function comments_open_filter( $open, $post_id ) 
	    {
	        $post = get_post( $post_id );
	        $disable_comments_pages = get_option( 'taproot_disable_comments_pages' );

	        return ( 'page' == $post->post_type && $disable_comments_pages ) ? false : $open;
	    }

	} // end class Taproot_Public

} // end if class doesn't exist
