<?php 

session_start();
$_SESSION['usuario'];
if (!$_SESSION['verificar']) {
    header("location: ../index.php");
}

require_once '../controller/controladorregistrarusuarios.php';
require_once '../view/header.php';
?>
<!--
<div class="container">
  <form action="../Control/buscarcita.php" method="GET">
    <div class="form-gruup">
      <br>
      <label>Buscar cita: </label>
      <input type="number" name="busqueda" placehorder="Codigo de la cita" value="<?php echo $busqueda; ?>" class="form-control">
    </div>
    <br>
    <input type="submit" class="btn btn-outline-success" value="buscar">
  </form>
</div> -->

<div class="container">
  <div class="row">
    <div class="col-md-12 ">
      <div class="modal-format">
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
              <h5 class="modal-title">Nuevo Usuario</h5>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form action="../controller/controladorregistrarusuarios.php" method="POST">

                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" name="txtnombreUsu">
                </div>

                <div class="form-group">
                  <label>Apellido</label>
                  <input type="text" class="form-control" name="txtapellidoUsu">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="txtemailUsu">
                </div>

                <div class="form-group">
                  <label>Contraseña</label>
                  <input type="text" class="form-control" name="txtpass">
                </div>

                <div class="form-group">
                  <label for="sel3">Rol</label>
                  <select class="form-control" name="selrol">
                    <option value="">Opciones</option>
                    <option value="admin">Administrador</option>
                    <option value="medico">Medico</option>
                    <option value="auxiliar">Auxiliar</option>
                  </select>
                </div>

                <button name="btn_newusuario" type="submit" class="btn btn-info">Registrar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="content" style="text-align:center;">
        <div class="justify-content-center">
          <h2>Listado de Usuarios.</h2>
          <div class="col-auto mt-5">
            <table class="table">
              <thead class="thead-dark center">
                <tr>
                  <th width="20%">No</th>
                  <th width="20%">Nombre</th>
                  <th width="20%">Apellido</th>
                  <th width="20%">Email</th>
                  <th width="10%">Password</th>
                  <th width="10%">Rol</th>
                  <th width="10%">Editar</th>
                  <th width="10%">Eliminar</th>
                </tr>
              </thead>
              <?php
              $Objlistarusuarios = new login();
              $Datos = $Objlistarusuarios->listarusuarios();

              foreach ($Datos as $key) {
              ?>
                <tr>
              <td><?php echo $key["idUsuario"]?></td>
              <td><?php echo $key["nombreUsu"]?></td>
              <td><?php echo $key["apellidoUsu"]?></td>
              <td><?php echo $key["emailUsu"]?></td>
              <td><?php echo $key["pass"]?></td>
              <td><?php echo $key["rol"]?></td>
              
              <td><a href="FactualizarCi.php?id=<?php echo $key['CodCit']?>" class="btn btn-warning">Actualizar</a></td>
              <td><a href=" ../controller/eliminarusuario.php?id=<?php echo $key['idUsuario'] ?>" class="btn btn-danger">Eliminar</a></td>

          </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once '../view/footer.php'; ?>