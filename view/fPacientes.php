<?php

session_start();
if (!$_SESSION['verificar']) {
    header("location: ../index.php");
}

require_once '../controller/controladorpaciente.php';
require_once '../view/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="modal-format">
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
                            <h5 class="modal-title">Nueva Paciente</h5>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="../controller/controladorpaciente.php" method="POST">
                                <div class="form-group">
                                    <label>Documento paciente:</label>
                                    <input type="text" class="form-control" name="txtdocumentoP">
                                </div>
                                <div class="form-group">
                                    <label>Nombre:</label>
                                    <input type="text" class="form-control" name="txtnombreP">
                                </div>
                                <div class="form-group">
                                    <label>Apellido:</label>
                                    <input type="text" class="form-control" name="txtapellidoP">
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="text" class="form-control" name="txtemailP">
                                </div>
                                <div class="form-group">
                                    <label>Fecha nacimiento:</label>
                                    <input type="text" class="form-control" name="txtfecha">
                                </div>
                                <div class="form-group">
                                    <select class="form-group" name="selgenero">
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Binario">Binario</option>
                                        <option value="Otro">Otros</option>
                                    </select>
                                </div>

                                <button name="btn_newpaciente" type="submit" class="btn btn-info">Registrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content" style="text-align:center;">
                <div class="justify-content-center">
                    <h2>Listado de pacientes registrados.</h2>
                    <div class="col-auto mt-5">
                        <table class="table">
                            <thead class="thead-dark center">
                                <tr>
                                    <th width="15%">Documento</th>
                                    <th width="30%">Nombre</th>
                                    <th width="30%">Apellido</th>
                                    <th width="30%">Correo</th>
                                    <th width="30%">Fecha Nacimiento</th>
                                    <th width="10%">Genero</th>
                                    <th width="10%">Editar</th>
                                    <th width="10%">Eliminar</th>
                                </tr>
                            </thead>
                            <?php
                            $Objpacientes = new Pacientes();
                            $Datos = $Objpacientes->listarPacientes();

                            foreach ($Datos as $key) {
                            ?>
                                <tr>
                                    <td><?php echo $key["documentoP"] ?></td>
                                    <td><?php echo $key["nombreP"] ?></td>
                                    <td><?php echo $key["apellidoP"] ?></td>
                                    <td><?php echo $key["emailP"] ?></td>
                                    <td><?php echo $key["fechaNac"] ?></td>
                                    <td><?php echo $key["generoP"] ?></td>
                                    <td><a href="../view/factualizarC.php?id=<?php echo $key['documentoP'] ?>" class="btn btn-warning">Actualizar</a></td>
                                    <td><a href="../controller/eliminarpaciente.php?id=<?php echo $key['documentoP'] ?>" class="btn btn-danger">Eliminar</a></td>

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