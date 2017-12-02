// Less configuration
var gulp = require( 'gulp' );
var less = require( 'gulp-less' );
var postcss = require( 'gulp-postcss' );
var autoprefixer = require( 'autoprefixer' );
var cleanCSS = require( 'gulp-clean-css' );
var rootstrapConfig = require( './rootstrap-config.json' );
var rootstrap = require( 'less-plugin-rootstrap' );
var rootstrapPlugin = new rootstrap( { 'config': rootstrapConfig } );
var uglify = require( 'gulp-uglify' );
var rename = require( 'gulp-rename' );
var concat = require( 'gulp-concat' );

gulp.task( 'default', function() {
    gulp.watch( './app/public/less/*.less', ['less-public'] );
    gulp.watch( './app/admin/less/*.less', ['less-admin'] );
 });

gulp.task( 'less-public', function() {
  gulp.src( './app/public/less/taproot-public.less' )
    .pipe( less( { plugins: [rootstrapPlugin] } ) )
    .pipe( postcss([ autoprefixer( { browsers: ['last 2 versions'] } ) ]) )
    .pipe( gulp.dest( './app/public/css' ) )
    .pipe( rename( { extname: '.min.css' } ) )
    .pipe( cleanCSS() )
    .pipe( gulp.dest( './app/public/css' ) );    
 });

gulp.task( 'less-admin', function() {
  gulp.src( './app/admin/less/taproot-admin.less' )
    .pipe( less() )
    .pipe( postcss([ autoprefixer( { browsers: ['last 2 versions'] } ) ]) )
    .pipe( gulp.dest( './app/admin/css' ) )
    .pipe( rename( { extname: '.min.css' } ) )
    .pipe( cleanCSS() )
    .pipe( gulp.dest( './app/admin/css' ) );
 });

var files = [
    'app/vendor/ten1seven/what-input/dist/what-input.js',
    'app/vendor/julianshapiro/velocity/velocity.js',
    'app/vendor/sachinchoolur/lightGallery/src/js/lightgallery.js',
    'app/vendor/sachinchoolur/lg-thumbnail/src/lg-thumbnail.js',
    'app/vendor/sachinchoolur/lg-autoplay/src/lg-autoplay.js',
    'app/vendor/woocommerce/FlexSlider/jquery.flexslider.js',
    'app/vendor/jonathantneal/svg4everybody/dist/svg4everybody.js',
    'app/public/js/taproot.js'
];

gulp.task( 'public-js', function() {
    gulp.src( files )
        .pipe( concat( 'taproot-public.js' ) )
        .pipe( gulp.dest( 'app/public/js' ) )
        .pipe( rename( { extname: '.min.js' } ) )
        .pipe( uglify() )
        .pipe( gulp.dest( 'app/public/js' ) ); 
 });


gulp.task( 'lightbox', function() {
  gulp.src( './app/public/less/taproot-lightbox.less' )
    .pipe( less() )
    .pipe( postcss([ autoprefixer( { browsers: ['last 2 versions'] } ) ]) )
    .pipe( gulp.dest( './app/public/css' ) )
    .pipe( rename( { extname: '.min.css' } ) )
    .pipe( cleanCSS() )
    .pipe( gulp.dest( './app/public/css' ) );
 });