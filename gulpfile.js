var scripts = [
    'web/assets/vendor/jquery/dist/jquery.js',
    'web/assets/vendor/bootstrap/dist/js/bootstrap.js'
];

var gulp   = require('gulp');
var concat = require('gulp-concat');
var expect = require('gulp-expect-file');

gulp.task('scripts', function () {
    return gulp.src(scripts)
        .pipe(expect(scripts))
        .pipe(concat('app.js'))
        .pipe(gulp.dest('web/assets'))
});
