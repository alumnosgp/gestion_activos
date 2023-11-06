<h1 class="text-center mt-5">REGISTRO DE INVENTARIO</h1>
<div class="row justify-content-center my-4">
    <form class="col-lg-8 border bg-light p-3" id="formularioMaquinas">
        <input type="number" name="maq_id" id="maq_id" class="form-control" hidden>
            <div class="row mb-3">
             <div class="col">
                <label for="maq_oficina">Oficina</label>
                <select name="maq_oficina" id="maq_oficina" class="form-control">
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
                    <option value="">Selecione nombre...</option>
                    <!-- <?php print_r($personas);?> -->
                    <?php foreach ($personas as $persona): ?>
                    <option value="<?= $persona['per_id'] ?>"><?=$persona['personanombre'] ?></option>
                    <?php endforeach?>
                </select>
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
                <label for="per_puesto">PUESTO</label>
                <input type="text" name="per_puesto" id="per_puesto" class="form-control" placeholder="Ingrese puesto">
            </div>
        </div>  
        <div class="mb-3">
            <label for="maq_uso" class="form-label">JUSTIFIQUE USO DEL EQUIPO</label>
            <textarea class="form-control" name="maq_uso" id="maq_uso" rows="3" placeholder="Justifique el uso que se le dara al equipo"></textarea>
        </div>  
        <hr/>
        <h3 class="text-center mt-5">CARACTERISTICAS DEL EQUIPO</h3>
            <div class="row mb-3">
                <div class="col">
                    <label for="maq_sistema_op">SISTEMA OPERATIVO</label>
                    <select name="maq_sistema_op" id="maq_sistema_op" class="form-control">
                        <option value="">Selecione sistema operativo...</option>
                        <?php foreach ($sistemas as $sistema): ?>
                        <option value="<?= $sistema['sist_id'] ?>"><?=$sistema['sist_nombre'] ?></option>
                        <?php endforeach?>
                    </select>
                    <label for="maq_lic_so" class="mt-5">Licencia:</label>                     
                    <input type="checkbox" name="maq_lic_so" id="maq_lic_so">
                    <label for="maq_lic_so">Si</label>
                </div>
                <div class="col">
                    <label for="maq_antivirus">ANTIVIRUS</label>
                    <select name="maq_antivirus" id="maq_antivirus" class="form-control">
                        <option value="">Selecione antivirus...</option>
                        <?php foreach ($antivirus as $antiviru): ?>
                        <option value="<?= $antiviru['ant_id'] ?>"><?=$antiviru['ant_nombre'] ?></option>
                        <?php endforeach?>
                    </select>
                <label for="maq_lic_antv" class="mt-5">Licencia:</label>                    
                <input type="checkbox" name="maq_lic_antv" id="maq_lic_antv">
                <label for="maq_lic_antv">Si</label>
            </div>
            <div class="col">
                   <label for="maq_office">OFFICES</label>
                    <select name="maq_office" id="maq_office" class="form-control">
                        <option value="">Selecione offices...</option>
                        <?php foreach ($offices as $office): ?>
                        <option value="<?= $office['off_id'] ?>"><?=$office['off_nombre'] ?></option>
                        <?php endforeach?>
                    </select>
                    <label for="maq_lic_office" class="mt-5">Licencia:</label>                     
                <input type="checkbox" name="maq_lic_office" id="maq_lic_office">
                <label for="maq_lic_office">Si</label>
            </div>
        </div> 
        <hr/> 
        <div class="row mb-3">
            <div class="col">
                <label for="maq_procesador_capacidad">PROCESADOR</label>
                <input type="number" name="maq_procesador_capacidad" id="maq_procesador_capacidad" class="form-control" placeholder="Ingrese capacidad Procesador">
            </div>
            <div class="col">
                <label for="maq_disco_capacidad">DISCO DURO</label>
                <input type="text" name="maq_disco_capacidad" id="maq_disco_capacidad" class="form-control" placeholder="Ingrese capacidad de Disco Duro">                   
                <label for="maq_tipo_disco_duro">TIPO DE DISCO DURO</label>
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
                <label for="maq_ram_capacidad">MEMORIA RAM</label>
                <input type="text" name="maq_ram_capacidad" id="maq_ram_capacidad" class="form-control" placeholder="Ingrese capacidad RAM">
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
        <table id="tablaMaquinas" class="table table-bordered table-hover">
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/maquinas/index.js') ?>"></script>
