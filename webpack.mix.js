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

mix.js('resources/assets/mobile/js/app.js', 'public/mobile/js').version().sourceMaps()
    .sass('resources/assets/mobile/sass/app.scss', 'public/mobile/css').version().sourceMaps()
    .js('resources/assets/desktop/js/app.js', 'public/desktop/js').version().sourceMaps()
    .sass('resources/assets/desktop/sass/app.scss', 'public/desktop/css').version().sourceMaps()
