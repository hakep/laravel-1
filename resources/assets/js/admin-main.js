
//Vue.component('example', require('./components/Example.vue'));
//
//const app = new Vue({
//    el: 'body',
//    data: {
//        show: true
//    }
//});

$('#header #button-aside').on('click', function (){
    $('.wrapper-content').toggleClass("hide-aside");
    $('.panel-page').toggleClass("panel-page-left");
});

