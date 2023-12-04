<html lang="en">
<meta charset="UTF-8">
    
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

            thead {
                display: table-header-group;
            }

            /* Estilos para el encabezado que se ocultará en las páginas siguientes */
            tbody {
                display: table-row-group;
            }


            /* ... (Estilos anteriores) ... */

            /* Estilos nuevos para la tabla */
            .invoice {
                width: 100%;
                font-size: 14px;
                border-collapse: solid;
                margin-bottom: 10px;
            }

            .invoice th,
            .invoice td {
                border: 1px solid #e0e0e0;
                padding: 10px;
                text-align: left;
            }

            .invoice th {
                background-color: #3498db;
                /* Cambia este valor a tu color azul preferido */
                font-weight: bold;
                color: #fff;
                /* Cambia este valor al color del texto que desees */
            }

            /* COLORES ENTRE LAS LINEAS  AZULES*/
            .invoice tbody tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            .invoice tbody tr:hover {
                background-color: #e0e0e0;
            }

            /* Estilos para la fila de descripción del incidente Y color azul entre las lineas  */
            .description-row {
                background-color: #f2f2f2;
                font-weight: bold;
                color: #343a40;
            }

            .description-row td {
                padding: 8px;
                text-align: left;
                font-size: 15px;
                border: 3px solid #dee2e6;
            }

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

                @media print {
                    thead {
                        display: table-header-group;
                    }
                }
            }


                /* .signature-recibi-entregue {
                    float: left;
                    width: 30%; }

                .signature-entregue {
                    float: right;
                width: 30%;
                 } */

            .signature-section {
                text-align: center;
                margin-top: 100px;
            }

            .signature-line {
                border-top: 2px solid #000;
                margin: 50px;
                width: 80%;
            }

            .signature-name {
                font-size: 0.7em;
                text-align: center;
                color: #333;
            }

            .firma {
                font-size: 0.9em;
                text-align: center;
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
            #encabezado {
                font-size: 28px; /* Puedes ajustar el tamaño según tu preferencia */
                color: white; /* Puedes ajustar el color según tu preferencia */
                /* Otros estilos que desees aplicar */
            }
        </style>
    </head>

<body>
    <div style="text-align:center;">
        <img src="./images/ciber.jpg" alt="Descripción de la imagen" style="width: 100px; height: auto;">
    </div>
    <!-- Información de los Inventarios -->
    <div class="company-info" style="text-align: center;">
        <!-- <h1 class="company-name">EJÉRCITO DE GUATEMALA</h1> -->
        <p class="company-name">Comando de Informatica y Tecnología</p>
        <p class="company-address">12 Ave. Zona - 13, Ciudad de Guatemala, Código Postal 12345</p>
        <p>Teléfono: (123) 456-7890</p>
        <p>Email: info@ciberseguridad.com</p>
    </div>

    <table class="invoice">
        <thead>
            <tr>
                <th colspan="12" style="text-align: center;">
                    <h1 id="encabezado"></h1>INVENTARIOS DE ACTIVOS</h1>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <!-- <td>ID:</td>
                <td><?= $maquina['maq_id'] ?></td> -->
            </tr>
            <tr>
                <td class="description-row">Nombre:</td>
                <td>
                    <?= $maquina['maq_nombre'] ?>
                </td>
                <td class="description-row">DIRECCION MAC:</td>
                <td>
                    <?= $maquina['maq_mac'] ?>
                </td>
            </tr>
            <!-- <tr>
            </tr> -->
            <tr>
                <td class="description-row">Tipo:</td>
                <td>
                    <?= $maquina['maq_tipo'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Capacidad RAM:</td>
                <td>
                    <?= $maquina['maq_ram_capacidad'] ?>
                </td>
                <td class="description-row">Tipo de Disco Duro:</td>
                <td>
                    <?= $maquina['maq_tipo_disco_duro'] ?>
                </td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td class="description-row">Capacidad Disco Duro:</td>
                <td>
                    <?= $maquina['maq_disco_capacidad'] ?>
                </td>
                <td class="description-row">Procesador:</td>
                <td>
                    <?= $maquina['maq_procesador_capacidad'] ?>
                </td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td class="description-row">Plaza:</td>
                <td colspan="12">
                    <?= $maquina['maq_plaza'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Encargado de Alta</td>
                <td colspan="12">
                    <?= $maquina['per_grado_alta'] ?>
                    <?= $maquina['maq_per_alta'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Encargado Planillero</td>
                <td colspan="12">
                    <?= $maquina['per_grado_planilla'] ?>
                    <?= $maquina['maq_per_planilla'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Sistema Operativo</td>
                <td>
                    <?= $maquina['maq_sistema_op'] ?>
                </td>
                <td class="description-row">Licencia?</td>
                <td>
                    <?= $maquina['maq_lic_so'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Tipo de Office</td>
                <td>
                    <?= $maquina['maq_office'] ?>
                </td>
                <td class="description-row">Licencia?</td>
                <td>
                    <?= $maquina['maq_lic_office'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Tipo de Antivirus</td>
                <td>
                    <?= $maquina['maq_antivirus'] ?>
                </td>
                <td class="description-row">Licencia?</td>
                <td>
                    <?= $maquina['maq_lic_antv'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Justificacion de uso</td>
                <td colspan="12">
                    <?= $maquina['maq_uso'] ?>
                </td>
            </tr>
            <!-- ... Continuar con el resto de los datos ... -->
        </tbody>
    </table>



    <!-- Div para contener los tres pies de firma -->
    <div>
        <div class="signature-responsable">
            <div class="signature-line"></div>
            <div class="signature-name">
                <?= $maquina['per_grado_alta'] ?>
                <?= $maquina['maq_per_alta'] ?>
                <?= $maquina['per_grado_planilla'] ?>
                <?= $maquina['maq_per_planilla'] ?>
            </div>
            <p class="firma">RESPONSABLE</p>
        </div>
    </div>


</body>

</html>