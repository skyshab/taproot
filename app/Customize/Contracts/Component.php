<?php
/**
 * Customize component interface.
 *
 * Class for registering component customizer functionality.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Customize\Contracts;

/**
 * Component interface.
 *
 * @since  2.0.0
 * @access public
 */
interface Component {

    /**
     * ID getter/setter
     *
     * @since  2.0.0
     * @access public
     * @param string $id
     * @return string
     */
    public function id( $id );

    /**
     * Get the customize panel instance.
     *
     * @since  2.0.0
     * @access public
     * @return object
     */
    public function panel();

    /**
     * Get the Section instances.
     *
     * @since  2.0.0
     * @access public
     * @param array $section
     * @return array
     */
    public function sections();

    /**
     * Section setter.
     *
     * @since  2.0.0
     * @access public
     * @param array $section
     * @return array
     */
    public function section( $section );

    /**
     * Get tabs array.
     *
     * @since  2.0.0
     * @access public
     * @return array
     */
    public function tabs();

    /**
     * Store a tab.
     *
     * @since  2.0.0
     * @access public
     * @param array $tab
     * @return void
     */
    public function tab( $tab );

    /**
     * Get sequences array.
     *
     * @since  2.0.0
     * @access public
     * @return array
     */
    public function sequences();

    /**
     * Store a Sequence.
     *
     * @since  2.0.0
     * @access public
     * @param array $sequence
     * @return array
     */
    public function sequence( $sequence );
}
