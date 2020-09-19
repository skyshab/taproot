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

namespace Taproot\Layout;

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
        add_filter( 'hybrid/attr/app-main/class',               [ $this, 'main_classes' ] );
        add_filter( 'hybrid/attr/post__header/class',           [ $this, 'post_header_classes' ] );
        add_filter( 'hybrid/attr/post__content/class',          [ $this, 'post_content_classes' ] );
        add_filter( 'hybrid/attr/post__footer/class',           [ $this, 'post_footer_classes' ] );
        add_filter( 'hybrid/attr/archive/class',                [ $this, 'archive_content_classes' ] );
    }

    /**
     *  Main Classes
     *
     * @since 2.0.0
     * @return void
     */
    public function main_classes( $classes ) {

        $layout = app('layout/functions')->get_layout();

        if( 'full' === $layout ) {
            $classes[] = 'app-main--no-sidebar';
        }
        else {
            $classes[] = 'app-main--has-sidebar';
            $classes[] = sprintf( 'app-main--has-sidebar-%s', $layout );
        }

        if( app('layout/functions')->disable_main_top_padding() ) {
            $classes[] = 'app-main--top-padding-is-disabled';
        }

        if( app('layout/functions')->disable_main_bottom_padding() ) {
            $classes[] = 'app-main--bottom-padding-is-disabled';
        }

        return $classes;
    }

    /**
     * Entry Header Classes
     *
     * @since 2.0.0
     * @return void
     */
    public function post_header_classes( $classes ) {

        $display = app('layout/functions')->get_post_header_footer_layout();

        if( $display ) {
            $classes[] = "post__header--{$display}";
        }

        return $classes;
    }

    /**
     * Entry Content Classes
     *
     * @since 2.0.0
     * @return void
     */
    public function post_content_classes( $classes ) {

        $display = app('layout/functions')->get_post_content_layout();

        if( $display ) {
            $classes[] = "post__content--{$display}";
        }

        return $classes;
    }

    /**
     * Entry Footer Classes
     *
     * @since 2.0.0
     * @return void
     */
    public function post_footer_classes( $classes ) {

        $display = app('layout/functions')->get_post_header_footer_layout();

        if( $display ) {
            $classes[] = "post__footer--{$display}";
        }

        return $classes;
    }

    /**
     * Entry Footer Classes
     *
     * @since 2.0.0
     * @return void
     */
    public function archive_content_classes( $classes ) {

        $display = app('layout/functions')->get_archive_content_layout();

        if( ! $display ) {
            return $classes;
        }

        $classes[] = "archive--{$display}";

        return $classes;
    }
}
