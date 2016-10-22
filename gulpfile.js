const elixir = require('laravel-elixir');

require('laravel-elixir-vue');
elixir.config.sourcemaps = false;

elixir(mix => {
    mix.sass('admin-vendor.scss', 'public/panel/css/vendor.css')
    .sass('admin-style.scss', 'public/panel/css/style.css')
    .webpack('admin-vendor.js', 'public/panel/js/vendor.js')
    .scripts('admin-main.js', 'public/panel/js/main.js')

    //добавляем ace editor из папки vendor в папку public
    mix.copy('bower_components/ace-builds/src-min-noconflict/ace.js', 'public/panel/js/ace/ace.js')
        .copy('bower_components/emmet-core/emmet.js', 'public/panel/js/ace/emmet.js')
        .copy('bower_components/ace-builds/src-min-noconflict/ext-emmet.js', 'public/panel/js/ace/ext-emmet.js')
        .copy('bower_components/ace-builds/src-min-noconflict/mode-html.js', 'public/panel/js/ace/mode-html.js')
        .copy('bower_components/ace-builds/src-min-noconflict/theme-monokai.js', 'public/panel/js/ace/theme-monokai.js')

    //добавляем шрифт
    mix.copy('bower_components/components-font-awesome/fonts/', 'public/panel/fonts/')

});

