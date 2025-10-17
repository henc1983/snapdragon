const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');





gulp.task('watch', function(){
    gulp.watch(['*.scss', './src/styles/**/*.scss'], gulp.series('mainStyle'));
});




gulp.task('mainStyle', async () => {
    return gulp.src('style.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({style: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./'))
    }
);
