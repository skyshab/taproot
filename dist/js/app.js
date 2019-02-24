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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _app_header_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./app/header.js */ "./resources/js/app/header.js");
/* harmony import */ var _app_header_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_app_header_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _app_footer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./app/footer.js */ "./resources/js/app/footer.js");
/* harmony import */ var _app_footer_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_app_footer_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _app_nav_menus_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./app/nav-menus.js */ "./resources/js/app/nav-menus.js");
/* harmony import */ var _app_nav_menus_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_app_nav_menus_js__WEBPACK_IMPORTED_MODULE_2__);
/**
 * Primary front-end script.
 *
 * Primary JavaScript file. Any includes or anything imported should
 * be filtered through this file and eventually saved back into the
 * `/dist/js/app.js` file.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


 // import './app/smooth-scroll.js';

/***/ }),

/***/ "./resources/js/app/footer.js":
/*!************************************!*\
  !*** ./resources/js/app/footer.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * Primary front-end script.
 *
 * Primary JavaScript file. Any includes or anything imported should
 * be filtered through this file and eventually saved back into the
 * `/dist/js/app.js` file.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

/**
 * Navigation Menu Interactions
 */
var TaprootFooter =
/*#__PURE__*/
function () {
  /**
   * Initiate class
   */
  function TaprootFooter() {
    _classCallCheck(this, TaprootFooter);

    this.body = document.querySelector('body');
    this.app = document.querySelector('.app');
    this.header = document.querySelector('.app-header');
    this.footer = document.querySelector('.app-footer');
    this.hasFixedFooter = this.footer.classList.contains('app-footer--has-fixed');
    this.windowHeight = window.innerHeight;

    if (this.hasFixedFooter) {
      this.listeners();
    }
  }
  /**
   * Add event listeners
   */


  _createClass(TaprootFooter, [{
    key: "listeners",
    value: function listeners() {
      var _this = this;

      window.addEventListener('load', function () {
        _this.fixedFooter();
      });
      window.addEventListener('resize', function () {
        _this.windowHeight = window.innerHeight;

        _this.fixedFooter();
      });
    }
    /**
     * Fixed footer toggle
     */

  }, {
    key: "fixedFooter",
    value: function fixedFooter() {
      var footerHeight = this.footer.offsetHeight;

      if (this.body.offsetWidth < 1025) {
        this.app.style.marginBottom = '';
        this.footer.classList.remove('app-footer--fixed');
      } else {
        if (footerHeight + 250 < this.windowHeight) {
          this.app.style.marginBottom = Math.floor(footerHeight) + 'px';
          this.footer.classList.add('app-footer--fixed');
        } else {
          this.app.style.marginBottom = '';
          this.footer.classList.remove('app-footer--fixed');
        }
      }
    }
  }]);

  return TaprootFooter;
}();
/**
 * Run on document ready
 */


document.addEventListener("DOMContentLoaded", function () {
  var taprootFooter = new TaprootFooter();
});

/***/ }),

/***/ "./resources/js/app/header.js":
/*!************************************!*\
  !*** ./resources/js/app/header.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * Fixed header script.
 *
 * This file handles the front end fixed header functionality.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

/**
 * Fixed Header Class
 */
