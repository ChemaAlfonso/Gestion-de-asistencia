<?php

class Router{

    private $home;
    private $redirect;


    public function __construct(){
        //$this->setHome( 'main.php' );
    }

    public function getHome(){
        return $this->home;
    }
    
    public function getredirect(){
        return $this->redirect;
    }

    public function setHome( $home ){
        $this->home = $home;
    }
    
    public function setredirect(){
        if ( isset($_GET['controller']) ){
            $this->redirect = filter_var($_GET['controller'], FILTER_SANITIZE_STRING).'s';
            $this->redirect == 'mains' ? $this->redirect = 'Inicio' : '';
        } else {
            $this->redirect = 'Inicio';
        }
    }

    public function navigator(){

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
        $arr = explode( '/', $this->redirect );
        
        return $arr;
    }



}