<?php     

session_start();

if ( !empty( $_SESSION['user'] ) ){

     $usr = $_SESSION['user'];

     /* Seteo de la cookie de sesion si se requiere */
     if ( isset( $_SESSION['recordar'] ) ){   
          
          if ( $_SESSION['recordar'] == true ){
     
               setcookie("userLogin",$usr->nickname, $_SESSION['logstart']+604800);
     
          } elseif ( $_SESSION['recordar'] == false )  {
     
               setcookie("userLogin",$usr->nickname, $_SESSION['logstart']-604800);
               unset( $_COOKIE['userLogin'] );
     
          }

          unset( $_SESSION['recordar'] );
          
     }
}

//Modulo de rutas
require_once 'models/Router.php';
      
require_once 'autoload.php';

/* Header */
require_once 'views/shared/header.php'; 

//Si cerramos sesion
if ( isset( $_GET['logOut'] ) ){
     $_SESSION['user'] = null;
     unset( $_SESSION );
}

//Si esta registrado
if ( !empty( $_SESSION['user'] ) ){    

     /* 1st Big col (FAVS) */
     require_once 'views/shared/favs.php'; 
     /* End 1st Big col */

     /* 2nd Big col (Aside)*/
     require_once 'views/shared/aside.php'; 
     /* End 2nd Big col */

     /* 3rd Big col (Main Content) */
     require_once 'views/shared/main.php'; 
     /* End big container 3 */


//Si no esta registrado
} else {    

     $_GET['controller'] = 'login';

     if ( !empty( $_GET['reg'] ) ){
          
          $_GET['action'] = 'register';
          
     } else {

          $_GET['action'] = 'main';
          
     }

     $router = new Router();
     $router->navigator();

}

 require_once 'views/shared/footer.php'; 