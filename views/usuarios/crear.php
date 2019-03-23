<div class="row">

    <div class="col-5 viewItemImgContainer">
        <img class="viewItemImg" src="https://picsum.photos/500/600?image=12" alt="">
    </div>

    <div class="col-6 ">

        <div class="row">
            <div class="col-12 ">
                <h2>Nuevo Usuario</h2>

                <form action="">

                    <div class="form-group">
                        <label for="nickname">Nickname</label>
                        <input class="form-control" name="nickname" type="text" required>
                    </div>

                    <div class="form-row">

                        <div class="col">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" name="nombre" type="text" required>
                        </div>

                        <div class="col">
                            <label for="apellido">Apellidos</label>
                            <input class="form-control" name="apellido" type="text" required>
                        </div>

                    </div>
                    
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input class="form-control" name="email" type="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input class="form-control" name="password" type="password" required>
                    </div>

                    <div class="form-group">
                        <label for="role">Rol</label>
                        <input class="form-control" name="role" type="number" required>
                    </div>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" required>
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