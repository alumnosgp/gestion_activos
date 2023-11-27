const buscar = async () => {
    try {
        const respuesta = await fetch('/endpoint_obtener_datos');
        const data = await respuesta.json();

        if (!data || data.length === 0) {
            Toast.fire({
                title: 'No se encontraron datos válidos',
                icon: 'error'
            });
            return;
        }

        generarPDF(data);
    } catch (error) {
        console.error('Error al obtener los datos:', error);
    }
};

const generarPDF = async (datos) => {
    const url = '/gestion_activos/reporteinc/generarPDF';

    const config = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(datos),
    };

    try {
        const respuesta = await fetch(url, config);

        if (respuesta.ok) {
            const blob = await respuesta.blob();

            if (blob) {
                const urlBlob = window.URL.createObjectURL(blob);
                window.open(urlBlob, '_blank');
            } else {
                console.error('No se pudo obtener el PDF.');
            }
        } else {
            console.error('Error al generar el PDF.');
        }
    } catch (error) {
        console.error('Error al generar el PDF:', error);
    }
};

const btnBuscar = document.getElementById('btnBuscar');
btnBuscar.addEventListener('click', buscar);
