<style>
    /* Estilos para el encabezado */
    .text-primary {
        font-size: 2.5rem;
        font-weight: bold;
        color: #336699;
        /* Cambia el color a tu preferencia */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        /* Sombra suave para resaltar */
        margin-bottom: 3rem;
    }

    /* Estilos para el carrusel */
    #carouselExampleIndicators {
        margin-top: 20px;
        border-radius: 10px;
        overflow: hidden;
    }

    .carousel-item img {
        width: 100%;
        height: 300px;
        /* Altura fija para las imágenes */
        object-fit: cover;
        /* Ajusta la imagen sin distorsionarla */
        border-radius: 10px;
    }

    .carousel-indicators {
        bottom: -40px;
    }

    /* Estilos para los botones de control */
    .carousel-control-prev,
    .carousel-control-next {
        filter: invert(1);
    }

    /* Estilos para el contenido debajo del carrusel */
    .border {
        border-radius: 10px;
        background-color: #ffffff;
    }

    .border p {
        font-size: 18px;
        text-align: center;
        padding: 10px;
    }
</style>


<div class="container" style="background-color: #f7f7f7;">

    <h3 class="text-center mb-6 text-primary">"CENTRO DE RESPUESTA ANTE INCIDENTES CIBERNÉTICOS"</h3>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 7"></button>
            <!-- Agrega más botones indicadores según la cantidad de imágenes -->
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./images/1.4.png" class="d-block w-40" alt="First slide">
            </div>
            <div class="carousel-item">
                <img src="./images/1.2.png" class="d-block w-100" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img src="./images/1.1.png" class="d-block w-100" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img src="./images/1.2.png" class="d-block w-100" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img src="./images/5.png" class="d-block w-100" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img src="./images/1.3.png" class="d-block w-100" alt="Third slide">
            </div>

            <!-- Agrega más elementos .carousel-item según la cantidad de imágenes -->

            <!----- AQUI LOS BOTONES PARA PASAR LAS IMAGENES------>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
</div>
<script src="<?= asset('./build/js/login/index.js') ?>"></script>