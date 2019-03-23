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

}