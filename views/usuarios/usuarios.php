<div class="container-fluid">
    <div class="row">

    <table class="table text-center">
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
                    <div class="circulo">
                        <img src="<?= $fila->img; ?>" alt="<?= $fila->nickname; ?>" title="<?= $fila->nickname; ?>">
                    </div>
                </td>
                <td class=" align-middle"><?= $fila->nickname; ?></td>
                <td class=" align-middle"><?= $fila->nombre; ?></td>
                <td class=" align-middle"><?= $fila->email; ?></td>
                <td class=" align-middle"><?= $fila->rol; ?></td> 
                <td class=" align-middle">
                      <a href="" class="far fa-edit modificador"></a>
                      <a href="" class="fas fa-trash-alt borrador"></a>
                </td>          
            </tr>
        <?php endforeach;?>

    </table>

        

    </div>

    <div class="row">
        <div class="col-2 offset-5 justify-content-center">
            <a class="d-block my-3 btn btn-success" href="">Nuevo</a>
        </div>
    </div>
</div>