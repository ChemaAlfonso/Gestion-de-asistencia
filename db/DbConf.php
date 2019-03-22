<?php

abstract class DbConfig{
    private $server = 'localhost';
    private $db = 'faltasdeasistencia';
    private $usr = 'root';
    private $psw = '';
    private $port = '3306';


    protected function getServer(){ return $this->server; }
    protected function getDb(){ return $this->db; }
    protected function getUsr(){ return $this->usr; }
    protected function getPsw(){ return $this->psw; }
    protected function getPort(){ return $this->port; }



}