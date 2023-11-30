<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zziy2YFZ5rPqFMPPpjBRBoxDx2PbAKL3LO9QGHvZ56z25UNR/lvO+ebBqISQSmF5" crossorigin="anonymous">
    <title>REPORTE DE INCIDENTE</title>

    <head>
        <style>
            /* Estilos que proporcionaste */
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f5f5f5;
                margin: 0;
                padding: 0;
            }

            thead {
                display: table-header-group;
            }

            /* Estilos para el encabezado que se ocultará en las páginas siguientes */
            tbody {
                display: table-row-group;
            }


            /* ... (Estilos anteriores) ... */

            /* Estilos nuevos para la tabla */
            .invoice {
                width: 100%;
                font-size: 14px;
                border-collapse: solid;
                margin-bottom: 10px;
            }

            .invoice th,
            .invoice td {
                border: 1px solid #e0e0e0;
                padding: 10px;
                text-align: left;
            }

            .invoice th {
                background-color: #3498db;
                /* Cambia este valor a tu color azul preferido */
                font-weight: bold;
                color: #fff;
                /* Cambia este valor al color del texto que desees */
            }

            /* COLORES ENTRE LAS LINEAS  AZULES*/
            .invoice tbody tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            .invoice tbody tr:hover {
                background-color: #e0e0e0;
            }

            /* Estilos para la fila de descripción del incidente Y color azul entre las lineas  */
            .description-row {
                background-color: #f2f2f2;
                font-weight: bold;
                color: #343a40;
            }

            .description-row td {
                padding: 8px;
                text-align: left;
                font-size: 15px;
                border: 3px solid #dee2e6;
            }

            /* Estilos para centrar los títulos en la hoja de impresión */
            @media print {

                .invoice-header,
                .company-info {
                    text-align: center;
                    margin-bottom: 05px;
                    /* Puedes ajustar el margen según sea necesario */
                }

                .company-info p {
                    margin: 0;
                    /* Elimina los márgenes de los párrafos */
                }

                @media print {
                    thead {
                        display: table-header-group;
                    }
                }
            }


                /* .signature-recibi-entregue {
                    float: left;
                    width: 30%; }

                .signature-entregue {
                    float: right;
                width: 30%;
                 } */

            .signature-section {
                text-align: center;
                margin-top: 100px;
            }

            .signature-line {
                border-top: 2px solid #000;
                margin: 50px;
                width: 80%;
            }

            .signature-name {
                font-size: 0.7em;
                text-align: center;
                color: #333;
            }

            .firma {
                font-size: 0.9em;
                text-align: center;
                font-weight: bold;
                /* Hacerlo negrita */
                color: #333;
            }

            .signature-responsable {
                display: block;
                margin: 100px auto;
                width: 60%;
                /* Ancho igual al de los otros bloques de firma para alineación */
                color: #333;
            }
            #encabezado {
                font-size: 28px; /* Puedes ajustar el tamaño según tu preferencia */
                color: white; /* Puedes ajustar el color según tu preferencia */
                /* Otros estilos que desees aplicar */
            }
        </style>
    </head>

