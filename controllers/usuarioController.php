<?php

require_once 'models/Ccrypt.php';
require_once 'models/Usuario.php';
require_once 'models/Login.php';

class UsuarioController{

    public function __construct(){

    }

    public function main(){
        $usr = new Usuario();
        $usr->Usuarios();

        require_once 'views/usuarios/usuarios.php';
    }

    public function crear(){

        require_once 'views/usuarios/crear.php';
    }
    
    /*************************
     *  Creación / Edicion
     *************************/

    public function create(){

        $nickname      = filter_var( $_POST['nickname'], FILTER_SANITIZE_STRING );
        $nombre        = filter_var( $_POST['nombre'], FILTER_SANITIZE_STRING );
        $apellidos     = filter_var( $_POST['apellidos'], FILTER_SANITIZE_STRING );
        $email         = filter_var( $_POST['email'], FILTER_SANITIZE_STRING );
        $password      = filter_var( $_POST['password'], FILTER_SANITIZE_STRING );
        $role          = filter_var( $_POST['role'], FILTER_SANITIZE_NUMBER_INT );
        

        $usuario = new Usuario();
        $usuario->nombre    = $nombre;
        $usuario->apellidos = $apellidos;
        $usuario->nickname  = $nickname;
        $usuario->email     = $email;
        $usuario->role      = $role;
        
        $crypt = new CCrypt(); 
    
        $usuario->password = $crypt->Encriptar($password);
        
        if  ( !empty($_FILES['img']['name']) ){
            
            $img = $_FILES['img']['name'];
            
            $img = $this->saveImg( $nombre, $nickname );
            
            $usuario->img = $img;

        }        

        if ( !isset( $_GET['edit'] ) ){

            if ( $usuario->create() ){
                $this->main();
    
            } else {
                $_SESSION['error'] = 'Error al crear el usuario';
            }

        } else {

            $id  = filter_var( $_POST['id'], FILTER_SANITIZE_NUMBER_INT );
            $usuario->id = $id;

            /* Mantenemos la foto actual si no se actualiza */
            if  ( strlen($_FILES['img']['name']) < 1    ){
                
                $updatedItem = new Usuario();
                $updatedItem->UsuarioUnico( $usuario->id );
                
                $usuario->img = $updatedItem->filas[0]->img;

            }

            if ( $usuario->update() ){
                
                $_GET['id'] = $usuario->id;

                $this->edit();
    
            } else {
                $_SESSION['error'] = 'Error al actualizar el usuario';
            }

        }

        return;


    }

    public function edit(){

        $_GET['edit'] = true;

        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

        $usuarioEdit = new Usuario();
        $usuarioEdit->UsuarioUnico( $id );
        
        /* Actualizacion de la sesión */
        if ( $_SESSION['user']->id == $usuarioEdit->filas[0]->id ){
            
            unset($_SESSION['user']);
            $_SESSION['user'] = $usuarioEdit->filas[0];
            
        }

        $this->blindPage( $id );

        require_once 'views/usuarios/crear.php';

    }


    public function saveImg( $name, $dir ){

        $fileExt = substr( $_FILES['img']['name'], ( strlen( $_FILES['img']['name'] ) -4 ) );

        $path            = 'assets/img/users/';
        $simpleDestRoute =  $path . $dir . '/profile';
        $destRoute       =  $simpleDestRoute . $fileExt ;
        $file            = $_FILES['img']['tmp_name'];
        
        if ( !is_dir( $path. $dir ) ){
            mkdir("assets/img/users/$dir");
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

        $usuario = new Usuario();

        $usuario->removeUser( $id );

        $this->main();


     }

         
    /*************************
     *   Paginas protegidas
     *************************/

    public function blindPage( $authorized_id ){
        
        if ( $_SESSION['user']->role_id < 1 || $_SESSION['user']->id === $authorized_id ){
            return true;
        }

        require_once 'views/error/unauthorized.php';
        die();
    }



}