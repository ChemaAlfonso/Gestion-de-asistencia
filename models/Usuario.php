<?php

require_once 'db/db.php';

class Usuario extends Db{
    
    public $id;
    public $nickname;
    public $nombre;
    public $apellidos;
    public $email;
    public $password;
    public $favoritos;
    public $role;
    public $img;

    public function Usuarios()
    {
        return $this->seleccionar("SELECT * FROM usuarios");
    }

    public function UsuarioUnico( $id )
    {
        if ( $this->seleccionar("SELECT * FROM usuarios WHERE id = $id") )
        {
            $this->nombre        = $this->filas[0]->nombre;
            $this->nickname      = $this->filas[0]->nickname;
            $this->apellidos     = $this->filas[0]->apellidos;
            $this->email         = $this->filas[0]->email;
            $this->password      = $this->filas[0]->password;
            $this->favoritos     = $this->filas[0]->favoritos;
            $this->role          = $this->filas[0]->role;
            $this->img           = $this->filas[0]->img;

            return true;
        }

        return false;

    }

    public function removeUser( $id )
    {
        return $this->ejecutar("DELETE FROM usuarios WHERE id = $id");
    }

    public function create()
    {
        $sql = "INSERT INTO usuarios VALUES ( null,
                                            '$this->nickname',
                                            '$this->nombre',
                                            '$this->apellidos',
                                            '$this->email', 
                                            '$this->password',
                                            '$this->favoritos',
                                            '$this->role', 
                                            '$this->img' );";

        return $this->ejecutar( $sql );
    }

    public function update()
    {
        $sql = "UPDATE usuarios SET nickname    = '$this->nickname',
                                    nombre      = '$this->nombre',
                                    apellidos   = '$this->apellidos',
                                    email       = '$this->email', 
                                    password    = '$this->password',
                                    favoritos   = '$this->favoritos',
                                    role        = '$this->role', 
                                    img         = '$this->img' 
                WHERE id = $this->id;";

        return $this->ejecutar( $sql );
    }
}