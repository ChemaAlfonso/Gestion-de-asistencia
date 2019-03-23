<div class="container-fluid">
    <div class="row">

    <table class="table text-center">
        <thead class="thead-dark">
            <tr scope=row>
                <th>Img</th>
                <th>Matricula</th>
                <th>Nombre</th>
                <th>Apellidos</th> 
                <th></th> 
            </tr>
        </thead>
        <?php foreach ($alm->filas as $fila):?>
            <tr scope=row>
                <td class=" align-middle">
                    <div class="circulo">
                        <img src="<?= $fila->img; ?>" alt="">
                    </div>
                </td>
                <td class=" align-middle"><?= $fila->matricula; ?></td>
                <td class=" align-middle"><?= $fila->nombre; ?></td>
                <td class=" align-middle"><?= $fila->apellidos; ?></td> 
                <td class=" align-middle">
                      <a href="" class="far fa-edit modificador"></a>
                      <a href="" class="fas fa-trash-al borradort"></a>
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