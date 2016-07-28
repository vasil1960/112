var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('app.scss')

        .styles([
            'app.css',
            './public/css/bootstrap.min.css',
            './public/css/bootstrap-theme.min.css',
            './public/css/jquery.dataTables.min.css',
            './public/css/datatables.bootstrap.css',
            './public/css/select2.min.css',
            './public/css/bootstrap-datetimepicker.min.css'
            //'./node_modules/laravel-datatables-demo-master/public/css/demo.css',
            //'./node_modules/laravel-datatables-demo-master/public/css/zenbum.css'
        ],null, 'public/css')

        .scripts([
            './public/js/jquery.min.js',
            './public/js/bootstrap.min.js',
            './public/js/jquery.dataTables.min.js',
            './public/js/select2.full.min.js',
            './public/js/moment.min.js',
            './public/js/bootstrap-datetimepicker.min.js',
            './public/js/i18n/bg.js',
            //'./public/js/my_scripts.js'
        ], null, 'public/js')

        .copy([
            './node_modules_my/bootstrap-sass/assets/fonts/bootstrap/*.*'
        ], 'public/fonts/bootstrap/')

        .copy([
            './node_modules/laravel-datatables-demo-master/public/fonts/*.*'
        ],'public/fonts/')
        .copy([
            './node_modules/laravel-datatables-demo-master/public/images/*.*'
        ],'public/images')

});
