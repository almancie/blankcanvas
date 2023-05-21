const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
  watch: true,
  mode: 'production',
  entry: './assets/src/main.js',
  output: {
    filename: 'bundle.min.js',
    path: path.resolve(__dirname, './assets/js')
  },
  module: {
    rules: [
      {
        test: /\.(scss)$/,
        use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
      },
      {
        test: /\.(jsx|js)$/,
        // include: path.resolve(__dirname, 'src'),
        // exclude: /node_modules/,
        use: [{
          loader: 'babel-loader',
          options: {
            presets: [
              ['@babel/preset-env', {
                "targets": "defaults" 
              }],
              ["@babel/preset-react", {"runtime": "automatic"}]
            ]
          }
        }]
      }
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '../css/bundle.min.css',
    }),
  ]
};

// module.exports = {
//   watch: true,
//   mode: 'production',
//   entry: {
//     './assets/src/main': './assets/src/main.js',
//     './assets/src/vc.js': './assets/src/main.js',
//   },
//   output: {
//     filename: 'bundle.min.js',
//     path: path.resolve(__dirname, './assets/js')
//   },
//   module: {
//     rules: [
//       {
//         test: /main\.(scss)$/,
//         use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
//       },
//       {
//         test: /colors\.(scss)$/,
//         use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
//       }
//     ]
//   },
//   plugins: [
//     new MiniCssExtractPlugin({
//       filename: '../css/bundle.min.css',
//     }),
//     new MiniCssExtractPlugin({
//       filename: '../css/colors.min.css',
//     }),
//   ]
// };