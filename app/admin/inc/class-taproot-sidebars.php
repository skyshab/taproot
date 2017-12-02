<?php
/**
 * File that contains class for creating custom sidebars
 *
 * @package taproot/admin
 * @since 0.8.0
 */

if( !class_exists( 'Taproot_Sidebars' ) )
{
	/**
	 * Class that creates the custom sidebars interface.
	 *
	 * @since 0.8.0
	 */
	class Taproot_Sidebars
	{
		/**
		 * Stores message content.
		 *
		 * @since 0.8.0
		 * @var string
		 */		
		public $message = '';

		/**
		 * Stores message class.
		 *
		 * @since 0.8.0
		 * @var string
		 */		
		public $message_class = '';
	
		/**
		 * Stores the option name.
		 *
		 * @since 0.8.0
		 * @var string
		 */				 	
		public $option_name = "taproot_sidebars";

		/**
		 * Stores sidebar id prefix.
		 *
		 * @since 0.8.0
		 * @var string
		 */			
		public $sidebar_prefix = 'taproot-';

		/**
		 * Stores capability required to interact with the sidebars.
		 *
		 * @since 0.8.0
		 * @var string
		 */			
		public $cap_required = 'switch_themes';


		/**
		 * Initialize the class and add actions. 
		 *
		 * @since 0.8.0
		 */
		public function __construct()
		{ 
			$this->actions();
		}


		/**
		 * Add class actions. 
		 *
		 * @since 0.8.0
		 */
		public function actions()
		{
			add_action( 'widgets_init', array( $this, 'register_sidebars') );
			add_action( 'widgets_admin_page', array( $this,'widget_sidebar_content') );
			add_action( 'wp_ajax_taproot-ajax', array( $this, 'ajax_handler') );
			add_action( 'admin_enqueue_scripts', array( $this,'enqueue_scripts') );
		}


		/**
		 * Register sidebars.
		 *
		 * @since 0.8.0
		 */
		function register_sidebars()
		{
			$defaults = get_rootstrap_default_sidebars();
			$sidebars_option = ( is_array( get_option( $this->option_name ) ) ) ? get_option( $this->option_name ) : array();
			$sidebars = array_merge( $defaults, $sidebars_option );

			if( function_exists( 'register_sidebar' ) )
			{
				foreach ( $sidebars as $sidebar )
				{
					if( !isset( $sidebar['name'] ) ) continue;

					$args = array(
						'name'          => $sidebar['name'],
						'id'            => $sidebar['id'],
						'class'         => '',
						'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="content">',
						'after_widget'  => "</div></article>",
						'before_title'  => '<h3 class="widget-title">',
						'after_title'   => "</h3>",
					);

					register_sidebar( $args );
				}
			}
		}


		/**
		 * Get a sidebar if it exists. 
		 *
		 * @since 0.8.0
		 * 
 		 * @param string $id 
 		 * @param array $sidebars 
 		 * @return string Sidebar id if sidebar exists or false
 		 */
		function get_sidebar( $id, $sidebars )
		{
			$sidebar = false;
			$nsidebars = sizeof( $sidebars );
			$i = 0;

			while( !$sidebar && $i < $nsidebars )
			{
				if( $sidebars[$i]['id'] === $id )
					$sidebar = $sidebars[$i];
				$i++;
			}

			return $sidebar;
		}


		/**
		 * Get all custom sidebars. 
		 *
		 * @since 0.8.0
		 * 
		 * @return array Returns array of sidebars. 
		 */
		function get_custom_sidebars()
		{
			$sidebars = get_option( $this->option_name );
			return ( $sidebars ) ? $sidebars : array();
		}


		/**
		 * Store custom sidebar data. 
		 * 
		 * Stores sidebar information on save and sets message content.
		 * 
		 * @since 0.8.0
		 */
		function store_sidebar()
		{
			$name = ( !empty( $_POST['sidebar_name'] ) ) ? trim( sanitize_text_field( wp_unslash( $_POST['sidebar_name'] ) ) ) : false;

			if( $name )
			{
				$id = sanitize_html_class( sanitize_title_with_dashes( $name ) );
				$sidebars = get_option( $this->option_name, FALSE );

				if( $sidebars !== FALSE )
				{
					$sidebars = $sidebars;

					if( !$this->get_sidebar( $id, $sidebars ) )
					{
						//Create a new sidebar
						$sidebars[] = array(
							'name' => $name,
							'id' => $id
						);

						//update option
						update_option( $this->option_name, $sidebars );

						$this->set_message( "The sidebar has been created successfully." );

					}

					else
						$this->set_error( "There is already a sidebar registered with that name, please choose a different one." );
				}

				else
				{
					$id = sanitize_html_class( sanitize_title_with_dashes( $name ) );
					$sidebars= array( 
						array(
							'name' => $id,
							'id' => $id
						) 
					);

					add_option( $this->option_name, $sidebars );

					$this->set_message( esc_html__( 'The sidebar has been created successfully.', 'taproot' ) );
				}
			}
			else
			{
				$this->set_error( esc_html__( 'You have to fill all the fields to create a new sidebar.', 'taproot' ) );
			}	

		} // end store sidebar


		/**
		 * Remove a custom sidebar. 
		 * 
		 * Removes previously saved sidebars from custom sidebars.
		 * 
		 * @since 0.8.0
		 */		
		function delete_sidebar()
		{
			if( !current_user_can( $this->cap_required ) )
			{
				return new WP_Error( 'taprootcantdelete', esc_html__( 'You do not have permission to delete sidebars', 'taproot' ) );
			}

	        if( !DOING_AJAX && !empty( $_REQUEST['_n'] ) && !wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['_n'] ) ), 'custom-sidebars-delete' ) )
	        {
		        die( 'Security check stop your request.' );
	        }

			$newsidebars = array();
			$deleted = FALSE;
			$custom = $this->get_custom_sidebars();

			if( !empty( $custom ) )
			{
				foreach( $custom as $sb )
				{
					if( !empty( $_REQUEST['delete'] ) && $sb['id'] !== $_REQUEST['delete'] )
						$newsidebars[] = $sb;
					else
						$deleted = TRUE;
				}				
			}

			//update option
			update_option( $this->option_name, $newsidebars );

			if( $deleted && !empty( $_REQUEST['delete'] ) )
			{
				$this->set_message( esc_html__( 'The sidebar has been deleted.', 'taproot' ) );
			}
			elseif( !empty( $_GET['delete'] ) )
			{
				$this->set_error( esc_html__( 'There was not a sidebar with that name.', 'taproot' ) );
			}

		} // end delete sidebar


		/**
		 * Add new sidebar interface.  
		 * 
		 * @since 0.8.0
		 */	
		function widget_sidebar_content()
		{
			/**
			 * The view for our new sidebar interface 
			 */
			include_once TAPROOT_ADMIN . '/meta/new-sidebar.php';
	    }


		/**
		 * Load interface scripts.
		 * 
		 * @since 0.8.0
		 * 
		 * @param string $hook 
		 */	
		function enqueue_scripts( $hook )
		{
	        if( 'widgets.php' == $hook )
	        {
	        	wp_enqueue_script( 'taproot-sidebars-script', TAPROOT_ADMIN_URI . '/js/taproot-sidebars.js' );
	        }
		}


		/**
		 * Display message after action. 
		 * 
		 * @since 0.8.0
		 * 
		 * @param bool $echo 
		 * @return string Returns message markup if $echo is false.
		 */	
		function message( $echo = true )
		{
			$message = '';

			if( !empty( $this->message ) )
				$message = '<div id="message" class="' . esc_attr( $this->message_class ) . '"><p><strong>' . esc_html( $this->message ) . '</strong></p></div>';

			if( $echo )
				echo $message;
			else
				return $message;
		}


		/**
		 * Set message to be displayed. 
		 * 
		 * @since 0.8.0
		 * 
		 * @param string $text 
		 */	
		function set_message( $text )
		{
			$this->message = $text;
			$this->message_class = 'updated';
		}


		/**
		 * Set error to be displayed. 
		 * 
		 * @since 0.8.0
		 * 
		 * @param string $text 
		 */			
		function set_error( $text )
		{
			$this->message = $text;
			$this->message_class = 'error';
		}


		/**
		 * JSON response that displays the message. 
		 * 
		 * @since 0.8.0
		 * 
		 * @param object $obj
		 */			
	    function json_response( $obj )
	    {
	        header( 'Content-Type: application/json' );
	        echo json_encode( $obj );
	        die();
	    }


		/**
		 * Ajax handler
		 * 
		 * @since 0.8.0
		 */	
	    function ajax_handler()
	    {
	        if( !empty( $_REQUEST['taproot_action'] ) && 'where' === $_REQUEST['taproot_action'] )
	        {
	            $this->ajaxShowWhere();
	            die;
	        }

	        $nonce = ( !empty( $_POST['nonce'] ) ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : false;
	        $action = ( !empty( $_POST['taproot_action'] ) ) ? sanitize_text_field( wp_unslash( $_POST['taproot_action'] ) ) : false;

	        if( !wp_verify_nonce( $nonce, $action ) )
	        {
	            $response = array(
	               'success' => false,
	               'message' => esc_html__( 'The operation is not secure and it cannot be completed.', 'taproot' ),
	               'nonce' => wp_create_nonce( $action )
	            );

	            $this->json_response( $response );
	        }

	        $response = array();

	        if( 'taproot-create-sidebar' === $action )
	        {
	            $response = $this->ajax_create_sidebar();
	        }

	        elseif( 'taproot-delete-sidebar' === $action )
	        {
	            $response = $this->ajax_delete_sidebar();
	        }

	        $response['nonce'] = wp_create_nonce( $action );

	        $this->json_response( $response );

	    } // end AJAX handler


		/**
		 * AJAX Create a custom sidebar. 
		 * 
		 * @since 0.8.0
		 * 
		 * @return array Return array of sidebar data upon success. 
		 */	
	    function ajax_create_sidebar()
	    {
	        $this->store_sidebar();

	        if( 'error' === $this->message_class )
	        {
	            return array(
	               'success' => false,
	               'message' => $this->message
	            );
	        }

	        $sidebar_name = ( !empty( $_POST['sidebar_name'] ) ) ? sanitize_text_field( wp_unslash( $_POST['sidebar_name'] ) ) : false;

	        return array(
	            'success' => true,
	            'message' => esc_html__( 'The custom sidebar was created.', 'taproot' ),
	            'name' => stripslashes( trim( $sidebar_name ) ),
	            'id' => sanitize_html_class( sanitize_title_with_dashes( $sidebar_name ) )
	        );
	    }


		/**
		 * AJAX Remove a custom sidebar. 
		 * 
		 * @since 0.8.0
		 * 
		 * @return array Return message and if operation was successful. 		 
		 */	
	    function ajax_delete_sidebar()
	    {
	        $this->delete_sidebar();

	        return array(
	            'message' => $this->message,
	            'success' => $this->message_class !== 'error'
	        );
	    }

	} // end class

} // end if not class exists
