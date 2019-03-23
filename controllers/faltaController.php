<?php

require_once 'models/Falta.php';

class FaltaController{

    public function __construct(){

    }

    public function main(){
        $falta = new Falta();
        $falta->Faltas();

        require_once 'views/faltas/faltas.php';
    }       

    public function crear(){

        require_once 'views/faltas/crear.php';
    }

    public function edit(){

        $_GET['edit'] = true;

        require_once 'views/faltas/crear.php';
    }

}