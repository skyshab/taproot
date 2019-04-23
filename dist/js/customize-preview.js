/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/customize-preview.js":
/*!*******************************************!*\
  !*** ./resources/js/customize-preview.js ***!
  \*******************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _customize_preview_custom_header__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./customize-preview/custom-header */ "./resources/js/customize-preview/custom-header.js");
/* harmony import */ var _customize_preview_custom_header__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_customize_preview_custom_header__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var customize_preview_functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! customize-preview/functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/* harmony import */ var _customize_preview_panels_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./customize-preview/panels.js */ "./resources/js/customize-preview/panels.js");
/* harmony import */ var _customize_preview_footer_monitor_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./customize-preview/footer-monitor.js */ "./resources/js/customize-preview/footer-monitor.js");
/* harmony import */ var _customize_preview_footer_monitor_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_customize_preview_footer_monitor_js__WEBPACK_IMPORTED_MODULE_3__);
/**
 * Customize preview script.
 *
 * This file handles the JavaScript for the live preview frame in the customizer.
 * Any includes or imports should be handled in this file. The final result gets
 * saved back into `dist/js/customize-preview.js`.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */





/***/ }),

/***/ "./resources/js/customize-preview/custom-header.js":
/*!*********************************************************!*\
  !*** ./resources/js/customize-preview/custom-header.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Custom header preview.
 *
 * This file handles the JavaScript for the live preview of the `custom-header`
 * feature in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */
// Site title.
wp.customize('blogname', function (value) {
  value.bind(function (to) {
    document.querySelector('.app-header__title-link').textContent = to;
  });
}); // Site description.

wp.customize('blogdescription', function (value) {
  value.bind(function (to) {
    document.querySelector('.app-header__description').textContent = to;
  });
}); // Header text color.

wp.customize('header_textcolor', function (value) {
  value.bind(function (to) {
    var headerItems = document.querySelectorAll('.app-header__title-link, .app-header__description');
    headerItems.forEach(function (text) {
      if ('blank' === to) {
        text.style.clip = 'rect(0 0 0 0)';
        text.style.position = 'absolute';
      } else {
        text.style.clip = null;
        text.style.position = null;
        text.style.color = to;
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/footer-monitor.js":
/*!**********************************************************!*\
  !*** ./resources/js/customize-preview/footer-monitor.js ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Fixed Footer Monitor
 *
 * This file handles the JavaScript for detecting changes in the height
 * of the footer when "fixed footer" is enabled. This currently only works
 * in Chrome. There is a polyfill, that can be added for advanced support.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
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

/***/ }),

/***/ "./resources/js/customize-preview/functions-customize-preview.js":
/*!***********************************************************************!*\
  !*** ./resources/js/customize-preview/functions-customize-preview.js ***!
  \***********************************************************************/
/*! exports provided: taprootFontStyles, getMobileScreen, getDesktopScreen, getPaddingFromWidth */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "taprootFontStyles", function() { return taprootFontStyles; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getMobileScreen", function() { return getMobileScreen; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getDesktopScreen", function() { return getDesktopScreen; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getPaddingFromWidth", function() { return getPaddingFromWidth; });
/**
 * Utility functions for use in customize preview js.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// build font style from our font style control values
function taprootFontStyles(value) {
  var fontStyles = value.split('|'),
      styles = {},
      $ = jQuery.noConflict();

  if (0 <= $.inArray('bold', fontStyles)) {
    styles['font-weight'] = 'bold';
  }

  if (0 <= $.inArray('italic', fontStyles)) {
    styles['font-style'] = 'italic';
  }

  if (0 <= $.inArray('underline', fontStyles)) {
    styles['text-decoration'] = 'underline';
  }

  if (0 <= $.inArray('uppercase', fontStyles)) {
    styles['text-transform'] = 'uppercase';
  } else if (0 <= $.inArray('capitalize', fontStyles)) {
    styles['text-transform'] = 'capitalize';
  }

  return styles;
}
; // Get mobile screen from setting value

function getMobileScreen() {
  var screen = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'default';
  return 'never' === screen ? false : screen;
} // Get Desktop screen from mobile setting value

function getDesktopScreen() {
  var screen = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'default';
  var screens = {
    'never': 'default',
    'mobile': 'tablet-and-up',
    'tablet-and-under': 'desktop',
    'always': false
  };
  return screens[screen] ? screens[screen] : false;
} // calculate padding from a width

function getPaddingFromWidth(width) {
  var unit = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
  width = width.replace(/[^0-9]/g, '');
  var padding = (100 - width) / 2;

  if (unit) {
    padding += unit;
  }

  return padding;
}

/***/ }),

/***/ "./resources/js/customize-preview/panels.js":
/*!**************************************************!*\
  !*** ./resources/js/customize-preview/panels.js ***!
  \**************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _panels_site_identity_panel_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./panels/site-identity/panel.js */ "./resources/js/customize-preview/panels/site-identity/panel.js");
/* harmony import */ var _panels_site_identity_panel_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_panels_site_identity_panel_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _panels_general_panel_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./panels/general/panel.js */ "./resources/js/customize-preview/panels/general/panel.js");
/* harmony import */ var _panels_layout_panel_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./panels/layout/panel.js */ "./resources/js/customize-preview/panels/layout/panel.js");
/* harmony import */ var _panels_header_panel_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./panels/header/panel.js */ "./resources/js/customize-preview/panels/header/panel.js");
/* harmony import */ var _panels_branding_panel_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./panels/branding/panel.js */ "./resources/js/customize-preview/panels/branding/panel.js");
/* harmony import */ var _panels_typography_panel_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./panels/typography/panel.js */ "./resources/js/customize-preview/panels/typography/panel.js");
/* harmony import */ var _panels_colors_panel_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./panels/colors/panel.js */ "./resources/js/customize-preview/panels/colors/panel.js");
/* harmony import */ var _panels_elements_panel_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./panels/elements/panel.js */ "./resources/js/customize-preview/panels/elements/panel.js");
/* harmony import */ var _panels_blog_panel_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./panels/blog/panel.js */ "./resources/js/customize-preview/panels/blog/panel.js");
/* harmony import */ var _panels_posts_panel_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./panels/posts/panel.js */ "./resources/js/customize-preview/panels/posts/panel.js");
/* harmony import */ var _panels_pages_panel_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./panels/pages/panel.js */ "./resources/js/customize-preview/panels/pages/panel.js");
/* harmony import */ var _panels_footer_panel_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./panels/footer/panel.js */ "./resources/js/customize-preview/panels/footer/panel.js");
/* harmony import */ var _panels_nav_panel_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./panels/nav/panel.js */ "./resources/js/customize-preview/panels/nav/panel.js");
/**
 * Add customizer panel js.
 *
 * This file contains the js functionality for the customizer preview.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */














/***/ }),

/***/ "./resources/js/customize-preview/panels/blog/archive-link/preview.js":
/*!****************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/blog/archive-link/preview.js ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Link Font Size
wp.customize('blog--archive-link--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'blog--archive-link--font-size',
      value: to
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/blog/archive-meta/preview.js":
/*!****************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/blog/archive-meta/preview.js ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Meta Color
wp.customize('blog--archive-meta--color', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'blog--archive-meta--color',
      value: to
    });
  });
}); // Meta Icon Color

wp.customize('blog--archive-meta--icon--color', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'blog--archive-meta--icon--color',
      value: to
    });
  });
}); // Meta Font Size

wp.customize('blog--archive-meta--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'blog--archive-meta--font-size',
      selector: '.entry__byline--archive',
      styles: {
        'font-size': to
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/blog/archive-title/preview.js":
/*!*****************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/blog/archive-title/preview.js ***!
  \*****************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Blog Title Color

wp.customize('blog--archive-title--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'blog--archive-title--color',
      selector: '.entry__title--archive',
      styles: {
        color: to
      }
    });
  });
}); // Blog Title Color: Hover

wp.customize('blog--archive-title--color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'blog--archive-title--color--hover',
      selector: '.entry__title--archive:hover',
      styles: {
        color: to
      }
    });
  });
}); // Blog Title Font Size

wp.customize('blog--archive-title--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'blog--archive-title--font-size',
      selector: '.entry__title--archive',
      styles: {
        'font-size': to
      }
    });
  });
}); // Font Styles

wp.customize('blog--archive-title--font-styles', function (value) {
  value.bind(function (to) {
    var headingsStyles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'blog--archive-title--font-styles',
      selector: '.entry__title--archive',
      styles: headingsStyles
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/blog/pagination-hover/preview.js":
/*!********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/blog/pagination-hover/preview.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Blog Pagination Color Hover
wp.customize('blog--pagination-hover--link--color', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'blog--pagination-hover--link--color',
      value: to
    });
  });
}); // Blog Pagination Background Color Hover

wp.customize('blog--pagination-hover--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'blog--pagination-hover--background-color',
      value: to
    });
  });
}); // Blog Pagination Numbers Color Hover

wp.customize('blog--pagination-hover--color', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'blog--pagination-hover--color',
      value: to
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/blog/pagination/preview.js":
/*!**************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/blog/pagination/preview.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Blog Pagination Size
wp.customize('blog--pagination--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'blog--pagination--font-size',
      selector: '.pagination__item',
      styles: {
        'font-size': to
      }
    });
  });
}); // Blog Pagination Spacing

wp.customize('blog--pagination--spacing', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'blog--pagination--spacing',
      selector: '.pagination__item',
      styles: {
        'margin-left': to,
        'margin-right': to
      }
    });
  });
}); // Blog Pagination Spacing

wp.customize('blog--pagination--rounded', function (value) {
  value.bind(function (to) {
    if (to) {
      $('.pagination__items').addClass('pagination__items--rounded');
    } else {
      $('.pagination__items').removeClass('pagination__items--rounded');
    }
  });
}); // Blog Pagination Link Color

wp.customize('blog--pagination--link--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'blog--pagination--font-size',
      selector: '.pagination__item--prev .pagination__anchor, .pagination__item--next .pagination__anchor',
      styles: {
        'color': to
      }
    });
  });
}); // Blog Pagination Background Color

wp.customize('blog--pagination--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'blog--pagination--background-color',
      selector: '.pagination__item--prev .pagination__anchor, .pagination__item--next .pagination__anchor',
      styles: {
        'background-color': to
      }
    });
  });
}); // Blog Pagination Numbers Color

wp.customize('blog--pagination--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'blog--pagination--color',
      selector: '.pagination__item--number .pagination__anchor, .pagination__item--dots .pagination__anchor',
      styles: {
        'color': to
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/blog/panel.js":
/*!*************************************************************!*\
  !*** ./resources/js/customize-preview/panels/blog/panel.js ***!
  \*************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _title_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./title/preview.js */ "./resources/js/customize-preview/panels/blog/title/preview.js");
/* harmony import */ var _title_mobile_preview_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./title-mobile/preview.js */ "./resources/js/customize-preview/panels/blog/title-mobile/preview.js");
/* harmony import */ var _title_mobile_preview_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_title_mobile_preview_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _title_tablet_preview_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./title-tablet/preview.js */ "./resources/js/customize-preview/panels/blog/title-tablet/preview.js");
/* harmony import */ var _title_tablet_preview_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_title_tablet_preview_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _title_desktop_preview_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./title-desktop/preview.js */ "./resources/js/customize-preview/panels/blog/title-desktop/preview.js");
/* harmony import */ var _title_desktop_preview_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_title_desktop_preview_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _archive_title_preview_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./archive-title/preview.js */ "./resources/js/customize-preview/panels/blog/archive-title/preview.js");
/* harmony import */ var _archive_meta_preview_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./archive-meta/preview.js */ "./resources/js/customize-preview/panels/blog/archive-meta/preview.js");
/* harmony import */ var _archive_meta_preview_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_archive_meta_preview_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _archive_link_preview_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./archive-link/preview.js */ "./resources/js/customize-preview/panels/blog/archive-link/preview.js");
/* harmony import */ var _archive_link_preview_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_archive_link_preview_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _pagination_preview_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./pagination/preview.js */ "./resources/js/customize-preview/panels/blog/pagination/preview.js");
/* harmony import */ var _pagination_preview_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_pagination_preview_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _pagination_hover_preview_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./pagination-hover/preview.js */ "./resources/js/customize-preview/panels/blog/pagination-hover/preview.js");
/* harmony import */ var _pagination_hover_preview_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_pagination_hover_preview_js__WEBPACK_IMPORTED_MODULE_8__);
/**
 * Add customizer panel js.
 *
 * This file contains the js functionality for the customizer preview.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */










/***/ }),

