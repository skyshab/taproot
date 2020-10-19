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

namespace Taproot\Post_Types;

use Hybrid\Tools\ServiceProvider;
use Taproot\Customize\Component;

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

        // Bind customize component for post types panel
        $this->app->singleton( 'customize/post-types', function() {

            return new Component([
                'id'        => 'post-types',
                'title'     => __('Post Types', 'taproot') ,
                'priority'  => 70,
            ]);
        });
    }

    /**
     * Boot Class Instances
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function boot() {

        // Get the customize component collection.
        $customize = $this->app->resolve( 'customize/components' );

        // Get the customize component
        $component = $this->app->resolve( 'customize/post-types' );

        // Add the customize component to the collection.
        $customize->add( 'post-types', $component );
    }
}
