<div class="container-fluid">

    <div class="row vh-100 align-items-center">
        <div class="col-4 offset-4">

            <div class="card">

                <img src="assets/img/login/login.jpg" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title text-primary">Iniciar sesión</h5>
                    <p class="card-text">Introduce tus credenciales para iniciar sesión!</p>
                    <form action="index.php?controller=login&action=login" method="POST">

                        <div class="form-group">
                            <label for="nickname">Usuario</label>
                            <input type="text" class="form-control" name="nickname"  value="<?= !empty($_COOKIE['userLogin']) ? $_COOKIE['userLogin'] : '';  ?>" >
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-row">
                            <div class="col-4">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="bg-warning input-group-text">
                                            <input type="checkbox" name="recordar" aria-label="Checkbox for following text input" <?= !empty($_COOKIE['userLogin']) ? 'checked' : '';  ?> >
                                        </div>
                                    </div>
                                    <label class="form-control">Recordarme</label>
                                </div>

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-3">
                                <input type="submit" class="btn btn-primary" value="Iniciar sesión" />
                            </div>
                            <div class="col-7 offset-2 mt-2">
                                <a href="index.php?reg=true">¿ Aun no tienes cuenta ? Registrate...</a>
                            </div>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>