import { Dropdown } from "bootstrap";
import Chart from "chart.js/auto";
import { Toast } from "../funciones";
import { event } from "jquery";
/* Cambas para las division de los canvas y no genere conflictos */
const canvasCategorias = document.getElementById("chartCategorias");
const canvasTipos = document.getElementById("chartTipos");
const canvasPerpetrador = document.getElementById("chartPerpetrador");
const canvasMotivo = document.getElementById("chartMotivo");
const canvasEstado = document.getElementById("chartEstado");
const canvasComponentes = document.getElementById("chartComponentes");
const fechaInicio = document.getElementById("fechaInicio");
const fechaFin = document.getElementById("fechaFin");

const btnActualizar = document.getElementById("btnActualizar");

const contextCategorias = canvasCategorias.getContext("2d");
const contextTipos = canvasTipos.getContext("2d");
const contextPerpetrador= canvasPerpetrador.getContext("2d");
const contextMotivo = canvasMotivo.getContext("2d");
const contextEstado = canvasEstado.getContext("2d");
const contextComponentes = canvasComponentes.getContext("2d");


/*AQUI INICIA CONFIGURACION DE ESTILOS DE LAS GRAFICA */
const chartEstado = new Chart(contextEstado, {
  type: "bar",
  data: {
    labels: [],
    datasets: [
      {
        label: "Tipos de Incidentes",
        data: [],
        backgroundColor: [],
      },
    ],
  },
  options: {
    indexAxis: "x",
  },
});
////////////////////////////////////////////////////////////
const chartCategorias = new Chart(contextCategorias, {
  type: "pie",
  data: {
    labels: [],
    datasets: [
      {
        label: "Tipos de Incidentes",
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
const chartTipos = new Chart(contextTipos, {
  type: "doughnut",
  data: {
    labels: [],
    datasets: [
      {
        label: "Tipos de Incidentes",
        data: [],
        backgroundColor: [],
      },
    ],
  },
  options: {
    indexAxis: "y",
  },
});
/*AQUI INICIA CONFIGURACION DE ESTILOS DE LA 3RA  GRAFICA */
const chartPerpetrador = new Chart(contextPerpetrador, {
  type: "pie",
  data: {
    labels: [],
    datasets: [
      {
        label: "Tipos de Incidentes",
        data: [],
        backgroundColor: [],
      },
    ],
  },
  options: {
    indexAxis: "x",
  },
});
////////////////////////////////////////////////////////////////
const chartComponentes = new Chart(contextComponentes, {
  type: "bar",
  data: {
    labels: [],
    datasets: [
      {
        label: "Tipos de Incidentes",
        data: [],
        backgroundColor: [],
      },
    ],
  },
  options: {
    indexAxis: "x",
  },
});
/*AQUI LA SEGUNDA CONFIGURACION DE ESTILOS DE LA 4TA GRAFICA */
const chartMotivo = new Chart(contextMotivo, {
  type: "bar",
  data: {
    labels: [],
    datasets: [
      {
        label: "Tipos de Incidentes",
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
const buscarEstado = async () => {
  const url = `/gestion_activos/API/estadisticasincidentes/buscarEstado?fechaInicio=${fechaInicio.value}&fechaFin=${fechaFin.value}`;
  const config = {
    method: "GET",
  };

  const request = await fetch(url, config);
  const response = await request.json();
  // console.log(response);

  try {
    chartEstado.data.labels = [];
    chartEstado.data.datasets[0].data = [];
    chartEstado.data.datasets[0].backgroundColor = [];

    if (response) {
      response.forEach((registro) => {
        chartEstado.data.labels.push(registro.descripcion);
        chartEstado.data.datasets[0].data.push(registro.cantidad);
        chartEstado.data.datasets[0].backgroundColor.push(getRandomColor());        
      });
      
    } else {
      Toast.fire({
        title: "No se encontraron registros estados",
        icon: "info",
      });
    }

    chartEstado.update();
  } catch (error) {
    console.log(error);
  }
};
////////////////////////////////////////////////////////////////////////////////////
const getEstadisticas = async () => {
  // console.log(fechaInicio.value)
  // console.log(fechaFin.value)
  const url = `/gestion_activos/API/estadisticasincidentes/buscaCategoriaIncidentes?fechaInicio=${fechaInicio.value}&fechaFin=${fechaFin.value}`;
  const config = {
    method: "GET",
  };

  const request = await fetch(url, config);
  const response = await request.json();
  // console.log(response);

  try {
    chartCategorias.data.labels = [];
    chartCategorias.data.datasets[0].data = [];
    chartCategorias.data.datasets[0].backgroundColor = [];

    if (response) {
      response.forEach((registro) => {
        chartCategorias.data.labels.push(registro.descripcion);
        chartCategorias.data.datasets[0].data.push(registro.cantidad);
        chartCategorias.data.datasets[0].backgroundColor.push(getRandomColor());        
      });
      
    } else {
      Toast.fire({
        title: "No se encontraron registros categorias",
        icon: "info",
      });
    }

    chartCategorias.update();
  } catch (error) {
    console.log(error);
  }
};


////////////////////////////////////////////////////////////////////////////////////
const buscarComponentes = async () => {
  const url = `/gestion_activos/API/estadisticasincidentes/buscarComponentes?fechaInicio=${fechaInicio.value}&fechaFin=${fechaFin.value}`;
  const config = {
    method: "GET",
  };

  const request = await fetch(url, config);
  const response = await request.json();
  // console.log(response);

  try {
    chartComponentes.data.labels = [];
    chartComponentes.data.datasets[0].data = [];
    chartComponentes.data.datasets[0].backgroundColor = [];

    if (response) {
      response.forEach((registro) => {
        chartComponentes.data.labels.push(registro.descripcion);
        chartComponentes.data.datasets[0].data.push(registro.cantidad);
        chartComponentes.data.datasets[0].backgroundColor.push(getRandomColor());        
      });
      
    } else {
      Toast.fire({
        title: "No se encontraron registros de componentes",
        icon: "info",
      });
    }

    chartComponentes.update();
  } catch (error) {
    console.log(error);
  }
};

/* SEGUNDA FUNCION DE DIRECIONAMIENTO */
const getEstadisticasTipos = async () => {
  const url = `/gestion_activos/API/estadisticasincidentes/buscarTipoIncidentes?fechaInicio=${fechaInicio.value}&fechaFin=${fechaFin.value}`;
  const config = {
    method: "GET",
  };

  const request = await fetch(url, config);
  const response = await request.json();
  // console.log(response);

  try {
    chartTipos.data.labels = [];
    chartTipos.data.datasets[0].data = [];
    chartTipos.data.datasets[0].backgroundColor = [];

    if (response) {
      response.forEach((registro) => {
        chartTipos.data.labels.push(registro.descripcion);
        chartTipos.data.datasets[0].data.push(registro.cantidad);
        chartTipos.data.datasets[0].backgroundColor.push(getRandomColor());
      });
      
    } else {
      Toast.fire({
        title: "No se encontraron registros tipos de incidentes",
        icon: "info",
      });
    }

    chartTipos.update();
  } catch (error) {
    console.log(error);
  }
};

const getEstadisticaPerpetrador = async () => {
  const url = `/gestion_activos/API/estadisticasincidentes/buscarPerpetradorIncidentes?fechaInicio=${fechaInicio.value}&fechaFin=${fechaFin.value}`;
  const config = {
    method: "GET",
  };

  const request = await fetch(url, config);
  const response = await request.json();
  // console.log(response);

  try {
    chartPerpetrador.data.labels = [];
    chartPerpetrador.data.datasets[0].data = [];
    chartPerpetrador.data.datasets[0].backgroundColor = [];

    if (response) {
      response.forEach((registro) => {
        chartPerpetrador.data.labels.push(registro.descripcion);
        chartPerpetrador.data.datasets[0].data.push(registro.cantidad);
        chartPerpetrador.data.datasets[0].backgroundColor.push(getRandomColor());        
      });
    } else {
      Toast.fire({
        title: "No se encontraron registros sobre perpetradores",
        icon: "info",
      });
    }

    chartPerpetrador.update();
  } catch (error) {
    console.log(error);
  }
};

/* SEGUNDA FUNCION DE DIRECIONAMIENTO */
const buscarMotivoIncidentes = async () => {
  const url = `/gestion_activos/API/estadisticasincidentes/buscarMotivoIncidentes?fechaInicio=${fechaInicio.value}&fechaFin=${fechaFin.value}`;
  const config = {
    method: "GET",
  };

  const request = await fetch(url, config);
  const response = await request.json();
  console.log(response);

  try {
    chartMotivo.data.labels = [];
    chartMotivo.data.datasets[0].data = [];
    chartMotivo.data.datasets[0].backgroundColor = [];

    if (response) {
      response.forEach((registro) => {
        chartMotivo.data.labels.push(registro.descripcion);
        chartMotivo.data.datasets[0].data.push(registro.cantidad);
        chartMotivo.data.datasets[0].backgroundColor.push(getRandomColor());
      });
      
    } else {
      Toast.fire({
        title: "No se encontraron registros",
        icon: "info",
      });
    }

    chartMotivo.update();
  } catch (error) {
    console.log(error);
  }
};


/* TERCERA FUNCION DE DIRECIONAMIENTO */


/* CUARTO  FUNCION PARA LLAMAR LOS DATOS A LA GRAFICA */
getEstadisticas();
buscarEstado();
buscarComponentes();
getEstadisticasTipos();
getEstadisticaPerpetrador();
buscarMotivoIncidentes();

const getRandomColor = () => {
  const r = Math.floor(Math.random() * 256);
  const g = Math.floor(Math.random() * 256);
  const b = Math.floor(Math.random() * 256);

  const rgbColor = `rgba(${r},${g},${b},0.5)`;
  return rgbColor;
};




/************************* AQUI TERMINA LOS DIRECCIONAMIENTOS ******************************************** */

btnActualizar.addEventListener("click", getEstadisticas);
btnActualizar.addEventListener("click", getEstadisticasTipos);
btnActualizar.addEventListener("click", buscarMotivoIncidentes);
btnActualizar.addEventListener("click", buscarEstado);
btnActualizar.addEventListener("click", buscarComponentes);
btnActualizar.addEventListener("click", getEstadisticaPerpetrador);