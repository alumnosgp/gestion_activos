import Datatable from "datatables.net-bs5";
import { Dropdown, Modal} from "bootstrap";
import Swal from "sweetalert2";
import { lenguaje } from "../lenguaje";
import { validarFormulario, Toast, confirmacion } from "../funciones";


document.addEventListener("DOMContentLoaded", function () {
  //FORMULARIO INCIDENTES
  const formularioDescrip = document.getElementById("formularioDescripcionincidentes");
  const formularioDetal = document.getElementById("formularioDetalledeincidente");
  const formularioCateg = document.getElementById("formularioCategoriaincidentes");
  // const modalParaVerDatos = new Modal(document.getElementById('modalDatos'))
  const formularioEfect = document.getElementById("formularioEfectoabverso");
  const formularioComp = document.getElementById("formularioComponentes");
  const formularioInc = document.getElementById("formularioIncidentes");
  const inc_catalogo_irt = document.getElementById("inc_catalogo_irt");
  const inc_catalogo_rep = document.getElementById("inc_catalogo_rep");
  const res_catalogo = document.getElementById("res_catalogo");
  const inc_no_incidente = document.getElementById("inc_no_incidente");
  const formulario = document.getElementById("formTotal");
  const incFecha = document.getElementById("inc_fecha");
  const modalFecha = document.getElementById("res_fec_inic_inv");
  // const btnVerIrt = document.getElementById("btnVerIrt");
  const modalIrt = document.getElementById("modalIrt");
  const modalRep = document.getElementById("modalRep");
  const modalFechas = document.getElementById("modalFechas");
  const modalDescrip = document.getElementById("modalDescrip");
  const modalCategoria = document.getElementById("modalCategoria");
  const modalResolucion = document.getElementById("modalResolucion");


  const btnGuardar = document.getElementById("btnGuardar");
  const modalGuardar = document.getElementById("modalGuardar");
  const btnModificarDescrip = document.getElementById('btnModificarDescrip');
  const btnModificarCategoria = document.getElementById('btnModificarCategoria');
  const btnSiguiente = document.getElementById("btnSiguiente");
  const btnRegresar = document.getElementById("btnRegresar");

  const formularios = [
    formularioInc,
    formularioDescrip,
    formularioDetal,
    formularioCateg,
    formularioComp,
    formularioEfect,
  ];

  let posicionFormulario = 0;

  formularios.slice(1).forEach((form) => (form.style.display = "none"));
  formularioInc.style.display = "";
  formularioDescrip.style.display = "none";
  formularioDetal.style.display = "none";
  formularioCateg.style.display = "none";
  formularioComp.style.display = "none";
  formularioEfect.style.display = "none";
  btnRegresar.style.display = "none";
  btnGuardar.style.display = "none";

  const mostrarFormulario = (indice) => {
    formularios.forEach((form, index) => {
      form.style.display = index === indice ? "" : "none";
    });

    btnRegresar.style.display = indice > 0 ? "" : "none";
    btnSiguiente.style.display = indice < formularios.length - 1 ? "" : "none";
    btnGuardar.style.display = indice === formularios.length - 1 ? "" : "none";
  };

  const showIncformulario = (e) => {
    e.preventDefault();
    posicionFormulario = 0;
    mostrarFormulario(posicionFormulario);
  };

  const showDescripformulario = (e) => {
    e.preventDefault();
    posicionFormulario = 1;
    mostrarFormulario(posicionFormulario);
  };

  const showDetalFormulario = (e) => {
    e.preventDefault();
    posicionFormulario = 2;
    mostrarFormulario(posicionFormulario);
  };

  const showCategFormulario = (e) => {
    e.preventDefault();
    posicionFormulario = 3;
    mostrarFormulario(posicionFormulario);
  };

  const showCompFormulario = (e) => {
    e.preventDefault();
    posicionFormulario = 4;
    mostrarFormulario(posicionFormulario);
  };

  const showEfectFormulario = (e) => {
    e.preventDefault();
    posicionFormulario = 5;
    mostrarFormulario(posicionFormulario);
  };

  const avanzarFormulario = (e) => {
    e.preventDefault();
    const codigo_incidente = formulario.inc_no_incidente.value;
    console.log(codigo_incidente)

    formulario.inc_no_incidente.value=codigo_incidente
    formulario.desc_incidente_id.value=codigo_incidente
    formulario.det_inc_id_incidente.value=codigo_incidente
    formulario.det_categ_id_incidente.value=codigo_incidente
    formulario.det_comp_act_inc_id.value=codigo_incidente
    formulario.det_efec_id_incidente.value=codigo_incidente
    // formulario.res_inc_incidente_id.value=codigo_incidente

    if (posicionFormulario < formularios.length - 1) {
      posicionFormulario++;
      mostrarFormulario(posicionFormulario);
    }
  };

  const retrocederFormulario = (e) => {
    e.preventDefault();
    if (posicionFormulario > 0) {
      posicionFormulario--;
      mostrarFormulario(posicionFormulario);
    }
  };

  // Mueve la declaración de la función hacia arriba
  const establecerFechaActual = () => {
    const fechaHoraActual = new Date();
    const anio = fechaHoraActual.getFullYear();
    const mes = ("0" + (fechaHoraActual.getMonth() + 1)).slice(-2);
    const dia = ("0" + fechaHoraActual.getDate()).slice(-2);
    const horas = ("0" + fechaHoraActual.getHours()).slice(-2);
    const minutos = ("0" + fechaHoraActual.getMinutes()).slice(-2);
    const formatoFechaHora = `${anio}-${mes}-${dia} ${horas}:${minutos}`;
    incFecha.value = formatoFechaHora;
    modalFecha.value = formatoFechaHora;
  };

  // Llama a la función después de haberla declarado
  establecerFechaActual();

  
  let contador = 1;
  const datatable = new Datatable("#tablaIncidentes", {
    language: lenguaje,
    data: null,
    columns: [
      {
        title: "NO",
        render: () => contador++,
      },
      {
        title: "DIA Y HORA",
        data: "inc_fecha",
      },
      {
        title: "NO. INC",
        data: "inc_no_incidente",
      },
      {
        title: "IRT",
        data: "Irt",
        searchable: false,
        orderable: false,
        render: (data, type, row, meta) => `<button type="button" class="btn btn-primary" id="btnVerIrt" 
        data-id='${data}' data-nombre='${row.per_nombre_irt}' data-grado='${row.per_grado_irt}' 
        data-catalogo='${row.inc_catalogo_irt}' data-telefono='${row.inc_tel_irt}' data-puesto='${row.per_plaza_irt}' 
        data-email='${row.inc_email_irt}' data-bs-toggle="modal" data-bs-target="#Irt">Ver</button>`,
      },
      {
        title: "REPORTO",
        data: "Rep",
        searchable: false,
        orderable: false,
        render: (data, type, row, meta) => `<button type="button" class="btn btn-secondary" id="btnVerRep" 
        data-id1='${data}' data-nombre1='${row.per_nombre_rep}' data-grado1='${row.per_grado_rep}' 
        data-catalogo1='${row.inc_catalogo_rep}' data-telefono1='${row.inc_tel_rep}' data-puesto1='${row.per_plaza_rep}' 
        data-email1='${row.inc_email_rep}' data-direccion1='${row.inc_direccion_rep}' data-bs-toggle="modal" data-bs-target="#Rep">Ver</button>`,
      },
      {
        title: "FECHAS",
        data: "Fechas",
        searchable: false,
        orderable: false,
        render: (data, type, row, meta) => `<button type="button" class="btn btn-info" id="btmVerFecha" 
        data-id2='${data}' data-fechaocu='${row.det_inc_fec_ocurre}' data-fechadescu='${row.det_inc_fec_descubre}' 
        data-fechainf='${row.det_inc_fec_informa}' data-bs-toggle="modal" data-bs-target="#Fechas">Ver</button>`,
      },
      {
        title: "DESCRIP",
        data: "Descrip",
        searchable: false,
        orderable: false,
        render: (data, type, row, meta) => `<button type="button" class="btn btn-dark" id="btnVerDescrip" data-id3='${data}' 
        data-que='${row.desc_que}' data-como='${row.desc_como}' data-porque='${row.desc_porque}' data-vista='${row.desc_vista}' 
        data-impacto='${row.desc_impacto_adv}' data-vulnerabilidad='${row.desc_vulnerabilidad}' data-bs-toggle="modal" data-bs-target="#Descrip">Ver</button>`,
      },
      {
        title: "CATEGORIA",
        data: "Categoria",
        searchable: false,
        orderable: false,
        render: (data, type, row, meta) => 
        `<button type="button" class="btn btn-light" id="btnVerCateg" data-id4='${data}' 
        data-descateg='${row.det_categ_descripcion}' data-detCateg='${row.det_categoria}' 
        data-categOb='${row.det_categ_observacion}' data-bs-toggle="modal" data-bs-target="#Categoria">
        Ver categoria
        </button>`,
      },  
      {
        title: "ESTADO",
        data: null,
        render: () => "<span style='color: red;'>EN PROCESO</span>",
        searchable: false,
        orderable: false,
      },
      {
        title: "ACCION",
        data: "Resolucion",
        searchable: false,
        orderable: false,
        render: (data, type, row, meta) => `<button type="button" class="btn btn-warning" 
        id="btnVerAccion" data-id5='${data}' data-bs-toggle="modal" data-bs-target="#Resolucion">
        Ver
        </button>`,
      },
      {
        title: "Inventario",
        data: "maq_id",
        searchable: false,
        orderable: false,
        render: (data, type, row, meta) => 
          `<button class="btn btn-success" data-id='${data}' data-nombre='${row.maq_nombre}' 
          data-mac='${row.maq_mac}' data-tipo='${row.maq_tipo}' data-plaza='${row.maq_plaza}' 
          data-ram='${row.maq_ram_capacidad}' data-hdd='${row.maq_tipo_disco_duro}' 
          data-disco='${row.maq_disco_capacidad}' data-procesador='${row.maq_procesador_capacidad}'
          data-sistema='${row.maq_sistema_op}' data-office='${row.maq_office}' data-antivirus='${row.maq_antivirus}' 
          data-uso='${row.maq_uso}'>Imprimir PDF</button>`
      },
    ],
  });



    // Function que buscar para el datatable
  const buscar = async () => {
    const url = `/gestion_activos/API/incidentes/buscar`;
    const config = {
        method: 'GET'
    };
    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log(data);
        datatable.clear().draw();
        if (data) {
            contador = 1;
            datatable.rows.add(data).draw();
        } else {
            Toast.fire({
                title: 'No se encontraron registros',
                icon: 'info'
            });
        }
    } catch (error) {
        console.log('Error en la llamada a la API:', error);
    }
  }



    // Function que guardar que omite que se llenen ciertos campos de no contar con ellos
  const guardar = async (evento) => {
    evento.preventDefault();
    // if (!validarFormulario(formulario, [
    //     "inc_id", "inc_no_identificacion", "desc_id", "desc_incidente_id",
    //     "desc_que", "desc_como", "desc_porque", "desc_vista", "desc_impacto_adv",
    //     "desc_vulnerabilidad", "det_inc_id", "det_inc_id_incidente", "det_inc_fec_ocurre",
    //     "det_inc_fec_descubre", "det_inc_fec_informa", "det_inc_estatus", "det_categ_id",
    //     "det_categ_id_incidente", "det_categ_descripcion", "det_categoria", "det_categ_observacion",
    //     "det_comp_act_id", "det_comp_act_inc_id", "det_comp_act_componente_id", "det_comp_act_descripcion",
    //     "det_efct_id", "det_efec_id_incidente", "det_efct_tipo", "det_efct_valor", "det_efct_impacto",
    //     "det_efct_costo", "det_efct_observacion"])) 
    //   {
    //   Toast.fire({
    //     icon: "info",
    //     text: "Debe llenar todos los datos",
    //   });
    //   return;
    // }

    const body = new FormData(formulario);
    body.delete("inc_id");
    for (var pair of body.entries()) {
      console.log(pair[0] + ", " + pair[1]);
    }
    const url = "/gestion_activos/API/incidentes/guardar";

    const headers = new Headers();
    headers.append("X-Requested-With", "fetch");
    const config = {
      method: "POST",
      body,
    };

    try {
      const respuesta = await fetch(url, config);
      const data = await respuesta.json();
      console.log(data);
      const { codigo, mensaje, detalle } = data;
      let icon = "info";
      switch (codigo) {
        case 1:
          formulario.reset();
          icon = "success";
          buscar();
          break;

        case 0:
          icon = "error";
          console.log(detalle);
          break;

        default:
          break;
      }
      Toast.fire({
        icon,
        text: mensaje,
      });
    } catch (error) {
      console.log(error);
    }
  };

  /////////////////////////////////////////////////GUARDAR DEL MODAL//////////////////////////////////////////
  const guardarModal = async (evento) => {
    evento.preventDefault();
    if (!validarFormulario(modalResolucion, ["res_inc_id"])) 
      {
      Toast.fire({
        icon: "info",
        text: "Debe llenar todos los datos",
      });
      return;
    }

    const body = new FormData(modalResolucion);
    body.delete("res_inc_id");
    for (var pair of body.entries()) {
      console.log(pair[0] + ", " + pair[1]);
    }
    const url = "/gestion_activos/API/incidentes/guardarModal";

    const headers = new Headers();
    headers.append("X-Requested-With", "fetch");
    const config = {
      method: "POST",
      body,
    };

    try {
      const respuesta = await fetch(url, config);
      const data = await respuesta.json();
      console.log(data);
      const { codigo, mensaje, detalle } = data;
      let icon = "info";
      switch (codigo) {
        case 1:
          formulario.reset();
          icon = "success";
          buscar();
          break;

        case 0:
          icon = "error";
          console.log(detalle);
          break;

        default:
          break;
      }
      Toast.fire({
        icon,
        text: mensaje,
      });
    } catch (error) {
      console.log(error);
    }
  };

    // Function que busca el catalogo de IRT que reportan catalogo_Irt
  const buscarDatosPorCatalogoIrt = async () => {
    let inc_catalogo_irt = document.getElementById("inc_catalogo_irt").value;
    const url = `/gestion_activos/API/incidentes/buscarDatosPorCatalogoIrt?inc_catalogo_irt=${inc_catalogo_irt}`;
    const config = {
      method: "GET",
    };
    try {
      const respuesta = await fetch(url, config);
      const data = await respuesta.json();
      console.log(data);
      if (data && data.length > 0) {
        const entregaNombre = data[0].per_nombre_irt;
        document.getElementById("per_nombre_irt").value = entregaNombre;
        const entregaGrado = data[0].per_grado_irt;
        document.getElementById("per_grado_irt").value = entregaGrado;
        const entregaPlaza = data[0].per_plaza_irt;
        document.getElementById("per_plaza_irt").value = entregaPlaza;
        const entregaTelefono = data[0].inc_tel_irt;
        document.getElementById("inc_tel_irt").value = entregaTelefono;
        const entregaEmail = data[0].inc_email_irt;
        document.getElementById("inc_email_irt").value = entregaEmail;
      } else {
        document.getElementById("per_nombre_irt").value = "";
        Toast.fire({
          icon: "info",
          title: "Ingrese un catálogo válido.",
        });
        document.getElementById("per_nombre_irt").value = "";
        document.getElementById("per_grado_irt").value = "";
        document.getElementById("per_plaza_irt").value = "";
        document.getElementById("inc_tel_irt").value = "";
        document.getElementById("inc_email_irt").value = "";
        return;
      }
    } catch (error) {
      console.log(error);
      Toast.fire({
        icon: "error",
        title: "Ocurrió un error al buscar los datos.",
      });
    }
  };

  // Function que busca el catalogo de la personas que reportan catalogo_rep
  const buscarDatosPorCatalogoRep = async () => {
    let inc_catalogo_rep = document.getElementById("inc_catalogo_rep").value;
    const url = `/gestion_activos/API/incidentes/buscarDatosPorCatalogoRep?inc_catalogo_rep=${inc_catalogo_rep}`;
    const config = {
      method: "GET",
    };
    try {
      const respuesta = await fetch(url, config);
      const data = await respuesta.json();
      console.log(data);
      if (data && data.length > 0) {
        const entregaNombreRep = data[0].per_nombre_rep;
        document.getElementById("per_nombre_rep").value = entregaNombreRep;
        const entregaGradoRep = data[0].per_grado_rep;
        document.getElementById("per_grado_rep").value = entregaGradoRep;
        const entregaPlazaRep = data[0].per_plaza_rep;
        document.getElementById("per_plaza_rep").value = entregaPlazaRep;
        const entregaTelRep = data[0].inc_tel_rep;
        document.getElementById("inc_tel_rep").value = entregaTelRep;
        const entregaDireccRep = data[0].inc_direccion_rep;
        document.getElementById("inc_direccion_rep").value = entregaDireccRep;
        const entregaEmailRep = data[0].inc_email_rep;
        document.getElementById("inc_email_rep").value = entregaEmailRep;
      } else {
        document.getElementById("per_nombre_rep").value = "";
        Toast.fire({
          icon: "info",
          title: "Ingrese un catálogo válido.",
        });
        document.getElementById("per_nombre_rep").value = "";
        document.getElementById("per_grado_rep").value = "";
        document.getElementById("per_plaza_rep").value = "";
        document.getElementById("inc_tel_rep").value = "";
        document.getElementById("inc_direccion_rep").value = "";
        document.getElementById("inc_email_rep").value = "";
        return;
      }
    } catch (error) {
      console.log(error);
      Toast.fire({
        icon: "error",
        title: "Ocurrió un error al buscar los datos.",
      });
    }
  };


/////////////////////////////buscar catalogo del investigador//////////////
  const buscarCatalogoInv = async () => {
    let res_catalogo = document.getElementById("res_catalogo").value;
    const url = `/gestion_activos/API/incidentes/buscarCatalogoInv?res_catalogo=${res_catalogo}`;
    const config = {
      method: "GET",
    };
    try {
      const respuesta = await fetch(url, config);
      const data = await respuesta.json();
      console.log(data);
      if (data && data.length > 0) {
        const entregaNombreInv = data[0].per_nombre_invs;
        document.getElementById("per_nombre_invs").value = entregaNombreInv;
        const entregaGradoInv = data[0].per_grado_invs;
        document.getElementById("per_grado_invs").value = entregaGradoInv;
      } else {
        document.getElementById("per_nombre_invs").value = "";
        Toast.fire({
          icon: "info",
          title: "Ingrese un catálogo válido.",
        });
        document.getElementById("per_nombre_invs").value = "";
        document.getElementById("per_grado_invs").value = "";
        return;
      }
    } catch (error) {
      console.log(error);
      Toast.fire({
        icon: "error",
        title: "Ocurrió un error al buscar los datos.",
      });
    }
  };

  //aqui la funcion que busca el numero del incidente y lo agrega en el campo designado

  const buscarNoInc = async () => {
    const url = `/gestion_activos/API/incidentes/buscarNoInc`;
    const config = {
      method: "GET",
    };
    try {
      const respuesta = await fetch(url, config);
      const data = await respuesta.json();
      console.log(data);

      if (data && data.length > 0) {
        const incidente = data[0].inc_no_incidente;
        inc_no_incidente.value = incidente;
      } else {
        // Toast.fire({
        //     title: 'No se encontraron registros',
        //     icon: 'info'
      }
    } catch (error) {
      console.log(error);
    }
  };




  ///////////////////////IRT///////////////////////////////////////////////////////////

  const traeDatos = (e) => {
    const button = e.target;
    const id = button.dataset.id;
    // console.log(id)
    const nombre = button.dataset.nombre;
    const grado = button.dataset.grado;
    const catalogo = button.dataset.catalogo;
    const puesto = button.dataset.puesto;
    const email = button.dataset.email;
    const telefono = button.dataset.telefono;
    // console.log(button.dataset.catalogo)

    const dataset = {
      id,
      nombre,
      grado,
      catalogo,
      puesto,
      email,
      telefono
    };
    


    colocarDatos(dataset);
    const body = new FormData(modalIrt);
    body.append("inc_id", id);
    body.append("per_nombre_irt", nombre);
    body.append("per_grado_irt", grado);
    body.append("inc_catalogo_irt", catalogo);
    body.append("per_plaza_irt", puesto);
    body.append("inc_email_irt", email);
    body.append("inc_tel_irt", telefono);
    
  };
  // console.log(colocarDatos);

  const colocarDatos = (dataset) => {
    modalIrt.per_nombre_irt.value = dataset.nombre;
    modalIrt.per_grado_irt.value = dataset.grado;
    modalIrt.inc_catalogo_irt.value = dataset.catalogo;
    modalIrt.per_plaza_irt.value = dataset.puesto;
    modalIrt.inc_email_irt.value = dataset.email;
    modalIrt.inc_tel_irt.value = dataset.telefono;
    modalIrt.inc_id.value = dataset.id;
  };


  const traeDatos1 = (e) => {
    const button = e.target;
    const id1 = button.dataset.id1;
    // console.log(id1)
    const nombre1 = button.dataset.nombre1;
    const grado1 = button.dataset.grado1;
    const catalogo1 = button.dataset.catalogo1;
    const puesto1 = button.dataset.puesto1;
    const email = button.dataset.email;
    const direccion1 = button.dataset.direccion1;
    const telefono1 = button.dataset.telefono1;
    // console.log(button.dataset.catalogo1)

    const dataset = {
      id1,
      nombre1,
      grado1,
      catalogo1,
      puesto1,
      email,
      direccion1,
      telefono1
    };
    


    colocarDatos1(dataset);
    const body = new FormData(modalRep);
    body.append("inc_id", id1);
    body.append("per_nombre_rep", nombre1);
    body.append("per_grado_rep", grado1);
    body.append("inc_catalogo_rep", catalogo1);
    body.append("per_plaza_rep", puesto1);
    body.append("inc_email_rep", email);
    body.append("inc_tel_rep", telefono1);
    body.append("inc_direccion_rep", direccion1);
    
  };
  // console.log(colocarDatos);

  const colocarDatos1 = (dataset) => {
    modalRep.per_nombre_rep.value = dataset.nombre1;
    modalRep.per_grado_rep.value = dataset.grado1;
    modalRep.inc_catalogo_rep.value = dataset.catalogo1;
    modalRep.per_plaza_rep.value = dataset.puesto1;
    modalRep.inc_email_rep.value = dataset.email;
    modalRep.inc_tel_rep.value = dataset.telefono1;
    modalRep.inc_direccion_rep.value = dataset.direccion1;
    modalRep.inc_id.value = dataset.id1;
  };

  const traeDatos2 = (e) => {
    const button = e.target;
    const id2 = button.dataset.id2;
    // console.log(id2)
    const fechaocu = button.dataset.fechaocu;
    const fechadescu = button.dataset.fechadescu;
    const fechainf = button.dataset.fechainf;
    // console.log(button.dataset.fechainf)

    const dataset = {
      id2,
      fechaocu,
      fechadescu,
      fechainf
    };
    


    colocarDatos2(dataset);
    const body = new FormData(modalFechas);
    body.append("inc_id", id2);
    body.append("det_inc_fec_ocurre", fechaocu);
    body.append("det_inc_fec_descubre", fechadescu);
    body.append("det_inc_fec_informa", fechainf);
    
  };
  // console.log(colocarDatos);

  const colocarDatos2 = (dataset) => {
    modalFechas.det_inc_fec_ocurre.value = dataset.fechaocu;
    modalFechas.det_inc_fec_descubre.value = dataset.fechadescu;
    modalFechas.det_inc_fec_informa.value = dataset.fechainf;
    modalFechas.inc_id.value = dataset.id2;
  };


  /////////////////////////////////////////////////descripcion/////////////////////////

  const modificarDescrip = async () => {
    // if (!validarFormulario(formulario,['inc_id'])) {
    //     alert('Debe llenar todos los campos');
    //     return
    // }
    
    const body = new FormData(modalDescrip)
    const url = '/gestion_activos/API/incidentes/modificarDescrip';
    const config = {
        method: 'POST',
        body
    }
    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json();
        console.log(data)
        const { codigo, mensaje, detalle } = data;
        let icon = 'info'
        switch (codigo) {
            case 1:
                formulario.reset();
                icon = 'success'
                buscar();
                break;
            case 0:
                icon = 'error'
                console.log(detalle)
                break;

            default:
                break;
        }

        Toast.fire({
            icon,
            text: mensaje
        })

    } catch (error) {
        console.log(error);
    }
}

  const traeDatos3 = (e) => {
    const button = e.target;
    const id3 = button.dataset.id3;
    // console.log(id3)
    const que = button.dataset.que;
    const como = button.dataset.como;
    const porque = button.dataset.porque;
    const vista = button.dataset.vista;
    const impacto = button.dataset.impacto;
    const vulnerabilidad = button.dataset.vulnerabilidad;
    // console.log(button.dataset.porque)

    const dataset = {
      id3,
      que,
      como,
      porque,
      vista,
      impacto,
      vulnerabilidad
    };
  
    colocarDatos3(dataset);
    const body = new FormData(modalDescrip);
    body.append("inc_id", id3);
    body.append("desc_que", que);
    body.append("desc_como", como);
    body.append("desc_porque", porque);
    body.append("desc_vista", vista);
    body.append("desc_impacto", impacto);
    body.append("desc_vulnerabilidad", vulnerabilidad);
       
  };
  // console.log(colocarDatos);

  const colocarDatos3 = (dataset) => {
    modalDescrip.desc_que.value = dataset.que;
    modalDescrip.desc_como.value = dataset.como;
    modalDescrip.desc_porque.value = dataset.porque;
    modalDescrip.desc_vista.value = dataset.vista;
    modalDescrip.desc_impacto.value = dataset.impacto;
    modalDescrip.desc_vulnerabilidad.value = dataset.vulnerabilidad;
    modalDescrip.inc_id.value = dataset.id3;
  };




   /////////////////////////////////////////////////categoria/////////////////////////

   const modificarCategoria = async () => {
    // if (!validarFormulario(formulario,['inc_id'])) {
    //     alert('Debe llenar todos los campos');
    //     return
    // }
    
    const body = new FormData(modalCategoria)
    const url = '/gestion_activos/API/incidentes/modificarCategoria';
    const config = {
        method: 'POST',
        body
    }
    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json();
        console.log(data)
        const { codigo, mensaje, detalle } = data;
        let icon = 'info'
        switch (codigo) {
            case 1:
                formulario.reset();
                icon = 'success'
                buscar();
                break;
            case 0:
                icon = 'error'
                console.log(detalle)
                break;

            default:
                break;
        }

        Toast.fire({
            icon,
            text: mensaje
        })

    } catch (error) {
        console.log(error);
    }
}
  const traeDatos4 = (e) => {
    const button = e.target;
    const id4 = button.dataset.id4;
    // console.log(id4)
    const descateg = button.dataset.descateg;
    const detCateg = button.dataset.detCateg;
    const categOb = button.dataset.categOb;
    // console.log(button.dataset.categOb)

    const dataset = {
      id4,
      descateg,
      detCateg,
      categOb
    };
  
    colocarDatos4(dataset);
    const body = new FormData(modalCategoria);
    body.append("inc_id", id4);
    body.append("det_categ_descripcion", descateg);
    body.append("det_categoria", detCateg);
    body.append("det_categ_observacion", categOb);
       
  };
  // console.log(colocarDatos);

  const colocarDatos4 = (dataset) => {
    modalCategoria.det_categ_descripcion.value = dataset.descateg;
    modalCategoria.det_categoria.value = dataset.detCateg;
    modalCategoria.det_categ_observacion.value = dataset.categOb;
    modalCategoria.inc_id.value = dataset.id4;
  };
  const traeDatos5 = (e) => {
    const button = e.target;
    const id5 = button.dataset.id5;

    const dataset = {
      id4
    };
  
    colocarDatos5(dataset);
    const body = new FormData(modalResolucion);
    body.append("res_inc_id", id5);
       
  };
  // console.log(colocarDatos);

  const colocarDatos5 = (dataset) => {
    modalResolucion.res_inc_id.value = dataset.id5;
  };
  

  buscarNoInc();
  buscar();


  btnSiguiente.classList.add("w-100", "mx-auto", "mt-3");
  btnRegresar.classList.add("w-100", "mx-auto", "mt-3");
  btnGuardar.classList.add("w-100", "mx-auto", "mt-3");
  // datatable.on('click', '#verIrt', abrirModal)
  inc_catalogo_irt.addEventListener("change", buscarDatosPorCatalogoIrt);
  inc_catalogo_rep.addEventListener("change", buscarDatosPorCatalogoRep);
  res_catalogo.addEventListener("change", buscarCatalogoInv);
  btnRegresar.addEventListener("click", retrocederFormulario);
  btnSiguiente.addEventListener("click", avanzarFormulario);
  btnGuardar.addEventListener("click", guardar);
  datatable.on('click', '#btnVerIrt', traeDatos);
  datatable.on('click', '#btnVerRep', traeDatos1);
  datatable.on('click', '#btmVerFecha', traeDatos2);
  datatable.on('click', '#btnVerDescrip', traeDatos3);
  datatable.on('click', '#btnVerCateg', traeDatos4);
  modalGuardar.addEventListener("click", guardarModal);
  btnModificarDescrip.addEventListener("click", modificarDescrip);
  btnModificarCategoria.addEventListener("click", modificarCategoria);

});
