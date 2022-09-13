<?php
require_once "../config/conexion.php";
require_once "../model/medicos.php";


$id = $_GET['id'];
$Objmedico= new Medicos();
$Reg = $Objmedico->eliminarMedico($id);
     
echo "<script> window.location='../view/fMedicos.php'; </script>";