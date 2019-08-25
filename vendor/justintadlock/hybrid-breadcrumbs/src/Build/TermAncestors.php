<?php
/**
 * Term ancestors build class.
 *
 * Builds breadcrumbs based on whether a term has a parent post. It loops
 * through each term until a parent term is no longer found.
 *
 * @package   HybridBreadcrumbs
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018, Justin Tadlock
 * @link      https://github.com/justintadlock/hybrid-breadcrumbs
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Breadcrumbs\Build;

/**
 * Term ancestors build sub-class.
 *
 * @since  1.0.0
 * @access public
 */
class TermAncestors extends Base {

	/**
	 * Term object.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    \WP_Term
	 */
	protected $term;

	/**
	 * Builds the breadcrumbs.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function make() {

		$term_id  = $this->term->parent;
		$taxonomy = $this->term->taxonomy;
		$parents  = [];

		while ( $term_id ) {

			// Get the parent term.
			$term = get_term( $term_id, $taxonomy );

			// Add the term link to the array of parent terms.
			$parents[] = $term;

			// Set the parent term's parent as the parent ID.
			$term_id = $term->parent;
		}

		// If we have parent terms, reverse the array to put them in the
		// proper order for the trail.
		if ( $parents ) {

			array_map( function( $parent ) {

				$this->breadcrumbs->crumb( 'Term', [ 'term' => $parent ] );

			}, array_reverse( $parents ) );
		}
	}
}
