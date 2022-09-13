<?php
require_once '../config/conexion.php';
require_once '../model/pacientes.php';
require_once '../view/fPacientes.php';

if (isset($_POST["btn_newpaciente"])) {
   $documentoP = $_POST['txtdocumentoP'];
   $nombreP = $_POST['txtnombreP'];
   $apellidoP = $_POST['txtapellidoP'];
   $emailP = $_POST['txtemailP'];
   $fechaNac = $_POST['txtfecha'];
   $generoP = $_POST['selgenero'];

   $Objpaciente = new Pacientes();
   $reg = $Objpaciente->registrarPaciente($documentoP, $nombreP, $apellidoP, $emailP, $fechaNac, $generoP);
   echo $reg;
   if ($reg) {
      echo "<script>alert(\"Paciente registrado con exito\");
    windows.location='controladorpaciente.php'; </script>";
   } else {
      echo "<script>alert(\"Error al registrar el paciente\");
    windows.location='controladorpaciente.php'; </script>";
   }
}
