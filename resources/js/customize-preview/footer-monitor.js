/**
 * Fixed Footer Monitor
 *
 * This file handles the JavaScript for detecting changes in the height
 * of the footer when "fixed footer" is enabled. This currently only works
 * in Chrome. There is a polyfill, that can be added for advanced support.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */
var taprootFooter = document.querySelector('.app-footer');
if (taprootFooter.classList.contains('app-footer--has-fixed')) {
  var taprootFooterObserver = new ResizeObserver(function () {
    window.dispatchEvent(new Event('resize'));
  });
  taprootFooterObserver.observe(taprootFooter);
}
