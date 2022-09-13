<?php 
session_start();
if (!$_SESSION['verificar']) {
    header("location: ../index.php");
}

require_once '../controller/controladormedico.php';
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
                    <h5 class="modal-title">Nueva Medico</h5>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="../controller/controladormedico.php" method = "POST">
                       
                        <div class="form-group">
                            <label>Documento medico:</label>
                            <input type="text" class="form-control" name="txtdocumentoM">
                        </div>
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" name="txtnombreM">
                        </div>
                        <div class="form-group">
                            <label>Apellido:</label>
                            <input type="text" class="form-control" name="txtapellidoM">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" class="form-control" name="txtemailM">
                        </div>
                        <div class="form-group">
                        <?php
                            $Conexion=new mysqli(server,user,pass,bd)or die("problemas con la conexion");
                        ?>
                            <select class="form-control" id="" name="selespecialidad">
                            <?php
                                $sql="SELECT id_Especialidad, Descripcion FROM especialidades LIMIT 10";
                                $Resultado= mysqli_query($Conexion, $sql)or die("Error en la tabla".mysqli_error($Conexion));
                                while($filas= mysqli_fetch_assoc($Resultado)){
                                    ?>
                                <option value="<?php echo $filas ["id_Especialidad"];?>"><?php echo $filas["Descripcion"];?></option>
                                <?php }?>
                            </select>
                        </div>

                        <button name="btn_newmedico" type="submit" class="btn btn-info" >Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="text-align:center;">
        <div class="justify-content-center">
            <h2>Listado de medicos registrados.</h2>
            <div class="col-auto mt-5">
                <table class="table">
                    <thead class="thead-dark center">
                        <tr>
                            <th width="15%">Documento</th>
                            <th width="30%">Nombre</th>
                            <th width="30%">Apellido</th>
                            <th width="30%">Correo</th>
                            <th width="30%">Especialidad</th>
                            <th width="15%">Editar</th>
                            <th width="15%">Eliminar</th>
                        </tr>
                        </thead>
                    <?php
                        $Objeto = new Medicos();
                        $Datos = $Objeto->listarMedicos();

                        foreach($Datos as $key){
                    ?>
                        <tr>
                            <td><?php echo $key["documentoM"] ?></td>
                            <td><?php echo $key["nombreM"] ?></td>
                            <td><?php echo $key["apellidoM"] ?></td>
                            <td><?php echo $key["emailM"] ?></td>
                            <td><?php echo $key["Descripcion"] ?></td>
                            <td><a href="../view/factualizarC.php?id=<?php echo $key['documentoM']?>" class="btn btn-warning">Actualizar</a></td>
                            <td><a href="../controller/eliminarmedico.php?id=<?php echo $key['documentoM'] ?>" class="btn btn-danger">Eliminar</a></td>
                            
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