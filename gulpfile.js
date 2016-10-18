const elixir = require('laravel-elixir');

require('laravel-elixir-vue');
elixir.config.sourcemaps = false;
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('admin-vendor.scss', 'public/panel/css/vendor.css')
    .sass('admin-style.scss', 'public/panel/css/style.css')
    .webpack('admin-vendor.js', 'public/panel/js/vendor.js')
    .scripts('admin-main.js', 'public/panel/js/main.js');
    mix.copy('resources/assets/vendor/ace-builds-master/src-min-noconflict/ace.js', 'public/panel/js/ace/ace.js')
        .copy('resources/assets/vendor/emmet.js', 'public/panel/js/ace/emmet.js')
        .copy('resources/assets/vendor/ace-builds-master/src-min-noconflict/ext-emmet.js', 'public/panel/js/ace/ext-emmet.js')
        .copy('resources/assets/vendor/ace-builds-master/src-min-noconflict/mode-html.js', 'public/panel/js/ace/mode-html.js')
        .copy('resources/assets/vendor/ace-builds-master/src-min-noconflict/theme-monokai.js', 'public/panel/js/ace/theme-monokai.js')
});

