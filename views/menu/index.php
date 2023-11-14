<div>

    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
            aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/ejemplo/">
            <img src="<?= asset('./images/cit.png') ?>" width="35px'" alt="cit">
            INICIO
        </a>
        <div class="collapse navbar-collapse" id="navbarToggler">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin: 0;">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/ejemplo/"><i
                            class="bi bi-house-fill me-2"></i>Inicio</a>
                </li>

                <div class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-gear me-2"></i>Dropdown
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-dark " id="dropwdownRevision" style="margin: 0;">
                        <!-- <h6 class="dropdown-header">Información</h6> -->
                        <li>
                            <a class="dropdown-item nav-link text-white " href="/login_prueba2/alumnos"><i
                                    class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>Alumno</a>
                            <a class="dropdown-item nav-link text-white " href="/login_prueba2/materias"><i
                                    class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>Materia</a>
                            <a class="dropdown-item nav-link text-white " href="/login_prueba2/calificaciones"><i
                                    class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>Calificaciones</a>
                            <a class="dropdown-item nav-link text-white " href="/login_prueba2/reportes"><i
                                    class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>reporte_alumnos</a>
                        </li>



                    </ul>
                </div>

            </ul>
            <form>
                <div class="col-lg-1 d-grid mb-lg-0 mb-2">
                    <!-- Ruta relativa desde el archivo donde se incluye menu.php -->
                    <button class="btn btn-danger" type="submit" id="closeSession" name="closeSession"><i
                            class="bi bi-arrow-bar-left"></i>CERRAR SESIÓN</button>
                </div>
            </form>


        </div>
    </div>
    <div class="progress fixed-bottom" style="height: 6px;">
        <div class="progress-bar progress-bar-animated bg-danger" id="bar" role="progressbar" aria-valuemin="0"
            aria-valuemax="100"></div>
</div>
     
    <div class="container-fluid ">
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <p style="font-size:xx-small; font-weight: bold;">
                    Comando de Informática y Tecnología,
                    <?= date('Y') ?> &copy;
                </p>
            </div>
        </div>
    </div>
</div>
<script src="<?= asset('./build/js/menu/index.js') ?>"></script>