<?php
/**
 * Section.
 *
 * This class handles functionality for a customizer section.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Footer\Customize\Widgets;

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
     * @var int
     */
    public $namespace = __NAMESPACE__;

    /**
     * Section ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'widgets';

    /**
     * Section Title
     *
     * @since 2.0.0
     * @var string
     */
    public $title = 'Footer Widgets';

    /**
     * Controls
     *
     * @since 2.0.0
     * @var array
     */
    public $controls = [
        'Layout',
        'Heading_Color',
        'Text_Color',
        'Link_Color',
        'Link_Color_Hover',
        'Font_Size',
        'Line_Height',
        'Title_Font_Size',
        'Title_Line_Height',
        'Gutter'
    ];
}