var TaprootHeader =
/*#__PURE__*/
function () {
  /**
   * Initiate class
   */
  function TaprootHeader() {
    _classCallCheck(this, TaprootHeader);

    this.html = document.querySelector('html');
    this.body = document.querySelector('body');
    this.app = document.querySelector('.app');
    this.header = document.querySelector('.app-header');
    this.hasAdminBar = this.body.classList.contains('admin-bar');
    this.hasCustomHeader = this.body.classList.contains('custom-header');
    this.windowHeight = window.innerHeight;
    this.scrolledVal = 0;
    this.fixedHeaderType = false; // set fixed header type

    if (this.header.classList.contains('fixed-type--fade')) {
      this.fixedHeaderType = 'fade';
    } else if (this.header.classList.contains('fixed-type--slide')) {
      this.fixedHeaderType = 'slide';
    } else if (this.header.classList.contains('fixed-type--sticky')) {
      this.fixedHeaderType = 'sticky';
    } // if fixed header is set, add event listeners


    if (this.fixedHeaderType) this.listeners();
  }
  /**
   * Add listeners
   */


  _createClass(TaprootHeader, [{
    key: "listeners",
    value: function listeners() {
      var _this = this;

      window.addEventListener('scroll', function () {
        _this.headerCheck();
      }, {
        passive: true
      });
      window.addEventListener('load', function () {
        _this.headerCheck();
      });
      window.addEventListener('resize', function () {
        _this.windowHeight = window.innerHeight;

        _this.headerCheck();
      });
    }
    /**
     *  Run check on header to see if it needs to be fixed/unfixed
     */

  }, {
    key: "headerCheck",
    value: function headerCheck() {
      // if screen is not wide enough, unfix and bail
      if (this.body.offsetWidth < 1025) {
        if (this.header.classList.contains('app-header--fixed')) {
          this.unFixTheHeader();
        }

        return;
      } // if we're already animating the header, don't run again


      if (this.header.classList.contains('is-animating')) return; // store the distance scrolled from top

      var scrolled = window.pageYOffset | document.body.scrollTop; // fix the header if scrolled far enough
      // if page has custom header

      if (this.hasCustomHeader) {
        if (this.header.classList.contains('app-header--static')) {
          if (scrolled > window.innerHeight + 200) {
            this.fixTheHeader();
          }
        } else if (this.header.classList.contains('app-header--fixed')) {
          if (scrolled <= window.innerHeight + 200) {
            this.unFixTheHeader();
          }
        }
      } else if (this.app.getBoundingClientRect().top < -1 * (this.header.offsetHeight + 200)) {
        if (this.header.classList.contains('app-header--static')) {
          this.fixTheHeader();
        }
      } // otherwise, unfix if fixed
      else if (this.header.classList.contains('app-header--fixed')) {
          this.unFixTheHeader();
        } // store the value for next run to check direction


      this.scrolledVal = scrolled <= 0 ? 0 : scrolled;
    }
    /**
     *  Fix the header
     */

  }, {
    key: "fixTheHeader",
    value: function fixTheHeader() {
      if (this.body.offsetWidth < 1025) return;

      if (this.fixedHeaderType === 'slide') {
        this.slideInDown();
      } else if (this.fixedHeaderType === 'fade') {
        this.fadeIn();
      } else if (this.fixedHeaderType === 'sticky') {
        this.header.classList.add('app-header--fixed');
        this.header.classList.remove('app-header--static');
      }
    }
    /**
     *  Unfix the header
     */

  }, {
    key: "unFixTheHeader",
    value: function unFixTheHeader() {
      if (this.fixedHeaderType === 'slide') {
        this.slideUpOut();
      } else if (this.fixedHeaderType === 'fade') {
        this.fadeOut();
      } else {
        this.header.classList.remove('app-header--fixed');
        this.header.classList.add('app-header--static');
      }
    }
    /**
     * Slide Header in from top
     */

  }, {
    key: "slideInDown",
    value: function slideInDown() {
      var self = this;
      var duration = 500;
      var startTime = null;
      self.header.classList.add("is-animating");
      self.app.style.paddingTop = self.header.offsetHeight + 'px'; // add header classes

      self.header.classList.add("app-header--fixed");
      self.header.classList.remove("app-header--static"); // get the header height

      var distance = self.header.offsetHeight;
      var startPosition = -1 * distance; // setup styles

      self.header.style.transform = 'translateY(' + startPosition + 'px)';
      self.header.style.top = this.adminBarOffset() + 'px'; // our animation function

      var slide = function slide(currentTime) {
        if (startTime === null) startTime = currentTime;
        var timeElapsed = currentTime - startTime;
        var currentDistance = self.ease(timeElapsed, startPosition, distance, duration); // make sure we don't overshoot our target

        if (currentDistance <= 0) {
          self.header.style.transform = 'translateY(' + currentDistance + 'px)';
        } else {
          self.header.style.transform = 'translateY(0px)';
        } // if we're still in the timeframe of the animation, call it again


        if (timeElapsed < duration) requestAnimationFrame(slide); // otherwise, remove animating flag
        else {
            self.header.classList.remove("is-animating");
            self.header.style.transform = '';
          }
      }; // initiate animation


      self.animation = requestAnimationFrame(slide);
    }
    /**
     * Slide header out
     */

  }, {
    key: "slideUpOut",
    value: function slideUpOut() {
      var self = this;
      var duration = 400;
      var distance = self.header.offsetHeight + 25; // adding a bit extra here fixes an issue in Safari

      var change = -1 * distance;
      var appContent = document.querySelector('.app-content');
      var startTime = null; // add flag to prevent animation from being retriggered while running

      self.header.classList.add("is-animating"); // our animation function

      var slide = function slide(currentTime) {
        if (startTime === null) startTime = currentTime;
        var timeElapsed = currentTime - startTime;
        var currentDistance = self.ease(timeElapsed, 0, change, duration); // define actions to perform when clearing animation

        var clear = function clear() {
          self.header.style.transform = '';
          self.header.style.top = '';
          self.app.style.paddingTop = '';
          self.header.classList.remove("app-header--fixed");
          self.header.classList.add("app-header--static");
          self.header.classList.remove("is-animating");
        }; // if we've scrolled to where the header should be,
        // clean up and stop the animation


        if (appContent.getBoundingClientRect().top >= self.adminBarOffset()) {
          clear();
          cancelAnimationFrame(self.animation);
          return;
        } // add the next animation style


        self.header.style.transform = 'translateY(' + currentDistance + 'px)'; // if we're still in the timeframe of the animation, call it again

        if (timeElapsed < duration) requestAnimationFrame(slide); // otherwise, clean up before we leave
        else clear();
      }; // initiate animation


      self.animation = requestAnimationFrame(slide);
    }
    /**
     * Fade Header in
     */

  }, {
    key: "fadeIn",
    value: function fadeIn() {
      var self = this;
      var duration = 500;
      var startTime = null;
      var unfixedHeight = self.header.offsetHeight + 'px'; // set the padding on the app and handle classes

      self.header.classList.add("is-animating");
      self.header.style.opacity = '0';
      self.header.style.top = this.adminBarOffset() + 'px';
      self.header.classList.remove("app-header--static");
      self.header.classList.add("app-header--fixed");
      self.app.style.paddingTop = unfixedHeight; // our animation function

      var fade = function fade(currentTime) {
        if (startTime === null) startTime = currentTime;
        var timeElapsed = currentTime - startTime; // add the next animation style

        self.header.style.opacity = self.ease(timeElapsed, 0, 1, duration); // if we're still in the timeframe of the animation, call it again

        if (timeElapsed <= duration) {
          requestAnimationFrame(fade);
        } // otherwise, clean up before we leave
        else {
            self.header.style.opacity = '';
            self.header.classList.remove("is-animating");
          }
      }; // initiate animation


      self.animation = requestAnimationFrame(fade);
    }
    /**
     * Fade header out
     */

  }, {
    key: "fadeOut",
    value: function fadeOut() {
      var self = this;
      var duration = 400;
      var appContent = document.querySelector('.app-content');
      var startTime = null; // set animating flag

      self.header.classList.add("is-animating"); // our animation function

      var fade = function fade(currentTime) {
        if (startTime === null) startTime = currentTime;
        var timeElapsed = currentTime - startTime;
        var contentTop = appContent.getBoundingClientRect().top; // define actions to perform when clearing animation

        var clear = function clear() {
          self.app.style.paddingTop = '';
          self.header.classList.add("app-header--static");
          self.header.classList.remove("app-header--fixed");
          self.header.style.top = '';
          self.header.style.opacity = '';
          self.header.classList.remove("is-animating");
        }; // if we've scrolled to where the header should be,
        // clean up and stop the animation


        if (contentTop >= self.adminBarOffset()) {
          clear();
          cancelAnimationFrame(self.animation);
          return;
        } // add the next animation style


        self.header.style.opacity = self.ease(timeElapsed, 1, -1, duration); // if we're still in the timeframe of the animation, call it again

        if (timeElapsed < duration) requestAnimationFrame(fade); // otherwise, clean up before we leave
        else clear();
      }; // initiate animation


      self.animation = requestAnimationFrame(fade);
    }
    /** 
     * Easing function.
     * "sinusoidal ease in out"
     */

  }, {
    key: "ease",
    value: function ease(t, b, c, d) {
      return -c / 2 * (Math.cos(Math.PI * t / d) - 1) + b;
    }
    /**
     * Calculate admin bar height if set
     */

  }, {
    key: "adminBarOffset",
    value: function adminBarOffset() {
      return this.hasAdminBar ? this.html.offsetTop : 0;
    }
  }]);

  return TaprootHeader;
}();
/**
 *  Instantiate our class on document ready
 */


