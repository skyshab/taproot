<?php
/**
 * Customize component.
 *
 * This class is used to manage the customizer panels, sections and controls for a component.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Post_Types\Customize\Archive;

use Taproot\Components\Post_Types\Customize\Abstracts\Component as CustomizeComponent;

use Rootstrap_Custom_Panel as Custom_Panel;

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
    public $panel = 'archive';

    /**
     * Post type object
     *
     * @since 2.0.0
     * @var object
     */
    public $post_type;

    /**
     * Sections to load
     *
     * @since 2.0.0
     * @var array
     */
    public $sections = [
        'Layout',
        'Title'
    ];

    /**
     * Register panels
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function panels($manager) {

        $post_type = get_post_type_object( $this->post_type );

        $manager->add_panel( new Custom_Panel( $manager, $this->panel, [
            'title' => sprintf( "%s Archive", $post_type->labels->name ),
            'panel' => $this->post_type
        ]));
    }
}
