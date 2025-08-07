const browserSync = require('browser-sync').create();
const webpack = require('webpack');
const webpackDevMiddleware = require('webpack-dev-middleware');
const webpackConfig = require('./webpack.config.js');
const bundler = webpack(webpackConfig);

browserSync.init({
    proxy: 'http://localhost:8080',  // WordPressインスタンスをプロキシ
    files: [
        'themes/tanzo-jp.com/assets/css/*.css',
        'themes/tanzo-jp.com/assets/js/*.js',
        'themes/tanzo-jp.com/**/*.php'
    ],
    middleware: [
        webpackDevMiddleware(bundler, {
            publicPath: webpackConfig.output.publicPath,
            stats: { colors: true },
            writeToDisk: true
        })
    ],
    port: 3000,
    open: false,
    reloadDelay: 100, // リロードの遅延時間を短縮
    notify: false // ブラウザ通知を無効にする
});
