const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const webpack = require('webpack'); // webpackモジュールのインポート

module.exports = {
  mode: 'development',
  entry: [
    './src/index.js',
    './src/styles.scss'
  ],
  output: {
    path: path.resolve(__dirname, 'themes/tanzo-jp.com/assets/js'),
    filename: 'animation.js',
    publicPath: '/themes/tanzo-jp.com/assets/js/'
  },
  devtool: 'eval-source-map', // より高速なソースマップ
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }
      },
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              url: false // URLの変換を無効にする
            }
          },
          'sass-loader'
        ]
      },
      {
        test: /\.(png|jpe?g|gif|svg)$/,
        type: 'asset/resource',
        generator: {
          filename: 'images/[name][ext]',
          publicPath: '/themes/tanzo-jp.com/assets/images',
          emit: false // 画像ファイルを生成しない
        }
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '../css/all.css'
    }),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery'
    })
  ],
  resolve: {
    alias: {
      '@images': path.resolve(__dirname, 'src/images')
    }
  },
  stats: {
    all: false,
    errors: true,
    errorDetails: true,
    warnings: false,
    colors: true,
    builtAt: true,
    timings: true,
    assets: false,
    modules: false,
    children: false,
    entrypoints: false,
    hash: false,
    version: false
  }
};
