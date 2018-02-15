<?php
/**
 * Theme Icon functionality
 *
 * @package Taproot/Public
 * @since 0.8.0
 */

if( !class_exists( 'Taproot_Icons' ) )
{
	/**
	 * Class that handles theme icons.
	 *
	 * @since 0.8.0
	 */
	class Taproot_Icons 
	{
		/**
		 * Stores the icon mode.
		 * 
		 * @since 0.8.0
		 * @var string - 'svg' or 'fa'
		 */
		public $mode;

		/**
		 * Stores the url to the SVG sprite file.
		 * 
		 * @since 0.8.0
		 * @var string
		 */
		public $url = false;


		/**
		 * Initiate class and define filters
		 * 
		 * @since 0.8.0
		 */
		public function __construct()
		{
			$this->set_mode();

			if( 'fa' === $this->mode )
				$this->fa_init();
			else
				$this->svg_init();

			$this->filters();		
		}


		/**
		 * Define icon mode
		 * 
		 * @since 0.8.0
		 */
		private function set_mode() 
		{
			$taproot_icon_mode = apply_filters( 'taproot_icon_mode', 'svg' ); 
			$this->mode = esc_html( $taproot_icon_mode );
		}


		/**
		 * Initiate SVG icons
		 * 
		 * @since 0.8.0
		 */
		private function svg_init() 
		{
			$child_theme_file = '/images/theme-icons.svg';
			$child_theme_path = get_stylesheet_directory() . $child_theme_file;
			$child_theme_url = get_stylesheet_directory_uri() . $child_theme_file;

			$parent_theme_file = '/app/public/images/theme-icons.svg';
			$parent_theme_path = get_parent_theme_file_path( $parent_theme_file );
			$parent_theme_url = get_parent_theme_file_uri( $parent_theme_file );

			if( file_exists( $child_theme_path ) )
			{
				$this->url = $child_theme_url;
			}
			elseif( file_exists( $parent_theme_path ) )
			{
				$this->url = $parent_theme_url;			
			}
		}


		/**
		 * Get SVG icon markup
		 * 
		 * @since 0.8.0
		 * 
		 * @param array $args - attributes used to construct the SVG
		 * @return string - Returns SVG markup
		 */
		public function get_svg( $args = array() ) 
		{
			// Set aria hidden.
			$aria_hidden = '';

			if( true === $args['aria_hidden'] ) 
				$aria_hidden = 'true';

			// Set ARIA.
			$aria_labelledby = '';

			if( $args['title'] && $args['desc'] ) 
				$aria_labelledby = 'title desc';

			// Begin SVG markup.
			$svg = sprintf( '<svg class="taproot-icon taproot-icon--%s %s" role="presentation" aria-hidden="%s" aria-labelledby="%s" alt="">', esc_attr( $args['icon'] ), esc_attr( $args['class'] ), esc_attr( $aria_hidden ), esc_attr( $aria_labelledby ) );

			// If there is a title, display it.
			if( $args['title'] ) 
				$svg .= '<title>' . esc_html( $args['title'] ) . '</title>';

			// If there is a description, display it.
			if( $args['desc'] ) 
				$svg .= '<desc>' . esc_html( $args['desc'] ) . '</desc>';

			// Generate use element to point to sprite in the main icon file
			$svg .= '<use xlink:href="' . esc_url( $this->url ) . '#icon-' . esc_attr( $args['icon'] ) . '"></use>';

			// Close svg markup
			$svg .= '</svg>';

			return $svg;
		}


		/**
		 * Get Font Awesome icon markup
		 * 
		 * @since 0.8.0
		 * 
		 * @param array $args - attributes used to construct the icon output
		 * @return string - Returns icon markup
		 */
		public function get_fa( $args = array() ) 
		{
			$aria_hidden = '';

			if( true === $args['aria_hidden'] ) 
				$aria_hidden = ' aria-hidden="true"';

			return sprintf( '<i class="taproot-icon taproot-icon--%s fa fa-%s %s" %s></i>', esc_attr( $args['icon'] ), esc_attr( $args['icon'] ), esc_attr( $args['class'] ),  esc_attr( $aria_hidden ) );
		}



		/**
		 * Get icon markup
		 * 
		 * @since 0.8.0
		 * 
		 * @param array $args - attributes used to build the icon
		 * @return string - Returns icon markup
		 */
		public function get_icon( $args = array() ) 
		{
			// if just passed the icon id, create an array
			if( $args && !is_array( $args ) ) $args = array('icon' => $args);
			
			// Define an icon.
			if( false === array_key_exists( 'icon', $args ) ) 
				return esc_html__( 'Please define an icon name.', 'taproot' );
			
			// Set defaults.
			$defaults = array(
				'icon'        => '',
				'title'       => '',
				'desc'        => '',
				'aria_hidden' => true,
				'class'       => '',
			);

			// Parse args.
			$args = wp_parse_args( $args, $defaults );

			return ( 'fa' === $this->mode ) ? $this->get_fa( $args ) : $this->get_svg( $args );

		} // end get icon


		/**
		 * Add icon filters
		 * 
		 * @since 0.8.0
		 */
		public function filters()
		{
			$filters = array(
				'taproot_icon_header_search' 			=> array( 'icon' => 'search' ),
				'taproot_icon_header_search_close' 	=> array( 'icon' => 'close' ),
				'taproot_icon_search_widget' 			=> array( 'icon' => 'search' ),
				'taproot_icon_mobile_bar_search' 		=> array( 'icon' => 'search' ),
				'taproot_icon_mobile_menu' 			=> array( 'icon' => 'bars' ),
				'taproot_icon_mobile_menu_close' 		=> array( 'icon' => 'close' ),
				'taproot_icon_meta_author' 			=> array( 'icon' => 'user' ),
				'taproot_icon_meta_date' 				=> array( 'icon' => 'calendar' ),
				'taproot_icon_meta_time' 				=> array( 'icon' => 'clock-o' ),
				'taproot_icon_meta_categories' 		=> array( 'icon' => 'list-ul' ),
				'taproot_icon_meta_tags' 				=> array( 'icon' => 'tags' ),
				'taproot_icon_meta_comments' 			=> array( 'icon' => 'comment' ),
				'taproot_icon_comments_title' 			=> array( 'icon' => 'comments' ),
				'taproot_icon_comments_reply' 			=> array( 'icon' => 'mail-reply' ),
				'taproot_icon_comment_meta_date' 		=> array( 'icon' => 'calendar' ),
				'taproot_icon_comment_meta_time' 		=> array( 'icon' => 'clock-o' ),
				'taproot_icon_top_post_nav_prev' 		=> array( 'icon' => 'chevron-right', 'class' => 'flip-h' ),
				'taproot_icon_top_post_nav_next' 		=> array( 'icon' => 'chevron-right' ),
				'taproot_icon_bottom_post_nav_prev' 	=> array( 'icon' => 'chevron-right', 'class' => 'flip-h' ),
				'taproot_icon_bottom_post_nav_next' 	=> array( 'icon' => 'chevron-right'	),
				'taproot_icon_topnav_phone' 			=> array( 'icon' => 'phone' ),
				'taproot_icon_topnav_email' 			=> array( 'icon' => 'envelope' ),
				'taproot_icon_gallery_modal_thumb' 	=> array( 'icon' => 'search' ),
				'taproot_icon_menu_item_dropdown' 		=> array( 'icon' => 'angle-right', 'class' => 'rotate-90' ),
				'taproot_icon_paginate_prev' 			=> array( 'icon' => 'chevron-right', 'class' => 'flip-h' ),
				'taproot_icon_paginate_next' 			=> array( 'icon' => 'chevron-right' ),
				'taproot_icon_slider_nav_prev' 		=> array( 'icon' => 'chevron-right', 'class' => 'flip-h' ),
				'taproot_icon_slider_nav_next' 		=> array( 'icon' => 'chevron-right' ),
			);

			foreach ($filters as $filter => $args) 
			{
				add_filter( $filter, function() use( $args ){ return $args; });
			}
		}	

	} // end class Taproot_Icons

} // end if class doesn't exist


