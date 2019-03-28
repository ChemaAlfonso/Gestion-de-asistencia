<div class="container-fluid">
    <div class="row">

    <table class="table text-center table-hover table-responsive-lg">
        <thead class="thead-dark">
            <tr scope=row> 
                <th></th>
                <th>Alumno</th>
                <th>Asignatura</th>
                <th>Dia</th>
                <th>Faltas (h)</th> 
                <th></th>
            </tr>
        </thead>

        <?php foreach ($falta->filas as $fila):?>
            <tr scope=row>
                <td class=" align-middle">
                    <a href="index.php?controller=falta&action=edit&idAlum=<?= $fila->alumno_id; ?>&idAsig=<?= $fila->asignatura_id; ?>&dia=<?= $fila->dia; ?>">
                        <div class="circulo d-flex justify-content-center">
                            <img src="<?= $fila->fotoAlumno; ?>" alt="<?= $fila->nombreAlumno; ?>" title="<?= $fila->nombreAlumno; ?>">
                        </div>
                    </a>
                </td>
                <td class=" align-middle"><?= $fila->nombreAlumno . ' ' . $fila->apellidosAlumno; ?></td>
                <td class=" align-middle"><?= $fila->nombreAsignatura; ?></td>
                <td class=" align-middle"><?= $fila->dia; ?></td> 
                <td class=" align-middle"><?= $fila->horas; ?></td> 
                <td class=" align-middle">
                      <a href="index.php?controller=falta&action=edit&idAlum=<?= $fila->alumno_id; ?>&idAsig=<?= $fila->asignatura_id; ?>&dia=<?= $fila->dia; ?>" class="far fa-edit modificador"></a>
                      <a href="index.php?controller=falta&action=remove&idAlum=<?= $fila->alumno_id; ?>&idAsig=<?= $fila->asignatura_id; ?>&dia=<?= $fila->dia; ?>" class="fas fa-trash-alt borrador"></a>
                </td>          
            </tr>
        <?php endforeach;?>

    </table>

        

    </div>

    <div class="row">
        <div class="col-2 offset-5 justify-content-center">
            <a class="d-block my-3 btn btn-success" href="index.php?controller=falta&action=crear">Nuevo</a>
        </div>
    </div>
</div>