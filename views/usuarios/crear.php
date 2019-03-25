<div class="row">

    <div class="col-lg-5 col-12">
        <div class="viewItemImgContainer m-auto overflow-hidden">
            <img class="viewItemImg img-fluid" src="<?= isset($usuarioEdit) ? $usuarioEdit->filas[0]->img : 'https://picsum.photos/500/600?image=12' ?>" alt="<?= isset($asignaturaEdit) ? $asignaturaEdit->filas[0]->nombre : '' ?>">
        </div>
    </div>

    <div class="col-lg-6 col-12">

        <div class="row">
            <div class="col-12 ">
                    <div class="row">
                        <div class="col-12">

                            
                        <div class="col-6  justify-content-center">
                            <h2><?= isset($usuarioEdit) ? $usuarioEdit->filas[0]->nombre : 'Nuevo usuario' ?></h2>
                        </div>
                
                    
                        <div class="col-3 offset-9 justify-content-center">
                            <a class="d-block my-3 btn btn-danger" href="index.php?controller=usuario&action=main">Volver</a>
                        </div>

                        </div>
                    </div>

                <form action="<?= isset($usuarioEdit) ? "index.php?controller=usuario&action=create&edit=true" :"index.php?controller=usuario&action=create"?>" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="nickname">Nickname</label>
                        <input class="form-control" name="nickname" type="text" value="<?= isset($usuarioEdit) ? $usuarioEdit->filas[0]->nickname : '' ?>" required>
                    </div>

                    <div class="form-row">

                        <div class="col">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" name="nombre" type="text" value="<?= isset($usuarioEdit) ? $usuarioEdit->filas[0]->nombre : '' ?>" required>
                        </div>

                        <input name="id" type="hidden" value="<?= isset($usuarioEdit) ? $usuarioEdit->filas[0]->id : '' ?>">


                        <div class="col">
                            <label for="apellidos">Apellidos</label>
                            <input class="form-control" name="apellidos" type="text" value="<?= isset($usuarioEdit) ? $usuarioEdit->filas[0]->apellidos : '' ?>" required>
                        </div>

                    </div>
                    
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input class="form-control" name="email" type="email" value="<?= isset($usuarioEdit) ? $usuarioEdit->filas[0]->email : '' ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input class="form-control" name="password" type="password" required>
                    </div>

                    <div class="form-group">
                        <label for="role">Rol</label>
                        <input class="form-control" name="role" type="number" max="1" min="0" value="<?= isset($usuarioEdit) ? $usuarioEdit->filas[0]->role_id : '' ?>" required>
                    </div>

                    <div class="custom-file">
                        <input type="file" name="img" class="custom-file-input" id="validatedCustomFile">
                        <label class="custom-file-label" for="validatedCustomFile">Elija una imagen...</label>
                    </div>

                    <div class="col-12 text-center mt-3">
                        <input class="btn btn-primary" type="submit" value="Aceptar" >
                    </div>
                    
                </form>
            </div>
        </div>

    </div>

</div>