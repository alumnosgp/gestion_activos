<h1 class="text-center mt-5">REGISTRO DE PERSONA</h1>
<div class="row justify-content-center my-4">
    <form class="col-lg-8 border bg-light p-3" id="formularioPersonas">
        <input type="number" name="per_id" id="per_id" class="form-control" hidden>
        <div class="row mb-3">
            <div class="col">
                <label for="per_nombre">NOMBRE</label>
                <input type="text" name="per_nombre" id="per_nombre" class="form-control">
            </div>
            <div class="col">
                <label for="per_apellido">APELLIDO</label>
                <input type="text" name="per_apellido" id="per_apellido" class="form-control">
            </div>
        </div>      
        <div class="row mb-3">
            <div class="col">
                <label for="per_catalogo">CATALOGO</label>
                <input type="text" name="per_catalogo" id="per_catalogo" class="form-control">
            </div>
            <div class="col">
                <label for="per_grado">GRADO</label>
                <select name="per_grado" id="per_grado" class="form-control">
                    <option value="">Selecione grado...</option>
                    <?php foreach ($grados as $grado): ?>
                    <option value="<?= $grado['grado_id'] ?>"><?=$grado['grado_descr'] ?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="col">
                <label for="per_arma">ARMAS</label>
                <select name="per_arma" id="per_arma" class="form-control">
                    <option value="">Selecione arma...</option>
                    <?php foreach ($armas as $arma): ?>
                    <option value="<?= $arma['arm_id'] ?>"><?=$arma['arm_desc'] ?></option>
                    <?php endforeach?>
                </select>
            </div>
        </div>      
        <div class="row mb-3">
        <div class="col">
                <label for="per_puesto">PUESTOS</label>
                <select name="per_puesto" id="per_puesto" class="form-control">
                    <option value="">Selecione puesto...</option>
                    <?php foreach ($puestos as $puesto): ?>
                    <option value="<?= $puesto['puesto_id'] ?>"><?=$puesto['pue_nombre'] ?></option>
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
        <table id="tablaPersonas" class="table table-bordered table-hover">
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/personas/index.js') ?>"></script>
