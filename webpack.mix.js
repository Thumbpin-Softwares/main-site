const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    // Loaded on every page for shared partials (footer). Utilities only, no
    // preflight, so it can sit alongside Bootstrap on the legacy pages.
    .postCss('resources/css/shared.css', 'public/css', [
        require('tailwindcss')({ config: './tailwind.shared.config.js' }),
        require('autoprefixer'),
    ]);
