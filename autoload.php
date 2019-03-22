<?php

function autoloadApp( $class ){
    include 'models/'. $class . '.php';
}

spl_autoload_register( 'autoloadApp' );