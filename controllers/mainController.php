<?php

require_once 'models/Alumno.php';
require_once 'models/Falta.php';
require_once 'models/Usuario.php';
require_once 'models/Asignatura.php';

class mainController{


    public function main(){
        
        /**************************
          Gestion de faltas alumnos 
         **************************/
        $falton = new Falta();
        $falton->alumnoMasFalton();
        
        $maxFalton = $falton->filas[0]->alumno_id;
        $maxFaltas = $falton->filas[0]->horas;

        $faltones = new Falta();
        $faltones->alumnosMasFaltones();

        $alumno = new Alumno();
        $alumnos = array();

        for ($i = 0; $i < count( $faltones->filas ) ; $i++){

            $alumnos[] .= $faltones->filas[$i]->alumno_id;
                        
        }

        /* Alumno más faltón */
        $almnTop =  new Alumno();
        $almnTop->AlumnoUnico( $maxFalton );

        /*******************************
          Gestion de faltas asignaturas 
         *******************************/
        $faltada = new Falta();
        $faltada->asignaturaMasFaltada();
        
        $maxAsignfaltada = $faltada->filas[0]->asignatura_id;
        $maxAsignFaltas = $faltada->filas[0]->horas;

        $asignMasFaltadas = new Falta();
        $asignMasFaltadas->asignaturasMasFaltadas();

        $asignatura = new Asignatura();
        $asignaturas = array();

        for ($i = 0; $i < count( $asignMasFaltadas->filas ) ; $i++){

            $asignaturas[] .= $asignMasFaltadas->filas[$i]->asignatura_id;
                        
        }

        /* Asignatura mas faltada */
        $asignTop =  new Asignatura();
        $asignTop->AsignaturaUnica( $maxAsignfaltada );

        /**************************
              Alumnos RAND() 
         **************************/
        $faltonRand = new Falta();
        $faltonRand->alumnoMasFaltonRand();
        
        $maxFaltonRand = $faltonRand->filas[0]->alumno_id;
        $maxFaltasRand = $faltonRand->filas[0]->horas;

        $faltonesRand = new Falta();
        $faltonesRand->alumnosMasFaltonesRand();

        $alumnoRand = new Alumno();
        $alumnosRand = array();

        for ($i = 0; $i < count( $faltonesRand->filas ) ; $i++){

            $alumnosRand[] .= $faltonesRand->filas[$i]->alumno_id;
                        
        }

        /* Alumno más faltón */
        $almnTopRand =  new Alumno();
        $almnTopRand->AlumnoUnico( $maxFaltonRand );

         /*******************************
                Asignaturas RAND() 
         *******************************/
        
        $faltadaRand = new Falta();
        $faltadaRand->asignaturaMasFaltadaRand();
        
        $maxAsignfaltadaRand = $faltadaRand->filas[0]->asignatura_id;
        $maxAsignFaltasRand = $faltadaRand->filas[0]->horas;

        $asignMasFaltadasRand = new Falta();
        $asignMasFaltadasRand->asignaturasMasFaltadasRand();

        $asignaturaRand = new Asignatura();
        $asignaturasRand = array();

        for ($i = 0; $i < count( $asignMasFaltadasRand->filas ) ; $i++){

            $asignaturasRand[] .= $asignMasFaltadasRand->filas[$i]->asignatura_id;
                        
        }
        
        /* Asignatura mas faltada */
        $asignTopRand =  new Asignatura();
        $asignTopRand->AsignaturaUnica( $maxAsignfaltadaRand );



        require_once 'views/graficos/graficos.php';
    }

    public function error(){

        require_once 'views/shared/error.php';
    }

    public function getRandomAsign(){
        
    }

}