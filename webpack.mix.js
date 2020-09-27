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

mix.styles([
   'resources/assets/Plantilla/css/font-awesome.min.css',
   'resources/assets/Plantilla/css/simple-line-icons.min.css',
   'resources/assets/Plantilla/css/style.css'
],'public/css/plantilla.css')
.scripts([
   'resources/assets/Plantilla/js/bootstrap.min.js',
   'resources/assets/Plantilla/js/Chart.min.js',
   'resources/assets/Plantilla/js/jquery.min.js',
   'resources/assets/Plantilla/js/pace.min.js',
   'resources/assets/Plantilla/js/popper.min.js',
   'resources/assets/Plantilla/js/template.js'
],'public/js/plantilla.js')
.js(['resources/assets/js/app.js'],'public/js/app.js');
