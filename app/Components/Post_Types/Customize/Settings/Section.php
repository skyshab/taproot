<?php
/**
 * Section.
 *
 * This class handles the customizer section for the post type settings.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Post_Types\Customize\Settings;

use Taproot\Customize\Abstracts\Section as SectionAbstract;

/**
 * Extend the Customize Section class
 *
 * @since  2.0.0
 * @access public
 */
class Section extends SectionAbstract {

    /**
     * Section namespace
     *
     * @since 2.0.0
     * @var string
     */
    public $namespace = __NAMESPACE__;

    /**
     * Section ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'settings';

    /**
     * Section Title
     *
     * @since 2.0.0
     * @var string
     */
    public $title = 'Settings';

    /**
     * Controls
     *
     * @since 2.0.0
     * @var array
     */
    public $controls = ['Enable'];
}
