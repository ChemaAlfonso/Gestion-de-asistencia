<?php

require_once 'db/db.php';

class Falta extends Db{
    
    public $alumno_id;
    public $asignatura_id;
    public $dia;
    public $horas;

    public function Faltas()
    {
        return $this->seleccionar("SELECT * FROM faltas");
    }

    public function FaltaUnica( $id )
    {
        if ( $this->seleccionar("SELECT * FROM faltas WHERE id = $id") )
        {
            $this->alumno_id     = $this->filas[0]->alumno_id;
            $this->asignatura_id = $this->filas[0]->asignatura_id;
            $this->dia           = $this->filas[0]->dia;
            $this->horas         = $this->filas[0]->horas;

            return true;
        }

        return false;

    }

    public function remove( $id )
    {
        return $this->ejecutar("DELETE FROM faltas WHERE id = $id");
    }

    public function create()
    {
        $sql = "INSERT INTO faltas VALUES ( null,
                                            '$this->alumno_id',
                                            '$this->asignatura_id',
                                            '$this->dia', 
                                            '$this->horas');";

        return $this->ejecutar( $sql );
    }

    public function update()
    {
        $sql = "UPDATE faltas SET  alumno_id        = '$this->alumno_id',
                                    asignatura_id   = '$this->asignatura_id',
                                    dia             = '$this->dia', 
                                    horas           = '$this->horas'
                WHERE id = $this->id;";

        return $this->ejecutar( $sql );
    }
}