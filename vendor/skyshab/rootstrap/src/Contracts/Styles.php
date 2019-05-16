<?php
/**
 * Rootstrap style class.
 *
 * Utility for generating styleblocks using screens defined by our application
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Contracts;


/**
 * Styles interface.
 *
 * @since  1.0.0
 * @access public
 */
interface Styles {


    /**
     * Add a new style.
     *
     * @since  1.0.0
     * @access public
     * @param  array   $args
     * @return void
     */
    public function add( $args );


    /**
     * Add a new custom property.
     *
     * @since  1.0.0
     * @access public
     * @param  array   $args
     * @return void
     */
    public function custom_property( $args );


    /**
     * Add a new screen.
     *
     * @since  1.0.0
     * @access public
     * @param  string   $name
     * @param  array    $args
     * @return void
     */
    public function add_screen( $name, $args );


    /**
     * Get the styles from all screens
     *
     * @since 1.0.0
     * @access public
     * @return string
     */
    public function get_styles();


    /**
     * Get the styles from all screens
     *
     * @since 1.0.0
     * @access public
     * @return string
     */
    public function get_styleblock( $id );


    /**
     * Print the styles by screen when in customize preview
     *
     * @since 1.0.0
     * @access public
     * @return string
     */
    public function get_customize_preview();

}
