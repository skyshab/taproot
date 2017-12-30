<?php
/**
 * Output theme template parts
 *
 * @package taproot/public
 * @since 0.8.0
 */

if( !class_exists( 'Taproot_Template_Parts' ) )
{
	/**
	 * Class that filters and adds template parts to theme templates.
	 *
	 * @since 0.8.0
	 * @see Taproot_Template
	 */
	class Taproot_Template_Parts extends Taproot_Template 
	{
		/**
		 * Register the actions and filters for the public-facing side of the site.
		 * 
		 * @since 0.8.0
		 */
		public function actions()
		{
			// Print Theme Navigation Areas
			$this->loader->add_action( 'taproot_header_before', $this, 'print_topnav' );
			$this->loader->add_action( 'taproot_header', $this, 'print_header_nav', 20 );
			$this->loader->add_action( 'taproot_header_after', $this, 'print_navbar' );
			$this->loader->add_action( 'taproot_footer_alpha', $this, 'print_footer_nav' );

			// Print Theme Content Components
			$this->loader->add_action( 'taproot_body_alpha', $this, 'print_skip_link' );
			$this->loader->add_action( 'taproot_header_search', $this, 'print_header_searchform' );
			$this->loader->add_action( 'taproot_header', $this, 'print_header_content', 10 );
			$this->loader->add_action( 'taproot_top_post_navigation', $this, 'print_top_post_navigation' );
			$this->loader->add_action( 'taproot_bottom_post_navigation', $this, 'print_bottom_post_navigation' );
			$this->loader->add_action( 'taproot_title', $this, 'print_post_title');
			$this->loader->add_action( 'taproot_post_details', $this, 'print_post_details', 10 );
			$this->loader->add_action( 'taproot_entry_header', $this, 'print_featured_image_before');
			$this->loader->add_action( 'taproot_entry_header', $this, 'print_content_title');
			$this->loader->add_action( 'taproot_entry_header', $this, 'print_featured_image_after');

			// Comments Elements
			$this->loader->add_action( 'taproot_comments',  $this, 'taproot_comments' );
			$this->loader->add_action( 'taproot_comments_nav',  $this, 'taproot_comments_nav' );
			$this->loader->add_action( 'taproot_comments_closed',  $this, 'taproot_comments_closed' );
			$this->loader->add_action( 'taproot_comments_none',  $this, 'taproot_comments_none' );
			$this->loader->add_action( 'taproot_comment_form',  $this, 'taproot_comment_form' );

			// Print Theme Widget Areas
			$this->loader->add_action( 'taproot_main_before', $this, 'print_left_sidebar' );
			$this->loader->add_action( 'taproot_main_after', $this, 'print_right_sidebar' );
			$this->loader->add_action( 'taproot_footer_widgets', $this, 'print_footer_sidebars' );

			// Print Bottom Bar Content
			$this->loader->add_action( 'taproot_footer_omega', $this, 'print_bottom_bar' );
			$this->loader->add_action( 'bottom_bar_content', $this, 'print_bottom_bar_content' );

			// Theme Component Filters
			$this->loader->add_filter( 'the_content', $this, 'post_pagination_filter', 100 );
			$this->loader->add_filter( 'img_caption_shortcode', $this, 'captions_filter', 10, 3  );

			// Set Excerpt Length
			$this->loader->add_filter( 'excerpt_length', $this, 'excerpt_length', 100 );

			// Set Read More content
			$this->loader->add_filter( 'excerpt_more', $this, 'excerpt_readmore' );
		}   


		/**
		 * Print Skip Link
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_skip_link()
		{
	    	$content = sprintf( '<div id="skip-link"><a href="#main" >%s</a></div>', esc_html__( 'skip to main content', 'taproot' ) );
			
			echo apply_filters( 'taproot_template_skip_link', $content );						
		}    

		/**
		 * Print Header Nav
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_header_nav()
		{
			$content = '';
			$has_header_search = get_theme_mod( 'taproot_enable_header_search' );
			$has_fixed_header_search = get_theme_mod( 'taproot_enable_fixed_header_search' );
			$hide_header_nav = $this->get_post_meta( 'taproot_header_hide_header_nav' );
			$hide_fixed_header_nav = $this->get_post_meta( 'taproot_fixed_header_hide_header_nav' );

			if( !has_nav_menu( 'header-nav' ) ) 
			{
				if( $has_header_search || $has_fixed_header_search ) 
				{
					$content .= sprintf( '<div class="search-toggle">%s</div>', do_taproot_icon('header_search') );
				}  
			}
			elseif( !$hide_header_nav && !$hide_fixed_header_nav )
			{
				// add class for header nav breakpoint
				$nav_classes = taproot_class( 'header-nav', 'taproot-nav', false );
				$header_nav_bp = $this->get_device_from_bp( get_theme_mod( 'taproot_header_nav_mobile_breakpoint', 'bp-t' ) );

				// Header Nav Markup
				$content .= sprintf( '<nav id="taproot-header-nav" class="%s" data-mobile-bp="%s">', esc_attr( $nav_classes ),  esc_attr( $this->rootstrap->get_device_min($header_nav_bp) ) );
								
					$content .= '<input type="checkbox" id="header-menu-toggle" class="menu-toggle">';
					$content .= '<label for="header-menu-toggle" class="label-toggle">';
					$content .= $this->get_menu_icon(); 
					$content .= '</label>';			
					$content .= wp_nav_menu( array( 'theme_location' => 'header-nav', 'menu_id' => '', 'container' => false, 'menu_class' => 'menu header-nav__menu', 'fallback_cb' => false, 'echo' => false, 'walker' => new Taproot_Nav_Walker() ) );

					if( $has_header_search || $has_fixed_header_search ) 
					{
						$content .= sprintf( '<div class="search-toggle">%s</div>', do_taproot_icon('header_search') );
					}

				$content .= '</nav>';
			}
			
			echo apply_filters( 'taproot_template_header_nav', $content );						
		}

		/**
		 * Add Navbar
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_navbar()
		{
			if( !has_nav_menu( 'navbar' ) ) return;

			$nav_classes = taproot_class( 'navbar', 'taproot-nav', false );
			$navbar_bp = $this->get_device_from_bp( get_theme_mod( 'taproot_navbar_mobile_breakpoint' ) );

			$content = sprintf( '<nav id="taproot-navbar" class="%s" data-mobile-bp="%s">', esc_attr( $nav_classes ),  esc_attr( $this->rootstrap->get_device_min($navbar_bp) ) );
				$content .= '<div class="container">';

					$content .= '<input type="checkbox" id="navbar-menu-toggle" class="menu-toggle"><label for="navbar-menu-toggle" class="label-toggle">';

					$content .= $this->get_menu_icon();

					$content .= '</label></input>';

					$content .= wp_nav_menu( array( 'theme_location' => 'navbar', 'menu_id' => '', 'container' => false, 'menu_class' => 'menu navbar__menu', 'fallback_cb' => false, 'echo' => false, 'walker' => new Taproot_Nav_Walker()) );

				$content .= '</div>';
			$content .= '</nav>';
			
			echo apply_filters( 'taproot_template_navbar', $content );						
		}

		/**
		 * Add Top Nav
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_topnav()
		{
			if( !has_nav_menu( 'top-nav' ) && !$this->get_topnav_content() ) return;

			$nav_classes = taproot_class( 'top-nav', 'taproot-nav', false );

			$content = sprintf( '<nav id="taproot-topnav" class="%s">', esc_attr( $nav_classes ) );
				$content .= '<div class="container topnav__container">';

					if( $this->get_topnav_content() )
						$content .= sprintf( '<div class="additional-content">%s</div>', $this->get_topnav_content() );

					$content .= wp_nav_menu( array( 'theme_location' => 'top-nav', 'menu_id' => '', 'depth' => 1, 'container' => false, 'menu_class' => 'menu topnav__menu', 'fallback_cb' => false, 'echo' => false ) );
				$content .= '</div>';
			$content .= '</nav>';
			
			echo apply_filters( 'taproot_template_topnav', $content );						
		}

		/**
		 * Get Top Nav Content
		 * 
		 * @since 0.8.0
		 * @return string - Returns top nav content. 
		 */
		public function get_topnav_content()
		{
			$content = '';
			$phone = get_theme_mod( 'taproot_topnav_info_phone', false );
			$email = get_theme_mod( 'taproot_topnav_info_email', false );

			if( $phone )
			{
				$content .= sprintf( '<span class="topnav-info">%s %s</span>', do_taproot_icon('topnav_phone'), esc_html( $phone ) );
			}

			if( $email )
			{
				$content .= sprintf( '<a href="mailto:%s" class="topnav-info">%s %s</a>', esc_attr( sanitize_email( $email ) ), do_taproot_icon('topnav_email'), sanitize_email( $email ) );
			}		
				
			$topnav_content = apply_filters( 'taproot_template_topnav_content', $content );	

			return ( $topnav_content && '' !== $topnav_content ) ? $topnav_content : false;
		}

		/**
		 * Add Header search
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_header_searchform()
		{
			$has_header_search = get_theme_mod( 'taproot_enable_header_search' );
			$has_fixed_header_search = get_theme_mod( 'taproot_enable_fixed_header_search' );

			if( ! $has_header_search && !$has_fixed_header_search ) return;

			$content = '<div class="container search-container search-not-active">';
				$content .= get_search_form(false);
				$content .= sprintf( '<div class="search-toggle">%s</div>', do_taproot_icon('header_search_close') );
			$content .= '</div>';
			
			echo apply_filters( 'taproot_template_header_searchform', $content );						
		}


		/**
		 * Get Menu Icon
		 * 
		 * @since 0.8.0
		 * @return string - Returns menu svg icon markup. 
		 */
	    function get_menu_icon()
	    { 
	        $svg = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1em">';
	          $svg .= '<g class="taproot-hamburger">';
	            $svg .= '<rect class="taproot-hamburger-top" width="100%" height="20%" rx="1" ry="1"/>';
	            $svg .= '<rect class="taproot-hamburger-middle" y="40%" width="100%" height="20%" rx="1" ry="1"/>';
	            $svg .= '<rect class="taproot-hamburger-bottom" y="80%" width="100%" height="20%" rx="1" ry="1"/>';
	          $svg .= '</g>';
	        $svg .= '</svg>';

			return apply_filters( 'taproot_template_menu_icon', $svg );						        
	    }


		/**
		 * Get Header Content
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_header_content()
		{
			$content = sprintf( '<a href="%s" id="branding" class="%s">', esc_url( home_url( '/' ) ), taproot_class( 'branding', '', false ) );

				$logo = false;
				$taproot_logo = get_option( 'custom_logo', false );
				$svg_logo = apply_filters( 'taproot_svg_logo', false );

				if( $taproot_logo )
					$logo = sprintf( '<img id="logo" class="logo" src="%s" alt="%s"/>', esc_url( $taproot_logo ), get_bloginfo( 'name' ) );
				elseif( $svg_logo )
					$logo = $svg_logo;

				if( $logo ) 
					$content .= sprintf( '<div class="logo-wrapper">%s</div>', $logo );

				$display_title = get_theme_mod( 'taproot_display_title' );
				$taproot_title = get_bloginfo( 'name' );
				$display_tagline = get_theme_mod( 'taproot_display_tagline' );
				$taproot_tagline = get_bloginfo( 'description' );

				if( $display_title || $display_tagline || is_customize_preview() )
	                $content .= '<div class="title-wrapper">';

					$hide_title_if_preview = ( is_customize_preview() && false == $display_title ) ? 'display:none;' : '';
					$hide_tagline_if_preview = ( is_customize_preview() && false == $display_tagline ) ? 'display:none;' : '';

					if( $display_title || is_customize_preview() )	        
	                    $content .= sprintf( '<h1 class="site-title" style="%s">%s</h1>', esc_attr( $hide_title_if_preview ), get_bloginfo( 'name' ) );
	                
	                if( $display_tagline || is_customize_preview() )
	                    $content .= sprintf( '<div class="site-description" style="display:none;">%s</div>', esc_attr( $hide_tagline_if_preview ) , get_bloginfo( 'description' ) );

	        	if( $display_title || $display_tagline || is_customize_preview() )
	            	$content .= '</div>';

	        $content .= '</a>';      
			
	        // if empty, don't print anything, unless we're in the customizer
	        if( !is_customize_preview() && !$display_title && !$display_tagline && !$taproot_logo && !$svg_logo ) return;

			echo apply_filters( 'taproot_template_header_content', $content );						
		}


		/**
		 * Get Sidebar
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_sidebar()
		{
			$sidebar = taproot_get_sidebar();

			if( is_active_sidebar( $sidebar ) && function_exists('dynamic_sidebar') )
		    {
				$sidebar_classes = taproot_class( 'sidebar', sprintf( 'sidebar--%s', $sidebar ), false );
				$customizer_preview_sidebar_id = ( is_customize_preview() ) ? sprintf( 'data-current-sidebar="%s"', esc_attr( $sidebar ) ) : '';

		        $content = sprintf('<aside id="sidebar" class="%s" role="complementary" %s><div class="widget-group">', esc_attr( $sidebar_classes ), $customizer_preview_sidebar_id );

					ob_start();
		        	dynamic_sidebar( $sidebar );
			        $ob_output = ob_get_contents();
			        ob_end_clean();

			        $content .= $ob_output;

		        $content .= "</div></aside>";
		    }
			
			echo apply_filters( 'taproot_template_sidebar', $content );						
		}

		/**
		 * Get Left Sidebar
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_left_sidebar()
		{
			$layout = taproot_get_layout();
			if( 'left' !== $layout ) return;

			$this->print_sidebar();
		}


		/**
		 * Get Right Sidebar
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_right_sidebar()
		{
			$layout = taproot_get_layout();
			if( 'right' !== $layout ) return;

			$this->print_sidebar();
		}


		/**
		 * Get Post Title
		 * 
		 * @since 0.8.0
		 * @return string - Returns post title markup.
		 */
		public function get_post_title()
		{
			$content = '<h1 class="post-title">';

			if( is_home() )
			{
				if( $home = get_option( 'page_for_posts', true ) )
				{
					$title = get_the_title( $home );
				}
				else
				{
					$blog_title = get_theme_mod( 'taproot_blog_title', false );
					$title = ( $blog_title && '' !== $blog_title ) ? esc_html( $blog_title ) : esc_html__( 'Latest Posts', 'taproot' );
				}

				$content .= $title;
		    }
		    elseif( is_archive() )
			{
		        $content .= get_the_archive_title();
		    }
		    elseif( is_search() )
			{
		        $content .= esc_html__( 'Search results for ', 'taproot' ) . get_search_query();
		    }
		    elseif( is_404() )
			{
		        $content .= esc_html__( 'Not Found', 'taproot' );
		    }
			else
			{
				$content .= get_the_title();
			}

			$content .= '</h1>';
			
			return apply_filters( 'taproot_template_post_title', $content );						
		}


		/**
		 * Print Post Title
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_post_title()
		{
			echo $this->get_post_title();
		}


		/**
		 * Get Post Meta
		 * 
		 * @since 0.8.0
		 * @return string - Returns post details markup. 
		 */
		public function get_post_details( $args = array() )
		{
			if( get_post_type( get_the_ID() ) === 'page' ) return;

		    global $post;

		    $use_meta_icons = ( get_theme_mod( 'taproot_post_box_meta_icons', true ) ) ? true : false;

		    $meta_defaults = array(
		        'el' => 'p',
		        'classes' => array(),
		        'icons' => $use_meta_icons,
		        'author' => get_the_author_meta( 'display_name', $post->post_author ),
		        'date' => get_the_date(),
		        'time' => false, // get_the_time(),
		        'comments' => true,
		        'categories' => true,
		        'tags' => true,
		        'author_pre_text' => '<span class="author-pre">by </span>',
		        'date_pre_text' => '<span class="date-pre">on </span>',
		        'time_pre_text' => '<span class="time-pre">at </span>',
		        'comments_pre_text' => '<span class="comments-pre">Comments: </span>',
		        'categories_pre_text' => '<span class="categories-pre">Categories: </span>',
		        'tags_pre_text' => '<span class="tags-pre">Tags: </span>',
		        'meta_intro_text' => '<span class="meta-pre">Posted</span> ',
		        'author_pre_icon' => do_taproot_icon('meta_author'),
		        'date_pre_icon' => do_taproot_icon('meta_date'),
		        'time_pre_icon' => do_taproot_icon('meta_time'),
		        'comments_pre_icon' => do_taproot_icon('meta_comments'),
		        'categories_pre_icon' => do_taproot_icon('meta_categories'),
		        'tags_pre_icon' => do_taproot_icon('meta_tags'),
		        'meta_intro_icon' => ''
		    );

		    if( is_array( $args ) )
		    	$args = array_merge($meta_defaults, $args);

		    $meta = '';


		    if($args['classes'] && is_array($args['classes']) )
		    {
		        $classes = 'taproot-meta ' . rtrim(implode(' ', $args['classes']), ' ');
		    }
		    else
		    {
		        $classes = 'taproot-meta';
		    }


		    if($args['icons'])
		    {
		        $author_pre = $args['author_pre_icon'];
		        $date_pre = $args['date_pre_icon'];
		        $time_pre = $args['time_pre_icon'];
		        $comments_pre = $args['comments_pre_icon'];
		        $categories_pre = $args['categories_pre_icon'];
		        $tags_pre = $args['tags_pre_icon'];
		        $meta_intro = $args['meta_intro_icon'];
		    }
		    else
		    {
		        $author_pre = $args['author_pre_text'];
		        $date_pre = $args['date_pre_text'];
		        $time_pre = $args['time_pre_text'];
		        $comments_pre = $args['comments_pre_text'];
		        $categories_pre = $args['categories_pre_text'];
		        $tags_pre = $args['tags_pre_text'];
		        $meta_intro = $args['meta_intro_text'];
		    }

		    if( $args['author'] )
		    {
		        $meta .= '<span class="author">' . $author_pre . $args['author'] . ' </span>';
		    }

		    if( $args['date'] )
		    {
		        $meta .= '<span class="date">' . $date_pre . $args['date'] . ' </span>';
		    }

		    if( $args['time'] )
		    {
		        $meta .= '<span class="time">' . $time_pre . $args['time'] . ' </span>';
		    }

		    if( $args['comments']  && comments_open() )
		    {
		        $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

		        if( $num_comments == 0 )
		        {
		            if( !$args['icons'] ) $comments_pre = '';

		            $comments = esc_html__('No Comments', 'taproot');
		        }
		        elseif( $num_comments > 1 )
		        {
		            $comments = $num_comments . esc_html__(' Comments', 'taproot');
		        }
		        else
		        {
		            $comments = esc_html__('1 Comment', 'taproot');
		        }

		        $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';

		        $meta .= '<span class="comments">' . $comments_pre . $write_comments . ' </span>';
		    }


		    if( $args['categories'] && has_category() )
		    {
		        $meta .= '<span class="categories">' . $categories_pre . get_the_category_list(', ') . ' </span>';
		    }

		    if( $args['tags'] && has_tag() )
		    {
		        $meta .= '<span class="tags">' . get_the_tag_list($tags_pre, ', ') . ' </span>';
		    }

		    // global $post;
		    // $post_id = $post->ID;
		    // $avatar = get_avatar(  $post_id, 24 );

		    $content = '';

		    if( $meta !== '' ) 
		    	$content .= sprintf('<%s class="%s"> %s %s</%s>', $args['el'], esc_attr( $classes ), $meta_intro, $meta, $args['el'] );	
				
			return apply_filters( 'taproot_template_post_meta', $content );						
		}


		/**
		 * Print Post Meta
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_post_details( $args = false )
		{
			echo $this->get_post_details($args);
		}

		/**
		 * Get Content Title
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_content_title()
		{
			$post_title_location = get_theme_mod( 'taproot_post_title' );
			if( 'content' === $post_title_location )
			{
				$this->print_post_title();
				$this->print_post_details();
			}
		}


		/**
		 * Get Featured Image
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_featured_image()
		{
			$featured_image_size = get_theme_mod( 'taproot_featured_image_size' );
			$featured_image_position = get_theme_mod( 'taproot_featured_image_position' );
			$thumbnail_class = ( 'default' === $featured_image_position ) ? '' : sprintf( 'align%s', $featured_image_position );


			global $post;

			if( has_post_thumbnail() )
			{
				$content = sprintf( '<p>%s</p>', get_the_post_thumbnail( $post->id, $featured_image_size, array( 'class' => $thumbnail_class ) ) );
				echo apply_filters( 'taproot_template_featured_image', $content );						
			}			
		}

		/**
		 * Get Featured Image: Before Title
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_featured_image_before()
		{
			$featured_image_location = get_theme_mod( 'taproot_featured_image_location' );
			if( 'before-title' === $featured_image_location )
			{
				$this->print_featured_image();
			}
		}


		/**
		 * Get Featured Image: After Title
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_featured_image_after()
		{
			$featured_image_location = get_theme_mod( 'taproot_featured_image_location' );
			if( 'after-title' === $featured_image_location )
			{ 
				$this->print_featured_image();
			}
		}


		/**
		 * Filter for custom caption code - adds size class to container
		 * 
		 * @since 0.8.0
		 * @return string - Returns captions markup. 
		 */
	    public function captions_filter( $output, $attr, $content ) 
	    {
	        // if feed, return the output
	        if( is_feed() ) return $output;

	        // define the defaults
	        $defaults = array(
	            'id' => '',
	            'align' => 'alignnone',
	            'width' => '',
	            'caption' => ''
	        );

	        // merge defaults with user input
	        $attr = shortcode_atts( $defaults, $attr );

	        // If the width is less than 1 or there is no caption, return the content
	        if( 1 > $attr['width'] || empty( $attr['caption'] ) )
	        {
	            return $content;
	        }

	        // extract the size from the content, for adding to the figure element
	        $content = str_replace( array( '"' ), ' ', $content );
	        $content_array = explode(' ', $content);
	        $image_size = 'size-full';

	        foreach ( $content_array as $word ) 
	        {
	            if( $this->starts_with( $word, 'size-' ) )
	            {
	                $image_size = $word;
	                break;
	            }
	        }

	        // set up the attributes
	        $attributes = ( !empty( $attr['id'] ) ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '';
	        $attributes .= sprintf(' class="wp-caption %s %s"', esc_attr( $attr['align'] ), $image_size);
	        if( !empty( $attr['width'] ) ) $attributes .= sprintf(' style="width: %spx;"', esc_attr( $attr['width'] ) );

	        // open the caption 
	        $output = '<figure' . $attributes .'>';

	        // add content, allowing shortcode
	        $output .= do_shortcode( $content );

	        // add caption text
	        $output .= '<figcaption class="wp-caption-text">' . $attr['caption'] . '</figcaption>';

	        // close the caption
	        $output .= '</figure>';

	        return $output;
	    }   


		/**
		 * Set a custom excerpt length
		 * 
		 * @since 0.8.0
		 * @return int - Returns custom excerpt length. 
		 */
		public function excerpt_length( $length ) 
		{
		    $custom_length = get_theme_mod('taproot_post_box_excerpt_length');
		    return ( $custom_length ) ? $custom_length : $length;
		}


		/**
		 * Print Top Post Navigation
		 * 
		 * @since 0.8.0
		 * @return void
		 */
	    function print_top_post_navigation()
	    {
	    	// top post nav
	        $enable_top_post_nav = ( is_taproot_pro() ) ? $this->get_post_meta( 'taproot_enable_top_post_nav' ) : false;

	        if( 'show' == $enable_top_post_nav )
	        {
	        	$enable_top_post_nav = true;
	        }
	        elseif( 'hide' == $enable_top_post_nav )
	        {
	        	$enable_top_post_nav = false;
	        }
	        else
	        {
	        	$enable_top_post_nav = get_theme_mod( 'taproot_enable_top_post_nav' );
	        }        

	    	// post nav classes
	        $post_nav_class = 'post-navigation post-navigation--top ';
	    	$post_nav_class .= ( get_theme_mod( 'taproot_enable_top_post_nav_separators' ) ) ? 'post-navigation--has-separators ' : '';

	        // breadcrumbs
			$breadcrumbs_location = $this->get_post_meta( 'taproot_breadcrumbs_location', 'default' );

			if( 'default' === $breadcrumbs_location )
			{
				$breadcrumbs_location = get_theme_mod( 'taproot_breadcrumbs_location', 'content' );
			}

			$show_breadcrumbs = ( 'content' === $breadcrumbs_location ) ? true : false;

			if( !$show_breadcrumbs && !$enable_top_post_nav ) return;


	        // if no prev/next links, and no breadcrumbs, bail
	        $has_previous_link = ( get_previous_post_link() && '' !==  get_previous_post_link() );
	        $has_next_link = ( get_next_post_link()  && '' !==  get_next_post_link() );

	        if( !$has_previous_link && !$has_next_link && !$show_breadcrumbs ) return;

	        // open post nav
	        $content = sprintf( '<div class="%s">', $post_nav_class );

	            // output previous link
	            if( $enable_top_post_nav )
	            {
			    	$prev_post = get_previous_post();
			    	$prev_post_title = ( $prev_post ) ? sprintf('<span class="screen-reader-text">%s</span>', esc_html( $prev_post->post_title ) ) : '';

			        $post_nav_prev_default = sprintf('%s %s', do_taproot_icon('top_post_nav_prev'), $prev_post_title );                 	
			        $post_nav_prev_content = apply_filters( 'taproot_top_post_nav_prev_content', $post_nav_prev_default );

			        $content .= '<div class="post-navigation__link post-navigation__link--prev">';
			        $content .= get_previous_post_link( '%link', $post_nav_prev_content );
			        $content .= '</div>';
	            }

	            // if not bottom nav, output breadcrumbs
	            if( $show_breadcrumbs ) $content .= $this->get_post_breadcrumbs();

	            // output next link
	            if( $enable_top_post_nav )
	            {
			    	$next_post = get_next_post();
			    	$next_post_title = ( $next_post ) ? sprintf('<span class="screen-reader-text">%s</span>', esc_html( $next_post->post_title ) ) : '';

			        $post_nav_next_default = sprintf('%s %s', $next_post_title, do_taproot_icon('top_post_nav_next') );
			        $post_nav_next_content = apply_filters( 'taproot_top_post_nav_next_content', $post_nav_next_default );

			        $content .= '<div class="post-navigation__link  post-navigation__link--next">';
			        $content .= get_next_post_link( '%link', $post_nav_next_content );
			        $content .= '</div>';            	
	            }

	        // close post nav
	        $content .= '</div>';
			
			echo apply_filters( 'taproot_template_top_post_navigation', $content );						
		}


		/**
		 * Print Bottom Post Navigation
		 * 
		 * @since 0.8.0
		 * @return void
		 */
	    function print_bottom_post_navigation()
	    {      
	        // bottom post nav
	        $enable_bottom_post_nav = ( is_taproot_pro() ) ? $this->get_post_meta( 'taproot_enable_bottom_post_nav' ) : false;

	        if( 'show' == $enable_bottom_post_nav )
	        {
	        	$enable_bottom_post_nav = true;
	        }
	        elseif( 'hide' == $enable_bottom_post_nav )
	        {
	        	$enable_bottom_post_nav = false;
	        }
	        else
	        { 
	        	$enable_bottom_post_nav = get_theme_mod( 'taproot_enable_bottom_post_nav' );
	        } 

	        if( !$enable_bottom_post_nav ) return;

	        // if no prev/next links, bail
	        $has_previous_link = ( get_previous_post_link() && '' !==  get_previous_post_link() );
	        $has_next_link = ( get_next_post_link()  && '' !==  get_next_post_link() );

	        if( !$has_previous_link && !$has_next_link ) return;

	        $post_nav_class = 'post-navigation post-navigation--bottom ';
	    	$post_nav_class .= ( get_theme_mod( 'taproot_enable_bottom_post_nav_separators' ) ) ? 'post-navigation--has-separators ' : '';

	        // open post nav
	        $content = sprintf( '<div class="%s">', esc_attr( $post_nav_class ) );

		    	$prev = esc_html( get_theme_mod( 'taproot_post_nav_prev_label_text' ) );
		    	$prev_post = get_previous_post();
		    	$prev_post_title = ( $prev_post ) ? sprintf('<span class="screen-reader-text">%s</span>', $prev_post->post_title ) : '';
		        $post_nav_prev_default = sprintf( '%s %s <span>%s</span>', do_taproot_icon('bottom_post_nav_prev'), $prev_post_title, $prev );
		        $post_nav_prev_content = apply_filters( 'taproot_bottom_post_nav_prev_content', $post_nav_prev_default );

		        $content .= '<div class="post-navigation__link post-navigation__link--prev">';
		            $content .= get_previous_post_link( '%link', $post_nav_prev_content );
		        $content .= '</div>';


		    	$next = esc_html( get_theme_mod( 'taproot_post_nav_next_label_text' ) );
		    	$next_post = get_next_post();
		    	$next_post_title = ( $next_post ) ? sprintf('<span class="screen-reader-text">%s</span>', esc_html( $next_post->post_title ) ) : '';
		        $post_nav_next_default = sprintf('%s <span>%s</span> %s', $next_post_title, $next, do_taproot_icon('bottom_post_nav_next') );

		        $post_nav_next_content = apply_filters( 'taproot_bottom_post_nav_next_content', $post_nav_next_default );
		        $content .= '<div class="post-navigation__link  post-navigation__link--next">';
		            $content .= get_next_post_link( '%link', $post_nav_next_content );
		        $content .= '</div>';            	
	            
	        // close post nav
	        $content .= '</div>';
	        		
			echo apply_filters( 'taproot_template_bottom_post_navigation', $content );						
		}


		/**
		 * Get Post Breadcrumbs
		 * 
		 * @since 0.8.0
		 * @return string - Returns post breadcrumb markup. 
		 */
		public function get_post_breadcrumbs()
		{    
		    global $post;
		    $separator = '<span class="breadcrumbs--separator"></span>';

		    $content = '<div class="taproot-breadcrumbs">';
		    if( !is_front_page() )
		    {
		        if( is_category() || is_single() )
		        {
		            $content .= get_the_category_list(', ');

		            if( is_single() )
		            {
		                $content .= $separator;
		                $content .= get_the_title();
		            }
		        }
		        elseif( is_page() && $post->post_parent )
		        {
		            $home = get_page( get_option( 'page_on_front' ) );

		            for ( $i = count( $post->ancestors )-1; $i >= 0; $i-- )
		            {
		                if( ( $home->ID ) != ( $post->ancestors[$i] ) )
		                {
		                    $content .= sprintf( '<a href="%s">%s</a>', esc_url( get_permalink($post->ancestors[$i]) ),
		                        esc_html( get_the_title($post->ancestors[$i]) ) );
		                    $content .= $separator;
		                }
		            }

		            $content .= esc_html( get_the_title() );
		        }
		        elseif( is_page() )
		        {
		            $content .= esc_html( get_the_title() );
		        }
		        elseif( is_404() )
		        {
		            $content .= "404";
		        }
		    }
		    else
		    {
		        $content .= get_bloginfo('name');
		    }

		    $content .= '</div>';

			return apply_filters( 'taproot_template_post_breadcrumbs', $content );									    
		}


	    /**
	     * Comments List
		 * 
		 * @since 0.8.0
		 * @return void
		 */
	    public function taproot_comments()
	    {
	        echo '<ol class="comment-list">';
	        wp_list_comments( array(
	            'style'      => 'ol',
	            'short_ping' => true,
	            'avatar_size'=> 100,
	            'callback' => array( $this, 'taproot_comments_callback' )
	        ));
	        echo '</ol>';
	    }



	    /**
	     * Comments Template 
		 * 
		 * @since 0.8.0
		 * @return void
		 */
	    public function taproot_comments_callback( $comment, $args, $depth )
	    {
	        // make sure comments work without this
	        // $GLOBALS['comment'] = $comment;

	        // is this necessary? just use $args[]?
	        extract( $args, EXTR_SKIP );

	        // This will store our comment markup
	        $output = '';

	        if( 'div' == $args['style'] )
	        {
	            $tag = 'div';
	            $add_below = 'comment';
	        }
	        else
	        {
	            $tag = 'li';
	            $add_below = 'div-comment';
	        }

	        $comment_class = ( empty( $args['has_children'] ) ) ? '' : 'parent';

	        $output .= sprintf('<%s id="comment-%s" %s>', esc_attr( $tag ), esc_attr( get_comment_ID() ), comment_class( $comment_class, null, null, false ) );


	    	if( 'div' != $args['style'] )
	    		$output .= sprintf( '<div id="div-comment-%s" class="comment-body box feature-left condensed bordered">', get_comment_ID() );

	    	$output .= sprintf( 
	    		'<div class="edit"><a class="comment-edit-link" href="%s">(%s)</a></div>', 
	    		esc_url( get_edit_comment_link( $comment ) ), 
	    		esc_html__( 'Edit', 'taproot' ) 
	    	);

	    	if( $args['avatar_size'] !== 0 ) 
	    	{
	        	$output .= '<div class="comment-avatar image-wrapper feature">';
	            	$output .= get_avatar( $comment, $args['avatar_size'] );
	        	$output .= '</div>';        		
	    	}

	        $output .= sprintf( '<div class="comment-author author vcard"<cite class="fn">%s</cite></div>', get_comment_author_link() );
	    
	    	if( $comment->comment_approved == '0' )
	        	$output .= sprintf( '<em class="comment-awaiting-moderation">%s</em><br />', esc_html( 'Your comment is awaiting moderation.', 'taproot' ) );

	    	$output .= '<p class="taproot-meta comment-meta">';
	         	$output .= sprintf( '<span class="date"> %s %s</span>', do_taproot_icon('comment_meta_date'), get_comment_date() );
	         	$output .= sprintf( '<span class="time"> %s %s</span>', do_taproot_icon('comment_meta_time'), get_comment_time() );
	    	$output .= '</p>';

	    	$output .= sprintf( '<div class="content">%s</div>', get_comment_text() );

	    	$output .= '<div class="reply action">';

	        	$output .= get_comment_reply_link( 
	        		array_merge( $args, array( 
	        			'add_below' => $add_below, 
	        			'depth' => $depth, 
	        			'max_depth' => $args['max_depth'], 
	        			'reply_text' => do_taproot_icon('comments_reply') . ' reply' 
	        		))
	        	); 

	    	$output .= '</div>';


	        if( 'div' !== $args['style'] )
	        	$output .= '</div>';	

			echo $output;									    
	    }    


	    /**
	     * Comments Nav
		 * 
		 * @since 0.8.0
		 * @return void
		 */
	    public function taproot_comments_nav()
	    {
	        $output = '<nav id="comment-nav" class="navigation comment-navigation" role="navigation">';
	            $output .= '<h1 class="screen-reader-text visuallyhidden">Comment navigation</h1>';
	            $output .= sprintf( '<div class="nav-previous">%s</div>', get_previous_comments_link( '&larr; Older Comments' ) );
	            $output .= sprintf( '<div class="nav-next">%s</div>', get_next_comments_link( '&larr; Newer Comments' ) );
	        $output .= '</nav>';

	        echo apply_filters( 'taproot_template_comments_nav', $output );
	    }


	    /**
	     * Comments Closed 
		 * 
		 * @since 0.8.0
		 * @return void
		 */
	    public function taproot_comments_closed()
	    {
	        $output = sprintf( '<p class="no-comments">%s</p>', esc_html__( 'Comments are closed.', 'taproot' ) );
	        echo apply_filters( 'taproot_template_comments_closed', $output ); 
	    }


	    /**
	     * Comments None
		 * 
		 * @since 0.8.0
		 * @return void
		 */
	    public function taproot_comments_none()
	    {
	        $output = sprintf( '<p class="no-comments">%s</p>', esc_html__( 'No Comments Yet. Be the first?', 'taproot' ) );
	        echo apply_filters( 'taproot_template_comments_none', $output ); 
	    } 


	    /**
	     * Comment Form
		 * 
		 * @since 0.8.0
		 * @return void
		 */
	    public function taproot_comment_form()
	    {
	    	$fields_author = '<div class="form-group comment-form-author">';
	    	$fields_author .= sprintf( '<label for="author" class="visuallyhidden">%s</label>',  esc_html__( 'Name', 'taproot' ) );
	    	$fields_author .= '<input id="author" class="form-control" name="author" type="text" placeholder="name*" size="30" />';
	    	$fields_author .= '</div>';

	    	$fields_email = '<div class=" form-group comment-form-email">';
	    	$fields_email .= sprintf( '<label for="email" class="visuallyhidden">%s</label>',  esc_html__( 'Email', 'taproot' ) );
	    	$fields_email .= '<input id="email" name="email" class="form-control" type="text" placeholder="email*" size="30" />';
	    	$fields_email .= '</div>';

	    	$comment_field = '<div class="form-group">';
	        $comment_field .= sprintf( '<label for="comment" class="visuallyhidden">%s</label>', esc_html__( 'Your Comment', 'taproot' ) );
	        $comment_field .= '<textarea id="comment" name="comment" class="form-control" cols="45" rows="6" placeholder="enter comment" aria-required="true"></textarea>';
	    	$comment_field .= '</div>';

	        $comment_args = array(
	            'title_reply'=>'Post a comment',
	            'cancel_reply_link' => sprintf( 'cancel %s', do_taproot_icon( 'times-circle' ) ),
	            'title_reply_to' => 'Reply to %s',
	            'fields' => array(
	                'author' => $fields_author,
	                'email' => $fields_email,
	            ),
	            'comment_field' => $comment_field,
	            'comment_notes_after' => '',
	            'class_submit' => 'taproot-button'
	        ); 

	        comment_form( $comment_args );
	    }    


		/**
		 * Filter To Add Pagination after post content
		 * 
		 * @since 0.8.0
		 * @return string - Returns post pagination markup. 
		 */
		public function post_pagination_filter( $content )
		{
			if( in_the_loop() && is_singular() ) 
			{
		    	$content .= wp_link_pages( array( 'before' => '<div class="taproot-post-pagination">' . esc_html__( 'Pages: ', 'taproot' ), 'after' => '</div>', 'echo' => false ) ); 			
			}

			return $content;
		}


		/**
		 * Add Footer Nav
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_footer_nav()
		{
			if( !has_nav_menu( 'footer-nav' ) ) return;

			$nav_classes = 'taproot-nav footer-nav ';
			$nav_classes .= sprintf( ' nav-align-%s ', get_theme_mod( 'taproot_footer_nav_align', 'left') );
			$nav_classes .= sprintf( ' footer-nav-%s', get_theme_mod( 'taproot_footer_nav_mobile_breakpoint', 'bp-m') );

			$content = sprintf( '<nav id="taproot-footer-nav" class="%s">', esc_attr( $nav_classes ) );
				$content .= '<div class="container">';
				$content .= wp_nav_menu( array( 'theme_location' => 'footer-nav', 'menu_id' => '', 'depth' => 1, 'container' => false, 'menu_class' => 'menu footer-nav__menu', 'fallback_cb' => false, 'echo' => false ) );
				$content .= '</div>';
			$content .= '</nav>';

			echo apply_filters( 'taproot_template_footer_nav', $content );						
		}


		/**
		 *  Get Array of Footer Sidebars
		 * 
		 * @since 0.8.0
		 * @return array - Returns an array of footer sidebar ids and Names
		 */
		public function get_footer_sidebars()
		{
			$footer_sidebars = array(
				'footer-1' => 'Footer Sidebar 1',
				'footer-2' => 'Footer Sidebar 2',
				'footer-3' => 'Footer Sidebar 3',
				'footer-4' => 'Footer Sidebar 4'
			);

			return $footer_sidebars;
		}


		/**
		 *  Has Active Footer Sidebars?
		 * 
		 * @since 0.8.0
		 * @return bool
		 */
		public function has_active_footer_sidebars()
		{
			$has_footer_sidebars = false;

			foreach ( $this->get_footer_sidebars() as $sidebar => $name )
			{	
				if( is_active_sidebar( $sidebar ) ) 
				{
					$has_footer_sidebars = true;
					break;
				}
			}	

			return ( $has_footer_sidebars ) ? true : false;
		}


		/**
		 *  Get Footer Sidebars
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_footer_sidebars()
		{
			$content = '';

			if( $this->has_active_footer_sidebars() ):
				$content .= '<div class="footer-widgets">';
			endif;

			foreach ( $this->get_footer_sidebars() as $sidebar => $name )
			{
				if( is_active_sidebar( $sidebar ) && function_exists( 'dynamic_sidebar' ) )
			    {
			        $content .= sprintf( '<aside id="%s" class="footer-sidebar %s" role="complementary"><div class="widget-group">', esc_attr( $sidebar ), esc_attr( $sidebar ) );
			        	
						ob_start();
			        	dynamic_sidebar( $sidebar );
				        $ob_output = ob_get_contents();
				        ob_end_clean();		        	

				        $content .= $ob_output;

			        $content .= "</div></aside>";
			    }
			}

			if( $this->has_active_footer_sidebars() ):
				$content .= '</div>';
			endif;

			echo apply_filters( 'taproot_template_footer_sidebars', $content );				
		}


		/**
		 * Get Bottom Bar Content
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_bottom_bar()
		{
			$content = '<div class="bottom-bar"><div class="container bottom-bar-container">';

			ob_start();
	        do_action('bottom_bar_content');
	        $ob_output = ob_get_contents();
	        ob_end_clean();

	        $content .= $ob_output;
			$content .= '</div></div>';

			echo apply_filters( 'taproot_template_bottom_bar', $content );		
		}


		/**
		 * Get Bottom Bar Custom Content
		 * 
		 * @since 0.8.0
		 * @return void
		 */
		public function print_bottom_bar_content()
		{
			if( get_option( 'taproot_bottom_bar_content', true ) )
			{
				$content = '<div class="bottom-bar-content">';
					$content .= wp_kses_post( get_option( 'taproot_bottom_bar_content', taproot_bottom_bar_default_content() ) );
				$content .= '</div>';

				echo apply_filters( 'taproot_template_bottom_bar_content', $content );	
			}
		}


		/**
		 * Set custom Read More content for inline action link style
		 * 
		 * @since 0.8.0
		 * @return string - Returns readmore markup. 
		 */
	    public function excerpt_readmore( $more ) 
	    {
	        $pb_link_style = get_theme_mod('taproot_post_box_link_style');
	        if( 'inline' !== $pb_link_style ) return $more;

	        return sprintf( ' ... <a href="%s" class="read-more--inline"><span class="visuallyhidden">%s</span>%s</a>',  esc_url( get_permalink() ), esc_html(get_the_title() ), esc_html( taproot_get_post_link_text() ) );

	    }


	/* Utility Methods */


		/**
		 * Has fixed header?
		 * 
		 * @since 0.8.0
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


		/**
		 * Get a Device Name from Breakpoint Data
		 * 
		 * @since 0.8.0
		 * @return string
		 */
	    function get_device_from_bp( $bp = 'bp-t' )
	    {
	        $screens = array(
	            'bp-none' => 'default',
	            'bp-m' => 'mobile-landscape',
	            'bp-ml' => 'tablet',
	            'bp-t' => 'laptop',
	            'bp-l' => 'desktop',
	            'bp-always' => false
	        );

	        return ( isset( $screens[$bp] ) && $screens[$bp] ) ? $screens[$bp] : false;
	    }	


		/**
		 * Utility method for determining if a string starts with another string
		 * 
		 * @since 0.8.0
		 * @return bool
		 */
	    private function starts_with( $haystack, $needle )
	    {
	         $length = strlen($needle);
	         return ( substr( $haystack, 0, $length ) === $needle );
	    }

	} // end class Taproot_Public

} // end if class doesn't exist
