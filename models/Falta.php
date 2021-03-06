<?php

require_once 'db/db.php';

class Falta extends Db{
    
    public $alumno_id;
    public $asignatura_id;
    public $dia;
    public $horas;
    public $fotoAlumno;

    public function Faltas()
    {
        return $this->seleccionar( 'SELECT f.*, al.nombre AS nombreAlumno, al.apellidos as apellidosAlumno, asig.nombre as nombreAsignatura, al.img as fotoAlumno FROM faltas f 
                                    INNER JOIN alumnos al ON f.alumno_id = al.id
                                    INNER JOIN asignaturas asig ON f.asignatura_id = asig.id ORDER BY f.dia DESC' );
    }

    public function FaltaUnica( $idAlumn, $idAsign, $dia )
    {
        if ( //$this->seleccionar("SELECT * FROM faltas WHERE alumno_id = $idAlumn AND asignatura_id = $idAsign AND dia = '$dia' "
            $this->seleccionar("SELECT f.*, al.img as fotoAlumno FROM faltas f  INNER JOIN alumnos al ON alumno_id = $idAlumn AND asignatura_id = $idAsign AND dia = '$dia'  HAVING alumno_id = $idAlumn AND asignatura_id = $idAsign AND dia = '$dia' LIMIT 1") )
        {
            $this->alumno_id     = $this->filas[0]->alumno_id;
            $this->asignatura_id = $this->filas[0]->asignatura_id;
            $this->dia           = $this->filas[0]->dia;
            $this->horas         = $this->filas[0]->horas;
            $this->fotoAlumno    = $this->filas[0]->fotoAlumno;

            return true;
        }

        return false;

    }
    
    public function remove( $alumno_id, $asignatura_id, $dia )
    {
        return $this->ejecutar("DELETE FROM faltas WHERE alumno_id = $alumno_id AND asignatura_id = $asignatura_id AND dia = '$dia' ");
    }

    public function create()
    {
        $sql = "INSERT INTO faltas VALUES ( '$this->alumno_id',
                                            '$this->asignatura_id',
                                            '$this->dia', 
                                            '$this->horas');";
        return $this->ejecutar( $sql );
    }

    public function update($alumno_id, $asignatura_id, $dia)
    {
        $sql = "UPDATE faltas SET   alumno_id       = $this->alumno_id,
                                    asignatura_id   = $this->asignatura_id,
                                    dia             = '$this->dia', 
                                    horas           = $this->horas
                WHERE alumno_id = $alumno_id AND asignatura_id = $asignatura_id AND dia = '$dia';";

        return $this->ejecutar( $sql );
    }
  

    /* Gestión de alumnos */

    public function alumnoMasFalton(){
        return $this->seleccionar("SELECT alumno_id, SUM(horas) as 'horas' FROM faltas GROUP BY alumno_id ORDER BY horas DESC  LIMIT 1");
    }

    public function alumnoMasFaltonRand(){
        return $this->seleccionar("SELECT alumno_id, SUM(horas) as 'horas' FROM faltas GROUP BY alumno_id ORDER BY RAND() DESC");
    }
    
    public function alumnosMasFaltones(){
        return $this->seleccionar("SELECT alumno_id, SUM(horas) as 'horas' FROM faltas GROUP BY alumno_id ORDER BY horas DESC  LIMIT 1, 4");
    }
    
    public function alumnosMasFaltonesRand(){
        return $this->seleccionar("SELECT alumno_id, SUM(horas) as 'horas' FROM faltas GROUP BY alumno_id ORDER BY RAND() DESC  LIMIT 1, 4");
    }

    public function FaltasAlumnoTotal( $id )
    {
        return $this->seleccionar( "SELECT alumno_id,SUM(horas) as 'horas' FROM faltas WHERE alumno_id = $id;" );
    }

    /* Gestión de asignaturas */

    public function asignaturaMasFaltada(){
        return $this->seleccionar("SELECT asignatura_id, SUM(horas) as 'horas' FROM faltas GROUP BY asignatura_id ORDER BY horas DESC  LIMIT 1");
    }

    public function asignaturaMasFaltadaRand(){
        return $this->seleccionar("SELECT asignatura_id, SUM(horas) as 'horas' FROM faltas GROUP BY asignatura_id ORDER BY RAND() DESC");
    }
    
    public function asignaturasMasFaltadas(){
        return $this->seleccionar("SELECT asignatura_id, SUM(horas) as 'horas' FROM faltas GROUP BY asignatura_id ORDER BY horas DESC  LIMIT 1, 4");
    }
    
    public function asignaturasMasFaltadasRand(){
        return $this->seleccionar("SELECT asignatura_id, SUM(horas) as 'horas' FROM faltas GROUP BY asignatura_id ORDER BY RAND() DESC  LIMIT 1, 4");
    }

    public function FaltasAsignaturaTotal( $id )
    {
        return $this->seleccionar( "SELECT asignatura_id,SUM(horas) as 'horas' FROM faltas WHERE asignatura_id = $id;" );
    }





}