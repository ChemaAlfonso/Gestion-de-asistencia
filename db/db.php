<?php

require_once 'DbConf.php';

class Db extends DbConf{

    private $conn;
    private $error;
    public $filas;

    public function __construct(){

        try
        {
            $cadena = 'mysql:host=' . $this->getServer() .
                      ';dbname='    . $this->getDb() . 
                      ';port='      . $this->getPort(); 

            $this->conn = new PDO( $cadena, $this->getUsr(), $this->getPsw() );

            $this->conn->exec('SET CHARACTER SET utf8');

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, 
                                     PDO::ERRMODE_EXCEPTION);


            $this->error = '';
        }
        catch(PDOExcerption $e)
        {
            $this->error = 'No se ha podido establecer la conexión: ' . 
                           $e->getMessage();
        }

    }

    
    public function error()
    {
        return ($this->error != '');
    }
    
    public function getError()
    {
        return $this->error;
    }


    public function seleccionar( $sql ){
        $sent = $this->conn->prepare( $sql );

        $sent->execute();

        $this->filas = $sent->fetchAll( PDO::FETCH_OBJ );

        if ( $this->filas == null)
            return false;

        return true;
    }

    public function ejecutar( $sql ){

        $sent = $this->conn->prepare( $sql );

        return $sent->execute();
    }


}