<style>
    .image-highlight:hover {
        border: 8px solid #f7f7f7;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .form-label {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #0056b3;
        border: none;
    }

    .btn-primary:hover {
        background-color: #007f7f;
    }
</style>


<div class="container" style="background-color: #f7f7f7;">
    <h1 class="text-center mb-4 text-primary">EJÉRCITO DE GUATEMALA</h1>
    <h2 class="text-center mb-4 text-primary">"CENTRO DE RESPUESTA ANTE INCIDENTES CIBERNÉTICOS"</h2>

    <div class="row justify-content-center">
        <div class="col-lg-5 print-left-align">
            <img src="./images/ciber.jpg" width="80%" alt="" style="font-family: Arial, sans-serif;" class="image-highlight">
        </div>

        <div class="col-md-5 border p-4">
            <h2 class="text-center mb-4 text-primary">INICIO DE SESIÓN</h2>
            <form>
                <div class="mb-3">
                    <label for="usu_catalogo" class="form-label">Catálogo</label>
                    <input type="number" class="form-control input-highlight" id="usu_catalogo" name="usu_catalogo">
                </div>
                <div class="mb-3">
                    <label for="usu_password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control input-highlight" id="usu_password" name="usu_password">
                </div>
                <div class="d-grid">
                    <button class="btn-primary" type="submit">Iniciar sesión</button>
                </div>
            </form>
            <div class="text-center mt-4">
                <p class="mb-0">¿No tiene una cuenta? <a href="/gestion_activos/registro" class="text-primary fw-bold">Regístrese aquí</a></p>
            </div>
        </div>
    </div>
</div>
<script src="<?= asset('./build/js/login/index.js') ?>"></script>