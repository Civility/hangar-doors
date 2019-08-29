'use strict'
const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const plumber = require("gulp-plumber");
const csso = require('gulp-csso');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const del = require('del');
const notify = require('gulp-notify');
const imagemin = require('gulp-imagemin');
const remember = require('gulp-remember');
const newer = require('gulp-newer');
var browserSync = require('browser-sync').create();

//пути gulp.src
var path = {
	src: {
		js: './gulp/js/*.js',
		appjs: [
			'./node_modules/jquery/dist/jquery.min.js',
			'./node_modules/slick-carousel/slick/slick.min.js',
			'./node_modules/magnific-popup/dist/jquery.magnific-popup.min.js',
			'./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js'
		],
		appcss: [
			// './gulp/scss/libs/@fortawesome/fontawesome-free/fontawesome.scss', //прописан в scss
			'./gulp/scss/libs/magnific-popup/main.scss',
			'./gulp/scss/libs/slick-carousel/slick.scss',
			'./gulp/scss/libs/slick-carousel/slick-theme.scss'
		],
		css: './gulp/scss/main.scss',
		img: './gulp/img/**/*',
		font: [
			'./gulp/fonts/**/*.*',
			'./node_modules/slick-carousel/slick/fonts/**/*.*',
		],
	},
	dest: {
		js: './js/',
		css: './css/',
		img: './images/',
		font: './fonts/'
	},
	clean: ['./dist/js/main.js', './dist/css/style.css']
}
// Clean assets
function clean() {
	return del(path.clean);
}
//img
function img() {
	return gulp
		.src(path.src.img)
		.pipe(plumber())
		.pipe(newer(path.dest.img))
		.pipe(
			imagemin([
				imagemin.gifsicle({
					interlaced: true
				}), // gif
				imagemin.jpegtran({
					progressive: true
				}), // jpg
				imagemin.optipng({
					optimizationLevel: 5
				}), // png
				imagemin.svgo({ // svg
					plugins: [{
							removeViewBox: true
						},
						{
							cleanupIDs: false
						}
					]
				})
			])
		)
		.pipe(remember('img'))
		.pipe(gulp.dest(path.dest.img));
}

// fonts	
function fonts() {
	return gulp.src(path.src.font)
		.pipe(newer(path.dest.font))
		.pipe(plumber())
		.pipe(gulp.dest(path.dest.font));
}

//свои css
function css() {
	return gulp.src(path.src.css)
		.pipe(plumber({
			errorHandler: notify.onError(function (error) {
				return {
					title: "Sass function css!",
					message: "<%= error.message %>"
				}
			})
		}))
		.pipe(sass.sync({
			outputStyle: 'compressed'
		})) // nested expanded compact compressed
		.pipe(autoprefixer({
			overrideBrowserslist: ['last 2 versions'],
			cascade: false,
			grid: true
		}))
		.pipe(concat('style.css'))
		.pipe(csso())
		// .pipe(csso({
		// 	restructure: false,
		// 	debug: true
		// }))
		.pipe(gulp.dest(path.dest.css))
		.pipe(browserSync.stream());
}

// копируем фаилы css
function appcss() {
	return gulp.src(path.src.appcss)
		.pipe(plumber())
		.pipe(sass.sync({
				outputStyle: 'compressed'
			}).on('error', sass.logError)
			.on('error', notify.onError({
				title: "Sass function appcss",
				message: "<%= error.message %>"
			}))
		)
		.pipe(autoprefixer({
			overrideBrowserslist: ['last 2 versions'],
			cascade: false,
			grid: true
		}))
		.pipe(concat('app.css'))
		.pipe(csso())
		// .pipe(csso({
		// 	restructure: true,
		// 	debug: true
		// }))
		.pipe(remember('appcss'))
		.pipe(gulp.dest(path.dest.css))
		.pipe(browserSync.stream());
}

// копируем фаилы js
function js() {
	return gulp.src(path.src.js)
		// .pipe(concat('main.js'))
		.pipe(uglify({
			toplevel: false
		})) // {toplevel: true}
		.pipe(plumber())
		.pipe(remember('js'))
		.pipe(gulp.dest(path.dest.js))
		.pipe(browserSync.stream());
}

function appjs() {
	return gulp.src(path.src.appjs)
		.pipe(concat('libs.js'))
		.pipe(uglify())
		.pipe(plumber())
		.pipe(remember('appjs'))
		.pipe(gulp.dest(path.dest.js))
		.pipe(browserSync.stream());
}
//добавление функции к команде
gulp.task('appcss', appcss);
gulp.task('fonts', fonts);
gulp.task('img', img);
gulp.task('css', css);
gulp.task('js', js);
gulp.task('appjs', appjs);

gulp.task('clean', clean);

gulp.task('build', gulp.series('clean',
	gulp.parallel('appcss', 'css', 'js', 'appjs', 'fonts', 'img')));

gulp.task('watch', watch);
gulp.task('serve', serve);

function watch() {
	gulp.watch('./gulp/fonts/**/*.*', fonts);
	gulp.watch('./gulp/img/**/*.*', img);
	gulp.watch('./gulp/js/libs/*.js', appjs);
	gulp.watch(path.src.js, js);
	gulp.watch(['./gulp/scss/main.scss', './gulp/scss/themes/**/*.scss', './gulp/scss/bootstrap/**/*.scss'], css);
	gulp.watch('./gulp/scss/libs/**/*.scss', appcss);
}

function serve() {
	browserSync.init({
		proxy: 'hangar-doors',
		// http://192.168.1.101:3000 - сам сайт,
		// http://192.168.1.101:9090 - webkit инспектор
		//server: 'joomla/',
		open: false,
		reloadOnRestart: true,
		'ui': {
			// Кастомный порт для webkit инспектора, можно использовать любой не занятый
			'weinre': {
				'port': 3000
			}
		}
	})
	browserSync.watch([
		'./gulp/scss/**/*.scss',
		'./gulp/img/**/*.*',
		'./gulp/js/**/*.js'
	]).on('change', browserSync.reload);
}
gulp.task('go', gulp.series('build', gulp.parallel('watch', 'serve')));