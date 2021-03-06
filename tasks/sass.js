const gulp = require('gulp')
const plumber = require('gulp-plumber')
const autoprefixer = require('gulp-autoprefixer')
const cleanCSS = require('gulp-clean-css')
const cssnano = require('cssnano')
const inputRange = require('postcss-input-range');
const mqpacker = require('css-mqpacker')
const postcss = require('gulp-postcss')
const rename = require('gulp-rename')
const sass = require('gulp-sass')
const sourcemaps = require('gulp-sourcemaps')

autoprefixerOptions = {
  browsers: [
    '> 2%',
    'Last 2 versions',
    'IE 7',
  ]
}


gulp.task('sass', ()=> {
  return gulp.src('./src/styles/main.scss')
	  .pipe(plumber())
		.pipe(sourcemaps.init())
	  .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(rename('style'))
		.pipe(sourcemaps.write())
    .pipe(gulp.dest('./holder/styles/'))
})

gulp.task('admin', ()=> {
  return gulp.src('./src/admin/main.scss')
	  .pipe(plumber())
		.pipe(sourcemaps.init())
	  .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(rename('admin'))
		.pipe(sourcemaps.write())
    .pipe(gulp.dest('./holder/styles/'))
})


gulp.task('sass_css', gulp.series('sass', ()=>{
  const plugins = [
    mqpacker({ sort: true }),
    inputRange(),
    cssnano(({ autoprefixer: autoprefixerOptions}))
  ]
  return gulp.src('./holder/styles/style')
	  .pipe(plumber())
		.pipe(sourcemaps.init())
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(postcss(plugins))
		.pipe(sourcemaps.write())
		.pipe(rename({extname: ".css"}))
    .pipe(gulp.dest('./wp-content/themes/nc_bus_safety/'))
}))

gulp.task('admin_css', gulp.series('admin', ()=>{
  const plugins = [
    mqpacker({ sort: true }),
    inputRange(),
    cssnano(({ autoprefixer: autoprefixerOptions}))
  ]
  return gulp.src('./holder/styles/admin')
	  .pipe(plumber())
		.pipe(sourcemaps.init())
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(postcss(plugins))
		.pipe(sourcemaps.write())
		.pipe(rename({extname: ".css"}))
    .pipe(gulp.dest('./wp-content/themes/nc_bus_safety/'))
}))


gulp.task('css', gulp.series('admin_css', 'sass_css'))
