<?php 
include 'header.php';
?>
<h3>Hola Bienvenido <?php echo '<strong>'.$_SESSION['medico'].'</strong>'?></h3>
<?php
require_once '../controller/controladorcitas.php';

?>
<style>
h3 {
    text-align: center;
    padding-top: 20px;
}

</style>
<?php

session_start();
if (!$_SESSION["verificar"]) {
    header("location: ../index.php");
}


?>



<?php include 'footer.php' ?>