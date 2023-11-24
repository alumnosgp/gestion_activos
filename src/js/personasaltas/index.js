import { Dropdown } from "bootstrap";
import Swal from "sweetalert2";
import Datatable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";
import { validarFormulario, Toast, confirmacion } from "../funciones";

const formulario = document.getElementById('formularioPersonasaltas');
const btnBuscar = document.getElementById('btnBuscar');
const btnModificar = document.getElementById('btnModificar');
const btnGuardar = document.getElementById('btnGuardar');
const btnCancelar = document.getElementById('btnCancelar');
// const perso_nombre = document.getElementById('per_nombre');

btnModificar.disabled = true;
btnModificar.parentElement.style.display = 'none';
btnCancelar.disabled = true;
btnCancelar.parentElement.style.display = 'none';

let contador = 1;
const datatable = new Datatable('#tablaPersonasaltas', {
    language: lenguaje,
    data: null,
    columns: [
        {
            title: 'NO',
            render: () => contador++
        },
        {
            title: 'CATALOGO',
            data: 'per_catalogo'
        },
        {
            title: 'NOMBRE',
            data: null,
            render: function (data, type, row, meta) {
                // Combina los valores de las columnas en una sola columna
                return row.per_nombre1 + ' ' + row.per_nombre2  + ' ' + row.per_apellido1 + ' ' + row.per_apellido2;
            }
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
            data: 'pla_nombre'
        },
        {
            title: 'TELEFONO',
            data: 'per_telefono'
        },
        {
            title: 'EMAIL',
            data: 'per_email'
        },
        {
            title: 'DIRECCION',
            data: 'per_direccion'
        },
        {
            title: 'MODIFICAR',
            data: 'per_id',
            searchable: false,
            orderable: false,
            render: (data, type, row, meta) => `<button class="btn btn-warning" data-id='${data}' data-nombre1='${row.per_nombre1}' data-nombre2='${row.per_nombre2}' data-apellido1='${row.per_apellido1}' data-apellido2='${row.per_apellido2}' data-catalogo='${row.per_catalogo}' data-grado='${row.per_grado}' data-arma='${row.per_arma}' data-puesto='${row.per_plaza}' data-telefono='${row.per_telefono}' data-email='${row.per_email}' data-direccion='${row.per_direccion}'>Modificar</button>`
        },
        {
            title: 'ELIMINAR',
            data: 'per_id',
            searchable: false,
            orderable: false,
            render: (data, type, row, meta) => `<button class="btn btn-danger" data-id='${data}' >Eliminar</button>`
        },
    ]
});

const buscar = async () => {
    const url = `/gestion_activos/API/personasaltas/buscar`;
    const config = {
        method: 'GET'
    };
    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        datatable.clear().draw();
        if (data.codigo == 1) {
            contador = 1;
            datatable.rows.add(data.mensaje).draw();
        } else {
            Toast.fire({
                title: 'No se encontraron registros',
                icon: 'info'
            });
        }
    } catch (error) {
        console.log(error);
    }
};

const guardar = async (evento) => {
    evento.preventDefault();
    if (!validarFormulario(formulario, ['per_id', 'per_nombre2', 'per_apellido2'])) {
        Toast.fire({
            icon: 'info',
            text: 'Debe llenar todos los datos'
        });
        return;
    }

    const body = new FormData(formulario);
    body.delete('per_id');
    const url = '/gestion_activos/API/personasaltas/guardar';
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

const traeDatos = (e) => {
    const button = e.target;
    const id = button.dataset.id;
    const nombre1 = button.dataset.nombre1;
    const nombre2 = button.dataset.nombre2;
    const apellido1 = button.dataset.apellido1;
    const apellido2 = button.dataset.apellido2;
    const catalogo = button.dataset.catalogo;
    const grado = button.dataset.grado;
    const arma = button.dataset.arma;
    const puesto = button.dataset.puesto;
    const telefono = button.dataset.telefono;
    const email = button.dataset.email;
    const direccion = button.dataset.direccion;

    const dataset = {
        id,
        nombre1,
        nombre2,
        apellido1,
        apellido2,
        catalogo,
        grado,
        arma,
        puesto,
        telefono,
        email,
        direccion
    };

    colocarDatos(dataset);
};

const colocarDatos = (dataset) => {
    formulario.per_nombre1.value = dataset.nombre1;
    formulario.per_nombre2.value = dataset.nombre2;
    formulario.per_apellido1.value = dataset.apellido1;
    formulario.per_apellido2.value = dataset.apellido2;
    formulario.per_catalogo.value = dataset.catalogo;
    formulario.per_grado.value = dataset.grado;
    formulario.per_arma.value = dataset.arma;
    formulario.per_plaza.value = dataset.puesto;
    formulario.per_telefono.value = dataset.telefono;
    formulario.per_email.value = dataset.email;
    formulario.per_direccion.value = dataset.direccion;
    formulario.per_id.value = dataset.id;

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

    if (await confirmacion('warning', '¿Desea eliminar este registro?')) {
        const body = new FormData();
        body.append('per_id', id);
        const url = '/gestion_activos/API/personasaltas/eliminar';
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
};

const modificar = async () => {
    if (!validarFormulario(formulario, ['per_id', 'per_nombre2', 'per_apellido2'])) {
        alert('Debe llenar todos los campos');
        return;
    }

    const body = new FormData(formulario);
    const url = '/gestion_activos/API/personasaltas/modificar';
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
                cancelarAccion();
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

const cancelarAccion = () => {
    btnGuardar.disabled = false;
    btnGuardar.parentElement.style.display = ''
    btnModificar.disabled = false
    btnModificar.parentElement.style.display = 'none'
    btnCancelar.disabled = false
    btnCancelar.parentElement.style.display = 'none'

};

buscar();
formulario.addEventListener('submit', guardar);
datatable.on('click', '.btn-warning', traeDatos);
datatable.on('click', '.btn-danger', eliminar);
btnCancelar.addEventListener('click', cancelarAccion);
btnModificar.addEventListener('click', modificar);
