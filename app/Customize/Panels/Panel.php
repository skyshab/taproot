<?php
/**
 * Panel class.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Customize\Panels;

use WP_Customize_Manager;
use function Taproot\Customize\path;

/**
 * Panel class
 *
 * @link   https://developer.wordpress.org/themes/customize-api
 * @since  1.0.0
 * @access public
 */
class Panel  {


    /**
     * Stores panel id
     *
     * @since 1.0.0
     * @var string
     */
    private $id = false;


    /**
     * Stores sections
     *
     * @since 1.0.0
     * @var array
     */
    private $args = false;


    /**
     * Stores sections
     *
     * @since 1.0.0
     * @var array
     */
    private $sections = false;


    /**
     * Stores tabs
     *
     * @since 1.0.0
     * @var array
     */
    private $tabs = [];


    /**
     * Stores sequences
     *
     * @since 1.0.0
     * @var array
     */
    private $sequences = [];


    /**
     * Set up our object
     *
     * @since 1.0.0
     *
     * @param  string $id
     * @param  array $args
     */
    public function __construct( $id, $args ) {
        $this->id = $id;
        $this->args = $args;
        $this->boot();
    }


	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {
		add_action( 'rootstrap/loaded', [ $this, 'setup' ] );
        add_action( 'rootstrap/register/defaults', [ $this, 'register_defaults' ] );
        add_filter( 'rootstrap/sequences', [ $this, 'customize_sequences_filter' ] );
        add_filter( 'rootstrap/tabs', [ $this, 'customize_tabs_filter' ] );
        add_action( 'customize_register', [ $this, 'customize_register' ] );
    }


	/**
	 * Setup panels and sections
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function setup() {
        $file = path( $this->id, 'panel.php' );
        $panel = $this;
        include_once $file;
    }


	/**
	 * Register the Customizer defaults.
     * Used to set default on customizer control
     * and to determine whether to render styles in header
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register_defaults( $defaults ) {

        $panel = $this->id;

        if( ! $this->sections ) return;

        // load the defaults
        foreach ( $this->sections as $section ) {
            $file = path( $panel, $section, 'defaults.php' );
            $path = get_parent_theme_file_path( path( 'app', 'Customize', 'Panels', $file ) );
            if( file_exists( $path ) ) {
                include_once $file;
            }
        }
    }


	/**
	 * Register the panel, load the files that create sections, and create controls
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
	public function customize_register( WP_Customize_Manager $manager ) {

        $panel = $this->id;

        if( !empty( $this->args ) ) {
            $manager->add_panel( $panel, $this->args );
        }

        if( ! $this->sections ) return;

        // load each section file
        foreach ( $this->sections as $section ) {
            $file = path( $panel, $section, 'section.php' );
            $path = get_parent_theme_file_path( path( 'app', 'Customize', 'Panels', $file ) );
            if( file_exists( $path ) ) {
                include_once $file;
            }
        }
    }


	/**
	 * Store sections if passed in, otherwise return the sections
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function sections( $sections = false ) {
        if( $sections && is_array( $sections ) ) {
            $this->sections = $sections;
        } else {
            return $this->sections;
        }
    }


	/**
	 * Load section styles
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object    $styles
	 * @return void
	 */
	public function styles( $styles ) {
        $panel = $this->id;
        foreach( $this->sections as $section ) {
            $file = path( $panel, $section, 'styles.php' );
            $path = get_parent_theme_file_path( path( 'app', 'Customize', 'Panels', $file ) );
            if( file_exists( $path ) ) {
                include_once $file;
            }
        }
    }


	/**
	 * Define a customizer tab group
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array    $args
	 * @return void
	 */
	public function tabs( $args ) {
        $this->tabs[] = $args;
    }


	/**
	 * Customizer tabs filter
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array    $tabs
	 * @return array
	 */
	public function customize_tabs_filter( array $tabs ) {
        return array_merge( $tabs, $this->tabs );
    }


	/**
	 * Define a customizer sequence group
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array    $args
	 * @return void
	 */
	public function sequence( $args ) {
        $this->sequences[] = $args;
    }


	/**
	 * Customizer sequences filter
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array    $sequences
	 * @return array
	 */
	public function customize_sequences_filter( $sequences ) {
        return array_merge( $sequences, $this->sequences );
    }

}
