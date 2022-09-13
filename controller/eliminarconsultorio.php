<?php
require_once "../config/conexion.php";
require_once "../model/consultorio.php";


$id = $_GET['id'];
$Consul= new Consultorio();
$Reg = $Consul->eliminarConsultorios($id);
     
echo "<script> window.location='../view/fConsultorio.php'; </script>";
   
