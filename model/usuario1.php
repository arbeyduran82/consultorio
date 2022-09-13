<?php
require_once "../config/conexion.php";
class Usuario extends Conectar
{
	protected $idusuario;
	protected $Nombreusu;
	protected $Apellidousu;
	protected $Emailusu;
	protected $passwordusu;
	protected $rol;
    
    public function ingresousuario($Emailusu,$passwordusu)
	{
  $sql1 = "SELECT * FROM usuarios WHERE emailUsu = '$Emailusu' AND pass = '$passwordusu'";

		$result=$this->_bd->query($sql1);
		$filas =$result->num_rows;
		if($filas == 1)
		{
			return true;
		}

	    else 
	    {
	    	return false;
	    }

	}
}

