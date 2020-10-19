<?php
/**
 * Editor service provider.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Editor;

use Hybrid\Tools\ServiceProvider;

/**
 * Editor service provider class.
 *
 * @since  1.0.0
 * @access public
 */
class Provider extends ServiceProvider {

    /**
     * Register classes and bind to the container.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function register() {
        $this->app->singleton( 'editor', Editor::class );
    }

    /**
     * Boot Class Instances
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function boot() {
        $this->app->resolve( 'editor' )->boot();
    }
}
