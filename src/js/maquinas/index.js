import { Dropdown } from "bootstrap";
import Swal from "sweetalert2";
import Datatable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";
import { validarFormulario, Toast, confirmacion } from "../funciones";

const formulario = document.getElementById("formularioMaquinas");
const btnModificar = document.getElementById("btnModificar");
const btnGuardar = document.getElementById("btnGuardar");
const btnBuscar = document.getElementById("btnBuscar");
const btnCancelar = document.getElementById("btnCancelar");
const per_catalogo = document.getElementById("maq_per_alta");
const pcivil_catalogo = document.getElementById("maq_per_planilla");
const divPersonalAlta = document.getElementById("perAlta");
const divPersonalPlanilla = document.getElementById("personalPlanilla");
const maq_plazas = document.getElementById("maq_plaza");

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
      data: null,
      render: function (data, type, row, meta) {
        return row.maq_plaza;
      }
    },
    {
      title: "NOMBRE DEL ENCARGADO",
      data: null,
      render: function (data, type, row, meta) {
        return row.maq_per_planilla + ' ' + row.maq_per_alta;
      } 
    },
    {
      title: "RAM",
      data: "maq_ram_capacidad",
    },
    {
      title: "DISCO DURO",
      data: null,
      render: function (data, type, row, meta) {
        return row.maq_disco_capacidad + ' ' + row.maq_tipo_disco_duro;
      }
    },
    {
      title: "PROCESADOR",
      data: "maq_procesador_capacidad",
    },
    {
      title: "SISTEMA OPERATIVO",
      data: "maq_sistema_op",
    },
    {
      title: "OFFICES",
      data: "maq_office",
    },
    {
      title: "ANTIVIRUS",
      data: "maq_antivirus",
    },
    {
      title: "USO",
      data: "maq_uso",
    },
    {
      title: "MODIFICAR",
      data: "maq_id",
      searchable: false,
      orderable: false,
      render: (data, type, row, meta) =>
        `<button class="btn btn-warning" data-id='${data}' data-nombre='${row.maq_nombre}' data-mac='${row.maq_mac}' data-tipo='${row.maq_tipo}' data-plaza='${row.maq_plaza}' data-ram='${row.maq_ram_capacidad}' data-hdd='${row.maq_tipo_disco_duro}' data-disco='${row.maq_disco_capacidad}' data-procesador='${row.maq_procesador_capacidad}' data-sistema='${row.maq_sistema_op}' data-office='${row.maq_office}' data-antivirus='${row.maq_antivirus}' data-uso='${row.maq_uso}'>Modificar</button>`,
    },
    {
      title: "ELIMINAR",
      data: "maq_id",
      searchable: false,
      orderable: false,
      render: (data, type, row, meta) =>
        `<button class="btn btn-danger" data-id='${data}' >Eliminar</button>`,
    },
    {
      title: "Inventario",
      data: "maq_id",
      searchable: false,
      orderable: false,
      render: (data, type, row, meta) => 
        `<button class="btn btn-success" data-id='${data}' data-nombre='${row.maq_nombre}' data-mac='${row.maq_mac}' data-tipo='${row.maq_tipo}' data-plaza='${row.maq_plaza}' data-ram='${row.maq_ram_capacidad}' data-hdd='${row.maq_tipo_disco_duro}' data-disco='${row.maq_disco_capacidad}' data-procesador='${row.maq_procesador_capacidad}' data-sistema='${row.maq_sistema_op}' data-office='${row.maq_office}' data-antivirus='${row.maq_antivirus}' data-uso='${row.maq_uso}'>Imprimir PDF</button>`
    },
  ],
});


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
      console.log(error);
  }
}