/***/ "./resources/js/customize-preview/panels/blog/title-desktop/preview.js":
/*!*****************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/blog/title-desktop/preview.js ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('blog--title-desktop--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'blog--title--font-size',
      value: to,
      screen: 'desktop'
    });
  });
}); // Line Height

wp.customize('blog--title-desktop--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'blog--title--line-height',
      value: to,
      screen: 'desktop'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/blog/title-mobile/preview.js":
/*!****************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/blog/title-mobile/preview.js ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('blog--title-mobile--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'blog--title--font-size',
      value: to,
      screen: 'default'
    });
  });
}); // Line Height

wp.customize('blog--title-mobile--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'blog--title--line-height',
      value: to,
      screen: 'default'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/blog/title-tablet/preview.js":
/*!****************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/blog/title-tablet/preview.js ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('blog--title-tablet--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'blog--title--font-size',
      value: to,
      screen: 'tablet-and-up'
    });
  });
}); // Line Height

wp.customize('blog--title-tablet--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'blog--title--line-height',
      value: to,
      screen: 'tablet-and-up'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/blog/title/preview.js":
/*!*********************************************************************!*\
  !*** ./resources/js/customize-preview/panels/blog/title/preview.js ***!
  \*********************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Blog Title Color

wp.customize('blog--title--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'blog--title--color',
      selector: '.archive-header__title',
      styles: {
        color: to
      }
    });
  });
}); // Font Styles

wp.customize('blog--title--font-styles', function (value) {
  value.bind(function (to) {
    var styles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'blog--title--font-styles',
      selector: '.archive-header__title',
      styles: styles
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/layout-desktop/preview.js":
/*!**********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/layout-desktop/preview.js ***!
  \**********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Layout
wp.customize('branding--layout-desktop--layout', function (value) {
  value.bind(function (to) {
    if ('horizontal' === to) {
      $('.app-header').removeClass('app-header--desktop--vertical').addClass('app-header--desktop--horizontal');
    } else if ('vertical' === to) {
      $('.app-header').removeClass('app-header--desktop--horizontal').addClass('app-header--desktop--vertical');
    }
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/layout-mobile/preview.js":
/*!*********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/layout-mobile/preview.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Layout
wp.customize('branding--layout-mobile--layout', function (value) {
  value.bind(function (to) {
    if ('horizontal' === to) {
      $('.app-header').removeClass('app-header--mobile--vertical').addClass('app-header--mobile--horizontal');
    } else if ('vertical' === to) {
      $('.app-header').removeClass('app-header--mobile--horizontal').addClass('app-header--mobile--vertical');
    }
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/layout-tablet/preview.js":
/*!*********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/layout-tablet/preview.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Layout
wp.customize('branding--layout-tablet--layout', function (value) {
  value.bind(function (to) {
    if ('horizontal' === to) {
      $('.app-header').removeClass('app-header--tablet--vertical').addClass('app-header--tablet--horizontal');
    } else if ('vertical' === to) {
      $('.app-header').removeClass('app-header--tablet--horizontal').addClass('app-header--tablet--vertical');
    }
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/logo-desktop/preview.js":
/*!********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/logo-desktop/preview.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Logo width
wp.customize('branding--logo-desktop--width', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--logo--width',
      value: to,
      screen: 'desktop'
    });
  });
}); // Logo gutter

wp.customize('branding--logo-desktop--gutter', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--logo--gutter',
      value: to,
      screen: 'desktop'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/logo-fixed/preview.js":
/*!******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/logo-fixed/preview.js ***!
  \******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Hide When Fixed?
wp.customize('nav--logo-fixed--hide', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--logo-fixed--hide',
      selector: '.app-header--fixed  .app-header__logo-link',
      styles: {
        'display': 'none'
      },
      screen: 'desktop',
      callback: to
    });
  });
}); // Logo width

wp.customize('branding--logo-fixed--width', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'branding--logo-fixed--width',
      screen: 'desktop',
      selector: '.app-header--fixed  .app-header__logo-link',
      styles: {
        'width': to
      }
    });
  });
}); // Logo gutter

wp.customize('branding--logo-fixed--gutter', function (value) {
  value.bind(function (to) {
    var layout = wp.customize.instance('branding--layout-desktop--layout').get();
    var styles = {};

    if ('horizontal' === layout) {
      styles['margin'] = to ? "0 ".concat(to, " 0 0") : false;
    } else {
      styles['margin'] = to ? "0 0 ".concat(to, " 0") : false;
    }

    rootstrap.style({
      id: 'branding--logo-fixed--gutter',
      screen: 'desktop',
      selector: '.app-header--fixed  .app-header__logo-link',
      styles: styles
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/logo-mobile/preview.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/logo-mobile/preview.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Logo width
wp.customize('branding--logo-mobile--width', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--logo--width',
      value: to,
      screen: 'default'
    });
  });
}); // Logo gutter

wp.customize('branding--logo-mobile--gutter', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--logo--gutter',
      value: to,
      screen: 'default'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/logo-tablet/preview.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/logo-tablet/preview.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Logo width
wp.customize('branding--logo-tablet--width', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--logo--width',
      value: to,
      screen: 'tablet-and-up'
    });
  });
}); // Logo gutter

wp.customize('branding--logo-tablet--gutter', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--logo--gutter',
      value: to,
      screen: 'tablet-and-up'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/logo/preview.js":
/*!************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/logo/preview.js ***!
  \************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Logo image
wp.customize('branding--logo--image', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'branding--logo--image',
      selector: '.branding',
      styles: {
        'flex-direction': to
      },
      screen: 'mobile'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/panel.js":
/*!*****************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/panel.js ***!
  \*****************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _layout_mobile_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./layout-mobile/preview.js */ "./resources/js/customize-preview/panels/branding/layout-mobile/preview.js");
/* harmony import */ var _layout_mobile_preview_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_layout_mobile_preview_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _layout_tablet_preview_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./layout-tablet/preview.js */ "./resources/js/customize-preview/panels/branding/layout-tablet/preview.js");
/* harmony import */ var _layout_tablet_preview_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_layout_tablet_preview_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _layout_desktop_preview_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./layout-desktop/preview.js */ "./resources/js/customize-preview/panels/branding/layout-desktop/preview.js");
/* harmony import */ var _layout_desktop_preview_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_layout_desktop_preview_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _logo_preview_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./logo/preview.js */ "./resources/js/customize-preview/panels/branding/logo/preview.js");
/* harmony import */ var _logo_preview_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_logo_preview_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _logo_mobile_preview_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./logo-mobile/preview.js */ "./resources/js/customize-preview/panels/branding/logo-mobile/preview.js");
/* harmony import */ var _logo_mobile_preview_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_logo_mobile_preview_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _logo_tablet_preview_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./logo-tablet/preview.js */ "./resources/js/customize-preview/panels/branding/logo-tablet/preview.js");
/* harmony import */ var _logo_tablet_preview_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_logo_tablet_preview_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _logo_desktop_preview_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./logo-desktop/preview.js */ "./resources/js/customize-preview/panels/branding/logo-desktop/preview.js");
/* harmony import */ var _logo_desktop_preview_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_logo_desktop_preview_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _logo_fixed_preview_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./logo-fixed/preview.js */ "./resources/js/customize-preview/panels/branding/logo-fixed/preview.js");
/* harmony import */ var _logo_fixed_preview_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_logo_fixed_preview_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _title_preview_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./title/preview.js */ "./resources/js/customize-preview/panels/branding/title/preview.js");
/* harmony import */ var _title_mobile_preview_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./title-mobile/preview.js */ "./resources/js/customize-preview/panels/branding/title-mobile/preview.js");
/* harmony import */ var _title_mobile_preview_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_title_mobile_preview_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _title_tablet_preview_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./title-tablet/preview.js */ "./resources/js/customize-preview/panels/branding/title-tablet/preview.js");
/* harmony import */ var _title_tablet_preview_js__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_title_tablet_preview_js__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var _title_desktop_preview_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./title-desktop/preview.js */ "./resources/js/customize-preview/panels/branding/title-desktop/preview.js");
/* harmony import */ var _title_desktop_preview_js__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_title_desktop_preview_js__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var _title_fixed_preview_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./title-fixed/preview.js */ "./resources/js/customize-preview/panels/branding/title-fixed/preview.js");
/* harmony import */ var _title_fixed_preview_js__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_title_fixed_preview_js__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var _tagline_preview_js__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./tagline/preview.js */ "./resources/js/customize-preview/panels/branding/tagline/preview.js");
/* harmony import */ var _tagline_mobile_preview_js__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./tagline-mobile/preview.js */ "./resources/js/customize-preview/panels/branding/tagline-mobile/preview.js");
/* harmony import */ var _tagline_mobile_preview_js__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(_tagline_mobile_preview_js__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var _tagline_tablet_preview_js__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ./tagline-tablet/preview.js */ "./resources/js/customize-preview/panels/branding/tagline-tablet/preview.js");
/* harmony import */ var _tagline_tablet_preview_js__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(_tagline_tablet_preview_js__WEBPACK_IMPORTED_MODULE_15__);
/* harmony import */ var _tagline_desktop_preview_js__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ./tagline-desktop/preview.js */ "./resources/js/customize-preview/panels/branding/tagline-desktop/preview.js");
/* harmony import */ var _tagline_desktop_preview_js__WEBPACK_IMPORTED_MODULE_16___default = /*#__PURE__*/__webpack_require__.n(_tagline_desktop_preview_js__WEBPACK_IMPORTED_MODULE_16__);
/* harmony import */ var _tagline_fixed_preview_js__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ./tagline-fixed/preview.js */ "./resources/js/customize-preview/panels/branding/tagline-fixed/preview.js");
/* harmony import */ var _tagline_fixed_preview_js__WEBPACK_IMPORTED_MODULE_17___default = /*#__PURE__*/__webpack_require__.n(_tagline_fixed_preview_js__WEBPACK_IMPORTED_MODULE_17__);
/**
 * Add customizer panel js.
 *
 * This file contains the js functionality for the customizer preview.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */



















/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/tagline-desktop/preview.js":
/*!***********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/tagline-desktop/preview.js ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('branding--tagline-desktop--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--tagline--font-size',
      value: to,
      screen: 'desktop'
    });
  });
}); // Line Height

wp.customize('branding--tagline-desktop--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--tagline--line-height',
      value: to,
      screen: 'desktop'
    });
  });
}); // Gutter

wp.customize('branding--tagline-desktop--gutter', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--tagline--gutter',
      value: to,
      screen: 'desktop'
    });
  });
}); // Hide tagline

wp.customize('branding--tagline-desktop--hide-tagline', function (value) {
  value.bind(function (to) {
    var taglineDisplay = to ? 'none' : 'inline-block';
    rootstrap.style({
      id: 'branding--tagline-desktop--hide-tagline',
      selector: '.app-header__description',
      styles: {
        'display': taglineDisplay
      },
      screen: 'desktop'
    }); // title styles - center title

    var titleStyles = to ? {
      'grid-row-end': 'span 2',
      'align-self': 'center'
    } : {
      'grid-row-end': '2',
      'align-self': 'end'
    };
    rootstrap.style({
      id: 'branding--tagline-desktop--hide-tagline--title',
      selector: '.app-header__title',
      styles: titleStyles,
      screen: 'desktop'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/tagline-fixed/preview.js":
/*!*********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/tagline-fixed/preview.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Hide When Fixed?
wp.customize('nav--tagline-fixed--hide', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--tagline-fixed--hide',
      selector: '.app-header--fixed .app-header__description',
      styles: {
        'display': 'none'
      },
      screen: 'desktop',
      callback: to
    });
  });
}); // Font Size

wp.customize('branding--tagline-fixed--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'branding--tagline-fixed--font-size',
      selector: '.app-header--fixed .app-header__description',
      styles: {
        'font-size': to
      },
      screen: 'desktop'
    });
  });
}); // Line Height

wp.customize('branding--tagline-fixed--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'branding--tagline-fixed--line-height',
      selector: '.app-header--fixed .app-header__description',
      styles: {
        'line-height': to
      },
      screen: 'desktop'
    });
  });
}); // Gutter

wp.customize('branding--tagline-fixed--gutter', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'branding--tagline-fixed--gutter',
      selector: '.app-header--fixed .app-header__description',
      styles: {
        'margin-top': to
      },
      screen: 'desktop'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/tagline-mobile/preview.js":
/*!**********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/tagline-mobile/preview.js ***!
  \**********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('branding--tagline-mobile--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--tagline--font-size',
      value: to,
      screen: 'default'
    });
  });
}); // Line Height

wp.customize('branding--tagline-mobile--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--tagline--line-height',
      value: to,
      screen: 'default'
    });
  });
}); // Gutter

wp.customize('branding--tagline-mobile--gutter', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--tagline--gutter',
      value: to,
      screen: 'default'
    });
  });
}); // Hide tagline

wp.customize('branding--tagline-mobile--hide-tagline', function (value) {
  value.bind(function (to) {
    var taglineDisplay = to ? 'none' : 'inline-block';
    rootstrap.style({
      id: 'branding--tagline-mobile--hide-tagline',
      selector: '.app-header__description',
      styles: {
        'display': taglineDisplay
      },
      screen: 'mobile'
    }); // title styles - center title

    var titleStyles = to ? {
      'grid-row-end': 'span 2',
      'align-self': 'center'
    } : {
      'grid-row-end': '2',
      'align-self': 'end'
    };
    rootstrap.style({
      id: 'branding--tagline-mobile--hide-tagline--title',
      selector: '.app-header__title',
      styles: titleStyles,
      screen: 'mobile'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/tagline-tablet/preview.js":
/*!**********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/tagline-tablet/preview.js ***!
  \**********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('branding--tagline-tablet--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--tagline--font-size',
      value: to,
      screen: 'tablet-and-up'
    });
  });
}); // Line Height

wp.customize('branding--tagline-tablet--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--tagline--line-height',
      value: to,
      screen: 'tablet-and-up'
    });
  });
}); // Gutter

wp.customize('branding--tagline-tablet--gutter', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--tagline--gutter',
      value: to,
      screen: 'tablet-and-up'
    });
  });
}); // Hide tagline

wp.customize('branding--tagline-tablet--hide-tagline', function (value) {
  value.bind(function (to) {
    var taglineDisplay = to ? 'none' : 'inline-block';
    rootstrap.style({
      id: 'branding--tagline-tablet--hide-tagline',
      selector: '.app-header__description',
      styles: {
        'display': taglineDisplay
      },
      screen: 'tablet'
    }); // title styles - center title

    var titleStyles = to ? {
      'grid-row-end': 'span 2',
      'align-self': 'center'
    } : {
      'grid-row-end': '2',
      'align-self': 'end'
    };
    rootstrap.style({
      id: 'branding--tagline-tablet--hide-tagline--title',
      selector: '.app-header__title',
      styles: titleStyles,
      screen: 'tablet'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/tagline/preview.js":
/*!***************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/tagline/preview.js ***!
  \***************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Text Color

wp.customize('branding--tagline--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'branding--tagline--color',
      selector: '.app-header__description',
      styles: {
        color: to
      }
    });
  });
}); // Font Family

wp.customize('branding--tagline--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'branding--tagline--color',
      selector: '.app-header__description',
      styles: {
        'font-family': to
      }
    });
  });
}); // Font Styles

wp.customize('branding--tagline--font-styles', function (value) {
  value.bind(function (to) {
    var taglineStyles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'branding--tagline--font-styles',
      selector: '.app-header__description',
      styles: taglineStyles
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/title-desktop/preview.js":
/*!*********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/title-desktop/preview.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('branding--title-desktop--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--title--font-size',
      value: to,
      screen: 'desktop'
    });
  });
}); // Line Height

wp.customize('branding--title-desktop--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--title--line-height',
      value: to,
      screen: 'desktop'
    });
  });
}); // Hide title

wp.customize('branding--title-desktop--hide-title', function (value) {
  value.bind(function (to) {
    var titleDisplay = to ? 'none' : 'inline-block';
    rootstrap.style({
      id: 'branding--title-desktop--hide-title',
      selector: '.app-header__title',
      styles: {
        'display': titleDisplay
      },
      screen: 'desktop'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/title-fixed/preview.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/title-fixed/preview.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Hide When Fixed?
wp.customize('nav--title-fixed--hide', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--title-fixed--hide',
      selector: '.app-header--fixed .app-header__title',
      styles: {
        'display': 'none'
      },
      screen: 'desktop',
      callback: to
    });
  });
}); // Font Size

wp.customize('branding--title-fixed--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'branding--title-fixed--font-size',
      selector: '.app-header--fixed .app-header__title',
      styles: {
        'font-size': to
      },
      screen: 'desktop'
    });
  });
}); // Line Height

wp.customize('branding--title-fixed--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'branding--title-fixed--line-height',
      selector: '.app-header--fixed .app-header__title',
      styles: {
        'line-height': to
      },
      screen: 'desktop'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/title-mobile/preview.js":
/*!********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/title-mobile/preview.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('branding--title-mobile--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--title--font-size',
      value: to,
      screen: 'default'
    });
  });
}); // Line Height

wp.customize('branding--title-mobile--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--title--line-height',
      value: to,
      screen: 'default'
    });
  });
}); // Hide title

wp.customize('branding--title-mobile--hide-title', function (value) {
  value.bind(function (to) {
    var titleDisplay = to ? 'none' : 'inline-block';
    rootstrap.style({
      id: 'branding--title-mobile--hide-title',
      selector: '.app-header__title',
      styles: {
        'display': titleDisplay
      },
      screen: 'mobile'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/title-tablet/preview.js":
/*!********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/title-tablet/preview.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('branding--title-tablet--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--title--font-size',
      value: to,
      screen: 'tablet-and-up'
    });
  });
}); // Line Height

wp.customize('branding--title-tablet--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'branding--title--line-height',
      value: to,
      screen: 'tablet-and-up'
    });
  });
}); // Hide title

wp.customize('branding--title-tablet--hide-title', function (value) {
  value.bind(function (to) {
    var titleDisplay = to ? 'none' : 'inline-block';
    rootstrap.style({
      id: 'branding--title-tablet--hide-title',
      selector: '.app-header__title',
      styles: {
        'display': titleDisplay
      },
      screen: 'tablet'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/branding/title/preview.js":
/*!*************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/branding/title/preview.js ***!
  \*************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Text Color

wp.customize('branding--title--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'branding--title--color',
      selector: '.app-header__title',
      styles: {
        color: to
      }
    });
  });
}); // Font Family

wp.customize('branding--title--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'branding--title--font-family',
      selector: '.app-header__title',
      styles: {
        'font-family': to
      }
    });
  });
}); // Font Styles

wp.customize('branding--title--font-styles', function (value) {
  value.bind(function (to) {
    var titleStyles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'branding--title--font-styles',
      selector: '.app-header__title',
      styles: titleStyles
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/colors/panel.js":
/*!***************************************************************!*\
  !*** ./resources/js/customize-preview/panels/colors/panel.js ***!
  \***************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _theme_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./theme/preview.js */ "./resources/js/customize-preview/panels/colors/theme/preview.js");
