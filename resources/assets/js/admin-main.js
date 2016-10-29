//
//Vue.component('example', require('./components/Example.vue'));
//
//const app = new Vue({
//    el: '#rrr',
//    data: {
//        show: true
//    }
//});

$('#header #button-aside').on('click', function (){
    $('.wrapper-content').toggleClass("hide-aside");
    $('.panel-page').toggleClass("panel-page-left");
});

//функция всплывающее уведомление
function snackbar(body){
    if (!$('#snackbar').length>0) {
        $('body').append('<span id="snackbar">' + body + '</span>').find('#snackbar').fadeOut(2000, function () {
            this.remove()
        });
    }
};


