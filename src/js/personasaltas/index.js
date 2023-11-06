import { Dropdown } from "bootstrap";
import Swal from "sweetalert2";
import Datatable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";
import { validarFormulario, Toast, confirmacion } from "../funciones";

const formulario = document.getElementById('formularioPersonas')
const btnBuscar = document.getElementById('btnBuscar');
const btnModificar = document.getElementById('btnModificar');
const btnGuardar = document.getElementById('btnGuardar');
const btnCancelar = document.getElementById('btnCancelar');
const perso_nombre = document.getElementById('per_nombre').value;

btnModificar.disabled = true
btnModificar.parentElement.style.display = 'none'
btnCancelar.disabled = true
btnCancelar.parentElement.style.display = 'none'

let contador = 1;
const datatable = new Datatable('#tablaPersonas', {
    language: lenguaje,
    data: null,
    columns: [
        {
            title: 'NO',
            render: () => contador++

        },
        {
            title: 'NOMBRE',
            data: 'per_nombre'
        },
        {
            title: 'APELLIDO',
            data: 'per_apellido'
        },
        {
            title: 'CATALOGO',
            data: 'per_catalogo'
        },
        {
            title: 'GRADO',
            data: 'grado_descr'
        },
        {
            title: 'ARMA',
            data: 'arm_desc'
        },
        {
            title: 'PUESTO',
            data: 'pue_nombre'
        },
        {
            title: 'CONDICION',
            data: 'per_condicion'
        },
        {
            title: 'OFICINA',
            data: 'ofic_nombre'
        },
        {
            title: 'TELEFONO',
            data: 'per_telefono'
        },
        {
            title: 'email',
            data: 'per_email'
        },
        {
            title: 'direccion',
            data: 'per_direccion'
        },
        {
            title: 'MODIFICAR',
            data: 'per_id',
            searchable: false,
            orderable: false,
            render: (data, type, row, meta) => `<button class="btn btn-warning" data-id='${data}' data-nombre='${row.per_nombre}' data-apellido='${row.per_apellido}' data-catalogo='${row.per_catalogo}' data-grado='${row.per_grado}' data-arma='${row.per_arma}' data-puesto='${row.per_puesto}' data-condicion='${row.per_condicion}' data-oficina='${row.per_oficina}' data-telefono='${row.per_telefono}' data-email='${row.per_email}' data-direccion='${row.per_direccion}'>Modificar</button>`
        },
        {
            title: 'ELIMINAR',
            data: 'per_id',
            searchable: false,
            orderable: false,
            render: (data, type, row, meta) => `<button class="btn btn-danger" data-id='${data}' >Eliminar</button>`
        },

    ]
})

const buscar = async () => {
    const url = `/gestion_activos/API/personas/buscar?per_nombre=${perso_nombre}`;
    const config = {
        method: 'GET'
    }
    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json();
        datatable.clear().draw()
        // console.log(data)
        if (data.codigo == 1) {
            contador = 1;
            datatable.rows.add(data.mensaje).draw();
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
    if (!validarFormulario(formulario, ['per_id'])) {
        Toast.fire({
            icon: 'info',
            text: 'Debe llenar todos los datos'
        });
        return;
    }

    const body = new FormData(formulario);
    body.delete('per_id');
    const url = '/gestion_activos/API/personas/guardar';
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
}


const traeDatos = (e) => {
    const button = e.target;
    const id = button.dataset.id;
    const nombre = button.dataset.nombre;
    const apellido = button.dataset.apellido;
    const catalogo = button.dataset.catalogo;
    const grado = button.dataset.grado;
    const arma = button.dataset.arma;
    const puesto = button.dataset.puesto;
    const condicion = button.dataset.condicion;
    const oficina = button.dataset.oficina;
    const telefono = button.dataset.telefono;
    const email = button.dataset.email;
    const direccion = button.dataset.direccion;

    const dataset = {
        id,
        nombre,
        apellido,
        catalogo,
        grado,
        arma,
        puesto,
        condicion,
        oficina,
        telefono,
        email,
        direccion
    };

    colocarDatos(dataset);
    const body = new FormData(formulario);
    body.append('per_id', id);
    body.append('per_nombre', nombre);
    body.append('per_apellido', apellido);
    body.append('per_catalogo', catalogo);
    body.append('per_grado', grado);
    body.append('per_arma', arma);
    body.append('per_puesto', puesto);
    body.append('per_condicion', condicion);
    body.append('per_oficina', oficina);
    body.append('per_telefono', telefono);
    body.append('per_email', email);
    body.append('per_direccion', direccion);
};

const colocarDatos = (dataset) => {
    formulario.per_nombre.value = dataset.nombre
    formulario.per_apellido.value = dataset.apellido
    formulario.per_catalogo.value = dataset.catalogo
    formulario.per_grado.value = dataset.grado
    formulario.per_arma.value = dataset.arma
    formulario.per_puesto.value = dataset.puesto
    formulario.per_condicion.value = dataset.condicion
    formulario.per_oficina.value = dataset.oficina
    formulario.per_telefono.value = dataset.telefono
    formulario.per_email.value = dataset.email
    formulario.per_direccion.value = dataset.direccion
    formulario.per_id.value = dataset.id

    btnModificar.disabled = false;
    btnModificar.parentElement.style.display = '';

    btnCancelar.disabled = false;
    btnCancelar.parentElement.style.display = '';

    btnGuardar.disabled = true;
    btnGuardar.parentElement.style.display = 'none';
};

const eliminar = async (e) => {
    const button = e.target;
    const id = button.dataset.id;
    console.log(id)
    // console.log(id);
    if (await confirmacion('warning', 'Desea elminar este registro?')) {
        const body = new FormData()
        body.append('per_id', id)
        const url = '/gestion_activos/API/personas/eliminar';
        const headers = new Headers();
        headers.append("X-Requested-With", "fetch");
        const config = {
            method: 'POST',
            body
        }
        try {
            const respuesta = await fetch(url, config)
            const data = await respuesta.json();
            // console.log(data);
            // return;
            const { codigo, mensaje, detalle } = data;
            let icon = 'info'
            switch (codigo) {
                case 1:
                    // formulario.reset();
                    icon = 'success'
                    buscar();
                    // cancelarAccion();
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

}

const modificar = async () => {
    if (!validarFormulario(formulario,['per_id'])) {
        alert('Debe llenar todos los campos');
        return
    }
    
    const body = new FormData(formulario)
    const url = '/gestion_activos/API/personas/modificar';
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
                cancelarAccion();
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


const cancelarAccion = () => {
    btnGuardar.disabled = false;
    btnGuardar.parentElement.style.display = ''
    btnModificar.disabled = false
    btnModificar.parentElement.style.display = 'none'
    btnCancelar.disabled = false
    btnCancelar.parentElement.style.display = 'none'

};

buscar();
formulario.addEventListener('submit', guardar)
// btnBuscar.addEventListener('click', buscar)
datatable.on('click', '.btn-warning', traeDatos)
datatable.on('click', '.btn-danger', eliminar)
btnCancelar.addEventListener('click', cancelarAccion)
btnModificar.addEventListener('click', modificar)