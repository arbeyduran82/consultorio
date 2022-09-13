<?php
require_once "../config/conexion.php";
    
    class login extends conectar{
        protected $id;
        protected $nombre;
        protected $apellido;
        protected $email;
        protected $pass;
        protected $rol;

        public function loginusuarios($email,$pass,$rol){
            
            if($rol=="admin"){
                $sql="SELECT * FROM usuarios WHERE emailUsu='$email' AND pass='$pass' AND rol='admin'";
                $resultado=$this->_bd->query($sql);
                $filas=$resultado->num_rows;
                if($filas==1){
                    return true;
                }
                else{
                    return false;
                }
            }
            elseif($rol=="auxiliar"){
                $sql="SELECT * FROM usuarios WHERE emailUsu='$email' AND pass='$pass' AND rol='auxiliar'";
                $resultado=$this->_bd->query($sql);
                $filas=$resultado->num_rows;
                if($filas==1){
                    return true;
                }
                else{
                    return false;
                }
            }
            elseif($rol=="medico"){
                $sql="SELECT * FROM usuarios WHERE emailUsu='$email' AND pass='$pass' AND rol='medico'";
                $resultado=$this->_bd->query($sql);
                $filas=$resultado->num_rows;
                if($filas==1){
                    return true;
                }
                else{
                    return false;
                }
            }  
            else{
                print "<script>alert(\"Completar todos los campos\");
                window.location='../index.php';</script>";
            }
        }
		
        public function regusuarios($nombre,$apellido,$email,$contraseña,$rol){
            $sql="SELECT * FROM usuarios";
            $resultado=$this->_bd->query($sql);
            $sqle="INSERT INTO usuarios (NombreU,ApellidoU,Email,Contraseña,Rol) VALUES ('".$nombre."','".$apellido."','".$email."','".$contraseña."','".$rol."')";
            $resultado=$this->_bd->query($sqle);
            if($resultado){
                print "<script>alert(\"Usuario registrado\");
                window.location='../view/principal.php';</script>";
                $resultado->close();
                $this->_bd->close();
            }
            else{
                print "<script>alert(\"Usuario no registrado\");
                window.location='../view/principal.php';</script>";
                $resultado->close();
                $this->_bd->close();
            }
        }
        public function listausuarios(){
            $sql="select * from usuarios WHERE id>=2";
            $resultado=$this->_bd->query($sql);
            if($resultado->num_rows>0){
                while($row=$resultado->fetch_assoc()){
                    $resultadoset[]=$row;
                }
            }
            return $resultadoset;
        }
        public function eliminarusuarios($id){
            $query="delete from usuarios where id='$id'";
            $resultado=$this->_bd->query($query);
            if(!$resultado){
                print "<script>alert(\"Uusario no eliminado\");
                window.location='../view/principal.php'</script>";
            }
            else{
                print "<script>alert(\"Usuario eliminado\");
                window.location='../view/princiapl.php'</script>";
            }
        }
        public function actualizarusuario($id,$nombre,$apellido,$correo,$con,$rol){
            $consulta="UPDATE usuarios SET NombreU='$nombre', ApellidoU='$apellido', Email='$correo', Contraseña='$contraseña', Rol='$rol' WHERE id='$id'";
            $resultado=$this->_bd->query($consulta);
            if($resultado){
                print "<script>alert(\"Usuario actualizado\");
                window.location='../view/principal.php';</script>";  
            }
            else
            {
                print "<script>alert(\"Usuario no actualizado\");
                window.location='../view/principal.php';</script>";
            }
        }
        
        public function cambiarcon($usu,$cona,$conn){
            $sql="UPDATE usuarios SET Contraseña='$conn' Where Contraseña='$cona' AND Email='$usu'";
            $res=$this->_bd->query($sql);
            if($res){
                print "<script>alert(\"Contraseña actualizada\");
                window.location='../index.php';</script>";  
            }
            else
            {
                print "<script>alert(\"Contraseña no actualizado\");
                window.location='../index.php';</script>";
            }
        }
    }
?>
