<form id="formTotal">
    <div class="row justify-content-center">
        <div class="row justify-content-center my-4">
            <div class="col-lg-8 border bg-light p-3" id="formularioIncidentes">
                <h1 class="text-center mt-5">REGISTRO DE INCIDENTES</h1>
                <input type="number" name="inc_id" id="inc_id" class="form-control" hidden>
                <div class="row mb-3">
                    <div class="col">
                        <label for="inc_fecha">FECHA Y HORA</label>
                        <input type="date-local" name="inc_fecha" id="inc_fecha" class="form-control" readonly>
                    </div>
                    <div class="col">
                        <label for="inc_no_incidente">NO. DE INCIDENTE</label>
                        <input type="text" name="inc_no_incidente" id="inc_no_incidente" class="form-control" readonly>
                    </div>

                    <div class="col">
                        <label for="inc_no_identificacion">NO. INCIDENTE RELACIONADO</label>
                        <input type="text" name="inc_no_identificacion" id="inc_no_identificacion" class="form-control">
                    </div>
                </div>
                <hr />
                <h3 class="text-center mt-5">MIEMBRO DEL IRT</h3>
                <div class="row mb-3" name="" id="">
                    <div class="col">
                        <label for="inc_catalogo_irt">CATALOGO</label>
                        <input type="text" name="inc_catalogo_irt" id="inc_catalogo_irt" class="form-control"
                            placeholder="Ingrese catalogo">
                    </div>
                    <div class="col">
                        <label for="per_grado_irt">GRADO</label>
                        <input type="text" name="per_grado_irt" id="per_grado_irt" class="form-control"
                            placeholder="grado" readonly>
                    </div>
                    <div class="col">
                        <label for="per_nombre_irt">NOMBRE</label>
                        <input type="text" name="per_nombre_irt" id="per_nombre_irt" class="form-control"
                            placeholder="nombre" readonly>
                    </div>
                    <!-- <input type="text" name="maq_plaza" id="maq_plaza" class="form-control" placeholder="puesto" hidden> -->
                </div>
                <div class="row mb-3" name="" id="">
                    <div class="col">
                        <label for="per_plaza_irt">PUESTO</label>
                        <input type="text" name="per_plaza_irt" id="per_plaza_irt" class="form-control"
                            placeholder="puesto" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="inc_tel_irt">NO. DE TELEFONO</label>
                        <input type="text" name="inc_tel_irt" id="inc_tel_irt" class="form-control"
                            placeholder="Ingrese No. de Telefono">
                    </div>
                    <div class="col">
                        <label for="inc_email_irt">CORREO ELECTRONICO</label>
                        <input type="email" name="inc_email_irt" id="inc_email_irt" class="form-control"
                            placeholder="Ingrese Email">
                    </div>
                </div>
                <hr />
                <h3 class="text-center mt-5">DATOS DE LA PERSONA QUE REPORTA</h3>
                <div class="row mb-3" name="" id="">
                    <div class="col">
                        <label for="inc_catalogo_rep">CATALOGO</label>
                        <input type="text" name="inc_catalogo_rep" id="inc_catalogo_rep" class="form-control"
                            placeholder="Ingrese catalogo">
                    </div>
                    <div class="col">
                        <label for="per_grado_rep">GRADO</label>
                        <input type="text" name="per_grado_rep" id="per_grado_rep" class="form-control"
                            placeholder="grado" readonly>
                    </div>
                    <div class="col">
                        <label for="per_nombre_rep">NOMBRE</label>
                        <input type="text" name="per_nombre_rep" id="per_nombre_rep" class="form-control"
                            placeholder="nombre" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="per_plaza_rep">PUESTO</label>
                        <input type="text" name="per_plaza_rep" id="per_plaza_rep" class="form-control"
                            placeholder="puesto" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <!-- <input type="text" name="maq_plaza" id="maq_plaza" class="form-control" placeholder="puesto" hidden> -->
                    <div class="col">
                        <label for="inc_direccion_rep">DIRECCION</label>
                        <input type="text" name="inc_direccion_rep" id="inc_direccion_rep" class="form-control"
                            placeholder="Ingrese direccion del reporte">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="inc_tel_rep">NO. DE TELEFONO</label>
                        <input type="text" name="inc_tel_rep" id="inc_tel_rep" class="form-control"
                            placeholder="Ingrese No. de Telefono">
                    </div>
                    <div class="col">
                        <label for="inc_email_rep">CORREO ELECTRONICO</label>
                        <input type="email" name="inc_email_rep" id="inc_email_rep" class="form-control"
                            placeholder="Ingrese Email">
                    </div>
                </div>
            </div>
        </div>

        <!--////////////////////////////////// FORMULARIO DE DESCRIPCIONES//////////////////////////////////////////////////////-->

        <div class="row justify-content-center my-4">
            <div class="col-lg-8 border bg-light p-3" id="formularioDescripcionincidentes">
                <h1 class="text-center mt-5">DESCRIPCION DE INCIDENTES</h1>
                <input type="number" name="desc_id" id="desc_id" class="form-control" hidden>
                <div class="row mb-3">
                    <div class="col">
                        <label for="desc_incidente_id">NO. INCIDENTE</label>
                        <input type="text" name="desc_incidente_id" id="desc_incidente_id" class="form-control"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="desc_que">QUE PASO?</label>
                        <textarea type="text" name="desc_que" id="desc_que" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="desc_como">COMO OCURRIO?</label>
                        <textarea type="text" name="desc_como" id="desc_como" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="desc_porque">PORQUE OCURRIO?</label>
                        <textarea type="text" name="desc_porque" id="desc_porque" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="desc_vista">VISTAS INICIALES DE LOS COMPONENTES / ACTIVOS AFECTADOS</label>
                        <textarea type="text" name="desc_vista" id="desc_vista" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="desc_impacto_adv">IMPACTOS ADVERSOS</label>
                        <textarea type="text" name="desc_impacto_adv" id="desc_impacto_adv"
                            class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="desc_vulnerabilidad">CUALQUIER VULNERABILIDAD IDENTIFICADA</label>
                        <textarea type="text" name="desc_vulnerabilidad" id="desc_vulnerabilidad"
                            class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!--////////////////////////////////// DETALLE DE INCIDENTE DE SEGURIDAD //////////////////////////////////////////////////////-->

        <div class="row justify-content-center my-4">
            <div class="col-lg-8 border bg-light p-3" id="formularioDetalledeincidente">
                <h1 class="text-center mt-5">DETALLE DE INCIDENTE DE SEGURIDAD</h1>
                <input type="number" name="det_inc_id" id="det_inc_id" class="form-control" hidden>
                <div class="row mb-3">
                    <div class="col">
                        <label for="det_inc_id_incidente">NO. INCIDENTE</label>
                        <input type="text" name="det_inc_id_incidente" id="det_inc_id_incidente" class="form-control"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="det_inc_fec_ocurre">FECHA Y HORA DEL INCIDENTE</label>
                        <input type="datetime-local" name="det_inc_fec_ocurre" id="det_inc_fec_ocurre"
                            class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="det_inc_fec_descubre">FECHA Y HORA QUE SE DESCUBRIO EL INCIDENTE</label>
                        <input type="datetime-local" name="det_inc_fec_descubre" id="det_inc_fec_descubre"
                            class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="det_inc_fec_informa">FECHA Y HORA QUE SE INFORMO EL INCIDENTE</label>
                        <input type="datetime-local" name="det_inc_fec_informa" id="det_inc_fec_informa"
                            class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="det_inc_estatus">ESTATUS DEL INCIDENTE</label>
                        <select name="det_inc_estatus" id="det_inc_estatus" class="form-control">
                            <option value="">Seleccione Estado...</option>
                            <option value="en curso">EN CURSO</option>
                            <option value="finalizado">FINALIZADO</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!--////////////////////////////////// DETALLE DE INCIDENTE DE SEGURIDAD //////////////////////////////////////////////////////-->
        <div class="row justify-content-center my-4">
            <div class="col-lg-8 border bg-light p-3" id="formularioCategoriaincidentes">
                <h1 class="text-center mt-5">CATEGORIA DEL INCIDENTE DE SEGURIDAD</h1>
                <input type="number" name="det_categ_id" id="det_categ_id" class="form-control" hidden>
                <div class="row mb-3">
                    <div class="col">
                        <label for="det_categ_id_incidente">NO. INCIDENTE</label>
                        <input type="text" name="det_categ_id_incidente" id="det_categ_id_incidente"
                            class="form-control" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="det_categ_descripcion">TIPO DE INCIDENTE</label>
                        <select name="det_categ_descripcion" id="det_categ_descripcion" class="form-control">
                            <option value="">Seleccione Estado...</option>
                            <option value="sospechoso">SOSPECHOSO</option>
                            <option value="real">REAL</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="det_categoria">CATEGORIA</label>
                        <select name="det_categoria" id="det_categoria" class="form-control">
                            <option value="">Selecione categoria del incidente...</option>
                            <?php foreach ($categorias as $categoria): ?>
                                <option value="<?= $categoria['cat_inc_id'] ?>">
                                    <?= $categoria['cat_inc_decrip'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="det_categ_observacion">ESPECIFIQUE</label>
                        <textarea type="text" name="det_categ_observacion" id="det_categ_observacion"
                            class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <!--////////////////////////////////// COMPONENTES AFECTADOS DE INCIDENTE DE SEGURIDAD //////////////////////////////////////////////////////-->
        <div class="row justify-content-center my-4">
            <div class="col-lg-8 border bg-light p-3" id="formularioComponentes">
                <h1 class="text-center mt-5">COMPONENTES DEL INCIDENTE DE SEGURIDAD</h1>
                <input type="number" name="det_comp_act_id" id="det_comp_act_id" class="form-control" hidden>
                <div class="row mb-3">
                    <div class="col">
                        <label for="det_comp_act_inc_id">NO. INCIDENTE</label>
                        <input type="text" name="det_comp_act_inc_id" id="det_comp_act_inc_id" class="form-control"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="det_comp_act_componente_id">COMPONENETE</label>
                        <select name="det_comp_act_componente_id" id="det_comp_act_componente_id" class="form-control">
                            <option value="">Selecione categoria del incidente...</option>
                            <?php foreach ($componentes as $componente): ?>
                                <option value="<?= $componente['comp_act_id'] ?>">
                                    <?= $componente['comp_act_nombre'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="det_comp_act_descripcion">ESPECIFIQUE COMPONENTE</label>
                        <textarea type="text" name="det_comp_act_descripcion" id="det_comp_act_descripcion"
                            class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!--////////////////////////////////// EFECTOS ABVERSOS DEL INCIDENTE DE SEGURIDAD //////////////////////////////////////////////////////-->
        <div class="row justify-content-center my-4">
            <div class="col-lg-8 border bg-light p-3" id="formularioEfectoabverso">
                <h1 class="text-center mt-5">EFECTOS ABVERSOS DEL INCIDENTE DE CIBERSEGURIDAD</h1>
                <input type="number" name="det_efct_id" id="det_efct_id" class="form-control" hidden>
                <div class="row mb-3">
                    <div class="col">
                        <label for="det_efec_id_incidente">NO. INCIDENTE</label>
                        <input type="text" name="det_efec_id_incidente" id="det_efec_id_incidente" class="form-control"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3" id="presentaEfecto">
                    <!-- <div class="col">
                    <label>EL INCIDENTE PRESENTA EFECTOS ABVERSOS?</label>
                    <select name="" id="" class="form-control">
                        <option value="">NO PRESENTA</option>
                        <option value="">PRESENTA</option>
                    </select>
                </div> -->
                    <div class="row mb-3" id="efectoAbversos">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="det_efct_tipo">TIPO DE EFECTO ABVERSO</label>
                                <select name="det_efct_tipo" id="det_efct_tipo" class="form-control">
                                    <option value="">Selecione efecto abverso...</option>
                                    <?php foreach ($efectos as $efecto): ?>
                                        <option value="<?= $efecto['tip_id'] ?>">
                                            <?= $efecto['tip_descrip'] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="det_efct_valor">POMDERACION</label>
                                <select name="det_efct_valor" id="det_efct_valor" class="form-control">
                                    <option value="">Selecione ponderacion...</option>
                                    <?php foreach ($impactos as $impacto): ?>
                                        <option value="<?= $impacto['imp_id'] ?>">
                                            <?= $impacto['ipm_decrip'] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="det_efct_impacto">IMPACTO</label>
                                <select name="det_efct_impacto" id="det_efct_impacto" class="form-control">
                                    <option value="">Selecione impacto...</option>
                                    <?php foreach ($valores as $valor): ?>
                                        <option value="<?= $valor['val_id'] ?>">
                                            <?= $valor['val_decrip'] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="det_efct_costo">COSTO</label>
                                <textarea type="text" name="det_efct_costo" id="det_efct_costo"
                                    class="form-control"></textarea>
                            </div>
                            <div class="col">
                                <label for="det_efct_observacion">OBSERVACIONES</label>
                                <textarea type="text" name="det_efct_observacion" id="det_efct_observacion"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- <div class="col text-center">
                    <button id="btnBuscar" class="btn btn-warning"> Buscar</button>
                </div> -->
                <div class="col text-center">
                    <button id="btnRegresar" class="btn btn-secondary"> Regresar </button>
                </div>
                <div class="col text-center">
                    <button id="btnSiguiente" class="btn btn-primary">Siguiente</button>
                </div>
                <div class="col text-center">
                    <button id="btnGuardar" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
</form>

<!--////////////////////////// MODAL IRT///////////////////////////////////////////////////////////////-->
<div class="modal fade" id="Irt" tabindex="-1" aria-labelledby="modalModificarRolLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificarRolLabel">MIEMBRO DEL IRT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="modalIrt">
                    <!-- Otros campos del formulario aquí -->
                    <div class="row mb-3" name="" id="">
                        <div class="col">
                            <label for="inc_catalogo_irt">CATALOGO</label>
                            <input type="text" name="inc_catalogo_irt" id="inc_catalogo_irt" class="form-control"
                                placeholder="Ingrese catalogo" readonly>
                        </div>
                        <div class="col">
                            <label for="per_grado_irt">GRADO</label>
                            <input type="text" name="per_grado_irt" id="per_grado_irt" class="form-control"
                                placeholder="grado" readonly>
                        </div>
                    </div>
                    <div class="row mb-3" name="" id="">
                        <div class="col">
                            <label for="per_nombre_irt">NOMBRE</label>
                            <input type="text" name="per_nombre_irt" id="per_nombre_irt" class="form-control"
                                placeholder="nombre" readonly>
                        </div>
                        <div class="col">
                            <label for="per_plaza_irt">PUESTO</label>
                            <input type="text" name="per_plaza_irt" id="per_plaza_irt" class="form-control"
                                placeholder="puesto" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inc_tel_irt">NO. DE TELEFONO</label>
                            <input type="text" name="inc_tel_irt" id="inc_tel_irt" class="form-control"
                                placeholder="Ingrese No. de Telefono">
                        </div>
                        <div class="col">
                            <label for="inc_email_irt">CORREO ELECTRONICO</label>
                            <input type="email" name="inc_email_irt" id="inc_email_irt" class="form-control"
                                placeholder="Ingrese Email">
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <!-- <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Modificar</button> -->

                </form>
            </div>
        </div>
    </div>
</div>
<!--////////////////////////// MODAL REP///////////////////////////////////////////////////////////////-->
<div class="modal fade" id="Rep" tabindex="-1" aria-labelledby="modalModificarRolLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificarRolLabel">DATOS DE LA PERSONA QUE REPORTA</h5>
            </div>
            <div class="modal-body">
                <form action="" id="modalRep">
                    <div class="col">
                        <label for="inc_catalogo_rep">CATALOGO</label>
                        <input type="text" name="inc_catalogo_rep" id="inc_catalogo_rep" class="form-control"
                            placeholder="Ingrese catalogo">
                    </div>
                    <div class="col">
                        <label for="per_grado_rep">GRADO</label>
                        <input type="text" name="per_grado_rep" id="per_grado_rep" class="form-control"
                            placeholder="grado" readonly>
                    </div>
                    <div class="col">
                        <label for="per_nombre_rep">NOMBRE</label>
                        <input type="text" name="per_nombre_rep" id="per_nombre_rep" class="form-control"
                            placeholder="nombre" readonly>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="per_plaza_rep">PUESTO</label>
                            <input type="text" name="per_plaza_rep" id="per_plaza_rep" class="form-control"
                                placeholder="puesto" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inc_direccion_rep">DIRECCION</label>
                            <input type="text" name="inc_direccion_rep" id="inc_direccion_rep" class="form-control"
                                placeholder="Ingrese direccion del reporte">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inc_tel_rep">NO. DE TELEFONO</label>
                            <input type="text" name="inc_tel_rep" id="inc_tel_rep" class="form-control"
                                placeholder="Ingrese No. de Telefono">
                        </div>
                        <div class="col">
                            <label for="inc_email_rep">CORREO ELECTRONICO</label>
                            <input type="email" name="inc_email_rep" id="inc_email_rep" class="form-control"
                                placeholder="Ingrese Email">
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--////////////////////////// MODAL FECHAS///////////////////////////////////////////////////////////////-->
<div class="modal fade" id="Fechas" tabindex="-1" aria-labelledby="modalModificarRolLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificarRolLabel">DETALLE DE INCIDENTE DE SEGURIDAD</h5>
            </div>
            <div class="modal-body">
                <!-- Otros campos del formulario aquí -->
                <form action="" id="modalFechas">
                <input type="number" name="det_inc_id" id="det_inc_id" class="form-control" hidden>
                <input type="number" name="det_inc_id_incidente" id="det_inc_id_incidente" hidden>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="det_inc_fec_ocurre">FECHA Y HORA DEL INCIDENTE</label>
                            <input type="datetime-local" name="det_inc_fec_ocurre" id="det_inc_fec_ocurre"
                                class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="det_inc_fec_descubre">FECHA Y HORA QUE SE DESCUBRIO EL INCIDENTE</label>
                            <input type="datetime-local" name="det_inc_fec_descubre" id="det_inc_fec_descubre"
                                class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="det_inc_fec_informa">FECHA Y HORA QUE SE INFORMO EL INCIDENTE</label>
                            <input type="datetime-local" name="det_inc_fec_informa" id="det_inc_fec_informa"
                                class="form-control">
                        </div>
                        <div class="row mb-3">
                    <div class="col">
                        <label for="det_inc_estatus">ESTATUS DEL INCIDENTE</label>
                        <select name="det_inc_estatus" id="det_inc_estatus" class="form-control">
                            <option value="">Seleccione Estado...</option>
                            <option value="en curso">EN CURSO</option>
                            <option value="finalizado">FINALIZADO</option>
                        </select>
                    </div>
                </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="btnModificarFecha" class="btn btn-warning"
                        data-bs-dismiss="modal">Modificar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--////////////////////////// MODAL DESCRIPCION///////////////////////////////////////////////////////////////-->
<div class="modal fade" id="Descrip" tabindex="-1" aria-labelledby="modalModificarRolLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificarRolLabel">DESCRIPCION DE INCIDENTES</h5>
            </div>
            <div class="modal-body">
                <form action="" id="modalDescrip">
                    <input type="hidden" name="desc_incidente_id" id="desc_incidente_id2">
                    <input type="hidden" name="desc_id" id="desc_id">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="desc_que">QUE PASO?</label>
                            <textarea type="text" name="desc_que" id="desc_que" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="desc_como">COMO OCURRIO?</label>
                            <textarea type="text" name="desc_como" id="desc_como" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="desc_porque">PORQUE OCURRIO?</label>
                            <textarea type="text" name="desc_porque" id="desc_porque" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="desc_vista">VISTAS INICIALES DE LOS COMPONENTES / ACTIVOS AFECTADOS</label>
                            <textarea type="text" name="desc_vista" id="desc_vista" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="desc_impacto_adv">IMPACTOS ADVERSOS</label>
                            <textarea type="text" name="desc_impacto_adv" id="desc_impacto_adv"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="desc_vulnerabilidad">CUALQUIER VULNERABILIDAD IDENTIFICADA</label>
                            <textarea type="text" name="desc_vulnerabilidad" id="desc_vulnerabilidad"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="btnModificarDescrip" class="btn btn-warning"
                        data-bs-dismiss="modal">Modificar</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!--////////////////////////// MODAL CATEGORIA///////////////////////////////////////////////////////////////-->
<div class="modal fade" id="Categoria" tabindex="-1" aria-labelledby="modalModificarRolLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificarRolLabel">CATEGORIA DEL INCIDENTE</h5>
            </div>
            <div class="modal-body">
                <form id="modalCategoria">
                    <input type="hidden" name="det_categ_id" id="det_categ_id" class="form-control">
                    <input type="hidden" name="det_categ_id_incidente" id="det_categ_id_incidente">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="det_categ_descripcion">TIPO DE INCIDENTE</label>
                            <select name="det_categ_descripcion" id="det_categ_descripcion" class="form-control">
                                <option value="">Seleccione Estado...</option>
                                <option value="sospechoso">SOSPECHOSO</option>
                                <option value="real">REAL</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="det_categoria">CATEGORIA</label>
                            <select name="det_categoria" id="det_categoria" class="form-control">
                                <option value="">Selecione categoria del incidente...</option>
                                <?php foreach ($categorias as $categoria): ?>
                                    <option value="<?= $categoria['cat_inc_id'] ?>">
                                        <?= $categoria['cat_inc_decrip'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="det_categ_observacion">ESPECIFIQUE</label>
                            <textarea type="text" name="det_categ_observacion" id="det_categ_observacion"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="btnModificarCategoria" class="btn btn-warning" data-bs-dismiss="modal">Modificar</button>

                </form>
            </div>
        </div>
    </div>
</div>

<!--////////////////////////////////////////////MODAL DE RESOLUCION///////////////////////////////////////////////////////////////-->

<div class="modal fade" id="Resolucion" tabindex="-1" aria-labelledby="modalModificarRolLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificarRolLabel">RESOLUCION DE INCIDENTE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="col" id="modalResolucion">
                    <input type="number" name="res_inc_id" id="res_inc_id" class="form-control" hidden>
                    <h4 class="modal-title" id="">INICIO DE LA INVESTIGACION DEL INCIDENTE</h4>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="res_fec_inic_inv">FECHA Y HORA DE INICIO</label>
                            <input type="date-local" name="res_fec_inic_inv" id="res_fec_inic_inv" class="form-control"
                                readonly>
                        </div>
                        <div class="col">
                            <label for="res_inc_incidente_id">NO. DE INCIDENTE</label>
                            <input type="text" name="res_inc_incidente_id" id="res_inc_incidente_id"
                                class="form-control">
                        </div>
                    </div>
                    <hr />
                    <h4 class="modal-title" id="">INVESTIGADOR DEL INCIDENTE</h4>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="res_catalogo">CATALOGO</label>
                            <input type="text" name="res_catalogo" id="res_catalogo" class="form-control"
                                placeholder="Ingrese catalogo">
                        </div>
                        <div class="col">
                            <label for="per_grado_invs">GRADO DEL INVESTIGADOR</label>
                            <input type="text" name="per_grado_invs" id="per_grado_invs" class="form-control"
                                placeholder="grado" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="per_nombre_invs">NOMBRE DEL INVESTIGADOR</label>
                            <input type="text" name="per_nombre_invs" id="per_nombre_invs" class="form-control"
                                placeholder="nombre" readonly>
                        </div>
                    </div>
                    <hr />
                    <h4 class="modal-title" id="">FINALIZACION DE LA INVESTIGACION</h4>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="res_fec_fin_inc">FECHA Y HORA INICIO DEL IMPACTO</label>
                            <input type="datetime-local" name="res_fec_fin_inc" id="res_fec_fin_inc"
                                class="form-control">
                        </div>
                        <div class="col">
                            <label for="res_fec_fin_imp">FECHA Y HORA FIN DEL IMPACTO</label>
                            <input type="datetime-local" name="res_fec_fin_imp" id="res_fec_fin_imp"
                                class="form-control">
                        </div>
                        <div class="col">
                            <label for="res_fec_fin_inv">FECHA Y HORA DE FINALIZACION</label>
                            <input type="datetime-local" name="res_fec_fin_inv" id="res_fec_fin_inv"
                                class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="res_referencia">OBSERVACIONES</label>
                            <textarea type="text" name="res_referencia" id="res_referencia"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <hr />
                    <h4 class="modal-title" id="">PERPETRADOR INVOLUCRADO</h4>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="res_perpetrador_id">Tipo de perpetrador</label>
                            <select name="res_perpetrador_id" id="res_perpetrador_id" class="form-control">
                                <option value="">Selecione perpetrador...</option>
                                <?php foreach ($perpetradores as $perpetrador): ?>
                                    <option value="<?= $perpetrador['perp_id'] ?>">
                                        <?= $perpetrador['perp_nombre'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="res_motivo_id">Motivos del perpetrador</label>
                            <select name="res_motivo_id" id="res_motivo_id" class="form-control">
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
                            <label for="res_desc_perpertrador">Descripcion del perpetrador</label>
                            <textarea type="text" name="res_desc_perpertrador" id="res_desc_perpertrador"
                                class="form-control"></textarea>
                        </div>
                        <div class="col">
                            <label for="res_otro">Otros</label>
                            <textarea type="text" name="res_otro" id="res_otro" class="form-control"></textarea>
                        </div>
                    </div>
                    <hr />
                    <h4 class="modal-title" id="">ACCIONES TOMADAS</h4>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="res_acc_tomadas">Accionenes tomadas para resolver el incidente</label>
                            <textarea type="text" name="res_acc_tomadas" id="res_acc_tomadas"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="res_acc_planificadas">Accionenes planificadas para resolver el incidente</label>
                            <textarea type="text" name="res_acc_planificadas" id="res_acc_planificadas"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="res_acc_sobresa">Accionenes sobresalientes</label>
                            <textarea type="text" name="res_acc_sobresa" id="res_acc_sobresa"
                                class="form-control"></textarea>
                        </div>
                    </div>

                    <hr />
                    <h4 class="modal-title" id="">CONCLUSIONES</h4>
                    <div class="row mb-3">
                        <div class="col">
                            <p>Indique si considera que el incidente se concluye como Bajo, Medio,
                                Alto o Critico e incluya una breve justificacion de el porque.</p>
                            <select name="res_conclu_id" id="res_conclu_id" class="form-control">
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
                            <label for="res_justificacion">Justifique la Conclusion</label>
                            <textarea type="text" name="res_justificacion" id="res_justificacion"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <hr />
                    <div class="row mb-3">
                        <div class="col">
                            <h4 class="modal-title" id="">Entidades internas notificadas</h4>
                            <select name="res_inst_interna_id" id="res_inst_interna_id" class="form-control">
                                <option value="">Selecione...</option>
                                <?php foreach ($internas as $interna): ?>
                                    <option value="<?= $interna['ins_int_id'] ?>">
                                        <?= $interna['ins_int_nombre'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col">
                            <h4 class="modal-title" id="">Entidades externas notificadas</h4>
                            <select name="res_inst_externa_id" id="res_inst_externa_id" class="form-control">
                                <option value="">Selecione...</option>
                                <?php foreach ($externas as $externa): ?>
                                    <option value="<?= $externa['ins_ext_id'] ?>">
                                        <?= $externa['ins_ext_nombre'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="res_otro2">Otras entidades internas</label>
                            <textarea type="text" name="res_otro2" id="res_otro2" class="form-control"></textarea>
                        </div>
                        <div class="col">
                            <label for="res_otro3">Otras entidades externas</label>
                            <textarea type="text" name="res_otro3" id="res_otro3" class="form-control"></textarea>
                        </div>
                    </div>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="modalGuardar" class="btn btn-primary">Guardar</button>

                </form>
            </div>
        </div>
    </div>
</div>













<!--////////////////////////////////////////////DATATABLE///////////////////////////////////////////////////////////////-->
<div class="row justify-content-center">
    <div class="col table-responsive">
        <table id="tablaIncidentes" class="table table-bordered table-hover">
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/incidentes/index.js') ?>"></script>