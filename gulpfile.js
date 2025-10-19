const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');
const plumber = require('gulp-plumber');
const babel = require('gulp-babel');
const terser = require('gulp-terser');



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


gulp.task('script', () =>
    gulp.src('./src/scripts/**/*.js')
        .pipe(sourcemaps.init())
        .pipe(plumber())
        .pipe(babel({
            presets: ['@babel/preset-env'],
            plugins: ['@babel/transform-runtime']
        }))
        // .pipe(uglify())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('assets/scripts'))
);


gulp.task('scriptMin', () =>
    gulp.src('./src/scripts/**/*.js')
        .pipe(sourcemaps.init())
        .pipe(plumber())
        .pipe(babel({
            presets: ['@babel/preset-env'],
            plugins: ['@babel/transform-runtime']
        }))
        .pipe(terser(
            {
                safari10: true,
                ecma: 5,
                keep_classnames: false,
                keep_fnames: false,
                mangle: false
            }
        ))
        .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('assets/scripts'))
);