/* harmony import */ var _theme_preview_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_theme_preview_js__WEBPACK_IMPORTED_MODULE_0__);
/**
 * Add customizer panel js.
 *
 * This file contains the js functionality for the customizer preview.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


/***/ }),

/***/ "./resources/js/customize-preview/panels/colors/theme/preview.js":
/*!***********************************************************************!*\
  !*** ./resources/js/customize-preview/panels/colors/theme/preview.js ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Text Color
wp.customize('colors--theme--text', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'colors--theme--text',
      value: to
    });
  });
}); // Accent Color

wp.customize('colors--theme--accent', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'colors--theme--accent',
      value: to
    });
  });
}); // Accent Contrast Color

wp.customize('colors--theme--accent-contrast', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'colors--theme--accent-contrast',
      value: to
    });
  });
}); // Meta Color - Light

wp.customize('colors--theme--meta-light', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'colors--theme--meta-light',
      value: to
    });
  });
}); // Meta Color - Medium

wp.customize('colors--theme--meta-medium', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'colors--theme--meta-medium',
      value: to
    });
  });
}); // Meta Color - Dark

wp.customize('colors--theme--meta-dark', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'colors--theme--meta-dark',
      value: to
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/elements/breadcrumbs/preview.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/elements/breadcrumbs/preview.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
//  Breadcrumbs Color
wp.customize('elements--breadcrumbs--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'elements--breadcrumbs--color',
      selector: '.breadcrumbs__crumb',
      styles: {
        'color': to
      }
    });
  });
}); //  Breadcrumbs Color Hover

wp.customize('elements--breadcrumbs--color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'elements--breadcrumbs--color--hover',
      selector: '.breadcrumbs__crumb a:hover',
      styles: {
        'color': to
      }
    });
  });
}); //  Breadcrumbs Font Size

wp.customize('elements--breadcrumbs--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'elements--breadcrumbs--font-size',
      selector: '.breadcrumbs',
      styles: {
        'font-size': to
      }
    });
  });
}); //  Breadcrumbs Align

wp.customize('elements--breadcrumbs--align', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'elements--breadcrumbs--align',
      selector: '.breadcrumbs__trail',
      styles: {
        'justify-content': to
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/elements/buttons-hover/preview.js":
/*!*********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/elements/buttons-hover/preview.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Background Color
wp.customize('elements--buttons--background-color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'elements--buttons--background-color--hover',
      selector: '.taproot-button, .comment-respond__submit, .searchform__submit',
      styles: {
        'background-color': to
      }
    });
  });
}); // Color

wp.customize('elements--buttons---color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'elements--buttons--color--hover',
      selector: '.taproot-button, .comment-respond__submit, .searchform__submit',
      styles: {
        'color': to
      }
    });
  });
}); // Border Color

wp.customize('elements--buttons--border-color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'elements--buttons--border-color--hover',
      selector: '.taproot-button, .comment-respond__submit',
      styles: {
        'border-color': to
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/elements/buttons/preview.js":
/*!***************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/elements/buttons/preview.js ***!
  \***************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Background Color

wp.customize('elements--buttons--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'elements--buttons--background-color',
      selector: '.taproot-button, .comment-respond__submit, .searchform__submit',
      styles: {
        'background-color': to
      }
    });
  });
}); // Color

wp.customize('elements--buttons---color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'elements--buttons--color',
      selector: '.taproot-button:link, .taproot-button:visited, .comment-respond__submit',
      styles: {
        'color': to
      }
    });
  });
}); // Border Color

wp.customize('elements--buttons--border-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'elements--buttons--border-color',
      selector: '.taproot-button, .comment-respond__submit',
      styles: {
        'border-color': to
      }
    });
  });
}); // Border Width

wp.customize('elements--buttons--border-width', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'elements--buttons--border-width',
      selector: '.taproot-button, .comment-respond__submit',
      styles: {
        'border-width': to
      }
    });
  });
}); // Border Radius

wp.customize('elements--buttons--border-radius', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'elements--buttons--border-radius',
      selector: '.taproot-button, .comment-respond__submit',
      styles: {
        'border-radius': to
      }
    });
  });
}); // Line Height

wp.customize('elements--buttons--height', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'elements--buttons--line-height',
      selector: '.taproot-button, .comment-respond__submit',
      styles: {
        'line-height': to
      }
    });
  });
}); // Font Size

wp.customize('elements--buttons--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'elements--buttons--font-size',
      selector: '.taproot-button, .comment-respond__submit',
      styles: {
        'font-size': to
      }
    });
  });
}); // Font Family

wp.customize('elements--buttons--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'elements--buttons--font-family',
      selector: '.taproot-button, .comment-respond__submit',
      styles: {
        'font-family': to
      }
    });
  });
}); // Padding

wp.customize('elements--buttons--padding', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'elements--buttons--padding',
      selector: '.taproot-button, .comment-respond__submit',
      styles: {
        'padding-left': to,
        'padding-right': to
      }
    });
  });
}); // Font Styles

wp.customize('elements--buttons--font-styles', function (value) {
  value.bind(function (to) {
    var buttonStyles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'elements--buttons--font-styles',
      selector: ' input[type="submit"], input[type="reset"], input[type="button"], button, .taproot-button, .comment-respond__submit',
      styles: buttonStyles
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/elements/panel.js":
/*!*****************************************************************!*\
  !*** ./resources/js/customize-preview/panels/elements/panel.js ***!
  \*****************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _buttons_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./buttons/preview.js */ "./resources/js/customize-preview/panels/elements/buttons/preview.js");
/* harmony import */ var _buttons_hover_preview_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./buttons-hover/preview.js */ "./resources/js/customize-preview/panels/elements/buttons-hover/preview.js");
/* harmony import */ var _buttons_hover_preview_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_buttons_hover_preview_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _breadcrumbs_preview_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./breadcrumbs/preview.js */ "./resources/js/customize-preview/panels/elements/breadcrumbs/preview.js");
/* harmony import */ var _breadcrumbs_preview_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_breadcrumbs_preview_js__WEBPACK_IMPORTED_MODULE_2__);
/**
 * Add customizer panel js.
 *
 * This file contains the js functionality for the customizer preview.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */




/***/ }),

/***/ "./resources/js/customize-preview/panels/footer/bottom-bar/preview.js":
/*!****************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/footer/bottom-bar/preview.js ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Bottom Bar Background Color
wp.customize('footer--bottom-bar--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'footer--bottom-bar--background-color',
      selector: '.bottom-bar',
      styles: {
        'background-color': to
      }
    });
  });
}); //Bottom Bar Default Color

wp.customize('footer--bottom-bar--default-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'footer--bottom-bar--default-color',
      selector: '.app-footer, .app-footer a',
      styles: {
        'color': to
      }
    });
  });
}); //Bottom Bar Default Hover Color

wp.customize('footer--bottom-bar--default-color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'footer--bottom-bar--default-color--hover',
      selector: '.app-footer a:hover',
      styles: {
        'color': to
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/footer/padding-desktop/preview.js":
/*!*********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/footer/padding-desktop/preview.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Padding
wp.customize('footer--padding-desktop--padding', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--padding',
      value: to,
      screen: 'desktop'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/footer/padding-mobile/preview.js":
/*!********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/footer/padding-mobile/preview.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Padding
wp.customize('footer--padding-mobile--padding', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--padding',
      value: to,
      screen: 'default'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/footer/padding-tablet/preview.js":
/*!********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/footer/padding-tablet/preview.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Padding
wp.customize('footer--padding-tablet--padding', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--padding',
      value: to,
      screen: 'tablet-and-up'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/footer/panel.js":
/*!***************************************************************!*\
  !*** ./resources/js/customize-preview/panels/footer/panel.js ***!
  \***************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./styles/preview.js */ "./resources/js/customize-preview/panels/footer/styles/preview.js");
/* harmony import */ var _styles_preview_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_styles_preview_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _padding_mobile_preview_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./padding-mobile/preview.js */ "./resources/js/customize-preview/panels/footer/padding-mobile/preview.js");
/* harmony import */ var _padding_mobile_preview_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_padding_mobile_preview_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _padding_tablet_preview_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./padding-tablet/preview.js */ "./resources/js/customize-preview/panels/footer/padding-tablet/preview.js");
/* harmony import */ var _padding_tablet_preview_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_padding_tablet_preview_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _padding_desktop_preview_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./padding-desktop/preview.js */ "./resources/js/customize-preview/panels/footer/padding-desktop/preview.js");
/* harmony import */ var _padding_desktop_preview_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_padding_desktop_preview_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _widgets_preview_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./widgets/preview.js */ "./resources/js/customize-preview/panels/footer/widgets/preview.js");
/* harmony import */ var _widgets_preview_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_widgets_preview_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _widgets_mobile_preview_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./widgets-mobile/preview.js */ "./resources/js/customize-preview/panels/footer/widgets-mobile/preview.js");
/* harmony import */ var _widgets_mobile_preview_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_widgets_mobile_preview_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _widgets_tablet_preview_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./widgets-tablet/preview.js */ "./resources/js/customize-preview/panels/footer/widgets-tablet/preview.js");
/* harmony import */ var _widgets_tablet_preview_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_widgets_tablet_preview_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _widgets_desktop_preview_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./widgets-desktop/preview.js */ "./resources/js/customize-preview/panels/footer/widgets-desktop/preview.js");
/* harmony import */ var _widgets_desktop_preview_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_widgets_desktop_preview_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _bottom_bar_preview_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./bottom-bar/preview.js */ "./resources/js/customize-preview/panels/footer/bottom-bar/preview.js");
/* harmony import */ var _bottom_bar_preview_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_bottom_bar_preview_js__WEBPACK_IMPORTED_MODULE_8__);
/**
 * Add customizer panel js.
 *
 * This file contains the js functionality for the customizer preview.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */










/***/ }),

