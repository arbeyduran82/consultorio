<?php
session_start();
session_destroy();
print "<script>alert(\"La seccion se va a cerrar\");
window.location='../index.php';</script>";
