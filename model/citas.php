<?php
//error_reporting(0);
require_once '../config/conexion.php';

class Citas extends Conectar
{
    protected $tipoCita;
    protected $fechaCita;
    protected $horaCita;
    protected $Estado;
    protected $Observaciones;
    protected $codConsultorio;
    protected $codMedico;
    protected $codPaciente;

    public function __construct()
    {
        parent::__construct();
    }

    public function registrarCita($tipoCita, $fechaCita, $horaCita, $Estado, $Observaciones, $codConsultorio, $codMedico, $codPaciente)
    {
        $Conexion = "SELECT * FROM citas WHERE tipoCita = '$tipoCita'";
        $Resultado = $this->_bd->query($Conexion);
        $Fila = mysqli_fetch_assoc($Resultado);
        //echo $Fila;
        if ($Fila > 0) {
            echo "<script>alert('El paciente ya tiene una cita asignada');
           windows.location ='controladorcitas.php';
           </script>";
        } else {
            $Conexion1 = "INSERT INTO  citas(tipoCita,fechaCita,horaCita,Estado,Observaciones,codConsultorio,codMedico,codPaciente)
            VALUES('".$tipoCita."','".$fechaCita."','".$horaCita."','".$Estado."','".$Observaciones."','".$codConsultorio."','".$codMedico."','".$codPaciente."')";
            $Resul = $this->_bd->query($Conexion1);
            var_dump($Resul);
            if (!$Resul) {
                echo "<script>alert('fallo al asignar la cita');
                windows.location='controladorcitas.php'; </script>";
            } else {
                return $Resul;
                echo "<script>alert('Cita asignada con exito');
                windows.location='controladorcitas.php'; </script>";
                $Resultado->close();
                $this->_bd->close();
            }
        }
    }

    /*Listar <Especialidades></Especialidades>*/

    public function listarCitas()
    {
        $Conexion = "SELECT * FROM citas ORDER BY tipoCita";
        $Resultado = $this->_bd->query($Conexion);
        if ($Resultado->num_rows > 0) {
            while ($row = $Resultado->fetch_assoc()) {
                $Resultset[] = $row;
            }
        }
        return $Resultset;
    }
    //Eliminar especilidades
    public function eliminarCita($id)
    {
        $Conexion = "DELETE FROM citas WHERE codCita = '$id'";
        $Resultado = $this->_bd->query($Conexion);
        if (!$Resultado) {
            echo "<script>alert('error al eliminar la cita');
            windows.location='../controller/controladorcitas.php'; </script>";
        } else {
            echo "<script>alert('Registro eliminado con exito');
            windows.location='../controller/controladorcitas.php'; </script>";
        }
    }
}