/***/ "./resources/js/customize-preview/panels/footer/styles/preview.js":
/*!************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/footer/styles/preview.js ***!
  \************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
//  Footer Background Color
wp.customize('footer--styles--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'footer--styles--background-color',
      selector: '.app-footer',
      styles: {
        'background-color': to
      }
    });
  });
}); // Footer Default Color

wp.customize('footer--styles--default-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'footer--styles--default-color',
      selector: '.app-footer, .app-footer a',
      styles: {
        'color': to
      }
    });
  });
}); // Footer Default Hover Color

wp.customize('footer--styles--default-color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'footer--styles--default-color--hover',
      selector: '.app-footer a:hover',
      styles: {
        'color': to
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/footer/widgets-desktop/preview.js":
/*!*********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/footer/widgets-desktop/preview.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Default Color
wp.customize('footer--widgets-desktop--layout', function (value) {
  value.bind(function (to) {
    var footerStyles;

    switch (to) {
      case 'quarters':
        footerStyles = 'repeat(4, 1fr)';
        break;

      case 'thirds':
        footerStyles = 'repeat(3, 1fr)';
        break;

      case 'halves':
        footerStyles = 'repeat(2, 1fr)';
        break;

      case 'full':
        footerStyles = '100%';
        break;

      case 'one-third-two-thirds':
        footerStyles = '1fr 2fr';
        break;

      case 'two-thirds-one-third':
        footerStyles = '2fr 1fr';
        break;

      case 'quarter-quarter-half':
        footerStyles = '1fr 1fr 2fr';
        break;

      case 'half-quarter-quarter':
        footerStyles = '2fr 1fr 1fr';
        break;

      default:
        footerStyles = false;
    }

    rootstrap.style({
      id: 'footer--widgets-desktop--layout',
      selector: '.app-footer__widgets',
      styles: {
        'grid-template-columns': footerStyles
      },
      screen: 'desktop'
    });
  });
}); // Title Font Size

wp.customize('footer--widgets-desktop--title--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--widgets--title--font-size',
      value: to,
      screen: 'desktop'
    });
  });
}); // Title Line Height

wp.customize('footer--widgets-desktop--title--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--widgets--title--line-height',
      value: to,
      screen: 'desktop'
    });
  });
}); // Text Font Size

wp.customize('footer--widgets-desktop--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--widgets--font-size',
      value: to,
      screen: 'desktop'
    });
  });
}); // Text Line Height

wp.customize('footer--widgets-desktop--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--widgets--line-height',
      value: to,
      screen: 'desktop'
    });
  });
}); // Widgets Spacing

wp.customize('footer--widgets-desktop--gutter', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--widgets--gutter',
      value: to,
      screen: 'desktop'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/footer/widgets-mobile/preview.js":
/*!********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/footer/widgets-mobile/preview.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Default Color
wp.customize('footer--widgets-mobile--layout', function (value) {
  value.bind(function (to) {
    var footerStyles;

    switch (to) {
      case 'halves':
        footerStyles = 'repeat(2, 1fr)';
        break;

      case 'full':
        footerStyles = '100%';
        break;

      default:
        footerStyles = false;
    }

    rootstrap.style({
      id: 'footer--widgets-mobile--layout',
      selector: '.app-footer__widgets',
      styles: {
        'grid-template-columns': footerStyles
      },
      screen: 'default'
    });
  });
}); // Title Font Size

wp.customize('footer--widgets-mobile--title--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--widgets--title--font-size',
      value: to,
      screen: 'default'
    });
  });
}); // Title Line Height

wp.customize('footer--widgets-mobile--title--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--widgets--title--line-height',
      value: to,
      screen: 'default'
    });
  });
}); // Text Font Size

wp.customize('footer--widgets-mobile--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--widgets--font-size',
      value: to,
      screen: 'default'
    });
  });
}); // Text Line Height

wp.customize('footer--widgets-mobile--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--widgets--line-height',
      value: to,
      screen: 'default'
    });
  });
}); // Widgets Spacing

wp.customize('footer--widgets-mobile--gutter', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--widgets--gutter',
      value: to,
      screen: 'default'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/footer/widgets-tablet/preview.js":
/*!********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/footer/widgets-tablet/preview.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Default Color
wp.customize('footer--widgets-tablet--layout', function (value) {
  value.bind(function (to) {
    var footerStyles;

    switch (to) {
      case 'quarters':
        footerStyles = 'repeat(4, 1fr)';
        break;

      case 'thirds':
        footerStyles = 'repeat(3, 1fr)';
        break;

      case 'halves':
        footerStyles = 'repeat(2, 1fr)';
        break;

      case 'full':
        footerStyles = '100%';
        break;

      case 'one-third-two-thirds':
        footerStyles = '1fr 2fr';
        break;

      case 'two-thirds-one-third':
        footerStyles = '2fr 1fr';
        break;

      case 'quarter-quarter-half':
        footerStyles = '1fr 1fr 2fr';
        break;

      case 'half-quarter-quarter':
        footerStyles = '2fr 1fr 1fr';
        break;

      default:
        footerStyles = false;
    }

    rootstrap.style({
      id: 'footer--widgets-tablet--layout',
      selector: '.app-footer__widgets',
      styles: {
        'grid-template-columns': footerStyles
      },
      screen: 'tablet-and-up'
    });
  });
}); // Title Font Size

wp.customize('footer--widgets-tablet--title--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--widgets--title--font-size',
      value: to,
      screen: 'tablet-and-up'
    });
  });
}); // Title Line Height

wp.customize('footer--widgets-tablet--title--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--widgets--title--line-height',
      value: to,
      screen: 'tablet-and-up'
    });
  });
}); // Text Font Size

wp.customize('footer--widgets-tablet--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--widgets--font-size',
      value: to,
      screen: 'tablet-and-up'
    });
  });
}); // Text Line Height

wp.customize('footer--widgets-tablet--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--widgets--line-height',
      value: to,
      screen: 'tablet-and-up'
    });
  });
}); // Widgets Spacing

wp.customize('footer--widgets-tablet--gutter', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'footer--widgets--gutter',
      value: to,
      screen: 'tablet-and-up'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/footer/widgets/preview.js":
/*!*************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/footer/widgets/preview.js ***!
  \*************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Default Color
wp.customize('footer--widgets--footer-layout', function (value) {
  value.bind(function (to) {
    var footerStyles;

    switch (to) {
      case 'quarters':
        footerStyles = 'repeat(4, 1fr)';
        break;

      case 'thirds':
        footerStyles = 'repeat(3, 1fr)';
        break;

      case 'halves':
        footerStyles = 'repeat(2, 1fr)';
        break;

      case 'full':
        footerStyles = '100%';
        break;

      case 'one-third-two-thirds':
        footerStyles = '1fr 2fr';
        break;

      case 'two-thirds-one-third':
        footerStyles = '2fr 1fr';
        break;

      case 'quarter-quarter-half':
        footerStyles = '1fr 1fr 2fr';
        break;

      case 'half-quarter-quarter':
        footerStyles = '2fr 1fr 1fr';
        break;

      default:
        footerStyles = false;
    }

    rootstrap.style({
      id: 'footer--widgets--footer-layout',
      selector: '.app-footer__widgets',
      styles: {
        'grid-template-columns': footerStyles
      },
      screen: 'desktop'
    });
  });
}); // Default Color

wp.customize('footer--widgets--default-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'footer--widgets--default-color',
      selector: '.app-footer__widget',
      styles: {
        'color': to
      }
    });
  });
}); // Headings Color

wp.customize('footer--widgets--headings-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'footer--widgets--headings-color',
      selector: '.app-footer__widget h1, .app-footer__widget h2, .app-footer__widget h3, .app-footer__widget h4, .app-footer__widget h5, .app-footer__widget h6',
      styles: {
        'color': to
      }
    });
  });
}); // Link Color

wp.customize('footer--widgets--link-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'footer--widgets--link-color',
      selector: '.app-footer__widget a, .app-footer__widget a:visited',
      styles: {
        'color': to
      }
    });
  });
}); // Link Color

wp.customize('footer--widgets--link-color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'footer--widgets--link-color--hover',
      selector: '.app-footer__widget a:hover',
      styles: {
        'color': to
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/general/background/preview.js":
/*!*****************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/general/background/preview.js ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// background color
wp.customize('general--background--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'general--background--background-color',
      selector: 'html',
      styles: {
        'background-color': to
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/general/panel.js":
/*!****************************************************************!*\
  !*** ./resources/js/customize-preview/panels/general/panel.js ***!
  \****************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _background_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./background/preview.js */ "./resources/js/customize-preview/panels/general/background/preview.js");
/* harmony import */ var _background_preview_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_background_preview_js__WEBPACK_IMPORTED_MODULE_0__);
/**
 * Add customizer panel js.
 *
 * This file contains the js functionality for the customizer preview.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


/***/ }),

/***/ "./resources/js/customize-preview/panels/header/image/preview.js":
/*!***********************************************************************!*\
  !*** ./resources/js/customize-preview/panels/header/image/preview.js ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Header Image Height
wp.customize('header--image--height', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'header--image--height',
      selector: '.custom-header .app-header:not(.app-header--fixed)',
      styles: {
        height: to
      }
    });
  });
}); // Header Image Max Height

wp.customize('header--image--max-height', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'header--image--max-height',
      selector: '.custom-header .app-header:not(.app-header--fixed)',
      styles: {
        'max-height': to
      }
    });
  });
}); // Header Image Min Height

wp.customize('header--image--min-height', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'header--image--min-height',
      selector: '.custom-header .app-header:not(.app-header--fixed)',
      styles: {
        'min-height': to
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/header/padding-desktop/preview.js":
/*!*********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/header/padding-desktop/preview.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Fullwidth Header
wp.customize('header--padding-desktop--fullwidth', function (value) {
  value.bind(function (to) {
    var headerPadding = wp.customize.instance('header--padding-desktop--padding').get();
    var contentPadding = wp.customize.instance('layout--content-desktop--content-gutter').get();
    var padding = to ? headerPadding : contentPadding;
    rootstrap.style({
      id: 'header--padding-desktop--fullwidth',
      selector: '.app-header__container',
      styles: {
        'padding-left': padding,
        'padding-right': padding
      },
      screen: 'desktop'
    });
    rootstrap.style({
      id: 'header--padding-desktop--fullwidth-width',
      selector: '.app-header__container',
      styles: {
        'max-width': '100%',
        'width': '100%'
      },
      screen: 'desktop',
      callback: to
    });
  });
}); // Padding

wp.customize('header--padding-desktop--padding', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'header--padding',
      value: to,
      screen: 'desktop'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/header/padding-fixed/preview.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/header/padding-fixed/preview.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Top/Bottom Padding
wp.customize('header--padding-fixed--padding', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'header--padding-fixed--padding',
      selector: '.app-header--fixed .app-header__container',
      styles: {
        'padding-top': to,
        'padding-bottom': to
      },
      screen: 'desktop'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/header/padding-mobile/preview.js":
/*!********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/header/padding-mobile/preview.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Header Padding
wp.customize('header--padding-mobile--padding', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'header--padding',
      value: to,
      screen: 'default'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/header/padding-tablet/preview.js":
/*!********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/header/padding-tablet/preview.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Padding
wp.customize('header--padding-tablet--padding', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'header--padding',
      value: to,
      screen: 'tablet-and-up'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/header/panel.js":
/*!***************************************************************!*\
  !*** ./resources/js/customize-preview/panels/header/panel.js ***!
  \***************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./styles/preview.js */ "./resources/js/customize-preview/panels/header/styles/preview.js");
/* harmony import */ var _styles_preview_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_styles_preview_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _styles_fixed_preview_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./styles-fixed/preview.js */ "./resources/js/customize-preview/panels/header/styles-fixed/preview.js");
/* harmony import */ var _styles_fixed_preview_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_styles_fixed_preview_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _padding_mobile_preview_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./padding-mobile/preview.js */ "./resources/js/customize-preview/panels/header/padding-mobile/preview.js");
/* harmony import */ var _padding_mobile_preview_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_padding_mobile_preview_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _padding_tablet_preview_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./padding-tablet/preview.js */ "./resources/js/customize-preview/panels/header/padding-tablet/preview.js");
/* harmony import */ var _padding_tablet_preview_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_padding_tablet_preview_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _padding_desktop_preview_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./padding-desktop/preview.js */ "./resources/js/customize-preview/panels/header/padding-desktop/preview.js");
/* harmony import */ var _padding_desktop_preview_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_padding_desktop_preview_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _padding_fixed_preview_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./padding-fixed/preview.js */ "./resources/js/customize-preview/panels/header/padding-fixed/preview.js");
/* harmony import */ var _padding_fixed_preview_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_padding_fixed_preview_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _image_preview_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./image/preview.js */ "./resources/js/customize-preview/panels/header/image/preview.js");
/* harmony import */ var _image_preview_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_image_preview_js__WEBPACK_IMPORTED_MODULE_6__);
/**
 * Add customizer panel js.
 *
 * This file contains the js functionality for the customizer preview.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */








/***/ }),

/***/ "./resources/js/customize-preview/panels/header/styles-fixed/preview.js":
/*!******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/header/styles-fixed/preview.js ***!
  \******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Header Background Color
wp.customize('header--styles-fixed--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'header--styles-fixed--background-color',
      selector: '.app-header--fixed',
      styles: {
        'background-color': to
      },
      screen: 'desktop'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/header/styles/preview.js":
/*!************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/header/styles/preview.js ***!
  \************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Header Background Color
wp.customize('header--styles--background-color', function (value) {
  value.bind(function (to) {
    var styles = {};
    styles['background-color'] = to;

    if (!to || '#ffffff' === to || 'rgb(255,255,255)' === to) {
      styles['border-bottom'] = '1px solid rgba(0, 0, 0, 0.1)';
    }

    rootstrap.style({
      id: 'header--styles--background-color',
      selector: '.app-header',
      styles: styles
    });
  });
}); // Fullwidth

wp.customize('header--styles--fullwidth', function (value) {
  value.bind(function (to) {
    if (to) {
      $('.app-header').removeClass('app-header--standard-width').addClass('app-header--fullwidth');
    } else {
      $('.app-header').removeClass('app-header--fullwidth').addClass('app-header--standard-width');
    }
  });
}); // Header Default Color

wp.customize('header--styles--default-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'header--styles--default-color',
      selector: '.app-header__container',
      styles: {
        color: to
      }
    });
  });
}); // Header Default Color Hover

wp.customize('header--styles--default-color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'header--styles--default-color--hover',
      selector: '.app-header__container .label-toggle:hover',
      styles: {
        color: to
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/layout/boxed/preview.js":
/*!***********************************************************************!*\
  !*** ./resources/js/customize-preview/panels/layout/boxed/preview.js ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Boxed Layout Padding
wp.customize('layout--boxed--outer-padding', function (value) {
  value.bind(function (to) {
    var isBoxed = wp.customize.instance('layout--boxed--enable');
    isBoxed = isBoxed ? isBoxed.get() : false;

    if (isBoxed) {
      rootstrap.var({
        name: 'layout--boxed--outer-padding',
        value: to
      });
      rootstrap.style({
        id: 'layout--boxed--outer-padding--header',
        selector: '.app-header--fixed, .app-header--sticky, .app-footer--fixed',
        styles: {
          'width': 'calc(100vw - (2 * ' + to + '))'
        },
        screen: 'desktop'
      });
    }
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/layout/container-desktop/preview.js":
/*!***********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/layout/container-desktop/preview.js ***!
  \***********************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Container Width

wp.customize('layout--container-desktop--width', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      screen: 'desktop',
      name: 'layout--container--width',
      value: to.replace('vw', '%')
    });
    rootstrap.var({
      screen: 'desktop',
      name: 'layout--container--padding',
      value: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getPaddingFromWidth"](to, 'vw')
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/layout/container-mobile/preview.js":
/*!**********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/layout/container-mobile/preview.js ***!
  \**********************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Container Width

wp.customize('layout--container-mobile--width', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'layout--container--width',
      value: to
    });
    rootstrap.var({
      name: 'layout--container--padding',
      value: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getPaddingFromWidth"](to, 'vw')
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/layout/container-tablet/preview.js":
/*!**********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/layout/container-tablet/preview.js ***!
  \**********************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Container Width

wp.customize('layout--container-tablet--width', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      screen: 'tablet-and-up',
      name: 'layout--container--width',
      value: to
    });
    rootstrap.var({
      screen: 'tablet-and-up',
      name: 'layout--container--padding',
      value: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getPaddingFromWidth"](to, 'vw')
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/layout/container/preview.js":
/*!***************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/layout/container/preview.js ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Max Content Width
wp.customize('layout--container--max-width', function (value) {
  value.bind(function (to) {
    var styleSelector;
    var isBoxed = wp.customize.instance('layout--boxed--enable');
    isBoxed = isBoxed ? isBoxed.get() : false;

    if (isBoxed) {
      styleSelector = ".app, .boxed-layout.app-header--has-fixed, .boxed-layout.app-footer--has-fixed";
    } else {
      styleSelector = ".container";
    }

    rootstrap.style({
      id: 'layout--container--max-width',
      selector: styleSelector,
      styles: {
        'max-width': to
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/layout/content/preview.js":
/*!*************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/layout/content/preview.js ***!
  \*************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Max Content Width
wp.customize('layout--content--max-width', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'layout--content--max-width',
      value: to
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/layout/panel.js":
/*!***************************************************************!*\
  !*** ./resources/js/customize-preview/panels/layout/panel.js ***!
  \***************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _boxed_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./boxed/preview.js */ "./resources/js/customize-preview/panels/layout/boxed/preview.js");
/* harmony import */ var _boxed_preview_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_boxed_preview_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _container_preview_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./container/preview.js */ "./resources/js/customize-preview/panels/layout/container/preview.js");
/* harmony import */ var _container_preview_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_container_preview_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _container_mobile_preview_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./container-mobile/preview.js */ "./resources/js/customize-preview/panels/layout/container-mobile/preview.js");
/* harmony import */ var _container_tablet_preview_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./container-tablet/preview.js */ "./resources/js/customize-preview/panels/layout/container-tablet/preview.js");
/* harmony import */ var _container_desktop_preview_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./container-desktop/preview.js */ "./resources/js/customize-preview/panels/layout/container-desktop/preview.js");
/* harmony import */ var _content_preview_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./content/preview.js */ "./resources/js/customize-preview/panels/layout/content/preview.js");
/* harmony import */ var _content_preview_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_content_preview_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _sidebar_preview_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./sidebar/preview.js */ "./resources/js/customize-preview/panels/layout/sidebar/preview.js");
/* harmony import */ var _sidebar_preview_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_sidebar_preview_js__WEBPACK_IMPORTED_MODULE_6__);
/**
 * Add customizer panel js.
 *
 * This file contains the js functionality for the customizer preview.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */








/***/ }),

