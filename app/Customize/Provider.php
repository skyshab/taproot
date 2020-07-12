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

namespace Taproot\Customize;

use Hybrid\Tools\ServiceProvider;
use Taproot\Customize\Panels\Post_Types;
use Taproot\Customize\Panels\General;
use Hybrid\Tools\Collection;

/**
 * Customizer service provider class.
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
        $this->app->singleton( 'customize', Customize::class );
        $this->app->singleton( 'customize/components', Collection::class );
        $this->app->singleton( 'customize/post-types', Post_Types::class );
        $this->app->singleton( 'customize/general', General::class );
    }

    /**
     * Boot Class Instances
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function boot() {
        $this->app->resolve( 'customize' )->boot();
        $customize = $this->app->resolve( 'customize/components' );
        $customize->add( 'customize/post-types', $this->app->resolve( 'customize/post-types' ) );
        $customize->add( 'customize/general', $this->app->resolve( 'customize/general' ) );
    }
}
