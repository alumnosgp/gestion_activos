<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>MAQUINA</th>
                            <th>TIPO DE MAQUINA</th>
                            <th>SISTEMA OPERATIVO</th>
                            <th>VERSION DE OFFICES</th>
                            <th>ANTIVIRUS</th>
                            <th>PROCESADOR</th>
                            <th>MEMORIA RAM</th>
                            <th>DISCODURO</th>
                            <th>TIPO DE DISCO DURO</th>
                            <th>GRADO</th>
                            <th>NOMBRE</th>
                            <th>JUSTIFICACION</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($alumnos) > 0):?>
                        <?php foreach($alumnos as $key => $alumno) : ?>

                         
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $alumno['ALU_NOMBRE'] ?></td>
                            <td><?= $alumno['ALU_APELLIDO'] ?></td>
                            <td><?= $alumno['ALU_GRADO'] ?></td>
                            <td><?= $alumno['ALU_ARMA'] ?></td>
                            <td><?= $alumno['ALU_NAC'] ?></td>
                            <td><a class="btn btn-warning w-100" href="/final_cornelio/vistas/alumnos/modificar.php?id_alumnos=<?= $alumno['ID_ALUMNOS']?>">Modificar</a></td>
                            <td><a class="btn btn-danger w-100" href="/final_cornelio/controladores/alumnos/eliminar.php?id_alumnos=<?= $alumno['ID_ALUMNOS']?>">Eliminar</a></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="3">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/final_cornelio/vistas/alumnos/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>