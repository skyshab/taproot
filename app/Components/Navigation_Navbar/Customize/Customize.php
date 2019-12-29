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

namespace Taproot\Components\Navigation_Navbar\Customize;

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
    public $panel = 'navigation';

    /**
     * Sections to load
     *
     * @since 2.0.0
     * @var array
     */
    public $sections = [
        'Navbar',
        'Navbar_Mobile',
        'Navbar_Fixed'
    ];

    /**
     * Register tabs
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function tabs($tabs) {

        $tabs[] = [
            'title' => __('Navbar', 'taproot'),
            'sections' => [
                'navigation--navbar'        => [ 'label' => 'default', 'hide' => false ],
                'navigation--navbar-mobile' => [ 'label' => 'mobile', 'hide' => true ],
                'navigation--navbar-fixed'  => [ 'label' => 'fixed', 'hide' => true ],
            ]
        ];

        return $tabs;
    }
}
