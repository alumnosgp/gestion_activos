import { Dropdown } from "bootstrap";
import Swal from "sweetalert2";
import Datatable from "datatables.net-bs5";
import { lenguaje  } from "../lenguaje";
import { validarFormulario, Toast, confirmacion } from "../funciones";
import { data } from "jquery";

const formulario = document.querySelector('form');
const btnBuscar = document.getElementById('btnBuscar');

const buscar = async () => {
    const empleado_turno = document.getElementById('empleado_turno').value;

    if (!empleado_turno) {
        Toast.fire({
            title: 'Por favor, seleccione un turno.',
            icon: 'error'
        });
        return;
    }
    const url = `/examen_grupo/API/reportePDF/generar?empleado_turno=${empleado_turno}`;    
    const headers = new Headers();
    headers.append("X-Requested-With", "fetch");
    const config = {
        method: 'GET',
        headers,
    };

    try {
        const respuesta = await fetch(url,config)
        if (respuesta.ok) {
            const blob = await respuesta.blob();

            if (blob) {
                const urlBlob = window.URL.createObjectURL(blob);

                // Abre el PDF en una nueva ventana o pestaña
                window.open(urlBlob, '_blank');
            } else {
                console.error('No se pudo obtener el blob del PDF.');
            }
        } else {
            console.error('Error al generar el PDF.');
        }
    } catch (error) {
        console.error(error);
    }
};


btnBuscar.addEventListener('click', buscar);
