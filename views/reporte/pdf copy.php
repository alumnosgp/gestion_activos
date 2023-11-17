<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zziy2YFZ5rPqFMPPpjBRBoxDx2PbAKL3LO9QGHvZ56z25UNR/lvO+ebBqISQSmF5" crossorigin="anonymous">
    <title>PDF Inventario</title>
<head>
    <style>
      /* Estilos que proporcionaste */
      body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
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
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }

        .invoice tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .invoice tbody tr:hover {
            background-color: #e0e0e0;
        }

        /* Estilos para la fila de descripción del equipo */
        .description-row {
            background-color: #ffd700;
            font-weight: bold;
            color: #343a40;
        }

        .description-row td {
            padding: 8px;
            text-align: left;
            font-size: 12px;
            border: 1px solid #dee2e6;
        }

        /* Estilos para la imagen */
        img.invoice-image {
            display: block;
            margin: 0 auto;
            width: 20%; /* Ancho deseado */
            height: auto; /* Altura automática */
        }
</style>
</head>

<body>

<img src="./images/ciber.jpg" class="invoice-image" alt="Imagen de ciberdefensa">


    <div class="invoice-header">
        <h1 class="invoice-title">INVENTARIOS DE ACTIVOS</h1>
    </div>

    <!-- Información de los Inventarios -->
    <!-- <div class="company-info">
        <p class="company-name">EJÉRCITO DE GUATEMALA</p>
        <p class="company-name">Comando de Informatica y Tecnología</p>
        <p class="company-address">12 Ave. Zona - 13, Ciudad de Guatemala, Código Postal 12345</p>
        <p>Teléfono: (123) 456-7890</p>
        <p>Email: info@ciberseguridad.com</p>
    </div> -->

    <table class="invoice">
    <thead>
        <tr>
            <th colspan="6">Información Básica</th>
            <th colspan="6">Detalles Técnicos</th>
            <th colspan="6">Licencias y Uso</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Nombre</th>
            <th>MAC</th>
            <th>RAM Capacidad</th>
            <th>Tipo de Disco Duro</th>
            <th>Disco Capacidad</th>
            <th>Procesador Capacidad</th>
            <th>Plaza</th>
            <th>Personal de alta</th>
            <th>Personal de Planilla</th>
            <th>Sistema Operativo</th>
            <th>Tipo de Office</th>
            <th>Licencias Office</th>
            <th>Tipo de Antivirus</th>
            <th>Licencias Antivirus </th>
            <th>Tipo de uso</th>
        </tr>
            
    </thead>
    <tbody>
        <?php foreach ($maquina as $maquina) : ?>
            <tr>
                <!-- Información Básica -->
                <td>ID: <?= $maquina['maq_id'] ?></td>
            </tr>
            <tr>
                <td>Tipo: <?= $maquina['maq_tipo'] ?></td>
            </tr>
            <tr>
                <td>Nombre: <?= $maquina['maq_nombre'] ?></td>
            </tr>
            <tr>
                <td>MAC: <?= $maquina['maq_mac'] ?></td>
            </tr>
            <tr>
                <td>RAM Capacidad: <?= $maquina['maq_ram_capacidad'] ?></td>
            </tr>
            <tr>
                <td>Tipo de Disco Duro: <?= $maquina['maq_tipo_disco_duro'] ?></td>
            </tr>
               
                <!-- Detalles Técnicos -->
                <tr>
                <td>Disco Capacidad: <?= $maquina['maq_disco_capacidad'] ?></td>
            </tr>
            <tr>
                <td>Procesador Capacidad: <?= $maquina['maq_procesador_capacidad'] ?></td>
            </tr>
            <tr>
                <td>Plaza: <?= $maquina['maq_plaza'] ?></td>
            </tr>
            <tr>
                <td>Personal de alta: <?= $maquina['maq_per_alta'] ?></td>
            </tr>
            <tr>
                <td>Personal de Planilla: <?= $maquina['maq_per_planilla'] ?></td>
            </tr>
            <tr>
                <td>Sistema Operativo: <?= $maquina['maq_sistema_op'] ?></td>
            </tr>
            <tr>
                <td>Tipo de Office: <?= $maquina['maq_office'] ?></td>
            </tr>
               
                <!-- Licencias y Uso -->
                
            <tr>
                <td>Maquinas Oficce: <?= $maquina['maq_office'] ?></td>
            </tr>
                <tr>
                <td>Licencias Office: <?= $maquina['maq_lic_office'] ?></td>
            </tr>
            <tr>
                <td>Tipo de Antivirus: <?= $maquina['maq_antivirus'] ?></td>
            </tr>
            <tr>
                <td>Licencias Antivirus: <?= $maquina['maq_lic_antv'] ?></td>
            </tr>
            <tr>
                <td>Tipo de uso: <?= $maquina['maq_uso'] ?></td>
            </tr>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
