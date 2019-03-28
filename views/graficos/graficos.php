
<!-- Cards Row -->
<div class="row">
    <div class="col-12 bg-white">

            <!-- 1st 1st card -->
            <div class="row mb-3 justify-content-around">

                <div class="col-lg-5 col-12 mb-2 card">

                    <!-- Texto y foto principal -->
                    <div class="row h-50">

                    <?php foreach($almnTop->filas as $almnTopOne):?>

                        <div class="col-lg-6 col-12">
                            <div class="p-2">
                                <h5 class="font-weight-bold text-primary">Alumnos con más faltas</h5>
                                <p class="font-weight-bold font-italic">Nombre: <span class="font-weight-normal font-normal"><?= $almnTopOne->nombre ?> </span></p>
                                <p class="font-weight-bold font-italic">Apellidos: <span class="font-weight-normal font-normal"><?= $almnTopOne->apellidos ?></span>  </p>
                                <p class="font-weight-bold font-italic">Faltas totales: <span class="font-weight-normal font-normal"><?= $maxFaltas ?> H </span> </p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <a href="index.php?controller=alumno&action=edit&id=<?= $almnTopOne->id; ?>">
                                <div class="circulo circuloExtraGrande mt-4 d-flex justify-content-center">
                                    <img src="<?= $almnTopOne->img ?>" alt="<?= $almnTopOne->nombre ?>" title="<?= $almnTopOne->nombre . ' ' . $almnTopOne->apellidos ?>">
                                </div>
                            </a>
                        </div>

                        <?php endforeach;?>
                    </div>

                    <!-- miniaturas -->
                    <div class="row justify-content-center my-5">

                    <?php foreach($alumnos as $falton):?>

                        <?php $alumno->AlumnoUnico( $falton ); ?>
                        
                        <div class="col-lg-3 col-6">
                            <a href="index.php?controller=alumno&action=edit&id=<?= $alumno->id; ?>">
                                <div class="circulo circuloGrande d-flex justify-content-center">
                                    <img src="<?= $alumno->img ?>" alt="<?= $alumno->nombre ?>" title="<?= $alumno->nombre . ' ' . $alumno->apellidos ?>">
                                </div>
                            </a>
                        </div>


                        <?php endforeach;?>
                    

                    </div>
                </div>
                <!-- End card -->

                <!-- 2nd 1st row card -->
                <div class="col-lg-5 col-12 mb-2 card">

                    <!-- Texto y foto principal -->
                    <div class="row h-50">

                    <?php foreach($asignTop->filas as $asignTopOne):?>

                        <div class="col-lg-6 col-12">
                            <div class="p-2">
                                <h5 class="font-weight-bold text-primary">Asignaturas más faltadas</h5>
                                <p class="font-weight-bold font-italic">Nombre: <span class="font-weight-normal font-normal"><?= $asignTopOne->nombre ?> </span></p>
                                <p class="font-weight-bold font-italic">Código: <span class="font-weight-normal font-normal"><?= $asignTopOne->codigo ?></span>  </p>
                                <p class="font-weight-bold font-italic">Faltas totales: <span class="font-weight-normal font-normal"><?= $maxAsignFaltas ?> H </span> </p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <a href="index.php?controller=asignatura&action=edit&id=<?= $asignTopOne->id; ?>">
                                <div class="circulo circuloExtraGrande mt-4 d-flex justify-content-center">
                                    <img src="<?= $asignTopOne->img ?>" alt="<?= $asignTopOne->nombre ?>" title="<?= $asignTopOne->nombre . ' - ' . $asignTopOne->codigo ?>">
                                </div>
                            </a>
                        </div>

                        <?php endforeach;?>
                    </div>

                    <!-- miniaturas -->
                    <div class="row justify-content-center mt-5">

                    <?php foreach($asignaturas as $faltada):?>
                        <?php $asignatura->AsignaturaUnica( $faltada ); ?>
                        
                        <div class="col-lg-3 col-6">
                            <a href="index.php?controller=asignatura&action=edit&id=<?= $asignatura->id; ?>">
                                <div class="circulo circuloGrande d-flex justify-content-center">
                                    <img src="<?= $asignatura->img ?>" alt="<?= $asignatura->nombre ?>" title="<?= $asignatura->nombre . ' - ' . $asignatura->codigo ?>">
                                </div>
                            </a>
                        </div>


                        <?php endforeach;?>
                    

                    </div>
                </div>
                <!-- End card -->
                
            </div>

            <!-- 1st 2nd row card -->
            <div class="row mb-3 justify-content-around">

                <div class="col-lg-5 col-12 mb-2 card">

                    <!-- Texto y foto principal -->
                    <div class="row h-50">

                    <?php foreach($almnTopRand->filas as $almnTopRandOne):?>

                        <div class="col-lg-6 col-12">
                            <div class="p-2">
                                <h5 class="font-weight-bold text-primary">Alumno aleatorio</h5>
                                <p class="font-weight-bold font-italic">Nombre: <span class="font-weight-normal font-normal"><?= $almnTopRandOne->nombre ?> </span></p>
                                <p class="font-weight-bold font-italic">Apellidos: <span class="font-weight-normal font-normal"><?= $almnTopRandOne->apellidos ?></span>  </p>
                                <p class="font-weight-bold font-italic">Faltas totales: <span class="font-weight-normal font-normal"><?= $maxFaltasRand ?> H  </p></span>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <a href="index.php?controller=alumno&action=edit&id=<?= $almnTopRandOne->id; ?>">
                                <div class="circulo circuloExtraGrande mt-4 d-flex justify-content-center">
                                    <img src="<?= $almnTopRandOne->img ?>" alt="<?= $almnTopRandOne->nombre ?>" title="<?= $almnTopRandOne->nombre . ' ' . $almnTopRandOne->apellidos ?>">
                                </div>
                            </a>
                        </div>

                        <?php endforeach;?>
                    </div>

                    <!-- miniaturas -->
                    <div class="row justify-content-center mt-5">

                    <?php foreach($alumnosRand as $faltonRand):?>

                        
                    <?php $alumnoRand->AlumnoUnico( $faltonRand ); ?>
                        
                        <div class="col-lg-3 col-6">
                            <a href="index.php?controller=alumno&action=edit&id=<?= $alumnoRand->id; ?>">
                                <div class="circulo circuloGrande d-flex justify-content-center">
                                    <img src="<?= $alumnoRand->img ?>" alt="<?= $alumnoRand->nombre ?>" title="<?= $alumnoRand->nombre . ' ' . $alumnoRand->apellidos ?>">
                                </div>
                            </a>
                        </div>


                        <?php endforeach;?>
                    

                    </div>
                </div>
                <!-- End card -->

                <!-- 2nd 2nd row card -->
                <div class="col-lg-5 col-12 mb-2 card ">

                    <!-- Texto y foto principal -->
                    <div class="row h-50">

                    <?php foreach($asignTopRand->filas as $asignTopRandOne):?>

                        <div class="col-lg-6 col-12">
                            <div class="p-2">
                                <h5 class="font-weight-bold text-primary">Asignatura aleatoria</h5>
                                <p class="font-weight-bold font-italic">Nombre: <span class="font-weight-normal font-normal"><?= $asignTopRandOne->nombre ?> </span></p>
                                <p class="font-weight-bold font-italic">Código: <span class="font-weight-normal font-normal"><?= $asignTopRandOne->codigo ?></span>  </p>
                                <p class="font-weight-bold font-italic">Faltas totales: <span class="font-weight-normal font-normal"><?= $maxAsignFaltasRand ?> H </span> </p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <a href="index.php?controller=asignatura&action=edit&id=<?= $asignTopRandOne->id; ?>">
                                <div class="circulo circuloExtraGrande mt-4 d-flex justify-content-center">
                                    <img src="<?= $asignTopRandOne->img ?>" alt="<?= $asignTopRandOne->nombre ?>" title="<?= $asignTopRandOne->nombre . ' - ' . $asignTopRandOne->codigo ?>">
                                </div>
                            </a>
                        </div>

                        <?php endforeach;?>
                    </div>

                    <!-- miniaturas -->
                    <div class="row justify-content-center mt-5">

                    <?php foreach($asignaturasRand as $faltadaRand):?>

                        <?php $asignaturaRand->AsignaturaUnica( $faltadaRand ); ?>
                        
                        <div class="col-lg-3 col-6">
                            <a href="index.php?controller=asignatura&action=edit&id=<?= $asignaturaRand->id; ?>">
                                <div class="circulo circuloGrande d-flex justify-content-center">
                                    <img src="<?= $asignaturaRand->img ?>" alt="<?= $asignaturaRand->nombre ?>" title="<?= $asignaturaRand->nombre . ' - ' . $asignaturaRand->codigo ?>">
                                </div>
                            </a>
                        </div>


                        <?php endforeach;?>
                    

                    </div>
                </div>
                <!-- End card -->

            </div><!-- End 2nd card row -->
    </div><!-- End col Cards -->
</div><!-- End row Cards -->