/***/ "./resources/js/customize-preview/panels/layout/sidebar/preview.js":
/*!*************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/layout/sidebar/preview.js ***!
  \*************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Sidebar Background Color
wp.customize('layout--sidebar--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'layout--sidebar--background-color',
      value: to
    });
  });
}); // Sidebar Width

wp.customize('layout--sidebar--min-width', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'layout--sidebar--min-width',
      value: to,
      screen: 'desktop'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/nav/footer-mobile/preview.js":
/*!****************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/nav/footer-mobile/preview.js ***!
  \****************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Footer Nav Hide

wp.customize('nav--footer-mobile--hide', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--footer-mobile--hide',
      selector: '.menu--footer',
      styles: {
        'display': 'none'
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--footer-mobile--breakpoint').get()),
      callback: to
    });
  });
}); //  Link Font Size

wp.customize('nav--footer-mobile--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'nav--footer--font-size',
      value: to,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--footer-mobile--breakpoint').get())
    });
  });
}); // Line Height

wp.customize('nav--footer-mobile--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'nav--footer--line-height',
      value: to,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--footer-mobile--breakpoint').get())
    });
  });
}); // Align

wp.customize('nav--footer-mobile--align', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--footer-mobile--align',
      selector: '.menu--footer__link',
      styles: {
        'text-align': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--footer-mobile--breakpoint').get())
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/nav/footer/preview.js":
/*!*********************************************************************!*\
  !*** ./resources/js/customize-preview/panels/nav/footer/preview.js ***!
  \*********************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Var: Background Color

wp.customize('nav--footer--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--footer--background-color',
      selector: '.menu--footer',
      styles: {
        'background-color': to
      }
    });
  });
}); // Font Styles

wp.customize('nav--footer--font-styles', function (value) {
  value.bind(function (to) {
    var itemStyles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'nav--footer--font-styles',
      selector: '.menu--footer__link',
      styles: itemStyles
    });
  });
}); // Menu Link Color

wp.customize('nav--footer--link-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--footer--link-color',
      selector: '.menu--footer__link:link, .menu--footer__link:visited',
      styles: {
        color: to
      }
    });
  });
}); // Menu Link Color

wp.customize('nav--footer--link-color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--footer--link-color--hover',
      selector: '.menu--footer__link:hover',
      styles: {
        color: to
      }
    });
  });
}); // Font Family

wp.customize('nav--footer--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--footer--font-family',
      selector: '.menu--footer__link',
      styles: {
        'font-family': to
      }
    });
  });
}); // Footer Nav Position

wp.customize('nav--footer--position', function (value) {
  value.bind(function (to) {
    var order = 'before' === to ? '1' : '3';
    rootstrap.style({
      id: 'nav--footer--position',
      selector: '.menu--footer',
      styles: {
        'order': order
      }
    });
  });
}); //  Var: Link Font Size

wp.customize('nav--footer--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'nav--footer--font-size',
      value: to,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--footer-mobile--breakpoint').get())
    });
  });
}); //  Var: Link Line Height

wp.customize('nav--footer--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'nav--footer--line-height',
      value: to,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--footer-mobile--breakpoint').get())
    });
  });
}); // Padding

wp.customize('nav--footer--padding', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--footer--padding',
      selector: '.menu--footer__link',
      styles: {
        'padding-left': to,
        'padding-right': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--footer-mobile--breakpoint').get())
    });
  });
}); // Align

wp.customize('nav--footer--align', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--footer--align',
      selector: '.menu--footer__items',
      styles: {
        'justify-content': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--footer-mobile--breakpoint').get())
    });
  });
}); // Footer Nav hide

wp.customize('nav--footer--hide', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--footer--hide',
      selector: '.menu--footer',
      styles: {
        'display': 'none'
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--footer-mobile--breakpoint').get()),
      callback: to
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/nav/header-fixed/preview.js":
/*!***************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/nav/header-fixed/preview.js ***!
  \***************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Show When Fixed

wp.customize('nav--header-fixed--fixed', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-fixed--fixed',
      selector: '.app-header--fixed .menu--header',
      styles: {
        'display': 'none'
      },
      screen: 'desktop',
      callback: !to
    });
  });
}); // Menu Link Color

wp.customize('nav--header-fixed--link-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-fixed--link-color',
      selector: '.app-header--fixed .menu--header__link:link, .app-header--fixed .menu--header__link:visited',
      styles: {
        'color': to
      },
      screen: 'desktop'
    });
  });
}); // Menu Link Color Hover

wp.customize('nav--header-fixed--link-color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-fixed--link-color--hover',
      selector: '.app-header--fixed .menu--header__link',
      styles: {
        'color': to
      },
      screen: 'desktop'
    });
  });
}); // Font Family

wp.customize('nav--header-fixed--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-fixed--font-family',
      selector: '.app-header--fixed .menu--header__link',
      styles: {
        'font-family': to
      },
      screen: 'desktop'
    });
  });
}); // Font Styles

wp.customize('nav--header-fixed--font-styles', function (value) {
  value.bind(function (to) {
    var itemStyles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'nav--header-fixed--font-styles',
      selector: '.app-header--fixed .menu--header__link',
      styles: itemStyles,
      screen: 'desktop'
    });
  });
}); // Font Size

wp.customize('nav--header-fixed--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-fixed--font-size',
      selector: '.app-header--fixed .menu--header__link',
      styles: {
        'font-size': to
      },
      screen: 'desktop'
    });
  });
}); // Line Height

wp.customize('nav--header-fixed--height', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-fixed--height',
      selector: '.app-header--fixed .menu--header__link',
      styles: {
        'line-height': to
      },
      screen: 'desktop'
    });
  });
}); // Padding

wp.customize('nav--header-fixed--padding', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-fixed--padding',
      selector: '.app-header--fixed .menu--header__link',
      styles: {
        'padding-left': to,
        'padding-right': to
      },
      screen: 'desktop'
    });
  });
}); // Align

wp.customize('nav--header-fixed--align', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-fixed--align',
      selector: '.app-header--fixed .menu--header__items',
      styles: {
        'justify-content': to
      },
      screen: 'desktop'
    });
  });
}); // Submenu Color

wp.customize('nav--header-fixed--dropdown--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-fixed--dropdown--background-color',
      selector: '.app-header--fixed .menu--header__item.has-children  .menu__sub-menu',
      styles: {
        'background-color': to,
        'border-color': to
      },
      screen: 'desktop'
    });
  });
}); // Submenu Link Color

wp.customize('nav--header-fixed--dropdown--link--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-fixed--dropdown--link--color',
      selector: '.app-header--fixed .menu__sub-menu .menu--header__link',
      styles: {
        'color': to
      },
      screen: 'desktop'
    });
  });
}); // Submenu Link Color

wp.customize('nav--header-fixed--dropdown--link--color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-fixed--dropdown--link--color--hover',
      selector: '.app-header--fixed .menu__sub-menu .menu--header__link:hover',
      styles: {
        'color': to
      },
      screen: 'desktop'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/nav/header-mobile/preview.js":
/*!****************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/nav/header-mobile/preview.js ***!
  \****************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Header Nav Hide

wp.customize('nav--header-mobile--hide', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-mobile--hide',
      selector: '.menu--header',
      styles: {
        'display': 'none'
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get()),
      callback: to
    });
  });
}); // Nav Icon Size

wp.customize('nav--header-mobile--icon-size', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-mobile--icon-size',
      selector: '.menu--header .menu-label',
      styles: {
        'font-size': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
}); // Nav Icon Color

wp.customize('nav--header-mobile--icon-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-mobile--icon-color',
      selector: '.menu--header .menu--toggle',
      styles: {
        'fill': to,
        'color': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
}); // Nav Link Background Color

wp.customize('nav--header-mobile--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-mobile--background-color',
      selector: '.menu--header__items',
      styles: {
        'background-color': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
}); // Menu Separator Color

wp.customize('nav--header-mobile--separator-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-mobile--separator-color',
      selector: '.menu--header__item',
      styles: {
        'border-color': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
}); // Font Styles

wp.customize('nav--header-mobile--font-styles', function (value) {
  value.bind(function (to) {
    var itemStyles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'nav--header-mobile--font-styles',
      selector: '.menu--header__link',
      styles: itemStyles,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
}); // Menu Link Color

wp.customize('nav--header-mobile--link-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-mobile--link-color',
      selector: '.menu--header__link:link, .menu--header__link:visited',
      styles: {
        color: to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
}); // Menu Link Color: Hover

wp.customize('nav--header-mobile--link-color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-mobile--link-color--hover',
      selector: '.menu--header__link:hover',
      styles: {
        color: to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
}); // Font Family

wp.customize('nav--header-mobile--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-mobile--font-family',
      selector: '.menu--header__link',
      styles: {
        'font-family': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
}); //  Var: Link Font Size

wp.customize('nav--header-mobile--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'nav--header--font-size',
      value: to,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
}); //  Var: Link Line Height

wp.customize('nav--header-mobile--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'nav--header--line-height',
      value: to,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
}); // Padding

wp.customize('nav--header-mobile--padding', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header-mobile--padding',
      selector: '.menu--header__link',
      styles: {
        'padding-left': to,
        'padding-right': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/nav/header/preview.js":
/*!*********************************************************************!*\
  !*** ./resources/js/customize-preview/panels/nav/header/preview.js ***!
  \*********************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Header Nav Hide

wp.customize('nav--header--hide', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header--hide',
      selector: '.menu--header',
      styles: {
        'display': 'none'
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get()),
      callback: to
    });
  });
}); // Font Styles

wp.customize('nav--header--font-styles', function (value) {
  value.bind(function (to) {
    var itemStyles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'nav--header--font-styles',
      selector: '.menu--header__link',
      styles: itemStyles
    });
  });
}); // Menu Link Color

wp.customize('nav--header--link-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header--link-color',
      selector: '.menu--header__link:link, .menu--header__link:visited',
      styles: {
        color: to
      }
    });
  });
}); // Menu Link Color Hover

wp.customize('nav--header--link-color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header--link-color--hover',
      selector: '.menu--header__link:hover',
      styles: {
        color: to
      }
    });
  });
}); // Font Family

wp.customize('nav--header--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header--font-family',
      selector: '.menu--header__link',
      styles: {
        'font-family': to
      }
    });
  });
}); // Var: Link Font Size

wp.customize('nav--header--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'nav--header--font-size',
      value: to,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
}); // Var: Link Line Height

wp.customize('nav--header--height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'nav--header--line-height',
      value: to,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
}); // Padding

wp.customize('nav--header--padding', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header--padding',
      selector: '.menu--header__link',
      styles: {
        'padding-left': to,
        'padding-right': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
}); // Align

wp.customize('nav--header--align', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header--align',
      selector: '.menu--header__items',
      styles: {
        'justify-content': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
}); // Submenu Color

wp.customize('nav--header--dropdown--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header--dropdown--background-color',
      selector: '.menu--header__item.has-children  .menu__sub-menu',
      styles: {
        'background-color': to,
        'border-color': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
}); // Submenu Link Color

wp.customize('nav--header--dropdown--link--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header--dropdown--link--color',
      selector: '.menu__sub-menu .menu--header__link',
      styles: {
        'color': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
}); // Submenu Link Color

wp.customize('nav--header--dropdown--link--color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--header--dropdown--link--color--hover',
      selector: '.menu__sub-menu .menu--header__link:hover',
      styles: {
        'color': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--header-mobile--breakpoint').get())
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/nav/navbar-fixed/preview.js":
/*!***************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/nav/navbar-fixed/preview.js ***!
  \***************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Navbar Show When Fixed

wp.customize('nav--navbar-fixed--fixed', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-fixed--fixed',
      selector: '.app-header--fixed .menu--navbar',
      styles: {
        'display': 'none'
      },
      screen: 'desktop',
      callback: !to
    });
  });
}); // Navbar Background Color

wp.customize('nav--navbar-fixed--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-fixed--background-color',
      selector: '.app-header--fixed .menu--navbar',
      styles: {
        'background-color': to
      },
      screen: 'desktop'
    });
  });
}); // Menu Link Color

wp.customize('nav--navbar-fixed--link-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-fixed--link-color',
      selector: '.app-header--fixed .menu--navbar__link:link, .app-header--fixed .menu--navbar__link:visited',
      styles: {
        'color': to
      },
      screen: 'desktop'
    });
  });
}); // Menu Link Color Hover

wp.customize('nav--navbar-fixed--link-color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-fixed--link-color--hover',
      selector: '.app-header--fixed .menu--navbar__link',
      styles: {
        'color': to
      },
      screen: 'desktop'
    });
  });
}); // Font Family

wp.customize('nav--navbar-fixed--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-fixed--font-family',
      selector: '.app-header--fixed .menu--navbar__link',
      styles: {
        'font-family': to
      },
      screen: 'desktop'
    });
  });
}); // Font Styles

wp.customize('nav--navbar-fixed--font-styles', function (value) {
  value.bind(function (to) {
    var itemStyles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'nav--navbar-fixed--font-styles',
      selector: '.app-header--fixed .menu--navbar__link',
      styles: itemStyles,
      screen: 'desktop'
    });
  });
}); // Font Size

wp.customize('nav--navbar-fixed--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-fixed--font-size',
      selector: '.app-header--fixed .menu--navbar__link',
      styles: {
        'font-size': to
      },
      screen: 'desktop'
    });
  });
}); // Line Height

wp.customize('nav--navbar-fixed--height', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-fixed--height',
      selector: '.app-header--fixed .menu--navbar__link',
      styles: {
        'line-height': to
      },
      screen: 'desktop'
    });
  });
}); // Padding

wp.customize('nav--navbar-fixed--padding', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-fixed--padding',
      selector: '.app-header--fixed .menu--navbar__link',
      styles: {
        'padding-left': to,
        'padding-right': to
      },
      screen: 'desktop'
    });
  });
}); // Align

wp.customize('nav--navbar-fixed--align', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-fixed--align',
      selector: '.app-header--fixed .menu--navbar__items',
      styles: {
        'justify-content': to
      },
      screen: 'desktop'
    });
  });
}); // Submenu Color

wp.customize('nav--navbar-fixed--dropdown--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-fixed--dropdown--background-color',
      selector: '.app-header--fixed .menu--navbar__item.has-children  .menu__sub-menu',
      styles: {
        'background-color': to,
        'border-color': to
      },
      screen: 'desktop'
    });
  });
}); // Submenu Link Color

wp.customize('nav--navbar-fixed--dropdown--link--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-fixed--dropdown--link--color',
      selector: '.app-header--fixed .menu__sub-menu .menu--navbar__link',
      styles: {
        'color': to
      },
      screen: 'desktop'
    });
  });
}); // Submenu Link Color

wp.customize('nav--navbar-fixed--dropdown--link--color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-fixed--dropdown--link--color--hover',
      selector: '.app-header--fixed .menu__sub-menu .menu--navbar__link:hover',
      styles: {
        'color': to
      },
      screen: 'desktop'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/nav/navbar-mobile/preview.js":
/*!****************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/nav/navbar-mobile/preview.js ***!
  \****************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Navbar Hide

wp.customize('nav--navbar-mobile--hide', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-mobile--hide',
      selector: '.menu--navbar',
      styles: {
        'display': 'none'
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get()),
      callback: to
    });
  });
}); // Navbar Background Color

wp.customize('nav--navbar-mobile--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-mobile--background-color',
      selector: '.menu--navbar',
      styles: {
        'background-color': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); // Navbar Menu Height

wp.customize('nav--navbar-mobile--height', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-mobile--height',
      selector: '.menu--navbar',
      styles: {
        'height': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); // Navbar Icon Size

wp.customize('nav--navbar-mobile--icon-size', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-mobile--icon-size',
      selector: '.menu--navbar .menu-label',
      styles: {
        'font-size': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); // Navbar Icon Color

wp.customize('nav--navbar-mobile--icon-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-mobile--icon-color',
      selector: '.menu--navbar .menu--toggle',
      styles: {
        'fill': to,
        'color': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); // Navbar Link Background Color

wp.customize('nav--navbar-mobile--menu-background-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-mobile--menu-background-color',
      selector: '.menu--navbar__items',
      styles: {
        'background-color': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); // Menu Separator Color

wp.customize('nav--navbar-mobile--separator-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-mobile--separator-color',
      selector: '.menu--navbar__item',
      styles: {
        'border-color': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); // Font Styles

wp.customize('nav--navbar-mobile--font-styles', function (value) {
  value.bind(function (to) {
    var itemStyles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'nav--navbar-mobile--font-styles',
      selector: '.menu--navbar__link',
      styles: itemStyles,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); // Menu Link Color

wp.customize('nav--navbar-mobile--link-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-mobile--link-color',
      selector: '.menu--navbar__link:link, .menu--navbar__link:visited',
      styles: {
        color: to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); // Menu Link Color: Hover

wp.customize('nav--navbar-mobile--link-color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-mobile--link-color--hover',
      selector: '.menu--navbar__link:hover',
      styles: {
        color: to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); //  Var: Link Font Size

wp.customize('nav--navbar-mobile--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'nav--navbar--font-size',
      value: to,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); //  Var: Link Line Height

wp.customize('nav--navbar-mobile--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'nav--navbar--line-height',
      value: to,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); // Padding

wp.customize('nav--navbar-mobile--padding', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar-mobile--padding',
      selector: '.menu--navbar__link',
      styles: {
        'padding-left': to,
        'padding-right': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/nav/navbar/preview.js":
/*!*********************************************************************!*\
  !*** ./resources/js/customize-preview/panels/nav/navbar/preview.js ***!
  \*********************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Navbar Hide

wp.customize('nav--navbar--hide', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar--hide',
      selector: '.menu--navbar',
      styles: {
        'display': 'none'
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get()),
      callback: to
    });
  });
}); // Background Color

wp.customize('nav--navbar--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar--background-color',
      selector: '.menu--navbar',
      styles: {
        'background-color': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); // Font Family

wp.customize('nav--navbar--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar--font-family',
      selector: '.menu--navbar__link',
      styles: {
        'font-family': to
      }
    });
  });
}); // Font Styles

wp.customize('nav--navbar--font-styles', function (value) {
  value.bind(function (to) {
    var itemStyles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'nav--navbar--font-styles',
      selector: '.menu--navbar__link',
      styles: itemStyles,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); // Menu Link Color

wp.customize('nav--navbar--link-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar--link-color',
      selector: '.menu--navbar__link:link, .menu--navbar__link:visited',
      styles: {
        color: to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); // Menu Link Color Hover

wp.customize('nav--navbar--link-color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar--link-color--hover',
      selector: '.menu--navbar__link:hover',
      styles: {
        color: to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); //  Var: Link Font Size

wp.customize('nav--navbar--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'nav--navbar--font-size',
      value: to,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); //  Var: Link Line Height

wp.customize('nav--navbar--height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'nav--navbar--line-height',
      value: to,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); // Padding

wp.customize('nav--navbar--padding', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar--padding',
      selector: '.menu--navbar__link',
      styles: {
        'padding-left': to,
        'padding-right': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); // Align

wp.customize('nav--navbar--align', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar--align',
      selector: '.menu--navbar__items',
      styles: {
        'justify-content': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); // Submenu Color

wp.customize('nav--navbar--dropdown--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar--dropdown--background-color',
      selector: '.menu--navbar__item.has-children  .menu__sub-menu',
      styles: {
        'background-color': to,
        'border-color': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); // Submenu Link Color

wp.customize('nav--navbar--dropdown--link--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar--dropdown--link--color',
      selector: '.menu__sub-menu .menu--navbar__link',
      styles: {
        'color': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
}); // Submenu Link Color

wp.customize('nav--navbar--dropdown--link--color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--navbar--dropdown--link--color--hover',
      selector: '.menu__sub-menu .menu--navbar__link:hover',
      styles: {
        'color': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--navbar-mobile--breakpoint').get())
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/nav/panel.js":
/*!************************************************************!*\
  !*** ./resources/js/customize-preview/panels/nav/panel.js ***!
  \************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _top_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./top/preview.js */ "./resources/js/customize-preview/panels/nav/top/preview.js");
