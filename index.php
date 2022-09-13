<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="view/css/login.css">
    <title>Login</title>
</head>
<body>

<!------ start login ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
   
    <!-- Icon -->
    <div class="fadeIn first img-login">
      <img src="view/img/login.png" id="icon" alt="User Icon" height="190"/>
    </div>

    <form  action="controller/Controladorlogin.php" method="POST">
      <input type="text" id="usuario" class="fadeIn second" name="txtusuario" placeholder="Usuario" required>
      <input type="password" id="password" class="fadeIn third" name="txtpassword" placeholder="Contraseña" required>
      <br>
      <div class="row justify-content-center">
        <div class="col-md-10">
          <select class="form-control fadeIn third" name="txtrol" required>
            <option value="" select="selected">Opciones</option>
            <option value="admin">Administrador</option>
            <option value="auxiliar">Auxiliar</option>
            <option value="medico">Medico</option>   
          </select>
        </div>
      </div>
                          
      
      <input type="submit" class="fadeIn fourth" name="ingresar" value="INGRESAR">
    
    </form>

    <div id="formFooter">
      <a class="underlineHover" href="#">No tienes cuenta?</a>
    </div>

  </div>
</div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>   
</body>
</html>