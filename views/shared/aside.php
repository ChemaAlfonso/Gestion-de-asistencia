<div class="col-lg-2 col-md-3 text-white text-center sidebar py-3  vh-100">
    <div class="container-fluid">

        <!-- Logo -->
        <div class="row">
            <div id="favLogoText" class="col-12">
                <div class="circulo d-flex justify-content-center circuloExtraGrande profile">
                    <a href="?controller=usuario&action=edit&id=<?= !empty( $_SESSION['user'] ) ? $_SESSION['user']->id  : 1 ?>">
                        <img class="rounded mx-auto d-block" src="<?= !empty( $_SESSION['user'] ) ? $_SESSION['user']->img  : 'https://picsum.photos/200/200?image=8' ?>" alt="<?= !empty( $_SESSION['user'] ) ? $_SESSION['user']->nickname  : 'profile picture' ?>" title="Ver perfil">
                    </a>
                </div>
                <a class="text-white text-capitalize" href="">
                    <p class="mt-2"><?= !empty( $_SESSION['user'] ) ? $_SESSION['user']->nickname  : 'Chema Alfonso' ?></p>
                </a>
            </div>
        </div>

        <!-- Buscador -->
        <div class="row">
            <div class="col-12 search">

                <form action="?controller=alumno&action=search" method="POST">
                    <div class="form-group">
                        <label for="search"></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-search"></i></div>
                            </div>
                            <input type="text" class="form-control" name="search"  placeholder="Buscar...">
                        </div>    
                    </div>
                </form>

            </div>
        </div>

        <!-- Enlaces principales -->
        <div class="row">
            <div class="col-12 mainLinksContainer">
                <ul>
                    <li><a href="?controller=main&action=main">INICIO</a></li>
                    <li><a href="?controller=falta&action=main">FALTAS</a></li>
                    <li><a href="?controller=alumno&action=main">ALUMNOS</a></li>
                    <li><a href="?controller=asignatura&action=main">ASIGNATURAS</a></li>
                    <?php if ( $_SESSION['user']->role_id < 1 ) : ?>
                        <li><a href="?controller=usuario&action=main">USUARIOS</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <!-- Copy -->
        <div class="row copy">
            <div class="col-12">
                <a class="text-white" target="_blank" href="https://github.com/ChemaAlfonso/Gestion-de-asistencia"> 
                    <p> Por: Chema Alfonso</p>
                </a>
            </div>
        </div>

    </div>
</div>