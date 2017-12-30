<?php
/**
 * The logic involved when outputing theme template classes
 *
 * @package taproot/public
 * @since 0.8.0
 */

if( !class_exists( 'Taproot_Template_Classes' ) )
{
	/**
	 * The class that manages the CSS classes that are output in our templates.
	 *
	 * @since 0.8.0
	 * @see Taproot_Template
	 */
	class Taproot_Template_Classes extends Taproot_Template 
	{
		/**
		 * Add filters for template CSS classes
		 * 
		 * @since 0.8.0
		 */
		public function actions()
		{
			$this->loader->add_filter( 'body_class', $this, 'body_classes', 100, 2);
			$this->loader->add_filter( 'post_class', $this, 'post_classes', 10 );		
			$this->loader->add_filter( 'taproot-class-filter--header', $this, 'header_classes', 10 );
			$this->loader->add_filter( 'taproot-class-filter--header-content', $this, 'header_content_classes', 10 );
			$this->loader->add_filter( 'taproot-class-filter--branding', $this, 'branding_classes', 10 );		
			$this->loader->add_filter( 'taproot-class-filter--main-container', $this, 'main_container_classes', 10 );
			$this->loader->add_filter( 'taproot-class-filter--main', $this, 'main_classes', 10 );
			$this->loader->add_filter( 'taproot-class-filter--sidebar', $this, 'sidebar_classes', 10 );
			$this->loader->add_filter( 'taproot-class-filter--footer', $this, 'footer_classes', 10 );
			$this->loader->add_filter( 'taproot-class-filter--top-nav', $this, 'topnav_classes', 10 );
			$this->loader->add_filter( 'taproot-class-filter--header-nav', $this, 'header_nav_classes', 10 );		
			$this->loader->add_filter( 'taproot-class-filter--navbar', $this, 'navbar_classes', 10 );
			$this->loader->add_filter( 'taproot-class-filter--post-thumbnail-image', $this, 'post_thumbnail_classes', 10 );		
		} 


		/**
		 * Set Body Classes
		 * 
		 * @since 0.8.0
		 * 
		 * @param array $classes
		 * @param array $extra_classes
		 * @return array - Returns array of classes for the body.
		 */
		public function body_classes( $classes, $extra_classes )
		{
			// create array of unwanted classes
			$blacklist = array();

			// if divi builder is not used - move this to pro
			if( 'on' !== $this->get_post_meta( '_et_pb_use_builder' ) )
			{
				$classes[] = 'taproot-no-builder';
				$blacklist[] = 'et_divi_builder';
			}

			// add class if boxed layout
			if( get_theme_mod( 'taproot_boxed_layout', false ) )
			{
				$classes[] = 'taproot-boxed-layout';
			}
			else {
				$classes[] = 'taproot-fullwidth-layout';
			}	

			// add utility class if in customize preview
			if( is_customize_preview() )
				$classes[] = 'customize-preview';

			// Filter the body classes to remove any unwanted classes
		    $classes = array_diff( $classes, $blacklist );

		    // Add the extra classes back untouched
		    return array_merge( $classes, (array) $extra_classes );
		}


		/**
		 * Set Post classes
		 * 
		 * @since 0.8.0
		 * 
		 * @param array $classes
		 * @return array - Returns array of classes for the post.
		 */
		public function post_classes( $classes )
		{
			if( get_post_format( get_the_ID() ) ) return $classes;

			if( is_single() )
			{
				$featured_size = get_theme_mod( 'taproot_featured_image_size' );

				if( $featured_size )
				{
					$classes[] = 'feature-' . $featured_size;
				}
			}
			else
			{
				$post_box_image_size = get_theme_mod( 'taproot_post_box_featured_image_size' );	

				if( $post_box_image_size )
				{
					$classes[] = 'feature-' . $post_box_image_size;
				}
			}

			return $classes;
		}


		/**
		 * Set Main Header Classes
		 * 
		 * @since 0.8.0
		 * 
		 * @param array $classes
		 * @return array - Returns array of classes for the header.
		 */
	 	public function header_classes( $classes )
	    {
	        if( $this->has_fixed_header() )
	        {
	            $classes[] = 'header--has-fixed';

	            $fixed_header_type = get_theme_mod( 'taproot_fixed_header_type', 'fade' );
	            if( 'sticky' == $fixed_header_type )
	            {
	                $classes[] = 'header--has-fixed--sticky';
	            }
	            elseif( 'slide' == $fixed_header_type )
	            {
	                $classes[] = 'header--has-fixed--slide';
	            }
	            else {
	                $classes[] = 'header--has-fixed--fade';
	            }
	        }

	        if( get_theme_mod( 'taproot_main_header_fullwidth' ) )
	        {
	            $classes[] = 'header--fullwidth';
	        }

	        return $classes;
	    }


		/**
		 * Set Main Header Content classes
		 * 
		 * @since 0.8.0
		 * 
		 * @param array $classes
		 * @return array - Returns array of classes for the header content.
		 */
		public function header_content_classes( $classes )
	    {
			// mobile screen branding layouts
	        $classes[] = sprintf( 'm-%s',  get_theme_mod( 'taproot_branding_layout_mobile' ) );
	        $classes[] = sprintf( 'ml-%s', get_theme_mod( 'taproot_branding_layout_mobile_landscape' ) );
	        $classes[] = sprintf( 't-%s',  get_theme_mod( 'taproot_branding_layout_tablet' ) );

	        return $classes;
	    }


		/**
		 * Set the Branding Classes for Branding area
		 * 
		 * @since 0.8.0
		 * 
		 * @param array $classes
		 * @return array - Returns array of classes for the branding area.
		 */
		public function branding_classes( $classes )
	    {
			// branding element classes
			$classes[] = ( get_option( 'custom_logo' ) || apply_filters( 'taproot_svg_logo', false ) ) ? ' has-logo' : ' no-logo';
	        $classes[] = ( get_theme_mod( 'taproot_display_title' ) || get_theme_mod( 'taproot_display_tagline' ) ) ? ' has-titles' : ' no-titles';
			$classes[] = ( get_theme_mod( 'taproot_display_title' ) ) ? ' show-title' : ' no-title';
			$classes[] = ( get_theme_mod( 'taproot_display_tagline' ) ) ? ' show-tagline' : ' no-tagline';

	        return $classes;
	    }


		/**
		 * Set Main Container classes
		 * 
		 * @since 0.8.0
		 * 
		 * @param array $classes
		 * @return array - Returns array of classes for the main container.
		 */
	    public function main_container_classes( $classes ) 
	    {
			$sidebar = taproot_get_sidebar();
			$layout = taproot_get_layout();

			if( $sidebar && 'left' === $layout )
	        {
	            $classes[] = 'has-sidebar';
	        }
	        elseif( $sidebar && 'right' === $layout )
	        {
	            $classes[] = 'has-sidebar';
	        }
	        else
	        {
	            $classes[] = 'no-sidebar';
	        }
	    	
	        if( get_theme_mod( 'taproot_boxed_layout', false ) )
	    	{
	    		$classes[] = 'layout-boxed';
	    	}
	    	else {
	    		$classes[] = 'layout-full';
	    	}

	        return $classes;
	    }


		/**
		 * Set Main element classes
		 * 
		 * @since 0.8.0
		 * 
		 * @param array $classes
		 * @return array - Returns array of classes for the Main element.
		 */
	    public function main_classes( $classes )
	    {
			$sidebar = taproot_get_sidebar();
			$layout = taproot_get_layout();

	        if( $sidebar && 'left' === $layout )
	        {
	            $classes[] = 'main--has-sidebar--left';
	            $classes[] = 'main--has-sidebar';
	            $classes[] = sprintf( 'main--has-sidebar--%s', $sidebar );
	        }
	        elseif( $sidebar && 'right' === $layout )
	        {
	            $classes[] = 'main--has-sidebar--right';
	            $classes[] = 'main--has-sidebar';
	            $classes[] = sprintf( 'main--has-sidebar--%s', $sidebar );            
	        }
	        else
	        {
	            $classes[] = 'main--no-sidebar';
	        }

	        if( get_theme_mod( 'taproot_boxed_layout') )
	        {
	            $classes[] = 'main--layout-boxed';
	        }
	        else
	        {
	            $classes[] = 'main--layout-full';
	        }

	        return $classes;
	    }


		/**
		 * Set the Classes for the Sidebar
		 * 
		 * @since 0.8.0
		 * 
		 * @param array $classes
		 * @return array - Returns array of classes for the sidebar.
		 */
	    public function sidebar_classes( $classes )
	    {
			$layout = taproot_get_layout();

	        if( 'left' === $layout )
	        {
	            $classes[] = 'sidebar--left';
	        }
	        elseif( 'right' === $layout )
	        {
	            $classes[] = 'sidebar--right';
	        }

	        if( get_theme_mod( 'taproot_boxed_layout') )
	        {
	            $classes[] = 'layout-boxed';
	        }
	        else
	        {
	            $classes[] = 'layout-full';
	        }

	        return $classes;
	    }


		/**
		 * Set the Classes for the Footer
		 * 
		 * @since 0.8.0
		 * 
		 * @param array $classes
		 * @return array - Returns array of classes for the footer.
		 */
		public function footer_classes( $classes )
	    {
			$classes[] = sprintf( 'footer-layout-%s', get_theme_mod( 'taproot_footer_layout', 'quarters' ) );

			// add class for footer type
			if( 'fixed' == get_theme_mod( 'taproot_footer_style', false ) )
			{
				$classes[] = 'footer--style-fixed';
			}
			elseif( 'sticky' == get_theme_mod( 'taproot_footer_style', false ) )
			{
				$classes[] = 'footer--style-sticky';
			}

			// add class for layout
			if( get_theme_mod( 'taproot_boxed_layout' ) )
			{
				$classes[] = 'layout-boxed';
			}
			else {
				$classes[] = 'layout-full';
			}

			// add class for nav position
			if( 'after' == get_theme_mod( 'taproot_footer_nav_position', 'before' ) )
			{
				$classes[] = 'widgets-first';
			}

			// add class for fullwidth footers
			if( get_theme_mod( 'taproot_footer_fullwidth' ) )
			{
				$classes[] = 'footer--fullwidth';
			}

	        return $classes;
	    }


		/**
		 * Get Header Nav Classes
		 * 
		 * @since 0.8.0
		 * 
		 * @param array $classes
		 * @return array - Returns array of classes for the header nav.
		 */
		public function header_nav_classes( $classes )
		{
			if( $this->get_post_meta( 'taproot_header_hide_header_nav' ) )
			{
				$classes[] = 'taproot-nav-hidden-when-static';
			}
			elseif( $this->get_post_meta( 'taproot_fixed_header_hide_header_nav' ) )
			{
				$classes[] = 'taproot-nav-hidden-when-fixed';
			}

			if( get_theme_mod( 'taproot_header_nav_enable_dropdown_pointers' ) )
			{
				$classes[] = 'has-pointers';
			}

			if( get_theme_mod( 'taproot_header_nav_hide_when_mobile') ) 
			{
				$classes[] = 'taproot-nav-hidden-when-mobile';
			}		

			if( get_theme_mod( 'taproot_header_nav_hide_when_not_mobile') ) 
			{
				$classes[] = 'taproot-nav-hidden-when-not-mobile';
			}		

			$classes[] = sprintf( 'nav-align-%s', get_theme_mod( 'taproot_header_nav_align' ) );

			if( $this->has_fixed_header() )
			{
				$classes[] = sprintf( 'fixed-nav-align-%s', get_theme_mod( 'taproot_header_nav_align_fixed' ) );
			}

			// add class for header nav type
			$classes[] = sprintf( 'header-nav--%s', get_theme_mod( 'taproot_header_nav_type' ) );

			// add class for header nav breakpoint
			$classes[] = sprintf( 'header-nav--%s', get_theme_mod( 'taproot_header_nav_mobile_breakpoint' ) );

			return $classes;
		}


		/**
		 * Get Navbar Classes
		 * 
		 * @since 0.8.0
		 * 
		 * @param array $classes
		 * @return array - Returns array of classes for the navbar.
		 */
		public function navbar_classes( $classes )
		{
			if( $this->get_post_meta( 'taproot_header_hide_navbar' ) )
			{
				$classes[] = 'taproot-nav-hidden-when-static';
			}
			elseif( $this->get_post_meta( 'taproot_fixed_header_hide_navbar' ) )
			{
				$classes[] = 'taproot-nav-hidden-when-fixed';
			}

			if( get_theme_mod( 'taproot_navbar_enable_dropdown_pointers' ) )
			{
				$classes[] = 'has-pointers';
			}

			if( get_theme_mod( 'taproot_navbar_hide_when_mobile') ) 
			{
				$classes[] = 'taproot-nav-hidden-when-mobile';
			}			

			if( get_theme_mod( 'taproot_navbar_hide_when_not_mobile') ) 
			{
				$classes[] = 'taproot-nav-hidden-when-not-mobile';
			}	

			// add class for navbar align
			$classes[] = sprintf( 'nav-align-%s', get_theme_mod( 'taproot_navbar_align' ) );

			// add class for navbar type
			$classes[] = sprintf( 'navbar--%s', get_theme_mod( 'taproot_navbar_nav_type' ) );

			// add class for navbar breakpoint
			$classes[] = sprintf( 'navbar--%s', get_theme_mod( 'taproot_navbar_mobile_breakpoint' ) );

			return $classes;
		}


		/**
		 * Get Topnav Classes
		 * 
		 * @since 0.8.0
		 * 
		 * @param array $classes
		 * @return array - Returns array of classes for the top nav.
		 */
		public function topnav_classes( $classes )
		{
			if( $this->get_post_meta( 'taproot_header_hide_topnav' ) )
			{
				$classes[] = 'taproot-nav-hidden-when-static';
			}
			elseif( $this->get_post_meta( 'taproot_fixed_header_hide_topnav' ) )
			{
				$classes[] = 'taproot-nav-hidden-when-fixed';
			}

			if( get_theme_mod( 'taproot_topnav_hide_when_mobile') ) 
			{
				$classes[] = 'taproot-nav-hidden-when-mobile';
			}

			if( get_theme_mod( 'taproot_topnav_hide_when_not_mobile') ) 
			{
				$classes[] = 'taproot-nav-hidden-when-not-mobile';
			}	
				
			$classes[] = sprintf( 'topnav--%s', get_theme_mod( 'taproot_topnav_mobile_breakpoint' ) );
			
			return $classes;
		}


		/**
		 * Get Post Thumb Classes
		 * 
		 * @since 0.8.0
		 * 
		 * @param array $classes
		 * @return array - Returns array of classes for the post thumbnail.
		 */
		public function post_thumbnail_classes( $classes )
		{
		    if( is_single() )
		    {
		        $featured_image_location = get_theme_mod( 'taproot_featured_image_location' );

		        if( 'feature-area' === $featured_image_location ) return $classes;

		        if( 'title-bar' === $featured_image_location ) 
		        {
		        	$classes[] = 'alignleft';
		        	return $classes;
		        }

		        $featured_image_position = get_theme_mod( 'taproot_featured_image_position' );

		        if( 'left' === $featured_image_position )
		        {
		            $classes[] = 'alignleft';
		        }
		        elseif( 'right' === $featured_image_position )
		        {
		            $classes[] = 'alignright';
		        }
		        elseif( 'center' === $featured_image_position )
		        {
		            $classes[] = 'aligncenter';
		        }
		    }
		    else
		    {
		        $featured_image_size = get_theme_mod( 'taproot_post_box_featured_image_size' );

		        if( $featured_image_size && 'large' !== $featured_image_size )
		        {
		            $classes[] = 'alignleft';
		        }
		    }

		    return $classes;
		}


	/* Utility Methods */


		/**
		 * Has fixed header?
		 * 
		 * @since 0.8.0
		 * 
		 * @return bool 
		 */
		function has_fixed_header()
		{
		    if( get_theme_mod( 'taproot_main_header_display_when_fixed', false )
		    ||	get_theme_mod( 'taproot_topnav_display_when_fixed', false )
		    ||	get_theme_mod( 'taproot_navbar_display_when_fixed', false ) )
		    {
		        return true;
		    }

		    return false;
		}

	} // end class Taproot_Template_Classes

} // end if class doesn't exist
