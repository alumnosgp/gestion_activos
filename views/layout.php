<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="build/js/app.js"></script>
    <link rel="shortcut icon" href="<?= asset('images/cit.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('build/styles.css') ?>">
    <script src="http://kit.fontawesome.com/e1d55cc160.js" crossorigin="anonymous"></script>
    <title>GESTION ACTIVOS</title>
     <style>
      
        

        .container-fluid {
          
            padding: 1px;
            border-radius: 10px;
        } 

        /* Estilos para resaltar textos al pasar el mouse */
a:hover,
.navbar-dark .navbar-nav .nav-link:hover {
  color: #ff3d50; /* Cambia el color a tu preferencia */
}

/* Estilos para resaltar los inputs al pasar el mouse */
input[type="text"]:hover,
input[type="email"]:hover,
input[type="password"]:hover,
input[type="number"]:hover,
textarea:hover,
select:hover {
  border-color: #ff6347; /* Cambia el color del borde a tu preferencia */
  box-shadow: #1f1f1f; /* Agrega una sombra al input */
}

    </style> 
</head>

<body class="bg-image bg-opcity-50">
    <nav class="navbar navbar-expand-lg navbar-dark  bg-dark">

        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/gestion_activos/menu">
                <img src="<?= asset('./images/cit.png') ?>" width="35px'" alt="cit">
                Sistema de Gestion de Activos
            </a>
            <div class="collapse navbar-collapse" id="navbarToggler">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin: 0;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/gestion_activos/menu"><i
                                class="bi bi-house-fill me-2"></i>Inicio</a>
                    </li>
                    <div class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-gear me-2"></i>INVENTARIOS DE ACTIVOS</a>
                        <ul class="dropdown-menu  dropdown-menu-dark " id="dropwdownRevision" style="margin: 0;">
                            <!-- <h6 class="dropdown-header">Información</h6> -->
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/maquinas"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>REGISTRO DE INVENTARIO</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/estadisticas"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>ESTADISTICAS INVENTARIO</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-gear me-2"></i>GESTION DE INCIDENTES</a>
                        <ul class="dropdown-menu  dropdown-menu-dark " id="dropwdownRevision" style="margin: 0;">
                            <!-- <h6 class="dropdown-header">Información</h6> -->
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/incidentes"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>REGISTRO DE INCIDENTES</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/menu"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>MENU</a>
                            </li>

               
                            <li>
                                <a gitclass="dropdown-item nav-link text-white" href="/gestion_activos/estadisticasincidentes"><i class="ms-lg-0 ms-2 bi bi-plus-circle me-2" class="fa-solid fa-chart-simple"></i>ESTADISTICAS INCIDENTES</a>
                            </li>            

                        </ul>
                    </div>
                    <div class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="gestion_activos/menu" data-bs-toggle="dropdown">
                            <i class="bi bi-gear me-2"></i>MATENIMIENTOS DE ACTIVOS</a>
                        <ul class="dropdown-menu  dropdown-menu-dark " id="dropwdownRevision" style="margin: 0;">
                            <!-- <h6 class="dropdown-header">Información</h6> -->
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/personasaltas"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>REGISTRO DE PERSONAS DE ALTA</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white "
                                    href="/gestion_activos/personasplanillas"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>REGISTRO DE PERSONAS
                                    PLANILLA</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/oficinas"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>OFICINAS</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/organizaciones"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>ORGANIZACIONES</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/grados"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>GRADOS</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/armas"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>ARMAS</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/plazas"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>PLAZAS</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/sistemas"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>SISTEMAS OPERATIVOS</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/offices"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>OFFICES</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/antivirus"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>ANTIVIRUS</a>
                            </li>
                        </ul>
                    </div>
                </ul>
                <div class="col-lg-2 d-grid mb-lg-0 mb-2">
                    <!-- Ruta relativa desde el archivo donde se incluye menu.php -->
                    <a href="/gestion_activos/menu" class="btn btn-danger"><i class="bi bi-arrow-bar-left"></i>Cerrar
                        Sesion</a>
                </div>


            </div>
        </div>

    </nav>
    <div class="progress fixed-bottom" style="height: 6px;">
        <div class="progress-bar progress-bar-animated bg-danger" id="bar" role="progressbar" aria-valuemin="0"
            aria-valuemax="100"></div>
    </div>
    <div class="container-fluid pt-5 mb-4" style="min-height: 85vh">

        <?php echo $contenido; ?>
    </div>

    </div>



</body>

</html>