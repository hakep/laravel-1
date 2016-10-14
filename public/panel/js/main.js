
//Vue.component('example', require('./components/Example.vue'));
//
//const app = new Vue({
//    el: 'body',
//    data: {
//        show: true
//    }
//});

$('#header button').on('click', function (event){
    $('.wrapper-content').toggleClass("hide-aside");
});