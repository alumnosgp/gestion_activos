// import Datatable from "datatables.net-bs5";
import { Dropdown } from "bootstrap";
import Swal from "sweetalert2";
import { lenguaje } from "../lenguaje";
import { validarFormulario, Toast, confirmacion } from "../funciones";

//FORMULARIO INCIDENTES
const formulario = document.getElementById("formularioIncidentes");
const incFecha = document.getElementById('inc_fecha');
const btnGuardar = document.getElementById("btnGuardar");
const inc_catalogo_irt = document.getElementById('inc_catalogo_irt');
const inc_catalogo_rep = document.getElementById('inc_catalogo_rep');
const inc_no_incidente = document.getElementById('inc_no_incidente');

// Mueve la declaración de la función hacia arriba
const establecerFechaActual = () => {
  const fechaHoraActual = new Date();
  
  // Obtiene los componentes de la fecha y hora
  const anio = fechaHoraActual.getFullYear();
  const mes = ('0' + (fechaHoraActual.getMonth() + 1)).slice(-2);
  const dia = ('0' + fechaHoraActual.getDate()).slice(-2);
  const horas = ('0' + fechaHoraActual.getHours()).slice(-2);
  const minutos = ('0' + fechaHoraActual.getMinutes()).slice(-2);

  // Formatea la fecha y hora
  const formatoFechaHora = `${anio}-${mes}-${dia} ${horas}:${minutos}`;

  // Asigna el valor al campo
  incFecha.value = formatoFechaHora;
};

// Llama a la función después de haberla declarado
establecerFechaActual();



const guardar = async (evento) => {
  evento.preventDefault();
  if (!validarFormulario(formulario, ['inc_id', 'inc_no_identificacion'])) {
      Toast.fire({
          icon: 'info',
          text: 'Debe llenar todos los datos'
      });
      return;
    }

  const body = new FormData(formulario);
  body.delete('inc_id');
  for(var pair of body.entries()) {
    console.log(pair[0]+ ', '+ pair[1]); 
 }
  const url = '/gestion_activos/API/incidentes/guardar';
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
              // buscar();
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

const buscarDatosPorCatalogoIrt = async() =>{
  let inc_catalogo_irt = formulario.inc_catalogo_irt.value;
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
      formulario.per_nombre_irt.value = entregaNombre;
      const entregaGrado = data[0].per_grado_irt;
      formulario.per_grado_irt.value = entregaGrado;
      const entregaPlaza = data[0].per_plaza_irt;
      formulario.per_plaza_irt.value = entregaPlaza;
    }else{
      formulario.per_nombre_irt.value = "";
      Toast.fire({ 
        icon: "info",
        title: "Ingrese un catálogo válido."
        });
        formulario.per_nombre_irt.value = "";
        formulario.per_grado_irt.value = "";
        formulario.per_plaza_irt.value = "";
        return;
        }
        } catch (error) {
          console.log(error);
          Toast.fire({
            icon: "error",
            title: "Ocurrió un error al buscar los datos.",
            });
            }
    }

const buscarDatosPorCatalogoRep = async() =>{
  let inc_catalogo_rep = formulario.inc_catalogo_rep.value;
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
      formulario.per_nombre_rep.value = entregaNombreRep;
      const entregaGradoRep = data[0].per_grado_rep;
      formulario.per_grado_rep.value = entregaGradoRep;
      const entregaPlazaRep = data[0].per_plaza_rep;
      formulario.per_plaza_rep.value = entregaPlazaRep;
    }else{
      formulario.per_nombre_rep.value = "";
      Toast.fire({ 
        icon: "info",
        title: "Ingrese un catálogo válido."
        });
        formulario.per_nombre_rep.value = "";
        formulario.per_grado_rep.value = "";
        formulario.per_plaza_rep.value = "";
        return;
        }
        } catch (error) {
          console.log(error);
          Toast.fire({
            icon: "error",
            title: "Ocurrió un error al buscar los datos.",
            });
            }
    }    
const buscar = async () => {

  const url = `/gestion_activos/API/incidentes/buscar`;
  const config = {
      method: 'GET'
  }
  try {
      const respuesta = await fetch(url, config)
      const data = await respuesta.json();
      console.log(data);
  
      // console.log(data)
      if (data && data.length > 0) {

        // incidentes = data;
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
}
buscar();
btnGuardar.addEventListener("click", guardar);
inc_catalogo_irt.addEventListener('change', buscarDatosPorCatalogoIrt);
inc_catalogo_rep.addEventListener('change', buscarDatosPorCatalogoRep);
