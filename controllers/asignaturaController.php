<?php

require_once 'models/Asignatura.php';

class AsignaturaController{

    public function __construct(){

    }
        
    /*************************
     *       Vistas
     *************************/

    public function main(){
        $asgn = new Asignatura();
        $asgn->Asignaturas();

        require_once 'views/asignaturas/asignaturas.php';
    }    

    public function crear(){

        require_once 'views/asignaturas/crear.php';
    }

    
    /*************************
     *  Creación / Edicion
     *************************/

    public function edit(){

        $asignatura_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

        $asignaturaEdit = new Asignatura();
        $asignaturaEdit->AsignaturaUnica( $asignatura_id );

        require_once 'views/asignaturas/crear.php';
    }

    public function create(){

        $nombre   = filter_var( $_POST['nombre'], FILTER_SANITIZE_STRING );
        $horas   = filter_var( $_POST['horas'], FILTER_SANITIZE_STRING );
        $curso   = filter_var( $_POST['curso'], FILTER_SANITIZE_STRING );
        

        $asignatura = new Asignatura();
        $asignatura->nombre    = $nombre;
        $asignatura->horas = $horas;
        $asignatura->curso = $curso;

        /* Codigo automatico con ultimo valor */
        $asignatura->ultimasignatura();
        $asignatura->codigo = $asignatura->filas[0]->codigo + 1;        
        $codigo             = $asignatura->codigo;
        
        if  ( !empty($_FILES['img']['name']) ){
            
            $img = $_FILES['img']['name'];


            $img = $this->saveImg( $nombre, $codigo );

            $asignatura->img = $img;

        } else {
            
            $destRoute =  'assets/img/asignaturas/' . $codigo;

            if ( !is_dir( $destRoute ) ){
            
                $img = 'assets/img/asignaturas/profile/profile.jpg';
                
                $asignatura->img = $img;

            }

        }        

        if ( !isset( $_GET['edit'] ) ){

            if ( $asignatura->create() ){
                $this->main();
    
            } else {
                $_SESSION['error'] = 'Error al crear la asignatura';
            }

        } else {

            $id  = filter_var( $_POST['id'], FILTER_SANITIZE_NUMBER_INT );
            $asignatura->id = $id;

            /* Mantenemos la foto actual si no se actualiza */
            if  ( empty($_FILES['img']['name'])  ){

                $updatedItem = new Asignatura();
                $updatedItem->AsignaturaUnicA( $asignatura->id );
                
                $asignatura->img = $updatedItem->filas[0]->img;

            }

            if ( $asignatura->update() ){
                
                $_GET['id'] = $asignatura->id;

                $this->edit();
    
            } else {
                $_SESSION['error'] = 'Error al actualizar la asignatura';
            }

        }

        return;

    }   

    public function saveImg( $name, $dir ){

        $fileExt = substr( $_FILES['img']['name'], ( strlen( $_FILES['img']['name'] ) -4 ) );

        $path = 'assets/img/asignaturas/';
        $simpleDestRoute =  $path . $dir . '/profile';
        $destRoute =  $path . $dir . '/profile' . $fileExt ;
        $file = $_FILES['img']['tmp_name'];
        

        if ( !is_dir( $path. $dir ) ){
            mkdir("assets/img/asignaturas/$dir");
        }

        if ( is_file( $tempFile = ($simpleDestRoute . '.jpg')) || is_file( $tempFile = ($simpleDestRoute . '.png')) || is_file( $tempFile = ($simpleDestRoute . '.gif')) ){
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
       $id =  filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

       $asignatura = new Asignatura();

       $asignatura->remove( $id );

       $this->main();


    }

}