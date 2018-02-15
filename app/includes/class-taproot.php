<?php
/**
 * The core theme class
 *
 * @package taproot
 * @since 0.8.0
 */

/**
 * Main class that initiates all functionality of the theme.
 *
 * @since 0.8.0
 */
class Taproot
{
	/**
	 * The loader that's responsible for theme hooks and filters.
	 *
	 * @since 0.8.0
	 * @var object
	 */
	protected $loader;

	/**
	 * Store Roostrap Device Object
	 *
	 * @since 0.8.0
	 * @var object
	 */
	public $rootstrap;


	/**
	 * Define the core functionality of the theme.
	 *
	 * Set the theme name and the theme version that can be used throughout the theme.
	 * Load the dependencies, define the locale, and set the hooks for the Dashboard and
	 * the public-facing side of the site.
	 *
	 * @since 0.8.0
	 */
	public function __construct()
	{
		$this->load_dependencies();
		$this->set_locale();
		$this->taproot_customizer();
		$this->taproot_admin();
		$this->taproot_public();
		$this->custom_sidebars();	
	}


	/**
	 * Load the required dependencies for this theme. and create an instance of
	 * the loader which will be used to register the hooks with WordPress.
	 *
	 * @since 0.8.0
	 */
	private function load_dependencies()
	{
		/**
		 * The class responsible for orchestrating 
		 * the themee actions and filters.
		 */
		require_once TAPROOT_INCLUDES . '/class-taproot-loader.php';

		/**
		 * Functions for use in templates
		 */
		require_once TAPROOT_INCLUDES . '/taproot-functions.php';

		/**
		 * The Theme Loader Object
		 */
		$this->loader = new Taproot_Loader();
	}


	/**
	 * Define the locale for this theme for internationalization. Uses the
	 * Taproot_i18n class in order to set the domain and to register the hook with WordPress.
	 *
	 * @since 0.8.0
	 */
	private function set_locale()
	{
		/**
		 * The class responsible for defining theme internationalization.
		 */
		require_once TAPROOT_INCLUDES . '/class-taproot-i18n.php';

		$taproot_i18n = new Taproot_i18n();

		$taproot_i18n->set_domain( TAPROOT_THEME_NAME );

		$this->loader->add_action( 'after_setup_theme', $taproot_i18n, 'load_theme_textdomain' );
	}


	/**
	 * Register all of the hooks related to the Customizer
	 *
	 * @since 0.8.0
	 */
	private function taproot_customizer()
	{
		/**
		 * The class responsible for defining all actions that relate to the customizer
		 */
		require_once TAPROOT_CUSTOMIZER . '/class-taproot-customizer.php';

		$taproot_customizer = new Taproot_Customizer( $this->loader );

		$this->rootstrap = $taproot_customizer->rootstrap;
	}


	/**
	 * Load functionality for the dashboard
	 *
	 * @since 0.8.0
	 */
	private function taproot_admin()
	{
		/**
		 * The class responsible for defining all actions that occur in the Dashboard.
		 */
		require_once TAPROOT_ADMIN . '/class-taproot-admin.php';

		$taproot_admin = new Taproot_Admin( $this->rootstrap, $this->loader );
	}


	/**
	 * Load functionality for the public-facing portion of the theme
	 *
	 * @since 0.8.0
	 */
	private function taproot_public()
	{
		/**
		 * The class responsible for defining public-facing actions.
		 */
		require_once TAPROOT_PUBLIC . '/class-taproot-public.php';	

		$taproot_public = new Taproot_Public( $this->rootstrap, $this->loader );
	}


	/**
	 * Create Taproot Custom Sidebars interface. 
	 *
	 * @since 0.8.0
	 */
	public function custom_sidebars()
	{
		/**
		 * The Class responsible for creating custom sidebars. 
		 */
		require_once TAPROOT_ADMIN . '/inc/class-taproot-sidebars.php';	

		// instantiate the class
		$taproot_sidebars = new Taproot_Sidebars();
	}


	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since 0.8.0
	 */
	public function run()
	{
		$this->loader->run();
	}


	/**
	 * The reference to the class that orchestrates the hooks with the theme.
	 *
	 * @since 0.8.0
	 *
	 * @return object - Orchestrates the hooks of the theme.
	 */
	public function get_loader()
	{
		return $this->loader;
	}

} // end class taproot
