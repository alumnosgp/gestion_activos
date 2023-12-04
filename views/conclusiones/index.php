<h1 class="text-center mt-5">CONCLUSIONES</h1>
<div class="row justify-content-center my-4">
    <form class="col-lg-8 border bg-light p-3" id="formularioConclusiones">
        <input type="number" name="conclu_id" id="conclu_id" class="form-control" hidden>
        <div class="row mb-3">
            <div class="col">
                <label for="conclu_nombre">CONCLUSIONES</label>
                <input type="text" name="conclu_nombre" id="conclu_nombre" class="form-control">
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
        <table id="tablaConclusiones" class="table table-bordered table-hover">
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/conclusiones/index.js') ?>"></script>
