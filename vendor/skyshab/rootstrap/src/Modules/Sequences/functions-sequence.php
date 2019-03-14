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

namespace Rootstrap\Modules\Sequences;

/**
 * Create a Sequences instance.
 *
 * @since  1.0.0
 * @access public
 * @param  object   $wp_customize
 * @param  array    $args
 * @return void
 */
function sequence( $wp_customize, $args ) {
    $sequence = new Sequence( $wp_customize, $args );
}
