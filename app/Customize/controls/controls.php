<?php
/**
 * Load our custom Customize Controls
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

$custom_controls = [
    'Range',
    'Color',
    'Group_Title',
    'Font_Styles'    
];

foreach ( $custom_controls as $control ) {
    include_once $control . '.php';
}
