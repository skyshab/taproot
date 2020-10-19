<?php
/**
 * Fallback Footer Template
 *
 * This file is provided as a fallback for plugins that
 * directly call the footer template on plugin pages.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

 Hybrid\View\display( 'footer', Hybrid\Template\hierarchy() );