import { validarFormulario, Toast } from "../funciones";

const formLogin = document.querySelector('form');

try {
    // Código que puede generar un error
    throw new Error("Este es un error de ejemplo");
  } catch (error) {
    // Captura el error y muestra un mensaje
    console.error(error);
  }
  


const login = async e => {
    e.preventDefault();

    if (!validarFormulario(formLogin)) {
        Toast.fire({
            icon: 'info',
            title: 'Debe llenar todos los campos'
        });
        return;
    }

    try {
        const url = "/gestion_activos/API/login"; 

        const body = new FormData(formLogin);

        const headers = new Headers();
        headers.append("X-Requested-With", "fetch");

        const config = {
            method: 'POST',
            headers,
            body
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();

        const {codigo, mensaje, redireccion} = data;
        let icon = 'info';
        if(codigo == 1){
            icon = 'success'
            window.location.href = redireccion

            ///SE AGREGO ESTA ESTRUCTURA DE CODIGO PARA REDIRECCIONAR AL MENU
        if (redireccion) {
             window.location.href = redireccion;
            return;
        }


        }else if(codigo == 2){
            icon = 'warning'
        }else{
            icon = 'error'
        }

        Toast.fire({
            title : mensaje,
            icon
        })
      
    } catch (error) {
        console.log(error);
    }
}

formLogin.addEventListener('submit', login);