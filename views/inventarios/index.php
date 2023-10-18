<h1 class="text-center mt-5">INVENTARIO DE EQUIPOS DE COMPUTO</h1>
<div class="row justify-content-center my-4">
    <form class="col-lg-8 border bg-light p-3" id="formularioInventarios">
        <input type="number" name="off_id" id="off_id" class="form-control" hidden>
            <div class="row mb-3">
             <div class="col">
                <label for="empleado_puesto">Oficina</label>
                <select name="empleado_puesto" id="empleado_puesto" class="form-control">
                    <option value="">Selecione oficina...</option>
                    <?php foreach ($clientes as $cliente): ?>
                    <option value="<?= $cliente['cliente_codigo'] ?>"><?=$cliente['cliente_direccion'] ?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="col">
                <label for="off_nombre">Nombre de la maquina</label>
                <input type="text" name="off_nombre" id="off_nombre" class="form-control" placeholder="Ingrese nombre de la pc">
            </div>
            <div class="col">
                <label for="off_nombre">Direccion MAC</label>
                <input type="text" name="off_nombre" id="off_nombre" class="form-control" placeholder="Ingrese direccion MAC">
            </div>
        </div>   
        <hr/>
        <h3 class="text-center mt-5">RESPONSABLE DEL EQUIPO DE COMPUTO</h3>
        <div class="row mb-3">
            <div class="col">
                <input type="checkbox" name="off_nombre" id="off_nombre">
                <label for="off_nombre">Servicio</label>
            </div>
            <div class="col">
                <input type="checkbox" name="off_nombre" id="off_nombre">
                <label for="off_nombre">Personal</label>
            </div>
        </div>  
        <div class="row mb-3">
            <div class="col">
                <label for="off_nombre">Catalogo del responsable</label>
                <input type="number" name="off_nombre" id="off_nombre" class="form-control" placeholder="Ingrese catalogo">
            </div>
            <div class="col">
                <label for="off_nombre">Grado</label>
                <input type="text" name="off_nombre" id="off_nombre" class="form-control" placeholder="Ingrese grado">
            </div>
            <div class="col">
                <label for="off_nombre">Nombre</label>
                <input type="text" name="off_nombre" id="off_nombre" class="form-control" placeholder="Ingrese nombre">
            </div>
        </div>  
        <div class="row mb-3">
            <div class="col">
                <label for="off_nombre">Puesto</label>
                <input type="text" name="off_nombre" id="off_nombre" class="form-control" placeholder="Ingrese puesto">
            </div>
        </div>  
        <div class="mb-3">
            <label for="" class="form-label">Justifique el uso del equipo</label>
            <textarea class="form-control" name="off_nombre" id="off_nombre" rows="3" placeholder="Justifique el uso que se le dara al equipo"></textarea>
        </div>  
        <hr/>
        <h3 class="text-center mt-5">CARACTERISTICAS DEL EQUIPO</h3>
        <div class="row mb-3">
            <div class="col">
                <label for="empleado_puesto">Sistema operativo</label>
                <select name="empleado_puesto" id="empleado_puesto" class="form-control">
                    <option value="">Selecione sistema operativo...</option>
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?= $cliente['cliente_codigo'] ?>"><?=$cliente['cliente_direccion'] ?></option>
                        <?php endforeach?>
                    </select>
                    <h5 class="mt-5">Licenciado?</h5>                    
                    <input type="checkbox" name="off_nombre" id="off_nombre">
                    <label for="off_nombre">Si</label>
                    <input type="checkbox" name="off_nombre" id="off_nombre">
                    <label for="off_nombre">No</label>
                </div>
                <div class="col">
                    <label for="empleado_puesto">Antivirus</label>
                <select name="empleado_puesto" id="empleado_puesto" class="form-control">
                    <option value="">Selecione antivirus...</option>
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?= $cliente['cliente_codigo'] ?>"><?=$cliente['cliente_direccion'] ?></option>
                        <?php endforeach?>
                </select>
                <h5 class="mt-5">Licenciado?</h5>                    
                <input type="checkbox" name="off_nombre" id="off_nombre">
                <label for="off_nombre">Si</label>
                <input type="checkbox" name="off_nombre" id="off_nombre">
                <label for="off_nombre">No</label>
            </div>
            <div class="col">
                <label for="empleado_puesto">Offices</label>
                <select name="empleado_puesto" id="empleado_puesto" class="form-control">
                    <option value="">Selecione offices...</option>
                    <?php foreach ($clientes as $cliente): ?>
                    <option value="<?= $cliente['cliente_codigo'] ?>"><?=$cliente['cliente_direccion'] ?></option>
                    <?php endforeach?>
                </select>
                <h5 class="mt-5">Licenciado?</h5>                    
                <input type="checkbox" name="off_nombre" id="off_nombre">
                <label for="off_nombre">Si</label>
                <input type="checkbox" name="off_nombre" id="off_nombre">
                <label for="off_nombre">No</label>
            </div>
        </div> 
        <hr/> 
        <div class="row mb-3">
            <div class="col">
                <label for="off_nombre">Procesador</label>
                <input type="number" name="off_nombre" id="off_nombre" class="form-control" placeholder="Ingrese catalogo">
            </div>
            <div class="col">
                <label for="off_nombre">Disco Duro</label>
                <input type="text" name="off_nombre" id="off_nombre" class="form-control" placeholder="Ingrese grado">
                <h5 class="mt-5">Tipo de Disco</h5>                    
                <input type="checkbox" name="off_nombre" id="off_nombre">
                <label for="off_nombre">HDD</label>
                <input type="checkbox" name="off_nombre" id="off_nombre">
                <label for="off_nombre">SSD</label>
            </div>
            <div class="col">
                <label for="off_nombre">Memoria RAM</label>
                <input type="text" name="off_nombre" id="off_nombre" class="form-control" placeholder="Ingrese nombre">
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
        <table id="tablainventarios" class="table table-bordered table-hover">
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/inventarios/index.js') ?>"></script>