/* harmony import */ var _top_mobile_preview_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./top-mobile/preview.js */ "./resources/js/customize-preview/panels/nav/top-mobile/preview.js");
/* harmony import */ var _top_fixed_preview_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./top-fixed/preview.js */ "./resources/js/customize-preview/panels/nav/top-fixed/preview.js");
/* harmony import */ var _header_preview_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./header/preview.js */ "./resources/js/customize-preview/panels/nav/header/preview.js");
/* harmony import */ var _header_mobile_preview_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./header-mobile/preview.js */ "./resources/js/customize-preview/panels/nav/header-mobile/preview.js");
/* harmony import */ var _header_fixed_preview_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./header-fixed/preview.js */ "./resources/js/customize-preview/panels/nav/header-fixed/preview.js");
/* harmony import */ var _navbar_preview_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./navbar/preview.js */ "./resources/js/customize-preview/panels/nav/navbar/preview.js");
/* harmony import */ var _navbar_mobile_preview_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./navbar-mobile/preview.js */ "./resources/js/customize-preview/panels/nav/navbar-mobile/preview.js");
/* harmony import */ var _navbar_fixed_preview_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./navbar-fixed/preview.js */ "./resources/js/customize-preview/panels/nav/navbar-fixed/preview.js");
/* harmony import */ var _footer_preview_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./footer/preview.js */ "./resources/js/customize-preview/panels/nav/footer/preview.js");
/* harmony import */ var _footer_mobile_preview_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./footer-mobile/preview.js */ "./resources/js/customize-preview/panels/nav/footer-mobile/preview.js");
/**
 * Add customizer panel js.
 *
 * This file contains the js functionality for the customizer preview.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */












/***/ }),

/***/ "./resources/js/customize-preview/panels/nav/top-fixed/preview.js":
/*!************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/nav/top-fixed/preview.js ***!
  \************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Top Nav Show When Fixed

wp.customize('nav--top-fixed--fixed', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--top-fixed--fixed',
      selector: '.app-header--fixed  .menu--top',
      styles: {
        'display': 'none'
      },
      screen: 'desktop',
      callback: !to
    });
  });
}); // Navbar Background Color

wp.customize('nav--top-fixed--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--top-fixed--background-color',
      selector: '.app-header--fixed  .menu--top',
      styles: {
        'background-color': to
      },
      screen: 'desktop'
    });
  });
}); // Menu Link Color

wp.customize('nav--top-fixed--link-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--top-fixed--link-color',
      selector: '.app-header--fixed  .menu--top__link:link, .app-header--fixed  .menu--top__link:visited',
      styles: {
        'color': to
      },
      screen: 'desktop'
    });
  });
}); // Menu Link Color Hover

wp.customize('nav--top-fixed--link-color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--top-fixed--link-color--hover',
      selector: '.app-header--fixed  .menu--top__link',
      styles: {
        'color': to
      },
      screen: 'desktop'
    });
  });
}); // Font Family

wp.customize('nav--top-fixed--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--top-fixed--font-family',
      selector: '.app-header--fixed  .menu--top__link',
      styles: {
        'font-family': to
      },
      screen: 'desktop'
    });
  });
}); // Font Styles

wp.customize('nav--top-fixed--font-styles', function (value) {
  value.bind(function (to) {
    var itemStyles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'nav--top-fixed--font-styles',
      selector: '.app-header--fixed  .menu--top__link',
      styles: itemStyles,
      screen: 'desktop'
    });
  });
}); // Font Size

wp.customize('nav--top-fixed--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--top-fixed--font-size',
      selector: '.app-header--fixed  .menu--top__link',
      styles: {
        'font-size': to
      },
      screen: 'desktop'
    });
  });
}); // Line Height

wp.customize('nav--top-fixed--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--top-fixed--line-height',
      selector: '.app-header--fixed  .menu--top__link',
      styles: {
        'line-height': to
      },
      screen: 'desktop'
    });
  });
}); // Padding

wp.customize('nav--top-fixed--padding', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--top-fixed--padding',
      selector: '.app-header--fixed  .menu--top__link',
      styles: {
        'padding-left': to,
        'padding-right': to
      },
      screen: 'desktop'
    });
  });
}); // Align

wp.customize('nav--top-fixed--align', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--top-fixed--align',
      selector: '.app-header--fixed  .menu--top__items',
      styles: {
        'justify-content': to
      },
      screen: 'desktop'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/nav/top-mobile/preview.js":
/*!*************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/nav/top-mobile/preview.js ***!
  \*************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Top Nav Hide

wp.customize('nav--top-mobile--hide', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--top-mobile--hide',
      selector: '.menu--top',
      styles: {
        'display': 'none'
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--top-mobile--breakpoint').get()),
      callback: to
    });
  });
}); //  Var: Link Font Size

wp.customize('nav--top-mobile--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'nav--top--font-size',
      value: to,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--top-mobile--breakpoint').get())
    });
  });
}); //  Var: Link Line Height

wp.customize('nav--top-mobile--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'nav--top--line-height',
      value: to,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--top-mobile--breakpoint').get())
    });
  });
}); // Align

wp.customize('nav--top-mobile--align', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--top-mobile--align',
      selector: '.menu--top__link',
      styles: {
        'text-align': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getMobileScreen"](wp.customize.instance('nav--top-mobile--breakpoint').get())
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/nav/top/preview.js":
/*!******************************************************************!*\
  !*** ./resources/js/customize-preview/panels/nav/top/preview.js ***!
  \******************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Top Nav Hide

wp.customize('nav--top--hide', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--top--hide',
      selector: '.menu--top',
      styles: {
        'display': 'none'
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--top-mobile--breakpoint').get()),
      callback: to
    });
  });
}); // Background Color

wp.customize('nav--top--background-color', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'nav--top--background-color',
      value: to
    });
  });
}); // Font Family

wp.customize('nav--top--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--top--font-family',
      selector: '.menu--top__link',
      styles: {
        'font-family': to
      }
    });
  });
}); // Font Styles

wp.customize('nav--top--font-styles', function (value) {
  value.bind(function (to) {
    var itemStyles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'nav--top--font-styles',
      selector: '.menu--top__link',
      styles: itemStyles
    });
  });
}); // Menu Link Color

wp.customize('nav--top--link-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--top--link-color',
      selector: '.menu--top__link:link, .menu--top__link:visited',
      styles: {
        'color': to
      }
    });
  });
}); // Menu Link Color: Hover

wp.customize('nav--top--link-color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--top--link-color--hover',
      selector: '.menu--top__link:hover',
      styles: {
        'color': to
      }
    });
  });
}); //  Var: Link Font Size

wp.customize('nav--top--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'nav--top--font-size',
      value: to,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--top-mobile--breakpoint').get())
    });
  });
}); //  Var: Link Line Height

wp.customize('nav--top--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'nav--top--line-height',
      value: to,
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--top-mobile--breakpoint').get())
    });
  });
}); // Padding

wp.customize('nav--top--padding', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--top--padding',
      selector: '.menu--top__link',
      styles: {
        'padding-left': to,
        'padding-right': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--top-mobile--breakpoint').get())
    });
  });
}); // Align

wp.customize('nav--top--align', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'nav--top--align',
      selector: '.menu--top__items',
      styles: {
        'justify-content': to
      },
      screen: _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["getDesktopScreen"](wp.customize.instance('nav--top-mobile--breakpoint').get())
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/pages/panel.js":
/*!**************************************************************!*\
  !*** ./resources/js/customize-preview/panels/pages/panel.js ***!
  \**************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _title_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./title/preview.js */ "./resources/js/customize-preview/panels/pages/title/preview.js");
/* harmony import */ var _title_mobile_preview_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./title-mobile/preview.js */ "./resources/js/customize-preview/panels/pages/title-mobile/preview.js");
/* harmony import */ var _title_mobile_preview_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_title_mobile_preview_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _title_tablet_preview_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./title-tablet/preview.js */ "./resources/js/customize-preview/panels/pages/title-tablet/preview.js");
/* harmony import */ var _title_tablet_preview_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_title_tablet_preview_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _title_desktop_preview_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./title-desktop/preview.js */ "./resources/js/customize-preview/panels/pages/title-desktop/preview.js");
/* harmony import */ var _title_desktop_preview_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_title_desktop_preview_js__WEBPACK_IMPORTED_MODULE_3__);
/**
 * Add customizer panel js.
 *
 * This file contains the js functionality for the customizer preview.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */





/***/ }),

/***/ "./resources/js/customize-preview/panels/pages/title-desktop/preview.js":
/*!******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/pages/title-desktop/preview.js ***!
  \******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('pages--title-desktop--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'pages--title--font-size',
      value: to,
      screen: 'desktop'
    });
  });
}); // Line Height

wp.customize('pages--title-desktop--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'pages--title--line-height',
      value: to,
      screen: 'desktop'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/pages/title-mobile/preview.js":
/*!*****************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/pages/title-mobile/preview.js ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('pages--title-mobile--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'pages--title--font-size',
      value: to,
      screen: 'default'
    });
  });
}); // Line Height

wp.customize('pages--title-mobile--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'pages--title--line-height',
      value: to,
      screen: 'default'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/pages/title-tablet/preview.js":
/*!*****************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/pages/title-tablet/preview.js ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('pages--title-tablet--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'pages--title--font-size',
      value: to,
      screen: 'tablet-and-up'
    });
  });
}); // Line Height

wp.customize('pages--title-tablet--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'pages--title--line-height',
      value: to,
      screen: 'tablet-and-up'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/pages/title/preview.js":
/*!**********************************************************************!*\
  !*** ./resources/js/customize-preview/panels/pages/title/preview.js ***!
  \**********************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Single Title Color

wp.customize('pages--title--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'pages--title--color',
      selector: '.entry__title--page',
      styles: {
        color: to
      }
    });
  });
}); // Single Title Font Size

wp.customize('pages--title--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'pages--title--font-size',
      value: to
    });
  });
}); // Font Styles

wp.customize('pages--title--font-styles', function (value) {
  value.bind(function (to) {
    var headingsStyles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'pages--title--font-styles',
      selector: '.entry__title--page',
      styles: headingsStyles
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/posts/meta/preview.js":
/*!*********************************************************************!*\
  !*** ./resources/js/customize-preview/panels/posts/meta/preview.js ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Meta Color
wp.customize('posts--meta--color', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'posts--meta--color',
      value: to
    });
  });
}); // Meta Icon Color

wp.customize('posts--meta--icon--color', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'posts--meta--icon--color',
      value: to
    });
  });
}); // Meta Font Size

wp.customize('posts--meta--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'posts--meta--font-size',
      value: to
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/posts/nav/preview.js":
/*!********************************************************************!*\
  !*** ./resources/js/customize-preview/panels/posts/nav/preview.js ***!
  \********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Link Color
wp.customize('posts--nav--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'posts--nav--color',
      selector: '.postnav__link a:link, .postnav__link a:visited',
      styles: {
        color: to
      }
    });
  });
}); // Link Color Hover

wp.customize('posts--nav--color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'posts--nav--color--hover',
      selector: '.postnav__link a:hover',
      styles: {
        color: to
      }
    });
  });
}); // Link Size

wp.customize('posts--nav--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'posts--nav--font-size',
      value: to
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/posts/panel.js":
/*!**************************************************************!*\
  !*** ./resources/js/customize-preview/panels/posts/panel.js ***!
  \**************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _title_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./title/preview.js */ "./resources/js/customize-preview/panels/posts/title/preview.js");
