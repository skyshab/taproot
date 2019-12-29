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

namespace Taproot\Components\Post_Types\Customize\Single;

use Taproot\Components\Post_Types\Customize\Abstracts\Component as CustomizeComponent;

/**
 * Extend CustomizeComponent class
 *
 * @since  2.0.0
 * @access public
 */
class Customize_Hierarchical extends CustomizeComponent {

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
     * Sections to load
     *
     * @since 2.0.0
     * @var array
     */
    public $sections = [
        'Layout',
        'Title',
        'Breadcrumbs',
    ];

    /**
     * Initialize the object
     *
     * @since 2.0.0
     * @return void
     */
    public function __construct( $post_type ) {

        $this->post_type    = $post_type;
        $this->panel        = $post_type;

        // Create and store sections for this panel
        array_map( function($classname) {
            $classname = sprintf('%s\%s\Section', $this->namespace, $classname);
            $this->section_objects[] = new $classname( $this->panel, $this->post_type );
        }, $this->sections );
    }
}
