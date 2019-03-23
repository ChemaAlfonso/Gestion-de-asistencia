<div class="container-fluid">
    <div class="row">

    <table class="table text-center">
        <thead class="thead-dark">
            <tr scope=row> 
                <th></th>
                <th>Alumno</th>
                <th>Asignatura</th>
                <th>Dia</th>
                <th>Horas</th> 
                <th></th>
            </tr>
        </thead>
        <?php foreach ($falta->filas as $fila):?>
            <tr scope=row>
                <td class=" align-middle">
                    <div class="circulo">
                        <img src="<?= $fila->fotoAlumno; ?>" alt="<?= $fila->nombreAlumno; ?>" title="<?= $fila->nombreAlumno; ?>">
                    </div>
                </td>
                <td class=" align-middle"><?= $fila->nombreAlumno; ?></td>
                <td class=" align-middle"><?= $fila->nombreAsignatura; ?></td>
                <td class=" align-middle"><?= $fila->dia; ?></td> 
                <td class=" align-middle"><?= $fila->horas; ?></td> 
                <td class=" align-middle">
                      <a href="index.php?controller=falta&action=edit" class="far fa-edit modificador"></a>
                      <a href="" class="fas fa-trash-alt borrador"></a>
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