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

namespace Taproot\Components\Post_Types\Customize;

use Taproot\Customize\Abstracts\Component as CustomizeComponent;
use Rootstrap_Custom_Panel as Custom_Panel;

/**
 * Extend CustomizeComponent class
 *
 * @since  2.0.0
 * @access public
 */
class Customize extends CustomizeComponent {

    /**
     * Panel id
     *
     * @since 2.0.0
     * @var array
     */
    public $panel = 'post-types';

    /**
     * Register Primary Post Types Panel
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function panels( $manager ) {

        $manager->add_panel( new Custom_Panel( $manager, $this->panel, [
            'title'     => __( 'Post Types', 'taproot' ),
            'priority'  => 70,
        ]));
    }
}
