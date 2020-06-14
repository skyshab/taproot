<?php
/**
 * Post Type Settings
 *
 * This class handles the control for enabling post type panels in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Entry\Customize\Settings;

use Taproot\Customize\Controls\Multicheck\Multicheck;

/**
 * Class for radio control
 *
 * @since  2.0.0
 * @access public
 */
class Enable extends Multicheck {

    /**
     * Control name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'enabled-post-types';

    /**
     * Priority
     *
     * @since 2.0.0
     * @var int
     */
    public $priority = 1;

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Enabled Post Types';

    /**
     * Description
     *
     * @since 2.0.0
     * @var string
     */
    public $description = 'Selected post types will have controls added in the customizer. Save and reload the customizer after making changes.';

    /**
     * Transport
     *
     * @since 2.0.0
     * @var array
     */
    public $transport = 'postMessage';

    /**
     * Default
     *
     * @since 2.0.0
     * @var array
     */
    public $default = 'post,page';

    /**
     * Get Choices
     *
     * @since 2.0.0
     * @var string
     */
    public function get_choices() {

        $choices = [
            'post' => esc_html__( 'Posts', 'taproot' ),
            'page' => esc_html__( 'Pages', 'taproot' )
        ];

        $post_types = get_post_types( ['public' => true, '_builtin' => false ], 'object' );

        foreach( $post_types as $post_type ) {
            $choices[ $post_type->name ] = $post_type->labels->name;
        }

        return $choices;
    }
}
