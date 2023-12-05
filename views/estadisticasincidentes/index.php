    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .reporte-titulo {
            font-size: 36px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            transition: color 0.3s ease;
        }

        .reporte-titulo:hover {
            font-family: Arial;
            font-size: 48px;
            font-weight: bold;
            color: #000000;
        }

        #btnActualizar {
            background-color: #3498db;
            color: #fff;
            padding: 15px 25px;
            border: none;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            display: block;
            margin: auto;
            margin-top: 20px;
        }

        #btnActualizar:hover {
            background-color: #2079b0;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 30px;
        }

        .card {
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease, transform 0.3s ease;
            margin-bottom: 30px;
            flex: 0 0 calc(30% - 20px);
            border-radius: 10px;
            box-sizing: border-box;
        }

        @media screen and (max-width: 768px) {
            .card {
                flex-basis: calc(50% - 20px);
            }
        }

        .card:hover {
            box-shadow: 0 10px 20px rgba(33, 150, 243, 0.5);
            transform: translateY(-10px);
        }

        .card h4 {
            font-size: 24px;
            color: #333;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="reporte-titulo">ESTADISTICAS DE LOS INCIDENTES</h1>
                        <form id="formularioFiltros" class="text-center">
                            <div class="mb-3 d-inline-flex align-items-center">
                                <div class="me-3">
                                    <label for="fechaInicio" class="form-label">Fecha inicio</label>
                                    <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
                                </div>
                                <div>
                                    <label for="fechaFin" class="form-label">Fecha fin</label>
                                    <input type="date" class="form-control" id="fechaFin" name="fechaFin">
                                </div>
                            </div>
                            <button id="btnActualizar" class="btn btn-info mt-2" style="width: 50%;"
                                type="button">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="card">
                <h4>Categoria Incidente</h4>
                <canvas id="chartCategorias"></canvas>
            </div>
            <div class="card">
                <h4>Estado del Incidente</h4>
                <canvas id="chartEstado"></canvas>
            </div>
            <div class="card">
                <h4>Tipo de Incidente</h4>
                <canvas id="chartTipos"></canvas>
            </div>
            <div class="card">
                <h4>Categoria Componentes</h4>
                <canvas id="chartComponentes"></canvas>
            </div>
            <div class="card">
                <h4>Tipo Perpetrador</h4>
                <canvas id="chartPerpetrador"></canvas>
            </div>
            <div class="card">
                <h4>Motivo Perpetrador</h4>
                <canvas id="chartMotivo"></canvas>
            </div>
        </div>
    </div>
    <script src="<?= asset('./build/js/estadisticasincidentes/index.js') ?>"></script>
</body>

</html>