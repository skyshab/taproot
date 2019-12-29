<?php
/**
 * Controller class.
 *
 * This file contains actions and callbacks for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Components\Layout;

use Hybrid\Contracts\Bootable;
use Taproot\Tools\Mod;

/**
 * Class to handle component actions.
 *
 * @since  2.0.0
 * @access public
 */
class Controller implements Bootable {

    /**
     * Adds actions on the appropriate customize action hooks.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_filter( 'body_class', [ $this, 'body_classes' ] );
        add_filter( 'hybrid/attr/app-main', [ $this, 'main_attr' ] );
        add_filter( 'hybrid/attr/app-main/class', [ $this, 'main_classes' ] );
    }

    /**
     *  Add classes to body
     *
     * @since 2.0.0
     * @return void
     */
    public function body_classes( $classes ) {

        // add class for boxed layout
        if( Mod::get('layout--boxed--enable') ) {
            $classes[] = 'boxed-layout';
        }

        return $classes;
    }

    /**
     *  Main ID
     *
     * @since 2.0.0
     * @return void
     */
    public function main_attr( $attr ) {

        $attr['id'] = "main";

        return $attr;
    }

    /**
     *  Main Classes
     *
     * @since 2.0.0
     * @return void
     */
    public function main_classes( $classes ) {

        $layout = Functions::get_layout();

        if( 'full' === $layout )
            $classes[] = 'app-main--full';
        else
            $classes[] = sprintf( ' app-main--sidebar-%s', $layout );

        if( Mod::get( 'layout--boxed--enable' ) )
            $classes[] = 'boxed-layout';
        else
            $classes[] = 'fullscreen-layout';

        return $classes;
    }
}
