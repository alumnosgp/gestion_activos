import { Dropdown } from "bootstrap";
import Swal from "sweetalert2";
import Datatable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";
import { validarFormulario, Toast, confirmacion } from "../funciones";

const formulario = document.getElementById("formularioMaquinas");
const btnModificar = document.getElementById("btnModificar");
const btnGuardar = document.getElementById("btnGuardar");
const btnCancelar = document.getElementById("btnCancelar");
const per_catalogo = document.getElementById("maq_per_alta");
const pcivil_catalogo = document.getElementById("maq_per_planilla");
const divPersonalAlta = document.getElementById("perAlta");
const divPersonalPlanilla = document.getElementById("personalPlanilla");

//para mantener display los div con los datos de las personas de alta o contratados
divPersonalAlta.style.display = "none";
divPersonalPlanilla.style.display = "none";

//Validaciones del Formulario
btnModificar.disabled = true;
btnModificar.parentElement.style.display = "none";
btnCancelar.disabled = true;
btnCancelar.parentElement.style.display = "none";

let typingTimeout;
let contador = 1;
const datatable = new Datatable("#tablaMaquinas", {
  language: lenguaje,
  data: null,
  columns: [
    {
      title: "NO",
      render: () => contador++,
    },
    {
      title: "OFICINA",
      data: "maq_oficina",
    },
    {
      title: "MAQUINA",
      data: "maq_nombre",
    },
    {
      title: "MAC",
      data: "maq_mac",
    },
    {
      title: "TIPO",
      data: "maq_tipo",
    },
    {
      title: "PLAZA",
      data: "maq_plaza",
    },
    {
      title: "PUESTO",
      data: "maq_per_alta",
    },
    {
      title: "MODIFICAR",
      data: "maq_id",
      searchable: false,
      orderable: false,
      render: (data, type, row, meta) =>
        `<button class="btn btn-warning" data-id='${data}' data-nombre='${row.maq_nombre}'>Modificar</button>`,
    },
    {
      title: "ELIMINAR",
      data: "maq_id",
      searchable: false,
      orderable: false,
      render: (data, type, row, meta) =>
        `<button class="btn btn-danger" data-id='${data}' >Eliminar</button>`,
    },
  ],
});

//evento para seleccional el tipo de persona registrar sea DE ALTA O PLANILLERO
formulario.tipoPersonal.addEventListener("change", function (e) {
  if (e.target.value === "DE ALTA") {
    (divPersonalAlta.style.display = "block"),
      (divPersonalPlanilla.style.display = "none");
  } else if (e.target.value === "CONTRATADO/A") {
    (divPersonalPlanilla.style.display = "block"),
      (divPersonalAlta.style.display = "none");
  } else {
    (divPersonalAlta.style.display = "none"),
      (divPersonalPlanilla.style.display = "none");
  }
});

const buscar = async () => {
    const url = `/gestion_activos/API/maquinas/buscar`;
    const config = {
        method: 'GET'
    }
    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json();
        datatable.clear().draw()
        console.log(data)
        if (data) {
            contador = 1;
            datatable.rows.add(data).draw();
        } else {
            Toast.fire({
                title: 'No se encontraron registros',
                icon: 'info'
            })
        }
    } catch (error) {
        console.log(error);
    }
}

