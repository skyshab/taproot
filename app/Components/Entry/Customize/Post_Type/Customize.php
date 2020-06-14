<?php
/**
 * Customize component.
 *
 * This class is used to manage the customizer panels, sections and controls for a component.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Entry\Customize\Post_Type;

use Taproot\Components\Entry\Customize\Abstracts\Component as CustomizeComponent;
use Rootstrap_Custom_Panel as Custom_Panel;
use function get_post_type_object;

/**
 * Extend CustomizeComponent class
 *
 * @since  2.0.0
 * @access public
 */
class Customize extends CustomizeComponent {

    /**
     * Namespace
     *
     * @since 2.0.0
     * @var string
     */
    public $namespace = __NAMESPACE__;

    /**
     * Panel id
     *
     * @since 2.0.0
     * @var array
     */
    public $panel;

    /**
     * Post type object
     *
     * @since 2.0.0
     * @var object
     */
    public $post_type;

    /**
     * Instantiate the object
     *
     * @since 2.0.0
     * @return void
     */
    public function __construct( $post_type ) {

        $this->post_type    = $post_type;
        $this->panel        = $post_type;

        // Create and store sections for this panel
        array_map( function( $classname ) {
            $classname = sprintf('%s\%s\Section', $this->namespace, $classname);
            $this->section_objects[] = new $classname( $this->panel, $this->post_type );
        }, $this->sections );
    }

    /**
     * Register panels
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function panels( $manager ) {

        $post_type = get_post_type_object( $this->post_type );

        $manager->add_panel( new Custom_Panel( $manager, $this->panel, [
            'title' => $post_type->labels->name,
            'pre_title_label' => __( 'Customizing', 'taproot' ),
            'panel' => 'post-types',
            'priority' => 100
        ]));
    }
}
