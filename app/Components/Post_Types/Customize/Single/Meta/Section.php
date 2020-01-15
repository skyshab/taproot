<?php
/**
 * Section Class.
 *
 * This class handles a customizer section.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Post_Types\Customize\Single\Meta;

use Taproot\Components\Post_Types\Customize\Abstracts\Section as SectionAbstract;

/**
 * Extend the Section abstract class.
 *
 * @since  2.0.0
 * @access public
 */
class Section extends SectionAbstract {

    /**
     * Section namespace
     *
     * @since 2.0.0
     * @var int
     */
    public $namespace = __NAMESPACE__;

    /**
     * Section ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'meta';

    /**
     * Section Title
     *
     * @since 2.0.0
     * @var string
     */
    public $title = 'Meta';

    /**
     * Controls
     *
     * @since 2.0.0
     * @var array
     */
    public $controls = [
        'Text_Color',
        'Icon_Color',
        'Font_Size'
    ];
}