const guardar = async (evento) => {
  evento.preventDefault();
  if (!validarFormulario(formulario, ['maq_id'])) {
      Toast.fire({
          icon: 'info',
          text: 'Debe llenar todos los datos'
      });
      return;
  }

  const body = new FormData(formulario);
  const url = `/gestion_activos/API/maquinas/guardar`;
  const config = {
    method: "POST",
    body,
  };

  try {
    const respuesta = await fetch(url, config);
    const data = await respuesta.text();
    console.log(data);
    return;
    const { id, mensaje, detalle } = data;
    let icon = "info";
    switch (id) {
      case 1:
        formulario.reset();
        (icon = "success"), "mensaje";
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

const eliminar = async (e) => {
  const button = e.target;
  const id = button.dataset.id;
  console.log(id);
  // console.log(id);
  if (await confirmacion("warning", "Desea elminar este registro?")) {
    const body = new FormData();
    body.append("maq_id", id);
    const url = "/gestion_activos/API/maquinas/eliminar";
    const headers = new Headers();
    headers.append("X-Requested-With", "fetch");
    const config = {
      method: "POST",
      body,
    };
    try {
      const respuesta = await fetch(url, config);
      const data = await respuesta.json();
      // console.log(data);
      // return;

      const { id, mensaje, detalle } = data;
      let icon = "info";
      switch (id) {
        case 1:
          // formulario.reset();
          icon = "success";
          buscar();
          // cancelarAccion();
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
  }
};

const modificar = async () => {
  if (!validarFormulario(formulario, ["maq_id"])) {
    alert("Debe llenar todos los campos");
    return;
  }

  const body = new FormData(formulario);
  for (var pair of body.entries()) {
    console.log(pair[0] + ", " + pair[1]);
  }

  const url = "/gestion_activos/API/maquinas/modificar";
  const config = {
    method: "POST",
    body,
  };
  try {
    const respuesta = await fetch(url, config);
    const data = await respuesta.json();
    console.log(data);
    const { id, mensaje, detalle } = data;
    let icon = "info";
    switch (id) {
      case 1:
        formulario.reset();
        icon = "success";
        buscar();
        cancelarAccion();
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

const buscarNombres = async () => {
  let per_catalogo = formulario.maq_per_alta.value;
  clearTimeout(typingTimeout);
  const fetchData = async () => {
    const url = `/gestion_activos/API/maquinas/buscarNombres?maq_per_alta=${per_catalogo}`;
    const config = {
      method: "GET",
    };
    try {
      const respuesta = await fetch(url, config);
      const data = await respuesta.json();
      console.log(data);
      if (data && data.length > 0) {
        const entregaNombre = data[0].per_nombre;
        per_nombre.value = entregaNombre;
        const entregaGrado = data[0].per_grado;
        per_grado.value = entregaGrado;
        const entregaPlaza = data[0].per_plaza;
        per_plaza.value = entregaPlaza;
      } else {
        per_nombre.value = "";
        Toast.fire({
          icon: "info",
          title: "Ingrese un catálogo válido.",
        });
        formulario.maq_per_alta.value = "";
        formulario.per_nombre.value = "";
        formulario.per_grado.value = "";
        formulario.per_plaza.value = "";
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
  typingTimeout = setTimeout(fetchData, 2500);
};

const buscarPlanillero = async () => {
  let pcivil_catalogo = formulario.maq_per_planilla.value;
  clearTimeout(typingTimeout);
  const fetchData = async () => {
    const url = `/gestion_activos/API/maquinas/buscarPlanillero?maq_per_planilla=${pcivil_catalogo}`;
    const config = {
      method: "GET",
    };
    try {
      const respuesta = await fetch(url, config);
      const data = await respuesta.json();
      console.log(data);
      if (data && data.length > 0) {
        const entregaNombrePlani = data[0].pcivil_nombre;
        pcivil_nombre.value = entregaNombrePlani;
        const entregaGradoPlani = data[0].pcivil_gradi;
        pcivil_gradi.value = entregaGradoPlani;
        const entregaPlazaPlani = data[0].pcivil_plaza;
        pcivil_plaza.value = entregaPlazaPlani;
        // formulario.maq_per_planilla.value  = data[0].pcivil_catalogo
      } else {
        pcivil_nombre.value = "";
        Toast.fire({
          icon: "info",
          title: "Ingrese un catálogo válido.",
        });
        formulario.maq_per_planilla.value.value = "";
        formulario.pcivil_nombre.value = "";
        formulario.pcivil_gradi.value = "";
        formulario.pcivil_plaza.value = "";
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
  typingTimeout = setTimeout(fetchData, 2500);
};

const traeDatos = (e) => {
  const button = e.target;
  const id = button.dataset.id;
  const nombre = button.dataset.nombre;

  const dataset = {
    id,
    nombre,
  };

  colocarDatos(dataset);
  const body = new FormData(formulario);
  body.append("maq_id", id);
  body.append("maq_nombre", nombre);
};

const colocarDatos = (dataset) => {
  formulario.maq_nombre.value = dataset.nombre;
  formulario.maq_id.value = dataset.id;

  btnGuardar.disabled = true;
  btnGuardar.parentElement.style.display = "none";
  btnModificar.disabled = false;
  btnModificar.parentElement.style.display = "";
  btnCancelar.disabled = false;
  btnCancelar.parentElement.style.display = "";
};

const cancelarAccion = () => {
  btnGuardar.disabled = false;
  btnGuardar.parentElement.style.display = "";
  btnModificar.disabled = true;
  btnModificar.parentElement.style.display = "none";
  btnCancelar.disabled = true;
  btnCancelar.parentElement.style.display = "none";
};

buscar();
btnGuardar.addEventListener("click", guardar);
datatable.on("click", ".btn-warning", traeDatos);
datatable.on("click", ".btn-danger", eliminar);
btnCancelar.addEventListener("click", cancelarAccion);
btnModificar.addEventListener("click", modificar);
per_catalogo.addEventListener("input", buscarNombres);
pcivil_catalogo.addEventListener("input", buscarPlanillero);
