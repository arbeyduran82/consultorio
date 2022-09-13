<?php
require_once '../config/conexion.php';
require_once '../model/medicos.php';
require_once '../view/fMedicos.php';

if (isset($_POST["btn_newmedico"])) {
   $documentoM = $_POST['txtdocumentoM'];
   $nombreM = $_POST['txtnombreM'];
   $apellidoM = $_POST['txtapellidoM'];
   $emailM = $_POST['txtemailM'];
   $Especialidad = $_POST['selespecialidad'];

   $Objmedico =new Medicos();
   $reg = $Objmedico->registrarMedico($documentoM,$nombreM,$apellidoM,$emailM,$Especialidad);

   if($reg){
    echo "<script>alert(\"Especialidad registrada con exito\");
    windows.location='../view/fespecialidad.php'; </script>";
   }else {
    echo "<script>alert(\"Error al registrar la especialidad\");
    windows.location='../view/fespecialidad.php'; </script>";
   }
}

