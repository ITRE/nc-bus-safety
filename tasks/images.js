const gulp = require('gulp')
const plumber = require('gulp-plumber')
const favicons = require("favicons").stream
const imagemin = require('gulp-imagemin')
const responsive = require('gulp-responsive')


gulp.task('images', () => {
	return gulp.src('./src/assets/*.{png,jpg,jpeg,gif}')
		.pipe(plumber())
    .pipe(responsive({
      'icon-*': [{
        width: 150,
        format: 'webp',
        rename: {extname: ".webp"}
      }, {
        width: 150,
        format: 'png',
        rename: {extname: ".png"}
      }],
      'logo-*': [{
        format: 'webp',
        rename: {extname: ".webp"}
      }, {
        format: 'png',
        rename: {extname: ".png"}
      }],
      'misc-*': [{
        width: 500,
        format: 'webp',
        rename: {extname: ".webp"}
      }, {
        width: 500,
        format: 'png',
        rename: {extname: ".png"}
      }]
    }, {
      errorOnUnusedConfig: false,
      allowEmpty: true
    }))
		.pipe(imagemin())
		.pipe(gulp.dest('./wp-content/themes/nc_bus_safety/assets'))
})

gulp.task('imageMin', () => {
	return gulp.src('./wp-content/themes/nc_bus_safety/assets/*')
		.pipe(plumber())
		.pipe(imagemin())
		.pipe(gulp.dest('./wp-content/themes/nc_bus_safety/assets'))
})

gulp.task('favicon', () => {
	return gulp.src('./src/assets/logo.png')
		.pipe(plumber())
    .pipe(favicons({
        version: 1.0,
        logging: false,
        html: "index.html",
        pipeHTML: true,
        replace: true,
        url: 'http://'+options.home,
        icons: {
          android: false,              // Create Android homescreen icon. `boolean` or `{ offset, background, mask, overlayGlow, overlayShadow }`
          appleIcon: false,            // Create Apple touch icons. `boolean` or `{ offset, background, mask, overlayGlow, overlayShadow }`
          appleStartup: false,         // Create Apple startup images. `boolean` or `{ offset, background, mask, overlayGlow, overlayShadow }`
          coast: false,                // Create Opera Coast icon. `boolean` or `{ offset, background, mask, overlayGlow, overlayShadow }`
          favicons: true,             // Create regular favicons. `boolean` or `{ offset, background, mask, overlayGlow, overlayShadow }`
          firefox: false,              // Create Firefox OS icons. `boolean` or `{ offset, background, mask, overlayGlow, overlayShadow }`
          windows: false,              // Create Windows 8 tile icons. `boolean` or `{ offset, background, mask, overlayGlow, overlayShadow }`
          yandex: false
        }
    }))
		.pipe(gulp.dest('./build/'))
})
