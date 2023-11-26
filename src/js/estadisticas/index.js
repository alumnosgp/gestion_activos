import { Dropdown } from "bootstrap";
import Chart from "chart.js/auto";
import { Toast } from "../funciones";
import { event } from "jquery";
/* Cambas para las division de los canvas y no genere conflictos */
const canvas = document.getElementById("chartMaquina");
const canvas2 = document.getElementById("chartSoftware");
const canvasAntivirus = document.getElementById("chartAntivirus");
const canvasMaquinas = document.getElementById("chartMaquinas");

const btnActualizar = document.getElementById("btnActualizar");

const context = canvas.getContext("2d");
const context2 = canvas2.getContext("2d");
const contextAntivirus = canvasAntivirus.getContext("2d");
const contextMaquinas = canvasMaquinas.getContext("2d");


/*AQUI INICIA CONFIGURACION DE ESTILOS DE LAS GRAFICA */
const chartMaquina = new Chart(context, {
  type: "pie",
  data: {
    labels: [],
    datasets: [
      {
        label: "Inventario de las SSOO",
        data: [],
        backgroundColor: [],
      },
    ],
  },
  options: {
    indexAxis: "y",
  },
});
/*AQUI LA SEGUNDA CONFIGURACION DE ESTILOS DE LAS GRAFICA */
const chartAntivirus = new Chart(contextAntivirus, {
  type: "doughnut",
  data: {
    labels: [],
    datasets: [
      {
        label: "Inventario de las Antivirus",
        data: [],
        backgroundColor: [],
      },
    ],
  },
  options: {
    indexAxis: "y",
  },
});
/*AQUI LA TERCERA CONFIGURACION DE ESTILOS DE LAS GRAFICA */
const chartSoftware = new Chart(context2, {
  type: "bar",
  data: {
    labels: [],
    datasets: [
      {
        label: "Inventario de Software",
        data: [],
        backgroundColor: [],
      },
    ],
  },
  options: {
    indexAxis: "x",
  },
});

/*AQUI LA CUARTA GRAFICA */
const chartMaquinas = new Chart(contextMaquinas, {
  type: "bar",
  data: {
    labels: [],
    datasets: [
      {
        label: "Inventario de las Maquinas",
        data: [],
        backgroundColor: [],
      },
    ],
  },
  options: {
    indexAxis: "y",
  },
});

/*AQUI TERMINAN LAS FORMATOS DE FORMA DE LAS GRAFICAS */
/****************************************************************************************************************** */
/*AQUI SON LOS DIRECCIONAMIENTOS DE LAS FUNCIONES POR GRAFICAS */
const getEstadisticas = async () => {
  const url = `/gestion_activos/API/estadisticas/buscarDatosEstadistica`;
  const config = {
    method: "GET",
  };

  const request = await fetch(url, config);
  const response = await request.json();
  console.log(response);

  try {
    chartMaquina.data.labels = [];
    chartMaquina.data.datasets[0].data = [];
    chartMaquina.data.datasets[0].backgroundColor = [];

    if (response) {
      response.forEach((registro) => {
        chartMaquina.data.labels.push(registro.maq_sistema_op);
        chartMaquina.data.datasets[0].data.push(registro.cantidad_maquinas);
        chartMaquina.data.datasets[0].backgroundColor.push(getRandomColor());        
      });
      getEstadisticasSoftware();
      getEstadisticasAntivirus();
      getEstadisticasMaquinas();
    } else {
      Toast.fire({
        title: "No se encontraron registros",
        icon: "info",
      });
    }

    chartMaquina.update();
  } catch (error) {
    console.log(error);
  }
};

/* SEGUNDA FUNCION DE DIRECIONAMIENTO */
const getEstadisticasSoftware = async () => {
  const url = `/gestion_activos/API/estadisticas/buscarDatosEstadisticaSoftware`;
  const config = {
    method: "GET",
  };

  const request = await fetch(url, config);
  const response = await request.json();
  console.log(response);

  try {
    chartSoftware.data.labels = [];
    chartSoftware.data.datasets[0].data = [];
    chartSoftware.data.datasets[0].backgroundColor = [];

    if (response) {
      response.forEach((registro) => {
        chartSoftware.data.labels.push(registro.maq_office);
        chartSoftware.data.datasets[0].data.push(registro.cantidad_offices);
        chartSoftware.data.datasets[0].backgroundColor.push(getRandomColor());
      });
      
    } else {
      Toast.fire({
        title: "No se encontraron registros",
        icon: "info",
      });
    }

    chartSoftware.update();
  } catch (error) {
    console.log(error);
  }
};

/* TERCERA FUNCION DE DIRECIONAMIENTO */
const getEstadisticasAntivirus = async () => {
  const url = `/gestion_activos/API/estadisticas/buscarDatosEstadisticaAntivirus`;
  const config = {
    method: "GET",
  };

  const request = await fetch(url, config);
  const response = await request.json();
  console.log(response);

  try {
    chartAntivirus.data.labels = [];
    chartAntivirus.data.datasets[0].data = [];
    chartAntivirus.data.datasets[0].backgroundColor = [];

    if (response) {
      response.forEach((registro) => {
        chartAntivirus.data.labels.push(registro.maq_antivirus);
        chartAntivirus.data.datasets[0].data.push(registro.cantidad_antivirus);
        chartAntivirus.data.datasets[0].backgroundColor.push(getRandomColor());
      });
    } else {
      Toast.fire({
        title: "No se encontraron registros",
        icon: "info",
      });
    }

    chartAntivirus.update();
  } catch (error) {
    console.log(error);
  }
};

/* CUARTO  FUNCION PARA LLAMAR LOS DATOS A LA GRAFICA */
getEstadisticas();
const getEstadisticasMaquinas = async () => {
  const url = `/gestion_activos/API/estadisticas/buscarDatosEstadisticaMaquinas`;
  const config = {
    method: "GET",
    };

    
    // // Llamada a la función para obtener datos del cuarto gráfico después de haber obtenido y procesado los datos de los otros gráficos
   


  const request = await fetch(url, config);
  const response = await request.json();
  console.log(response);

  try {
    chartMaquinas.data.labels = [];
    chartMaquinas.data.datasets[0].data = [];
    chartMaquinas.data.datasets[0].backgroundColor = [];

    if (response) {
      response.forEach((registro) => {
        chartMaquinas.data.labels.push(registro.maq_tipo);
        chartMaquinas.data.datasets[0].data.push(registro.cantidad);
        chartMaquinas.data.datasets[0].backgroundColor.push(getRandomColor());
      });
    } else {
      Toast.fire({
        title: "No se encontraron registros",
        icon: "info",
      });
    }

    chartMaquinas.update();
  } catch (error) {
    console.log(error);
  }
};

const getRandomColor = () => {
  const r = Math.floor(Math.random() * 256);
  const g = Math.floor(Math.random() * 256);
  const b = Math.floor(Math.random() * 256);

  const rgbColor = `rgba(${r},${g},${b},0.5)`;
  return rgbColor;
};

getEstadisticas();

/************************* AQUI TERMINA LOS DIRECCIONAMIENTOS ******************************************** */

btnActualizar.addEventListener("click", getEstadisticas);
