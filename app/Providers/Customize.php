<?php
/**
 * Customizer service provider.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Providers;

use Hybrid\Tools\ServiceProvider;
use Taproot\Customize\Customize as Controller;
use Hybrid\Tools\Collection;

/**
 * Customizer service provider class.
 *
 * @since  1.0.0
 * @access public
 */
class Customize extends ServiceProvider {

    /**
     * Register classes and bind to the container.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function register() {

        $this->app->singleton( Controller::class );
        $this->app->singleton( 'customize/components', Collection::class );
    }

    /**
     * Boot Class Instances
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function boot() {
        $this->app->resolve( Controller::class )->boot();
    }
}
