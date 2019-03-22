<div class="col-9 blackBg mainBody py-3 vh-100 overflow-auto bg-white">

                <!-- Big container 3 -->
                <div class="container-fluid">

                    <?php  
                        $route = isset( $_GET['route']) ? filter_var($_GET['route'], FILTER_SANITIZE_STRING) : 'shared/graficos' ; 

                        $router = new Router();
                        $router->setredirectTo( $route );
                        $breadcrums = $router->getBreadcrums();

                        /* Breadcrums */
                        require_once 'views/shared/breadcrums.php';

                        /* Main Title */
                        require_once 'views/shared/mainTitle.php';

                    ?> 

                    <!-- Pages -->
                    <div class="container-fluid">
                       <?php 
                            $router->navigate( $route );
                        ?>
                    </div>
                    <!-- End Pages -->


                </div>