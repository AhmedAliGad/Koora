/*========Requires=======*/
const mix = require('laravel-mix');
/*
 |--------------------------------------------------------------------------
 | Site Management
 |--------------------------------------------------------------------------
 |
 |  It has been commented because it needs node v14 for Tailwind to work
 | Feel free To use any UI Frameworks for the website
 |
 */

// mix.copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/fonts/webfonts');
// mix.js('resources/assets/front/js/app.js', 'public/front/js')
//     .sass('resources/assets/front/sass/app.scss', 'public/front/css/app.css')
//     .options({
//         processCssUrls: false,
//         postCss: [
//             tailwindcss('tailwind.config.js'),
//          ],
//     }).sourceMaps();



/*
 |--------------------------------------------------------------------------
 | Admin Management
 |--------------------------------------------------------------------------
 */
// mix.minify('resources/assets/admin/js/ckeditor/ckeditor.js');

mix.js('resources/assets/admin/js/app.js', 'public/admin/js').vue().sourceMaps();
mix.sass('resources/assets/admin/sass/app.scss', 'public/admin/css/app.css').sourceMaps();


mix.js('resources/assets/front/js/app.js', 'public/front/js/app.js')
.sass('resources/assets/front/sass/app.scss', 'public/front/css/app.css');


/*-------------Browser Sync-----------*/
mix.browserSync('http://127.0.0.1:8000');