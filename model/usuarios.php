<?php
require_once "../config/conexion.php";
class Usuarios extends Conectar
{
	protected $nombreUsu;
	protected $apellidoUsu;
	protected $emailUsu;
	protected $pass;
	protected $rol;

	public function insertarusuario($nombreUsu,$apellidoUsu,$Emailusu,$pass,$rol)
	{
		$sql1 = "SELECT * FROM usuarios WHERE EmailUsu = '$Emailusu' AND pass = '$pass'";

		$result = $this->_bd->query($sql1);
		$filas = $result->num_rows;
		if ($filas == 1) {
			return true;
		} else {
			return false;
		}
	}
}
