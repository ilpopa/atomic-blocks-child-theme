// terminaaliin gulp devaa - niin tulee browsersync, sass, minifointi päälle

// Grab our gulp packages
var 
    gulp            = require('gulp'),
    util           = require('gulp-util'),
    sass            = require('gulp-sass'),
    cssnano         = require('gulp-cssnano'),
    autoprefixer    = require('gulp-autoprefixer'),
    sourcemaps      = require('gulp-sourcemaps'),
    plumber         = require('gulp-plumber'),
    concat          = require('gulp-concat');
    uglify          = require('gulp-uglify-es').default,
    rename          = require('gulp-rename'),
    browserSync     = require('browser-sync').create();



// Browsersynciin oikea kansio
    var path = require("path"),
    url = path.join(__dirname, '../../../');
    kansio = url.substr(15);



// Compile Sass, Autoprefix and minify
gulp.task('styles', function() {
    return gulp.src('./inc/sass/*.scss')
        .pipe(plumber(function(error) {
            util.log(util.colors.red(error.message));
            this.emit('end');
        }))
        .pipe(sourcemaps.init()) // Start Sourcemaps
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 3 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('.'))
        //.pipe(rename({suffix: '.min'}))
        .pipe(cssnano({zindex: false}))
        .pipe(sourcemaps.write('.')) // Creates sourcemaps for minified styles
        .pipe(gulp.dest('.'))
});

// Browser-Sync watch files and inject changes
gulp.task('devaa', function() {
    // Watch files
    var files = [
      '**/*.css', 
      '**/*.php',
      'img/**/*.{png,jpg,gif,svg,webp}',
    ];
    
    browserSync.init(files, {
      // Replace with URL of your local site
      //proxy: "localhost" + kansio,
      proxy: "http://frontity.local/",
      injectChanges: true,
    }),

    gulp.watch('./inc/sass/*.scss', ['styles']);
    //gulp.watch( [ './sass/**/*.scss' ], [ 'sass' ] );
});


// Watch files for changes (without Browser-Sync)
gulp.task('watch', function() {

// Watch .scss files
  gulp.watch('./inc/**/*.scss', ['styles']);

}); 


// Run styles, site-js and foundation-js
gulp.task('default', function() {
  gulp.start('styles');
  gulp.start('compress');
});
