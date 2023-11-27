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
        /* Cambia "red" por el color que desees */

    }
    #btnActualizar:hover {
            background-color: #2079b0;
        }

    /* Estilos para agregar espaciado entre los div */
    .container>.row>.col-lg-18>div {
        margin-bottom: 100px;
        /* Cambia el valor según el espaciado deseado */
    }

    /* Estilo para resaltar al pasar el ratón */
    .container>.row>.col-lg-18>div:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 1.10);
        /* Cambia la sombra según tu preferencia */
        z-index: 3;
        /* Para asegurar que esté sobre las demás figuras */
        transform: scale(1.10);
        /* Efecto de escala al pasar el ratón */
        transition: all 0.2s ease;
        /* Animación suave */
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-18">
            <center>
                <h1 class="reporte-titulo">ESTADISTICAS DE INVENTARIO</h1>
                <button id="btnActualizar" class="btn btn-info">Actualizar</button>
            </center>
            <div class="row mt-5">
                <div class="card col-lg-3 mb-4 item">
                    <h4>
                        <center>Sistemas Operativos</center>
                    </h4>
                    <canvas id="chartMaquina" width="50%"></canvas>
                </div>
                <div class="card col-lg-3 mb-4 item">
                    <h4>
                        <center> Tipo de Offices</center>
                    </h4>
                    <canvas id="chartSoftware" width="50%"></canvas>
                </div>
                <div class="card col-lg-3 mb-4 item">
                    <h4>
                        <center> Tipo de Antivirus</center>
                    </h4>
                    <canvas id="chartAntivirus" width="50%"></canvas>
                </div>
                <div class="card col-lg-3 mb-4 item">
                    <h4>
                        <center>Tipo de Maquinas</center>
                    </h4>
                    <canvas id="chartMaquinas" width="50%"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= asset('./build/js/estadisticas/index.js') ?>"></script>