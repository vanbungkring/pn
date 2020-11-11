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
mix.autoload({
    jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"]
});
mix.styles([
    'resources/assets/css/ammap.css',
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/fullcalendar.css',
    'resources/assets/css/jquery.bxslider.css',
    'resources/assets/css/owl.carousel.css',
    'resources/assets/css/font-awesome.min.css',
    'resources/assets/css/prettyPhoto.css',
    'resources/assets/css/svg-style.css',
    'resources/assets/css/TimeCircles.css',
    'resources/assets/css/shortcodes.css',
    'resources/assets/css/component.css',
    'resources/assets/css/typography.css',
    'resources/assets/css/widget.css',
    'resources/assets/css/style.css',
    'resources/assets/css/color.css',
    'resources/assets/css/responsive.css'
], 'public/css/app.css')
.copyDirectory('resources/assets/images', 'public/images')
.copyDirectory('resources/assets/extra-images', 'public/extra-images')
.copyDirectory('resources/assets/fonts', 'public/fonts')
.copyDirectory('resources/assets/js', 'public/js');