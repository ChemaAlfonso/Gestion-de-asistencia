<?php

require_once 'models/Alumno.php';

class AlumnoController{

    public function __construct(){

    }

    public function main(){
        $alm = new Alumno();
        $alm->Alumnos();

        require_once 'views/alumnos/alumnos.php';
    }

    public function crear(){

        require_once 'views/alumnos/crear.php';
    }

    public function edit(){

        $_GET['edit'] = true;

        require_once 'views/alumnos/crear.php';
    }

}