<?php
require_once "../config/conexion.php";


class Consultorio extends Conectar{
    protected $Nconsultorio;
    protected $Nomconsultorio;

    public function __construct(){
        parent::__construct();
    }

    public function Registroconsultorio($Nconsultorio, $Nomconsultorio){
        $Sql1= "SELECT * FROM consultorios WHERE numeroC = '$Nconsultorio'";
        $Resultado=$this->_bd->query($Sql1);
        $Fila = mysqli_fetch_assoc($Resultado);
        //echo $Fila;
        if ($Fila>0) {
           echo "<script>alert('Consultorio ya esta registrado');
           windows.location ='../view/fConsultorio.php';
           </script>";
        }else {
            $Sql = "INSERT INTO  consultorios(numeroC, nombreC)VALUES('". $Nconsultorio ."',
            '".$Nomconsultorio."')";
            $Resultado = $this->_bd->query($Sql);
            if (!$Resultado) {
                echo "<script>alert('fallo al ingresar los datos');
                windows.location='../view/fConsultorio.php'; </script>";
               
            }else {
                return $Resultado;
                echo "<script>alert('Consultario registrado');
                windows.location='../view/fConsultorio.php'; </script>";
                $Resultado->close();
                $this->_bd->close();
                
            }
        }
    }

    public function listarConsultorios(){
        $Sql1= "SELECT * FROM consultorios ORDER BY numeroC";
        $Resul=$this->_bd->query($Sql1);
        if ($Resul->num_rows > 0) {
           while ($row=$Resul->fetch_assoc()) {
            $Resultset[]=$row;
           }
        }  return $Resultset;
    }

    public function eliminarConsultorios($id){
        $query1 = "DELETE FROM consultorios WHERE numeroC = '$id'";
        $Resul=$this->_bd->query($query1);
        if (!$Resul) {
            echo "<script>alert('No se puede eliminar consultorio');
            windows.location='../view/fConsultorio.php'; </script>";
        }else {
            echo "<script>alert('Registro eliminado con exito');
            windows.location='../view/fConsultorio.php'; </script>";
        }
    }
    
}
