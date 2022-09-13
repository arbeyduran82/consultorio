<?php
require_once '../config/conexion.php';
require_once '../model/login.php';
require_once '../view/fusuario.php';

if (isset($_POST["btn_newusuario"])) {
   $nombre = $_POST['txtnombreUsu'];
   $apellido = $_POST['txtapellidoUsu'];
   $email = $_POST['txtemailUsu'];
   $pass = $_POST['txtpass'];
   $rol = $_POST['selrol'];

   $Objregistrousuario = new login();
   $reg = $Objregistrousuario->registrousuarios($nombre,$apellido,$email,$pass,$rol);
   echo $reg;
   if ($reg) {
      echo "<script>alert(\"Usuario registrado con exito\");
    windows.location='controladorregistrarusuarios.php'; </script>";
   } else {
      echo "<script>alert(\"Error al registrar el Usuario\");
    windows.location='controladorregistrarusuarios.php'; </script>";
   }
}
