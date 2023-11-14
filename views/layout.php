<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="build/js/app.js"></script>
    <link rel="shortcut icon" href="<?= asset('images/cit.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('build/styles.css') ?>">

    <title>GESTION ACTIVOS</title>
    <!-- <style>
        body {
            background-image: url('C:\docker\gestion_activos\CIBERDEFENSA.png'); /* Cambia 'background-image.jpg' a la imagen de fondo que desees */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container-fluid {
            background: rgba(255, 255, 255, 0.8); /* Fondo semi-transparente */
            padding: 20px;
            border-radius: 10px;
        }
    </style> -->
</head>
<body class="bg-image bg-opcity-50">   
<nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
        
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/gestion_activos/">
                <img src="<?= asset('./images/cit.png') ?>" width="35px'" alt="cit" >
                Sistema de Gestion de Activos
            </a>
            <div class="collapse navbar-collapse" id="navbarToggler">
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin: 0;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/gestion_activos/"><i class="bi bi-house-fill me-2"></i>Inicio</a>
                    </li>
  
                    <div class="nav-item dropdown " >
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-gear me-2"></i>Dropdown</a>
                        <ul class="dropdown-menu  dropdown-menu-dark "id="dropwdownRevision" style="margin: 0;">
                            <!-- <h6 class="dropdown-header">Información</h6> -->
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/maquinas"><i class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>REGISTRO DE INVENTARIO</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/personasaltas"><i class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>REGISTRO DE PERSONAS DE ALTA</a>
                            </li>            
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/personasplanillas"><i class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>REGISTRO DE PERSONAS PLANILLA</a>
                            </li>            
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/oficinas"><i class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>OFICINAS</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/organizaciones"><i class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>ORGANIZACIONES</a>
                            </li>            
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/grados"><i class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>GRADOS</a>
                            </li>            
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/armas"><i class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>ARMAS</a>
                            </li>            
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/plazas"><i class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>PLAZAS</a>
                            </li>            
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/sistemas"><i class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>SISTEMAS OPERATIVOS</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/offices"><i class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>OFFICES</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/antivirus"><i class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>ANTIVIRUS</a>
                            </li>            
                        </ul>
                    </div> 

                </ul> 
                <div class="col-lg-1 d-grid mb-lg-0 mb-2">
                    <!-- Ruta relativa desde el archivo donde se incluye menu.php -->
                    <a href="/gestion_activos/" class="btn btn-danger"><i class="bi bi-arrow-bar-left"></i>MENÚ</a>
                </div>

            
            </div>
        </div>
        
    </nav>
    <div class="progress fixed-bottom" style="height: 6px;">
        <div class="progress-bar progress-bar-animated bg-danger" id="bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="container-fluid pt-5 mb-4" style="min-height: 85vh">
        
        <?php echo $contenido; ?>
    </div>

    </div>



</body>
</html>