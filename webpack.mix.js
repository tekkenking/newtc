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

/*mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');*/

const rootAssetDir = 'resources/assets/';
const inspDir = rootAssetDir + 'insp/';
const buckDir = rootAssetDir + 'bucketcodes/';


mix.styles([
    buckDir + 'css/gfonts.css',
    inspDir + 'css/bootstrap.min.css',
    inspDir + 'font-awesome/css/font-awesome.css',
    inspDir + 'css/plugins/dataTables/datatables.min.css',
    inspDir + 'css/plugins/iCheck/custom.css',
    inspDir + 'css/animate.css',
    inspDir + 'css/style.css',
    inspDir + 'css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css',
    buckDir + 'css/general.css'
], 'public/css/noath.css');

mix.scripts([
    inspDir + 'js/jquery-3.1.1.min.js',
    inspDir + 'js/popper.min.js',
    inspDir + 'js/bootstrap.js',
    inspDir + 'js/plugins/metisMenu/jquery.metisMenu.js',
    inspDir + 'js/plugins/slimscroll/jquery.slimscroll.min.js',
    inspDir + 'js/plugins/dataTables/datatables.min.js',
    inspDir + 'js/plugins/dataTables/dataTables.bootstrap4.min.js',
    inspDir + 'js/plugins/iCheck/icheck.min.js',
    inspDir + 'js/inspinia.js',
    rootAssetDir + 'jQuery-Form-Validator/form-validator/jquery.form-validator.min.js',
    buckDir + 'js/ajaxtab.js',
    buckDir + 'js/general.js'
], 'public/js/noath.js');

