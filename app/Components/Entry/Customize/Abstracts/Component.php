<?php
/**
 * Customize component.
 *
 * This class is used to manage the customizer panels, sections and controls for a component.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Entry\Customize\Abstracts;

/**
 * Creates a new Rootstrap object.
 *
 * @since  2.0.0
 * @access public
 */
class Component {

    /**
     * Panel id
     *
     * @since 2.0.0
     * @var array
     */
    public $panel;

    /**
     * Post type
     *
     * @since 2.0.0
     * @var array
     */
    public $post_type;

    /**
     * Stores sections to
     *
     * @since 2.0.0
     * @var array
     */
    public $sections = [];

    /**
     * Stores section objects
     *
     * @since 2.0.0
     * @var array
     */
    public $section_objects = [];

    /**
     * Stores namespace
     *
     * @since 2.0.0
     * @var string
     */
    public $namespace = '';

    /**
     * Initialize the object
     *
     * @since 2.0.0
     * @return void
     */
    public function __construct( $post_type ) {

        $this->post_type = $post_type;
        $this->panel = "{$this->post_type}--{$this->panel}";

        // Create and store sections for this panel
        array_map( function( $classname ) {
            $classname = sprintf('%s\%s\Section', $this->namespace, $classname);
            $this->section_objects[] = new $classname( $this->panel, $this->post_type );
        }, $this->sections );
    }
}
