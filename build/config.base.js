const path = require('path')
const { SRC, DIST, ASSETS } = require('./paths')

module.exports = {
  entry: {
    scripts: path.resolve(SRC, 'js', 'index.js')
  },

  module: {
    rules: [
      {
        test: /\.css$/i,
        use: ["style-loader", "css-loader"],
      },
    ],
  },

  output: {
    // Put all the bundled stuff in your dist folder
    path: DIST,

    // Our single entry point from above will be named "scripts.js"
    filename: '[name].js',

    // The output path as seen from the domain we're visiting in the browser
    publicPath: ASSETS
  }
}