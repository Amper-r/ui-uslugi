export const server = (done) => {
    app.plugins.browsersync.init({
        proxy: "ui-practic.ru",
        open: 'external',
        host: "localhost",
        port: 4000,
    });
}