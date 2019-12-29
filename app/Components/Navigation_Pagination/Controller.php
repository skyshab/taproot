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

namespace Taproot\Components\Navigation_Pagination;

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
        add_filter( 'hybrid/pagination/posts/args',     [ $this, 'pagination' ] );
        add_filter( 'hybrid/pagination/post/args',      [ $this, 'pagination' ] );
        add_filter( 'hybrid/pagination/comments/args',  [ $this, 'pagination' ] );
    }

    /**
     * Add custom pagination attributes
     *
     * @since 2.0.0
     * @param string    $context
     * @param string    $args
     * @return string
     */
    public function pagination( $args ) {

        $custom = [
            'prev_text' => esc_html__('&lt; prev', 'taproot'),
            'next_text' => esc_html__('next &gt;', 'taproot'),
        ];

        if( Mod::get( 'navigation--pagination--is-rounded' ) ) {
            $custom['list_class'] = 'pagination__items pagination__items--rounded';
        }

        return array_merge( $args, $custom );
    }
}
