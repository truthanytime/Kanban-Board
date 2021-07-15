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
    .js('resources/js/dashmix.app.min.js', 'public/js/dashmix.app.min.js')
    .js('resources/js/jquery-3.1.1.min.js', 'public/js/jquery-3.1.1.min.js')
    .js('resources/js/dashmix.core.min.js', 'public/js/dashmix.core.min.js')
    .js('resources/js/plugins/nestable2/jquery.nestable.min.js', 'public/js/plugins/nestable2/jquery.nestable.min.js')
    .js('resources/js/pages/be_comp_nestable.min.js', 'public/js/pages/be_comp_nestable.min.js')  
    .js('resources/js/plugins/steps/jquery.steps.min.js','public/js/plugins/steps/jquery.steps.min.js')   
    .js('resources/js/plugins/validate/jquery.validate.min.js','public/js/plugins/validate/jquery.validate.min.js')   
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();   

    // .js('resources/js/plugins/metisMenu/jquery.metisMenu.js','public/js/plugins/metisMenu/jquery.metisMenu.js')
    // .js('resources/js/plugins/slimscroll/jquery.slimscroll.min.js','public/js/plugins/slimscroll/jquery.slimscroll.min.js')   
    // .js('resources/js/inspinia.js','public/js/inspinia.js')   
    // .js('resources/js/plugins/pace/pace.min.js','public/js/plugins/pace/pace.min.js')  
