<?php
require_once '../config/conexion.php';
require_once '../model/citas.php';
require_once '../view/fcitas.php';

if (isset($_POST["btn_newcita"])) {
   $tipoCita = $_POST['seltipocita'];
   $fechaCita = $_POST['txtfechacita'];
   $horaCita = $_POST['txthoracita'];
   $Estado = $_POST['selestadocita'];
   $codConsultorio = $_POST['selconsultoriocita'];
   $codMedico = $_POST['selmedico'];
   $codPaciente = $_POST['selpaciente'];
   $Observaciones = $_POST['txtobservaciones'];

   $Objcitas = new Citas();
   $reg = $Objcitas->registrarCita($tipoCita, $fechaCita, $horaCita, $Estado, $Observaciones, $codConsultorio, $codMedico, $codPaciente);
   echo $reg;
   if ($reg) {
      echo "<script>alert(\"Cita asignada con exito\");
    windows.location='controladorpaciente.php'; </script>";
   } else {
      echo "<script>alert(\"Error al asignar la cita\");
    windows.location='controladorpaciente.php'; </script>";
   }
}
