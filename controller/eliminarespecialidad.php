<?php
require_once "../config/conexion.php";
require_once "../model/especialidades.php";


$id = $_GET['id'];
$Especialidad= new Especialidades();
$Reg = $Especialidad->eliminarEspecialidad($id);
     
echo "<script> window.location='../view/fespecialidad.php'; </script>";