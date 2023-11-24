import { Dropdown } from "bootstrap";
import Swal from "sweetalert2";
import Datatable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";
import { validarFormulario, Toast, confirmacion } from "../funciones";

const formulario = document.getElementById('formularioOffices')
const btnBuscar = document.getElementById('btnBuscar');
const btnModificar = document.getElementById('btnModificar');
const btnGuardar = document.getElementById('btnGuardar');
const btnCancelar = document.getElementById('btnCancelar');
const office_nombre = document.getElementById('off_nombre').value;

btnModificar.disabled = true
btnModificar.parentElement.style.display = 'none'
btnCancelar.disabled = true
btnCancelar.parentElement.style.display = 'none'

let contador = 1;
const datatable = new Datatable('#tablaOffices', {
    language: lenguaje,
    data: null,
    columns: [
        {
            title: 'NO',
            render: () => contador++

        },
        {
            title: 'OFFICE',
            data: 'off_nombre'
        },
        {
            title: 'MODIFICAR',
            data: 'off_id',
            searchable: false,
            orderable: false,
            render: (data, type, row, meta) => `<button class="btn btn-warning" data-id='${data}' data-office='${row.off_nombre}'>Modificar</button>`
        },
        {
            title: 'ELIMINAR',
            data: 'off_id',
            searchable: false,
            orderable: false,
            render: (data, type, row, meta) => `<button class="btn btn-danger" data-id='${data}' >Eliminar</button>`
        },

    ]
})

const buscar = async () => {
    const url = `/gestion_activos/API/offices/buscar?off_nombre=${office_nombre}`;
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
    if (!validarFormulario(formulario, ['off_id'])) {
        Toast.fire({
            icon: 'info',
            text: 'Debe llenar todos los datos'
        });
        return;
    }

    const body = new FormData(formulario);
    body.delete('off_id');
    const url = '/gestion_activos/API/offices/guardar';
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

const eliminar = async (e) => {
    const button = e.target;
    const id = button.dataset.id;
    console.log(id)
    // console.log(id);
    if (await confirmacion('warning', 'Desea elminar este registro?')) {
        const body = new FormData()
        body.append('off_id', id)
        const url = '/gestion_activos/API/offices/eliminar';
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
    if (!validarFormulario(formulario,['off_id'])) {
        alert('Debe llenar todos los campos');
        return
    }
    

    const body = new FormData(formulario)
    for (var pair of body.entries()) {
        console.log(pair[0]+ ', ' + pair[1]); 
    }

    const url = '/gestion_activos/API/offices/modificar';
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

const traeDatos = (e) => {
    const button = e.target;
    const id = button.dataset.id;
    const office = button.dataset.office;

    const dataset = {
        id,
        office
    };

    colocarDatos(dataset);
    const body = new FormData(formulario);
    body.append('off_id', id);
    body.append('off_nombre', office);
};

const colocarDatos = (dataset) => {
    formulario.off_nombre.value = dataset.office
    formulario.off_id.value = dataset.id

    btnModificar.disabled = false;
    btnModificar.parentElement.style.display = '';
    
    btnCancelar.disabled = false;
    btnCancelar.parentElement.style.display = '';
    
    
    btnGuardar.disabled = true;
    btnGuardar.parentElement.style.display = 'none';
};

const cancelarAccion = () => {
    btnGuardar.disabled = false
    btnGuardar.parentElement.style.display = ''
    btnModificar.disabled = true
    btnModificar.parentElement.style.display = 'none'
    btnCancelar.disabled = true
    btnCancelar.parentElement.style.display = 'none'

};

buscar();
formulario.addEventListener('submit', guardar)
// btnBuscar.addEventListener('click', buscar)
datatable.on('click', '.btn-warning', traeDatos)
datatable.on('click', '.btn-danger', eliminar)
btnCancelar.addEventListener('click', cancelarAccion)
btnModificar.addEventListener('click', modificar)