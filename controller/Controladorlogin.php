<?php
require_once '../config/conexion.php';
require_once '../model/login.php';

    if(isset($_POST['ingresar'])){
        $usuario=$_POST['txtusuario'];
        $pass=$_POST['txtpassword'];
        $rol=$_POST['txtrol'];
        $usu=new login();
        if(empty($usuario)||empty($pass)){
            print "<script>alert(\"Usuario o contraseña vacía\");
            window.location='../index.php';</script>";
        }
        elseif($usu->loginusuarios($usuario,$pass,$rol)){
            if($rol=="medico"){
                session_start();
                $_SESSION['medico']=$usuario;
                $_SESSION['verificar']=true;
                header("location: controladorprincipal2.php");
            }
            elseif($rol=="auxiliar"){
                session_start();
                $_SESSION['auxiliar']=$usuario;
                $_SESSION['verificar']=true;
                header("location: controladorprincipal3.php");
            }
            elseif($rol=="admin"){
                session_start();
                $_SESSION['usuario']=$usuario;
                $_SESSION['verificar']=true;
                header("location: controladorprincipal1.php");
            }
        }
        else{
            print "<script>alert(\"El usuario no existe\");
            window.location='../index.php';</script>";
        }
    }else {
       
    }
?>