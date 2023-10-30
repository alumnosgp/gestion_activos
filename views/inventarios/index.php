<h1 class="text-center mt-5">INVENTARIO DE EQUIPOS DE COMPUTO</h1>
<div class="row justify-content-center my-4">
    <form class="col-lg-8 border bg-light p-3" id="formularioInventarios">
        <input type="number" name="maq_id" id="maq_id" class="form-control" hidden>
            <div class="row mb-3">
             <div class="col">
                <label for="ofic_nombre">Oficina</label>
                <select name="ofic_nombre" id="ofic_nombre" class="form-control">
                    <option value="">Selecione oficina...</option>
                    <?php foreach ($oficinas as $oficina): ?>
                    <option value="<?= $oficina['ofic_id'] ?>"><?=$oficina['ofic_nombre'] ?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="col">
                <label for="maq_nombre">Nombre de la maquina</label>
                <input type="text" name="maq_nombre" id="maq_nombre" class="form-control" placeholder="Ingrese nombre de la pc">
            </div>
            <div class="col">
                <label for="maq_mac">Direccion MAC</label>
                <input type="text" name="maq_mac" id="maq_mac" class="form-control" placeholder="Ingrese direccion MAC">
            </div>
        </div>   
        <hr/>
        <h3 class="text-center mt-5">RESPONSABLE DEL EQUIPO DE COMPUTO</h3>
        <div class="row mb-3">
            <div class="col">
                <select name="maq_tipo" id="maq_tipo" class="form-control">
                    <option value="">Seleccione servicio...</option>
                    <option value="PERSONAL">PERSONAL</option>
                    <option value="SERVICIO">SERVICIO</option>
                </select>
            </div>
        </div>  
        <div class="row mb-3">
            <div class="col">
                <label for="per_nombre">NOMBRE</label>
                <select name="per_nombre" id="per_nombre" class="form-control">
                    <option value="">Selecione catalogo...</option>
                    <!-- <?php print_r($personas);?> -->
                    <?php foreach ($personas as $persona): ?>
                    <option value="<?= $persona['per_id'] ?>"><?=$persona['personanombre'] ?></option>
                    <?php endforeach?>
                </select>
                <!-- <label for="per_catalogo">Catalogo del responsable</label>
                <input type="number" name="per_catalogo" id="per_catalogo" class="form-control" placeholder="Ingrese catalogo"> -->
            </div>
            <div class="col">
                <label for="per_catalogo">CATALOGO</label>
                <input type="text" name="per_catalogo" id="per_catalogo" class="form-control" placeholder="Ingrese catalogo">
            </div>
            <div class="col">
                <label for="per_grado">GRADO</label>
                <input type="text" name="per_grado" id="per_grado" class="form-control" placeholder="Ingrese grado">
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
                    <label for="ofic_nombre">SISTEMA OPERATIVO</label>
                    <select name="ofic_nombre" id="ofic_nombre" class="form-control">
                        <option value="">Selecione sistema operativo...</option>
                        <?php foreach ($oficinas as $oficina): ?>
                        <option value="<?= $oficina['ofic_id'] ?>"><?=$oficina['ofic_nombre'] ?></option>
                        <?php endforeach?>
                    </select>
                    <label for="off_nombre" class="mt-5">Licencia:</label>                     
                    <input type="checkbox" name="off_nombre" id="off_nombre">
                    <label for="off_nombre">Si</label>
                </div>
                <div class="col">
                    <label for="ant_nombre">ANTIVIRUS</label>
                    <select name="ant_nombre" id="ant_nombre" class="form-control">
                        <option value="">Selecione antivirus...</option>
                        <?php foreach ($antivirus as $antiviru): ?>
                        <option value="<?= $antivitu['ant_id'] ?>"><?=$antivitu['ant_nombre'] ?></option>
                        <?php endforeach?>
                    </select>
                <label for="off_nombre" class="mt-5">Licencia:</label>                    
                <input type="checkbox" name="off_nombre" id="off_nombre">
                <label for="off_nombre">Si</label>
            </div>
            <div class="col">
                   <label for="ofic_nombre">OFFICES</label>
                    <select name="ofic_nombre" id="ofic_nombre" class="form-control">
                        <option value="">Selecione offices...</option>
                        <?php foreach ($oficinas as $oficina): ?>
                        <option value="<?= $oficina['ofic_id'] ?>"><?=$oficina['ofic_nombre'] ?></option>
                        <?php endforeach?>
                    </select>
                    <label for="off_nombre" class="mt-5">Licencia:</label>                     
                <input type="checkbox" name="off_nombre" id="off_nombre">
                <label for="off_nombre">Si</label>
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
                <label for="off_nombre">Tipo de Disco</label>
                <select name="maq_tipo_disco_duro" id="maq_tipo_disco_duro" class="form-control">
                    <option value="">Seleccione tipo de disco...</option>
                    <option value="SSD">SSD</option>
                    <option value="HDD">HDD</option>
                    <option value="NVMe">NVMe</option>
                    <option value="SATA">SATA</option>
                    <option value="M.2">M.2</option>
                    <option value="SCSI">SCSI</option>
                    <option value="Fibra óptica">Fibra óptica</option>
                </select>
            </div>
            <div class="col">
                <label for="off_nombre">Memoria RAM</label>
                <input type="text" name="off_nombre" id="off_nombre" class="form-control" placeholder="Ingrese nombre">
            </div>
        </div>  
        <div class="row">
            <div class="col">
                <button type="submit" form="formularioHorario" id="btnGuardar" class="btn btn-primary btn-block w-100">Guardar</button>
            </div>
            <div class="col">
                <button type="button" id="btnModificar" class="btn btn-warning btn-block">Modificar</button>
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
