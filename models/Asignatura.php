<?php

require_once 'db/db.php';

class Asignatura extends Db{
    
    public $id;
    public $codigo;
    public $nombre;
    public $horas;
    public $curso;
    public $img;

    public function Asignaturas()
    {
        return $this->seleccionar("SELECT * FROM asignaturas");
    }

    public function AsignaturaUnica( $id )
    {
        if ( $this->seleccionar("SELECT * FROM asignaturas WHERE id = $id") )
        {
            $this->nombre        = $this->filas[0]->nombre;
            $this->matricula     = $this->filas[0]->matricula;
            $this->apellidos     = $this->filas[0]->apellidos;
            $this->curso         = $this->filas[0]->curso;
            $this->img           = $this->filas[0]->img;

            return true;
        }

        return false;

    }

    public function remove( $id )
    {
        return $this->ejecutar("DELETE FROM asignaturas WHERE id = $id");
    }

    public function create()
    {
        $sql = "INSERT INTO asignaturas VALUES ( null,
                                            '$this->matricula',
                                            '$this->nombre',
                                            '$this->apellidos', 
                                            '$this->curso', 
                                            '$this->img' );";

        return $this->ejecutar( $sql );
    }

    public function update()
    {
        $sql = "UPDATE asignaturas SET  matricula   = '$this->matricula',
                                    nombre      = '$this->nombre',
                                    apellidos   = '$this->apellidos', 
                                    curso       = '$this->curso', 
                                    img         = '$this->img' 
                WHERE id = $this->id;";

        return $this->ejecutar( $sql );
    }
}