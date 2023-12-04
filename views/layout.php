<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="build/js/app.js"></script>
    <link rel="shortcut icon" href="<?= asset('images/ciber.jpg') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('build/styles.css') ?>">
    <script src="http://kit.fontawesome.com/e1d55cc160.js" crossorigin="anonymous"></script>
    <title>GESTION ACTIVOS</title>
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
                Sistema de G.A.
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
                            <!-- <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/menu"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>MENU</a>
                            </li> -->


                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/estadisticasincidentes"><i class="ms-lg-0 ms-2 bi bi-plus-circle me-2" class="fa-solid fa-chart-simple"></i>ESTADISTICAS INCIDENTES</a>
                            </li>            

                        </ul>
                    </div>
                    <div class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="gestion_activos/menu" data-bs-toggle="dropdown">
                            <i class="bi bi-gear me-2"></i>MATENIMIENTOS</a>
                        <ul class="dropdown-menu  dropdown-menu-dark " id="dropwdownRevision" style="margin: 0;">
                            <!-- <h6 class="dropdown-header">Información</h6> -->
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/personasaltas"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>REGISTRO DE PERSONAS DE ALTA</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white "
                                    href="/gestion_activos/personasplanillas"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>REGISTRO DE PLANILLEROS</a>
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
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/perpetradores"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>PERPETRADORES</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/motivos_perpetradores"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>MOTIVOS DE PERPETRADORES</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/conclusiones"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>CONCLUSIONES</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/inst_internas"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>INST. INTERNAS</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/inst_externas"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>INST. EXTERNAS</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/compo_activos"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>COMPONENTES ACTIVOS</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/categorias"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>CATEGORIAS</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/efectosAbv"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>EFECTOS ABVERSOS</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/ponderaciones"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>PONDERACIONES</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/gestion_activos/impacto"><i
                                        class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>IMPACTO</a>
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