document.addEventListener("DOMContentLoaded", function () {
  var taprootHeader = new TaprootHeader();
});

/***/ }),

/***/ "./resources/js/app/nav-menus.js":
/*!***************************************!*\
  !*** ./resources/js/app/nav-menus.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * Primary front-end script.
 *
 * Primary JavaScript file. Any includes or anything imported should
 * be filtered through this file and eventually saved back into the
 * `/dist/js/app.js` file.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

/**
 * Navigation Menu Interactions
 */
var NavMenus =
/*#__PURE__*/
function () {
  /**
   * Initiate class
   */
  function NavMenus() {
    _classCallCheck(this, NavMenus);

    this.html = document.querySelector('html');
    this.body = document.querySelector('body');
    this.app = document.querySelector('.app');
    this.header = document.querySelector('.app-header');
    this.isBoxedLayout = this.header.classList.contains('boxed-layout');
    this.hasAdminBar = this.body.classList.contains('admin-bar');
    this.scrollElems = document.querySelectorAll('.menu__item--current > a[href*=\\#]');
    this.slideWidth = 300;
    this.animation = null;
    this.startTime = null;
    this.dropdowns();
    this.toggles();
    this.listeners();
  }
  /**
   * Run event listeners
   */


  _createClass(NavMenus, [{
    key: "listeners",
    value: function listeners() {
      var self = this;
      window.addEventListener('resize', function () {
        self.clear();
      });
      self.scrollElems.forEach(function (el) {
        el.addEventListener('click', function (e) {
          var targetId = e.target.href.split('#')[1];
          var target = document.getElementById(targetId);
          if (!target) return;
          e.preventDefault();
          var nav = e.target.closest('nav');
          var menu = e.target.closest('.menu__items');
          var toggle = nav.querySelector('.menu--toggle');
          var isSlideNav = nav.classList.contains('mobile-type-slide');
          var isOpen = menu.classList.contains('is-open');

          if (isSlideNav && isOpen) {
            var slideSide = nav.classList.contains('menu--right') ? 'right' : 'left';

            if (slideSide === 'left') {
              self.slideClosedLeft(menu, 500, function () {
                toggle.classList.remove('is-open');
                self.scrollTo(target);
              });
            } else {
              self.slideClosedRight(menu, 500, function () {
                toggle.classList.remove('is-open');
                self.scrollTo(target);
              });
            }
          } else {
            self.scrollTo(target);
          }
        });
      });
    }
    /**
     * Submenu Dropdowns
     */

  }, {
    key: "dropdowns",
    value: function dropdowns() {
      var self = this;
      document.querySelectorAll('.dropdown-target').forEach(function (elem) {
        elem.addEventListener('click', function (e) {
          e.preventDefault();
          var theTarget = e.currentTarget,
              parentItem = theTarget.closest('.menu__item.has-children'),
              subMenu = parentItem.querySelector('.menu__sub-menu'); // if we're already animating the submenu, don't run again

          if (subMenu.classList.contains('is-animating')) return;
          parentItem.classList.toggle('is-open');
          theTarget.classList.toggle('is-open');

          if (parentItem.classList.contains('is-open')) {
            self.slideOpen(subMenu, 600);
          } else {
            self.slideClosed(subMenu, 600);
          }
        });
      });
    }
    /**
     * Menu Toggles
     */

  }, {
    key: "toggles",
    value: function toggles() {
      var self = this;
      var togglesArray = document.querySelectorAll('.menu--toggle');
      togglesArray.forEach(function (elem) {
        elem.addEventListener('click', function (e) {
          var toggle = e.currentTarget,
              menu = toggle.nextElementSibling,
              nav = toggle.closest('nav'); // if we're already animating the menu, don't run again

          if (menu.classList.contains('is-animating')) return;
          toggle.classList.toggle('is-open');

          if (nav.classList.contains('mobile-type-dropdown-slide')) {
            if (toggle.classList.contains('is-open')) {
              self.slideOpen(menu, 500);
            } else {
              self.slideClosed(menu, 500);
            }
          } else if (nav.classList.contains('mobile-type-dropdown-fade')) {
            if (toggle.classList.contains('is-open')) {
              self.fadeIn(menu, 500);
            } else {
              self.fadeOut(menu, 500);
            }
          } else if (nav.classList.contains('mobile-type-slide')) {
            var slideSide = nav.classList.contains('menu--right') ? 'right' : 'left';

            if (toggle.classList.contains('is-open')) {
              if (slideSide === 'left') {
                self.slideOpenLeft(menu, 700);
              } else {
                self.slideOpenRight(menu, 700);
              }
            } else {
              if (slideSide === 'left') {
                self.slideClosedLeft(menu, 700);
              } else {
                self.slideClosedRight(menu, 700);
              }
            }
          } else if (nav.classList.contains('mobile-type-fullscreen')) {
            if (toggle.classList.contains('is-open')) {
              self.fadeIn(menu, 500);
            } else {
              self.fadeOut(menu, 500);
            }
          }
        });
      });
    }
    /**
     * Slide element open
     */

  }, {
    key: "slideOpen",
    value: function slideOpen(el, duration) {
      var self = this;
      var height = self.getHeight(el);
      var startTime = null;
      el.style.height = '0px';
      el.classList.add('is-open');
      el.classList.add('is-animating');

      var slide = function slide(currentTime) {
        if (startTime === null) startTime = currentTime;
        var timeElapsed = currentTime - startTime; // add next animation style

        el.style.height = self.ease(timeElapsed, 0, height, duration) + 'px'; // if we're still in the timeframe of the animation, call it again

        if (timeElapsed < duration) requestAnimationFrame(slide); // otherwise, remove animating flag
        else {
            el.style.height = '';
            el.classList.remove('is-animating');
          }
      };

      self.animation = requestAnimationFrame(slide);
    }
    /**
     * Slide element closed
     */

  }, {
    key: "slideClosed",
    value: function slideClosed(el, duration) {
      var self = this;
      var startHeight = el.scrollHeight;
      var startTime = null;
      el.classList.add('is-animating');

      var slide = function slide(currentTime) {
        if (startTime === null) startTime = currentTime;
        var timeElapsed = currentTime - startTime; // add next animation style

        el.style.height = self.ease(timeElapsed, startHeight, -1 * startHeight, duration) + 'px'; // if we're still in the timeframe of the animation, call it again

        if (timeElapsed < duration) requestAnimationFrame(slide); // otherwise, clean up before leaving
        else {
            el.classList.remove('is-open');
            el.style.height = '';
            el.classList.remove('is-animating');
          }
      };

      self.animation = requestAnimationFrame(slide);
    }
    /**
     * Fade element in
     */

  }, {
    key: "fadeIn",
    value: function fadeIn(el, duration) {
      var self = this;
      var startTime = null;
      self.body.classList.add('noscroll');
      el.classList.add('is-animating');
      el.classList.add('is-open');
      el.style.opacity = '0';

      var fade = function fade(currentTime) {
        if (startTime === null) startTime = currentTime;
        var timeElapsed = currentTime - startTime; // add next animation style

        el.style.opacity = self.ease(timeElapsed, 0, 1, duration); // if we're still in the timeframe of the animation, call it again

        if (timeElapsed < duration) requestAnimationFrame(fade); // otherwise, clean up before leaving            
        else {
            el.style.opacity = '';
            el.classList.remove('is-animating');
          }
      };

      self.animation = requestAnimationFrame(fade);
    }
    /**
     * Fade element out
     */

  }, {
    key: "fadeOut",
    value: function fadeOut(el, duration) {
      var self = this;
      var startTime = null; // add animating flag

      el.classList.add('is-animating');

      var fade = function fade(currentTime) {
        if (startTime === null) startTime = currentTime;
        var timeElapsed = currentTime - startTime; // add the next animation style

        el.style.opacity = self.ease(timeElapsed, 1, -1, duration); // if we're still in the timeframe of the animation, call it again

        if (timeElapsed < duration) requestAnimationFrame(fade); // otherwise, clean up before leaving
        else {
            el.classList.remove('is-open');
            el.style.opacity = '';
            self.body.classList.remove('noscroll');
            el.classList.remove('is-animating');
          }
      };

      self.animation = requestAnimationFrame(fade);
    }
    /**
     * Slide open left
     */

  }, {
    key: "slideOpenLeft",
    value: function slideOpenLeft(el, duration) {
      var self = this;
      var startTime = null;
      var topSpace = self.app.getBoundingClientRect().top - self.body.getBoundingClientRect().top;
      var maxHeight = self.app.offsetHeight + self.app.getBoundingClientRect().top - self.adminBarOffset();
      self.body.classList.add('noscroll');
      el.classList.add('is-animating');

      if (maxHeight <= window.innerHeight) {
        el.style.maxHeight = maxHeight + 'px';
      } else {
        el.style.maxHeight = window.innerHeight - self.adminBarOffset() + 'px';
      }

      el.style.top = window.scrollY > topSpace ? window.scrollY - topSpace + 'px' : '0px';
      self.app.style.transform = 'translateZ(0)';
      el.classList.add('is-open');

      var slide = function slide(currentTime) {
        if (startTime === null) startTime = currentTime;
        var timeElapsed = currentTime - startTime;
        var currentDistance = self.ease(timeElapsed, 0, self.slideWidth, duration);

        if (currentDistance <= self.slideWidth) {
          el.style.transform = 'translateX(-' + currentDistance + 'px)';
          self.app.style.transform = 'translateX(' + currentDistance + 'px)';
        } else {
          el.style.transform = 'translateX(-' + self.slideWidth + 'px)';
          self.app.style.transform = 'translateX(' + self.slideWidth + 'px)';
        } // if we're still in the timeframe of the animation, call it again


        if (timeElapsed < duration) requestAnimationFrame(slide); // otherwise, clean up before leaving
        else {
            el.classList.remove('is-animating');
          }
      };

      self.animation = requestAnimationFrame(slide);
    }
    /**
     * Slide closed left
     */

  }, {
    key: "slideClosedLeft",
    value: function slideClosedLeft(el, duration) {
      var callback = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};
      var self = this;
      var startTime = null;

      var slide = function slide(currentTime) {
        if (startTime === null) startTime = currentTime;
        var timeElapsed = currentTime - startTime;
        var currentDistance = self.ease(timeElapsed, self.slideWidth, -1 * self.slideWidth, duration); // add animating flag

        el.classList.add('is-animating');

        if (currentDistance >= 0) {
          el.style.transform = 'translateX(-' + currentDistance + 'px)';
          self.app.style.transform = 'translateX(' + currentDistance + 'px)';
        } else {
          el.style.transform = 'translateX(0)';
          self.app.style.transform = 'translateX(0)';
        } // if we're still in the timeframe of the animation, call it again


        if (timeElapsed < duration) {
          requestAnimationFrame(slide);
        } // otherwise, clean up before leaving
        else {
            el.style.top = '';
            el.style.maxHeight = '';
            self.app.style.transform = '';
            el.classList.remove('is-open');
            self.body.classList.remove('noscroll');
            el.classList.remove('is-animating'); // Run callback if it is a function

            if (typeof callback === "function") {
              callback();
            }
          }
      };

      self.animation = requestAnimationFrame(slide);
    }
    /**
     * Slide open right
     */

  }, {
    key: "slideOpenRight",
    value: function slideOpenRight(el, duration) {
      var self = this;
      var startTime = null;
      var topSpace = self.app.getBoundingClientRect().top - self.body.getBoundingClientRect().top;
      var maxHeight = self.app.offsetHeight + self.app.getBoundingClientRect().top - self.adminBarOffset();
      self.body.classList.add('noscroll');
      el.classList.add('is-animating');

      if (maxHeight <= window.innerHeight) {
        el.style.maxHeight = maxHeight + 'px';
      } else {
        el.style.maxHeight = window.innerHeight - self.adminBarOffset() + 'px';
      }

      el.style.top = window.scrollY > topSpace ? window.scrollY - topSpace + 'px' : '0px';
      self.app.style.transform = 'translateZ(0)';
      el.classList.add('is-open');

      var slide = function slide(currentTime) {
        if (startTime === null) startTime = currentTime;
        var timeElapsed = currentTime - startTime;
        var currentDistance = self.ease(timeElapsed, 0, self.slideWidth, duration);

        if (currentDistance <= self.slideWidth) {
          el.style.transform = 'translateX(' + currentDistance + 'px)';
          self.app.style.transform = 'translateX(-' + currentDistance + 'px)';
        } else {
          el.style.transform = 'translateX(' + self.slideWidth + 'px)';
          self.app.style.transform = 'translateX(-' + self.slideWidth + 'px)';
        } // if we're still in the timeframe of the animation, call it again


        if (timeElapsed < duration) requestAnimationFrame(slide);else {
          el.classList.remove('is-animating');
        }
      };

      self.animation = requestAnimationFrame(slide);
    }
    /**
     * Slide closed right
     */

  }, {
    key: "slideClosedRight",
    value: function slideClosedRight(el, duration) {
      var callback = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};
      var self = this;
      var startTime = null;

      var slide = function slide(currentTime) {
        if (startTime === null) startTime = currentTime;
        var timeElapsed = currentTime - startTime;
        var currentDistance = self.ease(timeElapsed, self.slideWidth, -1 * self.slideWidth, duration); // add animating flag

        el.classList.add('is-animating');

        if (currentDistance >= 0) {
          el.style.transform = 'translateX(' + currentDistance + 'px)';
          self.app.style.transform = 'translateX(-' + currentDistance + 'px)';
        } else {
          el.style.transform = 'translateX(0)';
          self.app.style.transform = 'translateX(0)';
        } // if we're still in the timeframe of the animation, call it again


        if (timeElapsed < duration) {
          requestAnimationFrame(slide);
        } // otherwise, clean up before leaving
        else {
            el.style.top = '';
            el.style.maxHeight = '';
            self.app.style.transform = '';
            self.body.classList.remove('noscroll');
            el.classList.remove('is-open');
            el.classList.remove('is-animating'); // Run callback if is a function

            if (typeof callback === "function") {
              callback();
            }
          }
      };

      self.animation = requestAnimationFrame(slide);
    }
    /**
     * Smooth scroll page to the top of the element
     */

  }, {
    key: "scrollTo",
    value: function scrollTo(target) {
      var self = this;
      var startPosition = window.pageYOffset;
      var scrollTarget = target.getBoundingClientRect().top - self.getScrollOffset();
      var startTime = null;

      var scroll = function scroll(currentTime) {
        if (startTime === null) startTime = currentTime;
        var timeElapsed = currentTime - startTime;
        window.scrollTo(0, self.ease(timeElapsed, startPosition, scrollTarget, 1000));
        if (timeElapsed < 1000) requestAnimationFrame(scroll);
      };

      self.animation = requestAnimationFrame(scroll);
    }
    /**
     * Calculate scroll offset
     */

  }, {
    key: "getScrollOffset",
    value: function getScrollOffset() {
      var isFixedHeader = this.header.classList.contains('app-header--has-fixed'); // if admin bar, include admin bar height

      var offset = this.hasAdminBar ? this.html.offsetTop : 0; // if fixed header, include header height

      if (isFixedHeader) {
        offset = offset + this.header.offsetHeight;
      }

      return offset;
    }
    /**
     * easing function
     * Uses easeInOutCubic
     */
    // ease(t, b, c, d) {
    //     t /= d/2;
    //     if (t < 1) return c/2*t*t*t + b;
    //     t -= 2;
    //     return c/2*(t*t*t + 2) + b;
    // }

    /**
     * easing function
     * Uses easeInOutCubic
     */

  }, {
    key: "ease",
    value: function ease(t, b, c, d) {
      t /= d / 2;
      if (t < 1) return c / 2 * t * t * t + b;
      t -= 2;
      return c / 2 * (t * t * t + 2) + b;
    }
    /**
     * get element height
     */

  }, {
    key: "getHeight",
    value: function getHeight(el) {
      el.style.display = 'flex';
      var height = el.scrollHeight;
      el.style.display = '';
      return height;
    }
    /**
     * Calculate admin bar height
     */

  }, {
    key: "adminBarOffset",
    value: function adminBarOffset() {
      return this.hasAdminBar ? this.html.offsetTop : 0;
    }
    /**
     * Clear animation styles and classes
     */

  }, {
    key: "clear",
    value: function clear() {
      document.querySelectorAll('.is-open').forEach(function (el) {
        el.classList.remove('is-open');
      });
      document.querySelectorAll('.menu__items').forEach(function (el) {
        el.style.transform = '';
      });
      this.app.style.transform = '';
      this.body.classList.remove('noscroll');
    }
  }]);

  return NavMenus;
}();
/**
 * Instantiate our class to handle nav menus on document ready
 */


document.addEventListener("DOMContentLoaded", function () {
  var navMenus = new NavMenus();
});

/***/ }),

/***/ "./resources/scss/customize-controls.scss":
/*!************************************************!*\
  !*** ./resources/scss/customize-controls.scss ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/scss/editor.scss":
/*!************************************!*\
  !*** ./resources/scss/editor.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/scss/screen.scss":
/*!************************************!*\
  !*** ./resources/scss/screen.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!**************************************************************************************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/scss/screen.scss ./resources/scss/editor.scss ./resources/scss/customize-controls.scss ***!
  \**************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/sky/Repos/taproot/resources/js/app.js */"./resources/js/app.js");
__webpack_require__(/*! /Users/sky/Repos/taproot/resources/scss/screen.scss */"./resources/scss/screen.scss");
__webpack_require__(/*! /Users/sky/Repos/taproot/resources/scss/editor.scss */"./resources/scss/editor.scss");
module.exports = __webpack_require__(/*! /Users/sky/Repos/taproot/resources/scss/customize-controls.scss */"./resources/scss/customize-controls.scss");


/***/ })

/******/ });
//# sourceMappingURL=app.js.map