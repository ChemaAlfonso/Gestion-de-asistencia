<div class="container-fluid">
    <div class="row">

    <table class="table text-center table-hover table-responsive-lg">
        <thead class="thead-dark">
            <tr scope=row>
                <th></th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>email</th>
                <th>rol</th> 
                <th></th>      
            </tr>
        </thead>
        <?php foreach ($usr->filas as $fila):?>        
            <tr scope=row>
                <td class=" align-middle">
                <a href="index.php?controller=usuario&action=edit&id=<?= $fila->id; ?>">
                    <div class="circulo d-flex justify-content-center">
                        <img src="<?= $fila->img; ?>" alt="<?= $fila->nickname; ?>" title="<?= $fila->nickname; ?>">
                    </div>
                </a>
                </td>
                <td class=" align-middle"><?= $fila->nickname; ?></td>
                <td class=" align-middle"><?= $fila->nombre; ?></td>
                <td class=" align-middle"><?= $fila->email; ?></td>
                <td class=" align-middle"><?= $fila->rol; ?></td> 
                <td class=" align-middle">
                      <a href="index.php?controller=usuario&action=edit&id=<?= $fila->id; ?>" class="far fa-edit modificador"></a>
                      <a href="index.php?controller=usuario&action=remove&id=<?= $fila->id; ?>" class="fas fa-trash-alt borrador"></a>
                </td>          
            </tr>
        <?php endforeach;?>

    </table>

        

    </div>

    <div class="row">
        <div class="col-2 offset-5 justify-content-center">
            <a class="d-block my-3 btn btn-success" href="index.php?controller=usuario&action=crear">Nuevo</a>
        </div>
    </div>
</div>