<?php

function autoloadApp( $class ){
    include 'controllers/'. $class . '.php';
}

spl_autoload_register( 'autoloadApp' );