/* Make this a global */	
global $taproot_icons;

/* Instantiate the icon class */	
$taproot_icons = new Taproot_Icons();	


/**
 * Function for outputting icon markup in templates and functions based on location. 
 *
 * @since 0.8.0
 * @param string $location 
 * @param bool $echo
 */	
if( !function_exists( 'do_taproot_icon' ) )
{
	function do_taproot_icon( $location, $echo = false )
	{
		if( $icon_args = apply_filters( sprintf( 'taproot_icon_%s', $location ), false ) )
		{
			global $taproot_icons;
			$icon = $taproot_icons->get_icon( $icon_args );

			if( $echo ) 
				echo $icon;
			else return $icon;						
		}

		return false;
	}

} // end if function doesn't exist


/**
 * Function for getting icon markup
 *
 * @since 0.8.2
 * @param string $icon - The icon name.
 * @return string - Returns icon markup.
 */	
if( !function_exists( 'get_taproot_icon' ) )
{
	function get_taproot_icon( $icon )
	{
		global $taproot_icons;
		
		if( is_array( $icon ) && isset( $icon['icon'] ) )
			$icon = $taproot_icons->get_icon( $icon );
		else 
			$icon = $taproot_icons->get_icon( array( 'icon' => $icon ) );

		return $icon;
	}

} // end if function doesn't exist


/**
 * Function for outputting icon markup in templates and functions. 
 *
 * @since 0.8.2
 * @param string $icon - The icon name to output.
 */	
if( !function_exists( 'taproot_icon' ) )
{
	function taproot_icon( $icon )
	{
		return get_taproot_icon( $icon );
	}

} // end if function doesn't exist
