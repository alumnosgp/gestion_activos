<style>
        img {
            border: 2px solid #ccc;
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }
        .container-main {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            width: 90%;
            margin: 60px auto 0;
        }
        .row.buttons {
            display: flex;
            justify-content: center;
        }
        .card.device {
            cursor: pointer;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 5px 75px;
            margin: 10px;
            transition: transform 0.3s ease-in-out;
        }
        .card.device:hover {
            background-color: #007BFF;
            color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transform: scale(1.05);
        }
        .card.inventario {
            background-color: #3498db;
        }
        .card.incidente {
            background-color: #27ae60;
        }
        .card.sistema_operativo {
            background-color: #e74c3c;
        }
        .card.planilleros {
            background-color: #f39c12;
        }
        .border {
            border: 15px solid #dcdcdc;
            border-radius: 5px;
            box-shadow: 0 50px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 10px;
            background-color: #fff;
        }
        h1 {
            background-color: #343a40;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .table-container {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 100px 30px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 10px;
            background-color: #fff;
        }
        .table-container h1 {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table td {
            padding: 10px;
            border: 1px solid #ccc;
            vertical-align: top;
            width: 50%;
        }
        table td strong {
            display: block;
            font-weight: bold;
        }
        .btn-device {
            margin-bottom: 30px;
        }
        .btn-device {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100px;
            border: 10px solid #ccc;
            box-shadow: 0 30px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 15px;
            transition: background-color 0.3s;
        }
        .btn-device:hover {
            background-color: #f0f0f0;
        }
        #contenedor .container-main {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
        }
        #contenedor .btn-device {
            width: 100%;
            margin: 25px;
        }
        #contenedor .container-main {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        #contenedor .btn-device {
            flex: 0 1 calc(25% - 10px);
            margin: 5px;
        }
        #subir {
            border: 3px solid #8BA3C9;
            border-radius: 8px;
            width: 80px;
            height: 60px;
            background-color: #336699;
            color: #ffffff;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            outline: none;
            position: absolute;
            bottom: 20px;
            right: 10px;
        }
        #subir:hover {
            background-color: #001F3F;
        }
    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<div id="contenedor">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-11 border bg-light p-5">
                    <div class="container p-4 shadow-lg">
                        <div class="row">
                            <h1>GESTION DE ACTIVOS DE CIBERSEGURIDAD</h1>
                            <div class="col-md-3">
                            <a href="/gestion_activos/maquinas">
                                <button class="btn btn-primary btn-device card device inventario" id="btn-inventario">
                                    <i class="fas fa-list-alt fa-3x"></i>
                                    <p>Registro de Inventarios</p>
                                </button>
                            </a>
                            </div>
                            <div class="col-md-3">
                            <a href="/gestion_activos/incidentes">
                                <button class="btn btn-success btn-device card device incidente" id="btn-incidente">
                                    <i class="fas fa-exclamation-triangle fa-3x"></i>
                                    <p>Registro de Incidentes</p>
                                </button>
                            </a>
                            </div>
                            <div class="col-md-3">
                            <a href="/gestion_activos/sistemas">
                                <button class="btn btn-danger btn-device card device sistema_operativo" id="btn-sistema_operativo">
                                    <i class="fas fa-desktop fa-3x"></i>
                                    <p>Sistemas Operativos</p>
                                </button>
                            </a>
                            </div>
                            <div class="col-md-3">
                            <a href="/gestion_activos/personasplanillas">
                                <button class="btn btn-warning btn-device card device planilleros" id="btn-planilleros">
                                    <i class="fas fa-users fa-3x"></i>
                                    <p>Registro de Planilleros</p>
                                </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script src="<?= asset('./build/js/menu/index.js') ?>"></script>