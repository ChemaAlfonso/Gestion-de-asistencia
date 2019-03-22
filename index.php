<?php     
      
require_once 'autoload.php';

if ( !empty( $_SESSION['user'] ) ){

    $usr = filter_var( $_SESSION['user'], FILTER_SANITIZE_STRING );

} else {
    $usr = null;
}

/* Header */
require_once 'views/shared/header.php'; 


/* 1st Big col (FAVS) */
     require_once 'views/shared/favs.php'; 
/* End 1st Big col */

/* 2nd Big col (Aside)*/
     require_once 'views/shared/aside.php'; 
/* End 2nd Big col */

/* 3rd Big col (Main Content) */
     require_once 'views/shared/main.php'; 
/* End big container 3 */


 require_once 'views/shared/footer.php'; 