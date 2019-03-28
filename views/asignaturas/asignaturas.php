<div class="container-fluid">
    <div class="row">

    <table class="table text-center table-hover table-responsive-lg">
        <thead class="thead-dark">
            <tr scope="row">
                <th scope="col"></th>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Horas</th> 
                <th scope="col">Curso</th> 
                <th scope="col"></th> 
            </tr>
        </thead>
        <?php foreach ($asgn->filas as $fila):?>
            <tr scope="row">
                <td scope="col" class=" align-middle">
                    <a href="index.php?controller=asignatura&action=edit&id=<?= $fila->id; ?>">
                        <div class="circulo d-flex justify-content-center">
                            <img src="<?= $fila->img; ?>" alt="<?= $fila->nombre; ?>" title="<?= $fila->nombre; ?>">
                        </div>
                    </a>
                </td>
                <td scope="col" class=" align-middle"><?= $fila->codigo; ?></td>
                <td scope="col" class=" align-middle"><?= $fila->nombre; ?></td>
                <td scope="col" class=" align-middle"><?= $fila->horas; ?></td> 
                <td scope="col" class=" align-middle"><?= $fila->curso; ?></td> 
                <td scope="col" class=" align-middle">
                      <a href="index.php?controller=asignatura&action=edit&id=<?= $fila->id; ?>" class="far fa-edit modificador"></a>
                      <a href="index.php?controller=asignatura&action=remove&id=<?= $fila->id; ?>" class="fas fa-trash-alt borrador"></a>
                </td>          
            </tr>
        <?php endforeach;?>

    </table>
        

    </div>

    <div class="row">
        <div class="col-2 offset-5 justify-content-center">
            <a class="d-block my-3 btn btn-success" href="index.php?controller=asignatura&action=crear">Nuevo</a>
        </div>
    </div>

</div>