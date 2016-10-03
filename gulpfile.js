const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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
    mix.sass('app.scss')
        //.scripts([
        //    '../../../node_modules/jquery/dist/jquery.js',
        //    '../../../node_modules/tether/dist/js/tether.js',
        //    '../../../node_modules/bootstrap/dist/js/bootstrap.js',
        //], 'public/js/app.js');
       //.webpack('app.js');
});

