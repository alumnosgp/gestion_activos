import { Dropdown } from "bootstrap";
import Swal from "sweetalert2";
import Datatable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";
import { validarFormulario, Toast, confirmacion } from "../funciones";

const formulario = document.getElementById('formularioPersonasplanillas');
const btnModificar = document.getElementById('btnModificar');
const btnGuardar = document.getElementById('btnGuardar');
const btnCancelar = document.getElementById('btnCancelar');
const plaId = document.getElementById('pla_id');
// const perso_nombre = document.getElementById('per_nombre');

btnModificar.disabled = true;
btnModificar.parentElement.style.display = 'none';
btnCancelar.disabled = true;
btnCancelar.parentElement.style.display = 'none';

let contador = 1;
const datatable = new Datatable('#tablaPersonasplanillas', {
    language: lenguaje,
    data: null,
    columns: [
        {
            title: 'NO',
            render: function (data, type, row, meta) {
                return contador++;
            }
        },
        {
            title: 'CATALOGO',
            data: 'pcivil_catalogo'
        },
        {
            title: 'DPI',
            data: 'pcivil_dpi'
        },
        {
            title: 'NOMBRE',
            data: null,
            render: function (data, type, row, meta) {
                return row.pcivil_nombre1 + ' ' + row.pcivil_nombre2 + ' ' + row.pcivil_apellido1 + ' ' + row.pcivil_apellido2;
            }
        },
        {
            title: 'GRADO',
            data: 'pcivil_gradi'
        },
        {
            title: 'PLAZA',
            data: 'pla_nombre'
        },
        {
            title: 'TELEFONO',
            data: 'pcivil_telefono'
        },
        {
            title: 'EMAIL',
            data: 'pcivil_emal'
        },
        {
            title: 'DIRECCION',
            data: 'pcivil_direccion'
        },
        {
            title: 'MODIFICAR',
            data: 'pcivil_id',
            searchable: false,
            orderable: false,
            render: function (data, type, row, meta) {
                return `<button class="btn btn-warning" data-id='${data}' data-nombre1='${row.pcivil_nombre1}' data-nombre2='${row.pcivil_nombre2}' data-apellido1='${row.pcivil_apellido1}' data-apellido2='${row.pcivil_apellido2}' data-catalogo='${row.pcivil_catalogo}' data-dpi='${row.pcivil_dpi}' data-grado='${row.pcivil_gradi}' data-plaza='${row.pcivil_plaza}' data-telefono='${row.pcivil_telefono}' data-email='${row.pcivil_emal}' data-direccion='${row.pcivil_direccion}'>Modificar</button>`;
            }
        },
        {
            title: 'ELIMINAR',
            data: 'pcivil_id',
            searchable: false,
            orderable: false,
            render: function (data, type, row, meta) {
                return `<button class="btn btn-danger" data-id='${data}' >Eliminar</button>`;
            }
        },
    ],

});

const buscar = async () => {
    const url = `/gestion_activos/API/personasplanillas/buscar`;
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
    if (!validarFormulario(formulario, ['pcivil_id'])) {
        Toast.fire({
            icon: 'info',
            text: 'Debe llenar todos los datos'
        });
        return;
    }

    const body = new FormData(formulario);
    body.delete('pcivil_id');
    const url = '/gestion_activos/API/personasplanillas/guardar';
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
    const dpi = button.dataset.dpi;
    const plaza = button.dataset.plaza;
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
        dpi,
        plaza,
        telefono,
        email,
        direccion
    };

    colocarDatos(dataset);
};

const colocarDatos = (dataset) => {
    formulario.pcivil_nombre1.value = dataset.nombre1;
    formulario.pcivil_nombre2.value = dataset.nombre2;
    formulario.pcivil_apellido1.value = dataset.apellido1;
    formulario.pcivil_apellido2.value = dataset.apellido2;
    formulario.pcivil_catalogo.value = dataset.catalogo;
    formulario.pcivil_gradi.value = dataset.grado;
    formulario.pcivil_dpi.value = dataset.dpi;
    formulario.pcivil_plaza.value = dataset.plaza;
    formulario.pcivil_telefono.value = dataset.telefono;
    formulario.pcivil_emal.value = dataset.email;
    formulario.pcivil_direccion.value = dataset.direccion;
    formulario.pcivil_id.value = dataset.id;


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
        body.append('pcivil_id', id);
        const url = '/gestion_activos/API/personasplanillas/eliminar';
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
    if (!validarFormulario(formulario, ['pcivil_id'])) {
        alert('Debe llenar todos los campos');
        return;
    }

    const body = new FormData(formulario);
    const url = '/gestion_activos/API/personasplanillas/modificar';
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
