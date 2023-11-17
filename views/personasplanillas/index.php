<h1 class="text-center mt-5">REGISTRO DE PERSONA PLANILLA</h1>
<div class="row justify-content-center my-4">
    <form class="col-lg-8 border bg-light p-3" id="formularioPersonasplanillas">
        <input type="number" name="pcivil_id" id="pcivil_id" class="form-control" hidden>
        <div class="row mb-3">
            <div class="col">
                <label for="pcivil_nombre1">1ER NOMBRE</label>
                <input type="text" name="pcivil_nombre1" id="pcivil_nombre1" class="form-control">
            </div>
            <div class="col">
                <label for="pcivil_nombre2">2DO NOMBRE</label>
                <input type="text" name="pcivil_nombre2" id="pcivil_nombre2" class="form-control">
            </div>
            </div>
            <div class="row mb-3">
            <div class="col">1ER APELLIDO
                <label for="pcivil_apellido1"></label>
                <input type="text" name="pcivil_apellido1" id="pcivil_apellido1" class="form-control">
            </div>
            <div class="col">2DO APELLIDO
                <label for="pcivil_apellido2"></label>
                <input type="text" name="pcivil_apellido2" id="pcivil_apellido2" class="form-control">
            </div>
        </div>          
        <div class="row mb-3">
            <div class="col">
                <label for="pcivil_catalogo">CATALOGO</label>
                <input type="text" name="pcivil_catalogo" id="pcivil_catalogo" class="form-control">
            </div>
            <div class="col">
                <label for="pcivil_dpi">DPI</label>
                <input type="text" name="pcivil_dpi" id="pcivil_dpi" class="form-control">
            </div>
        </div>   
        <div class="row mb-3">
            <div class="col">
                <label for="pcivil_gradi">GRADO</label>
                <select name="pcivil_gradi" id="pcivil_gradi" class="form-control">
                    <option value="">Selecione grado...</option>
                    <?php foreach ($grados as $grado): ?>
                    <option value="<?= $grado['grado_id'] ?>"><?=$grado['grado_descr'] ?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="col">
                <label for="pcivil_plaza">PUESTOS/CARGO</label>
                <select name="pcivil_plaza" id="pcivil_plaza" class="form-control">
                    <option value="">Selecione puesto...</option>
                    <?php foreach ($plazas as $plaza): ?>
                    <option value="<?= $plaza['pla_id'] ?>"><?=$plaza['pla_nombre'] ?></option>
                    <?php endforeach?>
                </select>
            </div>
        </div>     
        <div class="col">
            <label for="pcivil_telefono">NUMERO DE TELEFONO</label>
            <input type="text" name="pcivil_telefono" id="pcivil_telefono" class="form-control" placeholder="Ejemplo: +502 222 2222">
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pcivil_emal">CORREO ELECTRONICO</label>
                <input type="text" name="pcivil_emal" id="pcivil_emal" class="form-control" placeholder="Ejemplo: ejemplo@email">
            </div>
        </div>   
        <div class="row mb-3">
            <div class="col">
                <label for="pcivil_direccion">DIRECCION</label>
                <input type="text" name="pcivil_direccion" id="pcivil_direccion" class="form-control" placeholder="ejemplo: C/ejemplo, No, ciudad.">
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
        <table id="tablaPersonasplanillas" class="table table-bordered table-hover">
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/personasplanillas/index.js') ?>"></script>