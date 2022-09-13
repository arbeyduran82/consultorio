<?php
require_once '../config/conexion.php';
require_once '../model/usuario1.php';
if(isset($_POST['ingresar'])){
    $usuario = $_POST['txtemail'];
    $password = $_POST['txtpassword'];
 
 
    if(empty($usuario || empty($password)))
    {
        print "<script>alert(\"usuario o contraseña vacio\");
         window.location='../index.php';</script>";
    }else {
 
           $usu = new Usuario();

           if($usu->ingresoUsuario($usuario,$password)){
               session_start();
               $_SESSION['usuario'] = $usuario;
               $_SESSION['verificar'] = true;
               header('Location: ../view/Principal.php');
 }else
           {
               print "<script>alert(\"usuario no existe\");
         window.location='../index.php';</script>";
           }
}
}