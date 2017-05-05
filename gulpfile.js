//const elixir = require('laravel-elixir');

//require('laravel-elixir-vue');

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

/*elixir(mix => {
    mix.sass('app.scss')
       .webpack('app.js');

    mix.copy('node_modules/bootstrap/dist', 'public/assets/css/bootstrap')
       .copy('node_modules/jquery/dist', 'public/assets/js/jquery')
       .copy('node_modules/vegas/dist', 'public/assets/js/vegas');
});*/

var gulp = require('gulp'),
    browserify = require('browserify'),
    babel = require('babelify'),
    source = require('vinyl-source-stream'),
    rename = require('gulp-rename'),
    watchify = require('watchify');


gulp.task('copy', function (){

  gulp.src('./node_modules/jquery/dist/jquery.min.js')
      .pipe(gulp.dest('public/js/jquery'));

  gulp.src('./node_modules/bootstrap/dist/**/*')
      .pipe(gulp.dest('public/css/bootstrap'));

  gulp.src('./node_modules/vegas/dist/overlays/*')
      .pipe(gulp.dest('public/css/vegas/overlays'));

  gulp.src('./node_modules/vegas/dist/vegas.min.css')
      .pipe(gulp.dest('public/css/vegas'));

  gulp.src('./node_modules/datatables.net-dt/**/*')
      .pipe(gulp.dest('public/css/datatables.net-dt'));   
      
});



function compile(watch) {

  
  var bundle = browserify('./resources/src/js/index.js', {debug: true, plugins: [ 'syntax-async-functions', 'transform-regenerator' ] });
  

  /*if (watch) {
    bundle = watchify(bundle);
    bundle.on('update', function () {
      console.log('--> Bundling...');
      rebundle();
    });
  }*/

  function rebundle() {
    bundle
      .transform(babel, { presets: [ 'es2015' ] })
      .bundle()
      .on('error', function (err) { console.log(err); this.emit('end') })
      .pipe(source('index.js'))
      .pipe(rename('app.js'))
      .pipe(gulp.dest('./public/js/build'));
  }

  rebundle();
}


gulp.task('build', function () {
  return compile();
});

gulp.task('watch', function () { 
    //return compile(true); 
    gulp.watch("./resources/src/js/**/*.js", ["build"]);
});
gulp.task('default', ['copy', 'build']);
