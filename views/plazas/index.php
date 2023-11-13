<h1 class="text-center mt-5">GESTION DE PLAZAS</h1>
<div class="row justify-content-center my-4">
    <form class="col-lg-8 border bg-light p-3" id="formularioPlazas">
        <input type="hidden" name="pla_id" id="pla_id" class="form-control">
        <div class="row mb-3">
            <div class="col">
                <label for="pla_nombre">INGRESE PUESTO</label>
                <input type="text" name="pla_nombre" id="pla_nombre" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pla_oficina">OFICINA</label>
                <select name="pla_oficina" id="pla_oficina" class="form-control">
                    <option value="">Selecione organizacion...</option>
                    <?php foreach ($oficinas as $oficina): ?>
                    <option value="<?= $oficina['ofic_id'] ?>"><?=$oficina['ofic_nombre'] ?></option>
                    <?php endforeach?>
                </select>
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
        <table id="tablaPlazas" class="table table-bordered table-hover">
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/plazas/index.js') ?>"></script>