<div class="row">

    <div class="col-lg-5 col-12">
        <div class="viewItemImgContainer m-auto overflow-hidden">
            <img class="viewItemImg img-fluid" src="<?= isset($alumnoEdit) ? $alumnoEdit->filas[0]->img : 'https://picsum.photos/500/600?image=12' ?>" alt="<?= isset($alumnoEdit) ? $alumnoEdit->filas[0]->nombre : '' ?>">
        </div>
    </div>

    <div class="col-lg-6 col-12">

        <div class="row">
            <div class="col-12 ">
                    <div class="row">
                        <div class="col-12">

                            
                        <div class="col-6  justify-content-center">
                            <h2><?= isset($alumnoEdit) ? $alumnoEdit->filas[0]->nombre. ' ' . $alumnoEdit->filas[0]->apellidos : 'Nuevo alumno' ?></h2>
                        </div>
                
                    
                        <div class="col-3 offset-9 justify-content-center">
                            <a class="d-block my-3 btn btn-danger" href="index.php?controller=alumno&action=main">Volver</a>
                        </div>

                        </div>
                    </div>

                <form action="<?= isset($alumnoEdit) ? "index.php?controller=alumno&action=create&edit=true" :"index.php?controller=alumno&action=create"?>" method="POST" enctype="multipart/form-data">

                    <div class="form-row">
                        <div class="col">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" name="nombre" type="text" value="<?= isset($alumnoEdit) ? $alumnoEdit->filas[0]->nombre : '' ?>" required>
                        </div>
                            <input name="id" type="hidden" value="<?= isset($alumnoEdit) ? $alumnoEdit->filas[0]->id : '' ?>">

                        <div class="col">
                            <label for="apellido">Apellidos</label>
                            <input class="form-control" name="apellidos" type="text" value="<?= isset($alumnoEdit) ? $alumnoEdit->filas[0]->apellidos : '' ?>" required>
                        </div>

                    </div>

                    <div class="custom-file mt-3">
                        <input type="file" class="custom-file-input" name="img" value="<?= isset($alumnoEdit) ? $alumnoEdit->filas[0]->img : '' ?>" id="img">
                        <label class="custom-file-label" for="img">Elija una imagen...</label>
                    </div>

                    <div class="col-12 text-center mt-3">
                        <input class="btn btn-primary" type="submit" value="<?= isset($alumnoEdit) ? 'Modificar' : 'Crear' ?>" >
                    </div>
                    
                </form>
            </div>
        </div>
            

    </div>

</div>