<div class="col-2 text-white text-center sidebar py-3  vh-100">
    <div class="container-fluid">

        <!-- Logo -->
        <div class="row">
            <div id="favLogoText" class="col-12">
                <div class="circulo circuloExtraGrande profile">
                    <a href="">
                        <img src="https://picsum.photos/200/200?image=8" alt="">
                    </a>
                </div>
                <a class="text-white" href="">
                    <p class="mt-2">Chema Alfonso</p>
                </a>
            </div>
        </div>

        <!-- Buscador -->
        <div class="row">
            <div class="col-12 search">

                <form action="?controller=search&action=main">
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
                    <li><a href="?controller=usuario&action=main">USUARIOS</a></li>
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