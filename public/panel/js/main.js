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
        $('body').append('<span id="snackbar">' + body + '</span>').find('#snackbar').fadeOut(4000, function () {
            this.remove()
        });
    }
}
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
//--------------------------------------------------------------
//функция выполняет транслитерацию при вводе текста в поле
function translit(str){
    // Символ, на который будут заменяться все спецсимволы
    var space = '-';
    // Берем значение из нужного поля и переводим в нижний регистр
    var text = str.toLowerCase();
    // Массив для транслитерации
    var transl = {
        'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh', 'з': 'z', 'и': 'i',
        'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't',
        'у': 'u', 'ф': 'f', 'х': 'h', 'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh', 'ъ': space, 'ы': 'y',
        'ь': space, 'э': 'e', 'ю': 'yu', 'я': 'ya',

        ' ': space, '_': space, '`': space, '~': space, '!': space, '@': space, '#': space, '$': space,
        '%': space, '^': space, '&': space, '*': space, '(': space, ')': space, '-': space, '\=': space,
        '+': space, '[': space, ']': space, '\\': space, '|': space, '/': space, '.': space, ',': space,
        '{': space, '}': space, '\'': space, '"': space, ';': space, ':': space, '?': space, '<': space,
        '>': space, '№': space
    }
    var result = '';
    var curent_sim = '';
    for(i=0; i < text.length; i++) {
        // Если символ найден в массиве то меняем его
        if(transl[text[i]] != undefined) {
            if(curent_sim != transl[text[i]] || curent_sim != space){
                result += transl[text[i]];
                curent_sim = transl[text[i]];
            }
        }
        // Если нет, то оставляем так как есть
        else {
            result += text[i];
            curent_sim = text[i];
        }
    }
    // Возвращаем результат
    return TrimStr(result);
}
function TrimStr(s) {
    s = s.replace(/^-/, '');
    return s.replace(/-$/, '');
}
//--------------------------------------------------------------
//--------------------------------------------------------------
//# sourceMappingURL=main.js.map
