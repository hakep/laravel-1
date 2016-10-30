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

//$('#header #button-aside').on('dblclick', function (){
//    //console.log(2);
//    //$('.wrapper-content').toggleClass("hide-aside");
//    //$('.panel-page').toggleClass("panel-page-left");
//});
//$('#header #button-aside').on('click', function (){
//    //console.log(1);
//    //$('.wrapper-content').toggleClass("hide-aside");
//    //$('.panel-page').toggleClass("panel-page-left");
//});

//--------------------------------------------------------------
// этот код устанавливает три позиции бокового меню
$('#header #button-aside').click(function () {
    if(getCookie('button-aside')==2){
        $('.wrapper-content').removeClass("hide-aside");
        $('.panel-page').toggleClass("panel-page-left");
        document.cookie = "button-aside=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
        return;
    }
    if(getCookie('button-aside')==1){
        $('.wrapper-content').removeClass("small-aside").toggleClass("hide-aside");
        document.cookie = "button-aside=2";
    }
    if(getCookie('button-aside')==undefined){
        $('.wrapper-content').removeClass("hide-aside").toggleClass("small-aside");
        $('.panel-page').toggleClass("panel-page-left");
        document.cookie = "button-aside=1";
    }
});

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
}
//--------------------------------------------------------------