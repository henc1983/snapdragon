const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');
var browserSync = require('browser-sync').create();




gulp.task('watch', function(){
    gulp.watch(['*.scss', './src/styles/**/*.scss'], gulp.parallel(['loop', 'loopMin', 'mainStyle']));
});




gulp.task('mainStyle', async () => {
    return gulp.src('style.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({style: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./'))
    }
);




gulp.task('loop', async () => {
    return gulp.src('./src/styles/loop.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('assets/styles'))
    }
);




gulp.task('loopMin', async () => {
    return gulp.src('./src/styles/loop.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({style: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('assets/styles'))
    }
);