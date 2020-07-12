<?php
/**
 * Customize component.
 *
 * This class is used to manage the customizer panels, sections, and controls in a component.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Panels;

use Taproot\Customize\Abstracts\Panel;
use Rootstrap_Custom_Panel as Custom_Panel;

/**
 * Class that extends Panel.
 *
 * @since  2.0.0
 * @access public
 */
class Post_Type extends Panel {

    /**
     * Stores post type
     *
     * @since 2.0.0
     * @access public
     * @var string
     */
    public $post_type;

    /**
     * Stores panel
     *
     * @since 2.0.0
     * @access public
     * @var string
     */
    public $panel;

    /**
     * Stores panel args
     *
     * @since 2.0.0
     * @access public
     * @var array
     */
    public $args;

    /**
     * Construct
     *
     * @since 2.0.0
     * @access public
     * @param string $post_type
     * @param array $args
     * @return void
     */
    public function __construct( $post_type, $args = [] ) {

        // Store the post type.
        $this->post_type = $post_type;

        // Build and store the post type panel name
        $this->panel = "post-type-{$post_type}";

        // Default args
        $defaults = [
            'pre_title_label'   => __( 'Customizing', 'taproot' ),
            'panel'             => 'post-types',
            'title'             => '',
            'priority'          => 10,
        ];

        // Merge incoming args with defaults and store.
        $this->args = wp_parse_args( $args, $defaults );
    }

    /**
     * Register panel
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function panels( $manager ) {
        $manager->add_panel( new Custom_Panel( $manager, $this->panel, $this->args ) );
    }
}
