<h1 class="text-center mt-5">REGISTRO DE PERSONA</h1>
<div class="row justify-content-center my-4">
    <form class="col-lg-8 border bg-light p-3" id="formularioPersonasaltas">
        <input type="number" name="per_id" id="per_id" class="form-control" hidden>
        <div class="row mb-3">
            <div class="col">
                <label for="per_nombre1">1ER NOMBRE</label>
                <input type="text" name="per_nombre1" id="per_nombre1" class="form-control">
            </div>
            <div class="col">
                <label for="per_nombre2">2DO NOMBRE</label>
                <input type="text" name="per_nombre2" id="per_nombre2" class="form-control">
            </div>
            </div>
            <div class="row mb-3">
            <div class="col">1ER APELLIDO
                <label for="per_apellido1"></label>
                <input type="text" name="per_apellido1" id="per_apellido1" class="form-control">
            </div>
            <div class="col">2DO APELLIDO
                <label for="per_apellido2"></label>
                <input type="text" name="per_apellido2" id="per_apellido2" class="form-control">
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
                <label for="per_plaza">PUESTOS/CARGO</label>
                <select name="per_plaza" id="per_plaza" class="form-control">
                    <option value="">Selecione puesto...</option>
                    <?php foreach ($plazas as $plaza): ?>
                    <option value="<?= $plaza['pla_id'] ?>"><?=$plaza['pla_nombre'] ?></option>
                    <?php endforeach?>
                </select>
            </div>
        </div>     
        <div class="col">
            <label for="per_telefono">NUMERO DE TELEFONO</label>
            <input type="text" name="per_telefono" id="per_telefono" class="form-control" placeholder="Ejemplo: +502 222 2222">
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="per_email">CORREO ELECTRONICO</label>
                <input type="text" name="per_email" id="per_email" class="form-control" placeholder="Ejemplo: ejemplo@email">
            </div>
        </div>   
        <div class="row mb-3">
            <div class="col">
                <label for="per_direccion">DIRECCION</label>
                <input type="text" name="per_direccion" id="per_direccion" class="form-control" placeholder="ejemplo: C/ejemplo, No, ciudad.">
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
        <table id="tablaPersonasaltas" class="table table-bordered table-hover">
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/personasaltas/index.js') ?>"></script>
