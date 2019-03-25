<?php     

session_start();

//Modulo de rutas
require_once 'models/Router.php';
      
require_once 'autoload.php';


/* Header */
require_once 'views/shared/header.php'; 

     //Si cerramos sesion
     if ( isset( $_GET['logOut'] ) ){
          $_SESSION['user'] = null;
          unset( $_SESSION['user'] );
     }

     //Si esta registrado
if ( !empty( $_SESSION['user'] ) ){

     $usr = filter_var( $_SESSION['user'], FILTER_SANITIZE_STRING );

     /* Seteo de la cookie de sesion si se requiere */
     if ( isset( $_GET['recordar'] ) ){
          

          
          if ( $_GET['recordar'] == true ){
     
               setcookie("userLogin",$usr, $_SESSION['logstart']+604800);
     
          } elseif ( $_GET['recordar'] == false )  {
     
               setcookie("userLogin",$usr, $_SESSION['logstart']-604800);
               unset( $_COOKIE['userLogin'] );
     
          }
          
          unset( $_GET['recordar'] );
          
     }    

     /* 1st Big col (FAVS) */
     require_once 'views/shared/favs.php'; 
     /* End 1st Big col */

     /* 2nd Big col (Aside)*/
          require_once 'views/shared/aside.php'; 
     /* End 2nd Big col */

     /* 3rd Big col (Main Content) */
          require_once 'views/shared/main.php'; 
     /* End big container 3 */


} else {
     
     //Si no esta registrado

     if ( !empty( $_GET['reg'] ) ){

          $_GET['controller'] = 'login';
          $_GET['action'] = 'register';
          
     } else {

          $_GET['controller'] = 'login';
          $_GET['action'] = 'main';
          
     }

     $router = new Router();
     $router->navigator();

}

 require_once 'views/shared/footer.php'; 