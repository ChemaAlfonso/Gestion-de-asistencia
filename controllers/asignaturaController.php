<?php

require_once 'models/Asignatura.php';

class AsignaturaController{

    public function __construct(){

    }

    public function main(){
        $asgn = new Asignatura();
        $asgn->Asignaturas();

        require_once 'views/asignaturas/asignaturas.php';
    }    

    public function crear(){

        require_once 'views/asignaturas/crear.php';
    }

    public function edit(){

        $_GET['edit'] = true;

        require_once 'views/asignaturas/crear.php';
    }

}