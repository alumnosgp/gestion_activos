<h1 class="text-center mt-5">REGISTRO DE INCIDENTES</h1>
<div class="row justify-content-center my-4">
    <form class="col-lg-8 border bg-light p-3" id="formularioIncidentes">
        <input type="number" name="maq_id" id="maq_id" class="form-control" hidden>
        <div class="row mb-3">
            <div class="col">
                <label for="maq_nombre">FECHA DEL INCIDENTE</label>
                <input type="date" name="maq_nombre" id="maq_nombre" class="form-control"
                    placeholder="Ingrese nombre de la pc">
            </div>
            <div class="col">
                <label for="maq_mac">NO. DE INCIDENTE</label>
                <input type="text" name="maq_mac" id="maq_mac" class="form-control" placeholder="Ingrese direccion MAC">
            </div>
            <div class="col">
                <label for="maq_mac">NO. INCIDENTE RELACIONADO</label>
                <input type="text" name="maq_mac" id="maq_mac" class="form-control" placeholder="Ingrese direccion MAC">
            </div>
        </div>
        <hr />
        <h3 class="text-center mt-5">MIEMBRO DEL IRT</h3>
        <div class="row mb-3" name="perAlta" id="perAlta">
            <div class="col">
                <label for="maq_per_alta">CATALOGO</label>
                <input type="text" name="maq_per_alta" id="maq_per_alta" class="form-control"
                placeholder="Ingrese catalogo">
            </div>
            <div class="col">
                <label for="per_grado">GRADO</label>
                <input type="text" name="per_grado" id="per_grado" class="form-control" placeholder="grado" readonly>
            </div>
            <div class="col">
                <label for="per_nombre">NOMBRE</label>
                <input type="text" name="per_nombre" id="per_nombre" class="form-control" placeholder="nombre" readonly>
            </div>
            <!-- <input type="text" name="maq_plaza" id="maq_plaza" class="form-control" placeholder="puesto" hidden> -->
            <div class="col">
                <label for="per_plaza">PUESTO</label>
                <input type="text" name="per_plaza" id="per_plaza" class="form-control" placeholder="puesto" readonly>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="maq_per_alta">NO. DE TELEFONO</label>
                <input type="text" name="maq_per_alta" id="maq_per_alta" class="form-control"
                placeholder="Ingrese catalogo">
            </div>
            <div class="col">
                <label for="per_grado">CORREO ELECTRONICO</label>
                <input type="text" name="per_grado" id="per_grado" class="form-control" placeholder="grado" readonly>
            </div>
        </div>
        <hr />
        <h3 class="text-center mt-5">DATOS DE LA PERSONA QUE REPORTA</h3>
        <div class="row mb-3" name="perAlta" id="perAlta">
            <div class="col">
                <label for="maq_per_alta">CATALOGO</label>
                <input type="text" name="maq_per_alta" id="maq_per_alta" class="form-control"
                placeholder="Ingrese catalogo">
            </div>
            <div class="col">
                <label for="per_grado">GRADO</label>
                <input type="text" name="per_grado" id="per_grado" class="form-control" placeholder="grado" readonly>
            </div>
            <div class="col">
                <label for="per_nombre">NOMBRE</label>
                <input type="text" name="per_nombre" id="per_nombre" class="form-control" placeholder="nombre" readonly>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="per_plaza">DIRECCION</label>
                <input type="text" name="per_plaza" id="per_plaza" class="form-control" placeholder="puesto" readonly>
            </div>
        </div>
        <div class="row mb-3">
            <!-- <input type="text" name="maq_plaza" id="maq_plaza" class="form-control" placeholder="puesto" hidden> -->
            <div class="col">
                <label for="per_plaza">PUESTO</label>
                <input type="text" name="per_plaza" id="per_plaza" class="form-control" placeholder="puesto" readonly>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="maq_per_alta">NO. DE TELEFONO</label>
                <input type="text" name="maq_per_alta" id="maq_per_alta" class="form-control"
                placeholder="Ingrese catalogo">
            </div>
            <div class="col">
                <label for="per_grado">CORREO ELECTRONICO</label>
                <input type="text" name="per_grado" id="per_grado" class="form-control" placeholder="grado" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="button" id="btnGuardar" class="btn btn-primary w-100">Guardar</button>
            </div>
        </div>
    </form>
</div>
<script src="<?= asset('./build/js/incidentes/index.js') ?>"></script>