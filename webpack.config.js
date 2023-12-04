const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
module.exports = {
  mode: 'development',
  watch: true,
  entry: {
    'js/app' : './src/js/app.js',
    'js/inicio' : './src/js/inicio.js',
    'js/login/index' : './src/js/login/index.js',    
    'js/menu/index' : './src/js/menu/index.js',
    'js/armas/index' : './src/js/armas/index.js',
    'js/grados/index' : './src/js/grados/index.js',
    'js/plazas/index' : './src/js/plazas/index.js',
    'js/offices/index' : './src/js/offices/index.js',
    'js/oficinas/index' : './src/js/oficinas/index.js',
    'js/sistemas/index' : './src/js/sistemas/index.js',
    'js/maquinas/index' : './src/js/maquinas/index.js',
    'js/antivirus/index' : './src/js/antivirus/index.js',
    'js/incidentes/index' : './src/js/incidentes/index.js',
    'js/reporte/index' : './src/js/reporte/index.js',
    'js/conclusiones/index' : './src/js/conclusiones/index.js',
    'js/reporteinc/index' : './src/js/reporteinc/index.js',
    'js/categorias/index' : './src/js/categorias/index.js',
    'js/soluciones/index' : './src/js/soluciones/index.js',
    'js/estadisticas/index' : './src/js/estadisticas/index.js',
    'js/personasaltas/index' : './src/js/personasaltas/index.js',
    'js/compo_activos/index' : './src/js/compo_activos/index.js',
    'js/efectosAbv/index' : './src/js/efectosAbv/index.js',
    'js/organizaciones/index' : './src/js/organizaciones/index.js',
    'js/ponderaciones/index' : './src/js/ponderaciones/index.js',
    'js/impacto/index' : './src/js/impacto/index.js',
    'js/inst_internas/index' : './src/js/inst_internas/index.js',
    'js/inst_externas/index' : './src/js/inst_externas/index.js',
    'js/perpetradores/index' : './src/js/perpetradores/index.js',
    'js/motivos_perpetradores/index' : './src/js/motivos_perpetradores/index.js',
    'js/personasplanillas/index' : './src/js/personasplanillas/index.js',
    'js/estadisticasincidentes/index' : './src/js/estadisticasincidentes/index.js',
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