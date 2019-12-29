<?php
/**
 * Component service provider.
 *
 * Bind classes to the container and boot once all components have been registered.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Components\Icons;

use Hybrid\Tools\ServiceProvider;

/**
 * Component service provider class.
 *
 * @since  2.0.0
 * @access public
 */
class Provider extends ServiceProvider {

    /**
     * Register classes and bind to the container.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function register() {

        // Bind a single instance of our Icons class.
        $this->app->bind( 'Taproot\Components\Icons\Icons', 'Taproot\Components\Icons\SVG' );

        // Create alias for Icons class.
        $this->app->alias( 'Taproot\Components\Icons\Icons', 'icons' );
    }
}
