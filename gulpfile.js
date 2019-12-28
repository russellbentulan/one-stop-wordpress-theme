var gulp = require("gulp"),
  browserSync = require("browser-sync"),
  babel = require("babelify"),
  reload = browserSync.reload,
  browserify = require("browserify"),
  source = require("vinyl-source-stream"),
  buffer = require("vinyl-buffer"),
  concat = require("gulp-concat"),
  imageMin = require("gulp-imagemin"),
  cleanCSS = require("gulp-clean-css"),
  cssnano = require("cssnano"),
  notify = require("gulp-notify"),
  plumber = require("gulp-plumber"),
  sass = require("gulp-sass"),
  sourcemaps = require("gulp-sourcemaps"),
  postcss = require("gulp-postcss"),
  autoprefixer = require("autoprefixer"),
  uglify = require("gulp-uglify");

gulp.task("bs", function() {
  browserSync.init(null, {
    proxy: "one-stop.local"
  });
});

gulp.task("styles", function() {
  return gulp
    .src("sass/**/*.scss")
    .pipe(sourcemaps.init())
    .pipe(sass())
    .on("error", sass.logError)
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(sourcemaps.write("./"))
    .pipe(gulp.dest("./"))
    .pipe(reload({ stream: true }));
});

gulp.task("js", function() {
  return browserify({
    extensions: [".js"],
    entries: ["./js/scripts.js"],
    sourceType: "module",
    debug: true
  })
    .transform("babelify", {
      sourceMaps: true,
      presets: ["env"]
    })
    .bundle()
    .pipe(source("main.min.js"))
    .pipe(buffer())
    .pipe(uglify())
    .pipe(gulp.dest("js"))
    .pipe(reload({ stream: true }));
});

gulp.task("images", function() {
  gulp
    .src("./images/**/*")
    .pipe(imageMin())
    .pipe(gulp.dest("./images"));
});

// configure which files to watch and what tasks to use on file changes
gulp.task("watch", function() {
  gulp.watch(["js/**/*.js", "!js/main.min.js"], gulp.series("js"));
  gulp.watch("sass/**/*.scss", gulp.series("styles"));
});

gulp.task(
  "default",
  gulp.series(
    gulp.parallel("watch", "styles", "bs", "js", "images"),
    function() {}
  )
);
