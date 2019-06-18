<?php
/**
 * Postnav class
 *
 * This file creates the postnav markup.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template;

use Hybrid\Contracts\Bootable;

/**
 * Manages Template Classes
 *
 * @since  1.0.0
 * @access public
 */
class Template implements Bootable {


	/**
	 * Load dependencies and boot our Template component classes
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {

        // set template directory location
        add_filter( 'hybrid/template/path', [ $this, 'path' ]  );

        // define custom templates
        add_action( 'hybrid/templates/register', [ $this, 'register' ]  );

        // load dependencies
        $this->load_dependencies();

        // boot component classes
        array_map( function( $component ) {
            $component_class = 'Taproot\Template\\' . $component  . '\\' . $component;
            $instance = new $component_class();
            $instance->boot();
        },[
            'Body',
            'Header',
            'Branding',
            'Main',
            'Sidebar',
            'Nav',
            'Breadcrumbs',
            'Footer',
            'Post',
            'Search'
        ]);
    }


    /**
	 * Load dependencies
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	private function load_dependencies() {

        // load template functions
        array_map( function( $file ) {
            require_once( get_parent_theme_file_path( "app/Template/{$file}.php" ) );
        }, [
            'Utilities/functions-utilities',
            'Icons/functions-icons',
            'Post/functions-post',
            'Header/functions-header',
            'Branding/functions-branding',
            'Footer/functions-footer',
            'Nav/functions-nav',
            'Breadcrumbs/functions-breadcrumbs',
            'Postnav/functions-postnav'
        ]);
    }


    /**
     * Changes the theme template path to the `views` folder
     * to the theme root.
     *
     * @since  1.3.0
     * @access public
     * @return string
     */
    public function path() {
        return 'views';
    }


    /**
     * Add templates for page builders.
     *
     * This adds the following templates:
     * Page Builder - Content area only has no container.
     * Blank - No header, footer or sidebar.
     *
     * @since  1.3.0
     * @access public
     * @return void
     */
    public function register( $templates ) {
        $templates->add('page-builder.php', ['label' => __('Page Builder', 'taproot')]);
        $templates->add('blank.php', ['label' => __('Blank Template', 'taproot')]);
    }

}
