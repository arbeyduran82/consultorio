<?php
//error_reporting(0);
require_once '../config/conexion.php';

class Medicos extends Conectar{
    protected $documentoM;
    protected $nombreM;
    protected $apellidoM;
    protected $emailM;
    protected $Especialidad;

    public function __construct(){
        parent::__construct();
    }

    public function registrarMedico($documentoM,$nombreM,$apellidoM,$emailM,$Especialidad){
        $Conexion= "SELECT * FROM medicos WHERE nombreM = '$nombreM'";
        $Resultado=$this->_bd->query($Conexion);
        $Fila = mysqli_fetch_assoc($Resultado);
        //echo $Fila;
        if ($Fila>0) {
           echo "<script>alert('Medico ya esta registrado');
           windows.location ='../view/fespecialidad.php';
           </script>";
        }else {
            $Conexion1 = "INSERT INTO  medicos(documentoM,nombreM,apellidoM,emailM,Especialidad)
            VALUES('".$documentoM."','".$nombreM."','".$apellidoM."','".$emailM."','".$Especialidad."')";
            $Resul = $this->_bd->query($Conexion1);
            if (!$Resul) {
                echo "<script>alert('fallo al ingresar el medico');
                windows.location='../view/fMedicos.php'; </script>";
               
            }else {
                return $Resul;
                echo "<script>alert('Medico registrado con exito');
                windows.location='../view/fMedicos.php'; </script>";
                $Resultado->close();
                $this->_bd->close();
                
            }
        }
    }

    /*Listar <Especialidades></Especialidades>*/

    public function listarMedicos(){
        $Conexion= "SELECT documentoM,nombreM,apellidoM,emailM,Descripcion FROM medicos INNER JOIN especialidades WHERE Especialidad = id_Especialidad ORDER BY nombreM";
        $Resultado=$this->_bd->query($Conexion);
        if ($Resultado->num_rows > 0) {
           while ($row=$Resultado->fetch_assoc()) {
            $Resultset[]=$row;
           }
        }  return $Resultset;
    }
//Eliminar especilidades
    public function eliminarMedico($id){
        $Conexion = "DELETE FROM medicos WHERE documentoM = '$id'";
        $Resultado=$this->_bd->query($Conexion);
        if (!$Resultado) {
            echo "<script>alert('No se puede eliminar el medico');
            windows.location='../view/fMedicos.php'; </script>";
        }else {
            echo "<script>alert('Registro eliminado con exito');
            windows.location='../view/fMedicos.php'; </script>";
        }
    }
    
}