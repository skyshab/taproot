"use strict";

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance"); }

function _iterableToArrayLimit(arr, i) { var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * Scripts for working with customizer preview actions
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Class for adding styles
 */
var Styles =
/*#__PURE__*/
function () {
  function Styles(data) {
    _classCallCheck(this, Styles);

    if (!data.id || !data.selector) return false;
    this.screen = data.screen;
    this.id = this.screen ? "".concat(data.id, "--").concat(data.screen) : data.id;
    this.selector = data.selector;
    this.styles = data.styles;
    this.insertStyleblock();
  }

  _createClass(Styles, [{
    key: "insertStyleblock",
    value: function insertStyleblock() {
      var oldBlock = document.getElementById(this.id);

      if (oldBlock) {
        oldBlock.innerHTML = this.getStyleBlockContent();
      } else {
        document.head.insertBefore(this.getStyleBlock(), this.getHook());
      }
    }
  }, {
    key: "openQuery",
    value: function openQuery() {
      if (!this.screen) return '';
      var screens = parent.rootstrapData.screens;
      var screen = screens[this.screen];
      var query = '';

      if (screen.min || screen.max) {
        query += '@media ';

        if (screen.min) {
          query += "(min-width: ".concat(screen.min, ")");

          if (screen.max) {
            query += ' and ';
          }
        }

        if (screen.max) {
          query += "(max-width: ".concat(screen.max, ")");
        }

        query += '{';
      }

      return query;
    }
  }, {
    key: "getStyles",
    value: function getStyles() {
      var styles = this.selector + '{';

      var _arr = Object.entries(this.styles);

      for (var _i = 0; _i < _arr.length; _i++) {
        var _arr$_i = _slicedToArray(_arr[_i], 2),
            property = _arr$_i[0],
            value = _arr$_i[1];

        if (!property || !value) continue;
        styles += "".concat(property, ": ").concat(value, ";");
      }

      styles += '}';
      return styles;
    }
  }, {
    key: "closeQuery",
    value: function closeQuery() {
      return this.screen ? '}' : '';
    }
  }, {
    key: "getStyleBlockContent",
    value: function getStyleBlockContent() {
      return this.openQuery() + this.getStyles() + this.closeQuery();
    }
  }, {
    key: "getStyleBlock",
    value: function getStyleBlock() {
      var styleblock = document.createElement("style");
      styleblock.setAttribute("id", this.id);
      styleblock.textContent = this.getStyleBlockContent();
      return styleblock;
    }
  }, {
    key: "getHook",
    value: function getHook() {
      var screen = this.screen ? this.screen : 'default';
      return document.getElementById("rootstrap-style-hook--" + screen);
    }
  }]);

  return Styles;
}();
/**
 * Class for adding CSS custom properties
 */


var CustomProperty =
/*#__PURE__*/
function () {
  function CustomProperty(data) {
    _classCallCheck(this, CustomProperty);

    if (!data.name) return false;
    this.screen = data.screen;
    this.name = data.name;
    this.id = this.screen ? "".concat(data.name, "--").concat(data.screen) : data.name;

    if (data.value && '' !== data.value) {
      this.value = data.value;
      this.insertStyleblock();
    } else {
      this.removeStyleblock();
    }
  }

  _createClass(CustomProperty, [{
    key: "insertStyleblock",
    value: function insertStyleblock() {
      var oldBlock = document.getElementById(this.id);

      if (oldBlock) {
        oldBlock.innerHTML = this.getStyleBlockContent();
      } else {
        document.head.insertBefore(this.getStyleBlock(), this.getHook());
      }
    }
  }, {
    key: "removeStyleblock",
    value: function removeStyleblock() {
      var styleBlock = document.getElementById(this.id);

      if (styleBlock) {
        styleBlock.remove();
      }
    }
  }, {
    key: "openQuery",
    value: function openQuery() {
      if (!this.screen) return '';
      var screens = parent.rootstrapData.screens;
      var screen = screens[this.screen];
      var query = '';

      if (screen.min || screen.max) {
        query += '@media ';

        if (screen.min) {
          query += "(min-width: ".concat(screen.min, ")");

          if (screen.max) {
            query += ' and ';
          }
        }

        if (screen.max) {
          query += "(max-width: ".concat(screen.max, ")");
        }

        query += '{';
      }

      return query;
    }
  }, {
    key: "getStyles",
    value: function getStyles() {
      if (!this.name || !this.value) return '';
      var output = ':root {';
      output += "--".concat(this.name, ": ").concat(this.value, ";");
      output += '}';
      return output;
    }
  }, {
    key: "closeQuery",
    value: function closeQuery() {
      return this.screen && 'default' !== this.screen ? '}' : '';
    }
  }, {
    key: "getStyleBlockContent",
    value: function getStyleBlockContent() {
      return this.openQuery() + this.getStyles() + this.closeQuery();
    }
  }, {
    key: "getStyleBlock",
    value: function getStyleBlock() {
      var styleblock = document.createElement("style");
      styleblock.setAttribute("id", this.id);
      styleblock.textContent = this.getStyleBlockContent();
      return styleblock;
    }
  }, {
    key: "getHook",
    value: function getHook() {
      var screen = this.screen ? this.screen : 'default';
      return document.getElementById("rootstrap-style-hook--" + screen);
    }
  }]);

  return CustomProperty;
}();
/**
 * Object for interfacing with rootstrap
 */


var rootstrap = {
  screens: function screens() {
    return Object.entries(parent.rootstrapData.screens);
  },
  style: function style(data) {
    var style = new Styles(data);
  },
  customProperty: function customProperty(data) {
    var customProperty = new CustomProperty(data);
  }
};