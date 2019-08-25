<?php
/**
 * Month query class.
 *
 * Called to build breadcrumbs on monthly archive pages.
 *
 * @package   HybridBreadcrumbs
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018, Justin Tadlock
 * @link      https://github.com/justintadlock/hybrid-breadcrumbs
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Breadcrumbs\Query;

/**
 * Month query sub-class.
 *
 * @since  1.0.0
 * @access public
 */
class Month extends Base {

	/**
	 * Builds the breadcrumbs.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function make() {

		// Build network crumbs.
		$this->breadcrumbs->build( 'Network' );

		// Add site home crumb.
		$this->breadcrumbs->crumb( 'Home' );

		// Build rewrite front crumbs.
		$this->breadcrumbs->build( 'RewriteFront' );

		// Add year and month crumbs.
		$this->breadcrumbs->crumb( 'Year' );
		$this->breadcrumbs->crumb( 'Month' );

		// Build paged crumbs.
		$this->breadcrumbs->build( 'Paged' );
	}
}
