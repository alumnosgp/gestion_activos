<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zziy2YFZ5rPqFMPPpjBRBoxDx2PbAKL3LO9QGHvZ56z25UNR/lvO+ebBqISQSmF5" crossorigin="anonymous">
    <title>PDF Inventario</title>

    <head>
        <style>
            /* Estilos que proporcionaste */
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f5f5f5;
                margin: 0;
                padding: 0;
            }

            /* ... (Estilos anteriores) ... */

            /* Estilos nuevos para la tabla */
            .invoice {
                width: 100%;
                font-size: 14px;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            .invoice th,
            .invoice td {
                border: 1px solid #e0e0e0;
                padding: 10px;
                text-align: left;
            }

            .invoice th {
                background-color: #8fcfbf;
                font-weight: bold;
                color: #333;
            }

            /* COLORES ENTRE LAS LINEAS  AZULES*/
            .invoice tbody tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            .invoice tbody tr:hover {
                background-color: #e0e0e0;
            }

            /* Estilos para la fila de descripción del equipo Y color azul entre las lineas  */
            .description-row {
                background-color: #0da3de;
                font-weight: bold;
                color: #343a40;
            }

            .description-row td {
                padding: 8px;
                text-align: left;
                font-size: 12px;
                border: 1px solid #dee2e6;
            }
        </style>
    </head>

<body>

    <style>
        /* Estilos para centrar los títulos en la hoja de impresión */
        @media print {

            .invoice-header,
            .company-info {
                text-align: center;
                margin-bottom: 10px;
                /* Puedes ajustar el margen según sea necesario */
            }

            .company-info p {
                margin: 0;
                /* Elimina los márgenes de los párrafos */
            }
        }
    </style>


    <div style="text-align:center;">
        <img src="./images/ciber.jpg" alt="Descripción de la imagen" style="width: 100px; height: auto;">
    </div>


    <!-- Información de los Inventarios -->
    <div class="company-info">
        <h1>EJÉRCITO DE GUATEMALA</h1>
        <p class="company-name">Comando de Informatica y Tecnología</p>
        <p class="company-address">12 Ave. Zona - 13, Ciudad de Guatemala, Código Postal 12345</p>
        <p>Teléfono: (123) 456-7890</p>
        <p>Email: info@ciberseguridad.com</p>
    </div>

    <table class="invoice">
        <thead>
            <tr>
                <th colspan="2" text-align="center">
                    <h2>INVENTARIOS DE ACTIVOS</h2>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="description-row">
                <td>ID:</td>
                <td><?= $maquina['maq_id'] ?></td>
            </tr>
            <tr class="description-row">
                <td>Tipo:</td>
                <td><?= $maquina['maq_tipo'] ?></td>
            </tr>
            <tr class="description-row">
                <td>Nombre:</td>
                <td><?= $maquina['maq_nombre'] ?></td>
            </tr>
            <tr class="description-row">
                <td>DIRECCION MAC:</td>
                <td><?= $maquina['maq_mac'] ?></td>
            </tr>
            <tr class="description-row">
                <td>Capacidad RAM:</td>
                <td><?= $maquina['maq_ram_capacidad'] ?></td>
            </tr>
            <tr class="description-row">
                <td>Tipo de Disco Duro:</td>
                <td><?= $maquina['maq_tipo_disco_duro'] ?></td>
            </tr>
            <tr class="description-row">
                <td>Capacidad Disco Duro:</td>
                <td><?= $maquina['maq_disco_capacidad'] ?></td>
            </tr>
            <tr class="description-row">
                <td>Capacidad Procesador:</td>
                <td><?= $maquina['maq_procesador_capacidad'] ?></td>
            </tr>
            <tr class="description-row">
                <td>Plaza:</td>
                <td><?= $maquina['maq_plaza'] ?></td>
            </tr>
            <tr class="description-row">
                <td>Personal de Alta</td>
                <td><?= $maquina['maq_per_alta'] ?></td>
            </tr>
            <tr class="description-row">
                <td>Personal de Plantilla</td>
                <td><?= $maquina['maq_per_planilla'] ?></td>
            </tr>
            <tr class="description-row">
                <td>Sistema Operativo</td>
                <td><?= $maquina['maq_sistema_op'] ?></td>
            </tr>
            <tr class="description-row">
                <td>Tipo de Office</td>
                <td><?= $maquina['maq_office'] ?></td>
            </tr>
            <tr class="description-row">
                <td>Licencia de Office</td>
                <td><?= $maquina['maq_lic_office'] ?></td>
            </tr>
            <tr class="description-row">
                <td>Tipo de Antivirus</td>
                <td><?= $maquina['maq_antivirus'] ?></td>
            </tr>
            <tr class="description-row">
                <td>Licencia de Antivirus</td>
                <td><?= $maquina['maq_lic_antv'] ?></td>
            </tr>
            <tr class="description-row">
                <td>Uso</td>
                <td><?= $maquina['maq_uso'] ?></td>
            </tr>
            <!-- ... Continuar con el resto de los datos ... -->
        </tbody>
    </table>
</body>

</html>