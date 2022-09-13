<?php
require_once '../config/conexion.php';
class Usuario extends Conectar{

    protected $idUsuario;
    protected $nombreUsu;
    protected $apellidoUsu;
    protected $emailUsu;
    protected $passwordUsu;
    protected $rol;

    public function ingresoUsuario($emailUsu,$passwordUsu){
        $Sql1 = "SELECT * usuarios WHERE emailUsu = '$emailUsu' AND pass = '$passwordUsu'";
        $Result= $this->_bd->query($Sql1);
        $Filas=$Result->num_rows;
        if ($Filas == 1) {
            return true;
            echo "Retornado";
        }else {
            return false;
            echo "No retornado";
            
        }
        
    }

}

?>