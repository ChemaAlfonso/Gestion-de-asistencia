<?php     

//Modulo de rutas
require_once 'models/Router.php';
      
require_once 'autoload.php';


/* Header */
require_once 'views/shared/header.php'; 


if ( !empty( $_SESSION['user'] ) ){

    $usr = filter_var( $_SESSION['user'], FILTER_SANITIZE_STRING );

    

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
    $usr = null;
    require_once 'views/login/login.php'; 
}



 require_once 'views/shared/footer.php'; 