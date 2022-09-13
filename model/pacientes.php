<?php
//error_reporting(0);
require_once '../config/conexion.php';

class Pacientes extends Conectar
{
    protected $documentoP;
    protected $nombreP;
    protected $apellidoP;
    protected $emailP;
    protected $fechaNac;
    protected $generoP;

    public function __construct()
    {
        parent::__construct();
    }

    public function registrarPaciente($documentoP, $nombreP, $apellidoP, $emailP, $fechaNac, $generoP)
    {
        $Conexion = "SELECT * FROM pacientes WHERE nombrep = '$nombreP'";
        $Resultado = $this->_bd->query($Conexion);
        $Fila = mysqli_fetch_assoc($Resultado);
        //echo $Fila;
        if ($Fila > 0) {
            echo "<script>alert('Paciente ya esta registrado');
           windows.location ='../view/fPacientes.php';
           </script>";
        } else {
            $Conexion1 = "INSERT INTO  pacientes(documentoP,nombreP,apellidoP,emailP,fechaNac,generoP)
            VALUES('".$documentoP."','".$nombreP."','".$apellidoP."','".$emailP."','".$fechaNac."','".$generoP."')";
            $Resul = $this->_bd->query($Conexion1);
            if (!$Resul) {
                echo "<script>alert('fallo al ingresar el paciente');
                windows.location='../view/fPacientes.php'; </script>";
            } else {
                return $Resul;
                echo "<script>alert('Paciente registrado con exito');
                windows.location='../view/fPacientes.php'; </script>";
                $Resultado->close();
                $this->_bd->close();
            }
        }
    }

    /*Listar <Especialidades></Especialidades>*/

    public function listarPacientes()
    {
        $Conexion = "SELECT * FROM pacientes ORDER BY nombreP";
        $Resultado = $this->_bd->query($Conexion);
        if ($Resultado->num_rows > 0) {
            while ($row = $Resultado->fetch_assoc()) {
                $Resultset[] = $row;
            }
        }
        return $Resultset;
    }
    //Eliminar especilidades
    public function eliminarPaciente($id)
    {
        $Conexion = "DELETE FROM pacientes WHERE documentoP = '$id'";
        $Resultado = $this->_bd->query($Conexion);
        if (!$Resultado) {
            echo "<script>alert('No se puede eliminar el paciente');
            windows.location='../view/fPacientes.php'; </script>";
        } else {
            echo "<script>alert('Registro eliminado con exito');
            windows.location='../view/fPacientes.php'; </script>";
        }
    }
}
