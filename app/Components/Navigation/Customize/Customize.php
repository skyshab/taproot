<?php
/**
 * Layout Panel
 *
 * This class is used to manage the layout panel and add its sections
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation\Customize;

use Taproot\Customize\Abstracts\Component as CustomizeComponent;

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
    public $panel = 'navigation';

    /**
     * Register panels
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function panels($manager) {

        $manager->add_panel( $this->panel, [
            'title'     => __( 'Navigation', 'taproot' ),
            'priority'  => 80,
        ]);
    }

    /**
     * Adjust menu panel priority
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function customize_register_after($manager) {

        // Change menus priority to be after navigation
        if( $manager->get_panel( 'nav_menus' ) ) {
            $manager->get_panel( 'nav_menus' )->priority = 90;
        }
    }
}
