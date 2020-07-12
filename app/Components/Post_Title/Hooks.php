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

namespace Taproot\Components\Post_Title;

use Hybrid\Contracts\Bootable;
use function Hybrid\app;

/**
 * Class to handle component actions.
 *
 * @since  2.0.0
 * @access public
 */
class Hooks implements Bootable {

    /**
     * Adds actions on the appropriate customize action hooks.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_filter( 'taproot/post/title',    [ $this, 'post_title_display' ] );
        add_filter( 'taproot/archive/title', [ $this, 'post_title_display' ] );
    }

    /**
     * Post title display.
     *
     * Don't display post title when needed.
     *
     * @since 2.0.0
     * @param array
     * @return string
     */
    public function post_title_display( $markup ) {
        return ( app('post-title/functions')->hide_the_post_title() ) ? '' : $markup;
    }
}
