<div class="container-fluid">
    <div class="row">

    <table class="table text-center">
        <thead class="thead-dark">
            <tr scope=row> 
                <th>img</th>
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
                        <img src="https://cdn-tipsforlawyer.pressidium.com/wp-content/uploads/2014/05/made-a-mistake.jpg" alt="">
                    </div>
                </td>
                <td class=" align-middle"><?= $fila->alumno_id; ?></td>
                <td class=" align-middle"><?= $fila->asignatura_id; ?></td>
                <td class=" align-middle"><?= $fila->dia; ?></td> 
                <td class=" align-middle"><?= $fila->horas; ?></td> 
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