<?php
/**
 * Section class.
 *
 * This class is used to to add a new section to the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize;

use Taproot\Customize\Contracts\Section as Contract;

/**
 * Creates a new Section class.
 *
 * @since  2.0.0
 * @access public
 */
class Section implements Contract {

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
    public $id;

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
    public $priority;

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
    public $post_type;

    /**
     * Stores control classnames
     *
     * @since 2.0.0
     * @var array
     */
    public $controls;

    /**
     * Constructor.
     *
     * @since 2.0.0
     * @param array $args
     * @return void
     */
    public function __construct( $args = [] ) {

        $args = wp_parse_args( $args, [
            'id'        => false,
            'name'      => false,
            'title'     => '',
            'priority'  => 10,
            'panel'     => false,
            'post_type' => false,
            'controls'  => [],
        ]);

        foreach( $args as $key => $val ) {
            if( property_exists( get_called_class(), $key ) ) {
                $this->{$key} = $val;
            }
        }

        // If section name not provided, generate automatically
        if( ! $this->id && $this->name ) {
            $this->id = "{$this->panel}--{$this->name}";
        }
    }

    /**
     * Register section.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function sections( $manager ) {

        if( ! $this->title ) {
            return;
        }

        $manager->add_section( $this->id, [
            'title'         => $this->title,
            'panel'         => $this->panel,
            'priority'      => $this->priority,
            'description'   => $this->description
        ]);
    }

    /**
     * Get the control instances.
     *
     * @since  2.0.0
     * @access public
     * @return array
     */
    public function controls() {

        $controls = [];

        // Instantiate the control objects and add to array
        foreach( $this->controls as $control ) {

            // Make sure the class exists
            if( ! class_exists( $control ) ) {
                continue;
            }

            $controls[] = new $control( $this->id, $this->post_type );
        }

        return $controls;
    }
}
