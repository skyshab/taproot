<?php
/**
 * Rewrite front build class.
 *
 * Adds the rewrite front path crumbs if a rewrite front is set. The rewrite
 * front is determined based on the base post permalink structure. For example,
 * `/archives/%postname%` will give you a rewrite front of `archives`. Even
 * though this is set for the post permalink structure, archives, other post
 * types, and taxonomies may still use it.
 *
 * @package   HybridBreadcrumbs
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018, Justin Tadlock
 * @link      https://github.com/justintadlock/hybrid-breadcrumbs
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Breadcrumbs\Build;

/**
 * Rewrite front build sub-class.
 *
 * @since  1.0.0
 * @access public
 */
class RewriteFront extends Base {

	/**
	 * Builds the breadcrumbs.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function make() {
		global $wp_rewrite;

		if ( $wp_rewrite->front ) {

			$this->breadcrumbs->build( 'Path', [
				'path' => $wp_rewrite->front
			] );
		}
	}
}
