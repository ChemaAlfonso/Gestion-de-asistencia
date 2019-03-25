<?php

require_once 'models/Ccrypt.php';
require_once 'db/db.php';


class Login extends Db{

    private $user;
    private $psw;
    
    public function __construct( $usr = false, $pwd = false )
    {
        parent::__construct();
        
        if ( $usr !== false && $pwd !== false ){
            $this->user    = $usr;
            $this->psw     = $pwd;
        }

    }
    
    public function logedIn()
    {
        if ($this->Seleccionar("SELECT password 
                                FROM usuarios 
                                WHERE nickname='$this->user' 
                                OR email='$this->user'") )
        {
            
            $crypt = new CCrypt(); 
            $pass = $crypt->Encriptar( $this->psw );   
            
            if ( $pass == $this->filas[0]->password ){

                $this->Seleccionar("SELECT * 
                                    FROM usuarios 
                                    WHERE nickname='$this->user' 
                                    OR email='$this->user'");

                $this->setUser( $this->filas[0] );

                return true;

            }
                
        }
        
        return false;
    }

    public function setUser( $usr ){
        $this->user = $usr;
    }

    public function setPsw( $psw ){
        $this->psw = $psw;
    }

    public function getUser(){
        return $this->user;
    }
    
    public function getPsw(){
        return $this->psw;
    }
    


}