<?php


class Login {

    private $user;
    private $psw;
    public $logPage;
    
    public function __construct(){

    }

    public function main(){
        require_once 'views/login/login.php';
    }




}