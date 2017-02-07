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


function executeBundle(bundle){
  return bundle
      .bundle()
      .on("error", function (err){console.log("Error: "+ err.message); })
      .pipe(source('index.js'))
      .pipe(rename('app.js'))
      .pipe(gulp.dest('./public/js/build'));
}

gulp.task('prueba', function (){
  var options = {
    entries:['./resources/src/js/index.js'],
    debug: true,
    plugin: [watchify]
  };

  var bundle = browserify(options);
  //bundle.plugin(watchify);
  bundle.transform(babel.configure({presets: ["es2015"]}));


  bundle
      .on('update', function( file ) {
          console.log("Updated file. Bundling...");
          console.log(file);
          executeBundle( bundle );
      })
      .on('log', function( msg ) {
          console.log( msg );
      });
      
  return executeBundle(bundle);
});


gulp.task('copy', function (){

  gulp.src('./node_modules/jquery/dist/jquery.min.js')
      .pipe(gulp.dest('public/js/jquery'));

  gulp.src('./node_modules/bootstrap/dist/**/*')
      .pipe(gulp.dest('public/css/bootstrap'));

  gulp.src('./node_modules/vegas/dist/overlays/*')
      .pipe(gulp.dest('public/css/vegas/overlays'));

  gulp.src('./node_modules/vegas/dist/vegas.min.css')
      .pipe(gulp.dest('public/css/vegas'));
});

/*gulp.task('watch', function () {
    var options = {
        entries: ['./resources/src/js/index.js'],
        debug: true
    };

    var bundle = browserify(options);
    bundle = watchify( bundle );
    bundle.transform(babel.configure({presets: ["es2015"]}));

    bundle
        .on('update', function( file ) {
            console.log("Updated file. Bundling...");
            console.log(file);
            executeBundle( bundle );
        })
        .on('log', function( msg ) {
            console.log( msg );
        });
    return executeBundle( bundle );
});
*/




gulp.task('default', ['prueba', 'copy']);
