<?php
require_once '../config/conexion.php';
require_once '../model/consultorio.php';
require_once '../view/fConsultorio.php';

if (isset($_POST["btn_newconsultorio"])) {
   $idConsultorio = $_POST['txtnumeroconsul'];
   $nomConsultorio = $_POST['txtnombreconsul'];
   $consul =new Consultorio();
   $reg = $consul->Registroconsultorio($idConsultorio, $nomConsultorio);

   if($reg){
    echo "<script>alert(\"Consultorio registrado\");
    windows.location='../view/fConsultorio.php'; </script>";
   }else {
    echo "<script>alert(\"Error al registrar consultorio\");
    windows.location='../view/fConsultorio.php'; </script>";
   }
}