<h1 class="text-center mt-5">INVESTIGACION DEL INCIDENTE</h1>
<div class="row justify-content-center my-4">
    <form class="col-lg-8 border bg-light p-3" id="formularioSoluciones">
        <input type="number" name="maq_id" id="maq_id" class="form-control" hidden>
        <h4 class="modal-title" id="">INICIO DE LA INVESTIGACION DEL INCIDENTE</h4>
        <!-- Otros campos del formulario aquí -->
        <div class="row mb-3">
            <div class="col">
                <label for="inc_fecha">FECHA Y HORA DE INICIO</label>
                <input type="date-local" name="inc_fecha" id="inc_fecha" class="form-control" readonly>
            </div>
            <div class="col">
                <label for="inc_no_incidente">NO. DE INCIDENTE</label>
                <input type="text" name="inc_no_incidente" id="inc_no_incidente" class="form-control" readonly>
            </div>
        </div>
        <hr />
        <h4 class="modal-title" id="">INVESTIGADOR DEL INCIDENTE</h4>
        <div class="row mb-3" name="" id="">
            <div class="col-3">
                <label for="inc_catalogo_irt">CATALOGO DEL INVESTIGADOR</label>
                <input type="text" name="inc_catalogo_irt" id="inc_catalogo_irt" class="form-control"
                    placeholder="Ingrese catalogo" readonly>
            </div>
            <div class="col-3">
                <label for="per_grado_irt">GRADO DEL INVESTIGADOR</label>
                <input type="text" name="per_grado_irt" id="per_grado_irt" class="form-control" placeholder="grado"
                    readonly>
            </div>
            <div class="col">
                <label for="per_nombre_irt">NOMBRE DEL INVESTIGADOR</label>
                <input type="text" name="per_nombre_irt" id="per_nombre_irt" class="form-control" placeholder="nombre"
                    readonly>
            </div>
        </div>
        <hr />
        <h4 class="modal-title" id="">FINALIZACION DE LA INVESTIGACION</h4>
        <div class="row mb-3">
            <div class="col">
                <label for="det_inc_fec_descubre">FECHA Y HORA DEL IMPACTO</label>
                <input type="datetime-local" name="det_inc_fec_descubre" id="det_inc_fec_descubre" class="form-control">
            </div>
            <div class="col">
                <label for="det_inc_fec_ocurre">FECHA Y HORA DE FINALIZACION</label>
                <input type="datetime-local" name="det_inc_fec_ocurre" id="det_inc_fec_ocurre" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="desc_que">OBSERVACIONES</label>
                <textarea type="text" name="desc_que" id="desc_que" class="form-control"></textarea>
            </div>
        </div>
        <hr />
        <h4 class="modal-title" id="">PERPETRADOR INVOLUCRADO</h4>
        <div class="row mb-3">
            <div class="col">
                <label for="pcivil_gradi">Tipo de perpetrador</label>
                <select name="pcivil_gradi" id="pcivil_gradi" class="form-control">
                    <option value="">Selecione perpetrador...</option>
                    <?php foreach ($perpetradores as $perpetrador): ?>
                        <option value="<?= $perpetrador['perp_id'] ?>">
                            <?= $perpetrador['perp_nombre'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col">
                <label for="pcivil_gradi">Motivos del perpetrador</label>
                <select name="pcivil_gradi" id="pcivil_gradi" class="form-control">
                    <option value="">Selecione motivo...</option>
                    <?php foreach ($motivos as $motivo): ?>
                        <option value="<?= $motivo['mot_id'] ?>">
                            <?= $motivo['mot_nombre'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="desc_que">Descripcion del perpetrador</label>
                <textarea type="text" name="desc_que" id="desc_que" class="form-control"></textarea>
            </div>
            <div class="col">
                <label for="desc_que">Otros</label>
                <textarea type="text" name="desc_que" id="desc_que" class="form-control"></textarea>
            </div>
        </div>
        <hr />
        <h4 class="modal-title" id="">ACCIONES TOMADAS</h4>
        <div class="row mb-3">
            <div class="col">
                <label for="desc_que">Accionenes tomadas para resolver el incidente</label>
                <textarea type="text" name="desc_que" id="desc_que" class="form-control"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="desc_que">Accionenes planificadas para resolver el incidente</label>
                <textarea type="text" name="desc_que" id="desc_que" class="form-control"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="desc_que">Accionenes sobresalientes</label>
                <textarea type="text" name="desc_que" id="desc_que" class="form-control"></textarea>
            </div>
        </div>

        <hr />
        <h4 class="modal-title" id="">CONCLUSIONES</h4>
        <div class="row mb-3">
            <div class="col">
                <p>Indique si considera que el incidente se concluye como Bajo, Medio,
                    Alto o Critico e incluya una breve justificacion de el porque.</p>
                <select name="pcivil_gradi" id="pcivil_gradi" class="form-control">
                    <option value="">Selecione...</option>
                    <?php foreach ($concluciones as $conclusion): ?>
                        <option value="<?= $conclusion['conclu_id'] ?>">
                            <?= $conclusion['conclu_nombre'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="desc_que">Justifique la Conclusion</label>
                <textarea type="text" name="desc_que" id="desc_que" class="form-control"></textarea>
            </div>
        </div>
        <hr />
        <div class="row mb-3">
            <div class="col">
                <h4 class="modal-title" id="">Entidades internas notificadas</h4>
                <select name="pcivil_gradi" id="pcivil_gradi" class="form-control">
                    <option value="">Selecione...</option>
                    <?php foreach ($concluciones as $conclusion): ?>
                        <option value="<?= $conclusion['conclu_id'] ?>">
                            <?= $conclusion['conclu_nombre'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col">
                <h4 class="modal-title" id="">Entidades externas notificadas</h4>
                <select name="pcivil_gradi" id="pcivil_gradi" class="form-control">
                    <option value="">Selecione...</option>
                    <?php foreach ($concluciones as $conclusion): ?>
                        <option value="<?= $conclusion['conclu_id'] ?>">
                            <?= $conclusion['conclu_nombre'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="desc_que">Otras entidades</label>
                <textarea type="text" name="desc_que" id="desc_que" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>



<!-- <h1>Registro de las Maquinass</h1>
<div class="row justify-content-center">
    <div class="col table-responsive">
        <table id="tablaMaquinas" class="table table-bordered table-hover">
        </table>
    </div>
</div> -->

<script src="<?= asset('./build/js/soluciones/index.js') ?>"></script>