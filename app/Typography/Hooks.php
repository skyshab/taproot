<?php
/**
 * Hooks class.
 *
 * This file contains actions and callbacks for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Typography;

use Hybrid\Contracts\Bootable;

/**
 * Handles component logic
 *
 * @since  2.0.0
 * @access public
 */
class Hooks implements Bootable {

    /**
     * Initiate component actions.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_action( 'after_setup_theme', [ $this, 'setup' ], 5 );
    }

    /**
     * Setup
     *
     * @since 1.4.0
     */
    public function setup() {

        // Editor block font sizes. These font sizes are also defined in the
        // `resources/scss/settings/_fonts.scss` file.
        add_theme_support( 'editor-font-sizes', [
            [
                'name'      => __( 'Small', 'taproot' ),
                'shortName' => __( 'S', 'taproot' ),
                'size'      => 14,
                'slug'      => 'small'
            ],
            [
                'name'      => __( 'Regular', 'taproot' ),
                'shortName' => __( 'M', 'taproot' ),
                'size'      => 16,
                'slug'      => 'regular'
            ],
            [
                'name'      => __( 'Large', 'taproot' ),
                'shortName' => __( 'L', 'taproot' ),
                'size'      => 23,
                'slug'      => 'large'
            ],
            [
                'name'      => __( 'Larger', 'taproot' ),
                'shortName' => __( 'XL', 'taproot' ),
                'size'      => 32,
                'slug'      => 'larger'
            ]
        ]);
    }
}
