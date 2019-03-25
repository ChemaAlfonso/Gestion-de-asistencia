<div class="row">

    <div class="col-lg-5 col-12">
        <div class="viewItemImgContainer m-auto overflow-hidden">
        
            <img class="viewItemImg img-fluid" 
            src="
                <?php
                if ( isset($fotoAlumno) )
                {
                    foreach($fotoAlumno->filas as $alumno){

                        if ( $_GET['idAlum'] == $alumno->id ){
                            echo "$alumno->img";
                        }

                    } 
                }
                else
                {
                    echo 'https://picsum.photos/500/600?image=12';
                }                           
                ?>
                " 

            alt="               
                <?php
                if ( isset($fotoAlumno) )
                {
                    foreach($fotoAlumno->filas as $alumno){
                        if ( $_GET['idAlum'] == $alumno->id ){
                            echo "$alumno->nombre";
                        }
                    }

                } 
                else
                {
                    echo 'https://picsum.photos/500/600?image=12';
                }
                                                
                ?>
            ">
            
        </div>
    </div>
    
    <div class="col-lg-6 col-12">

        <div class="row">
            <div class="col-12 ">
                    <div class="row">
                        <div class="col-12">

                            
                        <div class="col-6  justify-content-center">
                            <h2><?= isset($faltaEdit) ? 'Editar falta' : 'Nuevo falta' ?></h2>
                        </div>
                
                    
                        <div class="col-3 offset-9 justify-content-center">
                            <a class="d-block my-3 btn btn-danger" href="index.php?controller=falta&action=main">Volver</a>
                        </div>

                        </div>
                    </div>

                <form action="<?= isset($faltaEdit) ? "index.php?controller=falta&action=create&edit=true&idAlum=" . $faltaEdit->filas[0]->alumno_id .
                                                      '&idAsig=' . $faltaEdit->filas[0]->asignatura_id . 
                                                      '&dia=' . $faltaEdit->filas[0]->dia 
                                                    :"index.php?controller=falta&action=create"?>" 
                method="POST" enctype="multipart/form-data">

                <div class="form-row">
                
                    <div class="col form-group">
                        <label for="alumno_id">Alumno</label>
                        <select class="form-control" name="alumno_id" id="alumno_id">
                            <?php foreach($alumnos->filas as $fila): ?>
                                <option value="<?= $fila->id?>" <?= !empty( $_GET['idAlum'] ) ? $fila->id == ( filter_var($_GET['idAlum'], FILTER_SANITIZE_NUMBER_INT ) ) ? 'selected' : '' : ''; ?> ><?= $fila->nombre . ' ' . $fila->apellidos ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col form-group">
                        <label for="asignatura_id">Asignatura</label>
                        <select class="form-control" name="asignatura_id" id="asignatura_id">
                            <?php foreach($asignaturas->filas as $fila): ?>
                                <option value="<?= $fila->id?>" <?= !empty( $_GET['idAsig'] ) ? $fila->id == ( filter_var($_GET['idAsig'], FILTER_SANITIZE_NUMBER_INT ) ) ? 'selected' : '' : ''; ?> > <?= $fila->nombre . ' - ' . $fila->codigo ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>

                <div class="form-row">

                    <div class="col-6">
                        <label for="dia">Dia</label>
                        <input class="form-control" name="dia" type="date" value="<?= isset($faltaEdit) ? $faltaEdit->filas[0]->dia : '' ?>" required>
                    </div>

                    <div class="col-3 ">
                        <label for="horas">Horas</label>
                        <input class="text-center form-control" name="horas" type="number" step="0.01" value="<?= isset($faltaEdit) ? $faltaEdit->filas[0]->horas : '' ?>" required>
                    </div>

                </div>

                    <div class="col-12 text-center mt-5">
                        <input class="btn btn-primary" type="submit" value="<?= isset($faltaEdit) ? 'Modificar' : 'Crear falta' ?>" >
                    </div>
                    
                </form>
            </div>
        </div>
            

    </div>

</div>