<?php

require_once 'models/Falta.php';
require_once 'models/Alumno.php';

class AlumnoController{

    public function __construct(){

    }
           
    /*************************
     *       Vistas
     *************************/

    public function main(){
        $alm = new Alumno();
        $alm->Alumnos();

        $falta = new Falta();        

        require_once 'views/alumnos/alumnos.php';
    }

    public function crear(){

            require_once 'views/alumnos/crear.php';

    }

    /*************************
     *  Creación / Edicion
     *************************/

    public function create(){

        $nombre      = filter_var( $_POST['nombre'], FILTER_SANITIZE_STRING );
        $apellidos   = filter_var( $_POST['apellidos'], FILTER_SANITIZE_STRING );
        

        $alumno = new Alumno();
        $alumno->nombre    = $nombre;
        $alumno->apellidos = $apellidos;
        
        /* Matricula automatica con ultimo valor */
        $alumno->ultimoAlumno();
        $alumno->matricula = $alumno->filas[0]->matricula + 1;        
        $matricula         = $alumno->matricula;
        
        if  ( !empty($_FILES['img']['name']) ){
            
            $img = $_FILES['img']['name'];
            
            $img = $this->saveImg( $nombre, $matricula );
            
            $alumno->img = $img;

        }
        

        if ( !isset( $_GET['edit'] ) ){

            if ( $alumno->create() ){
                $this->main();
    
            } else {
                $_SESSION['error'] = 'Error al crear el alumno';
            }

        } else {

            $id  = filter_var( $_POST['id'], FILTER_SANITIZE_NUMBER_INT );
            $alumno->id = $id;

            /* Mantenemos la foto actual si no se actualiza */
            if  ( empty($_FILES['img']['name'])  ){

                $updatedItem = new Alumno();
                $updatedItem->AlumnoUnico( $alumno->id );
                
                $alumno->img = $updatedItem->filas[0]->img;

            }

            if ( $alumno->update() ){
                
                $_GET['id'] = $alumno->id;

                $this->edit();
    
            } else {
                $_SESSION['error'] = 'Error al actualizar el alumno';
            }

        }

        return;


    }

    public function edit(){

        $alumno_id = filter_var( $_GET['id'], FILTER_SANITIZE_NUMBER_INT );

        $alumnoEdit = new Alumno();
        $alumnoEdit->AlumnoUnico( $alumno_id );

        require_once 'views/alumnos/crear.php';
    }


    public function saveImg( $name, $dir ){

        $fileExt = substr( $_FILES['img']['name'], ( strlen( $_FILES['img']['name'] ) - 4 ) );

        $path = 'assets/img/alumnos/';
        $simpleDestRoute =  $path . $dir . '/profile';
        $destRoute =  $path . $dir . '/profile' . $fileExt ;
        $file = $_FILES['img']['tmp_name'];
        

        if ( !is_dir( $path. $dir ) ){
            mkdir("assets/img/alumnos/$dir");
        }

        if ( is_file( $tempFile = ($simpleDestRoute . '.jpg') ) || is_file( $tempFile = ($simpleDestRoute . '.png') ) || is_file( $tempFile = ($simpleDestRoute . '.gif') ) ){
            unlink( $tempFile );
        }


        if ( move_uploaded_file( $file,$destRoute ) ){
            return $destRoute;
            
        } else {

            $_SESSION['error'] = 'Error al subir el archivo';

            return false;
        }
    }

    
    /*************************
     *        Borrado
     *************************/

     public function remove()
     {
        $id =  filter_var( $_GET['id'], FILTER_SANITIZE_NUMBER_INT );

        $alumno = new Alumno();

        $alumno->remove( $id );

        $this->main();


     }
     
    
    /*************************
     *        Busqueda
     *************************/

    public function search()
    {
       $search =  filter_var( $_POST['search'], FILTER_SANITIZE_STRING );

       $result = new Alumno();       
       $falta = new Falta();

       $result->search( $search );

       require_once 'views/alumnos/search.php';


    }

}