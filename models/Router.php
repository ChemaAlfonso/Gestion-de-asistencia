<?php

class Router{

    private $home;
    private $redirectTo;


    public function __construct(){
        $this->setHome( 'main.php' );
    }

    public function getHome(){
        return $this->home;
    }
    
    public function getredirectTo(){
        return $this->redirectTo;
    }

    public function setHome( $home ){
        $this->home = $home;
    }
    
    public function setredirectTo( $redirectTo ){
        $this->redirectTo = $redirectTo;
    }

    public function navigate( $page ){
        //require_once "views/$page.php";

        if ( isset($_GET['controller']) ){
            $controller = filter_var($_GET['controller'], FILTER_SANITIZE_STRING).'Controller';

            if ( isset($_GET['action']) ){
                $action = filter_var($_GET['action'], FILTER_SANITIZE_STRING);
            } else {
                $action = 'main';
            }

        } else {
            $controller = 'mainController';
            $action = 'main';
        }

        $ctrl = new $controller();
        $ctrl->$action();

    }

    public function getBreadcrums(){
        $arr = explode( '/', $this->redirectTo );
        
        return $arr;
    }



}