const guardar = async (evento) => {
  evento.preventDefault();
  if (!validarFormulario(formulario, ['maq_id','maq_per_alta','per_nombre','maq_plaza','per_grado','per_plaza','maq_per_planilla','pcivil_nombre','pcivil_gradi','pcivil_plaza'])) {
      Toast.fire({
          icon: 'info',
          text: 'Debe llenar todos los datos'
      });
      return;
    }
    const tipoPersonal = formulario.tipoPersonal.value;
    console.log(tipoPersonal)
    if (tipoPersonal === "per_plaza" || tipoPersonal === "pcivil_plaza") {
      formulario.maq_plaza.value = formulario.per_plaza.value || formulario.pcivil_plaza.value;
      console.log(formulario.maq_plaza.value)
    }
  const body = new FormData(formulario);
  body.delete('maq_id');
  for(var pair of body.entries()) {
    console.log(pair[0]+ ', '+ pair[1]); 
 }
  const url = '/gestion_activos/API/maquinas/guardar';
  const headers = new Headers();
  headers.append("X-Requested-With", "fetch");
  const config = {
      method: 'POST',
      body
  };

  try {
      const respuesta = await fetch(url, config);
      const data = await respuesta.json();

      const { codigo, mensaje, detalle } = data;
      let icon = 'info';
      switch (codigo) {
          case 1:
              formulario.reset();
              icon = 'success';
              buscar();
              break;

          case 0:
              icon = 'error';
              console.log(detalle);
              break;

          default:
              break;
      }
      Toast.fire({
          icon,
          text: mensaje
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

      const { codigo, mensaje, detalle } = data;
      let icon = "info";
      switch (codigo) {
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
    const { codigo, mensaje, detalle } = data;
    let icon = "info";
    switch (codigo) {
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
        formulario.per_nombre.value = entregaNombre;
        const entregaGrado = data[0].per_grado;
        formulario.per_grado.value = entregaGrado;
        const entregaPlaza = data[0].per_plaza;
        formulario.per_plaza.value = entregaPlaza;
        formulario.maq_plaza.value= data[0].plaza_id;

      } else {
        formulario.per_nombre.value = "";
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
        formulario.maq_plaza.value= data[0].plaza_id;

        
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
  const mac = button.dataset.mac;
  const tipo = button.dataset.tipo;
  const plaza = button.dataset.plaza;
  const ram = button.dataset.ram;
  const hdd = button.dataset.hdd;
  const disco = button.dataset.disco;
  const procesador = button.dataset.procesador;
  const sistema = button.dataset.sistema;
  const office = button.dataset.office;
  const antivirus = button.dataset.antivirus;
  const uso = button.dataset.uso;

  const dataset = {
    id,
    nombre,
    mac,
    tipo,
    plaza,
    ram,
    hdd,
    disco,
    procesador,
    sistema,
    office,
    antivirus,
    uso

  };

  colocarDatos(dataset);
  const body = new FormData(formulario);
  body.append("maq_id", id);
  body.append("maq_nombre", nombre);
  body.append("maq_mac", mac);
  body.append("maq_tipo", tipo);
  body.append("maq_plaza", plaza);
  body.append("maq_ram_capacidad", ram);
  body.append("maq_tipo_disco_duro", hdd);
  body.append("maq_disco_capacidad", disco);
  body.append("maq_procesador_capacidad", procesador);
  body.append("maq_sistema_op", sistema);
  body.append("maq_office", office);
  body.append("maq_antivirus", antivirus);
  body.append("maq_uso", uso);
};

const colocarDatos = (dataset) => {
  formulario.maq_nombre.value = dataset.nombre;
  formulario.maq_mac.value = dataset.mac;
  formulario.maq_tipo.value = dataset.tipo;
  formulario.maq_plaza.value = dataset.plaza;
  formulario.maq_ram_capacidad.value = dataset.ram;
  formulario.maq_tipo_disco_duro.value = dataset.hdd;
  formulario.maq_disco_capacidad.value = dataset.disco;
  formulario.maq_procesador_capacidad.value = dataset.procesador;
  formulario.maq_sistema_op.value = dataset.sistema;
  formulario.maq_office.value = dataset.office;
  formulario.maq_antivirus.value = dataset.antivirus;
  formulario.maq_uso.value = dataset.uso;
  formulario.maq_id.value = dataset.id;

  btnGuardar.disabled = true;
  btnGuardar.parentElement.style.display = "none";
  btnBuscar.disabled = true
  btnBuscar.parentElement.style.display = "none";
  btnModificar.disabled = false;
  btnModificar.parentElement.style.display = "";
  btnCancelar.disabled = false;
  btnCancelar.parentElement.style.display = "";
};

const cancelarAccion = () => {
  btnGuardar.disabled = false;
  btnGuardar.parentElement.style.display = "";
  btnBuscar.disabled = false
  btnBuscar.parentElement.style.display = "";
  btnModificar.disabled = true;
  btnModificar.parentElement.style.display = "none";
  btnCancelar.disabled = true;
  btnCancelar.parentElement.style.display = "none";
};

/** AQUI EMPIEZA LA ACCION DE IMPRIMER EL INVENTARIO */

const imprimirInventario = async (e) => {
  const button = e.target;
  const id = button.dataset.id;
  if (await confirmacion("warning", "¿Desea imprimir este Inventario?")) {
    const url = `/gestion_activos/pdf?maq_id=${id}`;
    const headers = new Headers();
    headers.append("X-Requested-With", "fetch");
    const config = {
      method: "GET",
      headers,
    };
    try {
      const respuesta = await fetch(url, config);
      if (respuesta.ok) {
        const blob = await respuesta.blob();

        if (blob) {
          const urlBlob = window.URL.createObjectURL(blob);
          window.open(urlBlob, "_blank");
        } else {
          console.error("No se pudo obtener el PDF.");
        }
      } else {
        console.error("Error al generar el PDF.");
      }
    } catch (error) {
      console.error(error);
    }
  }
};

// Suponiendo que aquí es donde se asigna el evento
datatable.on("click", ".btn-success", imprimirInventario);


/* AQUI TERMINA  LA ACCION DE IMPRIMER EL INVENTARIO*/

buscar();
btnGuardar.addEventListener("click", guardar);
datatable.on("click", ".btn-warning", traeDatos);
datatable.on("click", ".btn-danger", eliminar);
btnCancelar.addEventListener("click", cancelarAccion);
btnModificar.addEventListener("click", modificar);
per_catalogo.addEventListener("input", buscarNombres);
pcivil_catalogo.addEventListener("input", buscarPlanillero);