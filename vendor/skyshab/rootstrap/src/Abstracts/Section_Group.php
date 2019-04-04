<?php
/**
 * Abstract class for sections navigation classes.
 *
 * This class creates a sections group object.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Abstracts;


/**
 * Creates a new sections object.
 *
 * @since  1.0.0
 * @access public
 */
abstract class Section_Group {


    /**
     * Stores wp_customize.
     *
     * @since  1.0.0
     * @access protected
     * @var    array
     */
    public $customize;

    /**
     * Sections array.
     *
     * @since  1.0.0
     * @access private
     * @var    array
     */
    public $sections;

    /**
     * Sections title.
     *
     * @since  1.0.0
     * @access private
     * @var    string
     */
    private $title;

    /**
     * Reverse.
     *
     * @since  1.0.0
     * @access private
     * @var    bool
     */
    private $reverse;


    /**
     * Register a new Sections Group object.
     *
     * @since  1.0.0
     * @access public
     * @param  object   $wp_customize
     * @param  array    $args
     * @return void
     */
    public function __construct( $wp_customize, $args = [] ) {

        // store the customizer object
        $this->customize = $wp_customize;

        // set the object properties
        foreach( $args as $property => $value ) {
            if( property_exists( $this, $property ) )
                $this->$property = $value;
        }

        // if reverse order is specified, flip the sections
        if( $this->reverse ) $this->sections = array_reverse( $this->sections );

        // add control for hiding section sections
        $this->section_hider();

        // build the sections
        $this->section_loop();
    }


    /**
     * Loop through sections
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    private function section_loop() {

        if( !$this->sections ) return;

        foreach( $this->sections as $id => $args ) {

            // get the section
            $section = $this->customize->get_section( $id );

            if( !$section ) continue;

            // if hide flag enabled, set priority
            if( $this->is_section_hidden( $id ) )
                $section->priority = 1000;

            if( $this->title )
                $section->title = $this->title;

            // if device is set, add custom section type
            $device = ( isset( $args['device'] ) ) ? $args['device'] : false;

            if( $device )
                $section->type = sprintf( 'rootstrap-device--%s', $device );

            // create setting and control
            $this->control( $id );
        }
    }


    /**
     * Add tab control
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    abstract public function control( $id );


    /**
     * Get panel
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    private function get_panel() {
        $section = $this->customize->get_section( key( $this->sections ) );

        if ( $section && $section->panel ) {
            return $section->panel;
        }
        return false;
    }


    /**
     * Add the section hider
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    private function section_hider() {
        $id = sprintf( 'rootstrap-section-hider-%s', $this->get_panel() );
        $this->customize->add_section( $id, [
            'priority' => 999,
            'panel' => $this->get_panel(),
        ]);
    }


    /**
     * Is section hidden?
     *
     * @since  1.0.0
     * @access public
     * @param  array    $args
     * @return bool
     */
    private function is_section_hidden( $id ) {
        $section = $this->sections[$id];
        return ( isset( $section['hide'] ) && $section['hide'] ) ? true : false;
    }

}
