<?php 
session_start();
if (!$_SESSION['verificar']) {
    header("location: ../index.php");
}
require_once '../controller/controladorcitas.php';
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
              <h5 class="modal-title">Nueva Cita</h5>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form action="../controller/controladorcitas.php" method="POST">
                <div class="form-group">
                  <label>Tipo de cita:</label>
                  <?php
                  $Conexion = new mysqli('localhost', 'root', '', 'citas2022');
                  ?>

                  <select class="form-control" name="seltipocita">

                    <?php
                    $sql = "SELECT id_Especialidad,Descripcion FROM especialidades LIMIT 10";
                    $Resultado = mysqli_query($Conexion, $sql) or die("Error en la tabla" . mysqli_error($Conexion));
                    ?>
                    <option value="">Seleccionar</option>
                    <?php
                    while ($filas = mysqli_fetch_assoc($Resultado)) {
                    ?>

                      <option value="<?php echo $filas["Descripcion"]; ?>"> <?php echo $filas["Descripcion"]; ?> </option>
                    <?php } ?>
                  </select>
                  <br>
                </div>


                <div class="form-group">
                  <label>Fecha de la cita</label>
                  <input type="date" class="form-control" name="txtfechacita">
                </div>

                <div class="form-group">
                  <label>Hora de la cita</label>
                  <input type="time" class="form-control" name="txthoracita">
                </div>

                <div class="form-group">
                  <label for="sel3">Estado de la cita</label>
                  <select class="form-control" name="selestadocita">
                    <option value="">Seleccionar</option>
                    <option value="Activa">Activa</option>
                    <option value="Cancelada">Cancelada</option>
                    <option value="Aplazada">Aplazada</option>
                  </select>
                </div>

                <div class="form-group">
                  <?php
                  $Conexion = new mysqli('localhost', 'root', '', 'citas2022'); ?>

                  <label for="sell">Consultorio</label>
                  <select class="form-control" name="selconsultoriocita">

                    <?php
                    $sql = "SELECT numeroC,nombreC FROM consultorios LIMIT 10";
                    $Resultado = mysqli_query($Conexion, $sql) or die("Error en la tabla" . mysqli_error($Conexion));
                    ?>
                    <option value="">Seleccionar</option>
                    <?php
                    while ($filas = mysqli_fetch_assoc($Resultado)) {
                    ?>

                      <option value="<?php echo $filas["numeroC"]; ?>"> <?php echo $filas["numeroC"]; ?> </option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <?php
                  $Conexion = new mysqli('localhost', 'root', '', 'citas2022'); ?>

                  <label for="sell">Medico</label>
                  <select class="form-control" name="selmedico">

                    <?php
                    $sql = "SELECT documentoM,nombreM FROM medicos LIMIT 10";
                    $Resultado = mysqli_query($Conexion, $sql) or die("Error en la tabla" . mysqli_error($Conexion));
                    ?>
                    <option value="">Seleccionar</option>
                    <?php
                    while ($filas = mysqli_fetch_assoc($Resultado)) {
                    ?>

                      <option value="<?php echo $filas["documentoM"]; ?>"> <?php echo $filas["nombreM"]; ?> </option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <?php
                  $Conexion = new mysqli('localhost', 'root', '', 'citas2022'); ?>

                  <label for="sell">Paciente</label>
                  <select class="form-control" name="selpaciente">

                    <?php
                    $sql = "SELECT documentoP,nombreP FROM pacientes LIMIT 10";
                    $Resultado = mysqli_query($Conexion, $sql) or die("Error en la tabla" . mysqli_error($Conexion));
                    ?>
                    <option value="">Seleccionar</option>
                    <?php
                    while ($filas = mysqli_fetch_assoc($Resultado)) {
                    ?>

                      <option value="<?php echo $filas["documentoP"]; ?>"> <?php echo $filas["nombreP"]; ?> </option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Observaciones</label>
                  <textarea type="text" class="form-control" name="txtobservaciones"></textarea>
                </div>

                <button name="btn_newcita" type="submit" class="btn btn-info">Registrar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="content" style="text-align:center;">
        <div class="justify-content-center">
          <h2>Listado de citas asignadas.</h2>
          <div class="col-auto mt-5">
            <table class="table">
              <thead class="thead-dark center">
                <tr>
                  <th width="5%">Codigo</th>
                  <th width="10%">Tipo</th>
                  <th width="10%">Fecha</th>
                  <th width="10%">Hora</th>
                  <th width="10%">Estado</th>
                  <th width="10%">Consultorio</th>
                  <th width="40%">Medico</th>
                  <th width="40%">Paciente</th>
                  <th width="20%">Observaciones</th>
                  <th width="10%">Editar</th>
                  <th width="10%">Eliminar</th>
                </tr>
              </thead>
              <?php
              $Objcitas = new Citas();
              $Datos = $Objcitas->listarCitas();

              foreach ($Datos as $key) {
              ?>
                <tr>
              <td><?php echo $key["codCita"]?></td>
              <td><?php echo $key["tipoCita"]?></td>
              <td><?php echo $key["fechaCita"]?></td>
              <td><?php echo $key["horaCita"]?></td>
              <td><?php echo $key["Estado"]?></td>
              <td><?php echo $key["codConsultorio"]?></td>
              <td><?php echo $key["codMedico"]?></td>
              <td><?php echo $key["codPaciente"]?></td>
              <td><?php echo $key["Observaciones"]?></td>
              

              <td><a href="FactualizarCi.php?id=<?php echo $key['CodCit']?>" class="btn btn-warning">Actualizar</a></td>
              <td><a href=" ../controller/eliminarcitas.php?id=<?php echo $key['codCita'] ?>" class="btn btn-danger">Eliminar</a></td>

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