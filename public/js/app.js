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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(2);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

//
// /**
//  * First we will load all of this project's JavaScript dependencies which
//  * includes Vue and other libraries. It is a great starting point when
//  * building robust, powerful web applications using Vue and Laravel.
//  */
//
// require('./bootstrap');
//
// window.Vue = require('vue');
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// Vue.component('example', require('./components/Example.vue'));
//
// const app = new Vue({
//     el: '#app'
// });

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.delete-subject').click(function () {
    var _this = this;
    var token = $(this).data('token');
    var subject = $(this).data('subject');
    var confirmation = prompt("For confirmation purposes, please write subject name which you want to delete: ");
    if (confirmation == subject) {
        $.ajax({
            type: "DELETE",
            url: $(this).data('address'),
            data: { _token: token },
            success: function success(data) {
                console.log(data);
                $(_this).closest('.row').remove();
            },
            error: function error(data) {
                console.log('Error:', data);
            }
        });
    } else {
        return false;
    }
});
$('.delete-division').click(function () {
    var _this = this;
    var token = $(this).data('token');
    var division = $(this).data('subject');
    var confirmation = prompt("For confirmation purposes, please write division name which you want to delete: ");
    if (confirmation == division) {
        $.ajax({
            type: "DELETE",
            url: $(this).data('address'),
            data: { _token: token },
            success: function success(data) {
                console.log(data);
                $(_this).closest('.row').remove();
            },
            error: function error(data) {
                console.log('Error:', data);
            }
        });
    }
});

$('.assign-students').select2();

$('.add').click(function () {
    var $gradeElement = $(this).parent().find('.add-grade');
    var $gradeList = $(this).parent().parent().find('.grade-list');
    var $grade = $gradeElement.val();
    var _this = this;
    $.ajax({
        type: "POST",
        url: $(this).data('address'),
        data: { value: $grade },
        success: function success(data) {
            var $aElement = $('<a/>', {
                "class": 'btn btn-secondary btn-sm edit-grade',
                "data-address-delete": data.urlDelete,
                "data-address-update": data.urlUpdate
            });
            $aElement.html($grade);
            $gradeList.append($aElement);
            $gradeList.append(' ');
            $gradeElement.val('');
        },
        error: function error(data) {
            alert('Error: you didn\'t added grade :/', data);
        }
    });
});

$('body').on('dblclick', 'a.edit-grade', function () {
    var $grade = $(this).html();
    var $parent = $(this).parent();
    var $gradeId = $(this).data('gradeId');
    var $urlDelete = $(this).data('address-delete');
    var $urlUpdate = $(this).data('address-update');

    var $editInput = $('<input>', {
        "class": 'btn btn-secondary btn-sm edit-grade',
        "type": 'number',
        "min": 1,
        "max": 6,
        "step": 0.5,
        "value": $grade.trim()
    });

    $(this).replaceWith($editInput);
    $editInput.focus();
    $editInput.blur(function () {
        $grade = $(this).val();
        var _this = this;
        if ($grade != 0) {

            var $editedGrade = $('<a>', {
                "class": 'btn btn-secondary btn-sm edit-grade'
            });

            $editedGrade.html($grade);

            $.ajax({
                type: "PUT",
                url: $urlUpdate,
                data: { value: $grade },
                success: function success(data) {
                    $(_this).replaceWith($editedGrade);
                },
                error: function error(data) {
                    alert('Error: you didn\'t updated this grade :| ', data);
                }
            });
        } else {

            confirm('Are you sure about deleting this grade?');

            $.ajax({
                type: "DELETE",
                url: $urlDelete,
                success: function success() {
                    $(_this).remove();
                },
                error: function error(data) {
                    alert('Error: you didn\'t deleted grade', data);
                }
            });
        }
    });
});

$('.generate-csv').click(function () {
    $(this).hide();
    var $generatingString = $('<span/>', {
        "class": 'generating'
    });
    $generatingString.html('Generating file... <br>');
    $(this).parent().append($generatingString);
    var $urlGenerateCSV = $(this).data('generate-csv');
    var $filePathToCheck = '/summaries/' + $.now() + '.csv';
    var $filePath = 'public' + $filePathToCheck;

    $.ajax({
        type: 'POST',
        url: $urlGenerateCSV,
        data: { filePath: $filePath },
        error: function error(data) {
            alert('cant generate file');
        }
    });
    var _this = this;
    var $generatingUrl = $('<a>', {
        "href": $filePathToCheck,
        "class": 'download-link'
    });
    function sendRequest() {
        $.ajax({
            type: 'HEAD',
            url: $filePathToCheck,
            success: function success() {
                $generatingString.remove();
                $generatingUrl.html('Click to download summary CSV.');
                $(_this).parent().append($generatingUrl);
            },
            error: function error() {
                setTimeout(function () {
                    sendRequest();
                }, 3000);
            }
        });
    }
    sendRequest();
});

$('.mail-notification').dblclick(function () {
    var $url = $(this).data('address');
    var _this = this;
    $.ajax({
        type: 'PUT',
        url: $url,
        success: function success(data) {
            console.log(data['if-notify']);
            if (parseInt(data['if-notify'])) {
                $(_this).removeClass('bg-warning');
                $(_this).addClass('bg-success');
                $(_this).html('Now you are staying up-dated all the time with your grades by the email!');
            } else {
                $(_this).removeClass('bg-success');
                $(_this).addClass('bg-warning');
                $(_this).html('We are sad that you are not subscribe your grades anymore :( You can change your mind all the time!');
            }
        },
        error: function error(data) {
            alert('nara');
        }
    });
});

$('body').on('click', '.user-delete', function () {
    var _this = this;
    var confirmation = confirm("Are you sure?");
    if (confirmation) {
        $.ajax({
            type: "DELETE",
            url: $(_this).data('address'),
            success: function success(data) {
                alert(data);
                $(_this).closest('tr').remove();
            },
            error: function error(data) {
                alert('Error:', data);
            }
        });
    } else {
        return false;
    }
});

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);