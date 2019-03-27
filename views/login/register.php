<div class="container-fluid">

    <div class="row vh-100 align-items-center">
        <div class="col-lg-4 offset-lg-4">

            <div class="card">

                <img src="assets/img/login/login.jpg" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title text-primary">Registro de nuevo usuario</h5>
                    <p class="card-text">Introduce tus datos para crear tu cuenta!</p>

                    <form action="index.php?reg=true" method="POST" enctype="multipart/form-data">

                        <div class="form-row">

                            <div class="col">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre">
                            </div>

                            <div class="col">
                                <label for="text">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos">
                            </div>

                        </div>
                        <div class="form-row">

                            <div class="col">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="col">
                                <label for="nickname">Usuario</label>
                                <input type="text" class="form-control" name="nickname">
                            </div>

                            <div class="col">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="img" id="img">
                                <label class="custom-file-label" for="img">Elija una imagen...</label>
                            </div>

                        </div>

                        <div class="form-row mt-3">

                            <div class="col-lg-3 col-md-6">
                                <input type="submit" class="btn btn-primary" value="Registrarse" />
                            </div>

                            <div class="col-lg-7 col-md-6 offset-lg-2 mt-3">
                                <a href="index.php">¿ Ya tienes cuenta ? Iniciar sesión...</a>
                            </div>

                        </div>                        

                    </form>

                </div> <!-- End card body -->

            </div> <!-- End card -->

        </div>
    </div>

</div>