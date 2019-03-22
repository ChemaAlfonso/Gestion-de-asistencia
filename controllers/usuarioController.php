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

}