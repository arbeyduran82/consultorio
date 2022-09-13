<?php include 'header.php'?>
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
<h3>Hola Bienvenido <?php echo '<strong>'.$_SESSION['auxiliar'].'</strong>'?></h3>

<?php include 'footer.php' ?>