!function(e){var t={};function n(r){if(t[r])return t[r].exports;var a=t[r]={i:r,l:!1,exports:{}};return e[r].call(a.exports,a,a.exports,n),a.l=!0,a.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)n.d(r,a,function(t){return e[t]}.bind(null,a));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/",n(n.s=1)}({1:function(e,t,n){e.exports=n("H0l3")},"50d4":function(e,t){function n(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var r=function(){function e(t){if(function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),!t)return!1;$control=jQuery(t.selector),this.$fontStyles=$control.find(".taproot-font-styles--item"),this.$checkboxes=$control.find(".taproot-font-style-checkbox"),this.$input=$control.find(".taproot-font-styles-input"),this.$reset=$control.find(".taproot-control-reset"),this.handlers()}var t,r,a;return t=e,(r=[{key:"handlers",value:function(){var e=this;e.$fontStyles.click(function(){var e=$(this).find("input");$(this).toggleClass("taproot-font-style-checked"),e.is(":checked")?e.prop("checked",!1):(e.prop("checked",!0),"uppercase"===e.val()?$(this).siblings(".taproot-font-styles--capitalize").removeClass("taproot-font-style-checked").find("input").prop("checked",!1).change():"capitalize"==e.val()&&$(this).siblings(".taproot-font-styles--uppercase").removeClass("taproot-font-style-checked").find("input").prop("checked",!1).change()),e.change()}),e.$checkboxes.on("change",function(){var t=e.$input.val(),n=$(this).val(),r="false"!=t?t.split("|"):[],a=$.inArray(n,r),o="";1==$(this).prop("checked")?t.length?0>a&&(r.push(n),o=r.join("|")):o=n:t.length&&(0<=a?(r.splice(a,1),o=r.join("|")):o=t),e.$input.val(o).change()}),e.$reset.click(function(){e.$input.val("").change(),e.$checkboxes.removeAttr("checked"),e.$fontStyles.removeClass("taproot-font-style-checked")})}}])&&n(t.prototype,r),a&&n(t,a),e}();wp.customize.controlConstructor["taproot-font-styles"]=wp.customize.Control.extend({ready:function(){new r(this)}})},CnH3:function(e,t){function n(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}Color.prototype.toString=function(e){var t=parseInt(this._color,10).toString(16);if("no-alpha"==e)return this.toCSS("rgba","1").replace(/\s+/g,"");if(1>this._alpha)return this.toCSS("rgba",this._alpha).replace(/\s+/g,"");if(this.error)return"";if(6>t.length)for(var n=6-t.length-1;n>=0;n--)t="0"+t;return"#"+t};var r=function(){function e(t){if(function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),!t)return!1;this.control=jQuery(t.selector).find(".alpha-color-control"),this.startingColor=this.control.val().replace(/\s+/g,""),this.defaultColor=this.control.attr("data-default-color"),this.paletteInput=this.control.attr("data-palette"),this.palette=this.paletteSettings(),this.hideAlpha=!(!this.control.attr("data-hide-alpha")||"false"===this.control.attr("data-hide-alpha")),this.setupControl(),this.addAlpha(),this.handlers()}var t,r,a;return t=e,(r=[{key:"paletteSettings",value:function(){return-1!==this.paletteInput.indexOf("|")?this.paletteInput.split("|"):"false"!=this.paletteInput}},{key:"getContainer",value:function(){return this.control.parents(".wp-picker-container:first")}},{key:"setupControl",value:function(){var e=this,t={change:function(t,n){var r,a,o;(r=e.control.attr("data-customize-setting-link"),(a=e.control.wpColorPicker("color"))==e.defaultColor)&&(o=e.getAlpha(a),e.getContainer().find(".alpha-slider").find(".ui-slider-handle").text(o));wp.customize(r,function(e){e.set(a)}),e.getContainer().find(".transparency").css("background-color",n.color.toString("no-alpha"))},palettes:e.palette};this.control.wpColorPicker(t)}},{key:"addAlpha",value:function(){if(this.hideAlpha)return!1;var e=this.startingColor,t=new Color(e),n=this.getContainer(),r=this.getAlpha(e)/100;$('<div class="alpha-color-picker-wrapper"><div class="alpha-slider"></div><div class="transparency"></div></div>').appendTo(n.find(".iris-picker-inner")),n.find(".alpha-slider").slider({orientation:"vertical",create:function(){var e=$(this).slider("value");$(this).find(".ui-slider-handle").text(Math.round(100*e)),$(this).siblings(".transparency ").css("background-color",t.toString("no-alpha"))},value:r,range:"max",step:.01,min:0,max:1,animate:300})}},{key:"handlers",value:function(){var e=this,t=this.getContainer(),n=t.find(".alpha-slider");t.find(".iris-palette").on("click",function(t){var r=$(t.target).css("background-color"),a=e.getAlpha(r);e.updateAlphaSlider(a,n),100!==a&&(r=r.replace(/[^,]+(?=\))/,(a/100).toFixed(2))),e.control.wpColorPicker("color",r)}),t.find(".button.wp-picker-clear").on("click",function(){var t=e.control.attr("data-customize-setting-link");e.control.wpColorPicker("color","#ffffff"),wp.customize(t,function(e){e.set("")}),e.updateAlphaSlider(100,n)}),t.find(".button.wp-picker-default").on("click",function(){var t=e.getAlpha(e.defaultColor);e.updateAlphaSlider(t,n)}),this.control.on("input",function(t){var r=$(t.target).val(),a=e.getAlpha(r);e.updateAlphaSlider(a,n)}),n.slider().on("slide",function(n,r){var a=parseFloat(r.value),o=t.find(".alpha-slider");e.updateControl(a,e.control,o,!1),o.find(".ui-slider-handle").text(Math.round(100*r.value))})}},{key:"getAlpha",value:function(e){var t;return(e=e.replace(/ /g,"")).match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/)?(t=100*parseFloat(e.match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/)[1]).toFixed(2),t=parseInt(t)):t=100,t}},{key:"updateControl",value:function(e,t,n,r){var a=t.data("a8cIris"),o=t.data("wpWpColorPicker");a._color._alpha=e;var i=a._color.toString();t.val(i),o.toggler.css({"background-color":i}),r&&this.updateAlphaSlider(e,n),t.wpColorPicker("color",i)}},{key:"updateAlphaSlider",value:function(e,t){t.slider("value",e),t.find(".ui-slider-handle").text(e.toString())}}])&&n(t.prototype,r),a&&n(t,a),e}();wp.customize.controlConstructor["alpha-color"]=wp.customize.Control.extend({ready:function(){new r(this)}})},H0l3:function(e,t,n){"use strict";n.r(t);n("CnH3"),n("Sy8C"),n("50d4"),n("PFuX")},PFuX:function(e,t){function n(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var r=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.handlers()}var t,r,a;return t=e,(r=[{key:"handlers",value:function(){var e=wp.customize;document.querySelectorAll(".device-picker__device").forEach(function(t){t.addEventListener("click",function(t){var n=t.target,r=n.dataset.device;n.parentElement.setAttribute("data-current-device",r),e.previewedDevice.set(r),document.querySelectorAll(".device-picker").forEach(function(e){e.dataset.currentDevice=r})})}),e.previewedDevice.bind(function(){var t=e.previewedDevice.get();document.querySelectorAll(".device-picker").forEach(function(e){e.dataset.currentDevice=t})})}}])&&n(t.prototype,r),a&&n(t,a),e}();document.addEventListener("DOMContentLoaded",function(){new r})},Sy8C:function(e,t){function n(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var r=function(){function e(t){var n=this;if(function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),!t)return!1;t=document.querySelector(t.selector),this.devicePicker=t.querySelector(".device-picker"),this.devices=t.querySelectorAll(".device-picker__device"),this.controls=t.querySelectorAll(".device-group__item"),this.controls.forEach(function(e){n.handlers(e)})}var t,r,a;return t=e,(r=[{key:"handlers",value:function(e){var t=this,n=e.querySelector(".taproot-range"),r=e.querySelector(".taproot-range-input"),a=e.querySelector(".taproot-unit"),o=e.querySelector(".taproot-reset-slider"),i=e.querySelector(".taproot-range-value"),l=e.querySelector(".taproot-range-enable");n.addEventListener("mousedown",function(e){var o=e.target,l=t.decimalPlaces(o.getAttribute("step"));o.addEventListener("input",function(){r.value=parseFloat(o.value).toFixed(l),t.updateValue(i,n,a)})}),r.addEventListener("change",function(e){var r=e.target;t.adjustRangeValue(r,1e3),t.updateValue(i,n,a),r.addEventListener("focusout",function(){t.adjustRangeValue(r,0),t.updateValue(i,n,a)})}),o.addEventListener("click",function(){t.reset(n,r,a),t.updateValue(i,n,a)}),l.addEventListener("change",function(){t.reset(n,r,a),t.updateValue(i,n,a)}),a.addEventListener("change",function(e){var o=e.target,l=o.querySelector('option[value="'+o.value+'"]'),c=parseFloat(l.getAttribute("default"));n.setAttribute("min",parseFloat(l.getAttribute("min"))),n.setAttribute("max",parseFloat(l.getAttribute("max"))),n.setAttribute("step",parseFloat(l.getAttribute("step"))),n.value=c,r.setAttribute("min",parseFloat(l.getAttribute("min"))),r.setAttribute("max",parseFloat(l.getAttribute("max"))),r.setAttribute("step",parseFloat(l.getAttribute("step"))),r.value=c,t.updateValue(i,n,a)})}},{key:"decimalPlaces",value:function(e){return Math.floor(e)==e?0:e.toString().split(".")[1].length||0}},{key:"reset",value:function(e,t,n){var r=e.dataset.reset_value;e.value=r,t.value=r,n.value=n.dataset.reset_value,this.change(n),this.change(e),this.change(t)}},{key:"updateValue",value:function(e,t,n){n="unitless"===n.value?"":n.value,e.value=t.value+n,this.change(e)}},{key:"adjustRangeValue",value:function(e,t){var n=this,r=e.parentElement.querySelector(".taproot-range"),a=parseFloat(r.dataset.reset_value),o=parseFloat(e.getAttribute("step")),i=parseFloat(e.getAttribute("min")),l=parseFloat(e.getAttribute("max")),c=parseFloat(e.value);clearTimeout(n.rangeTimeout),n.rangeTimeout=setTimeout(function(){if(isNaN(c))return e.value=a,r.value=a,void n.change(r);1<=o&&0!=c%1&&(c=Math.round(c),e.value=c,r.value=c,n.change(r)),c>l&&(e.value=l,r.value=l,n.change(r)),c<i&&(e.value=i,r.value=i,n.change(r))},t),r.value=c,n.change(r)}},{key:"change",value:function(e){var t=new Event("change");e.dispatchEvent(t)}}])&&n(t.prototype,r),a&&n(t,a),e}();wp.customize.controlConstructor.range=wp.customize.Control.extend({ready:function(){new r(this)}})}});