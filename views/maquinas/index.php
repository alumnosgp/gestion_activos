<h1 class="text-center mt-5">REGISTRO DE INVENTARIO</h1>
<div class="row justify-content-center my-4">
    <form class="col-lg-8 border bg-light p-3" id="formularioMaquinas">
        <input type="number" name="maq_id" id="maq_id" class="form-control" hidden>
        <div class="row mb-3">
            <div class="col">
                <label for="maq_nombre">Nombre de la maquina</label>
                <input type="text" name="maq_nombre" id="maq_nombre" class="form-control"
                    placeholder="Ingrese nombre de la pc">
            </div>
            <div class="col">
                <label for="maq_mac">Direccion MAC</label>
                <input type="text" name="maq_mac" id="maq_mac" class="form-control" placeholder="Ingrese direccion MAC">
            </div>
        </div>
        <hr />
        <h3 class="text-center mt-5">RESPONSABLE DEL EQUIPO DE COMPUTO</h3>
        <div class="row mb-3">
            <div class="col">
                <label>TIPO DE MAQUINA</label>
                <select name="maq_tipo" id="maq_tipo" class="form-control">
                    <option value="">Seleccione de maquina...</option>
                    <option value="personal">PERSONAL</option>
                    <option value="servicio">SERVICIO</option>
                </select>
            </div>
            <div class="col">
                <label>TIPO DE PERSONAL</label>
                <select name="tipoPersonal" id="tipoPersonal" class="form-control">
                    <option value=" " selected>seleccione persona...</option>
                    <option value="DE ALTA">DE ALTA</option>
                    <option value="CONTRATADO/A">CONTRATADO/A</option>
                </select>
            </div>
        </div>
        <div class="row mb-3" name="perAlta" id="perAlta">
            <div class="col">
                <label for="maq_per_alta">CATALOGO</label>
                <input type="text" name="maq_per_alta" id="maq_per_alta" class="form-control"
                    placeholder="Ingrese catalogo">
            </div>
            <div class="col">
                <label for="per_nombre">NOMBRE</label>
                <input type="text" name="per_nombre" id="per_nombre" class="form-control" placeholder="nombre" readonly>
            </div>
            <div class="col">
                <label for="per_grado">GRADO</label>
                <input type="text" name="per_grado" id="per_grado" class="form-control" placeholder="grado" readonly>
            </div>

            <input type="text" name="maq_plaza" id="maq_plaza" class="form-control" placeholder="puesto" hidden>
            <div class="col">
                <label for="per_plaza">PUESTO</label>
                <input type="text" name="per_plaza" id="per_plaza" class="form-control" placeholder="puesto" readonly>
            </div>
        </div>
        <div class="row mb-3" name="perPlanillero" id="personalPlanilla">
            <div class="col">
                <label for="maq_per_planilla">CATALOGO</label>
                <input type="text" name="maq_per_planilla" id="maq_per_planilla" class="form-control"
                    placeholder="Ingrese catalogo">
            </div>
            <div class="col">
                <label for="pcivil_nombre">NOMBRE</label>
                <input type="text" name="pcivil_nombre" id="pcivil_nombre" class="form-control" placeholder="nombre"
                    readonly>
            </div>
            <div class="col">
                <label for="pcivil_gradi">GRADO</label>
                <input type="text" name="pcivil_gradi" id="pcivil_gradi" class="form-control" placeholder="grado"
                    readonly>
            </div>

            <div class="col">
                <label for="pcivil_plaza">PUESTO</label>
                <input type="text" name="pcivil_plaza" id="pcivil_plaza" class="form-control" placeholder="puesto"
                    readonly>
            </div>

        </div>
        <div class="mb-3">
            <label for="maq_uso" class="form-label">JUSTIFIQUE USO DEL EQUIPO</label>
            <textarea class="form-control" name="maq_uso" id="maq_uso" rows="3"
                placeholder="Justifique el uso que se le dara al equipo"></textarea>
        </div>
        <hr />
        <h3 class="text-center mt-5">CARACTERISTICAS DEL EQUIPO</h3>
        <div class="row mb-3">
            <div class="col">
                <label for="maq_sistema_op">SISTEMA OPERATIVO</label>
                <select name="maq_sistema_op" id="maq_sistema_op" class="form-control">
                    <option value="">Selecione sistema operativo...</option>
                    <?php foreach ($sistemas as $sistema): ?>
                        <option value="<?= $sistema['sist_id'] ?>">
                            <?= $sistema['sist_nombre'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <label for="maq_lic_so" class="mt-5">LICENCIA:</label>
                <select name="maq_lic_so" id="maq_lic_so" class="form-control">
                    <option value="no">NO</option>
                    <option value="si">SI</option>
                </select>
            </div>
            <div class="col">
                <label for="maq_antivirus">ANTIVIRUS</label>
                <select name="maq_antivirus" id="maq_antivirus" class="form-control">
                    <option value="">Selecione antivirus...</option>
                    <?php foreach ($antivirus as $antiviru): ?>
                        <option value="<?= $antiviru['ant_id'] ?>">
                            <?= $antiviru['ant_nombre'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <label for="maq_lic_antv" class="mt-5">LICENCIA:</label>
                <select name="maq_lic_antv" id="maq_lic_antv" class="form-control">
                    <option value="no">NO</option>
                    <option value="si">SI</option>
                </select>
            </div>
            <div class="col">
                <label for="maq_office">OFFICES</label>
                <select name="maq_office" id="maq_office" class="form-control">
                    <option value="">Selecione offices...</option>
                    <?php foreach ($offices as $office): ?>
                        <option value="<?= $office['off_id'] ?>">
                            <?= $office['off_nombre'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <label for="maq_lic_office" class="mt-5">LICENCIA:</label>
                <select name="maq_lic_office" id="maq_lic_office" class="form-control">
                    <option value="no">NO</option>
                    <option value="si">SI</option>
                </select>
            </div>
        </div>
        <hr />
        <div class="row mb-3">
            <div class="col">
                <label for="maq_tipo_disco_duro">TIPO DE DISCO DURO</label>
                <select name="maq_tipo_disco_duro" id="maq_tipo_disco_duro" class="form-control">
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
                <label for="maq_disco_capacidad">DISCO DURO</label>
                <select name="maq_disco_capacidad" id="maq_disco_capacidad" class="form-control">
                    <option value="128 GB">128 GB</option>
                    <option value="256 GB">256 GB</option>
                    <option value="512 GB">512 GB</option>
                    <option value="1 TB">1 TB</option>
                    <option value="2 TB">2 TB</option>
                    <option value="4 TB">4 TB</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="maq_ram_capacidad">MEMORIA RAM</label>
                <select name="maq_ram_capacidad" id="maq_ram_capacidad" class="form-control">
                    <option value="4 GB">4 GB</option>
                    <option value="8 GB">8 GB</option>
                    <option value="16 GB">16 GB</option>
                    <option value="32 GB">32 GB</option>
                    <option value="64 GB">64 GB</option>
                    <option value="128 GB">128 GB</option>
                </select>
            </div>
            <div class="col">
                <label for="maq_procesador_capacidad">PROCESADOR</label>
                <select name="maq_procesador_capacidad" id="maq_procesador_capacidad" class="form-control">
                    <option value="i3">Intel Core i3</option>
                    <option value="i5">Intel Core i5</option>
                    <option value="i7">Intel Core i7</option>
                    <option value="i9">Intel Core i9</option>
                    <option value="ryzen3">AMD Ryzen 3</option>
                    <option value="ryzen5">AMD Ryzen 5</option>
                    <option value="ryzen7">AMD Ryzen 7</option>
                    <option value="ryzen9">AMD Ryzen 9</option>
                    <option value="m1">Apple M1</option>
                    <option value="m1pro">Apple M1 Pro</option>
                    <option value="m1max">Apple M1 Max</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="button" id="btnGuardar" class="btn btn-primary w-100">Guardar</button>
            </div>
            <div class="col">
                <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
            </div>
            <div class="col">
                <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
            </div>
        </div>
    </form>
</div>
<h1>Registro de las Maquinass</h1>
<div class="row justify-content-center">
    <div class="col table-responsive">
        <table id="tablaMaquinas" class="table table-bordered table-hover">
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/maquinas/index.js') ?>"></script>