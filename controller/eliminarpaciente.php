<?php
require_once "../config/conexion.php";
require_once "../model/pacientes.php";


$id = $_GET['id'];
$Objpaciente= new Pacientes();
$Reg = $Objpaciente->eliminarPaciente($id);
     
echo "<script> window.location='controladorpaciente.php'; </script>";