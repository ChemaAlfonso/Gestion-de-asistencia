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
        return $this->seleccionar("SELECT * FROM asignaturas ORDER BY codigo");
    }

    public function AsignaturaUnica( $id )
    {
        if ( $this->seleccionar("SELECT * FROM asignaturas WHERE id = $id") )
        {
            $this->id            = $this->filas[0]->id;
            $this->codigo        = $this->filas[0]->codigo;
            $this->nombre        = $this->filas[0]->nombre;
            $this->horas         = $this->filas[0]->horas;
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
                                            '$this->codigo',
                                            '$this->nombre',
                                            '$this->horas',
                                            '$this->curso', 
                                            '$this->img');";

        return $this->ejecutar( $sql );
    }

    public function update()
    {
        $sql = "UPDATE asignaturas SET  codigo      = '$this->codigo',
                                        nombre      = '$this->nombre',
                                        horas       = '$this->horas', 
                                        curso       = '$this->curso', 
                                        img         = '$this->img' 
                WHERE id = $this->id;";

        return $this->ejecutar( $sql );
    }    

    public function ultimasignatura()
    {
        $sql = "SELECT * from asignaturas ORDER BY codigo DESC LIMIT 1";

        return $this->seleccionar( $sql );
    }

}