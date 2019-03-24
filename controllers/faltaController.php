<?php

require_once 'models/Alumno.php';
require_once 'models/Asignatura.php';
require_once 'models/Falta.php';

class FaltaController{

    public function __construct(){

    }

    /*************************
     *        Vistas
     *************************/

    public function main(){
        $falta = new Falta();
        $falta->Faltas();

        require_once 'views/faltas/faltas.php';
    }       

    public function crear( $edit = false ){

        $alumnos = new Alumno();
        $alumnos->Alumnos();

        $asignaturas = new Asignatura();
        $asignaturas->Asignaturas();

        if ( $edit !== false ) {
            $faltaEdit = $edit;
            
            $fotoAlumno = new Alumno();
            $fotoAlumno->Alumnos();
        }

        require_once 'views/faltas/crear.php';
    }

    public function edit(){

        $alumno_id      = filter_var($_GET['idAlum'], FILTER_SANITIZE_NUMBER_INT);
        $asignatura_id  = filter_var($_GET['idAsig'], FILTER_SANITIZE_NUMBER_INT);
        $dia            = filter_var($_GET['dia'], FILTER_SANITIZE_STRING);

        $faltaEdit = new Falta();

        $faltaEdit->FaltaUnica( $alumno_id, $asignatura_id, $dia );

        $this->crear( $faltaEdit );
    }
    

    /*************************
     *  Creación / Edicion
     *************************/

    public function create(){

        $alumno_id       = filter_var( $_POST['alumno_id'], FILTER_SANITIZE_NUMBER_INT );
        $asignatura_id   = filter_var( $_POST['asignatura_id'], FILTER_SANITIZE_NUMBER_INT );
        $dia             = filter_var( $_POST['dia'], FILTER_SANITIZE_STRING );
        $horas           = filter_var( $_POST['horas'], FILTER_SANITIZE_STRING );
        

        $falta = new Falta();
        $falta->alumno_id    = $alumno_id;
        $falta->asignatura_id = $asignatura_id;
        $falta->dia = $dia;
        $falta->horas = $horas;


        

            /* Si estamos creando */
        if ( !isset( $_GET['edit'] ) ){

            try {

                $falta->create();

                $this->main();

            } catch (exception $e){
                echo "<p class='h5 '>Ha habido un error... el alumno o la asignatura <span class='text-danger'>no existen en la base de datos</span>, creelos primero</p>";
                
                echo    "<div class='col-3 offset-4 mt-5 '>";
                echo    "<a class='d-block my-3 btn btn-danger' href='index.php?controller=falta&action=crear'>Volver</a>";
                echo    "</div>";

            }

        } else {

            /* Si estamos editando */
            
            $alumno_id      = filter_var( $_GET['idAlum'], FILTER_SANITIZE_NUMBER_INT );
            $asignatura_id  = filter_var( $_GET['idAsig'], FILTER_SANITIZE_NUMBER_INT );
            $dia            = filter_var( $_GET['dia'], FILTER_SANITIZE_STRING );
            

            try {

                $falta->update($alumno_id, $asignatura_id, $dia);
                                
                $_GET['idAlum'] = $falta->alumno_id;
                $_GET['idAsig'] = $falta->asignatura_id;
                $_GET['dia']    = $falta->dia;
                
                $this->edit();

            }catch(exception $e){
                
                $_GET['edit'] = null;

                $this->remove();
                $this->create();

            }
        }

        return true;


    }

    
    /*************************
     *        Borrado
     *************************/

     public function remove()
     {
        $alumno_id       =  filter_var($_GET['idAlum'], FILTER_SANITIZE_NUMBER_INT);
        $asignatura_id   =  filter_var($_GET['idAsig'], FILTER_SANITIZE_NUMBER_INT);
        $dia             =  filter_var($_GET['dia'], FILTER_SANITIZE_STRING);

        $falta = new Falta();

        $falta->remove( $alumno_id, $asignatura_id, $dia );

        $this->main();


     }

}