/* harmony import */ var _title_mobile_preview_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./title-mobile/preview.js */ "./resources/js/customize-preview/panels/posts/title-mobile/preview.js");
/* harmony import */ var _title_mobile_preview_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_title_mobile_preview_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _title_tablet_preview_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./title-tablet/preview.js */ "./resources/js/customize-preview/panels/posts/title-tablet/preview.js");
/* harmony import */ var _title_tablet_preview_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_title_tablet_preview_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _title_desktop_preview_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./title-desktop/preview.js */ "./resources/js/customize-preview/panels/posts/title-desktop/preview.js");
/* harmony import */ var _title_desktop_preview_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_title_desktop_preview_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _meta_preview_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./meta/preview.js */ "./resources/js/customize-preview/panels/posts/meta/preview.js");
/* harmony import */ var _meta_preview_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_meta_preview_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _nav_preview_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./nav/preview.js */ "./resources/js/customize-preview/panels/posts/nav/preview.js");
/* harmony import */ var _nav_preview_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_nav_preview_js__WEBPACK_IMPORTED_MODULE_5__);
/**
 * Add customizer panel js.
 *
 * This file contains the js functionality for the customizer preview.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */







/***/ }),

/***/ "./resources/js/customize-preview/panels/posts/title-desktop/preview.js":
/*!******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/posts/title-desktop/preview.js ***!
  \******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('posts--title-desktop--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'posts--title--font-size',
      value: to,
      screen: 'desktop'
    });
  });
}); // Line Height

wp.customize('posts--title-desktop--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'posts--title--line-height',
      value: to,
      screen: 'desktop'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/posts/title-mobile/preview.js":
/*!*****************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/posts/title-mobile/preview.js ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('posts--title-mobile--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'posts--title--font-size',
      value: to,
      screen: 'default'
    });
  });
}); // Line Height

wp.customize('posts--title-mobile--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'posts--title--line-height',
      value: to,
      screen: 'default'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/posts/title-tablet/preview.js":
/*!*****************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/posts/title-tablet/preview.js ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('posts--title-tablet--font-size', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'posts--title--font-size',
      value: to,
      screen: 'tablet-and-up'
    });
  });
}); // Line Height

wp.customize('posts--title-tablet--line-height', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'posts--title--line-height',
      value: to,
      screen: 'tablet-and-up'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/posts/title/preview.js":
/*!**********************************************************************!*\
  !*** ./resources/js/customize-preview/panels/posts/title/preview.js ***!
  \**********************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Single Title Color

wp.customize('posts--title--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'posts--title--color',
      selector: '.entry__title--single',
      styles: {
        color: to
      }
    });
  });
}); // Font Styles

wp.customize('posts--title--font-styles', function (value) {
  value.bind(function (to) {
    var headingsStyles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'posts--title--font-styles',
      selector: '.entry__title--single',
      styles: headingsStyles
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/site-identity/panel.js":
/*!**********************************************************************!*\
  !*** ./resources/js/customize-preview/panels/site-identity/panel.js ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Add customizer panel js.
 *
 * This file contains the js functionality for the customizer preview.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */
// import './default/preview.js';

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/body-desktop/preview.js":
/*!**********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/body-desktop/preview.js ***!
  \**********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--body-desktop--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--body--font-size',
        value: to,
        screen: 'desktop'
      });
    });
  });
}); // Line Height

wp.customize('typography--body-desktop--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--body--line-height',
        value: to,
        screen: 'desktop'
      });

      if (!to.includes('px')) {
        to += 'em';
      }

      rootstrap.var({
        name: 'typography--body--block-spacing',
        value: to,
        screen: 'desktop'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/body-mobile/preview.js":
/*!*********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/body-mobile/preview.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--body-mobile--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--body--font-size',
        value: to,
        screen: 'default'
      });
    });
  });
}); // Line Height

wp.customize('typography--body-mobile--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--body--line-height',
        value: to,
        screen: 'default'
      });

      if (!to.includes('px')) {
        to += 'em';
      }

      rootstrap.var({
        name: 'typography--body--block-spacing',
        value: to,
        screen: 'default'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/body-tablet/preview.js":
/*!*********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/body-tablet/preview.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--body-tablet--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--body--font-size',
        value: to,
        screen: 'tablet-and-up'
      });
    });
  });
}); // Line Height

wp.customize('typography--body-tablet--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--body--line-height',
        value: to,
        screen: 'tablet-and-up'
      });

      if (!to.includes('px')) {
        to += 'em';
      }

      rootstrap.var({
        name: 'typography--body--block-spacing',
        value: to,
        screen: 'tablet-and-up'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/body/preview.js":
/*!**************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/body/preview.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Family
wp.customize('typography--body--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'typography--body--font-family',
      value: to,
      screen: 'default'
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h1-desktop/preview.js":
/*!********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h1-desktop/preview.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h1-desktop--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h1--font-size',
        value: to,
        screen: 'desktop'
      });
    });
  });
}); // Line Height

wp.customize('typography--h1-desktop--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h1--line-height',
        value: to,
        screen: 'desktop'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h1-mobile/preview.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h1-mobile/preview.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h1-mobile--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h1--font-size',
        value: to,
        screen: 'default'
      });
    });
  });
}); // Line Height

wp.customize('typography--h1-mobile--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h1--line-height',
        value: to,
        screen: 'default'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h1-tablet/preview.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h1-tablet/preview.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h1-tablet--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h1--font-size',
        value: to,
        screen: 'tablet-and-up'
      });
    });
  });
}); // Line Height

wp.customize('typography--h1-tablet--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h1--line-height',
        value: to,
        screen: 'tablet-and-up'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h1/preview.js":
/*!************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h1/preview.js ***!
  \************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Text Color

wp.customize('typography--h1--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'typography--h1--color',
      selector: 'h1',
      styles: {
        'color': to
      }
    });
  });
}); // Font Family

wp.customize('typography--h1--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'typography--h1--font-family',
      selector: 'h1',
      styles: {
        'font-family': to
      }
    });
  });
}); // Font Styles

wp.customize('typography--h1--font-styles', function (value) {
  value.bind(function (to) {
    var h1Styles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'typography--h1--font-styles',
      selector: 'h1',
      styles: h1Styles
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h2-desktop/preview.js":
/*!********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h2-desktop/preview.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h2-desktop--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h2--font-size',
        value: to,
        screen: 'desktop'
      });
    });
  });
}); // Line Height

wp.customize('typography--h2-desktop--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h2--line-height',
        value: to,
        screen: 'desktop'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h2-mobile/preview.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h2-mobile/preview.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h2-mobile--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h2--font-size',
        value: to,
        screen: 'default'
      });
    });
  });
}); // Line Height

wp.customize('typography--h2-mobile--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h2--line-height',
        value: to,
        screen: 'default'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h2-tablet/preview.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h2-tablet/preview.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h2-tablet--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h2--font-size',
        value: to,
        screen: 'tablet-and-up'
      });
    });
  });
}); // Line Height

wp.customize('typography--h2-tablet--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h2--line-height',
        value: to,
        screen: 'tablet-and-up'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h2/preview.js":
/*!************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h2/preview.js ***!
  \************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Text Color

wp.customize('typography--h2--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'typography--h2--color',
      selector: 'h2',
      styles: {
        'color': to
      }
    });
  });
}); // Font Family

wp.customize('typography--h2--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'typography--h2--font-family',
      selector: 'h2',
      styles: {
        'font-family': to
      }
    });
  });
}); // Font Styles

wp.customize('typography--h2--font-styles', function (value) {
  value.bind(function (to) {
    var h2Styles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'typography--h2--font-styles',
      selector: 'h2',
      styles: h2Styles
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h3-desktop/preview.js":
/*!********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h3-desktop/preview.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h3-desktop--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h3--font-size',
        value: to,
        screen: 'desktop'
      });
    });
  });
}); // Line Height

wp.customize('typography--h3-desktop--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h3--line-height',
        value: to,
        screen: 'desktop'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h3-mobile/preview.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h3-mobile/preview.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h3-mobile--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h3--font-size',
        value: to,
        screen: 'default'
      });
    });
  });
}); // Line Height

wp.customize('typography--h3-mobile--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h3--line-height',
        value: to,
        screen: 'default'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h3-tablet/preview.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h3-tablet/preview.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h3-tablet--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h3--font-size',
        value: to,
        screen: 'tablet-and-up'
      });
    });
  });
}); // Line Height

wp.customize('typography--h3-tablet--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h3--line-height',
        value: to,
        screen: 'tablet-and-up'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h3/preview.js":
/*!************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h3/preview.js ***!
  \************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Text Color

wp.customize('typography--h3--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'typography--h3--color',
      selector: 'h3',
      styles: {
        'color': to
      }
    });
  });
}); // Font Family

wp.customize('typography--h3--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'typography--h3--font-family',
      selector: 'h3',
      styles: {
        'font-family': to
      }
    });
  });
}); // Font Styles

wp.customize('typography--h3--font-styles', function (value) {
  value.bind(function (to) {
    var h3Styles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'typography--h3--font-styles',
      selector: 'h3',
      styles: h3Styles
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h4-desktop/preview.js":
/*!********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h4-desktop/preview.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h4-desktop--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h4--font-size',
        value: to,
        screen: 'desktop'
      });
    });
  });
}); // Line Height

wp.customize('typography--h4-desktop--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h4--line-height',
        value: to,
        screen: 'desktop'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h4-mobile/preview.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h4-mobile/preview.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h4-mobile--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h4--font-size',
        value: to,
        screen: 'default'
      });
    });
  });
}); // Line Height

wp.customize('typography--h4-mobile--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h4--line-height',
        value: to,
        screen: 'default'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h4-tablet/preview.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h4-tablet/preview.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h4-tablet--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h4--font-size',
        value: to,
        screen: 'tablet-and-up'
      });
    });
  });
}); // Line Height

wp.customize('typography--h4-tablet--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h4--line-height',
        value: to,
        screen: 'tablet-and-up'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h4/preview.js":
/*!************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h4/preview.js ***!
  \************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Text Color

wp.customize('typography--h4--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'typography--h4--color',
      selector: 'h4',
      styles: {
        'color': to
      }
    });
  });
}); // Font Family

wp.customize('typography--h4--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'typography--h4--font-family',
      selector: 'h4',
      styles: {
        'font-family': to
      }
    });
  });
}); // Font Styles

wp.customize('typography--h4--font-styles', function (value) {
  value.bind(function (to) {
    var h4Styles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'typography--h4--font-styles',
      selector: 'h4',
      styles: h4Styles
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h5-desktop/preview.js":
/*!********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h5-desktop/preview.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h5-desktop--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h5--font-size',
        value: to,
        screen: 'desktop'
      });
    });
  });
}); // Line Height

wp.customize('typography--h5-desktop--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h5--line-height',
        value: to,
        screen: 'desktop'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h5-mobile/preview.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h5-mobile/preview.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h5-mobile--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h5--font-size',
        value: to,
        screen: 'default'
      });
    });
  });
}); // Line Height

wp.customize('typography--h5-mobile--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h5--line-height',
        value: to,
        screen: 'default'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h5-tablet/preview.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h5-tablet/preview.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h5-tablet--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h5--font-size',
        value: to,
        screen: 'tablet-and-up'
      });
    });
  });
}); // Line Height

wp.customize('typography--h5-tablet--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h5--line-height',
        value: to,
        screen: 'tablet-and-up'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h5/preview.js":
/*!************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h5/preview.js ***!
  \************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Text Color

wp.customize('typography--h5--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'typography--h5--color',
      selector: 'h5',
      styles: {
        'color': to
      }
    });
  });
}); // Font Family

wp.customize('typography--h5--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'typography--h5--font-family',
      selector: 'h5',
      styles: {
        'font-family': to
      }
    });
  });
}); // Font Styles

wp.customize('typography--h5--font-styles', function (value) {
  value.bind(function (to) {
    var h5Styles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'typography--h5--font-styles',
      selector: 'h5',
      styles: h5Styles
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h6-desktop/preview.js":
/*!********************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h6-desktop/preview.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h6-desktop--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h6--font-size',
        value: to,
        screen: 'desktop'
      });
    });
  });
}); // Line Height

wp.customize('typography--h6-desktop--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h6--line-height',
        value: to,
        screen: 'desktop'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h6-mobile/preview.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h6-mobile/preview.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h6-mobile--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h6--font-size',
        value: to,
        screen: 'default'
      });
    });
  });
}); // Line Height

wp.customize('typography--h6-mobile--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h6--line-height',
        value: to,
        screen: 'default'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h6-tablet/preview.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h6-tablet/preview.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--h6-tablet--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h6--font-size',
        value: to,
        screen: 'tablet-and-up'
      });
    });
  });
}); // Line Height

wp.customize('typography--h6-tablet--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--h6--line-height',
        value: to,
        screen: 'tablet-and-up'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/h6/preview.js":
/*!************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/h6/preview.js ***!
  \************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
 // Text Color

wp.customize('typography--h6--color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'typography--h6--color',
      selector: 'h6',
      styles: {
        'color': to
      }
    });
  });
}); // Font Family

wp.customize('typography--h6--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'typography--h6--font-family',
      selector: 'h6',
      styles: {
        'font-family': to
      }
    });
  });
}); // Font Styles

wp.customize('typography--h6--font-styles', function (value) {
  value.bind(function (to) {
    var h6Styles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'typography--h6--font-styles',
      selector: 'h6',
      styles: h6Styles
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/headings/preview.js":
/*!******************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/headings/preview.js ***!
  \******************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../functions-customize-preview.js */ "./resources/js/customize-preview/functions-customize-preview.js");
/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

var headingsSelector = 'h1, h2, h3, h4, h5, h6'; // Text Color

wp.customize('typography--headings--text-color', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'typography--headings--text-color',
      selector: headingsSelector,
      styles: {
        'color': to
      }
    });
  });
}); // Font Family

wp.customize('typography--headings--font-family', function (value) {
  value.bind(function (to) {
    rootstrap.style({
      id: 'typography--headings--font-family',
      selector: headingsSelector,
      styles: {
        'font-family': to
      }
    });
  });
}); // Font Styles

