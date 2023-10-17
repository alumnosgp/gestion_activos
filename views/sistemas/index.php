<h1 class="text-center mt-5">SISTEMAS OPERATIVOS</h1>
<div class="row justify-content-center my-4">
    <form class="col-lg-8 border bg-light p-3" id="formularioSistemas">
        <input type="number" name="sist_id" id="sist_id" class="form-control" hidden>
        <div class="row mb-3">
            <div class="col">
                <label for="sist_nombre">Sistema Operativo</label>
                <input type="text" name="sist_nombre" id="sist_nombre" class="form-control">
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
        <table id="tablaSistemas" class="table table-bordered table-hover">
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/sistemas/index.js') ?>"></script>
