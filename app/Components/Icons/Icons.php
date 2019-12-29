<?php
/**
 * Icon Abstract class
 *
 * @package Taproot
 * @since 2.0.0
 */

namespace Taproot\Components\Icons;

/**
 * Class that handles SVG icons.
 *
 * @since 2.0.0
 */
abstract class Icons {

    /**
     * Stores the icon defaults
     *
     * @since 2.0.0
     * @var array
     */
    public $defaults = [
        'icon'        => '',
        'title'       => '',
        'desc'        => '',
        'aria_hidden' => true,
        'class'       => '',
    ];

    /**
     * Get icon markup
     *
     * @since 2.0.0
     * @param array $args - attributes used to construct the icon
     * @return string - Returns icon markup
     */
    public function get( $args ) {}

    /**
     * Filter icon by location
     *
     * @since 2.0.0
     * @param       array $args
     * @return      string
     */
    public function location( $location, $args ) {
        return $this->get( apply_filters( 'taproot/icon/' . $location, $args ) );
    }
}
