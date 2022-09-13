<?php
require_once 'config.php';

class Conectar{
    protected $_bd;
    function __construct(){
        $this->_bd=new mysqli(server, user, pass, bd);
        if ($this->_bd->connect_errno) {
           echo"error al conectar" .$this->_bd->connect_errno;
           return;
        }
    }
}