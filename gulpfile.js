
const gulp = require('gulp')
const browserSync = require('browser-sync').create()
const del = require('del')
const gzip = require('gulp-gzip')
const log = require('fancy-log')
const plumber = require('gulp-plumber')

const HubRegistry = require('gulp-hub');
const hub = new HubRegistry(['tasks/*.js']);

gulp.registry(hub);

const tasks = {
  style: true,
  script: true,
  images: true,
  favicon: false,
  gzip: true,
  php: true
}


gulp.task('skip', (done) => {
  done()
})

gulp.task('gzip', () => {
	return gulp.src([
    './wp-content/themes/nc_bus_safety/*.js',
    './wp-content/themes/nc_bus_safety/*.css'
  ])
		.pipe(plumber())
    .pipe(gzip())
		.pipe(gulp.dest('./wp-content/themes/nc_bus_safety'))
})

gulp.task('php', () => {
	return gulp.src('./src/**/*.php')
		.pipe(plumber())
		.pipe(gulp.dest('./wp-content/themes/nc_bus_safety'))
})


gulp.task('compile', gulp.series(
  tasks.script ? 'javascript' : 'skip',
  tasks.style ? 'css' : 'skip',
  tasks.images ? 'images' : 'skip',
  tasks.images ? 'imageMin' : 'skip',
  tasks.favicon ? 'favicon' : 'skip',
  tasks.gzip ? 'gzip' : 'skip',
  tasks.php ? 'php' : 'skip',
  ()=>{return del('./holder')},
  ()=>{return del('./build')}
))

gulp.task('watch', () => {
  gulp.watch('src/styles/*.scss', gulp.series('css')),
  gulp.watch('src/scripts/*.js', gulp.series('javascript')),
  gulp.watch('src/assets/*', gulp.series('images', 'imageMin')),
  gulp.watch('src/**/*.php', gulp.series('php'))
  return
})

gulp.task('build', gulp.series('compile', 'watch'))
