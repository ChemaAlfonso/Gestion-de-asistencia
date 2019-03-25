<?php

require_once 'models/Login.php';

class LoginController extends MainController{
    
    
    public function __construct(){

    }
    
    /*************************
     *        Vistas
     *************************/

    public function main(){
        
        if ( empty( $_POST ) ){

            require_once 'views/login/login.php';

        } else {


            if ( $this->checkAuth() ){

                $_SESSION['user'] = $login;
                
            } else {
                $_SESSION['error'] = 'Error al inicar sesion';
            }

            require_once 'views/login/login.php';

        }

    }

    public function register(){

        if ( empty( $_POST ) ){
            require_once 'views/login/register.php';
        } else {

            $this->create();

        }
        
    }

    
    /*************************
     *    Autenticacion
     *************************/

    public function checkAuth(){

        $usuario    = FILTER_INPUT(INPUT_POST, 'nickname');
        $contrasena = FILTER_INPUT(INPUT_POST, 'password');
        $recordar   = (bool)FILTER_INPUT(INPUT_POST, 'recordar');

        

        $login = new Login( $usuario, $contrasena );
        

        if ( $login->logedIn() )
        {   
            $_SESSION['logedin']  = true;
            $_SESSION['logstart'] = time();
            $_SESSION['user']  = $login->getUser();

            if ( $recordar ){
                $_SESSION['recordar'] = true;
            } else {
                $_SESSION['recordar'] = false;
            }

            $_SESSION['contador'] = 0;
            header("location:index.php?recordar=true");
        }
        else
        {
            $_SESSION['error'] = 'Datos de inicio de sesión incorrectos';
        }

    }

    
    /*************************
     *  Creación / Edicion
     *************************/
    
    public function create()
    {
        $nombre      = filter_var( $_POST['nombre'], FILTER_SANITIZE_STRING );
        $apellidos   = filter_var( $_POST['apellidos'], FILTER_SANITIZE_STRING );
        $email       = filter_var( $_POST['email'], FILTER_SANITIZE_STRING );
        $nickname    = filter_var( $_POST['nickname'], FILTER_SANITIZE_STRING );
        $password    = filter_var( $_POST['password'], FILTER_SANITIZE_STRING );
                    

        $usr = new Usuario();
        $usr->nickname = $nickname;
        $usr->nombre = $nombre;
        $usr->apellidos = $apellidos;
        $usr->email = $email;
        $usr->favoritos = '';
        $usr->role = 1;

        $crypt = new CCrypt(); 
    
        $usr->password = $crypt->Encriptar($password);

        if  ( !empty($_FILES['img']['name']) ){
            
            $img = $_FILES['img']['name'];
            
            $img = $this->saveImg( $nombre, $nickname );

            $usr->img = 'assets/img/usuarios/' . $nickname . '/profile.jpg';

        } else {
            $usr->img = 'assets/img/login/login.jpg';
        }


        try {

            $usr->create();

            $login = new Login();
            $login->setUser( $usr->nickname );
            $login->setPsw( $password );
            $login->logedIn();

            $this->main();
            
            return true;

        } catch (exception $e){

            $_SESSION['error'] = 'Error al crear el usuario';

            echo "<p class='display-4 my-5'>Ha habido un error... el usuario <span class='text-danger'>ya existe en la base de datos</span></p>";
            
            echo    "<div class='col-1 offset-5 mt-5 '>";
            echo    "<a class='d-block my-3 btn btn-danger' href='index.php?controller=login&action=register&reg=true'>Volver</a>";
            echo    "</div>";

        }
        
    }

    
    public function saveImg( $name, $dir ){

        $fileExt = substr( $_FILES['img']['name'], ( strlen( $_FILES['img']['name'] ) - 4 ) );

        $path = 'assets/img/usuarios/';
        $simpleDestRoute =  $path . $dir . '/profile';
        $destRoute =  $path . $dir . '/profile' . $fileExt ;
        $file = $_FILES['img']['tmp_name'];
        

        if ( !is_dir( $path. $dir ) ){
            mkdir("assets/img/usuarios/$dir", 0777, true);
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

    
        

}
