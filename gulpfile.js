const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');
elixir.config.sourcemaps = false;

elixir(mix => {
    mix.sass('admin-vendor.scss', 'public/panel/css/vendor.css')
    .sass('admin-style.scss', 'public/panel/css/style.css')
    .webpack('admin-vendor.js', 'public/panel/js/vendor.js')
    .scripts('admin-main.js', 'public/panel/js/main.js')

    //добавляем ace editor и к нему emmet
    .scripts([
        './bower_components/ace-builds/src-min-noconflict/ace.js',
        './bower_components/emmet-core/emmet.js',
        './bower_components/ace-builds/src-min-noconflict/ext-emmet.js',
        './bower_components/ace-builds/src-min-noconflict/mode-html.js',
        './bower_components/ace-builds/src-min-noconflict/theme-monokai.js'
    ], './public/panel/js/ace/ace.js')
    .scripts('./bower_components/ace-builds/src-min-noconflict/worker-html.js', 'public/panel/js/ace/worker-html.js')
    .scripts('./bower_components/ace-builds/src-min-noconflict/worker-css.js', 'public/panel/js/ace/worker-css.js')
    .scripts('./bower_components/ace-builds/src-min-noconflict/worker-javascript.js', 'public/panel/js/ace/worker-javascript.js')


    //добавляем шрифт
    .copy('bower_components/components-font-awesome/fonts', 'public/panel/fonts/')

});

