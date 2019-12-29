<?php
/**
 * Section Class.
 *
 * This class handles a customizer section.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Pagination\Customize\Pagination;

use Taproot\Customize\Abstracts\Section as SectionAbstract;

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
    public $name = 'pagination';

    /**
     * Section Title
     *
     * @since 2.0.0
     * @var string
     */
    public $title = 'Pagination';

    /**
     * Controls
     *
     * @since 2.0.0
     * @var array
     */
    public $controls = [
        'Font_Size',
        'Is_Rounded',
        'Spacing',
        'Background_Color',
        'Link_Color',
        'Text_Color',
    ];
}
