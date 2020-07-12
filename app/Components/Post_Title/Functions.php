<?php
/**
 * Component functions.
 *
 * This class contains helper functions for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Post_Title;

use Taproot\Tools\Mod;
use function Taproot\Tools\get_the_single_id;
use function Taproot\Tools\post_type_mod;

/**
 * Functions class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

    /**
     * Get the post title text.
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    function get_the_title() {

        if( get_the_single_id() ) {
            $text = single_post_title( '', false );
        }
        elseif( is_home() ) {

            if( $custom_title = Mod::get( "post--archive--title--title" ) ) {

                $text = wp_kses( $custom_title, [
                    'em' => [],
                    'strong' => [],
                    'i' => [
                        'class' => []
                    ]
                ]);
            }
            else {
                $text = get_the_archive_title();
            }
        }
        elseif( is_archive() ) {

            $custom_title = post_type_mod( 'archive--title--title' );

            if( ! is_tax() && ! is_tag() && ! is_category() && $custom_title ) {

                $text = wp_kses( $custom_title, [
                    'em' => [],
                    'strong' => [],
                    'i' => [
                        'class' => []
                    ]
                ]);
            }
            else {
                $text = get_the_archive_title();
            }
        }
        else {
            $text = the_title( '', '', false );
        }

        return $text;
    }

    /**
     * Hide the post title?
     *
     * @since  2.0.0
     * @return bool
     */
    public static function hide_the_post_title() {

        $post_id = get_the_single_id();

        if( $post_id && get_post_meta( $post_id, '_taproot_post_title_hide', true ) ) {
            return true;
        }

        return false;
    }
}
