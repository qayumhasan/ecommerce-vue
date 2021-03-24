let mix = require('laravel-mix');                           // If you are new to this then please visit https://laravel.com/docs/5.5/mix
const webpack = require('webpack');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

var plugin =  'resources/plugins/frontend/';

mix.js('resources/js/app.js', 'public/js/app.js')
  .combine([
    plugin + 'vendor/jquery/jquery.min.js',
    plugin + 'popper/popper.min.js',
    plugin + 'vendor/bootstrap/js/bootstrap.min.js',
    plugin + 'vendor/datatables/datatables.js',
    plugin + 'vendor/owl-carousel/owl.carousel.js',
    plugin + 'vendor/select2/js/select2.js',
    plugin + 'js/custom.js',
  ],'public/js/plugin.js')                     // this is the alias/virtual host which will be called to load http://localhost:3000

if (mix.inProduction()) {                       // In production environtment use versioning
    mix.version();
}