wp.customize('typography--headings--font-styles', function (value) {
  value.bind(function (to) {
    var headingsStyles = _functions_customize_preview_js__WEBPACK_IMPORTED_MODULE_0__["taprootFontStyles"](to);
    rootstrap.style({
      id: 'typography--headings--font-styles',
      selector: headingsSelector,
      styles: headingsStyles
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/links/preview.js":
/*!***************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/links/preview.js ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Link Color
wp.customize('typography--links--color', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'typography--links--color',
      value: to
    });
  });
}); // Link Color:visited

wp.customize('typography--links--color--visited', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'typography--links--color--visited',
      value: to
    });
  });
}); // Link Color:hover

wp.customize('typography--links--color--hover', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'typography--links--color--hover',
      value: to
    });
  });
}); // Link Color:active

wp.customize('typography--links--color--active', function (value) {
  value.bind(function (to) {
    rootstrap.var({
      name: 'typography--links--color--active',
      value: to
    });
  });
}); // Link Underline

wp.customize('typography--links--underline', function (value) {
  value.bind(function (to) {
    if ('underline' === to) {
      rootstrap.style({
        id: 'typography--links--underline',
        selector: 'a:link',
        styles: {
          'text-decoration': 'underline'
        }
      });
    } else if ('hover' === to) {
      rootstrap.style({
        id: 'typography--links--underline',
        selector: 'a:link',
        styles: {
          'text-decoration': 'none'
        }
      });
      rootstrap.style({
        id: 'typography--links--underline--hover',
        selector: 'a:hover, a:active',
        styles: {
          'text-decoration': 'underline'
        }
      });
    } else {
      rootstrap.style({
        id: 'typography--links--underline',
        selector: 'a:link, a:hover',
        styles: {
          'text-decoration': 'none'
        }
      });
    }
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/panel.js":
/*!*******************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/panel.js ***!
  \*******************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _body_preview_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./body/preview.js */ "./resources/js/customize-preview/panels/typography/body/preview.js");
/* harmony import */ var _body_preview_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_body_preview_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _body_mobile_preview_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./body-mobile/preview.js */ "./resources/js/customize-preview/panels/typography/body-mobile/preview.js");
/* harmony import */ var _body_mobile_preview_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_body_mobile_preview_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _body_tablet_preview_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./body-tablet/preview.js */ "./resources/js/customize-preview/panels/typography/body-tablet/preview.js");
/* harmony import */ var _body_tablet_preview_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_body_tablet_preview_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _body_desktop_preview_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./body-desktop/preview.js */ "./resources/js/customize-preview/panels/typography/body-desktop/preview.js");
/* harmony import */ var _body_desktop_preview_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_body_desktop_preview_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _headings_preview_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./headings/preview.js */ "./resources/js/customize-preview/panels/typography/headings/preview.js");
/* harmony import */ var _h1_preview_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./h1/preview.js */ "./resources/js/customize-preview/panels/typography/h1/preview.js");
/* harmony import */ var _h2_preview_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./h2/preview.js */ "./resources/js/customize-preview/panels/typography/h2/preview.js");
/* harmony import */ var _h3_preview_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./h3/preview.js */ "./resources/js/customize-preview/panels/typography/h3/preview.js");
/* harmony import */ var _h4_preview_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./h4/preview.js */ "./resources/js/customize-preview/panels/typography/h4/preview.js");
/* harmony import */ var _h5_preview_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./h5/preview.js */ "./resources/js/customize-preview/panels/typography/h5/preview.js");
/* harmony import */ var _h6_preview_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./h6/preview.js */ "./resources/js/customize-preview/panels/typography/h6/preview.js");
/* harmony import */ var _h1_mobile_preview_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./h1-mobile/preview.js */ "./resources/js/customize-preview/panels/typography/h1-mobile/preview.js");
/* harmony import */ var _h1_mobile_preview_js__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_h1_mobile_preview_js__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var _h2_mobile_preview_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./h2-mobile/preview.js */ "./resources/js/customize-preview/panels/typography/h2-mobile/preview.js");
/* harmony import */ var _h2_mobile_preview_js__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_h2_mobile_preview_js__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var _h3_mobile_preview_js__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./h3-mobile/preview.js */ "./resources/js/customize-preview/panels/typography/h3-mobile/preview.js");
/* harmony import */ var _h3_mobile_preview_js__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(_h3_mobile_preview_js__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var _h4_mobile_preview_js__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./h4-mobile/preview.js */ "./resources/js/customize-preview/panels/typography/h4-mobile/preview.js");
/* harmony import */ var _h4_mobile_preview_js__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(_h4_mobile_preview_js__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var _h5_mobile_preview_js__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ./h5-mobile/preview.js */ "./resources/js/customize-preview/panels/typography/h5-mobile/preview.js");
/* harmony import */ var _h5_mobile_preview_js__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(_h5_mobile_preview_js__WEBPACK_IMPORTED_MODULE_15__);
/* harmony import */ var _h6_mobile_preview_js__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ./h6-mobile/preview.js */ "./resources/js/customize-preview/panels/typography/h6-mobile/preview.js");
/* harmony import */ var _h6_mobile_preview_js__WEBPACK_IMPORTED_MODULE_16___default = /*#__PURE__*/__webpack_require__.n(_h6_mobile_preview_js__WEBPACK_IMPORTED_MODULE_16__);
/* harmony import */ var _h1_tablet_preview_js__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ./h1-tablet/preview.js */ "./resources/js/customize-preview/panels/typography/h1-tablet/preview.js");
/* harmony import */ var _h1_tablet_preview_js__WEBPACK_IMPORTED_MODULE_17___default = /*#__PURE__*/__webpack_require__.n(_h1_tablet_preview_js__WEBPACK_IMPORTED_MODULE_17__);
/* harmony import */ var _h2_tablet_preview_js__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! ./h2-tablet/preview.js */ "./resources/js/customize-preview/panels/typography/h2-tablet/preview.js");
/* harmony import */ var _h2_tablet_preview_js__WEBPACK_IMPORTED_MODULE_18___default = /*#__PURE__*/__webpack_require__.n(_h2_tablet_preview_js__WEBPACK_IMPORTED_MODULE_18__);
/* harmony import */ var _h3_tablet_preview_js__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ./h3-tablet/preview.js */ "./resources/js/customize-preview/panels/typography/h3-tablet/preview.js");
/* harmony import */ var _h3_tablet_preview_js__WEBPACK_IMPORTED_MODULE_19___default = /*#__PURE__*/__webpack_require__.n(_h3_tablet_preview_js__WEBPACK_IMPORTED_MODULE_19__);
/* harmony import */ var _h4_tablet_preview_js__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! ./h4-tablet/preview.js */ "./resources/js/customize-preview/panels/typography/h4-tablet/preview.js");
/* harmony import */ var _h4_tablet_preview_js__WEBPACK_IMPORTED_MODULE_20___default = /*#__PURE__*/__webpack_require__.n(_h4_tablet_preview_js__WEBPACK_IMPORTED_MODULE_20__);
/* harmony import */ var _h5_tablet_preview_js__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! ./h5-tablet/preview.js */ "./resources/js/customize-preview/panels/typography/h5-tablet/preview.js");
/* harmony import */ var _h5_tablet_preview_js__WEBPACK_IMPORTED_MODULE_21___default = /*#__PURE__*/__webpack_require__.n(_h5_tablet_preview_js__WEBPACK_IMPORTED_MODULE_21__);
/* harmony import */ var _h6_tablet_preview_js__WEBPACK_IMPORTED_MODULE_22__ = __webpack_require__(/*! ./h6-tablet/preview.js */ "./resources/js/customize-preview/panels/typography/h6-tablet/preview.js");
/* harmony import */ var _h6_tablet_preview_js__WEBPACK_IMPORTED_MODULE_22___default = /*#__PURE__*/__webpack_require__.n(_h6_tablet_preview_js__WEBPACK_IMPORTED_MODULE_22__);
/* harmony import */ var _h1_desktop_preview_js__WEBPACK_IMPORTED_MODULE_23__ = __webpack_require__(/*! ./h1-desktop/preview.js */ "./resources/js/customize-preview/panels/typography/h1-desktop/preview.js");
/* harmony import */ var _h1_desktop_preview_js__WEBPACK_IMPORTED_MODULE_23___default = /*#__PURE__*/__webpack_require__.n(_h1_desktop_preview_js__WEBPACK_IMPORTED_MODULE_23__);
/* harmony import */ var _h2_desktop_preview_js__WEBPACK_IMPORTED_MODULE_24__ = __webpack_require__(/*! ./h2-desktop/preview.js */ "./resources/js/customize-preview/panels/typography/h2-desktop/preview.js");
/* harmony import */ var _h2_desktop_preview_js__WEBPACK_IMPORTED_MODULE_24___default = /*#__PURE__*/__webpack_require__.n(_h2_desktop_preview_js__WEBPACK_IMPORTED_MODULE_24__);
/* harmony import */ var _h3_desktop_preview_js__WEBPACK_IMPORTED_MODULE_25__ = __webpack_require__(/*! ./h3-desktop/preview.js */ "./resources/js/customize-preview/panels/typography/h3-desktop/preview.js");
/* harmony import */ var _h3_desktop_preview_js__WEBPACK_IMPORTED_MODULE_25___default = /*#__PURE__*/__webpack_require__.n(_h3_desktop_preview_js__WEBPACK_IMPORTED_MODULE_25__);
/* harmony import */ var _h4_desktop_preview_js__WEBPACK_IMPORTED_MODULE_26__ = __webpack_require__(/*! ./h4-desktop/preview.js */ "./resources/js/customize-preview/panels/typography/h4-desktop/preview.js");
/* harmony import */ var _h4_desktop_preview_js__WEBPACK_IMPORTED_MODULE_26___default = /*#__PURE__*/__webpack_require__.n(_h4_desktop_preview_js__WEBPACK_IMPORTED_MODULE_26__);
/* harmony import */ var _h5_desktop_preview_js__WEBPACK_IMPORTED_MODULE_27__ = __webpack_require__(/*! ./h5-desktop/preview.js */ "./resources/js/customize-preview/panels/typography/h5-desktop/preview.js");
/* harmony import */ var _h5_desktop_preview_js__WEBPACK_IMPORTED_MODULE_27___default = /*#__PURE__*/__webpack_require__.n(_h5_desktop_preview_js__WEBPACK_IMPORTED_MODULE_27__);
/* harmony import */ var _h6_desktop_preview_js__WEBPACK_IMPORTED_MODULE_28__ = __webpack_require__(/*! ./h6-desktop/preview.js */ "./resources/js/customize-preview/panels/typography/h6-desktop/preview.js");
/* harmony import */ var _h6_desktop_preview_js__WEBPACK_IMPORTED_MODULE_28___default = /*#__PURE__*/__webpack_require__.n(_h6_desktop_preview_js__WEBPACK_IMPORTED_MODULE_28__);
/* harmony import */ var _links_preview_js__WEBPACK_IMPORTED_MODULE_29__ = __webpack_require__(/*! ./links/preview.js */ "./resources/js/customize-preview/panels/typography/links/preview.js");
/* harmony import */ var _links_preview_js__WEBPACK_IMPORTED_MODULE_29___default = /*#__PURE__*/__webpack_require__.n(_links_preview_js__WEBPACK_IMPORTED_MODULE_29__);
/* harmony import */ var _sidebar_mobile_preview_js__WEBPACK_IMPORTED_MODULE_30__ = __webpack_require__(/*! ./sidebar-mobile/preview.js */ "./resources/js/customize-preview/panels/typography/sidebar-mobile/preview.js");
/* harmony import */ var _sidebar_mobile_preview_js__WEBPACK_IMPORTED_MODULE_30___default = /*#__PURE__*/__webpack_require__.n(_sidebar_mobile_preview_js__WEBPACK_IMPORTED_MODULE_30__);
/* harmony import */ var _sidebar_tablet_preview_js__WEBPACK_IMPORTED_MODULE_31__ = __webpack_require__(/*! ./sidebar-tablet/preview.js */ "./resources/js/customize-preview/panels/typography/sidebar-tablet/preview.js");
/* harmony import */ var _sidebar_tablet_preview_js__WEBPACK_IMPORTED_MODULE_31___default = /*#__PURE__*/__webpack_require__.n(_sidebar_tablet_preview_js__WEBPACK_IMPORTED_MODULE_31__);
/* harmony import */ var _sidebar_desktop_preview_js__WEBPACK_IMPORTED_MODULE_32__ = __webpack_require__(/*! ./sidebar-desktop/preview.js */ "./resources/js/customize-preview/panels/typography/sidebar-desktop/preview.js");
/* harmony import */ var _sidebar_desktop_preview_js__WEBPACK_IMPORTED_MODULE_32___default = /*#__PURE__*/__webpack_require__.n(_sidebar_desktop_preview_js__WEBPACK_IMPORTED_MODULE_32__);
/**
 * Add customizer panel js.
 *
 * This file contains the js functionality for the customizer preview.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


































/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/sidebar-desktop/preview.js":
/*!*************************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/sidebar-desktop/preview.js ***!
  \*************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--sidebar-desktop--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--sidebar--font-size',
        value: to,
        screen: 'desktop'
      });
    });
  });
}); // Line Height

wp.customize('typography--sidebar-desktop--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--sidebar--line-height',
        value: to,
        screen: 'desktop'
      });

      if (!to.includes('px')) {
        to += 'em';
      }

      rootstrap.var({
        name: 'typography--sidebar--block-spacing',
        value: to,
        screen: 'desktop'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/sidebar-mobile/preview.js":
/*!************************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/sidebar-mobile/preview.js ***!
  \************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--sidebar-mobile--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--sidebar--font-size',
        value: to,
        screen: 'default'
      });
    });
  });
}); // Line Height

wp.customize('typography--sidebar-mobile--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--sidebar--line-height',
        value: to,
        screen: 'default'
      });

      if (!to.includes('px')) {
        to += 'em';
      }

      rootstrap.var({
        name: 'typography--sidebar--block-spacing',
        value: to,
        screen: 'default'
      });
    });
  });
});

/***/ }),

/***/ "./resources/js/customize-preview/panels/typography/sidebar-tablet/preview.js":
/*!************************************************************************************!*\
  !*** ./resources/js/customize-preview/panels/typography/sidebar-tablet/preview.js ***!
  \************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
// Font Size
wp.customize('typography--sidebar-tablet--font-size', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--sidebar--font-size',
        value: to,
        screen: 'tablet-and-up'
      });
    });
  });
}); // Line Height

wp.customize('typography--sidebar-tablet--line-height', function (value) {
  value.bind(function (to) {
    value.bind(function (to) {
      rootstrap.var({
        name: 'typography--sidebar--line-height',
        value: to,
        screen: 'tablet-and-up'
      });

      if (!to.includes('px')) {
        to += 'em';
      }

      rootstrap.var({
        name: 'typography--sidebar--block-spacing',
        value: to,
        screen: 'tablet-and-up'
      });
    });
  });
});

/***/ }),

/***/ 2:
/*!*************************************************!*\
  !*** multi ./resources/js/customize-preview.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/sky/Repos/skyshab/taproot/resources/js/customize-preview.js */"./resources/js/customize-preview.js");


/***/ })

/******/ });
//# sourceMappingURL=customize-preview.js.map