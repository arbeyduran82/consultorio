<?php
require_once '../config/conexion.php';
require_once '../model/especialidades.php';
require_once '../view/fespecialidad.php';

if (isset($_POST["btn_newespecialidad"])) {
   $nomEspecialidad = $_POST['txtnomespecialidad'];
   $Especialidad =new Especialidades();
   $reg = $Especialidad->registrarEspecialidad($nomEspecialidad);

   if($reg){
    echo "<script>alert(\"Especialidad registrada con exito\");
    windows.location='../view/fespecialidad.php'; </script>";
   }else {
    echo "<script>alert(\"Error al registrar la especialidad\");
    windows.location='../view/fespecialidad.php'; </script>";
   }
}