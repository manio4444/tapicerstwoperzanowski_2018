var gulp = require('gulp');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
let cleanCSS = require('gulp-clean-css');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('default', ['sass:production', 'uglify:production', 'watch:production']);

gulp.task('sass:production', function() {
  gulp.src(['src/css/**/*.css', 'src/scss/main.scss'])
  .pipe(sourcemaps.init())
  .pipe(sass())
  .on('error', swallowError)
  .pipe(concat('styles.all.min.css'))
  // .pipe(autoprefixer({browsers: ['last 2 versions', '> 1% in PL', 'ie >=10']}))
  .pipe(cleanCSS())
  .pipe(sourcemaps.write())
  .pipe(gulp.dest('dist'));
});

gulp.task('watch:production', function() {
  gulp.watch('src/scss/**/*.scss', ['sass:production']);
  gulp.watch('src/css/**/*.css', ['sass:production']);
  gulp.watch('src/js/**/*.js', ['uglify:production']);
});

gulp.task('uglify:production', function() {
  return gulp.src([
    'src/js/base/jquery.js',
    'src/js/*.js',
    'src/js/base/functions.js',
    'src/js/base/scripts.js',
    'src/js/base/main.js'
  ])
  .pipe(sourcemaps.init())
  .pipe(concat('scripts.all.min.js'))
  .pipe(uglify())
  .on('error', swallowError)
  .pipe(gulp.dest('dist'));
});

function swallowError (error) {
  // If you want details of the error in the console
  console.log(error.toString())
  this.emit('end')
}
