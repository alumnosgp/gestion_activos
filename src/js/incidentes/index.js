import Datatable from "datatables.net-bs5";
import { Dropdown,Modal } from "bootstrap";
import Swal from "sweetalert2";
import { lenguaje } from "../lenguaje";
import { validarFormulario, Toast, confirmacion } from "../funciones";

document.addEventListener("DOMContentLoaded", function () {
  //FORMULARIO INCIDENTES
  const formularioDescrip = document.getElementById(
    "formularioDescripcionincidentes"
  );
  const formularioDetal = document.getElementById(
    "formularioDetalledeincidente"
  );
  const formularioCateg = document.getElementById(
    "formularioCategoriaincidentes"
  );
  const modalParaVerDatos = new Modal(document.getElementById('modalDatos'),{})
  const formularioEfect = document.getElementById("formularioEfectoabverso");
  const formularioComp = document.getElementById("formularioComponentes");
  const formularioInc = document.getElementById("formularioIncidentes");
  const inc_catalogo_irt = document.getElementById("inc_catalogo_irt");
  const inc_catalogo_rep = document.getElementById("inc_catalogo_rep");
  const inc_no_incidente = document.getElementById("inc_no_incidente");
  const formulario = document.getElementById("formTotal");
  const incFecha = document.getElementById("inc_fecha");

  const btnGuardar = document.getElementById("btnGuardar");
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
        title: "DIA",
        data: "grado_descr",
      },
      {
        title: "NO. INCIDENTE",
        data: "grado_descr",
      },
      {
        title: "IRT",
        data: "grado_descr",
        searchable: false,
        orderable: false,
        render: (data, type, row, meta) =>
          `<button class="btn btn-warnind" id="verIrt" data-id='${data}'>VER</button>`,
      },
      {
        title: "REPORTO",
        data: "grado_descr",
        searchable: false,
        orderable: false,
        render: (data, type, row, meta) =>
          `<button class="btn btn-warnind" data-id='${data}'>VER</button>`,
      },
      {
        title: "FECHAS",
        data: "grado_descr",
        searchable: false,
        orderable: false,
        render: (data, type, row, meta) =>
          `<button class="btn btn-warnind" data-id='${data}'>VER</button>`,
      },
      {
        title: "DESCRIPCION",
        data: "grado_descr",
        searchable: false,
        orderable: false,
        render: (data, type, row, meta) =>
          `<button class="btn btn-warnind" data-id='${data}'>VER</button>`,
      },
      {
        title: "CATAGORIA",
        data: "grado_descr",
        searchable: false,
        orderable: false,
        render: (data, type, row, meta) =>
          `<button class="btn btn-warnind" data-id='${data}'>VER</button>`,
      },
      {
        title: "DURACION",
        data: "grado_descr",
        searchable: false,
        orderable: false,
        render: (data, type, row, meta) =>
          `<button class="btn btn-danger" data-id='${data}'>VER</button>`,
      },
  
      {
        title: "ESTADO",
        data: "grado_id",
        searchable: false,
        orderable: false,
        render: (data, type, row, meta) =>
          `<button class="btn btn-danger" data-id='${data}'>VER</button>`,
      },
     
      {
        title: "ACCION",
        data: "grado_id",
        searchable: false,
        orderable: false,
        render: (data, type, row, meta) =>
          `<button class="btn btn-warnind" data-id='${data}'>VER</button>`,
      },
    ],
  });

  const guardar = async (evento) => {
    evento.preventDefault();
    if (
      !validarFormulario(formulario, [
        "inc_id",
        "inc_no_identificacion",
        "desc_id",
        "desc_incidente_id",
        "desc_que",
        "desc_como",
        "desc_porque",
        "desc_vista",
        "desc_impacto_adv",
        "desc_vulnerabilidad",
        "det_inc_id",
        "det_inc_id_incidente",
        "det_inc_fec_ocurre",
        "det_inc_fec_descubre",
        "det_inc_fec_informa",
        "det_inc_estatus",
        "det_categ_id",
        "det_categ_id_incidente",
        "det_categ_descripcion",
        "det_categoria",
        "det_categ_observacion",
        "det_comp_act_id",
        "det_comp_act_inc_id",
        "det_comp_act_componente_id",
        "det_comp_act_descripcion",
        "det_efct_id",
        "det_efec_id_incidente",
        "det_efct_tipo",
        "det_efct_valor",
        "det_efct_impacto",
        "det_efct_costo",
        "det_efct_observacion",
      ])
    ) {
      Toast.fire({
        icon: "info",
        text: "Debe llenar todos los datos",
      });
      return;
    }

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
          // buscar();
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

  // Function to search for incident details based on catalogo_rep
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

  buscarNoInc();
  const abrirModal = async(e)=>{
    modalParaVerDatos.show()
  }

  btnSiguiente.classList.add("w-100", "mx-auto", "mt-3");
  btnRegresar.classList.add("w-100", "mx-auto", "mt-3");
  btnGuardar.classList.add("w-100", "mx-auto", "mt-3");
  datatable.on('click', 'verIrt',abrirModal)
  inc_catalogo_irt.addEventListener("change", buscarDatosPorCatalogoIrt);
  inc_catalogo_rep.addEventListener("change", buscarDatosPorCatalogoRep);
  btnRegresar.addEventListener("click", retrocederFormulario);
  btnSiguiente.addEventListener("click", avanzarFormulario);
  btnGuardar.addEventListener("click", guardar);
});
