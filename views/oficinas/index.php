<h1 class="text-center mt-5">REGISTRO DE OFICINAS</h1>
<div class="row justify-content-center my-4">
    <form class="col-lg-8 border bg-light p-3" id="formularioOficinas">
        <input type="number" name="ofic_id" id="ofic_id" class="form-control" hidden>
        <div class="row mb-3">
            <div class="col">
                <label for="ofic_nombre">NOMBRE DE LA OFICINA</label>
                <input type="text" name="ofic_nombre" id="ofic_nombre" class="form-control">
            </div>
            <div class="col">
                <label for="ofic_telefono">TELEFONO DE LA OFICINA</label>
                <input type="text" name="ofic_telefono" id="ofic_telefono" class="form-control">
            </div>
        </div>      
        <div class="row mb-3">
            <div class="col">
                <label for="ofic_direccion">DIRECCION DE LA OFICINA</label>
                <input type="text" name="ofic_direccion" id="ofic_direccion" class="form-control">
            </div>
        </div>      
        <div class="row">
            <div class="col">
                <button type="submit" id="btnGuardar" class="btn btn-primary w-100">Guardar</button>
            </div>
            <div class="col">
                <button type="button" id="btnModificar" class="btn btn-warning btn-block w-100">Modificar</button>
            </div>
            <div class="col">
                <button type="button" id="btnCancelar" class="btn btn-danger btn-block w-100">Cancelar</button>
            </div>
        </div>
    </form>
</div>
<div class="row justify-content-center">
    <div class="col table-responsive">
        <table id="tablaOficinas" class="table table-bordered table-hover">
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/oficinas/index.js') ?>"></script>
