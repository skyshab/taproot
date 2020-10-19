<?php
/**
 * Customize Component.
 *
 * Class for registering component customizer functionality.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Customize;

use Taproot\Customize\Contracts\Component as Contract;

/**
 * Component service provider class.
 *
 * @since  2.0.0
 * @access public
 */
class Component implements Contract {

    /**
     * Stores panel id
     *
     * @since 2.0.0
     * @access public
     * @var array
     */
    public $id;

    /**
     * Stores panel name
     *
     * @since 2.0.0
     * @access public
     * @var array
     */
    public $name;

    /**
     * Stores post type
     *
     * @since 2.0.0
     * @access public
     * @var array
     */
    public $post_type;

    /**
     * Stores parent panel id
     *
     * @since 2.0.0
     * @access public
     * @var array
     */
    public $panel;

    /**
     * Stores panel priority
     *
     * @since 2.0.0
     * @access public
     * @var int
     */
    public $priority;

    /**
     * Stores panel title
     *
     * @since 2.0.0
     * @access public
     * @var string
     */
    public $title;

    /**
     * Stores sections
     *
     * @since 2.0.0
     * @access public
     * @var array
     */
    public $sections;

    /**
     * Stores tabs
     *
     * @since 2.0.0
     * @access public
     * @var array
     */
    public $tabs;

    /**
     * Stores sequences
     *
     * @since 2.0.0
     * @access public
     * @var array
     */
    public $sequences;

    /**
     * Construct
     *
     * @since 2.0.0
     * @access public
     * @param string $post_type
     * @return void
     */
    public function __construct( $args = [] ) {

        $args = wp_parse_args( $args, [
            'id'        => false,
            'title'     => '',
            'priority'  => 10,
            'panel'     => null,
            'post_type' => false,
            'sections'  => [],
            'tabs'      => [],
            'sequences' => []
        ]);

        foreach( $args as $key => $val ) {
            if( property_exists( get_called_class(), $key ) ) {
                $this->{$key} = $val;
            }
        }
    }

    /**
     * ID getter/setter
     *
     * @since  2.0.0
     * @access public
     * @param string $id
     * @return string
     */
    public function id( $id = false ) {

        if( $id ) {
            $this->id = $id;
        }
        else {

            // If we have set an id, just use it
            if( $this->id ) {
                return $this->id;
            }
            // Otherwise, if there's a post type set
            elseif( $this->post_type ) {

                // If we have also set a name, append with post type
                if( $this->name ) {
                    return "{$this->post_type}--{$this->id}";
                }
                // No name set, so use the post type
                return $this->post_type;
            }
            // If no post type set, check for a name
            elseif( $this->name ) {
                return $this->name;
            }

            // Nothing to work with here
            return false;
        }
    }

    /**
     * Get the customize panel instance.
     *
     * @since  2.0.0
     * @access public
     * @return object
     */
    public function panel() {

        if( $this->title ) {

            return new Panel([
                'id'            => $this->id(),
                'title'         => $this->title,
                'priority'      => $this->priority,
                'panel'         => $this->panel,
            ]);
        }

        return false;
    }

    /**
     * Get the Section instances.
     *
     * @since  2.0.0
     * @access public
     * @param array $section
     * @return array
     */
    public function sections() {

        $sections = [];

        foreach( $this->sections as $section ) {

            // Set the section panel id
            $section['panel'] = $this->id();

            // Set the section post type
            $section['post_type'] = $this->post_type;

            // Instantiate the section object and add to array
            $sections[] = new Section( $section );
        }

        return $sections;
    }

    /**
     * Section setter.
     *
     * @since  2.0.0
     * @access public
     * @param array $section
     * @return array
     */
    public function section( $section = false ) {
        if( $section ) {
            $this->sections[] = $section;
        }
    }

    /**
     * Get tabs array.
     *
     * @since  2.0.0
     * @access public
     * @return array
     */
    public function tabs() {
        return $this->tabs;
    }

    /**
     * Store a tab.
     *
     * @since  2.0.0
     * @access public
     * @param array $tab
     * @return void
     */
    public function tab( $tab = false ) {
        if( $tab ) {
            $this->tabs[] = $tab;
        }
    }

    /**
     * Get sequences array.
     *
     * @since  2.0.0
     * @access public
     * @return array
     */
    public function sequences() {
        return $this->sequences;
    }

    /**
     * Store a Sequence.
     *
     * @since  2.0.0
     * @access public
     * @param array $sequence
     * @return array
     */
    public function sequence( $sequence = false ) {
        if( $sequence ) {
            $this->sequences[] = $sequence;
        }
    }
}
