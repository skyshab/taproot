<?php
/**
 * Tabs functions.
 *
 * Helper functions related to tabs.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Modules\Tabs;

use Rootstrap\Modules\Tabs\Tabs;


/**
 * Create a Tabs instance.
 *
 * @since  1.0.0
 * @access public
 * @param  object   $wp_customize
 * @param  array    $args
 * @return void
 */
function tabs( $wp_customize, $args ) {
    $tabs = new Tabs( $wp_customize, $args );
}