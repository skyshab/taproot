<?php
/**
 * Customize component.
 *
 * This class is used to manage the customizer panels, sections, and controls in a component.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
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
class Component {

    /**
     * Stores panel id
     *
     * @since 2.0.0
     * @access public
     * @var array
     */
    public $panel;

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
     * @return void
     */
    public function __construct() {

        // Create and store component section objects
        array_map( function($classname) {
            $classname = sprintf('%s\%s\Section', $this->namespace, $classname);
            $this->section_objects[] = new $classname( $this->panel );
        }, $this->sections );
    }
}
