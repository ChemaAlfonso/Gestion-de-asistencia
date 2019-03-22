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
        require_once "views/$page.php";
    }

    public function getBreadcrums(){
        $arr = explode( '/', $this->redirectTo );
        
        return $arr;
    }



}