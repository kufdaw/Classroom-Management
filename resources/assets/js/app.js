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

$('.delete-subject').click(function(){
    var _this = this;
    var token = $(this).data('token');
    var subject = $(this).data('subject');
    var confirmation = prompt("For confirmation purposes, please write subject name which you want to delete: ");
    if(confirmation == subject) {
         $.ajax({
             type: "DELETE",
             url: $(this).data('address'),
             data: {_token :token},
             success: function (data) {
                 console.log(data);
                 $(_this).closest('.row').remove();
             },
             error: function (data) {
                 console.log('Error:', data);
             }
         });
     } else {
         return false;
     }
 });
$('.delete-division').click(function(){
    var _this = this;
    var token = $(this).data('token');
    var division = $(this).data('subject');
    var confirmation = prompt("For confirmation purposes, please write division name which you want to delete: ");
    if(confirmation == division) {
         $.ajax({
             type: "DELETE",
             url: $(this).data('address'),
             data: {_token :token},
             success: function (data) {
                 console.log(data);
                 $(_this).closest('.row').remove();
             },
             error: function (data) {
                 console.log('Error:', data);
             }
         });
     }
 });

$('.assign-students').select2();

$('.add').click(function(){
    var gradeElement = $(this).parent().find('.add-grade');
    var gradeList = $(this).parent().parent().find('.grade-list');
    var grade = gradeElement.val();
     $.ajax({
         type: "POST",
         url: gradeElement.data('address'),
         data: {grade: grade},
         success: function (data) {
             gradeList.append('<a class="btn btn-secondary btn-sm"> '+ grade +' </a>');
         },
         error: function (data) {
             alert('Error: you didn\'t added grade :/', data);
         }
     });
 });