<body>

    <div style="text-align:center;">
        <img src="./images/ciber.jpg" alt="Descripción de la imagen" style="width: 100px; height: auto; margin-top: 10px;">
    </div>
    <!-- Información de los Inventarios -->
    <div style="text-align: center;">
        <div class="company-info">
            <!-- <h1 class="company-name">EJÉRCITO DE GUATEMALA</h1> -->
            <p class="company-name">Comando de Informatica y Tecnología</p>
            <p>Teléfono: (123) 456-7890</p>
            <p>Email: info@ciberseguridad.com</p>
            <p class="company-address">12 Ave. Zona - 13, Ciudad de Guatemala, Código Postal 12345</p>
        </div>
    </div>
        
    <table class="invoice">
        <tbody>
            <tr>
                <th colspan="12" style="text-align: center;">
                    <h1 id="encabezado">INFORME DE INCIDENTE DE SEGURIDAD INFORMATICA</h1>
                </th>
            </tr>
            <tr>
                <td class="description-row">FECHA INCIDENTE:</td>
                <td>
                    <?= $incidente['inc_fecha'] ?>
                </td>
                <td class="description-row">Num. INCIDENTE:</td>
                <td>
                    <?= $incidente['inc_no_incidente'] ?>
                </td>
                <td class="description-row">Num. INCIDENTE RELACIONADO:</td>
                <td>
                    <?= $incidente['inc_no_identificacion'] ?>
                </td>
            </tr>
            <tr>
                <th colspan="12" style="text-align: center;">
                    <h1>PERSONA DEL IRT</h1>
                </th>
            </tr>
            <tr>
                <td class="description-row">CATALOGO:</td>
                <td>
                    <?= $incidente['inc_catalogo_irt'] ?>
                </td>
                <td class="description-row">GRADO:</td>
                <td>
                    <?= $incidente['per_grado_irt'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">NOMBRE:</td>
                <td>
                    <?= $incidente['per_nombre_irt'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">PUESTO:</td>
                <td>
                    <?= $incidente['per_plaza_irt'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">CORREO ELECTRONICO:</td>
                <td>
                    <?= $incidente['inc_email_irt'] ?>
                </td>
                <td class="description-row">NUMERO TELEFONICO:</td>
                <td>
                    <?= $incidente['inc_tel_irt'] ?>
                </td>
            </tr>
            <tr>
                <th colspan="12" style="text-align: center;">
                    <h1>PERSONA QUE REPORTO EL INCIDENTE</h1>
                </th>
            </tr>
            <tr>
                <td class="description-row">CATALOGO:</td>
                <td>
                    <?= $incidente['inc_catalogo_rep'] ?>
                </td>
                <td class="description-row">GRADO:</td>
                <td>
                    <?= $incidente['per_grado_rep'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">NOMBRE:</td>
                <td>
                    <?= $incidente['per_nombre_rep'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">PUESTO:</td>
                <td>
                    <?= $incidente['per_plaza_rep'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">CORREO ELECTRONICO:</td>
                <td>
                    <?= $incidente['inc_email_rep'] ?>
                </td>
                <td class="description-row">NUMERO TELEFONICO:</td>
                <td>
                    <?= $incidente['inc_tel_rep'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">DIRECCION:</td>
                <td>
                    <?= $incidente['inc_direccion_rep'] ?>
                </td>
            </tr>
            <tr>
                <th colspan="12" style="text-align: center;">
                    <h1>DESCRIPCION DEL INCIDENTE DE SEGURIDAD</h1>
                </th>
            </tr>
            <tr>
                <td class="description-row">QUE PASO?</td>
                <td>
                    <?= $incidente['desc_que'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">COMO OCURRIO?</td>
                <td>
                    <?= $incidente['desc_como'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">PORQUE OCURRIO?</td>
                <td>
                    <?= $incidente['desc_porque'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">VISTAS INICIALES EN LOS COMPONENTES/ACTIVOS AFECTADOS</td>
                <td>
                    <?= $incidente['desc_vista'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">IMPACTOS ABVERSOS</td>
                <td>
                    <?= $incidente['desc_impacto_adv'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">VULNERABILIDAD IDENTIFICADA</td>
                <td>
                    <?= $incidente['desc_vulnerabilidad'] ?>
                </td>
            </tr>
            <tr>
                <th colspan="12" style="text-align: center;">
                    <h1>DETALLE DEL INCIDENTE DE SEGURIDAD</h1>
                </th>
            </tr>
            <tr>
                <td class="description-row">Fecha y hora en que ocurrio el incidente:</td>
                <td>
                    <?= $incidente['det_inc_fec_ocurre'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Fecha y hora en que se descubrio el incidente:</td>
                <td>
                    <?= $incidente['det_inc_fec_descubre'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Fecha y hora en que se informo el incidente:</td>
                <td>
                    <?= $incidente['det_inc_fec_informa'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Se ha finalizado el incidente?</td>
                <td>
                    <?= $incidente['det_inc_estatus'] ?>
                </td>
            </tr>
            <tr>
                <th colspan="12" style="text-align: center;">
                    <h1>CATEGORIA DE INCIDENTES DE SEGURIDAD</h1>
                </th>
            </tr>
            <tr>
                <td class="description-row">TIPO DEINCIDENTE:</td>
                <td>
                    <?= $incidente['det_categ_descripcion'] ?>
                </td>
                <td class="description-row">CATEGORIA DEL INCIDENTE:</td>
                <td>
                    <?= $incidente['det_categoria'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">JUSTIFICACION DE LA CATEGORIA Y TIPO DEL INCIDENTE:</td>
                <td>
                    <?= $incidente['det_categ_observacion'] ?>
                </td>
            </tr>
            <tr>
                <th colspan="12" style="text-align: center;">
                    <h1>COMPONENTES ACTIVOS AFECTADOS</h1>
                </th>
            </tr>
            <tr>
                <td class="description-row">COMPONENTE AFECTADO:</td>
                <td>
                    <?= $incidente['det_comp_act_componente_id'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">ESPECIFIQUE EL COMPONENTE AFECTADO:</td>
                <td>
                    <?= $incidente['det_comp_act_descripcion'] ?>
                </td>
            </tr>
            <tr>
                <th colspan="12" style="text-align: center;">
                    <h1>EFECTOS DEL INCIDENTE/IMPACTO ADVERSO</h1>
                </th>
            </tr>
            <tr>
                <td class="description-row">TIPO DE EFECTO:</td>
                <td>
                    <?= $incidente['det_efct_tipo'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">PONDERACION:</td>
                <td>
                    <?= $incidente['det_efct_valor'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">IMPACTO:</td>
                <td>
                    <?= $incidente['det_efct_impacto'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">COSTO:</td>
                <td>
                    <?= $incidente['det_efct_costo'] ?>
                </td>
                <td class="description-row">OBSERVACIONES:</td>
                <td>
                    <?= $incidente['det_efct_observacion'] ?>
                </td>
            </tr>
            <tr>
                <th colspan="12" style="text-align: center;">
                    <h1>RESOLUCION DE INCIDENTE</h1>
                </th>
            </tr>
            <tr>
                <td class="description-row">Fecha y hora de inicio d ela investigacion:</td>
                <td>
                    <?= $incidente['res_fec_inic_inv'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Catalogo del investigador:</td>
                <td>
                    <?= $incidente['res_catalogo'] ?>
                </td>
                <td class="description-row">Nombre del investigador:</td>
                <td>
                    <?= $incidente['per_nombre_invs'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">FECHA Y HORA INICIO DEL IMPACTO:</td>
                <td>
                    <?= $incidente['res_fec_fin_inc'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">FECHA Y HORA FIN DEL IMPACTO:</td>
                <td>
                    <?= $incidente['res_fec_fin_imp'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">FECHA Y HORA DE FINALIZACION:</td>
                <td>
                    <?= $incidente['res_fec_fin_inv'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">OBSERVACIONES:</td>
                <td>
                    <?= $incidente['res_referencia'] ?>
                </td>
            </tr>
            <tr>
                <th colspan="12" style="text-align: center;">
                    <h1>PERPETRADOR INVOLUCRADO</h1>
                </th>
            </tr>
            <tr>
                <td class="description-row">Tipo de perpetrador:</td>
                <td>
                    <?= $incidente['res_perpetrador_id'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Descripcion del perpetrador:</td>
                <td>
                    <?= $incidente['res_desc_perpertrador'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Motivos del perpetrador:</td>
                <td>
                    <?= $incidente['res_motivo_id'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Otros:</td>
                <td>
                    <?= $incidente['res_otro'] ?>
                </td>
            </tr>
            <tr>
                <th colspan="12" style="text-align: center;">
                    <h1>ACCIONES</h1>
                </th>
            </tr>
            <tr>
                <td class="description-row">Accionenes tomadas para resolver el incidente:</td>
                <td>
                    <?= $incidente['res_acc_tomadas'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Accionenes planificadas para resolver el incidente:</td>
                <td>
                    <?= $incidente['res_acc_planificadas'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Accionenes sobresalientes:</td>
                <td>
                    <?= $incidente['res_acc_sobresa'] ?>
                </td>
            </tr>
            <tr>
                <th colspan="12" style="text-align: center;">
                    <h1>CONCLUSIONES</h1>
                </th>
            </tr>
            <tr>
                <td class="description-row">Conclusion:</td>
                <td>
                    <?= $incidente['res_conclu_id'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Justificacion de la Conclusion:</td>
                <td>
                    <?= $incidente['res_justificacion'] ?>
                </td>
            </tr>
            <tr>
                <th colspan="12" style="text-align: center;">
                    <h1>ENTIDADES NOTIFICADAS</h1>
                </th>
            </tr>
            <tr>
                <td class="description-row">Entidades internas:</td>
                <td>
                    <?= $incidente['res_inst_interna_id'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Otras entidades internas:</td>
                <td>
                    <?= $incidente['res_otro2'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Entidades externas:</td>
                <td>
                    <?= $incidente['res_inst_externa_id'] ?>
                </td>
            </tr>
            <tr>
                <td class="description-row">Otras entidades externas:</td>
                <td>
                    <?= $incidente['res_otro3'] ?>
                </td>
            </tr>
        </tbody>
    </table>


    <!-- Div para contener los tres pies de firma -->

    <div>
        <div class="signature-section">
            <div class="signature-line"></div>
            <div class="signature-name">
                <?= $incidente['per_grado_invs'] ?>
                <?= $incidente['per_nombre_invs'] ?>
            </div>
            <p class="firma">Encargado de la Accion e investigacion</p>
        </div>
    </div>


</body>

</html>