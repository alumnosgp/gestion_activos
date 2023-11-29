<html lang="en">
<meta charset="UTF-8">
    
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="build/js/app.js"></script>
    <link rel="shortcut icon" href="<?= asset('images/cit.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('build/styles.css') ?>">
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
                margin-bottom: 10px;
            }

            .invoice th,
            .invoice td {
                border: 1px solid #e0e0e0;
                padding: 10px;
                text-align: left;
            }

            .invoice th {
                background-color: #007ac4;
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
                background-color: #f2f2f2;
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
                margin-bottom: 05px;
                /* Puedes ajustar el margen según sea necesario */
            }

            .company-info p {
                margin: 0;
                /* Elimina los márgenes de los párrafos */
            }
        }

        /* Estilos para el pie de firma */
        .signature-section {
            text-align: center;
            margin-top: 100px;
        }

        /* .signature-recibi-entregue {
            float: left;
            width: 30%; /* Ancho fijo para mantenerlos en la misma línea y espaciados */
        /* Añade un poco de espacio entre las firmas */

        /* .signature-entregue {
            float: right;
            /* Esto empujará 'ENTREGUÉ' a la derecha */
        /* width: 30%; */
        /* Ancho igual al de los otros bloques de firma para alineación */
        .signature-line {
            border-top: 2px solid #000;
            margin: 50px;
            width: 80%;
            /* Ancho en porcentaje para mantenerlo dentro del div correspondiente */
        }

        .signature-name {
            font-size: 0.7em;
            text-align: center;
            margin-top: 30px;
            color: #333;
        }

        .firma {
            font-size: 0.9em;
            text-align: center;
            margin-top: 5px;
            margin-bottom: 50px;
            font-weight: bold;
            /* Hacerlo negrita */
            color: #333;
        }

        .signature-responsable {
            display: block;
            margin: 100px auto;
            width: 60%;
            /* Ancho igual al de los otros bloques de firma para alineación */
            color: #333;
        }
    </style>
    <div style="text-align:center;">
        <img src="./images/ciber.jpg" alt="Descripción de la imagen" style="width: 100px; height: auto;">
    </div>
    <!-- Información de los Inventarios -->
    <div class="company-info">
        <!-- <h1 class="company-name">EJÉRCITO DE GUATEMALA</h1> -->
        <p class="company-name">Comando de Informatica y Tecnología</p>
        <p class="company-address">12 Ave. Zona - 13, Ciudad de Guatemala, Código Postal 12345</p>
        <p>Teléfono: (123) 456-7890</p>
        <p>Email: info@ciberseguridad.com</p>
    </div>

    <table class="invoice">
        <thead>
            <tr>
                <th colspan="2" style="text-align: center;">
                    <h2>INVENTARIOS DE ACTIVOS</h2>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="description-row">
                <!-- <td>ID:</td>
                <td><?= $maquina['maq_id'] ?></td> -->
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
    


    <!-- Div para contener los tres pies de firma -->
    <div>
        <div class="signature-responsable">
            <p class="firma">RESPONSABLE</p>
            <div class="signature-line"></div>     
            <div class="signature-name"><?= $maquina['maq_per_alta'] ?><?= $maquina['maq_per_planilla'] ?></div>
        </div>                        
    </div>


</body>

</html>