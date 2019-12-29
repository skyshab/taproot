<?php
/**
 * Layout Panel
 *
 * This class is used to manage the layout panel and add its sections
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Layout\Customize;

use Taproot\Customize\Abstracts\Component as CustomizeComponent;

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
    public $panel = 'layout';

    /**
     * Sections to load
     *
     * @since 2.0.0
     * @var array
     */
    public $sections = [
        'Boxed',
        'Container',
        'Content'
    ];

    /**
     * Register panels
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function panels($manager) {

        $manager->add_panel( $this->panel, [
            'title' => __( 'Layout', 'taproot' ),
            'priority' => 20,
        ]);
    }
}
