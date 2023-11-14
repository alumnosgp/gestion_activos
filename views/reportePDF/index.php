<h1 class="text-center">INVENTARIOS DE ACTIVOS REGISTRADOS</h1>
<div class="row justify-content-center mb-5">
    <form class="col-lg-8 border bg-light p-3" id="formularioTurno">
        <div class="row mb-3">
            <div class="col">
                <label for="empleado_turno">Turno del empleado</label>
                <select name="empleado_turno" id="empleado_turno" class="form-control">
                    <option value="">Selecione un turno...</option>
                    <option value="diurno">Diurno</option>
                    <option value="nocturno">Nocturno</option>
                </select>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="button" id="btnBuscar" class="btn btn-info w-100">Buscar</button>
                </div>
            </div>
    </form>
</div>

<script src="build/js/reportePDF/index.js"></script>