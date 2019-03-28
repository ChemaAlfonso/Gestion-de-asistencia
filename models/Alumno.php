<?php

require_once 'db/db.php';

class Alumno extends Db{
    
    public $id;
    public $matricula;
    public $nombre;
    public $apellidos;
    public $img;

    public function Alumnos()
    {
        return $this->seleccionar("SELECT * FROM alumnos ORDER BY nombre");
    }
    
    public function AlumnoUnico( $id )
    {
        if ( $this->seleccionar("SELECT * FROM alumnos WHERE id = $id") )
        {
            $this->id            = $this->filas[0]->id;
            $this->nombre        = $this->filas[0]->nombre;
            $this->matricula     = $this->filas[0]->matricula;
            $this->apellidos     = $this->filas[0]->apellidos;
            $this->img           = $this->filas[0]->img;

            return true;
        }

        return false;

    }

    public function remove( $id )
    {
        return $this->ejecutar("DELETE FROM alumnos WHERE id = $id");
    }

    public function create()
    {
        $sql = "INSERT INTO alumnos VALUES ( null,
                                            '$this->matricula',
                                            '$this->nombre',
                                            '$this->apellidos', 
                                            '$this->img' );";

        return $this->ejecutar( $sql );
    }

    public function update()
    {
        $sql = "UPDATE alumnos SET  matricula   = '$this->matricula',
                                    nombre      = '$this->nombre',
                                    apellidos   = '$this->apellidos', 
                                    img         = '$this->img' 
                WHERE id = $this->id;";

        return $this->ejecutar( $sql );
    }

    public function ultimoAlumno()
    {
        $sql = "SELECT * from alumnos ORDER BY matricula DESC LIMIT 1";

        return $this->seleccionar( $sql );
    }

    public function search( $search )
    {
        $sql = "SELECT * from alumnos WHERE nombre LIKE '%$search%' OR apellidos  LIKE '%$search%' OR matricula LIKE '%$search%' ORDER BY nombre ASC";

        return $this->seleccionar( $sql );
    }


}