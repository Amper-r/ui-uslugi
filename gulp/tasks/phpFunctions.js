export const phpFunctions = () => {
    return app.gulp.src(app.path.src.phpFunctions)
        .pipe(app.gulp.dest(app.path.build.phpFunctions))
        .pipe(app.plugins.browsersync.stream());
}