<?php
error_reporting(0);
require_once '../config/conexion.php';

class Especialidades extends Conectar{
    //protected $id_Especialidad;
    protected $Descripcion;

    public function __construct(){
        parent::__construct();
    }

    public function registrarEspecialidad($Descripcion){
        $Conexion= "SELECT * FROM especialidades WHERE Descripcion = '$Descripcion'";
        $Resultado=$this->_bd->query($Conexion);
        $Fila = mysqli_fetch_assoc($Resultado);
        //echo $Fila;
        if ($Fila>0) {
           echo "<script>alert('Especialidad ya esta registrado');
           windows.location ='../view/fespecialidad.php';
           </script>";
        }else {
            $Conexion1 = "INSERT INTO  especialidades(Descripcion)VALUES('".$Descripcion."')";
            $Resul = $this->_bd->query($Conexion1);
            if (!$Resul) {
                echo "<script>alert('fallo al ingresar la especiaidad');
                windows.location='../view/fespecialidad.php'; </script>";
               
            }else {
                return $Resul;
                echo "<script>alert('Especialidad registrada');
                windows.location='../view/fespecialidad.php'; </script>";
                $Resultado->close();
                $this->_bd->close();
                
            }
        }
    }

    /*Listar <Especialidades></Especialidades>*/

    public function listarEspecialidades(){
        $Conexion= "SELECT * FROM especialidades ORDER BY id_Especialidad";
        $Resultado=$this->_bd->query($Conexion);
        if ($Resultado->num_rows > 0) {
           while ($row=$Resultado->fetch_assoc()) {
            $Resultset[]=$row;
           }
        }  return $Resultset;
    }
//Eliminar especilidades
    public function eliminarEspecialidad($id){
        $Conexion = "DELETE FROM especialidades WHERE id_Especialidad = '$id'";
        $Resultado=$this->_bd->query($Conexion);
        if (!$Resultado) {
            echo "<script>alert('No se puede eliminar consultorio');
            windows.location='../view/fespecialidad.php'; </script>";
        }else {
            echo "<script>alert('Registro eliminado con exito');
            windows.location='../view/fespecialidad.php'; </script>";
        }
    }
    
}