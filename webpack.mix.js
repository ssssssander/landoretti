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

// $ npm run watch
mix.js('resources/assets/js/app.js', 'public/js');

// Compass compiles Sass ($ compass watch)
// mix.sass('resources/assets/sass/app.scss', 'public/css');

if(mix.inProduction()) {
   mix.version();
}

mix.disableNotifications();
