<?php
/**
 * Home crumb class.
 *
 * Creates the home crumb.
 *
 * @package   HybridBreadcrumbs
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018, Justin Tadlock
 * @link      https://github.com/justintadlock/hybrid-breadcrumbs
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Breadcrumbs;

use Hybrid\Breadcrumbs\Crumb\Home;

/**
 * Home crumb sub-class.
 *
 * @since  1.0.0
 * @access public
 */
class Crumb_Home extends Home {

	/**
	 * Returns a label for the crumb.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function label() {

        return apply_filters( 'taproot/breadcrumbs/home/label', parent::label(), get_queried_object() );
	}

	/**
	 * Returns a URL for the crumb.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function url() {

        return apply_filters( 'taproot/breadcrumbs/home/url', parent::url(), get_queried_object() );
	}
}
