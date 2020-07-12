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

namespace Taproot\Customize\Panels\Entry;

use Taproot\Customize\Abstracts\Panel;
use Rootstrap_Custom_Panel as Custom_Panel;

/**
 * Extend Panel class
 *
 * @since  2.0.0
 * @access public
 */
class Entry extends Panel {

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
    public $panel = 'entry';

    /**
     * Sections to load
     *
     * @since 2.0.0
     * @var array
     */
    public $sections = [
        'Title',
        'Byline',
        'Link',
        'Excerpt'
    ];

    /**
     * Register panels
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function panels( $manager ) {

        $manager->add_panel( new Custom_Panel( $manager, $this->panel, [
            'title' => __( 'Archive Entry', 'taproot' ),
            'pre_title_label' => __( 'Customizing', 'taproot' ),
            'panel' => "post-type-{$this->post_type}"
        ]));
    }
}
