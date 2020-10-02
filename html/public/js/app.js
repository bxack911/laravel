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
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  if ($(".module_table").length > 0) {
    $(document).on('click', '.module_table .throw_off_filters', function (e) {
      e.preventDefault();
      var inputs_row = $(this).next().next().children(".table_column").find("input,select,.switcher");
      inputs_row.each(function (index, item) {
        $(this).val("");
      });
      reloadTable($(this).next().next().children(".table_column"), $(this).parent().parent(), 1);
    });
    $(document).on('change', '.module_table input, .module_table select', function (e) {
      e.preventDefault();
      var table_wrapper = $(this).closest(".data_table").parent();
      reloadTable($(this).closest(".table_column"), table_wrapper);
    });
    $(document).on('click', '.data_table .pagination span', function (e) {
      e.preventDefault();
      var table_wrapper = $(this).closest(".data_table").parent();
      reloadTable(table_wrapper.find(".table_column"), table_wrapper, $(this).attr('data-page'));
    });
  }
});

function reloadTable(table_column, table_wrapper) {
  var page = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;
  var inputs_row = table_column.find("input,select,.switcher");
  var current_model = table_column.prev(".model_name").val();
  var table_id = table_wrapper.attr('id').split('arrilot-widget-container-');
  var inputs = {};
  var filters = {};
  var curr_page = 1;
  table_wrapper.find('._loader_wrapper').css('display', 'block');
  table_column.css('opacity', '0');

  if (page) {
    curr_page = page;
  } else {
    curr_page = table_wrapper.find(".pagination").prev().val();
  }

  inputs_row.each(function (index, item) {
    var data_key = $(this).attr("name");
    var data_value = $(this).val();
    var data_type = $(this).attr("data-type");
    inputs[data_key] = data_type;
    filters[data_key] = data_value;
  });
  var data = {
    "id": table_id[1],
    "skip_encryption": 1,
    "name": "App\\Widgets\\Admin\\TableWidget",
    "params": "[" + JSON.stringify({
      "model": current_model,
      "curr_page": curr_page,
      "fields": inputs,
      "filter": filters
    }) + "]"
  };
  $.ajax({
    url: "/arrilot/load-widget",
    type: "GET",
    data: data,
    success: function success(response) {
      table_wrapper.find('._loader_wrapper').css('display', 'none');
      table_column.css('opacity', '1');

      if (response) {
        table_wrapper.html(response);
      }
    }
  });
}

/***/ }),

/***/ "./resources/sass/admin/app.scss":
/*!***************************************!*\
  !*** ./resources/sass/admin/app.scss ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/front/app.scss":
/*!***************************************!*\
  !*** ./resources/sass/front/app.scss ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***************************************************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/front/app.scss ./resources/sass/admin/app.scss ***!
  \***************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/bxack911/Public/programming/sprava-laravel/html/engine/resources/js/app.js */"./resources/js/app.js");
__webpack_require__(/*! /home/bxack911/Public/programming/sprava-laravel/html/engine/resources/sass/front/app.scss */"./resources/sass/front/app.scss");
module.exports = __webpack_require__(/*! /home/bxack911/Public/programming/sprava-laravel/html/engine/resources/sass/admin/app.scss */"./resources/sass/admin/app.scss");


/***/ })

/******/ });