<?php
/**
 * The page/post admin functionality of the theme
 *
 * @package taproot/admin
 * @since 0.8.0
 */

if( !class_exists( 'Taproot_Post_Meta' ) )
{
	/**
	 * The class that adds metaboxes to posts and pages and 
	 * overrides global customizer settings with the values.
	 *
 	 * @since 0.8.0
	 */
	class Taproot_Post_Meta
	{
		/**
		 * Initialize the class and define actions.
		 *
	 	 * @since 0.8.0
		 */
		public function __construct()
		{
			$this->actions();
		}


		/**
		 * Register Actions for Admin portion of theme
		 *
	 	 * @since 0.8.0
		 */
		public function actions()
		{
			// register meta fields 
			add_action( 'init', array( $this, 'register_meta' ) );

			// add metaboxes
			add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );

			// save metabox values
			add_action( 'save_post', array( $this, 'save_taproot_settings' ), 100, 3 );	

			// add custom controls to featured image metabox
			add_filter( 'admin_post_thumbnail_html', array( $this, 'featured_image_metabox_markup' ), 10, 2 );

			// save featured image custom control values
			add_action( 'save_post', array( $this, 'save_featured_image_settings' ), 100, 3 );		
		}


		/**
		 * Register Meta Settings
		 *
	 	 * @since 0.8.0
		 */
		public function register_meta()
		{
			$settings = include TAPROOT_ADMIN . '/meta/taproot-register-meta.php';

			foreach( $settings as $id ) 
			{
				register_meta( 'post', $id, array(
					'sanitize_callback' => 'wp_strip_all_tags',
					'auth_callback'     => '__return_false',
					'single'            => true,
					'show_in_rest'      => false
				));
			}
		}


		/**
		 * Create Taproot Settings metabox
		 *
	 	 * @since 0.8.0
		 */
		public function add_meta_boxes()
		{
		    add_meta_box( "taproot_settings_metabox", "Taproot Settings", array( $this, "taproot_settings_markup" ), "post", "side", "high", null);
		}


		/**
		 * Create and output our metabox markup
		 *
	 	 * @since 0.8.0
	 	 * 
	 	 * @param object $post 
		 */
		public function taproot_settings_markup( $post )
		{
		    wp_nonce_field( basename( __FILE__ ), "taproot-settings-metabox-nonce" );

		    $metabox = '<div class="taproot-metabox">';

		    // single layout setting
	        $metabox .= $this->build_select( $post->ID, 
	        	'taproot_single_layout', 
	        	esc_html__('Layout', 'taproot'), 
	        	array(
	                'default' => esc_html__( 'Default', 'taproot' ),
	                'full' => esc_html__( 'Fullscreen', 'taproot' ),
	                'left' => esc_html__( 'Sidebar Left', 'taproot' ),
	                'right' => esc_html__( 'Sidebar Right', 'taproot' ),
	            ) 
	        ); 

	        // build array of sidebars
	        $single_sidebar_options = array(
	            'default' 	=> esc_html__( 'Default', 'taproot' ),
	            'sidebar-1' => esc_html__( 'Sidebar', 'taproot' ),
	        );  

	    	// get custom sidebars
	        $sidebars = get_option( 'taproot_sidebars' );
	        if( $sidebars )
	        {
	            foreach( $sidebars as $sidebar => $args ) 
	            {
	                $single_sidebar_options[ $args['id'] ] = $args['name'];
	            }
	        }  

		    // single sidebar setting
	        $metabox .= $this->build_select( $post->ID, 
	        	'taproot_single_sidebar', 
	        	esc_html__('Sidebar', 'taproot'), 
	        	$single_sidebar_options
	        ); 

		    // post template setting
	        $metabox .= $this->build_select( $post->ID, 
	        	'taproot_post_template', 
	        	esc_html__('Template', 'taproot'), 
	        	array(
		            'default' => esc_html__( 'Default Template', 'taproot' ),
		            'builder' => esc_html__( 'Builder Template', 'taproot' ),
		            'blank' => esc_html__( 'Blank Template', 'taproot' ),
	            ) 
	        ); 

		    // post template setting
	        $metabox .= $this->build_select( $post->ID, 
	        	'taproot_post_title', 
	        	esc_html__('Post Title Display', 'taproot'), 
	        	array(
			        'default' => esc_html__( 'Default', 'taproot' ),
			        'content' => esc_html__( 'Inside Content', 'taproot' ),
			        'hide' => esc_html__( 'Hide Title', 'taproot' ),
	            ) 
	        ); 

	        // post title display setting
	        $metabox .= $this->build_checkbox( $post->ID, 'taproot_enable_header_overlay', esc_html__('Header Overlay', 'taproot') ); 

	        // close metabox
		    $metabox .= '</div>';

		    // echo metabox
		    echo $metabox;
		}


		/**
		 * Save Taproot Settings Values
		 *
	 	 * @since 0.8.0
	 	 * 
	 	 * @param int $post_id 
	 	 * @param object $post 
	 	 * @param string $update 
	 	 * @return int Returns post id. 
		 */
		public function save_taproot_settings( $post_id, $post, $update )
		{
		    if( !isset( $_POST["taproot-settings-metabox-nonce"] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST["taproot-settings-metabox-nonce"] ) ), basename( __FILE__ ) ) )
		        return $post_id;

		    if( !current_user_can( "edit_post", $post_id ) )
		        return $post_id;

		    if( defined( "DOING_AUTOSAVE" ) && DOING_AUTOSAVE )
		        return $post_id;

		    $slug = "post";

		    if( $slug != $post->post_type )
		        return $post_id;

		    $this->update_setting( 'taproot_single_layout', $post_id );
		    $this->update_setting( 'taproot_single_sidebar', $post_id );
		    $this->update_setting( 'taproot_post_template', $post_id );
		    $this->update_setting( 'taproot_post_title', $post_id );	    
		    $this->update_setting( 'taproot_enable_header_overlay', $post_id );
		}


	    /**
		 * Add our custom fields to the featured image metabox.
		 *
	 	 * @since 0.8.0
	 	 * 
	 	 * @param string $content 
	 	 * @param int $post_id 
	 	 * @return string Returns the modified featured image metabox. 
		 */
		public function featured_image_metabox_markup( $content, $post_id  )
		{
		    $metabox = '<div class="taproot-metabox">';
			$metabox .= wp_nonce_field( basename( __FILE__ ), "taproot-featured-image-metabox-nonce", true, false );

		    // featured image size setting
	        $metabox .= $this->build_select( $post_id, 
	        	'taproot_featured_image_size', 
	        	esc_html__('Size', 'taproot'), 
	        	array(
				    'default' => esc_html__( 'Default', 'taproot' ),
				    'full' => esc_html__( 'Full Size', 'taproot' ),
				    'large' => esc_html__( 'Large', 'taproot' ),
				    'medium' => esc_html__( 'Medium', 'taproot' ),
				    'small' => esc_html__( 'Small', 'taproot' ),
				    'thumbnail' => esc_html__( 'Thumbnail', 'taproot' ),
				    'tiny' => esc_html__( 'Tiny', 'taproot' ), 
	            ) 
	        ); 

		    // featured image location setting
	        $metabox .= $this->build_select( $post_id, 
	        	'taproot_featured_image_location', 
	        	esc_html__('Location', 'taproot'), 
	        	array(
				    'default' => esc_html__( 'Default', 'taproot' ),                
				    'before-title' => esc_html__( 'Before Title', 'taproot' ),
				    'after-title' => esc_html__( 'After Title', 'taproot' ),
				    'hide' => esc_html__( 'Hide Featured Image', 'taproot' ),
	            ) 
	        ); 

		    // featured image position setting
	        $metabox .= $this->build_select( $post_id, 
	        	'taproot_featured_image_position', 
	        	esc_html__('Align', 'taproot'), 
	        	array(
				    'default' => esc_html__( 'Default', 'taproot' ),
				    'center' => esc_html__( 'Center', 'taproot' ),
				    'left' => esc_html__( 'Float Left', 'taproot' ),
				    'right' => esc_html__( 'Float Right', 'taproot' ),
	            ) 
	        ); 

		    // featured image position setting
	        $metabox .= $this->build_select( $post_id, 
	        	'taproot_post_box_featured_image_size', 
	        	esc_html__('Post Box Image Size', 'taproot'), 
	        	array(
		            'default' => esc_html__( 'Default', 'taproot' ),
				    'tiny' =>  esc_html__( 'Tiny', 'taproot' ),                                
				    'thumbnail' => esc_html__( 'Thumbnail', 'taproot' ),
				    'small' => esc_html__( 'Small', 'taproot' ),
				    'medium' => esc_html__( 'Medium', 'taproot' ),
				    'large' => esc_html__( 'Large', 'taproot' ),
				    'full' => esc_html__( 'Full', 'taproot' ),
	            ) 
	        ); 

	        // close metabox
			$metabox .= '</div>';
		       
			// return original content plus our custom meta	       
		    return $content . $metabox;
		}


		/**
		 * Save Taproot Settings Values
		 *
	 	 * @since 0.8.0
	 	 * 
	 	 * @param int $post_id 
	 	 * @param object $post 
	 	 * @param string $update 
	 	 * @return int Returns post id. 
		 */
		public function save_featured_image_settings( $post_id, $post, $update )
		{
		    if( !isset( $_POST["taproot-featured-image-metabox-nonce"] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST["taproot-featured-image-metabox-nonce"] ) ), basename( __FILE__ ) ) )
		        return $post_id;

		    if( !current_user_can( "edit_post", $post_id ) )
		        return $post_id;

		    if( defined( "DOING_AUTOSAVE" ) && DOING_AUTOSAVE )
		        return $post_id;

		    $slug = "post";

		    if( $slug != $post->post_type )
		        return $post_id;

		    $this->update_setting( 'taproot_featured_image_size', $post_id );
		    $this->update_setting( 'taproot_featured_image_location', $post_id );
		    $this->update_setting( 'taproot_featured_image_position', $post_id );
		    $this->update_setting( 'taproot_post_box_featured_image_size', $post_id );	        
		}


	    /**
	     * Build Select Element
		 *
	 	 * @since 0.8.0
	 	 * 
	 	 * @param int $post_id 
	 	 * @param string $id 
	 	 * @param string $label 
	 	 * @param array $options 
	 	 * @return string Returns select element markup. 
		 */
		private function build_select( $post_id, $id, $label, $options )
		{
			$clean_name = str_replace( 'taproot_', '', $id );
			$clean_name = str_replace( '_', '-', $clean_name );		
			$setting_class = sprintf( 'taproot-metabox__setting--%s',  $clean_name);

			$content = sprintf( '<p class="taproot-metabox__setting %s">', $setting_class );
			$content .= sprintf( '<label for="%s" class="taproot-metabox__setting__label">%s</label>', $id, $label );
			$content .= sprintf( '<select name="%s" class="taproot-metabox__setting__select">', $id );

	        foreach( $options as $value => $option_label ) 
	        {
	            $selected = ( $value === get_post_meta( $post_id, $id, true ) ) ? 'selected' : '';
	            $content .= sprintf( '<option value="%s" %s>%s</option>', esc_html( $value ), esc_html( $selected ), esc_html( $option_label ) );
	        }

		    $content .= '</select></p>';

		    return $content;
		}


	    /**
	     * Build Checkbox Element
		 *
	 	 * @since 0.8.0
	 	 * 
	 	 * @param int $post_id 
	 	 * @param string $id 
	 	 * @param string $label 
	 	 * @return string Returns checkbox element markup. 
		 */
		private function build_checkbox( $post_id, $id, $label )
		{
			$clean_name = str_replace( 'taproot_', '', $id );
			$clean_name = str_replace( '_', '-', $clean_name );		
			$setting_class = sprintf( 'taproot-metabox__setting--%s',  $clean_name);
	        $checked = ( "true" === get_post_meta( $post_id, $id, true ) ) ? 'checked' : '';

			$content = sprintf( '<p class="taproot-metabox__setting %s">', $setting_class );
			$content .= sprintf( '<label for="%s" class="taproot-metabox__setting__label">%s</label>', $id, $label );
	        $content .= sprintf( '<input name="%s" class="taproot-metabox__setting__checkbox" type="checkbox" value="true" %s>', $id, $checked );              	
		    $content .= '</p>';

		    return $content;        
		}


	    /**
	     * Update Setting
		 *
	 	 * @since 0.8.0
	 	 * 
	 	 * @param int $setting_id 
	 	 * @param int $post_id 
		 */
		private function update_setting( $setting, $post_id )
		{
	        // Get the value and sanitize it
	        $new_meta_value = ( isset( $_POST[$setting] ) ? sanitize_text_field( wp_unslash( $_POST[$setting] ) ) : '' );

	        // Get the meta value
	        $meta_value = get_post_meta( $post_id, $setting, true );

	        // If a new meta value was added and there was no previous value, add it
	        if( $new_meta_value && '' === $meta_value )
	            add_post_meta( $post_id, $setting, $new_meta_value, true );

	        // If the new meta value does not match the old value, update it
	        elseif( $new_meta_value && $new_meta_value !== $meta_value )
	            update_post_meta( $post_id, $setting, $new_meta_value );

	        // If there is no new meta value but an old value exists, delete it
	        elseif( '' === $new_meta_value && $meta_value )
	            delete_post_meta( $post_id, $setting, $meta_value );
		}
	

	} // end class Taproot_Post_Meta()

} // end if class exists
