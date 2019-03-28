<div class="row">

    <div class="col-lg-5 col-12">
        <div class="viewItemImgContainer m-auto overflow-hidden">
            <img class="viewItemImg img-fluid" src="<?= isset($asignaturaEdit) ? $asignaturaEdit->filas[0]->img : 'https://picsum.photos/500/600?image=12' ?>" alt="<?= isset($asignaturaEdit) ? $asignaturaEdit->filas[0]->nombre : '' ?>">
        </div>
    </div>

    <div class="col-lg-6 col-12">

        <div class="row">
            <div class="col-12 ">
                    <div class="row">
                        <div class="col-12">

                            
                        <div class="col-6  justify-content-center">
                            <h2><?= isset($asignaturaEdit) ? $asignaturaEdit->filas[0]->nombre : 'Nueva asignatura' ?></h2>
                        </div>
                
                    
                        <div class="col-3 offset-9 justify-content-center">
                            <a class="d-block my-3 btn btn-danger" href="index.php?controller=asignatura&action=main">Volver</a>
                        </div>

                        </div>
                    </div>

                <form action="<?= isset($asignaturaEdit) ? "index.php?controller=asignatura&action=create&edit=true" :"index.php?controller=asignatura&action=create"?>" method="POST" enctype="multipart/form-data">

                    <div class="form-row">
                    
                            <input name="id" type="hidden" value="<?= isset($asignaturaEdit) ? $asignaturaEdit->filas[0]->id : '' ?>">

                        <div class="col">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" name="nombre" type="text" value="<?= isset($asignaturaEdit) ? $asignaturaEdit->filas[0]->nombre : '' ?>" required>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="horas">Horas</label>
                        <input class="form-control" name="horas" type="text" value="<?= isset($asignaturaEdit) ? $asignaturaEdit->filas[0]->horas : '' ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="curso">Curso</label>
                        <input class="form-control" name="curso" value="<?= isset($asignaturaEdit) ? $asignaturaEdit->filas[0]->curso : '' ?>" type="text" required>
                    </div>
                    

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="img"  id="validatedCustomFile">
                        <label class="custom-file-label" for="validatedCustomFile">Elija una imagen...</label>
                    </div>

                    <div class="col-12 text-center mt-3">
                        <input class="btn btn-primary" type="submit" value="<?= isset($asignaturaEdit) ? 'Modificar' : 'Crear' ?>" >
                    </div>
                    
                </form>
            </div>
        </div>
            

    </div>

</div>