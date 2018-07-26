var 	gulp          = require('gulp'),
		gutil         = require('gulp-util' ),
		sass          = require('gulp-sass'),
		browserSync   = require('browser-sync'),
		concat        = require('gulp-concat'),
		uglify        = require('gulp-uglify'),
		cleancss      = require('gulp-clean-css'),
		rename        = require('gulp-rename'),
		autoprefixer  = require('gulp-autoprefixer'),
		notify        = require("gulp-notify");

//gulp.task('browser-sync', function() {
//	browserSync({
//		server: {
//			baseDir: 'frontend'
//		},
//		notify: false,
//		// open: false,
//		// online: false, // Work Offline Without Internet Connection
//		// tunnel: true, tunnel: "test-lamp.local", // Demonstration page: http://projectname.localtunnel.me
//	});
//});

gulp.task('styles', function() {
	return gulp.src('frontend/web/sass/*.sass')
	.pipe(sass({ outputStyle: 'expanded' }).on("error", notify.onError()))
	.pipe(rename({ suffix: '.min', prefix : '' }))
	.pipe(autoprefixer(['last 15 versions']))
	.pipe(cleancss( {level: { 1: { specialComments: 0 } } })) // Opt., comment out when debugging
	.pipe(gulp.dest('frontend/web/css'))
});

gulp.task('css',function () {
	return gulp.src([
		'frontend/web/css/'
	])

})


gulp.task('js', function() {
	return gulp.src([
		'frontend/web/js/likes.js',
		'frontend/web/js/scripts.js', // Always at the end
		])
	.pipe(concat('scripts.min.js'))
	.pipe(gulp.dest('frontend/web/js'))
});



gulp.task('watch', ['styles', 'js'], function() {
	gulp.watch('frontend/web/sass/**/*.sass', ['styles']);
	gulp.watch(['frontend/web/js/scripts.js'], ['js']);
});

gulp.task('default', ['watch']);
