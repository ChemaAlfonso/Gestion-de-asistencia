<?php
//require_once 'models/Usuario.php';

?>

<div class="container-fluid">
    <div class="row">

    <table class="table text-center">
        <thead class="thead-dark">
            <tr scope=row>
                <th>Img</th>
                <th>Nick</th>
                <th>Nombre</th>
                <th>email</th>
                <th>role</th> 
                <th>but</th>      
            </tr>
        </thead>
        <?php foreach ($usr->filas as $fila):?>
            <tr scope=row>
                <td class=" align-middle">
                    <div class="circulo">
                        <img src="https://picsum.photos/200/200?image=22" alt="">
                    </div>
                </td>
                <td class=" align-middle"><?= $fila->nickname; ?></td>
                <td class=" align-middle"><?= $fila->nombre; ?></td>
                <td class=" align-middle"><?= $fila->email; ?></td>
                <td class=" align-middle"><?= $fila->role; ?></td> 
                <td class=" align-middle">
                      <a class="">Modificar</a>
                      <a class="">Eliminar</a>
                </td>          
            </tr>
        <?php endforeach;?>

    </table>

        

    </div>
</div>