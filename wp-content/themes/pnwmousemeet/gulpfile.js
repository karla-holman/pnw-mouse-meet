var gulp = require('gulp');
var sourcemaps = require('gulp-sourcemaps');
var notify = require('gulp-notify');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var concat = require('gulp-concat');

var config = {
     sassPath: './assets/sass',
     bowerDir: './bower_components'
}

gulp.task('css', function() {
    return gulp.src(config.sassPath + '/style.scss')
        .pipe(sourcemaps.init())
         .pipe(sass({
                 // outputStyle: 'compressed',
                 sourceMap: true,
                 includePaths: [
                     './assets/sass',
                     config.bowerDir + '/bootstrap-sass/assets/stylesheets',
                     config.bowerDir + '/font-awesome/scss',
                 ],
             }).on('error', sass.logError))
         .pipe(sourcemaps.write())
         .pipe(gulp.dest('./dist/css'))
         .pipe(browserSync.stream())
         .pipe(notify('SCSS compilation done'));
});

// List all your JS files HERE
var js_files = [
    'bower_components/jquery/jquery.js',
    'bower_components/bootstrap-sass/assets/javascripts/bootstrap.js',
    'assets/js/**/*.js'
];

gulp.task('scripts', function() {
    return gulp.src(js_files)
        .pipe(sourcemaps.init())
        .pipe(concat('main.js'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./dist/scripts'))
        .pipe(browserSync.stream())
        .pipe(notify( 'JS compiled' )); // Output to notification
});

var img_files = [
    'assets/images/**/*'
];

gulp.task( 'images', function() {
    return gulp.src(img_files)
        .pipe(gulp.dest( 'dist/images' ))
        .pipe(browserSync.stream());
});

gulp.task( 'images-min', function() {
    return gulp.src( img_files )
    .pipe( imagemin( {
        optimizationLevel: 3,
        progressive: true,
        interlaced: true
    } ) )
    .pipe( gulp.dest( 'dist/images' ) );
});

gulp.task('default', [ 'css', 'scripts', 'images', 'images-min' ]);
