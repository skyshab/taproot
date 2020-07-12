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

namespace Taproot\Components\Pagination;

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
        add_filter( 'hybrid/pagination/posts/args',     [ $this, 'pagination' ] );
        add_filter( 'hybrid/pagination/post/args',      [ $this, 'pagination' ] );
        add_filter( 'hybrid/pagination/comments/args',  [ $this, 'pagination' ] );
    }

    /**
     * Add custom pagination attributes.
     *
     * @since 2.0.0
     * @access public
     * @param array $args
     * @return array
     */
    public function pagination( $args ) {

        $custom = [
            'prev_text' => esc_html__( '&lt; prev', 'taproot' ),
            'next_text' => esc_html__( 'next &gt;', 'taproot' ),
        ];

        if( app('pagination/functions')->is_rounded() ) {
            $custom['list_class'] = 'pagination__items pagination__items--rounded';
        }

        return array_merge( $args, $custom );
    }
}
