const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix .copy('node_modules/angular/angular.min.js', 'public/js/angular.min.js')
        .copy('node_modules/angular/angular.min.js.map', 'public/js/angular.min.js.map')

        .copy('node_modules/angular-animate/angular-animate.min.js', 'public/js/angular-animate.min.js')
        .copy('node_modules/angular-animate/angular-animate.min.js.map', 'public/js/angular-animate.min.js.map')

        .copy('node_modules/angular-aria/angular-aria.min.js', 'public/js/angular-aria.min.js')
        .copy('node_modules/angular-aria/angular-aria.min.js.map', 'public/js/angular-aria.min.js.map')

        .copy('node_modules/angular-route/angular-route.min.js', 'public/js/angular-route.min.js')
        .copy('node_modules/angular-route/angular-route.min.js.map', 'public/js/angular-route.min.js.map')

        .copy('node_modules/materialize-clockpicker/dist/css/materialize.clockpicker.css', 'public/css/materialize.clockpicker.css')
        .copy('node_modules/materialize-clockpicker/dist/js/materialize.clockpicker.js', 'public/js/materialize.clockpicker.js')
        

});
