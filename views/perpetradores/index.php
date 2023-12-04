<h1 class="text-center mt-5">PERPETRADORES</h1>
<div class="row justify-content-center my-4">
    <form class="col-lg-8 border bg-light p-3" id="formularioPerpetradores">
        <input type="number" name="perp_id" id="perp_id" class="form-control" hidden>
        <div class="row mb-3">
            <div class="col">
                <label for="perp_nombre">Perpetradores</label>
                <input type="text" name="perp_nombre" id="perp_nombre" class="form-control">
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
        <table id="tablaPerpetradores" class="table table-bordered table-hover">
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/perpetradores/index.js') ?>"></script>
