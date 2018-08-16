let mix = require('laravel-mix');

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

mix.js('resources/assets/frontend/js/app.js', 'public/frontend/js')
   .sass('resources/assets/frontend/sass/app.scss', 'public/frontend/css');
    // .copy('resources/assets/vendor/simditor//', 'public/fonts/vendor/simditor/');
    // .copy('node_modules/simditor/site/assets/styles/', 'resources/assets/vendor/simditor/css/');
