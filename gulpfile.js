const gulp = require('gulp'),
  path = require('path'),
  runsequence = require('run-sequence'),
  del = require('del'),
  browserSync = require('browser-sync'),
  reload = browserSync.reload,
  browserify = require('browserify'),
  babelify = require('babelify'),
  buffer = require('vinyl-buffer'),
  source = require('vinyl-source-stream'),
  plugins = require('gulp-load-plugins')();

// #############################################################################
// paths and config
// #############################################################################

const config = {
  files: {
    css: {
      source: path.resolve('assets/styles/*.scss'),
      dest: path.resolve('public/styles'),
      watch: path.resolve('assets/styles/**/*.scss'),
    },
    scripts: {
      source: path.resolve('assets/scripts'),
      dest: path.resolve('public/scripts'),
      watch: path.resolve('assets/scripts/**/*.js')
    },
    images: {
      source: path.resolve('assets/images'),
      dest: path.resolve('public/images'),
      watch: path.resolve('assets/images/**/*.*')
    },
    fonts: {
      source: path.resolve('assets/fonts'),
      dest: path.resolve('public/fonts'),
      watch: path.resolve('assets/fonts/**/*.*')
    },
    templates: {
      watch: path.resolve('sys/templates/**/*.*')
    },
    nodeModules: path.resolve('./node_modules')
  }
}

// #############################################################################
// functions (allows referencing from different tasks)
// #############################################################################

function errorAlert(err) {
	plugins.notify.onError({
		title: 'Error', message: '<%= error.message %>', sound: 'Sosumi'
	})(err);
	console.log(err.toString());
	this.emit('end');
}

function images() {
  return gulp
    .src(`${config.files.images.source}/**/*.*`)
    .pipe(
      plugins.imagemin({
        progressive: true,
        interlaced: true,
        svgoPlugins: [{ removeViewBox: true }]
      })
    )
    .pipe(gulp.dest(`${config.files.images.dest}`))
}

function fonts() {
  return
    gulp.src(`${config.files.fonts.source}/**/*.*`)
    .pipe(gulp.dest(`${config.files.fonts.dest}`))
}

function scripts() {
  return browserify({
    entries: `${config.files.scripts.source}/site.js`,
    debug: !plugins.util.env.production
  })
  .transform(babelify, {
    presets: ['es2015']
  })
  .bundle()
  .pipe(source('site.js'))
  .pipe(buffer())
  .pipe(plugins.uglify())
  .pipe(gulp.dest(`${config.files.scripts.dest}`))
}

function styles() {
	var outputDirectory = config.files.css.dest;
	return gulp.src(config.files.css.source)
		.pipe(plugins.plumber({errorHandler: errorAlert}))
		.pipe(plugins.sass({
			style: 'expanded',
			includePaths: [config.files.nodeModules],
			importer: plugins.importOnce
		}))
		.pipe(plugins.autoprefixer('last 2 versions'))
		.pipe(gulp.dest(outputDirectory))
		.pipe(plugins.rename({ suffix: '.min' }))
		.pipe(plugins.cssnano())
		.pipe(gulp.dest(outputDirectory));
}

function templates() {
  console.log('templates changed!');
}

function serve() {
  browserSync({
    notify: false,
    tunnel: false,
    open: false,
    proxy: {
      target: 'oneteamgov:8888' // this is where your local perch PHP host is
    }
  })
  watch(reload)
}

function watch(cb) {
  const watchers = [
    { glob: `${config.files.css.watch}`, tasks: ['styles'] },
    { glob: `${config.files.images.watch}`, tasks: ['images'] },
    { glob: `${config.files.fonts.watch}`, tasks: ['fonts'] },
    { glob: `${config.files.templates.watch}`, tasks: ['templates'] },
    { glob: `${config.files.scripts.watch}`, tasks: ['scripts'] }
  ]
  watchers.forEach(watcher => {
    cb && watcher.tasks.push(cb)
    gulp.watch(watcher.glob, watcher.tasks)
  })
}

// #############################################################################
// tasks
// #############################################################################

gulp.task('styles', styles);
gulp.task('images', images)
gulp.task('fonts', fonts)
gulp.task('scripts', scripts)
gulp.task('templates', templates)
gulp.task('watch', watch)

gulp.task('assets', () => { runsequence(['styles', 'images', 'scripts', 'fonts']) })
gulp.task('serve', () => { runsequence(['assets'], serve) })

gulp.task('default', ['serve'])
