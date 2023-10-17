<h1 class="text-center mt-5">OFFICES</h1>
<div class="row justify-content-center my-4">
    <form class="col-lg-8 border bg-light p-3" id="formularioOffice">
        <input type="number" name="off_id" id="off_id" class="form-control" hidden>
        <div class="row mb-3">
            <div class="col">
                <label for="off_nombre">Antivirus</label>
                <input type="text" name="off_nombre" id="off_nombre" class="form-control">
            </div>
        </div>      
        <div class="row">
            <div class="col">
                <button type="submit" form="formularioHorario" id="btnGuardar" class="btn btn-primary btn-block">Guardar</button>
            </div>
            <div class="col">
                <button type="button" id="btnModificar" class="btn btn-warning btn-block">Modificar</button>
            </div>
            <div class="col">
                <button type="button" id="btnBuscar" class="btn btn-info btn-block">Buscar</button>
            </div>
            <div class="col">
                <button type="button" id="btnCancelar" class="btn btn-danger btn-block">Cancelar</button>
            </div>
        </div>
    </form>
</div>
<div class="row justify-content-center">
    <div class="col table-responsive">
        <table id="tablaOffice" class="table table-bordered table-hover">
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/offices/index.js') ?>"></script>
