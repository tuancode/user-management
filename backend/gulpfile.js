var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss', 'public/app/css/all.css')
        .scripts([
            '../../../node_modules/angular/angular.min.js',
            '../../../node_modules/angular-route/angular-route.min.js',
            '../../../node_modules/angular-resource/angular-resource.min.js',
            '../../../node_modules/angular-utils-pagination/dirPagination.js',
            '../../../node_modules/angular-messages/angular-messages.min.js',
            '../../../node_modules/ngstorage/ngStorage.min.js',
            '../../../node_modules/jquery/dist/jquery.min.js',
            '../../../node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
            'app.js',
            'controllers.js',
            'services.js'
        ], 'public/app/js/all.js');
});