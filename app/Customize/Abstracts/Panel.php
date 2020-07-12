<?php
/**
 * Customize panels.
 *
 * This class is used to manage the customizer panels and sections in a component.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Abstracts;

/**
 * Class that handles a customizer component.
 *
 * @since  2.0.0
 * @access public
 */
class Panel {

    /**
     * Stores panel id
     *
     * @since 2.0.0
     * @access public
     * @var array
     */
    public $panel;

    /**
     * Stores post type
     *
     * @since 2.0.0
     * @access public
     * @var array
     */
    public $post_type = false;

    /**
     * Stores section names
     *
     * @since 2.0.0
     * @access public
     * @var array
     */
    public $sections = [];

    /**
     * Stores section objects
     *
     * @since 2.0.0
     * @access public
     * @var array
     */
    public $section_objects = [];

    /**
     * Stores namespace
     *
     * @since 2.0.0
     * @access public
     * @var string
     */
    public $namespace;

    /**
     * Construct
     *
     * @since 2.0.0
     * @access public
     * @param string $post_type
     * @return void
     */
    public function __construct( $post_type = false ) {

        // If there's a post type defined
        if( $post_type ) {

            // Store the post type
            $this->post_type = $post_type;

            // If there is a panel defined, prefix the panel name with the post type.
            // Otherwise, set the panel to the post type.
            $this->panel = ( $this->panel ) ? "{$this->post_type}--{$this->panel}" : $this->post_type;
        }

        // Create and store component section objects
        array_map( function( $section ) {

            // Build the classname
            $section = sprintf( '%s\%s\Section', $this->namespace, $section );

            // Instantiate and store the section
            $this->section_objects[] = new $section( $this->panel, $this->post_type );

        }, $this->sections );
    }
}
