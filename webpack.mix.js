const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/script.js', 'public/theme/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/header.scss', 'public/theme/css')
    .sass('resources/sass/manager.scss', 'public/theme/css')
    .sass('resources/sass/product.scss', 'public/theme/css')
    .sass('resources/sass/client.scss', 'public/theme/css')
    .sass('resources/sass/style.scss', 'public/theme/css')
    .sourceMaps();
