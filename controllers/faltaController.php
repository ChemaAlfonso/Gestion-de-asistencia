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

}