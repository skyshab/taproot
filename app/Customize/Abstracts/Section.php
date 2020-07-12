<?php
/**
 * Abstract section class.
 *
 * This class is used to register customizer sections, settings, controls and partials.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Abstracts;

/**
 * Creates a new Section class.
 *
 * @since  2.0.0
 * @access public
 */
abstract class Section {

    /**
     * Stores panel id
     *
     * @since 2.0.0
     * @var string
     */
    public $panel;

    /**
     * Stores section id
     *
     * @since 2.0.0
     * @var string
     */
    public $id = '';

    /**
     * Stores section name
     *
     * @since 2.0.0
     * @var string
     */
    public $name;

    /**
     * Stores section title
     *
     * @since 2.0.0
     * @var string
     */
    public $title;

    /**
     * Stores section ID
     *
     * @since 2.0.0
     * @var integer
     */
    public $priority = 10;

    /**
     * Stores description
     *
     * @since 2.0.0
     * @var string
     */
    public $description;

    /**
     * Stores associated post type
     *
     * @since 2.0.0
     * @var string
     */
    public $post_type = false;

    /**
     * Stores namespace
     *
     * @since 2.0.0
     * @var string
     */
    public $namespace;

    /**
     * Stores control classnames
     *
     * @since 2.0.0
     * @var array
     */
    public $controls = [];

    /**
     * Stores control objects
     *
     * @since 2.0.0
     * @var array
     */
    public $control_objects = [];

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct( $panel, $post_type = false ) {

        // Store the panel
        $this->panel = $panel;

        // Store the post type, if assigned
        $this->post_type = $post_type;

        // If section name not provided, generate automatically
        if( '' === $this->id ) {
            $this->id = "{$this->panel}--{$this->name}";
        }

        // Create and store controls for this section
        array_map( function( $control ) {

            // The control class name
            $control = sprintf( "%s\%s", $this->namespace, $control );

            // Instantiate the control class
            $control = new $control( $this->id );

            // Assign the post_type
            $control->post_type = $this->post_type;

            // Store the control instance in the section
            $this->control_objects[] = $control;

        }, $this->controls );
    }

    /**
     * Register sections
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function sections( $manager ) {
        $manager->add_section( $this->id, [
            'title'         => esc_html__( $this->title, 'taproot' ),
            'panel'         => $this->panel,
            'priority'      => $this->priority,
            'description'   => $this->description
        ]);
    }
}
