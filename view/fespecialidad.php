<?php
session_start();
if (!$_SESSION['verificar']) {
    header("location: ../index.php");
}

require_once '../controller/controladorespecialidad.php';
require_once '../view/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="modal-format" >
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#registroE">Nuevo Registro</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div id="registroE" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nueva Especialidad</h5>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="../controller/controladorespecialidad.php" method = "POST">
                       
                        <div class="form-group">
                            <label>Nombre Especialidad:</label>
                            <input type="text" class="form-control" name="txtnomespecialidad">
                        </div>

                        <button name="btn_newespecialidad" type="submit" class="btn btn-info" >Registrar</button>
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
                            <th width="15%">No.</th>
                            <th width="55%">Nombre Especialidad</th>
                            <th width="15%">Editar</th>
                            <th width="15%">Eliminar</th>
                        </tr>
                        </thead>
                    <?php
                        $Objeto = new Especialidades();
                        $Datos = $Objeto->listarEspecialidades();

                        foreach($Datos as $key){
                    ?>
                        <tr>
                            <td><?php echo $key["id_Especialidad"] ?></td>
                            <td><?php echo $key["Descripcion"] ?></td>
                            <td><a href="../view/factualizarC.php?id=<?php echo $key['numeroC']?>" class="btn btn-warning">Actualizar</a></td>
                            <td><a href="../controller/eliminarespecialidad.php?id=<?php echo $key['id_Especialidad'] ?>" class="btn btn-danger">Eliminar</a></td>
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