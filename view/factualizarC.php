<?php
session_start();
$_SESSION['usuario'];
if (!$_SESSION['verificar']) {
    header("location: ../index.php");
}

?>

<div id="actualizarC" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

<?php
require_once "../config/conexion.php";
$objeto= new Conectar();
$id=$_GET['id'];
$query1="SELECT * FROM consultorios WHERE ConNumero='$id'";
$resultado=mysqli_query($objeto->_bd, $query1);
$ver=mysqli_fetch_row($resultado); 
?>
      <div class="modal-body">
        <h3 align="center">Actualizar Consultorio</h3>
        <form action="../controller/editarcontroladorconsultorio.php?id=<?php echo $_GET['id'];?>" method="POST">
          <div class="gorm-group">
            <label>No. de Consultorio:</label>
            <input type="number" class="form-control" name="txtnumaconsul" placeholder="Ingrese el numero del consultorio" value="<?php echo $id;?>">
          </div>
          <div class="gorm-group">
            <label>Nombre de Consultorio:</label>
            <input type="text" class="form-control" name="txtnomaconsul" placeholder="Ingrese el nombre del consultorio" value="<?php echo $ver[1];?>">
          </div>
          <br>
          <button type="submit" class="btn btn-success" name="actualizarconsul">Actualizar</button>
        </form>
    </div>
  </div>
</div>
</div>
