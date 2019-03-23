<?php

require_once 'models/Usuario.php';

class UsuarioController{

    public function __construct(){

    }

    public function main(){
        $usr = new Usuario();
        $usr->Usuarios();

        require_once 'views/usuarios/usuarios.php';
    }

    public function crear(){

        require_once 'views/usuarios/crear.php';
    }

    public function edit(){

        $_GET['edit'] = true;

        require_once 'views/usuarios/crear.php';
    }


}