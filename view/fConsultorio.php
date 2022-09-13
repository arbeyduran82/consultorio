<?php 
session_start();
if (!$_SESSION['verificar']) {
    header("location: ../index.php");
}
require_once '../controller/controladorconsultorio.php';
require_once '../view/header.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="modal-format" >
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#registroC">Nuevo Registro</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div id="registroC" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Consultorio</h5>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="../controller/controladorconsultorio.php" method = "POST">
                        <div class="form-group">
                            <label>No. Consultorio:</label>
                            <input type="number" class="form-control" name="txtnumeroconsul">
                        </div>

                        <div class="form-group">
                            <label>Nombre Consultorio:</label>
                            <input type="text" class="form-control" name="txtnombreconsul">
                        </div>

                        <button name="btn_newconsultorio" type="submit" class="btn btn-info" >Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="text-align:center;">
        <div class="justify-content-center">
            <div class="col-auto mt-5">
                <table class="table">
                    <thead class="thead-dark center">
                        <tr>
                            <th width="15%">No. Consultorio</th>
                            <th width="55%">Nombre Consultorio</th>
                            <th width="15%">Editar</th>
                            <th width="15%">Eliminar</th>
                        </tr>
                        </thead>
                    <?php
                        $Objeto = new Consultorio();
                        $Datos = $Objeto->listarConsultorios();

                        foreach($Datos as $key){
                    ?>
                        <tr>
                            <td><?php echo $key["numeroC"] ?></td>
                            <td><?php echo $key["nombreC"] ?></td>
                            <td><a href="../view/factualizarC.php?id=<?php echo $key['numeroC']?>" class="btn btn-warning">Actualizar</a></td>
                            <td><a href="../controller/eliminarconsultorio.php?id=<?php echo $key['numeroC'] ?>" class="btn btn-danger">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>
<?php require_once '../view/footer.php' ?>