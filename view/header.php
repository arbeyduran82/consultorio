<?php 
include '../config/config.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title><?php echo COMPANY ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../view/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid">
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
        <ul class="navbar-nav">

        <?php
            session_start();
            if(!$_SESSION['verificar']){
                header("location:index.php");
                        } 
            if(isset($_SESSION['usuario'])){
                echo '<li class="nav-item active"><a class="nav-link" href="controladorprincipal1.php">Inicio</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="controladorconsultorio.php">Consultorios</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="controladorespecialidad.php">Especialidades</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="controladormedico.php">Medicos</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="controladorpaciente.php">Pacientes</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="controladorcitas.php">Citas</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="controladorusuario.php">Usuarios</a></li>';
                        
            }elseif(isset($_SESSION['medico'])) {
                echo '<li class="nav-item active"><a class="nav-link" href="controladorprincipal2.php">Inicio</a></li>';
            }elseif(isset($_SESSION['auxiliar'])) {
                echo '<li class="nav-item active"><a class="nav-link" href="controladorprincipal3.php">Inicio</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="controladorpaciente.php">Pacientes</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="controladorcitas.php">Citas</a></li>';
            }

            ?>
            
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <a href="../controller/salirusuario.php"><button type="submit" class="btn btn-dark navbar-btn">Salir</button></a>
        </ul>
    </nav>

</div>