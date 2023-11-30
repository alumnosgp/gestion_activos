<!-- <style>
    body{
        background-color: #ffa389;
    }

    .reporte-titulo {
            font-family: Arial;
            font-size: 48px;
            font-weight: bold;
            color: #000000;
        }
    #btnActualizar{
        background-color: #159fff; /* Cambia "red" por el color que desees */
        
    }
    /* Estilos para agregar espaciado entre los div */
    .container > .row > .col-lg-18 > div {
        margin-bottom: 100px; /* Cambia el valor según el espaciado deseado */
    }

    /* Estilo para resaltar al pasar el ratón */
    .container > .row > .col-lg-18 > div:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 1.10); /* Cambia la sombra según tu preferencia */
        z-index: 3; /* Para asegurar que esté sobre las demás figuras */
        transform: scale(1.10); /* Efecto de escala al pasar el ratón */
        transition: all 0.2s ease; /* Animación suave */
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-18">
            <center><h1 class="reporte-titulo">ESTADISTICAS DE LOS INCIDENTES</h1>
            <button id="btnActualizar" class="btn btn-info">Actualizar</button></center>
            <div class="row mt-5">
                <div class="card col-lg-3 mb-4 item">
                <h4><center>Tipo de Incidentes</center></h4>
                    <canvas id="chartMaquina" width="50%"></canvas>
                </div>
                <div class="card col-lg-3 mb-4 item">
                <h4><center>Categoria del Incidente</center></h4>
                    <canvas id="chartSoftware" width="50%"></canvas>
                </div>
                <div class="card col-lg-3 mb-4 item">
                <h4><center>Tipo Perpetrador</center></h4>
                    <canvas id="chartAntivirus" width="50%"></canvas>
                </div>
                <div class="card col-lg-3 mb-4 item">
                <h4><center>Motivo Perpetrador</center></h4>
                    <canvas id="chartMaquinas" width="50%"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>-->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidentes</title>
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
</head>

<body>
    <div class="container">
        <h1 class="reporte-titulo">ESTADISTICAS DE LOS INCIDENTES</h1>
        <button id="btnActualizar">Actualizar</button>
        <div class="row">
            <div class="card">
                <h4>Estado del Incidente</h4>
                <canvas id="chartEstado"></canvas>
            </div>
            <div class="card">
                <h4>Categoria Incidente</h4>
                <canvas id="chartCategorias"></canvas>
            </div>
            <div class="card">
                <h4>Categoria Componentes</h4>
                <canvas id="chartComponentes"></canvas>
            </div>
            <div class="card">
                <h4>Tipo de Incidente</h4>
                <canvas id="chartTipos"></canvas>
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

    <!-- <script src=""></script> -->
    <script src="<?= asset('./build/js/estadisticasincidentes/index.js') ?>"></script>
</body>

</html>