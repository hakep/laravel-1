//
//Vue.component('example', require('./components/Example.vue'));
//
//new Vue({
//    el: '#header',
//    methods:{
//        xxx: function(){
//            console.log(1);
//        }
//    }
//});


//--------------------------------------------------------------
//--------------------------------------------------------------
// этот код устанавливает три позиции бокового меню
if(getCookie('button-aside')==2){
    $('.wrapper-content').addClass("hide-aside");
    $('.panel-page').addClass("panel-page-left");
}
if(getCookie('button-aside')==1){
    $('.wrapper-content').addClass("small-aside");
    $('.panel-page').addClass("panel-page-left");
}
if(getCookie('button-aside')==undefined || getCookie('button-aside')==0){
    $('.wrapper-content').removeClass("hide-aside small-aside");
}
$('#header #button-aside').click(function () {
    if(getCookie('button-aside')==2){
        $('.wrapper-content').removeClass("hide-aside");
        $('.panel-page').toggleClass("panel-page-left");
        document.cookie = "button-aside=0;path=/";
        return;
    }
    if(getCookie('button-aside')==1){
        $('.wrapper-content').removeClass("small-aside").addClass("hide-aside");
        $('.panel-page').addClass("panel-page-left");
        document.cookie = "button-aside=2;path=/";
    }
    if(getCookie('button-aside')==undefined || getCookie('button-aside')==0){
        $('.wrapper-content').removeClass("hide-aside").addClass("small-aside");
        $('.panel-page').toggleClass("panel-page-left");
        document.cookie = "button-aside=1;path=/";
    }
});
//--------------------------------------------------------------
//--------------------------------------------------------------
//функция всплывающее уведомление слева внизу
function snackbar(body){
    if (!$('#snackbar').length>0) {
        $('body').append('<span id="snackbar">' + body + '</span>').find('#snackbar').fadeOut(3000, function () {
            this.remove()
        });
    }
};
//--------------------------------------------------------------
//--------------------------------------------------------------
// возвращает cookie с именем name, если есть, если нет, то undefined
function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
};
//--------------------------------------------------------------
//--------------------------------------------------------------