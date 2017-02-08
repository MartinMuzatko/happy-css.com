var webpack = require('webpack')
var postcss = require('postcss')
var autoprefixer = require('autoprefixer')
var cssnano = require('cssnano')
var ExtractTextPlugin = require("extract-text-webpack-plugin")

module.exports = {
    entry: './index.js',
    output: {
        path: './',
        filename: './js/[name].js',
        sourceMapFilename: "./js/[name].js.map",
    },
    module: {
        preLoaders: [
            { test: /\.html$/, loader: 'riotjs' },
            { test: /\.js$/, loader: 'source-map' },
        ],
        loaders: [
            //{ test: /\.(jpe?g|png|gif|mp4)$/i, loader: 'file?name=img/[name].[ext]'},
            //{ test: /fonts\/.*\.(woff|eot|svg|otf|ttf)$/i, loader: `file?name=fonts/[name].[ext]`},
            { test: /\.js|\.html$/, loader: 'babel', query: { presets: 'es2015-riot' }},
            { test: /\.less$/, loader: ExtractTextPlugin.extract('raw!postcss!less')},
            { test: /\.scss$/, loader: ExtractTextPlugin.extract('raw!postcss!sass')},
            { test: /\.json$/, loader: 'json'},
        ]
    },
    postcss: () => {
        return [
            autoprefixer({browsers: 'last 2 versions'}),
            cssnano(),
        ]
    },
    plugins: [
        new webpack.ProvidePlugin({
            riot: 'riot'
        }),
        new ExtractTextPlugin("css/[name].css")
    ],
    devServer: {
        port: 8080,
        inline: true
    },
    eslint: {
        configFile: './.eslintrc'
    },
    devtool: 'source-map'
}
