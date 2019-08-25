<?php
/**
 * Author query class.
 *
 * Called to build breadcrumbs on author archive pages.
 *
 * @package   HybridBreadcrumbs
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018, Justin Tadlock
 * @link      https://github.com/justintadlock/hybrid-breadcrumbs
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Breadcrumbs\Query;

use WP_User;

/**
 * Author query sub-class.
 *
 * @since  1.0.0
 * @access public
 */
class Author extends Base {

	/**
	 * User object.
	 *
	 * @since  1.2.0
	 * @access protected
	 * @var    \WP_User
	 */
	protected $user;

	/**
	 * Builds the breadcrumbs.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function make() {
		global $wp_rewrite;

		$user = $this->user ?: new WP_User( get_query_var( 'author' ) );

		// Build network crumbs.
		$this->breadcrumbs->build( 'Network' );

		// Add site home crumb.
		$this->breadcrumbs->crumb( 'Home' );

		// Build rewrite front crumbs.
		$this->breadcrumbs->build( 'RewriteFront' );

		// If $author_base exists, check for parent pages.
		if ( ! empty( $wp_rewrite->author_base ) ) {

			$this->breadcrumbs->build( 'Path', [
				'page' => $wp_rewrite->author_base
			] );
		}

		// Add author crumb.
		$this->breadcrumbs->crumb( 'Author', [ 'user' => $user ] );
	}
}
