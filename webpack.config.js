const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
module.exports = {
  mode: 'development',
  watch: true,
  entry: {
    'js/app' : './src/js/app.js',
    'js/inicio' : './src/js/inicio.js',
    'js/armas/index' : './src/js/armas/index.js',
    'js/grados/index' : './src/js/grados/index.js',
    'js/offices/index' : './src/js/offices/index.js',
    'js/puestos/index' : './src/js/puestos/index.js',
    'js/personas/index' : './src/js/personas/index.js',
    'js/oficinas/index' : './src/js/oficinas/index.js',
    'js/sistemas/index' : './src/js/sistemas/index.js',
    'js/antivirus/index' : './src/js/antivirus/index.js',
    'js/inventarios/index' : './src/js/inventarios/index.js',
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'public/build')
  },
  plugins: [
    new MiniCssExtractPlugin({
        filename: 'styles.css'
    })
  ],
  module: {
    rules: [
      {
        test: /\.(c|sc|sa)ss$/,
        use: [
            {
                loader: MiniCssExtractPlugin.loader
            },
            'css-loader',
            'sass-loader'
        ]
      },
      {
        test: /\.(png|svg|jpg|gif)$/,
        loader: 'file-loader',
        options: {
           name: 'img/[name].[hash:7].[ext]'
        }
      },
    ]
  }
};