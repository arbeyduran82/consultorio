<?php
require_once "../config/conexion.php";
require_once "../model/login.php";


$id = $_GET['id'];
$Objeliminarusuario= new login();
$Reg = $Objeliminarusuario->eliminarusuarios($id);
     
echo "<script> window.location='controladorregistrarusuarios.php'; </script>";