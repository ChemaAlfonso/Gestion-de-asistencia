<!-- Big col 3 -->
<div class="col-lg-9 col-md-9  blackBg mainBody py-3 vh-100 overflow-auto bg-white">

    <!-- Big container 3 -->
    <div class="container-fluid">


        <?php 
            require_once 'router.php';

            /* Breadcrums */
            require_once 'views/shared/breadcrums.php';
            
            /* Main Title */
            require_once 'views/shared/mainTitle.php';
        ?> 

        <!-- Pages -->
        <div class="container-fluid">
            <?php $router->navigator(); ?>
        </div>
        <!-- End Pages -->


    </div>
</div><!-- End big col 3 -->