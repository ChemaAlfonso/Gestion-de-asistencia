<div class="col-9 blackBg mainBody py-3 vh-100 overflow-auto bg-white"><!-- Big col 3 -->

    <!-- Big container 3 -->
    <div class="container-fluid">

        <?php  
            //$route = isset( $_GET['controller']) ? filter_var($_GET['controller'], FILTER_SANITIZE_STRING) : 'main' ; 

            $router = new Router();
            $router->setredirect();
            $breadcrums = $router->getBreadcrums();

            /* Breadcrums */
            require_once 'views/shared/breadcrums.php';

            /* Main Title */
            require_once 'views/shared/mainTitle.php';

        ?> 

        <!-- Pages -->
        <div class="container-fluid">
            <?php 
                $router->navigator();
            ?>
        </div>
        <!-- End Pages -->


    </div>
</div><!-- End big col 3 -->