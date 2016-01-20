

var gulp = require('gulp'),
    livereload = require('gulp-livereload');

gulp.task('watch', function () {
    var all = [
        './*.css',
        './*.php',
        './inc/*.php',
        './css/**',
        './**.css',
        './**.js',
        './**.php']
    var watcher = gulp.watch(all);
    var server = livereload;
    server.listen(console.log('ok'));
    watcher.on('change', function (event) {
        livereload();
        server.changed(event.path)
        console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    });
})

gulp.task('default', ['watch'])